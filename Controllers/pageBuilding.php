<?php

	/**
	 * 
	 */
	class pageBuilding extends Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index() {
			Session::initIdle();
			$this->view->style = array(
				URL . 'Views/pageBuilding/css/pageBuilding.css'
			);

			$this->view->script = array(
				URL . 'Views/pageBuilding/js/pageBuilding.js'
			);

			$this->view->render('pageBuilding/index');
		}
		
	}
