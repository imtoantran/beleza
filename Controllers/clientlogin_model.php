<?php
/**
 * 
 */

class clientlogin_model extends Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function clientLogin($data){
		$sql = "SELECT client_id
			, client_username
			, client_email
			, client_name
			, client_avatar
			, client_phone 
			, client_join_date
			, client_creditpoint
			, client_giftpoint
		FROM client 
		WHERE client_email = :client_email 
		AND client_pass = :client_pass 
		AND client_is_active = 1";

		$client = array(
				':client_email' 		=> $data['email_login'],
				':client_pass' 	=> Hash::create('md5', $data['pass_login'], HASH_PASSWORD_KEY)
			);
		$result = $this -> db -> select($sql, $client);
		if(isset($result[0]['client_id'])){
			Session::init();
			Session::set('client_id', $result[0]['client_id']);
			Session::set('client_username', $result[0]['client_username']);
			Session::set('client_email', $result[0]['client_email']);
			Session::set('client_name', $result[0]['client_name']);
			Session::set('client_avatar', $result[0]['client_avatar']);
			Session::set('client_phone', $result[0]['client_phone']);
			Session::set('client_join_date', $result[0]['client_join_date']);
			Session::set('client_creditpoint', $result[0]['client_creditpoint']);
			Session::set('client_giftpoint', $result[0]['client_giftpoint']);

			/**
			 * Yêu cầu login để xác nhận email
			 * @author: Trong Loi
			 * @date: 19-12-2014
			 */
			if(Session::get('request_login') == 2) {
				$verify_client_id = Session::get('verify_client_id');
				$verify_code = Session::get('verify_code');
				$verify_email = Session::get('verify_email');
				$verify_booking_detail_id = Session::get('verify_booking_detail_id');
				$verify_action = Session::get('verify_action');

				unset($_SESSION['request_login']);
				unset($_SESSION['verify_client_id']);
				unset($_SESSION['verify_code']);
				unset($_SESSION['verify_email']);
				unset($_SESSION['verify_booking_detail_id']);
				unset($_SESSION['verify_action']);

				$url = null;
				if( $verify_client_id == $result[0]['client_id'] ) {
					
					switch ( $verify_action ) {
						case 'confirm_appointment':
							$url = URL . 'bookinghistory/confirm_appointment?code='. $verify_code . '+' . $verify_client_id . '+' . $verify_booking_detail_id . '+' . $verify_email;
							break;

						case 'not_confirm_appointment':
							$url = URL . 'bookinghistory/not_confirm_appointment?code='. $verify_code . '+' . $verify_client_id . '+' . $verify_booking_detail_id . '+' . $verify_email;
							break;

						case 'cancel_appointment':
							$url = URL . 'bookinghistory/cancel_appointment?code='. $verify_code . '+' . $verify_client_id . '+' . $verify_booking_detail_id . '+' . $verify_email;
							break;
						
						default:
							# code...
							break;
					}

					$request = array(
						'request_login' => 1,
						'url' => $url
					);

					echo json_encode($request);
					return false;
				}
			}
		}
		echo json_encode($result);
	}
	
}

?>