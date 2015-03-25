<?php

class revslider_model extends Model {
	function __construct() {
		parent::__construct();
	}
	/**
	* author:imtoantran 
	* load banner list
	*/
	public function loadSlides($slider_id='')
	{
		# code...
		// $sql = "SELECT * FROM revslider_slides where slider_id=$slider_id";			
		// $select = $this -> db -> select($sql);
		$aQuery = <<<SQL
		SELECT revslider_slides.*
		FROM 
			revslider_slides 
				LEFT JOIN revslider_sliders 
				ON revslider_sliders.id = revslider_slides.slider_id
		WHERE 
			revslider_sliders.alias = '{$slider_id}'
SQL;
		$data = $this->db->select($aQuery);

		return $data;
	}

	public function loadCss($value='')
	{
		$sql="SELECT handle,params FROM revslider_css";
		$select = $this->db->select($sql);
		return $select;
	}
}