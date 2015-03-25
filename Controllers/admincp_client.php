<?php
/**
 *
 */
class admincp_client extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/client/css/client.css');
		$this -> view -> script = array(URL . 'Views/admincp/client/js/client.js');
		$this -> view -> render_admincp('client/index');

	}

	public function loadClientList() {
		Auth::handleAdminLogin();
		$this -> model -> loadClientList();
	}

	public function addClientDetail() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/client/css/client.css');
		$this -> view -> script = array(URL . 'Views/admincp/client/js/client.js');
		$this -> view -> render_admincp('client/add');
	}

	public function saveClient() {
		Auth::handleAdminLogin();
		if (isset($_POST['client_name']) && isset($_POST['client_email']) && isset($_POST['client_phone']) && isset($_POST['client_username']) && isset($_POST['client_sex']) && isset($_POST['client_pass'])) {
			$data['client_name'] = $_POST['client_name'];
			$data['client_email'] = $_POST['client_email'];
			$data['client_phone'] = $_POST['client_phone'];
			$data['client_username'] = $_POST['client_username'];
			$data['client_pass'] = $_POST['client_pass'];
			$data['client_sex'] = $_POST['client_sex'];
			$data['client_is_active'] = $_POST['client_is_active'];
			$this -> model -> saveClient($data);
		}
	}

	public function editClientDetail($client_id) {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/client/css/client.css');
		$this -> view -> script = array(URL . 'Views/admincp/client/js/client.js');
		$this -> view -> client_id = $client_id;
		$this -> view -> render_admincp('client/edit');
	}

	public function loadClientDetailEdit() {
		Auth::handleAdminLogin();
		if (isset($_POST['client_id'])) {
			$data['client_id'] = $_POST['client_id'];
			$this -> model -> loadClientDetailEdit($data['client_id']);
		}
	}

	public function editClient() {
		Auth::handleAdminLogin();
		if (isset($_POST['client_id']) && isset($_POST['client_name']) && isset($_POST['client_phone']) && isset($_POST['client_sex'])) {
			$data['client_id'] = $_POST['client_id'];
			$data['client_name'] = $_POST['client_name'];
			$data['client_phone'] = $_POST['client_phone'];
			$data['client_sex'] = $_POST['client_sex'];
			$data['client_is_active'] = $_POST['client_is_active'];
			$this -> model -> editClient($data);
		}
	}

	public function deleteClient() {
		Auth::handleAdminLogin();
		if (isset($_POST['client_id'])) {
			$this -> model -> deleteClient($_POST['client_id']);
		}
	}

}
?>