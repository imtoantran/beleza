<?php
/**
 *
 */
class Page extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		self::show();
	}
	
	public function show($slug=false) {
		$check_slug = self::check_slug($slug);
		if($check_slug) {
			$this->view->slug = $slug;
		} else {
			// error page
			header("Location:".URL."error");
		}

		$this->view->style = array(
			URL . 'Views/page/css/page.css'
		);

		$this->view->script = array(
			URL . 'Views/page/js/page.js'
		);

		$this->view->render('page/index');
	}

	public function check_slug($slug) {
		$result = $this->model->check_slug($slug);

		if($result) {
			return true;
		} 

		return false;
	}

	public function xhrGet_page() {
		$this->model->get_page();
	}

	public function xhrGet_sidebar() {
		$this->model->get_sidebar();
	}
}