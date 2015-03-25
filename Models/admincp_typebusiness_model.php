<?php
/**
 *
 */
class admincp_typebusiness_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function loadTypeBusinessList() {
		$sql = <<<SQL
SELECT * 
FROM type_business
WHERE type_business_delete_flg = 0
ORDER BY type_business_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			// echo json_encode($select);
			$sOutput = '[';
			foreach ($select as $row) {
				$sOutput .= "[";
				$sOutput .= '"' . str_replace('"', '\"', $row['type_business_id']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['type_business_name']) . '"';
				$sOutput .= "],";
			}
			$sOutput = substr_replace($sOutput, "", -1);
			$sOutput .= ']';
			echo $sOutput;
		} else {
			echo "[]";
		}
	}

	public function saveTypeBusiness($data) {
		$sql = <<<SQL
INSERT INTO type_business(
type_business_name
, type_business_delete_flg
)
values(
'{$data['type_business_name']}'
, 0
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

	public function loadTypeBusinessDetailEdit($type_business_id) {
		$sql = <<<SQL
SELECT * 
FROM type_business
WHERE type_business_delete_flg = 0
AND type_business_id = {$type_business_id}
ORDER BY type_business_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			echo json_encode($select);
		} else {
			echo '[]';
		}
	}

	public function editTypeBusiness($data) {
		$sql = <<<SQL
UPDATE type_business
SET type_business_name = '{$data['type_business_name']}'
WHERE type_business_id = {$data['type_business_id']}
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}
	
	public function deleteTypeBusiness($type_business_id) {
		$sql = <<<SQL
UPDATE type_business
SET type_business_delete_flg = 1
WHERE type_business_id = {$type_business_id}
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}

}
?>