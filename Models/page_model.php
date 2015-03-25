<?php
class Page_Model extends Model {
	function __construct() {
		parent::__construct();
	}

	public function check_slug($slug) {
		$aQuery = <<<SQL
		SELECT *
		FROM page
		WHERE page_slug = '{$slug}'
SQL;
		$data = $this->db->select($aQuery);

		if(count($data) > 0) {
			return true;
		}

		return false;
	}

	public function get_page() {
		$page_slug = $_GET['page_slug'];

		$aQuery = <<<SQL
		SELECT *
		FROM page
		WHERE page_slug = '{$page_slug}'
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function get_sidebar() {
		$aQuery = <<<SQL
		SELECT *
		FROM sidebar
		WHERE sidebar_id = 1
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}
}