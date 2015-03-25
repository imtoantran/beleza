<?php
/**
 * 	@author imtoantran@gmail.com
 * 
 */ 
class Admincp_Banner_Model extends Model {
	function __construct() {
		parent::__construct();
	}
	/**
	* author:imtoantran 
	* load banner list
	*/
	public function loadBanners($value='')
	{
		# code...
		$sql = "SELECT id, title, alias FROM revslider_sliders";		
		$select = $this -> db -> select($sql);
		return json_encode($select);
	}
	public function loadSlides($banner_id='')
	{
		# code...
		$sql = "SELECT id, params FROM revslider_slides where slider_id=$banner_id";		
		$select = $this -> db -> select($sql);
		return json_encode($select);
	}
	public function loadAllSlides()
	{
		# code...
		$sql = "SELECT id, name,url FROM revslider_images";		
		$select = $this -> db -> select($sql);
		return json_encode($select);
	}
	public function loadSlide($slide_id)		
	{
		# code...
		$sql = "SELECT slider_id,params,layers FROM revslider_slides where id=$slide_id";
		$select = $this -> db -> select($sql);
		return $select[0];
	}
	public function loadCss($name='')
	{
		$sql="SELECT handle,params FROM revslider_css";
		$select = $this->db->select($sql);
		return $select;
	}
	public function loadCssContent($name='')
	{
		$sql="SELECT params FROM revslider_css ";
		if($name!=''){
			$sql .= " WHERE handle = '.tp-caption.".$name."'";
		}
		$select = $this->db->select($sql);
		return $select[0];
	}
	public function saveCss($handle='',$params='')
	{
		# code...
		if(count($this->db->select("select * from revslider_css where handle = '.tp-caption.".$handle."'"))){
			// update
			echo 'update';
			$this->db->update("revslider_css",array("params"=>$params),"handle = '.tp-caption.".$handle."'");
		}else{
			// insert
			echo 'insert';
			$this->db->insert("revslider_css",array("params"=>$params,"handle"=>".tp-caption.".$handle.""));
		}

	}
	public function saveSlide($slide_id,$params,$layers)
	{	print $slide_id;
		# code...
		if(!$this->db->update('revslider_slides',array('params'=>$params,'layers'=>$layers),"id='".$slide_id."'")){
			$this->db->insert('revslider_slides',array('params'=>$params,'layers'=>$layers));var_dump('expression');
		}

	}
	public function upload($name)
	{
		# code...
		$this->db->insert("revslider_images",array("name"=>$name,"url"=>$name));
	}
	public function addSlide($banner_id,$params)
	{
		# code...
		$this->db->insert("revslider_slides",array("slider_id"=>$banner_id,"layers"=>"[]","params"=>$params));
	}
	public function delSlide($slide_id='')
	{
		# code...
		$this->db->delete("revslider_slides","id ='".$slide_id."'");
	}
	public function deleteImage($value='')
	{
		$params = $_REQUEST;
		$result = $this->db->delete("revslider_images","id = ".$params['id']);
		if($result){
			if(file_exists("public/assets/revslider/images/".$params['imageName']))
				unlink("public/assets/revslider/images/".$params['imageName']);
		}
	}
}
