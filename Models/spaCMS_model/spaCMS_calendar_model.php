<?php

class SpaCMS_Calendar_Model {

	/**
	 * Get lịch hẹn (appointment & booking_detail) từ ngày start -> end
	 * @param user_id
	 * @param $_GET['start'] : 
	 * @param $_GET['end'] : Ngày kết thúc
	 * @return json
	 */
	public function get_calendar() {
		$user_id 	= Session::get('user_id');
		$start_date = $_GET['start'];
		$end_date 	= $_GET['end'];

		$appointments 	= self::get_appointments($user_id, $start_date, $end_date);
		$bookings 		= self::get_bookings($user_id, $start_date, $end_date);

		$data = array();
		foreach ($appointments as $a) {
			$start 	= $a['appointment_date'] . 'T' . $a['appointment_time_start'];
			$end 	= $a['appointment_date'] . 'T' . $a['appointment_time_end'];

			$className = 'e-appointment';

			// Lịch hẹn đã xác thực -> có dấu tích
			if( $a['appointment_is_confirm'] == 1 ) {
				$className .= ' confirmed';
			}

			$data[] = array(
				'a_id' 		=> $a['appointment_id'],
				'title' 	=> $a['appointment_title'],
				'start' 	=> $start,
				'end' 		=> $end,
				'className' => $className
			);
		}

		foreach ($bookings as $b) {
			$start 	= $b['booking_detail_date'] . 'T' . $b['booking_detail_time_start'];
			$end 	= $b['booking_detail_date'] . 'T' . $b['booking_detail_time_end'];

			$className = 'e-booking';

			// Lịch hẹn đang chờ đổi -> màu xanh
			if( $b['booking_detail_request_change'] == 1 ) {
				$className = 'e-booking-request-change';
			}

			// Lịch hẹn đã xác thực -> có dấu tích
			if( $b['booking_detail_is_confirm'] == 1 ) {
				$className .= ' confirmed';
			}

			$data[] = array(
				'b_id' 		=> $b['booking_detail_id'],
				'title' 	=> $b['client_name'],
				'start' 	=> $start,
				'end' 		=> $end,
				'className' => $className
			);
		}

		echo json_encode($data); 
	}

	public function get_appointments($user_id, $start_date, $end_date) {
		$aQuery = <<<SQL
		SELECT 
			a.appointment_id, 
			a.appointment_title,
			a.appointment_date, 
			a.appointment_time_start, 
			a.appointment_time_end,
			a.appointment_is_confirm,
			a.appointment_client_name 
		FROM appointment a
		WHERE 
				a.appointment_user_id = {$user_id}
			AND a.appointment_date BETWEEN '{$start_date}' AND '{$end_date}'
			-- AND a.appointment_del_flag = 0
			AND ( a.appointment_status = 0 OR a.appointment_status = 1 )
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function get_bookings($user_id, $start_date, $end_date) {
		$aQuery = <<<SQL
		SELECT 
			bd.booking_detail_id, 
			c.client_name,
			bd.booking_detail_date, 
			bd.booking_detail_time_start, 
			bd.booking_detail_time_end,
			bd.booking_detail_is_confirm,
			bd.booking_detail_request_change
			-- b.booking_status
		FROM 
			booking b, 
			booking_detail bd, 
			client c
		WHERE 
				bd.booking_detail_user_id = {$user_id}
			AND bd.booking_detail_date BETWEEN '{$start_date}' AND '{$end_date}'
			AND bd.booking_detail_booking_id = b.booking_id
			AND c.client_id = b.booking_client_id
			-- AND bd.booking_detail_del_flag = 0
			AND ( bd.booking_detail_status = 0 OR bd.booking_detail_status = 1 )
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	/**
	 * Thông tin chi tiết lịch hẹn (appointment)
	 * @param user_id
	 * @param $_GET['data_id'] : appointment_id
	 * @return json
	 */
	public function get_appointment() {
		$user_id = Session::get('user_id');
		$appointment_id = $_GET['data_id'];

		$aQuery = <<<SQL
		SELECT 
			a.appointment_id as 'data_id',
		 	a.appointment_date as 'data_date', 
			a.appointment_time_start as 'data_time_start', 
			a.appointment_time_end as 'data_time_end',
			a.appointment_price as 'data_price',
			a.appointment_note as 'data_note',
			us.user_service_id as 'data_us_id', 
			us.user_service_name as 'data_us_name', 
			us.user_service_duration as 'data_us_duration',
			'' as 'data_client_id',  
			a.appointment_client_name as 'data_client_name',
			a.appointment_client_phone as 'data_client_phone', 
			a.appointment_client_sex as 'data_client_sex', 
			a.appointment_client_email as 'data_client_email', 
			a.appointment_client_birth as 'data_client_birth',
			a.appointment_client_note as 'data_client_note',
			a.appointment_status as 'data_status',
			a.appointment_is_confirm as 'data_is_confirm',
			-- us.user_service_full_price as 'data_us_full_price', 
			-- us.user_service_sale_price as 'data_us_sale_price',
			a.appointment_created as 'data_created',
			a.appointment_updated as 'data_updated'
		FROM 
			appointment a, 
			user_service us
		WHERE 
				a.appointment_user_id = {$user_id}
			AND a.appointment_id = {$appointment_id}
			AND a.appointment_user_service_id = us.user_service_id
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data);
	}

	/**
	 * Thông tin chi tiết lịch hẹn (booking_detail)
	 * @param user_id
	 * @param $_GET['data_id'] : booking_detail_id
	 * @return json
	 */
	public function get_booking() {
		$user_id = Session::get('user_id');
		$booking_detail_id = $_GET['data_id'];

		$aQuery = <<<SQL
		SELECT 
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
			-- us.user_service_full_price as 'data_us_full_price', 
			-- us.user_service_sale_price as 'data_us_sale_price',
			bd.booking_detail_created as 'data_created',
			bd.booking_detail_updated as 'data_updated'
		FROM 
			booking b, 
			booking_detail bd, 
			client c, 
			user_service us
		WHERE 
				bd.booking_detail_user_id = {$user_id}
			AND bd.booking_detail_id = {$booking_detail_id}
			AND bd.booking_detail_booking_id = b.booking_id
			AND us.user_service_id = bd.booking_detail_user_service_id
			AND b.booking_client_id = c.client_id
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data);
	}

