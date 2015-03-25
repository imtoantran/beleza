<?php
/**
 * 
 */
class admincp_gift extends Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index(){
		Session::initIdle();
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/gift/css/gift.css');
		$this -> view -> script = array(URL . 'Views/admincp/gift/js/gift.js');
		$this->view->dataPrice = $this -> model -> loadGiftPrice();
		$this->view->dataEmail = $this -> model -> loadGiftList(1);
		$this->view->dataCard = $this -> model -> loadGiftList(2);
		$this -> view -> render_admincp('gift/index');
	}
	function addPrice(){
		Auth::handleAdminLogin();
		if (isset($_POST['gift_price']) && isset($_POST['gift_status'])) {
			$this -> model -> addPrice($_POST['gift_price'], $_POST['gift_status']);
		}
	}
	function updatePrice(){
		Auth::handleAdminLogin();
		if (isset($_POST['gift_price']) && isset($_POST['gift_id']) && isset($_POST['gift_status'])) {
			 $this -> model -> updatePrice($_POST['gift_id'], $_POST['gift_price'], $_POST['gift_status']);
		}
	}
	function deletePrice(){
		Auth::handleAdminLogin();
		if (isset($_POST['gift_id'])) {
			echo $this -> model -> deletePrice($_POST['gift_id']);
		}else{
			echo 0;
		}
	}
	function loadEmailDetail(){
		Auth::handleAdminLogin();
		if (isset($_POST['gift_id'])) {
			$this -> model -> loadEmailDetail($_POST['gift_id']);
		}
	}function loadCardDetail(){
		Auth::handleAdminLogin();
		if (isset($_POST['gift_id'])) {
			$this -> model -> loadEmailDetail($_POST['gift_id']);
		}
	}

////
//
//
//
//
//
//
//
//
//
//
//
//	public function loadGiftCard() {
//		Auth::handleAdminLogin();
//		$this -> view -> style = array(URL . 'Views/admincp/gift/css/gift.css');
//		$this -> view -> script = array(URL . 'Views/admincp/gift/js/gift.js');
//		$this->view->data = $this -> model -> loadGiftCardList();
//		$this -> view -> render_admincp('gift/card');
//	}
//
//	public function loadGiftEmailDetail($gift_id) {
//		Auth::handleAdminLogin();
//		$this -> view -> style = array(URL . 'Views/admincp/gift/css/gift.css');
//		$this -> view -> script = array(URL . 'Views/admincp/gift/js/gift.js');
//		$this -> view -> gift_data = $this->model->loadGiftDetail($gift_id);
//		$this -> view -> render_admincp('gift/detail_email');
//	}
//	public function loadGiftCardDetail($gift_id) {
//		Auth::handleAdminLogin();
//		$this -> view -> style = array(URL . 'Views/admincp/gift/css/gift.css');
//		$this -> view -> script = array(URL . 'Views/admincp/gift/js/gift.js');
//		$this -> view -> gift_data = $this->model->loadGiftDetail($gift_id);
//		$this -> view -> render_admincp('gift/detail_card');
//	}
//
//	public function addGiftDetail() {
//		Auth::handleAdminLogin();
//		$this -> view -> style = array(URL . 'Views/admincp/gift/css/gift.css');
//		$this -> view -> script = array(URL . 'Views/admincp/gift/js/gift.js');
//		$this -> view -> gift_data = "sdsd";
//		$this -> view -> render_admincp('gift/add');
//	}
//
////	public function saveGift() {
////		Auth::handleAdminLogin();
////		if (isset($_POST['gift_price'])) {
////			$data['gift_price'] = $_POST['gift_price'];
////			$this -> model -> saveGift($data);
////		}
////	}
//
//	public function editGift() {
//		Auth::handleAdminLogin();
//		if (isset($_POST['gift_id']) && isset($_POST['gift_price'])) {
//			$data['gift_id'] = $_POST['gift_id'];
//			$data['gift_price'] = $_POST['gift_price'];
//			$data['gift_status'] = $_POST['gift_status'];
//			$this -> model -> editGift($data);
//		}
//	}
//
//
//	public function deleteGift() {
//		Auth::handleAdminLogin();
//		if (isset($_POST['gift_id'])) {
//			$this -> model -> deleteGift($_POST['gift_id']);
//		}
//	}
	public function export_excel_card() {
		$this->model->export_excel_card();
	}
	public function updateStatus() {
		$this->model->updateStatus();
	}

}