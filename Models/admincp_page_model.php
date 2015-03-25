<?php

class Admincp_Page_Model extends Model {
	function __construct(){
		parent::__construct();
	}

	public function update_page_contact() {
		foreach ($_POST as $key => $value) {
			if($key == "url") {
				continue;
			}

			$data["$key"] = $value;
		}

		$result = $this->db->update("page_contact", $data, "page_contact_id = 1");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function get_page_contact() {
		$aQuery = <<<SQL
		SELECT *
		FROM page_contact
		WHERE page_contact_id = 1
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function update_page_aboutus() {
		foreach ($_POST as $key => $value) {
			if($key == "url") {
				continue;
			}

			$data["$key"] = $value;
		}

		$result = $this->db->update("page_aboutus", $data, "page_aboutus_id = 1");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function get_page_aboutus() {
		$aQuery = <<<SQL
		SELECT *
		FROM page_aboutus
		WHERE page_aboutus_id = 1
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function update_page_giftvoucher() {
		foreach ($_POST as $key => $value) {
			if($key == "url") {
				continue;
			}

			$data["$key"] = $value;
		}

		$result = $this->db->update("page_giftvoucher", $data, "page_giftvoucher_id = 1");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function get_page_giftvoucher() {
		$aQuery = <<<SQL
		SELECT *
		FROM page_giftvoucher
		WHERE page_giftvoucher_id = 1
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function update_page_faq() {
		foreach ($_POST as $key => $value) {
			if($key == "url") {
				continue;
			}

			$data["$key"] = $value;
		}

		$result = $this->db->update("page_faq", $data, "page_faq_id = 1");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function update_sidebar() {
		$data = array();

		for($i = 0; $i < count($_POST['sidebar_link_title']); $i++) {
			$data[$_POST['sidebar_link_title'][$i]] = $_POST['sidebar_link'][$i];
		}

		foreach ($data as $key => $value) {
			if($key == "" && $value == "") {
				continue;
			}
			$remove_linkempty[$key] = $value;
		}

		// print_r(json_encode($remove_linkempty)); exit();

		$data_update = array(
			"sidebar_iframe" => $_POST['sidebar_iframe'],
			"sidebar_link" => json_encode($remove_linkempty)
		);

		$result = $this->db->update("sidebar", $data_update, "sidebar_id = 1");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function get_page_faq() {
		$aQuery = <<<SQL
		SELECT *
		FROM page_faq
		WHERE page_faq_id = 1
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

	public function insert_page() {
		$data = array();

		foreach ($_POST as $key => $value) {
			if($key == "url") {
				continue;
			}
			$key = substr($key, 3);
			$key = strtolower($key);
			
			$data["$key"] = $value;
		}

		// print_r($data); exit();

		$result = $this->db->insert("page", $data);

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function get_page() {
		$aQuery = <<<SQL
		SELECT *
		FROM page
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data);
	}

	public function getOM_detail_page() {
		$data_id = $_GET['data_id'];

		$aQuery = <<<SQL
		SELECT *
		FROM page
		WHERE page_id = {$data_id}
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function update_page() {
		$page_id = $_POST['editPage_id'];
		$data = array();
		foreach ($_POST as $key => $value) {
			if($key == "url") {
				continue;
			}
			$key = substr($key, 4);
			$key = strtolower($key);
			
			$data["$key"] = $value;
		}

		$result = $this->db->update("page", $data, "page_id = $page_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function delete_page() {
		$page_id = $_POST['data_id'];

		$result = $this->db->delete("page", "page_id = $page_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

}