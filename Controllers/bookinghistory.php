<?php
/**
 *
 */
class bookinghistory extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Session::initIdle();
		Auth::handleClientLogin();
		$this -> view -> style = array(
			URL . 'Views/bookinghistory/css/bookinghistory.css'
			// ASSETS . 'plugins/jquery-alerts/jquery.alerts.css'
		);
		$this -> view -> script = array(
			ASSETS . 'plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.vi.js',
			URL . 'Views/bookinghistory/js/bookinghistory.js'
		);
		$this -> view -> render('bookinghistory/index');
	}

	public function loadClientBookingList() {
		Session::initIdle();
		Auth::handleClientLogin();
		$this->model->loadClientBookingList();
	}


	/**
	 * Chấp nhận lịch hẹn bị đổi từ email
	 */
	public function confirm_appointment() {
		Session::initIdle();
		// Auth::handleClientLogin();

		$code = explode(" ", $_GET['code']);

		$client_id = $code[1];
		$client_email = $code[3];
		$booking_detail_id = $code[2];

		$client_response = $this->model->check_client_response($booking_detail_id);

		if(!$client_response) {
			if( Session::get('client_id') == $client_id && Session::get('client_email') == $client_email ) {
				$this->model->confirm_appointment($booking_detail_id);
			} else {
				// Nếu chưa đăng nhập. Yêu cầu khách đăng nhập
				Session::set('request_login', 1);
				Session::set('verify_code', $code[0]);
				Session::set('verify_email', $client_email);
				Session::set('verify_client_id', $client_id);
				Session::set('verify_booking_detail_id', $booking_detail_id);
				Session::set('verify_action', 'confirm_appointment');

				header('location:' . URL );
			}
		} else {
			header('location:' . URL . 'bookinghistory');
		}
	}
	
	/**
	 * ko chấp nhận lịch hẹn bị đổi từ email
	 */
	public function not_confirm_appointment() {
		Session::initIdle();
		// Auth::handleClientLogin();
		$code = explode(" ", $_GET['code']);

		$client_id = $code[1];
		$client_email = $code[3];
		$booking_detail_id = $code[2];
		/* imtoantran */
		Session::set('return_url', "bookinghistory/not_confirm_appointment?code={$code[0]}+$client_id+$booking_detail_id+$client_email") ;
		/* imtoantran */

		$client_response = $this->model->check_client_response($booking_detail_id);
		if(!$client_response) {
			if( Session::get('client_id') == $client_id && Session::get('client_email') == $client_email ) {
				$this->model->not_confirm_appointment($booking_detail_id);
			} else {
				// Nếu chưa đăng nhập. Yêu cầu khách đăng nhập
				Session::set('request_login', 1);
				Session::set('verify_code', $code[0]);
				Session::set('verify_email', $client_email);
				Session::set('verify_client_id', $client_id);
				Session::set('verify_booking_detail_id', $booking_detail_id);
				Session::set('verify_action', 'not_confirm_appointment');
				header('location:' . URL );
			}
		} else {
			header('location:' . URL . 'bookinghistory');
		}
	}

	/**
	 * hủy lịch hẹn bị đổi từ email
	 */
	public function cancel_appointment() {
		Session::initIdle();
		// Auth::handleClientLogin();
		
		$code = explode(" ", $_GET['code']);

		$client_id = $code[1];
		$client_email = $code[3];
		$booking_detail_id = $code[2];

		$client_response = $this->model->check_client_response($booking_detail_id);

		if(!$client_response) {
			if( Session::get('client_id') == $client_id && Session::get('client_email') == $client_email ) {
				$this->model->cancel_appointment($booking_detail_id);
			} else {
				// Nếu chưa đăng nhập. Yêu cầu khách đăng nhập
				Session::set('request_login', 1);
				Session::set('verify_code', $code[0]);
				Session::set('verify_email', $client_email);
				Session::set('verify_client_id', $client_id);
				Session::set('verify_booking_detail_id', $booking_detail_id);
				Session::set('verify_action', 'cancel_appointment');

				header('location:' . URL );
			}
		} else {
			header('location:' . URL . 'bookinghistory');
		}
		
	}

	public function xhrGet_booking_detail() {
		Session::initIdle();
		if(isset($_GET['data_id'])) {
			$this->model->get_booking_detail($_GET['data_id']);
		}
	}

	public function xhrGet_user_open_hour() {
		Session::initIdle();
		if(isset($_GET['user_id'])) {
			$this->model->get_user_open_hour($_GET['user_id']);
		}
	}

	public function xhrGetTimeAutoConfirmSpa() {
		Session::initIdle();
		if(isset($_POST['user_id'])) {
			$this->model->get_time_auto_confirm_spa($_POST['user_id']);
		}
	}

	public function xhrGet_appointment_confirmed() {
		Session::initIdle();
		if(isset($_GET['user_id'])) {
			$this->model->get_appointment_confirmed($_GET['user_id']);
		}
	}

	public function xhrGet_user_service() {
		Session::initIdle();
		if(isset($_GET['user_service_id'])) {
			$this->model->get_user_service($_GET['user_service_id']);
		}
	}

	public function xhrUpdate_booking_detail() {
		Session::initIdle();
		if(isset($_POST['bd_id'])) {
			$this->model->update_booking_detail($_POST['bd_id']);
		}
	}

}
?>