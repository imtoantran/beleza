<?php
/**
 *
 */
class admincp_client_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function loadClientList() {
		$sql = <<<SQL
SELECT * 
FROM client
ORDER BY client_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			// echo json_encode($select);
			$sOutput = '[';
			foreach ($select as $row) {
				$sOutput .= "[";
				$sOutput .= '"' . str_replace('"', '\"', $row['client_id']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['client_name']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['client_email']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['client_phone']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['client_username']) . '",';
				if ($row['client_sex'] == 1) {
					$client_sex = 'Nam';
				} else {
					$client_sex = 'Nữ';
				}
				$sOutput .= '"' . str_replace('"', '\"', $client_sex) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['client_creditpoint']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['client_giftpoint']) . '",';
				$split_date_time = explode(' ', $row['client_join_date']);
				$client_join_date = date('d/m/Y', strtotime($split_date_time[0]));
				$sOutput .= '"' . str_replace('"', '\"', $client_join_date . ' ' . $split_date_time[1]) . '"';
				$sOutput .= "],";
			}
			$sOutput = substr_replace($sOutput, "", -1);
			$sOutput .= ']';
			echo $sOutput;
		} else {
			echo "[]";
		}
	}

	public function saveClient($data) {
		$client_pass = Hash::create('md5', $_POST['client_pass'], HASH_PASSWORD_KEY);
		$sql = <<<SQL
INSERT INTO client(
client_name
, client_email
, client_pass
, client_phone
, client_username
, client_sex
, client_creditpoint
, client_giftpoint
, client_verify
, client_is_active
)
values(
'{$data['client_name']}'
, '{$data['client_email']}'
, '$client_pass'
, '{$data['client_phone']}'
, '{$data['client_username']}'
, {$data['client_sex']}
, 0
, 0
, 'Admin Created'
, {$data['client_is_active']}
)
SQL;
		$insert = $this -> db -> prepare($sql);
		$insert -> execute();
		if ($insert -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}

	public function loadClientDetailEdit($client_id) {
		$sql = <<<SQL
SELECT * 
FROM client
WHERE client_id = {$client_id}
ORDER BY client_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			echo json_encode($select);
		} else {
			echo '[]';
		}
	}

	public function editClient($data) {
		$sql = <<<SQL
UPDATE client
SET client_name = '{$data['client_name']}'
, client_phone = '{$data['client_phone']}'
, client_sex = {$data['client_sex']}
, client_is_active = {$data['client_is_active']}
WHERE client_id = {$data['client_id']}
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}

	public function deleteClient($client_id) {
		$where = "client_id = $client_id";
		$delete = $this->db->delete('client', $where);
		if ($delete) {
			echo 200;
		} else {
			echo 0;
		}
	}

}
?>