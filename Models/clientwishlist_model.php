<?php
/**
 * 
 */
class clientwishlist_model extends Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function loadClientWishlist() {
		Session::initIdle();
		$client_id = Session::get('client_id');

		$sql = <<<SQL
		SELECT 
			co.*,
			us.*,
			gs.*,
			u.*
		FROM 
			client_option co,
			user_service us,
			group_service gs,
			user u
		WHERE
			co.option_id   = us.user_service_id
		AND	us.user_service_group_id   = gs.group_service_id
		AND	u.user_id   = gs.group_service_user_id
		AND	co.client_id   = {$client_id}
		AND co.option_type = 'service'

		ORDER BY created_at DESC
SQL;
		$select = $this->db->select($sql);
		echo json_encode($select); exit;

		if($select){
			echo json_encode($select);
		}else{
			echo "[]";
		}
	}
	public function deleteItemWishlist($service_id) {
		Session::initIdle();
		$client_id = Session::get('client_id');

		$table = 'client_option';
		$where = "client_id = $client_id AND option_id = $service_id  AND option_type = 'service'";
		$result = $this->db->delete($table, $where);
		if($result) {
			echo 1;
		} else {
			echo -1;
		}

	}





	/**
	 * Chấp nhận lịch hẹn bị đổi từ email
	 */
	public function get_data_send_mail($data_id) {
		$aQuery = <<<SQL
		SELECT 
			b.booking_id as 'data_booking_id',
			bd.booking_detail_id as 'data_id', 
			bd.booking_detail_date as 'data_date', 
			bd.booking_detail_time_start as 'data_time_start', 
			bd.booking_detail_time_end as 'data_time_end',
			bd.booking_detail_price as 'data_price', 
			bd.booking_detail_note as 'data_note', 
			us.user_service_id as 'data_us_id', 
			us.user_service_name as 'data_us_name', 
			us.user_service_duration as 'data_us_duration', 
			c.client_id as 'data_client_id', 
			c.client_name as 'data_client_name', 
			c.client_phone as 'data_client_phone',
			c.client_sex as 'data_client_sex', 
			c.client_email as 'data_client_email', 
			c.client_birth as 'data_client_birth',
			c.client_note as 'data_client_note',
			bd.booking_detail_status as 'data_status',
			bd.booking_detail_is_confirm as 'data_is_confirm',
			bd.booking_detail_request_change as 'data_request_change',
			-- us.user_service_full_price as 'data_us_full_price', 
			-- us.user_service_sale_price as 'data_us_sale_price',
			bd.booking_detail_created as 'data_created',
			bd.booking_detail_updated as 'data_updated',
			u.user_id as 'data_user_id',
			u.user_business_name as 'data_user_business_name',
			u.user_notification_email as 'data_user_notification_email'
		FROM 
			booking b, 
			booking_detail bd, 
			client c, 
			user_service us,
			user u
		WHERE 
				bd.booking_detail_id = {$data_id}
			AND bd.booking_detail_booking_id = b.booking_id
			AND us.user_service_id = bd.booking_detail_user_service_id
			AND b.booking_client_id = c.client_id
			AND bd.booking_detail_user_id = u.user_id
SQL;

		$data = $this->db->select($aQuery);

		return $data[0];
	}

	public function confirm_appointment($booking_detail_id) {
		$result = false;
		// Dữ liệu liên quan
		$data_sendMail = self::get_data_send_mail($booking_detail_id);

		$data = array(
			"booking_detail_is_confirm" => 1,
			"booking_detail_client_response" => 1,
			"booking_detail_request_change" => 0
		);

		$result = $this->db->update("booking_detail", $data, "booking_detail_id = $booking_detail_id");		

		if($result) {

			$params = array();

			$email = new email_template();        
	        /*         * ************************* */
	        //if (!$mail->Send()) {
	        if (!$email->send($data_sendMail["data_user_notification_email"], $params,'client_accepted_your_new_time_services')) {
	            echo "Mailer Error: " . $email->ErrorInfo;
	            exit();
	        }

			// Verify notification
			$verify_tpl_file = OTHER_LIBS . 'template/verify/verify_service_response/index.html';
			$verify_msg_tmpl = file_get_contents($verify_tpl_file);
			$verify_index = array(
				'{{NOTIFICATION_ALERT}}',
				'{{NOTIFICATION_CONTENT}}'
			);
			$verify_value = array(
				'Thông báo xác nhận lịch hẹn',
				'Bạn đã xác nhận lịch hẹn.'
			);
			$verify_msg_tmpl = str_replace($verify_index, $verify_value, $verify_msg_tmpl);
			/* imtoantran fix wrong header output order start */
			header("refresh:5;url=" . URL . "bookinghistory");
			echo $verify_msg_tmpl;
			/* imtoantran fix wrong header output order stop */
		} else {
			header('location:' . URL );
		}
	}

	/**
	 * Ko Chấp nhận lịch hẹn bị đổi từ email
	 */
	public function not_confirm_appointment($booking_detail_id) {
		$result = false;
		// Dữ liệu liên quan
		$data_sendMail = self::get_data_send_mail($booking_detail_id);

		$data = array(
			"booking_detail_is_confirm" => 2,
			"booking_detail_client_response" => 1,
			"booking_detail_request_change" => 1
		);
		$result = $this->db->update("booking_detail", $data, "booking_detail_id = $booking_detail_id");


		if($result) {
			// $params = array(
			// );

			// $email = new email_template();        
	  //       /*         * ************************* */
	  //       //if (!$mail->Send()) {
	  //       if (!$email->send($data_sendMail["data_user_notification_email"], $params,'client_accepted_your_new_time_services')) {
	  //           echo "Mailer Error: " . $email->ErrorInfo;
	  //           exit();
	  //       }

			// Verify notification
			$verify_tpl_file = OTHER_LIBS . 'template/verify/verify_service_response/index.html';
			$verify_msg_tmpl = file_get_contents($verify_tpl_file);
			$verify_index = array(
				'{{NOTIFICATION_ALERT}}',
				'{{NOTIFICATION_CONTENT}}'
			);
			$verify_value = array(
				'Thông báo đổi lịch hẹn',
				'Bạn đã yêu cầu đổi lịch hẹn.<br>Bạn có thể đổi lịch hẹn trong lịch sử book của bạn.'
			);
			$verify_msg_tmpl = str_replace($verify_index, $verify_value, $verify_msg_tmpl);
			/* imtoantran fix wrong header output order start */
			header("refresh:5;url=" . URL . "bookinghistory");
			echo $verify_msg_tmpl;
			/* imtoantran fix wrong header output order stot */
		} else {
			header('location:' . URL . 'error');
		}
	}


	/**
	 * Khách hàng Hủy lịch hẹn từ email
	 */
	public function cancel_appointment($booking_detail_id) {
		$result = false;
		// Dữ liệu liên quan
		$data_sendMail = self::get_data_send_mail($booking_detail_id);

		// Điểm credit point cộng cho khách hàng
		$credit_point =floor($data_sendMail['data_price'] / MONEY_PER_POINT);
		$client_id = $data_sendMail['data_client_id'];// id khách hàng
		// Cập nhật credit point cho khách hàng

		if(isset($_GET['isConfirm'])) {
			if(!self::add_credit_point($client_id, $credit_point)){
				die('add client credit point error!');
				exit;
			}
			// chua xac dinh duoc gift point tra ve da thanh toan bang credit_point hay la tien mat
//			if(!self::update_giftpoint($client_id, ($credit_point * MONEY_PER_POINT) / PAYMENT_GIFT_POINT)){
//				die('update gift point error!');
//				exit;
//			}
		}

		// Nếu khách hàng đồng ý bằng nút chấp nhận Hủy
		if(!isset($_GET['isConfirm'])) {
			$confirm_tpl_file = OTHER_LIBS . 'template/verify/verify_service_response/cancel_booking/index.php';
			$confirm_msg_tmpl = file_get_contents($confirm_tpl_file);
			$confirm_msg_tmpl = str_replace("{{URL}}", self::curPageURL() . "&isConfirm=true", $confirm_msg_tmpl);
			$confirm_msg_tmpl = str_replace("{{ABORT_URL}}", URL."bookinghistory",$confirm_msg_tmpl);
			echo $confirm_msg_tmpl;
			return false;
		}

		// Cập nhật lịch
		$data = array(
			"booking_detail_status" => 2,
			"booking_detail_client_response" => 1,
			"booking_detail_request_change" => 0
		);
		$result = $this->db->update("booking_detail", $data, "booking_detail_id = $booking_detail_id");

		if($result) {
			// Gửi mail
			$params = ["SPA_NAME"=>$data_sendMail['data_user_business_name']];

			$email = new email_template();        
	        /*         * ************************* */
	        //if (!$mail->Send()) {
	        if (!$email->send($data_sendMail["data_user_notification_email"], $params,'spaOrderCanceled')) {
	            echo "Mailer Error: " . $email->ErrorInfo;
	            exit();
	        }

			// Verify notification
			$verify_tpl_file = OTHER_LIBS . 'template/verify/verify_service_response/index.html';
			$verify_msg_tmpl = file_get_contents($verify_tpl_file);
			$verify_index = array(
				'{{NOTIFICATION_ALERT}}',
				'{{NOTIFICATION_CONTENT}}'
			);
			$verify_value = array(
				'Thông báo hủy lịch hẹn',
				'Bạn đã yêu cầu hủy lịch hẹn.<br>Bạn được cộng <strong>' . $credit_point . '</strong> credit point vào tài khoản.'
			);
			$verify_msg_tmpl = str_replace($verify_index, $verify_value, $verify_msg_tmpl);
			/* imtoantran fix wrong header output order start */
			header("refresh:5;url=" . URL . "bookinghistory");
			echo $verify_msg_tmpl;
			/* imtoantran fix wrong header output order stop */
		} else {
			header('location:' . URL . 'error');
		}
	}

	/**
	 * Kiểm tra xem khách hàng đã hồi âm chưa, 
	 * nếu rồi thì tất cả các hồi âm khác ko còn tác dụng
	 */
	public function check_client_response ($booking_detail_id) {
		$aQuery = <<<SQL
		SELECT booking_detail_client_response
		FROM booking_detail
		WHERE booking_detail_id = {$booking_detail_id}
SQL;
		$data = $this->db->select($aQuery);

		if($data[0]['booking_detail_client_response'] == 1) {
			return true;
		}

		return false;
	}

	/**
	 * Thông tin chi tiết lịch hẹn (booking_detail)
	 * @param user_id
	 * @param $_GET['data_id'] : booking_detail_id
	 * @return json
	 */
	public function get_booking_detail ($booking_detail_id) {
		$aQuery = <<<SQL
		SELECT 
			bd.booking_detail_user_id as 'data_user_id', 
			bd.booking_detail_date as 'data_date', 
			bd.booking_detail_time_start as 'data_time_start', 
			bd.booking_detail_time_end as 'data_time_end',
			bd.booking_detail_price as 'data_price', 
			bd.booking_detail_note as 'data_note', 
			us.user_service_id as 'data_us_id', 
			us.user_service_name as 'data_us_name', 
			us.user_service_duration as 'data_us_duration', 
			-- c.client_id as 'data_client_id', 
			-- c.client_name as 'data_client_name', 
			-- c.client_phone as 'data_client_phone',
			-- c.client_sex as 'data_client_sex', 
			-- c.client_email as 'data_client_email', 
			-- c.client_birth as 'data_client_birth',
			-- c.client_note as 'data_client_note',
			bd.booking_detail_status as 'data_status',
			bd.booking_detail_is_confirm as 'data_is_confirm',
			-- us.user_service_full_price as 'data_us_full_price', 
			-- us.user_service_sale_price as 'data_us_sale_price',
			bd.booking_detail_created as 'data_created',
			bd.booking_detail_updated as 'data_updated',
			u.user_business_name as 'data_u_bname'
		FROM 
			booking b, 
			booking_detail bd, 
			client c, 
			user_service us,
			user u
		WHERE 
				-- bd.booking_detail_user_id = {$user_id}
			 bd.booking_detail_id = {$booking_detail_id}
			AND bd.booking_detail_booking_id = b.booking_id
			AND us.user_service_id = bd.booking_detail_user_service_id
			AND b.booking_client_id = c.client_id
			AND u.user_id = bd.booking_detail_user_id
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	/**
	 * Danh sách giờ mở cửa của địa điểm spa
	 * @param Session::get('user_id') : user_id 
	 * @return json
	 */
	function get_user_open_hour($user_id) {
		$query = "SELECT user_open_hour FROM user WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo $result[0]['user_open_hour']; // Its json
	}

	public function get_time_auto_confirm_spa($user_id){
		$sql =<<<SQL
        SELECT user_limit_auto_confirm
        FROM user
        WHERE user_id = {$user_id}
SQL;
        $select = $this->db->select($sql);
        $minuteSpa = $select[0]['user_limit_auto_confirm'];
        // check and compare date 
        
         $now = date('Y-m-d H:i:s');
         $dateSPA = strtotime($now)+($minuteSpa*60);
		 echo date("Y-m-d H:i:s", $dateSPA);
    }

	// Giới hạn cho phép đặt trùng giờ của dịch vụ 
	public function get_user_service_limit_booking($user_service_id) {
		$aQuery = <<<SQL
		SELECT user_service_limit_booking
		FROM user_service
		WHERE user_service_id = {$user_service_id}
SQL;
		$data = $this->db->select($aQuery);

		return $data[0]["user_service_limit_booking"];
	}

	public function get_appointment_confirmed($user_id) {
		$us_id 	= $_GET['us_id']; // user_service_id
		$date 	= $_GET['date']; // ngày đặt hẹn

		// Giới hạn cho phép đặt trùng giờ của dịch vụ này là:
		$limit_book = self::get_user_service_limit_booking($us_id);

		// Lấy danh sách lịch hẹn từ appointment
		$aQuery_app = <<<SQL
		SELECT 
			a.appointment_date,
			a.appointment_time_start,
			a.appointment_time_end
		FROM
			appointment a
			-- user_service us
		WHERE 
				a.appointment_user_id = {$user_id}
			AND a.appointment_user_service_id = {$us_id}
			AND a.appointment_date = '{$date}'
			-- AND us.user_service_limit_booking
			-- AND a.appointment_is_confirm = 1
SQL;
		$data_app = $this->db->select($aQuery_app);

		// Lấy danh sách lịch hẹn từ booking_detail
		$aQuery_bkdetail = <<<SQL
		SELECT
			booking_detail_date,
			booking_detail_time_start,
			booking_detail_time_end
		FROM
			booking_detail
		WHERE
				booking_detail_user_id = {$user_id}
			AND booking_detail_user_service_id = {$us_id}
			AND booking_detail_date = '{$date}'
			-- AND booking_detail_is_confirm = 1
SQL;
		$data_bkdetail = $this->db->select($aQuery_bkdetail);

		// Chèn dữ liệu vào mảng data_schedule 
		$data_schedule = array(
			"user_service_limit_booking" => $limit_book
		);

		foreach ($data_app as $app) {
			$data_schedule[] = array(
				"schedule_date"			=> $app["appointment_date"],
				"schedule_time_start"	=> $app["appointment_time_start"],
				"schedule_time_end"		=> $app["appointment_time_end"]
			);
		}

		foreach ($data_bkdetail as $bkdetail) {
			$data_schedule[] = array(
				"schedule_date"			=> $bkdetail["booking_detail_date"],
				"schedule_time_start"	=> $bkdetail["booking_detail_time_start"],
				"schedule_time_end"		=> $bkdetail["booking_detail_time_end"]
			);
		}

		// Xuất dữ liệu
		echo json_encode($data_schedule);
	}



	/**
	 * Lấy thông tin dịch vụ (user_service)
	 * @param $_GET['user_service_id'] : id của dịch vụ đó
	 * @return json
	 */
	public function get_user_service($us_id) {
		$aQuery = <<<SQL
		SELECT 
			user_service_id,
			user_service_name,
			user_service_duration,
			user_service_sale_price,
			user_service_full_price
		FROM user_service
		WHERE user_service_id = {$us_id}
SQL;

		$data = $this->db->select($aQuery);
		echo json_encode($data);
	}

	/**
	 * KH Cap nhat lich book moi
	 * @param $_GET['user_service_id'] : id của dịch vụ đó
	 * @return json
	 */
	public function update_booking_detail($booking_detail_id) {
		$result = false;

		$data_sendMail = self::get_data_send_mail($booking_detail_id);

		$booking_detail_user_id = $_POST['bd_u_id'];
		$booking_detail_user_service_id = $_POST['bd_us_id'];

		if($data_sendMail['data_request_change'] == 0 || $data_sendMail['data_us_id'] != $booking_detail_user_service_id || $data_sendMail['data_user_id'] != $booking_detail_user_id) {
			echo 'error';
			return false;
		}

		$data = array(
			"booking_detail_date" => $_POST['bd_date'],
			"booking_detail_time_start" => $_POST['bd_time_start'],
			"booking_detail_time_end" => $_POST['bd_time_end'],
			"booking_detail_client_response" => 0,
			"booking_detail_request_change" => 0
		);

		$result = $this->db->update("booking_detail", $data, "booking_detail_id = $booking_detail_id");
		$data_sendMail_new = self::get_data_send_mail($booking_detail_id);

		if($result) {
			$params = array(
				'SPA_NAME' => $data_sendMail_new["data_user_business_name"],
				'CLIENT_NAME' => $data_sendMail_new["data_client_name"],
				'SERVICE_NAME' => $data_sendMail_new["data_us_name"],
				'NEW_DATE' => $data_sendMail_new["data_date"],
				'NEW_START_TIME' => $data_sendMail_new["data_time_start"]
			);

			$email = new email_template();        
	        /*         * ************************* */
	        //if (!$mail->Send()) {
	        if (!$email->send($data_sendMail["data_user_notification_email"], $params,'Client_Pick_A_New_Booking_Time')) {
	            echo "Mailer Error: " . $email->ErrorInfo;
	            exit();
	        }

			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function add_credit_point($client_id, $credit_point) {
		$aQuery = <<<SQL
		SELECT client_creditpoint
		FROM client
		WHERE client_id = {$client_id}
SQL;
		$data = $this->db->select($aQuery);

		$current_creaditpoint = $data[0]['client_creditpoint'];

		$update_creditpoint = $current_creaditpoint + $credit_point;

		$data_update = array(
			'client_creditpoint' => $update_creditpoint
		);

		$result = $this->db->update("client", $data_update, "client_id = $client_id");

		if($result){
			$_SESSION['client_creditpoint'] = $update_creditpoint;

			return true;
		}

		return false;
	}

	public function update_giftpoint($client_id, $gift_point) {
		$aQuery = <<<SQL
		SELECT client_giftpoint
		FROM client
		WHERE client_id = {$client_id}
SQL;
		$data = $this->db->select($aQuery);

		$current_giftpoint = $data[0]['client_giftpoint'];

		$update_giftpoint = $current_giftpoint - $gift_point;

		$data_update = array(
			'client_giftpoint' => $update_giftpoint
		);

		$result = $this->db->update("client", $data_update, "client_id = $client_id");

		if($result){
			$_SESSION['client_giftpoint'] = $update_giftpoint;
			return true;
		}

		return false;
	}

	//////////////////////////// CHỨC NĂNG ////////////////////////
	function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

}

?>