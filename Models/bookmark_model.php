<?php
/**
 * 
 */
class bookmark_model extends Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function bookmarks() {
		Session::initIdle();
		$client_id = Session::get('client_id');
		$sql = <<<SQL
		SELECT
		b.id,
		u.user_id,
		u.user_business_name
		FROM bookmark b
		JOIN user u
		ON b.user_id = u.user_id
		WHERE b.client_id = {$client_id}
		ORDER BY b.created_date DESC
SQL;
		$select = $this->db->select($sql);
		if($select){
			return $select;
		}else{
			return [];
		}
	}
	public function remove(){
		Session::initIdle();
		$client_id = Session::get('client_id');
		$select = $this->db->delete("bookmark","client_id = {$client_id} AND user_id = {$_POST['id']}");
		if($select){
			return ["success"=>true];
		}else{
			return ["success"=>false];
		}
	}

}

?>