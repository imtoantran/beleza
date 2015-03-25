<?php

/**
 *
 */
class admincp_community extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();

		$this->view->style = array(
			// ASSETS . 'plugins/wysibb/theme/default/wbbtheme.css',
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.css',
			URL . 'Views/admincp/community/styles.css',
			URL . 'Views/admincp/community/css/community.css'
			
		);
		$this->view->script = array(
			ASSETS . 'plugins/ckeditor/bootstrap-ckeditor-fix.js',
			ASSETS . 'plugins/ckeditor/ckeditor.js',
			// ASSETS . 'plugins/wysibb/jquery.wysibb.js',
			ASSETS . 'plugins/bootstrap-fileinput/bootstrap-fileinput.js',
			URL . 'Views/admincp/community/script.js',
			URL . 'Views/admincp/community/js/community.js'
		);

		$this->view->render_admincp('community/index');
	}

	public function xhrGet_service_system() {
		$this->model->get_service_system();
	}

	public function xhrGet_question() {
		$this->model->get_question();
	}

	public function xhrGet_answer_question() {
		$this->model->get_answer_question();
	}

	public function xhrGetOM_detail_question() {
		Auth::handleAdminLogin();
		if (isset($_GET['data_id'])) {
			$this->model->getOM_detail_question($_GET['data_id']);
		}
	}

	public function xhrUpdate_question_confirm() {
		Auth::handleAdminLogin();
		if (isset($_POST['data_id'])) {
			$this->model->update_question_confirm($_POST['data_id']);
		}
	}

	public function xhrInsert_answer() {
		Auth::handleAdminLogin();
		$this->model->insert_answer();
	}

	public function xhrUpdate_answer() {
		Auth::handleAdminLogin();
		$this->model->update_answer();
	}

	public function xhrUpdate_question() {
		Auth::handleAdminLogin();
		$this->model->update_question();
	}

	public function xhrUpdate_question_tag() {
		Auth::handleAdminLogin();
		$this->model->update_question_tag();
	}

	public function xhrInsert_post() {
		Auth::handleAdminLogin();
		$this->model->insert_post();
	}

	public function xhrGet_post() {
		$this->model->get_post();
	}

	public function xhrGet_detail_post() {
		$this->model->get_detail_post();
	}

	public function xhrUpdate_post() {
		Auth::handleAdminLogin();
		$this->model->update_post();
	}

	public function xhrDelete_post() {
		Auth::handleAdminLogin();
		$this->model->delete_post();
	}

	public function xhrGet_answer() {
		$this->model->get_answer();
	}


	public function xhrUpdate_confirm_answer() {
		Auth::handleAdminLogin();
		$this->model->update_confirm_answer();
	}

}
