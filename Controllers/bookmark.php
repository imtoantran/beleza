<?php
/**
 *
 */
class bookmark extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Session::initIdle();
		Auth::handleClientLogin();
		$this -> view -> style = array(
			URL . 'Views/bookinghistory/css/bookmark.css'
		);
		$this -> view -> script = array(
			ASSETS . 'plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.vi.js',
			URL . 'Views/bookmark/js/bookmark.js'
		);
		$this -> view -> bookmark = $this -> model -> bookmarks();
		$this -> view -> render('bookmark/index');
	}

	public function bookmarks() {
		Session::initIdle();
		Auth::handleClientLogin();
		header('Content-Type: application/json');
		echo json_encode($this->model->bookmarks());
	}
	public function remove(){
		Session::initIdle();
		Auth::handleClientLogin();
		header('Content-Type: application/json');
		echo json_encode($this->model->remove());
	}
}
?>