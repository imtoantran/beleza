<?php
require (dirname(__FILE__).'/spaCMS_model/spaCMS_home_model.php');

class Faq_Model extends Model {
	function __construct(){
		parent::__construct();
	}

	function index() {
		
	}

	////////////////////////////////////////////// FAQ ////////////////////////////////////
	public function get_questions() {
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_tag,
			f.faq_author,
			f.faq_created,
			c.client_name,
			c.client_email,
			c.client_avatar
		FROM 
			faq f,
			client c
		WHERE 
				f.faq_type = 1 -- question
			AND f.faq_client_id = c.client_id
			AND f.faq_status = 1
		ORDER BY f.faq_created DESC
		LIMIT 10
SQL;
		$data = $this->db->select($aQuery);

		if($data) {
			echo json_encode($data);
		} else {
			echo 0;
		}
	}

	public function get_list_news(){
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_image,
			f.faq_author,
			f.faq_created
		FROM 
			faq f
		WHERE 
				f.faq_type = 3 -- news
		ORDER BY f.faq_created DESC
		LIMIT 12
SQL;
		$data = $this->db->select($aQuery);

		if($data) {
			/*imtoantran*/
			require_once LIBS . DS . 'other' . DS . 'htmlpurifier-4.6.0'.DS.'library'.DS.'HTMLPurifier.auto.php';
			$config = HTMLPurifier_Config::createDefault();
			$purifier = new HTMLPurifier($config);
			$config->set('HTML.Allowed', '');
			foreach($data as $key => $value){
				$data[$key]['faq_content'] = $purifier->purify($value['faq_content']);
			}
			/*imtoantran*/
			echo json_encode($data);
		} else {
			echo 0;
		}
	}


	public function get_list_service_type() {
		$list_st = self::get_service_type();

		echo json_encode($list_st);
	}

