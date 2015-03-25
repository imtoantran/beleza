<?php

class Admincp_email_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * author:imtoantran 
     * load banner list
     */
    public function loadList() {
        # code...
        $sql = "SELECT * FROM email_templates";
        $select = $this->db->select($sql);
        return $select;
    }

    /*
     * @author: imtoantran
     * save email template
     */

    public function save($id, $content, $subject, $slug, $name) {
        if ($id == '') {
            $params = array("content" => $content, "subject" => $subject, "slug" => $slug, "name" => $name);
            if($this->db->insert("email_templates", $params)){
                $result = $this->db->select("select max(id) id from email_templates", $params);
                return $result[0];
            }else{
                return ['error'=>true];
            }                        
        }
        $this->db->update("email_templates", array("content" => $content, "subject" => $subject,"name"=>$name,"slug"=>$slug), "id = '" . $id . "'");
    }

    public function delete($id, $content, $subject) {
        $this->db->delete("email_templates", "id = '" . $id . "'");
    }
    public function helps(){
        $result = $this->db->select("select value from options where name = 'email_template_hint'");
        return json_decode($result[0]['value']);
    }

}
