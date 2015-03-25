<?php

/**
 * @author imtoantran
 */
class SpaCMS_Reviews_Model {

    public function loadReviews() {
$sql = <<<SQL
SELECT
client_name    
,client_phone         
,client_email         
,ur.user_review_date         
,case client_sex  when '0' then 'Nữ' else 'Nam' end as client_sex
, client_username
, client_join_date
-- , user_business_name
,user_review_content
-- , user_review_status
, ur.client_id
, ur.user_id
,rr.user_type
,rr.timecreated
,rr.note
, REPEAT(' <i class="fa fa-star text-danger"></i>',ur.user_review_overall) as 'user_review_overall'
FROM user_review ur
LEFT JOIN  user u ON ur.user_id = u.user_id AND u.user_delete_flg = 0 
LEFT JOIN client c ON ur.client_id = c.client_id AND c.client_is_active = 1
lEFT JOIN (SELECT user_id,client_id,user_type,timecreated,note FROM review_replies ORDER BY timecreated DESC) rr
ON rr.client_id = ur.client_id AND rr.user_id = ur.user_id
WHERE 
ur.user_review_status = 1
AND ur.user_review_content != ''
AND ur.user_id = '{$_SESSION['user_id']}'
GROUP BY ur.user_review_content              
ORDER BY ur.user_review_date ASC
SQL;
    return $select = $this->db->select($sql);
}
    // load phản hồi
    public function loadReplies() {
        $params = $_POST;
                $t = $this->db->update("review_replies",["note"=>"viewed"]," user_id = '{$params['user_id']}' AND client_id = '{$params['client_id']}'");
                $query = "SELECT 
                rr.id,
                rr.user_type,
                rr.author_id,
                rr.content,
                DATE_FORMAT(rr.timecreated,'%d/%m/%Y vào lúc %h:%i:%s') as timecreated,
                rr.status,
                IFNULL(c.client_name,u.user_business_name) name,
                IFNULL(c.client_avatar,u.user_logo) avatar
                FROM review_replies rr
                LEFT JOIN `user` u
                ON rr.author_id = u.user_id AND rr.user_type = 'user'
                LEFT JOIN client c 
                ON rr.author_id = c.client_id AND rr.user_type = 'client'
                WHERE rr.user_id = '{$params['user_id']}' AND 
                rr.client_id = '{$params['client_id']}'  AND 
                rr.`status` NOT LIKE 'unverified'
                ORDER BY timecreated ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function saveReply() {
        $date = date("Y-m-d H:i:s");
        $params = $_POST;
        $result = $this->db->select("select value from options where name = 'default_status' and type = 'review_replies'");
        $default_status = $result[0]['value'];        
        $sql = <<<SQL
INSERT INTO review_replies(`status`,`content`,`user_id`,`client_id`,`timecreated`,`user_type`,`author_id`)
VALUES ('{$default_status}','{$params['content']}','{$params['user_id']}','{$params['client_id']}','{$date}','user',{$params['user_id']})
SQL;
        $insert = $this->db->prepare($sql);
        return ["success"=>$insert->execute(),"username"=>$_SESSION['user_business_name']];
    }
}
