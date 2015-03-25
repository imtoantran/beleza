<?php
/**
 *
 */
class admincp_typebusiness extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/typebusiness/css/typebusiness.css');
		$this -> view -> script = array(URL . 'Views/admincp/typebusiness/js/typebusiness.js');
		$this -> view -> render_admincp('typebusiness/index');

	}

	public function loadTypeBusinessList() {
		Auth::handleAdminLogin();
		$this -> model -> loadTypeBusinessList();
	}

	public function addTypeBusinessDetail() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/typebusiness/css/typebusiness.css');
		$this -> view -> script = array(URL . 'Views/admincp/typebusiness/js/typebusiness.js');
		$this -> view -> render_admincp('typebusiness/add');
	}

	public function saveTypeBusiness() {
		Auth::handleAdminLogin();
		if (isset($_POST['type_business_name'])) {
			$data['type_business_name'] = $_POST['type_business_name'];
			$this -> model -> saveTypeBusiness($data);
		}
	}

	public function editTypeBusinessDetail($type_business_id) {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/typebusiness/css/typebusiness.css');
		$this -> view -> script = array(URL . 'Views/admincp/typebusiness/js/typebusiness.js');
		$this -> view -> type_business_id = $type_business_id;
		$this -> view -> render_admincp('typebusiness/edit');
	}

	public function loadTypeBusinessDetailEdit() {
		Auth::handleAdminLogin();
		if (isset($_POST['type_business_id'])) {
			$data['type_business_id'] = $_POST['type_business_id'];
			$this -> model -> loadTypeBusinessDetailEdit($data['type_business_id']);
		}
	}

	public function editTypeBusiness() {
		Auth::handleAdminLogin();
		if (isset($_POST['type_business_id']) && isset($_POST['type_business_name'])) {
			$data['type_business_id'] = $_POST['type_business_id'];
			$data['type_business_name'] = $_POST['type_business_name'];
			$this -> model -> editTypeBusiness($data);
		}
	}

	public function deleteTypeBusiness() {
		Auth::handleAdminLogin();
		if (isset($_POST['type_business_id'])) {
			$this -> model -> deleteTypeBusiness($_POST['type_business_id']);
		}
	}

}
?>