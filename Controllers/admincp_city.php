<?php
/**
 *
 */
class admincp_city extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/city/css/city.css');
		$this -> view -> script = array(URL . 'Views/admincp/city/js/city.js');
		$this -> view -> render_admincp('city/index');

	}

	public function loadCityList() {
		Auth::handleAdminLogin();
		$this -> model -> loadCityList();
	}

	public function addCityDetail() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/city/css/city.css');
		$this -> view -> script = array(URL . 'Views/admincp/city/js/city.js');
		$this -> view -> render_admincp('city/add');
	}

	public function saveCity() {
		Auth::handleAdminLogin();
		if (isset($_POST['city_name'])) {
			// $data['city_id'] = $_POST['city_id'];
			$data['city_name'] = $_POST['city_name'];
			$this -> model -> saveCity($data);
		}
	}

	public function editCityDetail($city_id) {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/city/css/city.css');
		$this -> view -> script = array(URL . 'Views/admincp/city/js/city.js');
		$this -> view -> city_id = $city_id;
		$this -> view -> render_admincp('city/edit');
	}

	public function loadCityDetailEdit() {
		Auth::handleAdminLogin();
		if (isset($_POST['city_id'])) {
			$data['city_id'] = $_POST['city_id'];
			$this -> model -> loadCityDetailEdit($data['city_id']);
		}
	}

	public function editCity() {
		Auth::handleAdminLogin();
		if (isset($_POST['city_id']) && isset($_POST['city_name'])) {
			$data['city_id'] = $_POST['city_id'];
			$data['city_name'] = $_POST['city_name'];
			$this -> model -> editCity($data);
		}
	}

	public function deleteCity() {
		Auth::handleAdminLogin();
		if (isset($_POST['city_id'])) {
			$this -> model -> deleteCity($_POST['city_id']);
		}
	}

}
?>