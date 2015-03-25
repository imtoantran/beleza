<?php

/**
 *
 */
class admincp_setting extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/setting/css/setting.css');
		$this -> view -> script = array(URL . 'Views/admincp/setting/js/setting.js');
		$this->view->defaultStatus = $this->model->loadRepliesOption();
		$this -> view -> render_admincp('setting/index');
	}
	
	public function editSetting(){
		Auth::handleAdminLogin();
		if(isset($_POST['admin_old_password']) && isset($_POST['admin_new_password']) && isset($_POST['admin_renew_password'])){
			if($_POST['admin_new_password'] == $_POST['admin_renew_password']){
				$data['admin_old_password'] =$_POST['admin_old_password'];
				$data['admin_renew_password'] =$_POST['admin_renew_password'];
				$this -> model -> editSetting($data);
			}
		}
	}
	public function loadScript(){
		Auth::handleAdminLogin();
		$this -> model -> loadScript();
	}

	public function embedScript(){
		Auth::handleAdminLogin();
		if(isset($_POST['typeScript'])){
				$header = isset($_POST['header']) ? $_POST['header'] : "";
				$footer = isset($_POST['footer']) ? $_POST['footer'] : "";
			$this -> model -> embedScript($_POST['typeScript'], $header, $footer);
		}else{
			echo 0;
		}


	}
}
