<?php

class Admincp_Model extends Model {
	function __construct(){
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
	}

	function login(){

		$aQuery = "SELECT admin_id,admin_username FROM admin WHERE 
				admin_username = :admin_username
			AND admin_password = :admin_password";

		$user = array(
			':admin_username' 	=> $_POST['username'],
			':admin_password' 	=> $_POST['password']
			// ':admin_password' 	=> Hash::create('md5', $_POST['admin_password'], HASH_PASSWORD_KEY)
		);

		$sth = $this->db->prepare($aQuery);
		$sth->execute($user);
		$count = $sth->rowCount();

		if($count > 0) {
			$result = $sth->fetch(PDO::FETCH_ASSOC);
			Session::init();
			Session::set('admincp', true);
			Session::set('admin_username', $result['admin_username']);
			Session::set('admin_id', $result['admin_id']);
			header('location:'.URL.'admincp_dashboard');
		} else {
			header('location:'.URL.'admincp');
			return false;
		}

	}

	function logout() {
		Session::init();
		unset($_SESSION['admincp']);
		unset($_SESSION['admin_username']);
		unset($_SESSION['admin_id']);
		header('location:'.URL.'admincp');
		exit;
	}

	
}