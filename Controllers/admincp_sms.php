<?php

/**
 *
 */
class admincp_sms extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        Auth::handleAdminLogin();
        $this->view->style = array(URL . 'Views/admincp/sms/css/sms.css');
        $this->view->script = array(URL . 'Views/admincp/sms/js/sms.js');
        $this->view->sms = $this->model->loadSMS();
        $this->view->render_admincp('sms/index');
    }

    public function loadSMS() {
        Auth::handleAdminLogin();
        echo $this->model->loadSMS();
    }
    public function saveSMS(){
        Auth::handleAdminLogin();
        $id = $_POST['id'];
        $content = $_POST['content'];
        $this->model->saveSMS($id,$content);
    }
    public function changeStatus(){
        echo $this->model->changeStatus($_POST['id']);
    }

    public function switchSMS(){
        Auth::handleAdminLogin();
        echo json_encode($this->model->switchSMS($_POST['value']));
    }
    public function test(){
        //Auth::handleAdminLogin();
        //require_once LIBS.DS.'other'.DS.'SMS'.DS.'sms.php';
        $sms = new sms();
        $sms->send('0905278593',['TEN'=>'Toan','MDH'=>'abc','THOIGAIN'=>'12h'],'clientOrderSuccess');
        //echo LIBS;
    }
}
