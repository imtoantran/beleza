<?php

/**
 *
 */
class giftvoucher extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Session::initIdle();
		$this -> view -> style = array(URL . 'Views/giftvoucher/css/giftvoucher.css');

		$this -> view -> script = array(URL . 'Views/giftvoucher/js/giftvoucher.js');

		$this -> view -> render('giftvoucher/index');
	}

	public function saveGiftvoucher() {
		Session::initIdle();
		if (isset($_SESSION['client_id'])) {
			if (isset($_POST['gift_voucher_sender']) && isset($_POST['gift_voucher_email']) && isset($_POST['gift_voucher_type']) && isset($_POST['gift_voucher_date']) && isset($_POST['gift_voucher_mess']) && isset($_POST['gift_voucher_price'])) {
				$index_b = 0;
				$index_e = 0;
				if (isset($_SESSION['eVoucher_detail'])) {
					$index_e = count($_SESSION['eVoucher_detail']);
				}
				if (isset($_SESSION['booking_detail'])) {
					$index_b = count($_SESSION['booking_detail']);
				}
				
				foreach ($_POST as $key => $value) {
					$_SESSION['gift_detail'][0][$key] = $value;
				}
				// $_SESSION['gift_voucher_sender'] = $_POST['gift_voucher_sender'];
				// $_SESSION['gift_voucher_email'] = $_POST['gift_voucher_email'];
				// $_SESSION['gift_voucher_type'] = $_POST['gift_voucher_type'];
				// $_SESSION['gift_voucher_date'] = $_POST['gift_voucher_date'];
				$_SESSION['gift_detail'][0]['gift_voucher_due_date'] = $this -> model -> getDueDate($_SESSION['gift_detail'][0]['gift_voucher_date']);
				// $_SESSION['gift_voucher_mess'] = $_POST['gift_voucher_mess'];
				// $_SESSION['gift_voucher_price'] = $_POST['gift_voucher_price'];
				echo 1 + $index_b + $index_e;
				// $this -> model -> saveGiftvoucher($data);
			} else {
				echo -1;
			}
		} else {
			echo 0;
		}
	}

	public function loadPlaceUseGift() {
		Session::initIdle();
		$this -> model -> loadPlaceUseGift();
	}
	
	public function removeGiftCart(){
		Session::initIdle();
		$index_b = 0;
		$index_e = 0;
		$index_g = 0;
		unset($_SESSION['gift_detail']);
		if (isset($_SESSION['eVoucher_detail'])) {
			$index_e = count($_SESSION['eVoucher_detail']);
		}
		if (isset($_SESSION['booking_detail'])) {
			$index_b = count($_SESSION['booking_detail']);
		}
		if (isset($_SESSION['gift_detail'])) {
			$index_g = count($_SESSION['gift_detail']);
		}
		echo $index_b + $index_e + $index_g;
	}

	public function xhrGet_page_giftvoucher() {
		$this->model->get_page_giftvoucher();
	}
	
	public function loadGiftPriceList(){
		$this -> model -> loadGiftPriceList();
	}

}
?>