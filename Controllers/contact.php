<?php

	/**
	 * 
	 */
	class contact extends Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index() {
			Session::initIdle();
			$this->view->style = array(
				URL . 'Views/contact/css/contact.css'
			);

			$this->view->script = array(
				URL . 'Views/contact/js/contact.js'
			);

			$this->view->render('contact/index');
		}

		public function xhrGet_page_contact() {
			$this->model->get_page_contact();
		}

		public function send_message() {
			$this->model->send_message();
		}
		
	}