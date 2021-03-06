<?php

class Admincp_Spa_Model extends Model {
	function __construct() {
		parent::__construct();
	}

	function loadSpaList() {
		$sql = <<<SQL
SELECT
user_id
, user_business_name
, user_full_name
, user_email
, user_phone
, user_address
, user_status_approve
-- imtoantran load unpublished field --
, user_unpublished  
-- imtoantran load unpublished field --                        
FROM user
WHERE user_delete_flg = 0
SQL;
		$select = $this -> db -> select($sql);
		echo json_encode($select);
	}

	public function checkSpaEmailExist($email) {
		$sql = <<<SQL
SELECT COUNT(*) AS check_email
FROM user
WHERE user_email = '{$email}'
SQL;
		$select = $this -> db -> select($sql);
		return $select[0]['check_email'];
	}

	public function addSaveDetail($data) {
		$password = Hash::create('md5', $data['user_password'], HASH_PASSWORD_KEY);
		$sql = <<<SQL
INSERT INTO user(
user_full_name
, user_email
, user_notification_email
, user_password
, user_business_name
, user_address
, user_phone
, user_city_id
, user_district_id
, user_unpublished
, user_status_approve
)
VALUES(
'{$data['user_full_name']}'
, '{$data['user_email']}'
, '{$data['user_email']}'
, '{$password}'
, '{$data['user_business_name']}'
, '{$data['user_address']}'
, '{$data['user_phone']}'
, '{$data['user_city_id']}'
, '{$data['user_district_id']}'
, 1
, 1
)
SQL;
		$insert = $this -> db -> prepare($sql);
		$insert -> execute();
		if ($insert -> rowCount() > 0) {
			//Nội dung email
			// $body = '<h1>BELEZA Thông Báo</h1>';
			// $body .= '<p>Bạn đã yêu tài khoản trên BELEZA</p>';
			// $body .= '<p>Tên đăng nhập của bạn trên BELEZA connect là: ' . $data['user_email'] . '</p>';
			// $body .= '<p>Mật khẩu đăng nhập trên BELEZA connect của bạn là: <h3><strong><i>' . $data['user_password'] . '</i></strong></h3></p>';
			// $body .= '<p>Hãy đăng nhập lại và đổi password của bạn nhé </p>';
			// $body .= '<p>Chúc một bạn ngày mới tốt lành</p>';
			// $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';

			// //Gửi mail local
			// $mail = new PHPMailer(TRUE);
			// $mail -> CharSet = "UTF-8";
			// // create a new object
			// $mail -> IsSMTP();
			// // enable SMTP
			// $mail -> SMTPDebug = 1;
			// // debugging: 1 = errors and messages, 2 = messages only
			// $mail -> SMTPAuth = true;
			// // authentication enabled
			// $mail -> SMTPSecure = 'ssl';
			// // secure transfer enabled REQUIRED for GMail
			// $mail -> Host = SMTP_MAIL;
			// $mail -> Port = 465;
			// // or 587
			// $mail -> IsHTML(true);
			// $mail -> Username = INFO_MAIL;
			// $mail -> Password = PASS_MAIL;
			// $mail -> SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
			// $mail -> Subject = "Thông tin tạo địa điểm từ Beleza!";
			// $mail -> Body = $body;
			// $mail -> AddAddress($data['user_email']);
                        /**
                         * @IMTOANTRAN
                         * Đăng ký BELEZA Connect
                         */
                        $to = $data['user_email'];
                        $params = [
                            "CLIENT_EMAIL" => $data['user_email'],
                            "PASSWORD" => $data['user_password'],
                        ];
            $email = new email_template();                        
			//if (!$mail -> Send()) {
			if (!$email->send($to, $params, 'userBELEZAConnect')) {
                        /*                         * ************************* */
			} else {
				echo 200;
			}
		} else {
			echo 0;
		}
	}

	public function loadUserDetail($data) {
		$sql = <<<SQL
SELECT
user_id
, user_business_name
, user_full_name
, user_email
, user_phone
, user_address
, user_district_id
, user_status_approve
-- imtoantran add unpublished field --                        
, user_unpublished
-- imtoantran add unpublished field --
-- imtoantran add additional info --
, user_open_hour
,user_type_business
,user_is_use_gvoucher
,user_is_use_evoucher
,user_is_use_appointment
,user_limit_before_service
,user_limit_before_booking
,user_notification_email    
,user_facebook
,user_googleplus
,user_website
,user_city_id    
-- imtoantran add additional info --
FROM user
WHERE user_delete_flg = 0
AND user_id = {$data['user_id']}
SQL;
		$select = $this -> db -> select($sql);
		echo json_encode($select);
	}

	public function saveEditDetail($data) {
		$sql = <<<SQL
UPDATE user
SET user_full_name = '{$data['user_full_name']}'
, user_district_id = '{$data['user_district_id']}'
, user_city_id = '{$data['user_city_id']}'
, user_address = '{$data['user_address']}'
, user_phone = '{$data['user_phone']}'
WHERE user_id = '{$data['user_id']}'
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}
	/* imtoantran save option display */
	public function saveDisplayOption(){
		$value = 0;
if($_POST['disable']=="true")
	$value = 1;
		$sql = <<<SQL
UPDATE user
SET
	user_unpublished = '{$value}'
WHERE user_id = '{$_POST['user_id']}'
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo json_encode(["success"=>true,"message"=>"Cập nhật thành công"]);
		} else {
			echo json_encode(["success"=>false,"message"=>"Cập nhật thất bại"]);
		}
	}
	/* imtoantran save option display */
	public function deleteUser($data) {
		$sql = <<<SQL
UPDATE user
SET user_delete_flg = 1
WHERE user_id = '{$data['user_id']}'
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}
	
	public function approveUser($data){
		$password = Hash::create('md5', $data['user_password'], HASH_PASSWORD_KEY);
		$sql = <<<SQL
UPDATE user
SET user_status_approve = 1
, user_password = '{$password}'
WHERE user_id = '{$data['user_id']}'
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}

}
