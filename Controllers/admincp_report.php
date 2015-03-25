<?php

/**
 * @author  imtoantran <imtoantran@gmail.com>
 */
class admincp_report extends Controller {
	function __construct() {
		parent::__construct();
		$this->viewPath = URL."Views/".str_replace("_", "/",__class__)."/";		
		$this -> view -> style = [
			$this->viewPath."css/report.css",
			//,ASSETS.'plugins/jquery-ui/jquery-ui.min.css'
					ASSETS . 'plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
					ASSETS . 'css/style-metronic.css',
					ASSETS . 'css/style.css',
					ASSETS . 'css/style-responsive.css',
					ASSETS . 'css/plugins.css',
					ASSETS . 'css/custom.css',
			];
		$this -> view -> script = [
			//ASSETS.'plugins/jquery-ui/jquery-ui.min.js'
					ASSETS . 'js/core/app.js',
					//ASSETS . 'js/core/datatable.js',
						// ASSETS . 'plugins/bootstrap-daterangepicker/moment.min.js',
					ASSETS . 'plugins/bootstrap-daterangepicker/daterangepicker.js',
			'//code.jquery.com/ui/1.11.2/jquery-ui.js'
			,$this->viewPath.'js/report.js'
		];
	}

	function index() {
		Auth::handleAdminLogin();
		$this->view->totalUser = $this->model->totalUser();
		$this->view->totalClient = $this->model->totalClient();
		$this->view->render_admincp('report/index');
	}
	public function sale_report($value='')
	{
		# code...
		print json_encode($this->model->sale_report());
	}
	public function service_sale_report($value='')
	{
		# code...
		print json_encode($this->model->service_sale_report());
	}
	public function general($value='')
	{
		print json_encode($this->model->general());
	}


}