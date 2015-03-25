<?php
/**
 *
 */
class clientsetting_model extends Model {

	function __construct() {
		parent::__construct();
	}

	function loadUserDetail() {
		Session::init();
		echo json_encode($this -> db -> select('SELECT client_email, client_name, client_username, client_creditpoint, client_giftpoint, client_phone, client_sex, client_note, client_birth, client_avatar FROM client WHERE client_id=' . $_SESSION['client_id']));
	}

	function getPass() {
		Session::init();
		return $this -> db -> select('SELECT client_pass FROM client WHERE client_id=' . $_SESSION['client_id']);
	}

	function changePass($data) {
		$update = $this -> db -> prepare("UPDATE client SET client_pass ='" . $data['client_pass'] . "' WHERE client_id=" . $data['client_id']);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 2;
		}
	}

	function editUserDetail($data) {
		Session::init();
		if (isset($data['client_name'])) {
			Session::set('client_name', $data['client_name']);
		}
		if (isset($data['client_phone'])) {
			Session::set('client_phone', $data['client_phone']);
		}
		if(isset($data['client_note'])){
		}
		if(isset($data['client_birth'])){
		}
		echo $update = $this -> db -> update('client', $data, 'client_id=' . $_SESSION['client_id']);
	}

	function update_avatar() {
		Session::init();
		if (isset($_SESSION['client_id'])) {
			$client_avatar = $_FILES["client_avatar"];

			if(!$client_avatar["error"]) {
				$file_name = str_replace(" ", "", $client_avatar["name"]);

				if($file_name != '') {
					$tmp_name = $client_avatar["tmp_name"];

					$path_folder = BASE_PATH . DS . 'public/assets/img/avatar/';
					$path_file = $path_folder . DS . $file_name; // image location in store
					$path_insertSQL = 'public/assets/img/avatar/' . $file_name;

			    	if(!is_dir($path_folder)) {
				      	mkdir($path_folder, 0775, true);
				    }

				    // Save file
				    move_uploaded_file($tmp_name, $path_file);

				    // Create thumbnail image
				    self::make_thumb($path_file, $path_file, 170, 150);

				    $rs = $this->db->update('client', array('client_avatar'=>$path_insertSQL), 'client_id=' . $_SESSION['client_id']);

				    if($rs) {
				    	echo 200;
				    } else {
				    	echo 0;
				    }
				}
			}
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
?>