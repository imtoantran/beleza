<?php

/**
 *
 */
class requestpass_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function sendRequestPassword($data) {
		Session::init();
		$update = $this -> db -> prepare("UPDATE client set client_pass = '" . $data['new_pass'] . "' WHERE client_email='" . $data['client_email'] . "'");
		$update -> execute();
		if ($update -> rowCount() == 0) {
			Session::set('checkReq', FALSE);
			header("Location:" . URL . "requestpass");
		} else {
			Session::set('checkReq', TRUE);
			header("Location:" . URL . "requestpass");
		}
	}

	public function checkEmailExistPassRequest($client) {
		$select = $this -> db -> select("SELECT COUNT(*) as count FROM client WHERE client_email='" . $client . "'");
		echo json_encode($select);
	}

	/**
	 * imtoantran@gmail.com
	 *  reset spa password
	 * @param   $role table
	 * @param   $email_address
	 */
	public function resetPassword($email_address,$role,$password)
	{
		Session::init();
		if(!isset($email_address)){
			return ['message'=>'Email không tồn tại','success'=>false];
		}

		if($this->checkEmailExist($email_address,$role)){			
			$to = $email_address;
			$template = 'ResetPassword';
			$params = [
			'NEWPASS' => $password,
			'URL'=>URL
			];

			$email = new email_template();

			if (!$email -> send($to,$params,$template)) {				

			} else {
				$password = Hash::create('md5', $password, HASH_PASSWORD_KEY);
				$update = $this -> db -> prepare("UPDATE {$role} set {$role}_pass = '{$password}' WHERE {$role}_email='{$email_address}'");
				$update->execute();								
				if($update->rowCount()){
				// reset success
					return ['message'=>'Reset mật khẩu thành công','success'=>true];
				}else{
					$update = $this -> db -> prepare("UPDATE {$role} set {$role}_password = '{$password}' WHERE {$role}_email='{$email_address}'");
					$update->execute();								
					if($update->rowCount()){				
						return ['message'=>'Reset mật khẩu thành công','success'=>true];
					}
					else{
						return ['message'=>'Email không tồn tại','success'=>false];
					}
				}				
			}				
		}
		return ['message'=>'Email không tồn tại','success'=>false];
	}
	/**
	 * imtoantran@gmail.com
	 * Check email exist
	 */
	public function checkEmailExist($email='',$role='')
	{
		$sql = "SELECT COUNT(*) as count FROM {$role} WHERE {$role}_email='{$email}'";
		$select = $this -> db -> select($sql);
		return $select[0]['count'];
	}
}
?>