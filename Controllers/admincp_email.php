<?php

/**
 *
 */
class admincp_email extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        Auth::handleAdminLogin();
        $this->view->style = array(URL . 'Views/admincp/email/css/email.css');
        $this->view->script = array(URL . 'Views/admincp/email/js/email.js');
        $this->view->email = $this->model->loadList();
        $this->view->render_admincp('email/index');
    }

    public function save() {
        Auth::handleAdminLogin();
        $id = $_POST['id'];
        $content = $_POST['content'];
        $subject = $_POST['subject'];        
        $slug = $_POST['slug'];        
        $name = $_POST['name'];        
        print json_encode($this->model->save($id, $content, $subject,$slug,$name));
    }

    public function edit() {
        Auth::handleAdminLogin();
        $this->view->helps = $this->model->helps();
        $id = $_POST['id'];
        $this->view->style = array(URL . 'Views/admincp/email/css/email.css');
        $this->view->script = array(
            ASSETS . 'plugins/ckeditor/ckeditor.js',
            URL . 'Views/admincp/email/js/edit.js'
        );
        $this->view->render_admincp("email/edit");
    }
    public function delete() {
        Auth::handleAdminLogin();
        $id = $_POST['id'];
        $this->model->delete($id);
    }

    public function test() {
        $to = "imtoantran@gmail.com";
        $params = [
            "TEN"=>"toantran",
            "DIADIEM"=>"dia diem",
            "MABOOKING" => '$booking_content',
            "TENDICHVU" => 'ten dich vu',
            "GIA" => '100000',
        ];
        $email = new email_template();

        /*         * ************************* */
        $email->clientAppointmentChanged($to, $params);
        $email->send($to, $params, 'spaOrderCanceled');
        
    }

}