	public function get_data_client( $client_id ){
		$aQuery = <<<SQL
		SELECT * 
		FROM client
		WHERE client_id = {$client_id}
SQL;
		$data = $this->db->select($aQuery);

		return $data[0];
	}

	/**
	 * Lấy thông tin dịch vụ (user_service)
	 * @param $_GET['user_service_id'] : id của dịch vụ đó
	 * @return json
	 */
	public function get_user_service() {
		// $user_id = Session::get('user_id');
		$us_id = $_GET['user_service_id'];

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

// 	public function max_slot_each_service($user_id) {
// 		$aQuery = <<<SQL
// 		SELECT user_serv
// SQL;
// 	}

	/**
	 * Thêm lịch hẹn (appointment)
	 * @return String success/error
	 */
	public function insert_appointment() {
		$user_id = Session::get('user_id');

		$data = array();
		$data["appointment_user_id"] = $user_id;
		$data["appointment_title"] = $_POST["appointment_client_name"];

		foreach ($_POST as $key => $value) {
			if( $key == "url" || $key == "user_openHour" || $key == "user_closeHour" ) {
				continue;
			}
			if($key == "user_service_service_id"){
				$data["appointment_user_service_id"] = $value ;
				continue;
			}
			$data["$key"] = $value;
		}

		// Thời gian tạo appointment
		$data["appointment_created"] = date("Y-m-d H:m:s");

		if( $this->db->insert('appointment', $data) ){
			echo 'success';
		} else {
			echo 'error';
		}
	}

	/**
	 * Danh sách giờ mở cửa của địa điểm spa
	 * @param Session::get('user_id') : user_id 
	 * @return json
	 */
	function get_user_open_hour() {
		$user_id = Session::get('user_id');
		$query = "SELECT user_open_hour FROM user WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo $result[0]['user_open_hour']; // Its json
	}
	
	/**
	 * Danh sách những lịch hẹn đã được đặt
	 * @param $_GET['us_id'] : user_service_id dịch vụ được đặt
	 * @param $_GET['date']	 : ngày đặt hẹn
	 * @return json
	 */

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

	public function get_appointment_confirmed() {
		$user_id = Session::get('user_id');
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
	 * Hủy một lịch hẹn
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @return success/error
	 */
	public function delete_appointment() {
		$user_id = Session::get('user_id');
		$data_id = $_POST['data_id'];
		$data_type = $_POST['data_type'];

		$result = false;
		$data = array();
		$where = null;

		if($data_type == "appointment") {
			$data = array(
				"appointment_status" => 2
			);
			$where = "appointment_id = $data_id";
			$result = $this->db->update("appointment", $data, $where);	
		}

		if($data_type == "booking_detail") {
			////////// Gửi mail cho khách hàng /////////
			// Get email html template
			// $tpl_file = MAIL_TEMPLATE . 'emailTemplate_03/index.html';
			// if (!file_exists($tpl_file)) {
			//     die('Template file not found!');
			//     exit;
			// }

			// $msg_tmpl = file_get_contents($tpl_file);

			$data_sendMail = self::get_data_send_mail($user_id, $data_id);
			$data_client = self::get_data_client($data_sendMail['data_client_id']);

			$credit_point = $data_client['client_creditpoint'];
			$credit_point_plus = $data_sendMail['data_price']/MONEY_PER_POINT;
			$credit_point_update = $credit_point + $credit_point_plus;
			$client_id = $data_client["client_id"];

			// $arr_tpl_vars = array(
			// 	'{{TEN_KH}}' => $data_sendMail['data_client_name'],
			// 	'{{TEN_SPA}}' => Session::get('user_business_name'),
			// 	'{{TEN_DICH_VU}}' => $data_sendMail['data_us_name'],
			// 	'{{GIA}}' => number_format($data_sendMail['data_price']),
			// 	'{{NGAY}}' => $data_sendMail['data_date'], 
			// 	'{{THOI_GIAN_BAT_DAU}}' => substr($data_sendMail['data_time_start'], 0, 5),
			// 	'{{THOI_GIAN_DICH_VU}}' => $data_sendMail['data_us_duration'] . ' phút',
			// 	'{{MA_BOOKING}}' => $data_sendMail['data_booking_id'],
			// 	'{{CREDIT_POINT}}' => $credit_point_plus
			// );

			// $arr_tpl_data = array(
			// 	$data_sendMail['data_client_name'], 
			// 	Session::get('user_business_name'), 
			// 	$data_sendMail['data_us_name'],
			// 	number_format($data_sendMail['data_price']),
			// 	$data_sendMail['data_date'],
			// 	substr($data_sendMail['data_time_start'], 0, 5),
			// 	$data_sendMail['data_us_duration'] . ' phút',
			// 	$data_sendMail['data_booking_id'],
			// 	$credit_point_plus
			// );

			// $e_msg = str_replace($arr_tpl_vars, $arr_tpl_data, $msg_tmpl);

			// $mail = new PHPMailer(TRUE);
			// $mail->CharSet = "UTF-8";
			// //$mail->SMTPDebug = 3;                               // Enable verbose debug output

			// $mail->isSMTP();                                      // Set mailer to use SMTP
			// $mail->Host = SMTP_MAIL;  							  // Specify main and backup SMTP servers
			// $mail->SMTPAuth = true;                               // Enable SMTP authentication
			// $mail->Username = INFO_MAIL;                 		  // SMTP username
			// $mail->Password = PASS_MAIL;                          // SMTP password
			// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			// $mail->Port = 465;                                    // TCP port to connect to

			// $mail->From = INFO_MAIL;
			// $mail->FromName = 'BELEZA VIETNAM';
			// // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			// $mail->addAddress($data_client['client_email']);         // Name is optional
			// // $mail->addReplyTo(INFO_MAIL, 'Information');

			// $mail->WordWrap = 50;                                 	 // Set word wrap to 50 characters
			// // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			// $mail->isHTML(true);                                  	 // Set email format to HTML

			// $mail->Subject = '[BELEZA] Thông báo hủy lịch hẹn';
			// $mail->Body = $e_msg;
			// // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


			// if (!$mail->Send()) {
			// 	die("Mailer Error: " . $mail->ErrorInfo);
			// 	exit;
			// } else {
			// 	// cộng credit point cho khách hàng
			// 	$data_update_client = array(
			// 		"client_creditpoint" => $credit_point_update
			// 	);
			// 	$rs = $this->db->update('client', $data_update_client, "client_id = $client_id");

			// 	// Trạng thái hoàn thành
			// 	$data = array(
			// 		"booking_detail_status" => 2
			// 	);
			// 	$where = "booking_detail_id = $data_id";
			// 	$result = $this->db->update("booking_detail", $data, $where);	
			// }

			$params = array(
				'{{CLIENT_NAME}}' => $data_sendMail['data_client_name'],
				'{{SPA_NAME}}' => Session::get('user_business_name'),
				'{{SERVICE_NAME}}' => $data_sendMail['data_us_name'],
				'{{PRICE}}' => number_format($data_sendMail['data_price']),
				'{{DATE}}' => $data_sendMail['data_date'],
				'{{START_TIME}}' => substr($data_sendMail['data_time_start'], 0, 5),
				'{{SERVICE_DURATION}}' => $data_sendMail['data_us_duration'] . ' phút',
				'{{BOOKING_CODE}}' => $data_sendMail['data_booking_id'],
				'{{CREDIT_POINT}}' => $credit_point_plus
			);

			$email = new email_template();        
	        /*         * ************************* */
	        //if (!$mail->Send()) {
	        if (!$email->send($data_client['client_email'], $params,'spaOrderCanceled')) {
	            echo "Mailer Error: " . $email->ErrorInfo;
	        } else {
	            // cộng credit point cho khách hàng
				$data_update_client = array(
					"client_creditpoint" => $credit_point_update
				);
				$rs = $this->db->update('client', $data_update_client, "client_id = $client_id");

				// Trạng thái hoàn thành
				$data = array(
					"booking_detail_status" => 2
				);
				$where = "booking_detail_id = $data_id";
				$result = $this->db->update("booking_detail", $data, $where);	
	        }
		}

		if($result) {
			echo "success";
		} else {
			echo "error";
		}

	}


	/**
	 * Lấy thông tin một lịch hẹn nhằm để sửa lịch hẹn đó
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @return json
	 */
	public function get_appointment_for_edit() {
		
	}

	/**
	 * Update trạng thái hoàn thành lịch hẹn
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @return success/error
	 */
	public function update_appointment_status() {
		$user_id = Session::get('user_id');
		$data_id = $_POST['data_id'];
		$data_type = $_POST['data_type'];

		if($data_type == "appointment") {
			// Trạng thái hoàn thành
			$data = array(
				"appointment_status" => 1
			);
			$result = $this->db->update("appointment", $data, "appointment_id = $data_id");
		}

		if($data_type == "booking_detail") {
			// Trạng thái hoàn thành
			$data = array(
				"booking_detail_status" => 1
			);
			$result = $this->db->update("booking_detail", $data, "booking_detail_id = $data_id");	
		}

		if($result) {
			echo "success";
		} else {
			echo "error";
		}
	}
	/**
	 * Update appointment note
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @return success/error
	 */
	public function update_appointment_note() {
		$user_id = Session::get('user_id');

		$data_id = $_POST['data_id'];
		$data_type = $_POST['data_type'];
		$appointment_note = $_POST['appointment_note'];

		if($data_type == "appointment") {
			// Trạng thái hoàn thành
			$data = array(
				"appointment_note" => $appointment_note
			);
			$result = $this->db->update("appointment", $data, "appointment_id = $data_id");
		}

		if($data_type == "booking_detail") {
			// Trạng thái hoàn thành
			$data = array(
				"booking_detail_note" => $appointment_note
			);
			$result = $this->db->update("booking_detail", $data, "booking_detail_id = $data_id");	
		}

		if($result) {
			echo "success";
		} else {
			echo "error";
		}
	}


	/**
	 * Update thông tin client của lịch hẹn
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @param data update
	 * @return success/error
	 */
	public function update_appointment_client() {
		$user_id = Session::get('user_id');
		$data_id = $_POST['data_id'];
		$data_type = $_POST['data_type'];

		if(!isset($_POST['client_sex'])){
			$_POST['client_sex'] = 0;
		}

		if($data_type == "appointment") {
			// Trạng thái hoàn thành
			$data = array(
				"appointment_title"			=> $_POST['client_name'],
				"appointment_client_name" 	=> $_POST['client_name'],
				"appointment_client_phone" 	=> $_POST['client_phone'],
				"appointment_client_email" 	=> $_POST['client_email'],
				"appointment_client_sex" 	=> $_POST['client_sex'],
				"appointment_client_birth" 	=> $_POST['client_birth'],
				"appointment_client_note" 	=> $_POST['client_note']
			);
			$result = $this->db->update("appointment", $data, "appointment_id = $data_id");
		}

		// if($data_type == "booking_detail") {
		// 	// Trạng thái hoàn thành
		// 	$data = array(
		// 		"client_name" 	=> $_POST['client_name'],
		// 		"client_phone" 	=> $_POST['client_phone'],
		// 		"client_email" 	=> $_POST['client_email'],
		// 		"client_sex" 	=> $_POST['client_sex'],
		// 		"client_birth" 	=> $_POST['client_birth'],
		// 		"client_note" 	=> $_POST['client_note']
		// 	);
		// 	$result = $this->db->update("client", $data, "client_id = $data_id");	
		// }

		if($result) {
			echo "success";
		} else {
			echo "error";
		}
	}

	public function get_time_auto_confirm_spa(){
		$user_id = Session::get('user_id');
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

	/**
	 * Update thông tin lịch hẹn
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @param data update
	 * @return success/error
	 */
	public function update_appointment() {
		$user_id = Session::get('user_id');
		$data_id = $_POST['data_id'];
		$data_type = $_POST['data_type'];

		$result = false;

		if($data_type == "appointment") {
			// Trạng thái hoàn thành
			$data = array(
				"appointment_user_service_id" 	=> $_POST['user_service_service_id'],
				"appointment_date" 			=> $_POST['appointment_date'],
				"appointment_time_start" 	=> $_POST['appointment_time_start'],
				"appointment_time_end" 		=> $_POST['appointment_time_end'],
				"appointment_price" 		=> $_POST['appointment_price'],
				"appointment_note" 			=> $_POST['appointment_note']
			);
			$result = $this->db->update("appointment", $data, "appointment_id = $data_id");
		}

		if($data_type == "booking_detail") {
			////////// Gửi mail cho khách hàng /////////
			// Get email html template
			// $tpl_file = MAIL_TEMPLATE . 'emailTemplate_02/index.html';
			// if (!file_exists($tpl_file)) {
			//     die('Template file not found!');
			//     exit;
			// }

			// $msg_tmpl = file_get_contents($tpl_file);

			$data_sendMail = self::get_data_send_mail($user_id, $data_id);

			// Nếu book đã xác thực -> gửi mail thông báo lịch hẹn mới
			// Còn lại là chưa xác thực -> gửi mail có 3 link đồng ý, đổi, xóa
			if( $data_sendMail['data_is_confirm'] == 1 ) {
				$params = array(
					'CLIENT_NAME' => $data_sendMail['data_client_name'],
					'SPA_NAME' => Session::get('user_business_name'),
					'SERVICE_NAME' => $data_sendMail['data_us_name'],
					// 'TEN_DICH_VU_old',
					'NEW_DATE' => date("d/m/Y", strtotime($_POST['appointment_date']) ),
					'OLD_DATE' => date("d/m/Y", strtotime($data_sendMail['data_date']) ),
					'PRICE' => number_format($data_sendMail['data_price']),
					'NEW_TIME_START' => substr($_POST['appointment_time_start'], 0, 5),
					'OLD_TIME_START' => substr($data_sendMail['data_time_start'], 0, 5),
					'SERVICE_DURATION' => $data_sendMail['data_us_duration'] . ' phút',
					// 'THOI_GIAN_DICH_VU_old',
					'BOOKING_CODE' => $data_sendMail['data_booking_id']
				);

				$email = new email_template();        
		        /*         * ************************* */
		        //if (!$mail->Send()) {
		        if (!$email->send($_POST["client_email"], $params,'clientVerifiedAppointmentChanged')) {
		            echo "Mailer Error: " . $email->ErrorInfo;
		        } else {
		            // Cập nhật đổi lịch
					$data = array(
						"booking_detail_user_service_id" 	=> $_POST['user_service_service_id'],
						"booking_detail_date" 			=> $_POST['appointment_date'],
						"booking_detail_time_start" 	=> $_POST['appointment_time_start'],
						"booking_detail_time_end" 		=> $_POST['appointment_time_end'],
						"booking_detail_price" 			=> $_POST['appointment_price'],
						"booking_detail_note" 			=> $_POST['appointment_note'],
						"booking_detail_request_change" => 0, // lịch đang bị đổi
						"booking_detail_client_response" => 0 // reset về 0
					);
					$result = $this->db->update("booking_detail", $data, "booking_detail_id = $data_id");		
		        }
			} else {
				$params = array(
					'CLIENT_NAME' => $data_sendMail['data_client_name'],
					'SPA_NAME' => Session::get('user_business_name'),
					'SERVICE_NAME' => $data_sendMail['data_us_name'],
					// 'TEN_DICH_VU_old',
					'NEW_DATE' => date("d/m/Y", strtotime($_POST['appointment_date']) ),
					'OLD_DATE' => date("d/m/Y", strtotime($data_sendMail['data_date']) ),
					'PRICE' => number_format($data_sendMail['data_price']),
					'NEW_START_TIME' => substr($_POST['appointment_time_start'], 0, 5),
					'OLD_START_TIME' => substr($data_sendMail['data_time_start'], 0, 5),
					'SERVICE_DURATION' => $data_sendMail['data_us_duration'] . ' phút',
					// 'THOI_GIAN_DICH_VU_old',
					'BOOKING_CODE' => $data_sendMail['data_booking_id'],
					'CONFIRM_LINK' => URL . 'bookinghistory/confirm_appointment?code='. self::generateRandomString() . '+' . $data_sendMail['data_client_id'] . '+' . $data_sendMail['data_id'] . '+' . $data_sendMail['data_client_email'],
					'UNCONFIRM_LINK' => URL . 'bookinghistory/not_confirm_appointment?code='. self::generateRandomString() . '+' . $data_sendMail['data_client_id'] . '+' . $data_sendMail['data_id'] . '+' . $data_sendMail['data_client_email'],
					'CANCEL_LINK' => URL . 'bookinghistory/cancel_appointment?code='. self::generateRandomString() . '+' . $data_sendMail['data_client_id'] . '+' . $data_sendMail['data_id'] . '+' . $data_sendMail['data_client_email']
				);

// print_r($params); exit();

				$email = new email_template();        
		        /*         * ************************* */
		        //if (!$mail->Send()) {
		        if (!$email->send($_POST["client_email"], $params,'clientUnverifiedAppointmentChanged')) {
		            echo "Mailer Error: " . $email->ErrorInfo;
		        } else {
		            // Cập nhật đổi lịch
					$data = array(
						"booking_detail_user_service_id" 	=> $_POST['user_service_service_id'],
						"booking_detail_date" 			=> $_POST['appointment_date'],
						"booking_detail_time_start" 	=> $_POST['appointment_time_start'],
						"booking_detail_time_end" 		=> $_POST['appointment_time_end'],
						"booking_detail_price" 			=> $_POST['appointment_price'],
						"booking_detail_note" 			=> $_POST['appointment_note'],
						"booking_detail_request_change" => 1, // lịch đang bị đổi
						"booking_detail_client_response" => 0 // reset về 0
					);
					$result = $this->db->update("booking_detail", $data, "booking_detail_id = $data_id");		
		        }
			}

			
		}

		if($result) {
			echo "success";	
		} else {
			echo "error";
		}
	}

	/**
	 * Update trạng thái xác thực lịch hẹn
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @param data update
	 * @return success/error
	 */
	public function get_data_send_mail($user_id, $data_id) {
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
			-- us.user_service_full_price as 'data_us_full_price', 
			-- us.user_service_sale_price as 'data_us_sale_price',
			bd.booking_detail_created as 'data_created',
			bd.booking_detail_updated as 'data_updated'
		FROM 
			booking b, 
			booking_detail bd, 
			client c, 
			user_service us
		WHERE 
				bd.booking_detail_user_id = {$user_id}
			AND bd.booking_detail_id = {$data_id}
			AND bd.booking_detail_booking_id = b.booking_id
			AND us.user_service_id = bd.booking_detail_user_service_id
			AND b.booking_client_id = c.client_id
SQL;

		$data = $this->db->select($aQuery);

		return $data[0];
	}

	public function update_appointment_is_confirm() {
		$user_id = Session::get('user_id');
		$data_id = $_POST['data_id'];
		$data_type = $_POST['data_type'];

		$result = false;

		if($data_type == "appointment") {
			// Trạng thái hoàn thành
			$data = array(
				"appointment_is_confirm" => 1
			);
			$result = $this->db->update("appointment", $data, "appointment_id = $data_id");
		}

		if($data_type == "booking_detail") {
			////////// Gửi mail cho khách hàng /////////
			// Get email html template
			// $tpl_file = MAIL_TEMPLATE . 'emailTemplate_01/index.html';
			// if (!file_exists($tpl_file)) {
			//     die('Template file not found!');
			//     exit;
			// }

			// $msg_tmpl = file_get_contents($tpl_file);

			$data_sendMail = self::get_data_send_mail($user_id, $data_id);

			// $arr_tpl_vars = array(
			// 	'{{TEN_KH}}' => $data_sendMail['data_client_name'],
			// 	'{{TEN_SPA}}' => Session::get('user_business_name'),
			// 	'{{TEN_DICH_VU}}' => $data_sendMail['data_us_name'],
			// 	'{{GIA}}' => $data_sendMail['data_price'],
			// 	'{{NGAY}}' => date("d/m/Y", strtotime($data_sendMail['data_date'])), 
			// 	'{{THOI_GIAN_BAT_DAU}}' => substr($data_sendMail['data_time_start'], 0, 5),
			// 	'{{THOI_GIAN_DICH_VU}}' => $data_sendMail['data_us_duration'] . ' phút',
			// 	'{{MA_BOOKING}}' => $data_sendMail['data_booking_id']
			// );

			// $arr_tpl_data = array(
			// 	$data_sendMail['data_client_name'], 
			// 	Session::get('user_business_name'), 
			// 	$data_sendMail['data_us_name'],
			// 	$data_sendMail['data_price'],
			// 	date("d/m/Y", strtotime($data_sendMail['data_date'])),
			// 	substr($data_sendMail['data_time_start'], 0, 5),
			// 	$data_sendMail['data_us_duration'] . ' phút',
			// 	$data_sendMail['data_booking_id']
			// );

			// $e_msg = str_replace($arr_tpl_vars, $arr_tpl_data, $msg_tmpl);

			// $mail = new PHPMailer(TRUE);
			// $mail->CharSet = "UTF-8";
			// //$mail->SMTPDebug = 3;                               // Enable verbose debug output

			// $mail->isSMTP();                                      // Set mailer to use SMTP
			// $mail->Host = SMTP_MAIL;  							  // Specify main and backup SMTP servers
			// $mail->SMTPAuth = true;                               // Enable SMTP authentication
			// $mail->Username = INFO_MAIL;                 		  // SMTP username
			// $mail->Password = PASS_MAIL;                          // SMTP password
			// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			// $mail->Port = 465;                                    // TCP port to connect to

			// $mail->From = INFO_MAIL;
			// $mail->FromName = 'BELEZA VIETNAM';
			// // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			// $mail->addAddress($_POST["client_email"]);               // Name is optional
			// // $mail->addReplyTo(INFO_MAIL, 'Information');

			// $mail->WordWrap = 50;                                 	 // Set word wrap to 50 characters
			// // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			// $mail->isHTML(true);                                  	 // Set email format to HTML

			// $mail->Subject = '[BELEZA] Xác nhận lịch hẹn';
			// $mail->Body = $e_msg;
			// // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


			// if (!$mail->Send()) {
			// 	die("Mailer Error: " . $mail->ErrorInfo);
			// 	exit;
			// } else {
			// 	// Trạng thái hoàn thành
			// 	$data = array(
			// 		"booking_detail_is_confirm" => 1,
			// 		"booking_detail_client_response" => 1, // khi confirm khách hàng ko click được vào các link trên email nữa
			// 		"booking_detail_request_change" => 0 // lịch chuyển sang trạng thái bình thường (chưa y/c đổi)
			// 	);
			// 	$result = $this->db->update("booking_detail", $data, "booking_detail_id = $data_id");	
			// }

			$params = array(
				'TEN_KH' => $data_sendMail['data_client_name'],
				'TEN_SPA' => Session::get('user_business_name'),
				'TEN_DICH_VU' => $data_sendMail['data_us_name'],
				'GIA' => $data_sendMail['data_price'],
				'NGAY' => date("d/m/Y", strtotime($data_sendMail['data_date'])),
				'THOI_GIAN_BAT_DAU' => substr($data_sendMail['data_time_start'], 0, 5),
				'THOI_GIAN_PHUC_VU' => $data_sendMail['data_us_duration'] . ' phút',
				'MA_BOOKING' => $data_sendMail['data_booking_id']
			);

			$email = new email_template();        
	        /*         * ************************* */
	        //if (!$mail->Send()) {
	        if (!$email->send($_POST["client_email"], $params,'spaCalendarAccepted')) {
	            echo "Mailer Error: " . $email->ErrorInfo;
	        } else {
	            // Trạng thái hoàn thành
				$data = array(
					"booking_detail_is_confirm" => 1,
					"booking_detail_client_response" => 1, // khi confirm khách hàng ko click được vào các link trên email nữa
					"booking_detail_request_change" => 0 // lịch chuyển sang trạng thái bình thường (chưa y/c đổi)
				);
				$result = $this->db->update("booking_detail", $data, "booking_detail_id = $data_id");	
	        }
		}

		if($result) {
			echo "success";
		} else {
			echo "error";
		}
	}

	/**
	 * Kiểm tra lịch hẹn đã confirmed chưa?
	 * @param $_POST['data_id'] : id lịch hẹn
	 * @param $_POST['data_type'] : lịch hẹn là appointment hay booking_detail
	 * @param data update
	 * @return success/error
	 */
	public function check_appointment_is_confirmed() {
		$user_id = Session::get('user_id');
		$data_id = $_POST['data_id'];
		$data_type = $_POST['data_type'];

		// echo $data_id; exit();
		$from = null;
		$where = null;
		if($data_type == "appointment") {
			$from = "appointment";
			$where = "appointment_user_id = $user_id";
			$where .= " AND appointment_id = $data_id";
			$where .= " AND appointment_is_confirm = 1";
		}

		if($data_type == "booking_detail") {
			$from = "booking_detail";
			$where = "booking_detail_user_id = $user_id";
			$where .= " AND booking_detail_id = $data_id";
			$where .= " AND booking_detail_is_confirm = 1";
		}

		$aQuery = <<<SQL
		SELECT count(*) as 'isConfirmed'
		FROM {$from}
		WHERE {$where}
SQL;
		$result = $this->db->select($aQuery);

		if($result[0]['isConfirmed'] == 1) {
			echo "success";
		} else {
			echo "error";
		}
	}


	/**
	 * Tìm kiếm lịch hẹn?
	 * @param search_string : chuỗi search
	 * @return client_name/client_phone/....
	 */
	public function get_calendar_search_appointment($user_id, $search_string) {
		$aQuery = <<<SQL
		SELECT
			'appointment' as 'data_type',
			a.appointment_client_name as 'data_client_name',
			a.appointment_client_phone as 'data_client_phone',
		 	a.appointment_date as 'data_date', 
			a.appointment_time_start as 'data_time_start', 
			'' as 'data_booking_id',
			us.user_service_name as 'data_us_name',
			a.appointment_is_confirm as 'data_is_confirm',
			a.appointment_status as 'data_status'
		FROM
			appointment a,
			user_service us
		WHERE
				a.appointment_user_id = {$user_id}
			AND a.appointment_user_service_id = us.user_service_id
			AND ( 
				a.appointment_client_name LIKE '%{$search_string}%'
				OR a.appointment_client_phone LIKE '%{$search_string}%'
			)
			AND a.appointment_status <> 2
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function get_calendar_search_booking_detail($user_id, $search_string) {
		$aQuery = <<<SQL
		SELECT
			'booking_detail' as 'data_type',
			c.client_name as 'data_client_name', 
			c.client_phone as 'data_client_phone',
			bd.booking_detail_date as 'data_date', 
			bd.booking_detail_time_start as 'data_time_start', 
			b.booking_id as 'data_booking_id', 
			us.user_service_name as 'data_us_name', 
			bd.booking_detail_is_confirm as 'data_is_confirm',
			bd.booking_detail_status as 'data_status'
		FROM 
			booking b, 
			booking_detail bd, 
			client c, 
			user_service us
		WHERE 
				bd.booking_detail_user_id = {$user_id}
			AND bd.booking_detail_booking_id = b.booking_id
			AND us.user_service_id = bd.booking_detail_user_service_id
			AND b.booking_client_id = c.client_id
			AND ( 
				c.client_name LIKE '%{$search_string}%'
				OR c.client_phone LIKE '%{$search_string}%' 
				OR b.booking_id LIKE '%{$search_string}%' 
			)
			AND bd.booking_detail_status <> 2
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function get_calendar_search() {
		$user_id = Session::get('user_id');
		$search_string = $_GET['search_string'];

		$data_search_a = self::get_calendar_search_appointment($user_id, $search_string);
		$data_search_b = self::get_calendar_search_booking_detail($user_id, $search_string);
		$data = array_merge($data_search_a, $data_search_b);

		echo json_encode($data);
	}


	/**
	 * Tìm kiếm autocomplete client name
	 * @param search_string : chuỗi search
	 * @return client_name/client_phone/order ref#....
	 */
	public function get_appointment_client_name() {
		$user_id = Session::get('user_id');
		$search_string = $_GET['search_string'];

		$aQuery = <<<SQL
		SELECT 
			appointment_client_name 
		FROM 
			appointment
		WHERE 
			appointment_client_name LIKE '%{$search_string}%'
SQL;
		$data = $this->db->select($aQuery);

		$html = '<li class="ui-menu-item" role="menuitem">:client_name</li>';

        $out = '';

		foreach ($data as $key => $value) {
			$data_client_name = preg_replace("/".$search_string."/i", "<strong class='highlight'>".$search_string."</strong>", $value['appointment_client_name']);
            $out = str_replace(':client_name', $data_client_name, $html );
            echo $out;
		}
		
	}



	///////////////////////////////// function support ////////////////////////
	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}