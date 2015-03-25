<?php
/**
 *
 */
class admincp_district extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/district/css/district.css');
		$this -> view -> script = array(URL . 'Views/admincp/district/js/district.js');
		$this -> view -> render_admincp('district/index');

	}

	public function loadDistrictList() {
		Auth::handleAdminLogin();
		$this -> model -> loadDistrictList();
	}

	public function addDistrictDetail() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/district/css/district.css');
		$this -> view -> script = array(URL . 'Views/admincp/district/js/district.js');
		$this -> view -> render_admincp('district/add');
	}

	public function saveDistrict() {
		Auth::handleAdminLogin();
		if (isset($_POST['district_id']) && isset($_POST['district_name'])) {
			$data['district_id'] = $_POST['district_id'];
			$data['district_name'] = $_POST['district_name'];
			$data['city_id'] = $_POST['city_id'];
			$this -> model -> saveDistrict($data);
		}
	}

	public function editDistrictDetail($district_id) {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/district/css/district.css');
		$this -> view -> script = array(URL . 'Views/admincp/district/js/district.js');
		$this -> view -> district_id = $district_id;
		$this -> view -> render_admincp('district/edit');
	}

	public function loadDistrictDetailEdit() {
		Auth::handleAdminLogin();
		if (isset($_POST['district_id'])) {
			$data['district_id'] = $_POST['district_id'];
			$this -> model -> loadDistrictDetailEdit($data['district_id']);
		}
	}

	public function editDistrict() {
		Auth::handleAdminLogin();
		if (isset($_POST['district_id']) && isset($_POST['district_name'])) {
			$data['district_id'] = $_POST['district_id'];
			$data['district_name'] = $_POST['district_name'];
			$data['city_id'] = $_POST['city_id'];
			$this -> model -> editDistrict($data);
		}
	}

	public function deleteDistrict() {
		Auth::handleAdminLogin();
		if (isset($_POST['district_id'])) {
			$this -> model -> deleteDistrict($_POST['district_id']);
		}
	}

}
?>