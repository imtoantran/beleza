<?php
/**
 *
 */
class admincp_city_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function loadCityList() {
		$sql = <<<SQL
SELECT * 
FROM city
WHERE city_delete_flg = 0
ORDER BY city_id ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			// echo json_encode($select);
			$sOutput = '[';
			foreach ($select as $row) {
				$sOutput .= "[";
				$sOutput .= '"' . str_replace('"', '\"', $row['city_id']) . '",';
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

	public function saveCity($data) {
		$sql = <<<SQL
INSERT INTO city(
city_name
, city_delete_flg
)
values(
 '{$data['city_name']}'
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

	public function loadCityDetailEdit($city_id) {
		$sql = <<<SQL
SELECT * 
FROM city
WHERE city_delete_flg = 0
AND city_id = {$city_id}
ORDER BY city_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			echo json_encode($select);
		} else {
			echo '[]';
		}
	}

	public function editCity($data) {
		$sql = <<<SQL
UPDATE city
SET city_name = '{$data['city_name']}'
WHERE city_id = {$data['city_id']}
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}
	
	public function deleteCity($city_id) {
		$sql = <<<SQL
UPDATE city
SET city_delete_flg = 1
WHERE city_id = {$city_id}
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