	public function get_list_service() {
		$list_s = self::get_service_of_service_type($_GET['service_type_id']);

		echo json_encode($list_s);
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


	//////////////////////////////////// FIND LOCATION ////////////////////////////////////////
	public function get_service($service_id) {
		$aQuery = <<<SQL
		SELECT 
			service_id,
			service_name,
			service_image,
			service_description,
			service_service_type_id
		FROM 
			service
		WHERE 
			service_id = {$service_id}
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function get_recent_question($service_id) {
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_tag,
			f.faq_author,
			f.faq_created,
			c.client_name,
			c.client_email,
			c.client_avatar
		FROM 
			faq f,
			client c
		WHERE 
				f.faq_client_id = c.client_id
			AND f.faq_type = 1 -- question
			AND f.faq_tag LIKE '%"id":"{$service_id}"%'
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function get_recent_news($service_id) {
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_tag,
			f.faq_image,
			f.faq_author,
			f.faq_created
		FROM 
			faq f
		WHERE 
				f.faq_type = 3 -- news
			AND f.faq_tag LIKE '%"id":"{$service_id}"%'
SQL;
		$data = $this->db->select($aQuery);
		return $data;
	}

	public function get_recent_location($service_id) {
		$aQuery = <<<SQL
		SELECT
			u.user_id,
			u.user_business_name,
			u.user_description,
			u.user_logo,
			ur.user_review_overall
		FROM 
			user u LEFT JOIN
			(
				group_service gs 
					RIGHT JOIN user_service us 
					ON gs.group_service_id = us.user_service_group_id
			) ON u.user_id = gs.group_service_user_id
			LEFT JOIN
			user_review ur ON u.user_id = ur.user_id
		WHERE 
			us.user_service_service_id = {$service_id}
		GROUP BY u.user_id
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function get_near_location() {
		$service_id = $_GET['service_id'];
		$origLat = $_GET['current_lat'];
		$origLon = $_GET['current_lng']; 
		$dist = 10; // This is the maximum distance (in miles) away from $origLat, $origLon in which to search

		$aQuery = <<<SQL
		SELECT 
			user_id, 
			user_business_name, 
			user_lat, 
			user_long, 
			3956 * 2 * ASIN(SQRT( POWER(SIN(($origLat - abs(user_lat))*pi()/180/2),2) + COS($origLat*pi()/180 )*COS(abs(user_lat)*pi()/180) * POWER(SIN(($origLon-user_long)*pi()/180/2),2))) as distance FROM
        	user u LEFT JOIN
			(
				group_service gs 
					RIGHT JOIN user_service us 
					ON gs.group_service_id = us.user_service_group_id
			) ON u.user_id = gs.group_service_user_id
			
        WHERE 
        		us.user_service_service_id = {$service_id} AND user_long BETWEEN ($origLon-$dist/abs(cos(radians($origLat))*69)) AND ($origLon+$dist/abs(cos(radians($origLat))*69)) AND user_lat BETWEEN ($origLat-($dist/69)) AND ($origLat+($dist/69)) HAVING distance < $dist ORDER BY distance limit 100 
SQL;
		$data = $this->db->select($aQuery);

		// print_r($aQuery); exit();

		echo json_encode($data);
	}

	public function get_load_page() {
		$service_id = $_GET['service_id'];

		// Thông tin dịch vụ đó
		$service = self::get_service($service_id);

		// Những địa điểm gần nhất
		// $near_location = self::get_near_location($service_id);
		$recent_location = self::get_recent_location($service_id);

		// Những câu hỏi liên quan
		$recent_question = self::get_recent_question($service_id);

		// Những bài viết liên quan
		$recent_news = self::get_recent_news($service_id);

		$data = array(
			'service' => $service[0],
			// 'near_location' => $near_location,
			'recent_location' => $recent_location,
			'recent_question' => $recent_question,
			'recent_news' => $recent_news
		);

		echo json_encode($data);
	}


	//////////////////////////////////// ASK QUESTION ////////////////////////////////////////
	/**
	 * Danh sách dịch vụ của hệ thống
	 * @return json
	 */
	public function get_service_type() {
		$aQuery = <<<SQL
		SELECT service_type_id, service_type_name, service_type_name_short, service_type_image
		FROM service_type
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function get_service_of_service_type( $service_type_id ) {
		$aQuery = <<<SQL
		SELECT service_id, service_name, service_image
		FROM service
		WHERE service_service_type_id = {$service_type_id}
SQL;
		$data = $this->db->select($aQuery);
		
		return $data;
	}

	public function get_service_system() {
		$get_service_type = self::get_service_type();

		$data = array(); // data return
		$index = 0;
		foreach ($get_service_type as $st) {
			$data[$index] = array(
				'service_type_id' => $st['service_type_id'],
				'service_type_name' => $st['service_type_name']
			);

			$get_service = self::get_service_of_service_type($st['service_type_id']);
			foreach ($get_service as $service) {
				$data[$index]['list_service_system'][] = array(
					'service_id' => $service['service_id'],
					'service_name' => $service['service_name'],
					'service_image' => $service['service_image']
				);
			}
			$index++;
		}

		echo json_encode($data);
	}


	public function insert_question() {
		Session::init();
		$client_id = Session::get('client_id');
		$client_name = Session::get('client_name');

		$data = array(
			'faq_title' => $_POST['faq_title'],
        	'faq_content' => $_POST['faq_content'],
        	'faq_tag' => $_POST['faq_tag'],
        	'faq_client_id' => $client_id,
        	'faq_author' => $client_name,
        	'faq_type' => 1,
        	'faq_created' => date("Y-m-d H:i:s")
		);

		$result = $this->db->insert('faq', $data);

		if($result) {
			// hủy tiêu đề câu hỏi
			unset($_SESSION['faq_title']);
			echo 'success';
		} else {
			echo 'error';
		}
	}





	//////////////////////////////////////////// DETAIL QUESTION //////////////////////////////////
	public function get_question() {
		$data_id = $_GET['data_id'];
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_tag,
			f.faq_author,
			f.faq_created,
			c.client_name,
			c.client_email,
			c.client_avatar
		FROM 
			faq f,
			client c
		WHERE 
				f.faq_id = {$data_id}
			AND f.faq_client_id = c.client_id
SQL;
		$data = $this->db->select($aQuery);

		$data[0]['count_answer'] = self::count_answer($data_id);

		if($data) {
			echo json_encode($data[0]);
		} else {
			echo 0;
		}
		
	}


	public function get_service_related() {
		$data_id = $_GET['data_id'];
		// IN Clause mysql
		$in = '( ';
		foreach ($_GET['tag_related'] as $tag) {
			$in .= $tag['id'] . ', ';
		}
		$in = substr($in, 0, -2);
		$in .= ' )';

		$aQuery = <<<SQL
		SELECT 
			us.user_service_name,
			u.user_id,
			u.user_business_name,
			u.user_address,
			us.user_service_full_price,
			us.user_service_sale_price,
			us.user_service_image
		FROM 
			user_service us,
			group_service gs,
			user u
		WHERE 
				us.user_service_group_id = gs.group_service_id
			AND gs.group_service_user_id = u.user_id
			AND us.user_service_service_id IN {$in}
			AND us.user_service_delete_flg = 0 -- chưa bị hủy
		ORDER BY us.user_service_sale_price ASC -- giá sale tăng dần
SQL;
		$data = $this->db->select($aQuery);

		if($data) {
			echo json_encode($data);
		} else {
			echo 0;
		}
	}


	public function insert_answer_question() {
		Session::init();
		$client_id = Session::get('client_id');

		$data = array(
			'faq_content' => $_POST['faq_content'],
			'faq_parent_id' => $_POST['faq_parent_id'],
			'faq_type' => 2, // answer
			'faq_client_id' => $client_id,
			'faq_created' => date('Y-m-d h:m:s')
		);

		$result = $this->db->insert('faq', $data);

		if($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function get_top_answer($faq_id) {
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_content,
			f.faq_like,
			c.client_id,
			c.client_name,
			c.client_avatar,
			f.faq_author,
			f.faq_created
		FROM 
			faq f LEFT JOIN
			client c ON f.faq_client_id = c.client_id
		WHERE 
				f.faq_parent_id = {$faq_id}
			-- AND f.faq_client_id = c.client_id
			AND f.faq_status = 1
		ORDER BY f.faq_like DESC, f.faq_created ASC
		LIMIT 1
SQL;
		$data = $this->db->select($aQuery);

		// get answers
		$data[0]['answers'] = self::get_answers($data[0]['faq_id']);

		return $data[0];
	}


	public function get_other_answer($faq_id, $top_answer_id) {
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_content,
			f.faq_like,
			c.client_id,
			c.client_name,
			c.client_avatar,
			f.faq_author,
			f.faq_created
		FROM 
			faq f LEFT JOIN
			client c ON f.faq_client_id = c.client_id
		WHERE 
				f.faq_parent_id = {$faq_id}
			-- AND f.faq_client_id = c.client_id
			AND f.faq_id <> {$top_answer_id}
			AND f.faq_status = 1
		ORDER BY f.faq_created DESC
SQL;
		$data = $this->db->select($aQuery);

		// get answers
		foreach ($data as $key => $value) {
			$data[$key]['answers'] = self::get_answers($value['faq_id']);
		}

		return $data;
	}



	public function get_answers($faq_parent_id) {
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_content,
			f.faq_like,
			c.client_id,
			c.client_name,
			c.client_avatar,
			f.faq_author,
			f.faq_created
		FROM 
			faq f LEFT JOIN
			client c ON f.faq_client_id = c.client_id
		WHERE 
				f.faq_parent_id = {$faq_parent_id}
			-- AND f.faq_client_id = c.client_id
			AND f.faq_status = 1
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}


	public function get_list_answer() {
		$data_id = $_GET['data_id'];

		$top_answer = self::get_top_answer($data_id);
		$other_answer = self::get_other_answer($data_id, $top_answer['faq_id']);

		$data = array(
			'top_answer' => $top_answer,
			'other_answer' => $other_answer
		);


		if($data) {
			echo json_encode($data);
		} else {
			echo 0;
		}

	}


	public function insert_comment_answer() {
		Session::init();
		$client_id = Session::get('client_id');

		$data = array(
			'faq_content' => $_POST['faq_content'],
			'faq_parent_id' => $_POST['faq_parent_id'],
			'faq_type' => 2, // answer
			'faq_client_id' => $client_id,
			'faq_created' => date('Y-m-d h:m:s')
		);

		$result = $this->db->insert('faq', $data);

		if($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function check_liked($faq_id, $client_id) {
		$aQuery = <<<SQL
		SELECT 
			faq_client_like
		FROM 
			faq 
		WHERE 
			faq_id = {$faq_id}
SQL;
		$data = $this->db->select($aQuery);

		$faq_client_like = $data[0]['faq_client_like'];

		$faq_client_like = explode(',', $faq_client_like);

		if(in_array("$client_id", $faq_client_like)){
			return true;
		}

		return false;
	}


	public function update_like() {
		Session::init();
		$client_id = Session::get('client_id');
		$faq_id = $_POST['faq_id'];
		$check_liked = self::check_liked($faq_id, $client_id);

		if(!$check_liked) {
			$aQuery_increase_like = "UPDATE faq SET faq_like = faq_like + 1, faq_client_like = concat(faq_client_like, '$client_id,') WHERE faq_id = $faq_id";
			
			$sth = $this->db->prepare($aQuery_increase_like);
			$result = $sth->execute();

			if($result) {
				echo 'success';
			} else {
				echo 'error';
			}
		} else {
			echo 'liked';
		}
		
	}


	public function count_answer($faq_id) {
		$count_answer = self::get_answers($faq_id);

		return count($count_answer);
	}
	



	///////////////////////////////////////////// NEWS ////////////////////////////////
	public function get_content_news(){
		$data_id = $_GET['data_id'];
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_author,
			f.faq_tag,
			f.faq_created
		FROM 
			faq f
		WHERE 
			f.faq_id = {$data_id}
SQL;
		$data = $this->db->select($aQuery);

		if($data) {
			require './public/assets/plugins/wysibb/bbcode2html.php';
			$data[0]['faq_content'] = bbcode2html($data[0]['faq_content']);
			echo json_encode($data[0]);
		} else {
			echo 0;
		}
	}


	public function get_news_related() {
		$data_id = $_GET['data_id'];

		$where = ' ';
		foreach ($_GET['tags_related'] as $tag) {
			$where .= 'faq_tag LIKE "%'. $tag['text'] .'%" OR ';
		}

		$where = substr($where, 0, -3);

		$aQuery = <<<SQL
		SELECT 
			faq_id,
			faq_title
		FROM 
			faq 
		WHERE 
				faq_type = 3 -- news
			AND faq_id <> {$data_id} -- các bài liên quan khác
			AND ({$where})
SQL;
		$data = $this->db->select($aQuery);

		if($data) {
			echo json_encode($data);
		} else {
			echo 0;
		}
	}

}