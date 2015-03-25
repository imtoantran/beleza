<?php
/**
 *
 */
class requestpass extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		Session::initIdle();
		if (empty($_SESSION['client_id'])) {
			$this -> view -> script = array(URL . 'Views/requestpass/js/default.js');
			$this -> view -> render('requestpass/index');
		}else{
			header('Location:' . URL);
		}
	}

	public function checkEmailExistPassRequest() {
		Session::initIdle();
		if (isset($_POST['re_email'])) {
			$client_email = $_POST['re_email'];
			$this -> model -> checkEmailExistPassRequest($client_email);
		}
	}

	public function sendRequestPassword() {
		Session::initIdle();
		if (isset($_POST['email_address'])) {
			if ($_POST['email_address'] != "") {
				$data['new_pass'] = bin2hex(openssl_random_pseudo_bytes(3));
				$data['client_email'] = $_POST['email_address'];	
				$to = $data['client_email'];
				$template = 'ResetPassword';
				$params = [
					'NEWPASS' => $data['new_pass'],
					'URL'=>URL
				];
				$email = new email_template();
				if (!$email -> send($to,$params,$template)) {

				} else {
					$data['new_pass'] = Hash::create('md5', $data['new_pass'], HASH_PASSWORD_KEY);
					$this -> model -> sendRequestPassword($data);
				}
			}
		}
	}
	/**
	 * imtoantran
	 * reset spa password
	 */
	public function spaResetPassword()
	{
		print json_encode($this->model->resetPassword($_POST['email_address'],'user',bin2hex(openssl_random_pseudo_bytes(4))));
	}
}
?>