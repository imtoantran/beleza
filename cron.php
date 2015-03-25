<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	require 'config.php';
	require 'paths.php';

	//autoload libs
	function __autoload($class){
		require LIBS . $class .'.php';
	}
	require_once LIBS .'other' . DS . 'PHPMailer' . DS . 'class.phpmailer.php';
	require_once LIBS .'other' . DS . 'simple_html_dom.php';


class autoConFirm {
    function __construct() {
        $this->db = new Database();       
    }

    public function setConfirm(){
    	$sqlSelect = <<<SQL
    	SELECT booking_detail_id, booking_id, booking_detail_date, booking_detail_time_start, booking_detail_quantity ,booking_detail_time_confirm, client_name, client_phone, client_email, user_address
    	FROM booking_detail
    	INNER JOIN booking ON booking.booking_id = booking_detail.booking_detail_booking_id
    	INNER JOIN client ON client.client_id = booking.booking_client_id    	
    	INNER JOIN user ON user.user_id = booking_detail.booking_detail_user_id    	
    	WHERE booking_detail.booking_detail_is_confirm <> 1
SQL;
		
		$unActive =  $this->db->select($sqlSelect);
		
		// print_r($unActive);
		foreach ($unActive as $key => $value) {	
			 echo $key;
			$dateConfirm = strtotime($value['booking_detail_time_confirm']);
			$now = strtotime(date('Y-m-d H:i:s'));			
			
			// if confirm time is little now time then confirm booking_detail
			if($now >= $dateConfirm){
				$to = $value['client_email'];
				$client_phone = $value['client_phone'];
			 	$params = [
		            "CLIENT_NAME" => $value['client_name'],
		            "BOOKING_CODE" =>  $value['booking_id'],
		            "SPA_NAME" => $value['user_address'],
		            "SERVICE_DATE" => date_format(date_create($value['booking_detail_date']),"d/m/Y"),
		            "SERVICE_TIME" => substr($value['booking_detail_time_start'],0,2)."h ".substr($value['booking_detail_time_start'],3,2)."'",
		            "SERVICE_NUMBER" => $value['booking_detail_quantity'],
	            ];

				$update = $this->updateConfirm($value['booking_detail_id']);
				if($update){					
					$email = new email_template();
					$sms = new sms();

					$email->send($to, $params,'clientAppointmentConfirmed');
					$sms->send($client_phone, $params, 'clientOrderConfirmed');	
				}	
							
			}	
			
		}	
    }

    // update field booking_detail_is_confirm = 1 in tabel booking_detail
    public function updateConfirm($booking_detail_id){
    	$data = array(
			"booking_detail_is_confirm" => 1,
			"booking_detail_request_change" => 0,
			"booking_detail_client_response" => 0
		);
		$where = "booking_detail_id = $booking_detail_id";
    	return $this->db->update('booking_detail', $data, $where);
    }
}

$confirm = new autoConFirm();
$confirm->setConfirm();

