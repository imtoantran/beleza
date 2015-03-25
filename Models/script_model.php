<?php

class script_model extends Model {
	function __construct() {
		parent::__construct();
	}
	public function loadDataScript(){
		$sql = <<<SQL
		SELECT script_header, script_footer
		FROM script
SQL;
		$select = $this->db->select($sql);
		return $select;
	}
}
