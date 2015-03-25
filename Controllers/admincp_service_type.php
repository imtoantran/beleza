<?php
/**
 *
 */
class admincp_service_type extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.css',
			URL . 'Views/admincp/servicetype/css/servicetype.css'
		);
		$this -> view -> script = array(
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.js',
			URL . 'Views/admincp/servicetype/js/servicetype.js'
		);
		$this -> view -> render_admincp('servicetype/index');

	}

	public function loadServiceTypeList() {
		Auth::handleAdminLogin();
		$this -> model -> loadServiceTypeList();
	}

	public function addServiceTypeDetail() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.css',
			URL . 'Views/admincp/servicetype/css/servicetype.css'
		);
		$this -> view -> script = array(
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.js',
			URL . 'Views/admincp/servicetype/js/servicetype.js'
		);
		$this -> view -> render_admincp('servicetype/add');
	}

	public function saveServiceType() {
		Auth::handleAdminLogin();
		if (isset($_POST['service_type_name']) && isset($_POST['service_type_name_short']) && isset($_POST['service_type_icon'])) {
			$data['service_type_name'] = $_POST['service_type_name'];
			$data['service_type_name_short'] = $_POST['service_type_name_short'];
			$data['service_type_icon'] = $_POST['service_type_icon'];
			$this -> model -> saveServiceType($data);
		}
	}

	public function editServiceTypeDetail($service_type_id) {
		Auth::handleAdminLogin();
		$this -> view -> style = array(
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.css',
			URL . 'Views/admincp/servicetype/css/servicetype.css'
		);
		$this -> view -> script = array(
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.js',
			URL . 'Views/admincp/servicetype/js/servicetype.js'
		);
		$this -> view -> service_type_id = $service_type_id;
		$this -> view -> render_admincp('servicetype/edit');
	}

	public function loadServiceTypeDetailEdit() {
		Auth::handleAdminLogin();
		if (isset($_POST['service_type_id'])) {
			$data['service_type_id'] = $_POST['service_type_id'];
			$this -> model -> loadServiceTypeDetailEdit($data['service_type_id']);
		}
	}

	public function editServiceType() {
		Auth::handleAdminLogin();
		if (isset($_POST['service_type_id']) && isset($_POST['service_type_name']) && isset($_POST['service_type_name_short']) && isset($_POST['service_type_icon'])) {
			$data['service_type_id'] = $_POST['service_type_id'];
			$data['service_type_name'] = $_POST['service_type_name'];
			$data['service_type_name_short'] = $_POST['service_type_name_short'];
			$data['service_type_icon'] = $_POST['service_type_icon'];
			$this -> model -> editServiceType($data);
		}
	}

	public function deleteServiceType() {
		Auth::handleAdminLogin();
		if (isset($_POST['service_type_id'])) {
			$this -> model -> deleteServiceType($_POST['service_type_id']);
		}
	}

}
?>