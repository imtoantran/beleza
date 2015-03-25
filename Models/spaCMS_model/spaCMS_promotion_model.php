<?php

class SpaCMS_Promotion_Model {


	// luuhoabk
	/////// get List Promotion
	function load_promotion_list() {
		// get list promotion
		$user_id = Session::get('user_id');	

				$aQuery = <<<SQL
		SELECT *
		FROM promotion
		WHERE user_id = {$user_id} 
		ORDER BY promotion_create_date DESC
SQL;
		$data['list'] = $this->db->select($aQuery);

		//get name user - spa
				$sql = <<<SQL
		SELECT user_business_name
		FROM user
		WHERE user_id = {$user_id} 

SQL;

		$data['user'] = $this->db->select($sql);
		echo json_encode($data);
	}

	function load_promotion_publish (){
		$user_id = Session::get('user_id');
		$promotion_state = isset($_POST['promotion_state'])? $_POST['promotion_state'] : "";
		$aQuery = <<<SQL
		SELECT *
		FROM promotion
		WHERE promotion_state = {$promotion_state} 
		AND user_id = {$user_id} 
		ORDER BY promotion_create_date DESC
SQL;
		$data = $this->db->select($aQuery);
		echo json_encode($data);
	}


	function load_promotion_item() {
		$promotion_id = isset($_POST['promotion_id'])? $_POST['promotion_id'] : "";

		$sql = <<<SQL
		SELECT *
		FROM promotion
		WHERE promotion_id = {$promotion_id} 
		
SQL;
		$data = $this->db->select($sql);
		echo json_encode($data);
	}


	function insert_promotion_item() {
		$user_id = Session::get('user_id');

		$now = getdate();
		$title = isset($_POST['title'])? $_POST['title'] : "";
		$now_date = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '. $now['hours'].':'.$now['minutes'].':'.$now['seconds'];
		$start_date = isset($_POST['start_date'])? $_POST['start_date'] : $now_date;
		$end_date = isset($_POST['end_date'])? $_POST['end_date'] : $now_date;
		$url_img = isset($_POST['url_img'])? $_POST['url_img'] : "";
		$content = isset($_POST['content'])? $_POST['content'] : "";

		$data = array(
			"user_id" => $user_id,
			"promotion_title" => $title,
			"promotion_create_date" => $now_date,
			"promotion_start_date" => $start_date,
			"promotion_end_date" => $end_date,
			"promotion_img" => $url_img,
			"promotion_content" => $content
		);
		
		if( $this->db->insert('promotion', $data) ){
			echo $now;
		} else {
			echo 0;
		}	
	}


	function update_promotion_item() {
		$promotion_id= isset($_POST['id_promotion'])? $_POST['id_promotion'] : "";
		$title = isset($_POST['title'])? $_POST['title'] : "";
		$start_date = isset($_POST['start_date'])? $_POST['start_date'] : "";
		$end_date = isset($_POST['end_date'])? $_POST['end_date'] : "";

		$url_img = isset($_POST['url_img'])? $_POST['url_img'] : "";
		$content = isset($_POST['content'])? $_POST['content'] : "";

		$data = array(
			"promotion_id" => $promotion_id,
			"promotion_title" => $title,
			"promotion_start_date" => $start_date,
			"promotion_end_date" => $end_date,
			"promotion_img" => $url_img,
			"promotion_content" => $content
		);
		$where = "promotion_id = $promotion_id";
		
		if( $this->db->update('promotion', $data, $where) ){
			echo 1;
		} else {
			echo json_encode($data);
		}	
	}

	function publish_promotion_item(){
		$promotion_id= isset($_POST['id_promotion'])? $_POST['id_promotion'] : "";
		$promotion_state = isset($_POST['state_promotion'])? $_POST['state_promotion'] : "";		
		$data = array(
			"promotion_state" => $promotion_state
		);
		$where = "promotion_id = $promotion_id";
		
		if( $this->db->update('promotion', $data, $where) ){
			echo 1;
		} else {
			echo 0;
		}
	}	

	function delete_promotion_item() {
		$id_promotion = isset($_POST['id_promotion']) ? $_POST['id_promotion'] : "";
		
		$where = "promotion_id = $id_promotion";

		$result = $this->db->delete('promotion', $where);
		if($result) {
			echo 1;
		} else {
			echo 0;
		}
	}
}