<?php
/**
 *
 */
class clientpreference_model extends Model {

	function __construct() {
		parent::__construct();
	}
	public function updateTag(){
		if(isset($_SESSION['client_id'])){
			if(isset($_POST['data'])){
				$result = $this->db->update('client', ["client_service_tag"=>$_POST['data']], "client_id = '".$_SESSION['client_id']."'");
				if($result){
					return ["success"=>true];
				}
			}
		}
		return ["success"=>false];
	}
	public function getTag(){
		if(isset($_SESSION['client_id'])) {
			$sql = "select client_service_tag from client where client_id = '".$_SESSION['client_id']."'";
			$select = $this->db->select($sql);
			if($select){
				return ["success"=>true,"content"=>json_decode($select[0]['client_service_tag'])];
			}
		}
		return ["success"=>false];
	}
}
?>