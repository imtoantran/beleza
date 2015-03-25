<?php

class Introbusiness_Model extends Model {
	function __construct() {
		parent::__construct();
	}

	public function get_page_aboutus(){
		$aQuery = <<<SQL
		SELECT *
		FROM page_aboutus
		WHERE page_aboutus_id = 1
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	
	}
}