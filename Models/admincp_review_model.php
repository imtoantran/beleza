<?php

/**
 *
 */
class admincp_review_model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function loadReviewList()
    {
        /* imtoantran edit to load rating star to admincp start */
        $sql = <<<SQL
SELECT client_name
, date_format(user_review.user_review_date,'%d/%m/%Y')
, REPEAT(' <i class="fa fa-star text-danger"></i>',user_review.user_review_overall) as 'user_review_overall'
, user_business_name
, concat(substring(user_review_content,1,100),'...') as 'user_review_content'
, concat('<i class="fa ',IF(user_review_status=0,'fa-times text-danger',IF(user_review_status=1,'fa-check text-success','fa-plus-circle text-primary')),'"></i><span style="display: none">',user_review_status,'</span>') as 'user_review_status'
, user_review.client_id
, user_review.user_id
, user_review.user_review_date created_date
FROM user_review, user, client
WHERE user_review.user_id = user.user_id
AND user_review.client_id = client.client_id
AND user_delete_flg = 0
AND client_is_active = 1
AND user_review_content != ''
ORDER BY client_name ASC
SQL;
        /* imtoantran edit to load rating star to admincp end */
        $select = $this->db->select($sql, [], PDO::FETCH_NUM);
        if ($select) {
            echo json_encode($select);
        }
    }

    /* imtoantran load review start */
    public function loadReviews($status)
    {
        if($status == -1){
            $sql = <<<SQL
UPDATE  user_review
SET user_review_status = 0
WHERE user_review_status = {$status}
AND datediff(CURDATE(),user_review_date) > 0
SQL;
            $this->db->exec($sql);
        }
        /* imtoantran edit to load rating star to admincp start */
        $sql = <<<SQL
SELECT client_name
, date_format(user_review.user_review_date,'%d/%m/%Y')
, REPEAT(' <i class="fa fa-star text-danger"></i>',user_review.user_review_overall) as 'user_review_overall'
, user_business_name
, concat(substring(user_review_content,1,100),'...') as 'user_review_content'
, concat('<i class="fa ',IF(user_review_status=0,'fa-times text-danger',IF(user_review_status=1,'fa-check text-success','fa-plus-circle text-primary')),'"></i><span style="display: none">',user_review_status,'</span>') as 'user_review_status'
, user_review.client_id
, user_review.user_id
FROM user_review, user, client
WHERE user_review.user_id = user.user_id
AND user_review.client_id = client.client_id
AND user_delete_flg = 0
AND client_is_active = 1
AND user_review_content != ''
AND user_review_status = {$status}
ORDER BY client_name ASC
SQL;
        /* imtoantran edit to load new rating star to admincp end */
        $select = $this->db->select($sql, [], PDO::FETCH_NUM);
        if ($select) {
            return $select;
        }
        return [];
    }

    /* imtoantran load review stop */

    public function loadReviewDetailEdit($review_id)
    {
        $temp = explode(',', $review_id);
        $client_id = $temp[0];
        $user_id = $temp[1];
        $sql = <<<SQL
SELECT client_name
, client_username
, client_join_date
, user_business_name
, user_review_content
, user_review_status
, user_review.client_id
, user_review.user_id
FROM user_review, user, client
WHERE user_review.user_id = user.user_id
AND user_review.client_id = client.client_id
AND user_delete_flg = 0
AND client_is_active = 1
AND user_review.client_id = {$client_id}
AND user_review.user_id = {$user_id}
AND user_review_content != ''
ORDER BY client_name ASC
SQL;
        $select = $this->db->select($sql);
        if ($select) {
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    public function editReview($data)
    {
        $temp = explode(',', $data['review_id']);
        $client_id = $temp[0];
        $user_id = $temp[1];
        $sql = <<<SQL
UPDATE user_review
SET user_review_status = 1
WHERE user_review.client_id = {$client_id}
AND user_review.user_id = {$user_id}
SQL;
        $update = $this->db->prepare($sql);
        $update->execute();
        if ($update->rowCount() > 0) {
            $sql = <<<SQL
SELECT client_giftpoint
FROM client
WHERE client_id = {$client_id}
SQL;
            $select = $this->db->select($sql);
            $giftpoint = $select[0]['client_giftpoint'] + REVIEW_GIFT_POINT;
            $sql = <<<SQL
UPDATE client
SET client_giftpoint = {$giftpoint}
WHERE client_id = {$client_id}
SQL;
            $update_1 = $this->db->prepare($sql);
            $update_1->execute();
            if ($update_1->rowCount() > 0) {
                echo 200;
            } else {
                echo 0;
            }

        } else {
            echo 0;
        }
    }

    public function deleteReview($review_id)
    {
        $temp = explode(',', $review_id);
        $client_id = $temp[0];
        $user_id = $temp[1];
        $sql = <<<SQL
UPDATE user_review
SET user_review_content = ''
WHERE user_review.client_id = {$client_id}
AND user_review.user_id = {$user_id}
SQL;
        $update = $this->db->prepare($sql);
        $update->execute();
        if ($update->rowCount() > 0) {
            echo 200;
        } else {
            echo 0;
        }
    }

    /* imtoantran replies management */
    public function loadReplies()
    {
        # code...
        $params = $_POST;
        $sql = "SELECT rr.id,IFNULL(u.user_business_name,c.client_name),rr.content,DATE_FORMAT(rr.timecreated,'%d/%m/%Y vào lúc %H:%i phút'),o.`value`
		FROM review_replies rr
		LEFT JOIN `user` u
		ON u.user_id = rr.author_id and rr.user_type = 'user'
		LEFT JOIN client c
		ON c.client_id = rr.author_id and rr.user_type = 'client'
		LEFT JOIN `options` o
		ON o.`name` = rr.`status` AND o.type = 'replies_status'
		WHERE rr.status = '{$params['status']}'
		GROUP BY rr.id
		ORDER BY timecreated DESC";
        $result = $this->db->select($sql, [], PDO::FETCH_NUM);
        return $result;
    }

    public function loadUserReplies($review_id)
    {
        $temp = explode(',', $review_id);
        $client_id = $temp[0];
        $user_id = $temp[1];
        $sql = <<<SQL
SELECT rr.id,rr.content,date_format(rr.timecreated,'%d-%m-%Y') as timecreated,IFNULL(u.user_business_name,c.client_name) as 'name',o.value as 'status',rr.status as status_code
FROM review_replies rr
LEFT JOIN user u ON u.user_id = rr.author_id and rr.user_type = 'user'
LEFT JOIN client c ON c.client_id = rr.author_id and rr.user_type = 'client'
LEFT JOIN `options` o ON o.`name` = rr.`status` AND o.type = 'replies_status'
WHERE rr.client_id = {$client_id}
AND rr.user_id = {$user_id}
AND rr.content != ''
ORDER BY timecreated ASC
SQL;
        $replies = $this->db->select($sql);
        return $replies;
    }

    public function updateReply()
    {
        $params = $_POST;

        $this->db->update("review_replies", ["status" => $params["status"]], "id={$params['id']}");
        $sql = "SELECT rr.id,rr.status,o.value as status_text FROM review_replies rr JOIN options o ON o.name = rr.status  WHERE rr.id ={$params['id']}";
        $data = $this->db->select($sql);
        return $data[0];
    }

    /* imtoantran replies management */
    public function saveOption()
    {
        # code...
        $value = $_POST['value'];
        $v = 'unverified';
        $message = "Đã tắt tự động duyệt!";
        if (isset($value)) {
            if ($value == 'true') {
                $v = 'auto';
                $message = "Đã bật tự động duyệt!";
            }
        }
        $data = ['status' => $v];
        $this->db->update("options", ['value' => $v], " `name` like 'default_status' ");
        return ["message" => $message];
    }
}

?>