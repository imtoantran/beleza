<?php

/**
 *
 */
class clientsignup extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        Session::initIdle();
        Session::init();
        if (empty($_SESSION['client_id'])) {
            $this->view->script = array(URL . 'Views/clientsignup/js/default.js');
            $this->view->render('clientsignup/index');
        } else {
            header('Location:' . URL);
        }
    }

    public function signup() {
        Session::initIdle();
        //Dữ liệu input từ form
        $data['client_name'] = $_POST['client_name'];
        $data['client_email'] = $_POST['client_email'];
        $data['client_pass'] = Hash::create('md5', $_POST['client_pass'], HASH_PASSWORD_KEY);
        $data['client_phone'] = $_POST['client_phone'];
//        $data['client_postcode'] = $_POST['client_postcode'];
//        $data['client_username'] = $_POST['client_username'];
		$data['client_birth'] = $_POST['client_birthday'];
        $data['client_sex'] = $_POST['client_sex'];
        $data['client_creditpoint'] = 0;
        $data['client_giftpoint'] = 0;
        $data['client_verify'] = md5(uniqid(rand(), TRUE));
        $data['client_is_active'] = 0;
		
        //Kiểm tra chuỗi token
        for ($i = 0;; $i++) {
            $check_verify_code = $this->model->checkExistToken($data['client_verify']);
            if ($check_verify_code == 0) {
                break;
            } else {
                $data['client_verify'] = md5(uniqid(rand(), TRUE));
            }
        }
        //Kiểm tra dữ liệu đăng ký
//        if ($data['client_pass'] == "" || $data['client_phone'] == "" || $data['client_username'] == "" || $data['client_email'] == "") {
        if ($data['client_pass'] == "" || $data['client_phone'] == "" || $data['client_email'] == "") {
            if (is_numeric($data['client_phone']) == false || strlen($data['client_phone']) < 9 || strlen($data['client_pass']) < 6) {
                Session::init();
                Session::set('checkSignup', FALSE);
                header("Location:" . URL . "clientsignup");
            }
        }
        //Nội dung email
        $body = '<h1>Chào mừng đến với BELEZA</h1>';
        $body .= '<p>Xin chào bạn: <strong>' . $data['client_name'] . '</strong></p>';
        $body .= '<p>Để có thể sử dụng tài khoản click vào link dưới để active : </p>  
				  <a href="' . URL . 'clientsignup/VrcFl/' . $data['client_verify'] . '" >' . $data['client_verify'] . '</a>';
        $body .= '<p>Mật khẩu đăng nhập BELEZA của bạn là: <strong>' . $_POST['client_pass'] . '</strong></p>';
        $body .= '<p>Chúc một ngày mới tốt lành</p>';
        $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';

        //Gửi mail local
        $mail = new PHPMailer(TRUE);
        $mail->CharSet = "UTF-8";
        // create a new object
        $mail->IsSMTP();
        // enable SMTP
        $mail->SMTPDebug = 1;
        // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;
        // authentication enabled
        $mail->SMTPSecure = 'ssl';
        // secure transfer enabled REQUIRED for GMail
        $mail->Host = SMTP_MAIL;
        $mail->Port = 465;
        // or 587
        $mail->IsHTML(true);
        $mail->Username = INFO_MAIL;
        $mail->Password = PASS_MAIL;
        $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
        $mail->Subject = "Xác nhận thông tin đăng ký từ BELEZA!";
        $mail->Body = $body;
        $mail->AddAddress($data['client_email']);

        /**
         * @IMTOANTRAN
         * gửi mail xác nhận đăng ký
         */
        $to = $data['client_email'];
        $params = [
            "CLIENT_NAME"=>$data['client_name'],
            "PASSWORD"=> $_POST['client_pass'],
            "CONFIRM_CODE"=>'<a href="' . URL . 'clientsignup/VrcFl/' . $data['client_verify'] . '" >' . $data['client_verify'] . '</a>',
        ];
        $email = new email_template();        
        /*         * ************************* */
        //if (!$mail->Send()) {
        if (!$email->send($to, $params,'userRegisterConfirm')) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $this->model->signup($data);
        }
    }

    public function checkExist() {
        Session::initIdle();
        if (isset($_POST['email'])) {
            $client_email = $_POST['email'];
            $count = $this->model->checkExistEmail($client_email);
        }
//        if (isset($_POST['username'])) {
//            $client_username = $_POST['username'];
//            $count = $this->model->checkExistUsername($client_username);
//        }
    }

    public function VrcFl($verify = "") {
        Session::initIdle();
        if ($verify != "") {
            $this->model->verify($verify);
        }
    }

}

?>