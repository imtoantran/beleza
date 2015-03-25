<?php

/**
 *
 */
class admincp_page extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this->view->style = array(
			URL . 'Views/admincp/page/css/admincp_page.css'
		);
		$this->view->script = array(
			ASSETS . 'plugins/ckeditor/ckeditor.js',
			ASSETS . 'plugins/ckeditor/bootstrap-ckeditor-fix.js',
			URL . 'Views/admincp/page/js/admincp_page.js'
		);
		
		$this->view->render_admincp('page/index');
	}

	public function xhrUpdate_page_contact() {
		$this->model->update_page_contact();
	}

	public function xhrGet_page_contact() {
		$this->model->get_page_contact();
	}

	public function xhrUpdate_page_aboutus() {
		$this->model->update_page_aboutus();
	}

	public function xhrGet_page_aboutus() {
		$this->model->get_page_aboutus();
	}

	public function xhrUpdate_page_giftvoucher() {
		$this->model->update_page_giftvoucher();
	}

	public function xhrGet_page_giftvoucher() {
		$this->model->get_page_giftvoucher();
	}

	public function xhrUpdate_page_faq() {
		$this->model->update_page_faq();
	}

	public function xhrGet_page_faq() {
		$this->model->get_page_faq();
	}

	public function xhrInsert_page() {
		$this->model->insert_page();
	}

	public function xhrGet_sidebar() {
		$this->model->get_sidebar();
	}

	public function xhrUpdate_sidebar() {
		$this->model->update_sidebar();
	}

	public function xhrGet_page() {
		$this->model->get_page();
	}

	public function xhrGetOM_detail_page() {
		$this->model->getOM_detail_page();
	}

	public function xhrUpdate_page() {
		$this->model->update_page();
	}

	public function xhrDelete_page() {
		$this->model->delete_page();
	}

	
}