<?php

class admincp_setting_model extends Model {
	function __construct() {
		parent::__construct();
	}

	function editSetting($data) {
		Session::init();
		$check_pass = $this -> checkOldPassword($data['admin_old_password']);
		if ($check_pass != 0) {
			$sql = <<<SQL
UPDATE admin
SET admin_password = '{$data['admin_renew_password']}'
WHERE admin_id = {$_SESSION['admin_id']}
SQL;
			$update = $this -> db -> prepare($sql);
			$update -> execute();
			if ($update -> rowCount() > 0) {
				echo 200;
			} else {
				echo 0;
			}
		} else {
			echo 800;
		}
	}

	public function checkOldPassword($old_pass) {
		Session::init();
		$sql = <<<SQL
SELECT COUNT(*) AS check_pass
FROM admin
WHERE admin_id = {$_SESSION['admin_id']}
AND admin_password = '{$old_pass}'
SQL;
		$select = $this -> db -> select($sql);
		return $select[0]['check_pass'];
	}

	public function loadScript(){
		$sql = <<<SQL
		SELECT * 
		FROM script
SQL;
		$select = $this->db->select($sql);
		echo json_encode($select);
	}

	public function embedScript($typeScript, $header, $footer){
		
		$head = Addslashes($header);
		$foot = Addslashes($footer);
		$sql = <<<SQL
		UPDATE script
		SET script_header = '{$head}', script_footer = '{$foot}'
		WHERE script_id = {$typeScript}
SQL;
		$update = $this-> db -> prepare($sql);
			if ($update -> execute()) {
				echo 1;
			} else {
				echo 0;
			}
	}
	/*imtoantran load replies setting start */
	public function loadRepliesOption()
	{
		$data = $this->db->select("select value from options where name ='default_status' and type = 'review_replies'");
		return $data[0]['value'];
	}
	/*imtoantran load replies setting end */

}
