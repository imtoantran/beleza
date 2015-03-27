<?php

/**
 *
 */
class service_model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    //luuhoabk - loadlist promotion
    public function loadListPromotion($user_id)
    {
        $now = getDate();
        // get list promotion
        $aQuery = <<<SQL
		SELECT *
		FROM promotion
		WHERE user_id = {$user_id} 
		AND promotion_state = 1
		AND promotion_end_date > NOW()
		ORDER BY promotion_create_date DESC
SQL;
        $data = $this->db->select($aQuery);

        echo json_encode($data);

    }

    public function loadItemPromotion($promotion_id)
    {
        // get list promotion
        $aQuery = <<<SQL
		SELECT *
		FROM promotion
		WHERE promotion_id = {$promotion_id} 
SQL;
        $data = $this->db->select($aQuery);

        echo json_encode($data);
    }

    public function updateTotalView($user_id)
    {
        $sql = <<<SQL
SELECT user_total_view
FROM user
WHERE user_id = {$user_id}
SQL;
        $select = $this->db->select($sql);
        if ($select) {
            $total_view = $select[0]['user_total_view'] + 1;
            $sql = <<<SQL
UPDATE user
SET user_total_view = {$total_view}
WHERE user_id = {$user_id}
SQL;
            $update = $this->db->prepare($sql);
            $update->execute();
        }
    }

    public function checkExistUser($user_id)
    {
        $sql = <<<SQL
SELECT COUNT(*) AS check_user
FROM user_service, user, group_service
WHERE user.user_id = group_service.group_service_user_id
AND user_service.user_service_group_id = group_service.group_service_id
AND user_id = {$user_id}
AND user_delete_flg = 0
AND user_service_delete_flg = 0
SQL;
        $select = $this->db->select($sql);
        return $select[0]['check_user'];
    }

    public function loadLocationDetail($user_id)
    {
        $return = array();
        $query = <<<SQL
			SELECT 
			-- hoabk
			user_business_name
			,user_type_business
			,user_open_hour
			,user_long
			,user_lat
			,user_address
			,user_phone
			,user_email
			,user_description
			,user_logo
			,user_slide
			,user_total_view
			FROM user

			WHERE user_id = {$user_id}
			AND user_delete_flg = 0
SQL;
        $select = $this->db->select($query);

        $return['user'] = $select;
        $query = <<<SQL
			SELECT 
			user.user_id
			,user_service.user_service_id
			,user_service.user_service_name
			,user_service.user_service_full_price
			,user_service.user_service_sale_price
			,user_service.user_service_duration
			FROM user_service, user, group_service
			WHERE user.user_id = group_service.group_service_user_id
			AND user_service.user_service_group_id = group_service.group_service_id
			AND user.user_id = {$user_id}
			AND user_service.user_service_is_featured = 1
			AND user_service.user_service_delete_flg = 0
			ORDER BY user_service.user_service_id DESC
SQL;
        $select = $this->db->select($query);
        $return['user_service'] = $select;
        $query = <<<SQL
			SELECT service_type_id, service_type_name
			FROM service_type
SQL;
        $select = $this->db->select($query);
        foreach ($select as $key => $value) {
            $sql = <<<SQL
				SELECT 
				user.user_id
				,user_service.user_service_id
				,user_service.user_service_name
				,user_service.user_service_full_price
				,user_service.user_service_sale_price
				,user_service.user_service_duration
				FROM user_service, user, group_service, service, service_type
				WHERE user.user_id = group_service.group_service_user_id
				AND user_service.user_service_group_id = group_service.group_service_id
				AND user_service.user_service_service_id = service.service_id
				AND service.service_service_type_id = service_type.service_type_id
				AND user.user_id = {$user_id}

				AND service_type.service_type_id = {$value["service_type_id"]}
				AND user_service.user_service_delete_flg = 0;
				ORDER BY user_service.user_service_id DESC

SQL;
            $select_one = $this->db->select($sql);
            $return[$value['service_type_name']] = $select_one;
        }


// 		$sql = <<<SQL
// 			SELECT 	user_service_use_evoucher , COUNT(*) AS count_check
// 			FROM user_service
// 			INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
// 			INNER JOIN user ON user.user_id = group_service.group_service_user_id
// 			WHERE user.user_id = {$user_id}
// 			AND user_service.user_service_delete_flg = 0
// 			GROUP BY user_service_use_evoucher
// SQL;
// 		$select = $this -> db -> select($sql);
// 		$array_voucher = array('evoucher' => 0, 'appointment' => 0, 'gift_voucher' => 0);
// 		foreach ($select as $key => $value) {
// 			if ($value == 0 || $value == 2) {
// 				$array_voucher['appointment'] = 1;
// 			}
// 			if ($value == 1 || $value == 2) {
// 				$array_voucher['evoucher'] = 1;
// 			}
// 		}

        $sql = <<<SQL
			SELECT user_service_use_evoucher, COUNT(*) AS num_evoucher_appointment
			FROM user_service
			INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
			INNER JOIN user ON user.user_id = group_service.group_service_user_id
			WHERE user_id = {$user_id}
			AND user_service_use_evoucher = 2
SQL;
        $select = $this->db->select($sql);
        $array_voucher['num_evoucher_appointment'] = $select[0]['num_evoucher_appointment'];

        // luuhoabk
        $sql = <<<SQL
			SELECT user_service_use_evoucher, COUNT(*) AS num_evoucher
			FROM user_service
			INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
			INNER JOIN user ON user.user_id = group_service.group_service_user_id
			WHERE user_id = {$user_id}
			AND user_service_use_evoucher = 1
SQL;
        $select = $this->db->select($sql);
        $array_voucher['num_evoucher'] = $select[0]['num_evoucher'];

        $sql = <<<SQL
			SELECT user_service_use_evoucher, COUNT(*) AS num_appointment
			FROM user_service
			INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
			INNER JOIN user ON user.user_id = group_service.group_service_user_id
			WHERE user_id = {$user_id}
			AND user_service_use_evoucher = 0
SQL;
        $select = $this->db->select($sql);
        $array_voucher['num_appointment'] = $select[0]['num_appointment'];

        // end luuhoabk
        $array_voucher['gift_voucher'] = 0;
        $sql = <<<SQL
SELECT user_is_use_gvoucher
FROM user
WHERE user_id = {$user_id}
SQL;
        $select = $this->db->select($sql);
        if ($select[0]['user_is_use_gvoucher'] == 1) {
            $array_voucher['gift_voucher'] = 1;
        }
        $return['array_voucher'] = $array_voucher;
        echo json_encode($return);
    }

    public function loadLocationStarRating($user_id)
    {
        $sql = <<<SQL
SELECT user_review_overall, COUNT(*) AS star_amount
FROM user_review
WHERE user_id = {$user_id}
GROUP BY user_review_overall
SQL;
        $select = $this->db->select($sql);
        $client_amount = 0;
        $star_point = 0;
        $result = array();
        $chart_info = array();
        $chart_info['one_star'] = 0;
        $chart_info['two_stars'] = 0;
        $chart_info['three_stars'] = 0;
        $chart_info['four_stars'] = 0;
        $chart_info['five_stars'] = 0;
        foreach ($select as $key => $value) {
            if ($value['user_review_overall'] == '1') {
                $chart_info['one_star'] = $value['star_amount'];
            }
            if ($value['user_review_overall'] == '2') {
                $chart_info['two_stars'] = $value['star_amount'];
            }
            if ($value['user_review_overall'] == '3') {
                $chart_info['three_stars'] = $value['star_amount'];
            }
            if ($value['user_review_overall'] == '4') {
                $chart_info['four_stars'] = $value['star_amount'];
            }
            if ($value['user_review_overall'] == '5') {
                $chart_info['five_stars'] = $value['star_amount'];
            }
        }
        foreach ($select as $key => $value) {
            $star_point = $star_point + $value['user_review_overall'] * $value['star_amount'];
            $client_amount = $client_amount + $value['star_amount'];
        }
        $star_review = $star_point / $client_amount;
        $result['star_review'] = round($star_review, 1);
        $result['client_amount'] = $client_amount;
        $chart_info['client_amount'] = $client_amount;
        $return['general_info'][] = $result;
        $return['chart_info'][] = $chart_info;

        $sql = <<<SQL
SELECT user_review_active, COUNT(*) AS star_amount
FROM user_review
WHERE user_id = {$user_id}
GROUP BY user_review_active
SQL;
        $select = $this->db->select($sql);
        $client_amount = 0;
        $star_point = 0;
        $data = array();
        foreach ($select as $key => $value) {
            $star_point = $star_point + $value['user_review_active'] * $value['star_amount'];
            $client_amount = $client_amount + $value['star_amount'];
        }
        $star_review = $star_point / $client_amount;
        $data['star_review'] = round($star_review, 1);
        $data['review_name'] = 'Sự nhiệt tình';
        //$result['client_amount'] = $client_amount;
        $return['data'][] = $data;
        $sql = <<<SQL
SELECT user_review_clean, COUNT(*) AS star_amount
FROM user_review
WHERE user_id = {$user_id}
GROUP BY user_review_clean
SQL;
        $select = $this->db->select($sql);
        $client_amount = 0;
        $star_point = 0;
        foreach ($select as $key => $value) {
            $star_point = $star_point + $value['user_review_clean'] * $value['star_amount'];
            $client_amount = $client_amount + $value['star_amount'];
        }
        $star_review = $star_point / $client_amount;
        $data['star_review'] = round($star_review, 1);
        $data['review_name'] = 'Vệ sinh';
        //$result['client_amount'] = $client_amount;
        $return['data'][] = $data;
        $sql = <<<SQL
SELECT user_review_quality, COUNT(*) AS star_amount
FROM user_review
WHERE user_id = {$user_id}
GROUP BY user_review_quality
SQL;
        $select = $this->db->select($sql);
        $client_amount = 0;
        $star_point = 0;
        foreach ($select as $key => $value) {
            $star_point = $star_point + $value['user_review_quality'] * $value['star_amount'];
            $client_amount = $client_amount + $value['star_amount'];
        }
        $star_review = $star_point / $client_amount;
        $data['star_review'] = round($star_review, 1);
        $data['review_name'] = 'Chất lượng';
        //$result['client_amount'] = $client_amount;
        $return['data'][] = $data;
        $sql = <<<SQL
SELECT user_review_staff, COUNT(*) AS star_amount
FROM user_review
WHERE user_id = {$user_id}
GROUP BY user_review_staff
SQL;
        $select = $this->db->select($sql);
        $client_amount = 0;
        $star_point = 0;
        foreach ($select as $key => $value) {
            $star_point = $star_point + $value['user_review_staff'] * $value['star_amount'];
            $client_amount = $client_amount + $value['star_amount'];
        }
        $star_review = $star_point / $client_amount;
        $data['star_review'] = round($star_review, 1);
        $data['review_name'] = 'Nhân viên';
        $return['data'][] = $data;
        $sql = <<<SQL
SELECT user_review_valuable, COUNT(*) AS star_amount
FROM user_review
WHERE user_id = {$user_id}
GROUP BY user_review_valuable
SQL;
        $select = $this->db->select($sql);
        $client_amount = 0;
        $star_point = 0;
        foreach ($select as $key => $value) {
            $star_point = $star_point + $value['user_review_valuable'] * $value['star_amount'];
            $client_amount = $client_amount + $value['star_amount'];
        }
        $star_review = $star_point / $client_amount;
        $data['star_review'] = round($star_review, 1);
        $data['review_name'] = 'Giá trị';
        $return['data'][] = $data;
        echo json_encode($return);
    }

    public function loadServiceStarRating($user_id)
    {
        $sql = <<<SQL
SELECT user_service_id
, user_service_name
FROM user_service, user, group_service
WHERE user.user_id = group_service.group_service_user_id
AND user_service.user_service_group_id = group_service.group_service_id
AND user.user_id = {$user_id}
AND user_service.user_service_delete_flg = 0
ORDER BY user_service_id DESC
SQL;
        $select = $this->db->select($sql);
        $return = array();
        foreach ($select as $key => $value) {
            $client_amount = 0;
            $star_point = 0;
            $sql = <<<SQL
SELECT user_service.user_service_name
, service_type.service_type_name
, user_service.user_service_id
, IF(user_service_review.user_service_review_value IS NULL, 0, user_service_review.user_service_review_value) AS user_service_review_value
, COUNT(*) AS star_amount
FROM user_service
INNER JOIN group_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
INNER JOIN service ON user_service.user_service_service_id = service.service_id
INNER JOIN service_type ON service.service_service_type_id = service_type.service_type_id
LEFT JOIN user_service_review ON user_service_review.user_service_id = user_service.user_service_id
WHERE user.user_id = {$user_id}
AND user_service.user_service_id = {$value['user_service_id']}
GROUP BY user_service.user_service_name
, service_type.service_type_name
, user_service_review.user_service_id
, user_service_review.user_service_review_value
SQL;
            $select = $this->db->select($sql);
            foreach ($select as $key => $item) {
                $star_point = $star_point + $item['user_service_review_value'] * $item['star_amount'];
                $client_amount = $client_amount + $item['star_amount'];
            }
            $data['user_service_name'] = $value['user_service_name'];
            if ($client_amount == 0) {
                $data['star_review'] = 0;
            } else {
                $star_review = $star_point / $client_amount;

                $data['star_review'] = round($star_review, 1);
            }
            $data['service_type_name'] = $select[0]['service_type_name'];
            $return['data'][] = $data;
        }
        $group_data = array();
        foreach ($return['data'] as $key => $value) {
            $temp = $value['service_type_name'];
            $j = 0;
            foreach ($return['data'] as $i => $item) {
                if ($temp == $item['service_type_name']) {
                    $group_data[$temp][$j]['user_service_name'] = $item['user_service_name'];
                    $group_data[$temp][$j]['star_review'] = $item['star_review'];
                    $j++;
                }
            }
        }
        //print_r($group_data);
        $return['group_data'][] = $group_data;
        echo json_encode($return);
    }

    public function loadReview($data)
    {
        $result = ($data['review_result']) * RESULT_PER_SHOW_MORE;
        $result_per_show = RESULT_PER_SHOW_MORE;
        $sql = <<<SQL
SELECT COUNT(*) AS number_result
FROM user_review
WHERE user_id = {$data["user_id"]}
AND user_review_status = 1
SQL;
        $select = $this->db->select($sql);
        $return['number_result'] = $select[0]['number_result'];
        $sql = <<<SQL
SELECT user_review_content
,client.client_avatar
,user_review_time
,user_review_date
,CURRENT_DATE as review_current_date
,IF(SUBSTRING(client.client_username,1,4)='[FB]',CONCAT('[FB]',client.client_name),client.client_username) as 'client_username'
,client.client_join_date
-- imtoantran load user's reply       
,client.client_id
, CONCAT(REPEAT(' 	<i class="fa fa-star"></i>',user_review.user_review_overall),REPEAT(' 	<i class="fa fa-star-o"></i>',5-user_review.user_review_overall)) as 'user_review_overall'
--  ,review_replies.content
FROM user_review
JOIN  client
ON  user_review.client_id = client.client_id                       
-- LEFT JOIN review_replies
-- ON user_review.user_id = review_replies.user_id AND user_review.client_id = review_replies.client_id    
WHERE user_review.user_id = {$data["user_id"]}
-- imtoantran load user's reply                        
AND user_review_status = 1
ORDER BY user_review_date DESC
LIMIT {$result},{$result_per_show}
SQL;
        $select = $this->db->select($sql);
        /* imtoantran */
        foreach ($select as $key => $value) {
            # code...
            $query = "SELECT
        		rr.id,
        		rr.user_type,
        		rr.author_id,
        		rr.content,
        		CONCAT(DATE_FORMAT(rr.timecreated,'%d-%m-%Y'),' vào lúc ',DATE_FORMAT(rr.timecreated,'%H:%i')) as timecreated, 
        		rr.status,
        		IFNULL(c.client_name,u.user_business_name) name,
        		IFNULL(c.client_avatar,u.user_logo) avatar
        		FROM review_replies rr
        		LEFT JOIN `user` u
        		ON rr.author_id = u.user_id AND rr.user_type = 'user'
				LEFT JOIN client c 
				ON rr.author_id = c.client_id AND rr.user_type = 'client'
        		WHERE rr.user_id = '{$data['user_id']}' AND 
        		rr.client_id = '{$value['client_id']}'  AND 
        		(rr.`status` NOT LIKE 'unverified')
        		ORDER BY timecreated ASC";
            $content = $this->db->select($query);
            if (!empty($content)) {
                $select[$key]['content'] = $content;
            }
            // print $query;
        }
        $return['client_id'] = $_SESSION['client_id'];
        /* imtoantran */
        $return['data'] = $select;
        echo json_encode($return);
    }

    public function loadPersonReview($data)
    {
        $sql = <<<SQL
SELECT IF(user_review.user_review_content IS NULL, '', user_review.user_review_content) AS user_review_content
, IF(user_review.user_review_overall IS NULL, 0, user_review.user_review_overall) AS user_review_overall
, IF(user_review.user_review_active IS NULL, 0, user_review.user_review_active) AS user_review_active
, IF(user_review.user_review_clean IS NULL, 0, user_review.user_review_clean) AS user_review_clean
, IF(user_review.user_review_quality IS NULL, 0, user_review.user_review_quality) AS user_review_quality
, IF(user_review.user_review_staff IS NULL, 0, user_review.user_review_staff) AS user_review_staff
, IF(user_review.user_review_valuable IS NULL, 0, user_review.user_review_valuable) AS user_review_valuable
FROM client
LEFT JOIN(
    SELECT *
    FROM user_review
    WHERE user_review.user_id = {$data["user_id"]}
	AND user_review.client_id = {$data["client_id"]}
)user_review ON user_review.client_id = client.client_id
WHERE client.client_id = {$data["client_id"]}
SQL;
        $select = $this->db->select($sql);
        $return['user_review'] = $select;
        $sql = <<<SQL
SELECT *
FROM review
SQL;
        $select = $this->db->select($sql);
        $return['review_type'] = $select;
        $sql = <<<SQL
SELECT user_service.user_service_id
,group_service.group_service_user_id AS user_id
,user_service.user_service_name
,IF(user_service_review.user_service_review_value IS NULL,0,user_service_review.user_service_review_value) AS user_service_review_value
FROM user_service
INNER JOIN(
    SELECT group_service_id
    ,group_service_user_id
    FROM group_service
    WHERE group_service_delete_flg = 0
)group_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN(
	SELECT user_id
    FROM user
    WHERE user_delete_flg = 0
)user ON user.user_id = group_service.group_service_user_id
LEFT JOIN(
    SELECT *
    FROM user_service_review
    WHERE client_id = {$data["client_id"]}
)user_service_review ON user_service_review.user_service_id = user_service.user_service_id
WHERE user.user_id = {$data["user_id"]}
AND user_service.user_service_delete_flg = 0
ORDER BY user_service.user_service_id DESC
SQL;
        $select = $this->db->select($sql);
        $return['user_service_review'] = $select;
        echo json_encode($return);
    }

    public function sendReview($data)
    {
        $sql = <<<SQL
SELECT COUNT(*) AS check_review
FROM user_review
WHERE user_id = {$data["user_id"]}
AND client_id = {$data["client_id"]}
SQL;
        $select = $this->db->select($sql);
        if ($select[0]['check_review'] == 0) {
            $sql = <<<SQL
INSERT INTO user_review 
VALUES(
?
,?
,?
,?
,?
,?
,?
,?
,?
,CURRENT_TIME
,CURRENT_DATE
,0)
SQL;
            $insert_array = array();
            foreach ($data as $key => $value) {
                $insert_array[] = $value;
            }
            // echo "$sql";
            // print_r($insert_array);
            // exit;
            $insert = $this->db->prepare($sql);
            $insert->execute($insert_array);
            if ($insert) {
                //update gift point

                $client_id = $data['client_id'];
                $aQuery = <<<SQL
		SELECT client_giftpoint
		FROM client
		WHERE client_id = {$client_id}
SQL;
                $data = $this->db->select($aQuery);
                $current_giftpoint = $data[0]['client_giftpoint'];
                $update_giftpoint = $current_giftpoint + REVIEW_GIFT_POINT;
                $data_update = array(
                    'client_giftpoint' => $update_giftpoint
                );

                $update_giftpoint = $this->db->update("client", $data_update, "client_id = $client_id");
                if ($update_giftpoint) {
                    echo 200;
                } else {
                    echo -1;
                }

            } else {
                echo -1;
            }
        } else {
            $where = 'WHERE user_id = ' . $data['user_id'] . ' AND client_id = ' . $data['client_id'];
            $sql = <<<SQL
UPDATE user_review 
SET 
`user_review_content` = '{$data["user_review_content"]}'
,`user_review_status` = 0
{$where}
SQL;
            $update = $this->db->prepare($sql);
            $update->execute();
            if ($update) {
                echo 200;
            } else {
                echo -1;
            }
        }
    }

    public function sendRating($data)
    {
        $sql = <<<SQL
SELECT user_review_staff+user_review_active+user_review_clean+user_review_staff+user_review_valuable as total_points,{$data['field']} as field_points
FROM user_review
WHERE user_id = {$data["user_id"]}
AND client_id = {$data["client_id"]}
SQL;
        $select = $this->db->select($sql);
        $total_points = $select[0]['total_points'];
        $field_points = $select[0]['field_points'];
        if (count($select) == 0) {
            // them moi rating
            $field = $data['field'];
            $sql = <<<SQL
INSERT INTO user_review 
SET user_id = {$data["user_id"]},
client_id = {$data["client_id"]},
user_review_content = '',
$field = {$data[$data['field']]},
user_review_overall = IF(FLOOR({$data[$data['field']]}/5)=0,1,FLOOR({$data[$data['field']]}/5)),
user_review_date = CURRENT_DATE,
user_review_time = CURRENT_TIME
SQL;
            $insert = $this->db->prepare($sql);
            $insert->execute();
            if ($insert->rowCount() > 0) {
                echo json_encode(200);
            } else {
                echo json_encode(-1);
            }
        } else {
            // cap nhat rating
            $field = $data['field'];
            $where = 'WHERE user_id = ' . $data['user_id'] . ' AND client_id = ' . $data['client_id'];
            $sql = <<<SQL
UPDATE user_review 
SET 
$field = {$data[$data['field']]}
,user_review_overall = FLOOR(($total_points + {$data[$data['field']]} - {$field_points})/5)
{$where}
SQL;

            $update = $this->db->prepare($sql);
            $update->execute();
            if ($update->rowCount() > 0) {
                echo 200;
            } else {
                echo -1;
            }
        }
    }

    public function sendServiceRating($data)
    {
        $sql = <<<SQL
SELECT COUNT(*) AS check_review
FROM user_service_review
WHERE user_service_id = {$data["user_service_id"]}
AND client_id = {$data["client_id"]}
SQL;
        $select = $this->db->select($sql);
        if ($select[0]['check_review'] == 0) {
            $sql = <<<SQL
INSERT INTO user_service_review 
SET user_service_id = {$data["user_service_id"]},
client_id = {$data["client_id"]},
user_service_review_value = {$data["user_service_review_value"]}
SQL;
            $insert = $this->db->prepare($sql);
            $insert->execute();
            if ($insert->rowCount() > 0) {
                echo 200;
            } else {
                echo -1;
            }
        } else {
            $where = 'WHERE user_service_id = ' . $data['user_service_id'] . ' AND client_id = ' . $data['client_id'];
            $sql = <<<SQL
UPDATE user_service_review 
SET 
user_service_review_value = {$data["user_service_review_value"]}
{$where}
SQL;
            $update = $this->db->prepare($sql);
            $update->execute();
            if ($update->rowCount() > 0) {
                echo 200;
            } else {
                echo -1;
            }
        }
    }

    public function get_user_slide($user_id)
    {
        $aQuery = <<<SQL
SELECT user_slide
FROM user
WHERE user_id = {$user_id}
SQL;

        $data = $this->db->select($aQuery);
        echo json_encode($data[0]);
    }

    public function loadFirstConsultingQuestion($user_id)
    {
        $sql = <<<SQL
SELECT DISTINCT 
user_business_name
, service_type_id
, service_type_name
FROM service_type,
service,
user_service,
group_service,
user
WHERE
service_type.service_type_id = service.service_service_type_id
AND service.service_id = user_service.user_service_service_id
AND user_service.user_service_group_id = group_service.group_service_id
AND user.user_id = group_service.group_service_user_id
AND user.user_id = {$user_id}
AND user_delete_flg = 0
AND user_service_delete_flg = 0
SQL;
        $select = $this->db->select($sql);
        echo json_encode($select);
    }

    public function loadConsultingQuestion($data)
    {
        $sql = <<<SQL
SELECT question_id
, question_content
FROM question
WHERE question_service_type_id = {$data['question_service_type_id']}
AND question_delete_flg = 0
SQL;
        $select = $this->db->select($sql);
        $select_array = array();
        $index = 0;
        foreach ($select as $key => $value) {
            $index++;
            $sql = <<<SQL
SELECT *
FROM fact
WHERE fact_question_id = {$value['question_id']}
AND fact_delete_flg = 0
SQL;
            $select_fact = $this->db->select($sql);
            $select_array[$index . ') ' . $value['question_content']] = $select_fact;
        }
        echo json_encode($select_array);
    }

    public function consulting($data)
    {
        Session::initIdle();
        $rule_temp = '';
        if (isset($_SESSION['rule_group'])) {
            $rule_temp = $_SESSION['rule_group'];
            if ($rule_temp == '') {
                $rule_temp = $data['fact_id'];
            } else {
                $rule_temp .= ',' . $data['fact_id'];
            }
        }
        $sql = <<<SQL
SELECT COUNT(*) AS check_rule
FROM rule
WHERE rule_group = '{$rule_temp}'
AND rule_delete_flg = 0
SQL;
        $select_rule_result = $this->db->select($sql);
        if ($select_rule_result[0]['check_rule'] == 1) {
            $sql = <<<SQL
SELECT rule_result
, rule_service_id
FROM rule
WHERE rule_group = '{$rule_temp}'
AND rule_delete_flg = 0
SQL;
            $result = $this->db->select($sql);
            $result[0]['rule_group'] = $rule_temp;
            echo json_encode($result);
        } else if ($select_rule_result[0]['check_rule'] == 0) {
            $sql = <<<SQL
SELECT COUNT(*) AS check_rule
FROM rule
WHERE rule_group LIKE '%{$rule_temp}%'
AND rule_delete_flg = 0
SQL;
            $select_rule = $this->db->select($sql);
            if ($select_rule[0]['check_rule'] > 0) {
                if ($_SESSION['rule_group'] == '') {
                    $_SESSION['rule_group'] = $data['fact_id'];
                } else {
                    $_SESSION['rule_group'] .= ',' . $data['fact_id'];
                }
            }
            echo '[]';
        }
    }

    public function loadAdviseService($data)
    {
        $sql = <<<SQL
SELECT user.user_id
,user_service.user_service_id
,user_service.user_service_name
,user_service.user_service_full_price
,user_service.user_service_sale_price
,user_service.user_service_duration
,service.service_service_type_id
,IF(top.star_amount IS NULL, 0, top.star_amount) AS star_amount
FROM service
INNER JOIN user_service ON user_service.user_service_service_id = service.service_id
INNER JOIN group_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
LEFT JOIN (SELECT 
user_service_id,COUNT(*) AS star_amount
FROM user_service_review
WHERE user_service_review_value = 4
OR user_service_review_value = 5
GROUP BY user_service_id
ORDER BY star_amount DESC
) top ON user_service.user_service_id = top.user_service_id
WHERE user.user_id = {$data['user_id']}
AND service.service_id = {$data['service_id']}
AND service.service_delete_flg = 0
AND user_service.user_service_delete_flg = 0
AND group_service.group_service_delete_flg = 0
AND user.user_delete_flg = 0
ORDER BY user_service.user_service_sale_price ASC
, star_amount DESC
LIMIT 3
SQL;
        $select = $this->db->select($sql);
        echo json_encode($select);
    }

    public function saveHobby($data)
    {
        $hobby_answer_array = explode(',', $data['hobby_answer']);
        $hobby_answer = '';
        foreach ($hobby_answer_array as $key => $value) {
            $check_usal_question = $this->checkUsualQuestion($value);
            if ($check_usal_question == 1) {
                if ($hobby_answer == '') {
                    $hobby_answer = $value;
                } else {
                    $hobby_answer .= ',' . $value;
                }
            }
        }
        $sql = <<<SQL
INSERT INTO hobby(
hobby_service_type_id
, hobby_client_id
, hobby_answer
, hobby_rule
)values(
{$data['service_type_id']}
,{$data['client_id']}
,'$hobby_answer'
,'{$data['hobby_answer']}'
)
SQL;
        $insert = $this->db->prepare($sql);
        $insert->execute();
    }

    function checkUsualQuestion($fact_id)
    {
        $sql = <<<SQL
SELECT COUNT(*) as check_question
FROM question, fact
WHERE question.question_id = fact.fact_question_id
AND fact_id = {$fact_id}
AND question_is_usual = 1
AND question_delete_flg = 0
AND fact_delete_flg = 0
SQL;
        $select = $this->db->select($sql);
        if ($select[0]['check_question'] != 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function loadClientHobby($data)
    {
        $sql = <<<SQL
SELECT hobby_answer, hobby_rule
FROM hobby
WHERE hobby_client_id = {$data['client_id']}
AND hobby_service_type_id = {$data['service_type_id']}
AND hobby_rule != ''
AND hobby_answer != ''
AND hobby_delete_flg = 0
ORDER BY hobby_id DESC
LIMIT 1
SQL;
        $select = $this->db->select($sql);
        if ($select) {
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    public function loadClientHobbyRule($data)
    {
        $sql = <<<SQL
SELECT rule_result
, rule_service_id
, rule_group
FROM rule
WHERE rule_group = '{$data['client_hobby_rule']}'
AND rule_delete_flg = 0
SQL;
        $result = $this->db->select($sql);
        echo json_encode($result);
    }

    /* imtoantran save comment */
    public function saveComment()
    {
        # code...
        $params = $_POST;
        $result = $this->db->select("select value from options where name = 'default_status' and type = 'review_replies'");
        $default_status = $result[0]['value'];
        $data = ['status' => $default_status, 'user_id' => $params['user_id'], 'client_id' => $params['review_id'], 'content' => $params['content'], 'author_id' => $_SESSION['client_id'], 'timecreated' => date("Y-m-d H:i:s"), 'user_type' => 'client'];

        if ($params['content'] != '') {
            $this->db->insert("review_replies", $data);
        }
        print json_encode(['params' => $params, 'session' => $_SESSION]);
        // print json_encode($);
    }

    /* imtoantran save comment */
    public function reportSpam()
    {
        # code...
        $params = $_POST;
        if (isset($_SESSION['client_id'])) {
            $this->db->update('review_replies', ['status' => 'reported'], " `id` = '{$params['id']}'");
        }
        return $_SESSION;
    }

    /* imtoantran bookmark place start */
    public function bookmark()
    {
        $sql = <<<SQL
INSERT INTO bookmark(
client_id
, user_id
, created_date
)values(
{$_SESSION['client_id']},
{$_POST['id']},
CURRENT_TIMESTAMP
)
SQL;
        $insert = $this->db->prepare($sql);
        if ($insert->execute()) {
            return ["success" => true,"message"=>"Đã đánh dấu"];
        }
        return ["success" => false,"message"=>"Đánh dấu"];
    }

    public function isBookmarked($user_id)
    {
        if(isset($_SESSION['client_id'])) {
            $sql = <<<SQL
SELECT count(id) isBookmarked
FROM bookmark
WHERE client_id = {$_SESSION['client_id']}
AND user_id = {$user_id}
SQL;
            $select = $this->db->select($sql);
            if ($select) {
                return $select[0]['isBookmarked'];
            }
            return false;
        }
        return false;
    }
    /* imtoantran bookmark place stop */
}

?>