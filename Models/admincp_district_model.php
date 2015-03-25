<?php
/**
 *
 */
class admincp_district_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function loadDistrictList() {
		$sql = <<<SQL
SELECT * 
FROM district, city
WHERE district.city_id = city.city_id 
AND district_delete_flg = 0
ORDER BY district_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			// echo json_encode($select);
			$sOutput = '[';
			foreach ($select as $row) {
				$sOutput .= "[";
				$sOutput .= '"' . str_replace('"', '\"', $row['district_id']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['district_name']) . '",';
				$sOutput .= '"' . str_replace('"', '\"', $row['city_name']) . '"';
				$sOutput .= "],";
			}
			$sOutput = substr_replace($sOutput, "", -1);
			$sOutput .= ']';
			echo $sOutput;
		} else {
			echo "[]";
		}
	}

	public function saveDistrict($data) {
		$sql = <<<SQL
INSERT INTO district
values(
{$data['district_id']}
, '{$data['district_name']}'
, '{$data['city_id']}'
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

	public function loadDistrictDetailEdit($district_id) {
		$sql = <<<SQL
SELECT * 
FROM district
WHERE district_delete_flg = 0
AND district_id = {$district_id}
ORDER BY district_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			echo json_encode($select);
		} else {
			echo '[]';
		}
	}

	public function editDistrict($data) {
		$sql = <<<SQL
UPDATE district
SET district_name = '{$data['district_name']}'
, city_id = '{$data['city_id']}'
WHERE district_id = {$data['district_id']}
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}
	
	public function deleteDistrict($district_id) {
		$sql = <<<SQL
UPDATE district
SET district_delete_flg = 1
WHERE district_id = {$district_id}
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