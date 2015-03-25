<?php
/**
 *
 */
class admincp_service_type_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function loadServiceTypeList() {
		$sql = <<<SQL
SELECT service_type_id
, service_type_name
, service_type_name_short
, service_type_icon
FROM service_type
WHERE service_type_delete_flg = 0
ORDER BY service_type_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			echo json_encode($select);
		} else {
			echo "[]";
		}
	}

	public function saveServiceType($data) {
		$service_type_image = $_FILES["service_type_image"];

		if(!$service_type_image["error"]) {
			$file_name = str_replace(" ", "", $service_type_image["name"]);

			if($file_name != '') {
				$tmp_name = $service_type_image["tmp_name"];

				$path_folder = BASE_PATH . DS . 'public/assets/img/service_image/';
				$path_file = $path_folder . DS . $file_name; // image location in store
				$path_insertSQL = 'public/assets/img/service_image/' . $file_name;

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

		$sql = <<<SQL
INSERT INTO service_type(
service_type_name
, service_type_name_short
, service_type_icon
, service_type_image
)
values(
'{$data['service_type_name']}'
, '{$data['service_type_name_short']}'
, '{$data['service_type_icon']}'
, '{$path_insertSQL}'
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

	public function loadServiceTypeDetailEdit($service_type_id) {
		$sql = <<<SQL
SELECT * 
FROM service_type
WHERE service_type_delete_flg = 0
AND service_type_id = {$service_type_id}
ORDER BY service_type_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if ($select) {
			echo json_encode($select);
		} else {
			echo '[]';
		}
	}

	public function editServiceType($data) {
		$service_type_image = $_FILES["service_type_image"];

		if(!$service_type_image["error"]) {
			$file_name = str_replace(" ", "", $service_type_image["name"]);

			if($file_name != '') {
				$tmp_name = $service_type_image["tmp_name"];

				$path_folder = BASE_PATH . DS . 'public/assets/img/service_image/';
				$path_file = $path_folder . DS . $file_name; // image location in store
				$path_insertSQL = 'public/assets/img/service_image/' . $file_name;

		    	if(!is_dir($path_folder)) {
			      	mkdir($path_folder, 0775, true);
			    }

			    // Save file
			    move_uploaded_file($tmp_name, $path_file);

			    // Create thumbnail image
			    self::make_thumb($path_file, $path_file, 170, 150);

			    $update_image = ", service_type_image = '{$path_insertSQL}'";
			}
		} else {
			$path_insertSQL = '';
			$update_image = '';
		}

		$sql = <<<SQL
UPDATE service_type
SET service_type_name = '{$data['service_type_name']}'
, service_type_name_short = '{$data['service_type_name_short']}'
, service_type_icon = '{$data['service_type_icon']}'
{$update_image}
WHERE service_type_id = {$data['service_type_id']}
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			echo 200;
		} else {
			echo 0;
		}
	}

	public function deleteServiceType($service_type_id) {
		$sql = <<<SQL
UPDATE service_type
SET service_type_delete_flg = 1
WHERE service_type_id = {$service_type_id}
SQL;
		$update = $this -> db -> prepare($sql);
		$update -> execute();
		if ($update -> rowCount() > 0) {
			$sql = <<<SQL
UPDATE service
SET service_delete_flg = 1
WHERE service_service_type_id = {$service_type_id}
SQL;
			$update = $this -> db -> prepare($sql);
			$update -> execute();
			if ($update -> rowCount() > 0) {
				echo 200;
			} else {
				echo 0;
			}
		} else {
			echo 0;
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