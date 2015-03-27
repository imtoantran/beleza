<?php
/**
 *
 */
class clientwishlist extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Session::initIdle();
		Auth::handleClientLogin();
		$this -> view -> style = array(
			URL . 'Views/clientwishlist/css/clientwishlist.css'
			// ASSETS . 'plugins/jquery-alerts/jquery.alerts.css'
		);
		$this -> view -> script = array(
			ASSETS . 'plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.vi.js',
			URL . 'Views/clientwishlist/js/clientwishlist.js',
			ASSETS . 'js/homepage.js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBUxUNFuJ09fVcA24HZcEq0gwxs37ESDo4&language=vi-VI'
		);
		if (isset($_SESSION['client_id'])) {
			$this -> view -> client_id = $_SESSION['client_id'];
		} else {
			$this -> view -> client_id = '';
		}
		$this -> view -> render('clientwishlist/index');
	}

	public function loadClientWishlist() {
		Session::initIdle();
		Auth::handleClientLogin();
		$this->model->loadClientWishlist();
	}

	public function deleteItemWishlist(){
		Session::initIdle();
		if(isset($_POST['service_id'])){
			echo $this->model->deleteItemWishlist($_POST['service_id']);
		}else{
			echo -1;
		}
	}

}
?>