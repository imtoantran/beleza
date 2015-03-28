<?php
/**
 * 
 */
class clientpreference extends Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index(){
		Session::initIdle();
		Auth::handleClientLogin();
		$this -> view -> style = array(
			URL . 'Views/clientpreference/css/default.css'
		);
		$this -> view -> script = array(
			URL . 'Views/clientpreference/js/default.js'
		);
		$this -> view -> render('clientpreference/index');
	}
	public function updateTag(){
		Session::initIdle();
		Auth::handleClientLogin();
		header("Content-type:application/json");
		echo json_encode($this->model->updateTag());
	}
	public function getTag()
	{
		Session::initIdle();
		Auth::handleClientLogin();		
		header("Content-type:application/json");
		echo json_encode($this->model->getTag());
	}
}

?>