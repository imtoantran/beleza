<?php
class admincp_community_model extends Model {
	function __construct(){
		parent::__construct();
	}

	function index() {
		
	}

	/**
	 * Danh sách dịch vụ của hệ thống
	 * @return json
	 */
	function get_service_type() {
		$aQuery = <<<SQL
		SELECT service_type_id, service_type_name
		FROM service_type
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	function get_service( $service_type_id ) {
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

			$get_service = self::get_service($st['service_type_id']);
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

	/**
	 * Danh sách câu hỏi
	 * @return json
	 */
	public function get_question() {
		$aQuery = <<<SQL
		SELECT  
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_tag,
			f.faq_like,
			f.faq_status,
			f.faq_created,
			c.client_name
		FROM 
			faq f, 
			client c
		WHERE 
				f.faq_type = 1
			AND f.faq_client_id = c.client_id
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data);

	}

	/**
	 * Cau tra loi
	 * @return json
	 */
	public function get_answer_question() {
		$data_id = $_GET['data_id'];
		$admin_username = Session::get('admin_username');
		$aQuery = <<<SQL
		SELECT  
			f.faq_id,
			f.faq_content,
			f.faq_created
		FROM 
			faq f
		WHERE 
				f.faq_type = 2
			AND f.faq_parent_id = {$data_id}
			AND f.faq_author = '{$admin_username}'
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	/**
	 * Chi tiết câu hỏi
	 * @param data_id
	 * @return json
	 */
	public function getOM_detail_question($data_id) {
		$aQuery = <<<SQL
		SELECT  
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_tag,
			f.faq_like,
			f.faq_status,
			f.faq_created,
			c.client_name
		FROM 
			faq f, 
			client c
		WHERE 
				f.faq_id = {$data_id}
			AND	f.faq_type = 1
			AND f.faq_client_id = c.client_id
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	/**
	 * Update tag cua cau hoi
	 * @param data_id
	 * @return json
	 */
	public function update_question_tag() {
		$data_id = $_POST['faq_id'];

		$data = array(
			'faq_tag' => $_POST['faq_tag']
		);

		$result = $this->db->update('faq', $data, "faq_id = $data_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	/**
	 * Duyệt câu hỏi
	 * @param data_id
	 * @return json
	 */
	public function update_question_confirm($data_id) {
		$data = array(
			'faq_status' => 1
		);

		$result = $this->db->update('faq', $data, "faq_id = $data_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	/**
	 * Update cau hoi va duyet
	 * @param data_id
	 * @return json
	 */
	public function update_question() {
		$data_id = $_POST['faq_id'];

		$data = array(
			'faq_tag' => $_POST['faq_tag'],
			'faq_status' => 1
		);

		$result = $this->db->update('faq', $data, "faq_id = $data_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
	
	/**
	 * Thêm câu trả lời
	 * @param data_id
	 * @return json
	 */
	public function insert_answer() {
		$data = array(
			'faq_parent_id' => $_POST['faq_parent_id'], 
			'faq_content' 	=> $_POST['faq_content'],
			'faq_type' 		=> 2, // answer
			'faq_author' 	=> Session::get('admin_username'),
			'faq_status' 	=> 1,
			'faq_created' 	=> date('Y-m-d H:m:s')
		);

		$result = $this->db->insert('faq', $data);

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
	
	/**
	 * update câu trả lời
	 * @param data_id
	 * @return json
	 */
	public function update_answer() {
		$data_id = $_POST['faq_id'];

		$data = array(
			'faq_content' => $_POST['faq_content'],
		);

		$result = $this->db->update('faq', $data, "faq_id = $data_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
	
	/**
	 * thêm bài post
	 * @param data_id
	 * @return json
	 */
	public function insert_post() {
		$data_id = $_POST['faq_id'];
		$faq_image = $_FILES["faq_image"];

		if(!$faq_image["error"]) {
			if($file_name != '') {
				$file_name = str_replace(" ", "", $faq_image["name"]);
				$tmp_name = $faq_image["tmp_name"];

				$path_folder = BASE_PATH . DS . 'public/assets/img/post_image/' . date("Ym");
				$path_file = $path_folder . DS . $file_name; // image location in store
				$path_insertSQL = 'public/assets/img/post_image/'. date("Ym") . '/' . $file_name;

		    	if(!is_dir($path_folder)) {
			      	mkdir($path_folder, 0775, true);
			    }

			    // Save file
			    move_uploaded_file($tmp_name, $path_file);

			    // Create thumbnail image
			    self::make_thumb($path_file, $path_file, 170, 150);
			}
			
		} else {
			$path_insertSQL = '';
		}
		

		$data = array(
			'faq_title' => $_POST['faq_title'],
			'faq_content' => $_POST['faq_content'],
			'faq_tag' => $_POST['faq_tag'],
			'faq_image' => $path_insertSQL,
			'faq_status' => $_POST['faq_status'],
			'faq_type' => 3,
			'faq_created' => date("Y-m-d H:i:s")
		);

		$result = $this->db->insert('faq', $data);

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function get_post() {
		$aQuery = <<<SQL
		SELECT  
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_tag,
			f.faq_like,
			f.faq_status,
			f.faq_created
		FROM 
			faq f
		WHERE 
			f.faq_type = 3
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data);
	}

	public function get_detail_post() {
		$post_id = $_GET['data_id'];
		$aQuery = <<<SQL
		SELECT  
			f.faq_id,
			f.faq_title,
			f.faq_content,
			f.faq_image,
			f.faq_tag,
			f.faq_like,
			f.faq_status,
			f.faq_created
		FROM 
			faq f
		WHERE 
				f.faq_type = 3
			AND f.faq_id = {$post_id}
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}



	/**
	 * update bài viết
	 * @param data_id
	 * @return json
	 */
	public function update_post() {
		$data_id = $_POST['faq_id'];

		$faq_image = $_FILES["faq_image"];

		if(!$faq_image["error"]) {
			$file_name = str_replace(" ", "", $faq_image["name"]);

			if($file_name != '') {
				$tmp_name = $faq_image["tmp_name"];

				$path_folder = BASE_PATH . DS . 'public/assets/img/post_image/' . date("Ym");
				$path_file = $path_folder . DS . $file_name; // image location in store
				$path_insertSQL = 'public/assets/img/post_image/'. date("Ym") . '/' . $file_name;

		    	if(!is_dir($path_folder)) {
			      	mkdir($path_folder, 0775, true);
			    }

			    // Save file
			    move_uploaded_file($tmp_name, $path_file);

			    // Create thumbnail image
			    self::make_thumb($path_file, $path_file, 170, 150);
			}
		} else {
			$path_insertSQL = null;
		}

		$data = array(
			'faq_title' => $_POST['faq_title'],
			'faq_content' => $_POST['faq_content'],
			'faq_tag' => $_POST['faq_tag'],
			'faq_status' => $_POST['faq_status']
		);

		if($path_insertSQL) {
			$data['faq_image'] = $path_insertSQL;
		}

		$result = $this->db->update('faq', $data, "faq_id = $data_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function delete_post() {
		$data_id = $_POST['data_id'];

		$result = $this->db->delete('faq', "faq_id = $data_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	/**
	 * D/S câu trả lời cần duyệt
	 * @param data_id
	 * @return json
	 */
	public function get_answer() {
		$aQuery = <<<SQL
		SELECT 
			f.faq_id,
			faq_parent.faq_parent_content,
			f.faq_content,
			c.client_name,
			f.faq_created
		FROM 
			faq f,
			(
				SELECT 
					f2.faq_id, 
					f2.faq_content as 'faq_parent_content'
				FROM faq f2
				WHERE 
						f2.faq_type = 2 -- câu trả lời
					OR 	f2.faq_type = 1 -- câu hỏi
			) as faq_parent,
			client c
		WHERE 
				f.faq_status = 0 -- chưa được duyệt
			AND	f.faq_type = 2 -- answer
			AND f.faq_client_id = c.client_id
			AND faq_parent.faq_id = f.faq_parent_id
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data);
	}


	public function update_confirm_answer(){
		$data_id = $_POST['data_id'];

		$data = array(
			'faq_status' => 1 // đã duyệt ok
		);

		$result = $this->db->update('faq', $data, "faq_id = $data_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	function getExtension($str) {
	    $i = strrpos($str, ".");
	    if (!$i) {
	      return "";
	    }
	    $l = strlen($str) - $i;
	    $ext = substr($str, $i + 1, $l);
	    return $ext;
	}

	function make_thumb($img_name, $filename, $new_w, $new_h) {
	    //get image extension.
		$ext = self::getExtension($img_name);
	    //creates the new image using the appropriate function from gd library
		if (!strcmp("jpg", $ext) || !strcmp("jpeg", $ext))
			$src_img = imagecreatefromjpeg($img_name);

		if (!strcmp("png", $ext))
			$src_img = imagecreatefrompng($img_name);

	    //gets the dimmensions of the image
		$old_x = imageSX($src_img);
		$old_y = imageSY($src_img);

	    // next we will calculate the new dimmensions for the thumbnail image
	    // the next steps will be taken:
	    //    1. calculate the ratio by dividing the old dimmensions with the new ones
	    //    2. if the ratio for the width is higher, the width will remain the one define in WIDTH variable
	    //        and the height will be calculated so the image ratio will not change
	    //    3. otherwise we will use the height ratio for the image
	    // as a result, only one of the dimmensions will be from the fixed ones
		$ratio1 = $old_x / $new_w;
		$ratio2 = $old_y / $new_h;
		if ($ratio1 > $ratio2) {
			$thumb_w = $new_w;
			$thumb_h = $old_y / $ratio1;
		} else {
			$thumb_h = $new_h;
			$thumb_w = $old_x / $ratio2;
		}

	    // we create a new image with the new dimmensions
		$dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);

	    // resize the big image to the new created one
		imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);

	    // output the created image to the file. Now we will have the thumbnail into the file named by $filename
		if (!strcmp("png", $ext))
			imagepng($dst_img, $filename);
		else
			imagejpeg($dst_img, $filename);

	    //destroys source and destination images.
		imagedestroy($dst_img);
		imagedestroy($src_img);
	}
}