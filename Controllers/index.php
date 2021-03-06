<?php

/**
 *
 */
class Index extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		Session::initIdle();
		$this -> view -> script = array(ASSETS . 'js/homepage.js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBUxUNFuJ09fVcA24HZcEq0gwxs37ESDo4&language=vi-VI');
		if (isset($_SESSION['client_id'])) {
			$this -> view -> client_id = $_SESSION['client_id'];
		} else {
			$this -> view -> client_id = '';
		}
		$this -> view -> render('index');


	}

	// public function loadMenuHome() {
	// 	Session::initIdle();
	// 	$this -> model -> loadMenuHome();
	// }

	public function checkSessionIdle() {
		Session::init();
		if (isset($_SESSION['check_idle'])) {
			if ((time() - $_SESSION['check_idle']) >= IDLE_TIME) {
				// Session::destroy();
				unset($_SESSION['client_id']);
				unset($_SESSION['client_username']);
				unset($_SESSION['client_email']);
				unset($_SESSION['client_name']);
				unset($_SESSION['client_phone']);
				unset($_SESSION['client_join_date']);
				unset($_SESSION['booking_detail']);
				unset($_SESSION['eVoucher_detail']);
				echo 200;
			} else {
				echo 0;
			}
		}
	}
    public function loadMenu() {
        echo json_encode($this->model->loadMenu());
    }

	public function loadDistrict() {
		Session::initIdle();
		if (isset($_POST['city_id'])) {
			$this -> model -> loadDistrict($_POST['city_id']);
		}
	}
	
	public function loadCity() {
		Session::initIdle();
		$this -> model -> loadCity();
	}

	public function loadConcernServiceList() {
		Session::initIdle();
		if (isset($_POST['client_id'])) {
			$this -> model -> loadConcernServiceList($_POST['client_id']);
		}
	}

	public function loadTopServiceList() {
		Session::initIdle();
		$this -> model -> loadTopServiceList();
	}

	public function loadNewServiceList() {
		Session::initIdle();
		$this -> model -> loadNewServiceList();
	}

	public function loadLocation() {
		Session::initIdle();
		$this -> model -> loadLocation();
	}

	public function loadServiceDetail() {
		Session::initIdle();
		$user_service_id = $_POST['user_service_id'];
		$this -> model -> loadServiceDetail($user_service_id);
	}

	public function get_groups() {
		$this -> model -> get_groups();
	}

	public function check_groups() {
		$this -> model -> check_groups();
	}

	public function getBookingInfo() {
		Session::initIdle();
		Session::init();
		$index_e = 0;
		$index_g = 0;
		if (isset($_SESSION['eVoucher_detail'])) {
			$index_e = count($_SESSION['eVoucher_detail']);
		}
		if (isset($_SESSION['gift_detail'])) {
			$index_g = count($_SESSION['gift_detail']);
		}
		if (empty($_SESSION['booking_detail'])) {
			$index = 0;
			foreach ($_POST as $key => $value) {
				$_SESSION['booking_detail'][$index][$key] = $value;
			}
		} else {
			if (empty($_POST)) {
				return FALSE;
			}
			$index = count($_SESSION['booking_detail']);
			foreach ($_SESSION['booking_detail'] as $key => $value) {
				if ($value['user_service_id'] == $_POST['user_service_id'] && $value['booking_detail_date'] == $_POST['booking_detail_date'] && $value['booking_detail_time'] == $_POST['booking_detail_time']) {
					$_SESSION['booking_detail'][$key]['booking_quantity'] = $value['booking_quantity'] + 1;
					echo($index + $index_e);
					return FALSE;
				}
			}
			foreach ($_POST as $key => $value) {
				$_SESSION['booking_detail'][$index][$key] = $value;
			}
		}
		// echo "<pre/>";
		// print_r($_SESSION['booking_detail']);
		echo($index + $index_e + $index_g + 1);
	}

	public function geteVoucherInfo() {
		Session::initIdle();
		Session::init();
		$index_b = 0;
		$index_g = 0;
		if (isset($_SESSION['gift_detail'])) {
			$index_g = count($_SESSION['gift_detail']);
		}
		if (isset($_SESSION['booking_detail'])) {
			$index_b = count($_SESSION['booking_detail']);
		}
		if (empty($_SESSION['eVoucher_detail'])) {
			$index = 0;
			foreach ($_POST as $key => $value) {
				$_SESSION['eVoucher_detail'][$index][$key] = $value;
			}
		} else {
			if (empty($_POST)) {
				return FALSE;
			}
			$index = count($_SESSION['eVoucher_detail']);
			foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
				if ($value['user_service_id'] == $_POST['user_service_id']) {
					$_SESSION['eVoucher_detail'][$key]['booking_quantity'] = $value['booking_quantity'] + $_POST['booking_quantity'];
					echo($index + $index_b);
					return FALSE;
				}
			}
			foreach ($_POST as $key => $value) {
				$_SESSION['eVoucher_detail'][$index][$key] = $value;
			}
		}
		// echo "<pre/>";
		// print_r($_SESSION['booking_detail']);
		echo($index + $index_b + $index_g + 1);
	}

	public function shoppingCartDetail() {
		Session::initIdle();
		Session::init();
		$result = array();
		if (isset($_SESSION['booking_detail'])) {
			$result['booking'] = $_SESSION['booking_detail'];
		} else {
			$result['booking'] = '';
		}
		if (isset($_SESSION['eVoucher_detail'])) {
			$result['eVoucher'] = $_SESSION['eVoucher_detail'];
		} else {
			$result['eVoucher'] = '';
		}
		if (isset($_SESSION['gift_detail'])) {
			$result['gift'] = $_SESSION['gift_detail'];
		} else {
			$result['gift'] = '';
		}
		echo json_encode($result);
	}

	public function updateShoppingCart() {
		Session::initIdle();
		Session::init();
		$count_b = 0;
		$count_e = 0;
		if (isset($_SESSION['booking_detail']) && isset($_POST['appointment_quantity_list'])) {
			if ($_POST['appointment_quantity_list'] != '') {
				$quantity_list = rtrim($_POST['appointment_quantity_list'], ',');
				$quantity_list = explode(',', $quantity_list);
				foreach ($_SESSION['booking_detail'] as $key => $value) {
					$_SESSION['booking_detail'][$key]['booking_quantity'] = $quantity_list[$key];
				}
				foreach ($_SESSION['booking_detail'] as $key => $value) {
					if ($_SESSION['booking_detail'][$key]['booking_quantity'] == 0) {
						unset($_SESSION['booking_detail'][$key]);
					}
				}
				$_SESSION['booking_detail'] = array_values($_SESSION['booking_detail']);
			}
			$count_b = count($_SESSION['booking_detail']);
		}
		if (isset($_SESSION['eVoucher_detail']) && isset($_POST['eVoucher_quantity_list'])) {
			if ($_POST['eVoucher_quantity_list'] != '') {
				$quantity_list = rtrim($_POST['eVoucher_quantity_list'], ',');
				$quantity_list = explode(',', $quantity_list);
				foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
					$_SESSION['eVoucher_detail'][$key]['booking_quantity'] = $quantity_list[$key];
				}
				foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
					if ($_SESSION['eVoucher_detail'][$key]['booking_quantity'] == 0) {
						unset($_SESSION['eVoucher_detail'][$key]);
					}
				}
				$_SESSION['eVoucher_detail'] = array_values($_SESSION['eVoucher_detail']);
			}
			$count_e = count($_SESSION['eVoucher_detail']);
		}
		echo $count_b + $count_e;
	}

	public function setTimeIdle() {
		Session::initIdle();
	}

	public function sendCreatePlaceMail() {
		Session::initIdle();
		$checkEmailExist = $this -> model -> checkSpaEmailExist($_POST['create_place_email']);
		if ($checkEmailExist == 0) {
		} else {
			echo 800;
			exit ;
		}
		$email = new email_template();
		$params = [];
		$data['user_full_name'] = $_POST['create_place_name'];
		$data['user_email'] = $_POST['create_place_email'];
		$data['user_business_name'] = $_POST['create_place_com_name'];
		$data['user_phone'] = $_POST['create_place_phone'];
		$data['user_address'] = $_POST['create_place_address'];
		$data['user_district_id'] = $_POST['create_place_district'];
		$data['user_city_id'] = $_POST['create_place_city'];
		/* gui mail cho spa start */
		$params['SPA_OWNER_NAME'] = $data['user_full_name'];
		$params['SPA_NAME'] = $data['user_business_name'];
		$to = $data['user_email'];
		$template = "BelezaProcessingSpaAccount";			

		if ($email -> send($to,$params,$template)) {			
			$this -> model -> sendCreatePlaceMail($data);
		}
		/* gui mail cho spa end */
		
		/* gui mail cho admin start */		
		$to = ADMIN_MAIL;
		$template = "NewSpaRegisterRequestNotifier";			
		$email -> send($to,$params,$template);
		/* gui mail cho admin end*/	
	}

	public function checkBookingLimit() {
		Session::initIdle();
		if (isset($_POST['user_limit_booking']) && isset($_POST['choosen_date']) && isset($_POST['choosen_time']) && isset($_POST['user_service_id'])) {
			$data['user_limit_booking'] = $_POST['user_limit_booking'];
			$data['choosen_date'] = $_POST['choosen_date'];
			$data['choosen_time'] = $_POST['choosen_time'];
			$data['user_service_id'] = $_POST['user_service_id'];
			$this -> model -> checkBookingLimit($data);
		}
	}

	public function addWishlist(){
		if(isset($_POST['service_id']) && isset($_POST['client_id'])){
			$data['option_id'] = $_POST['service_id'];
			$data['client_id'] = $_POST['client_id'];

			if($this->model->isWishlist($data)){
				echo -2; // liked service
			}else{
				if($this->model->addWishlist($data)){
					echo 200;
				}else{
					echo 0;
				}
			}
		}else{
			echo -1;
		}
	}


}
?>