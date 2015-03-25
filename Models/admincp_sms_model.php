<?php

class Admincp_sms_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * author:imtoantran 
     * load banner list
     */
    public function loadSMS() {
        # code...
        $sql = "SELECT * FROM sms_templates";
        $select = $this->db->select($sql);
        return $select;
    }

    public function saveSMS($id, $content) {
        $this->db->update("sms_templates", array("content" => $content), "id = '" . $id . "'");
    }

    public function switchSMS($value) {
        if ($value != 1 && $value != 0) {
            $option = $this->db->select("select * from options where type='sms' and name='sms'");
            $value = $option[0]['sms'];
            return $this->SMSStatus($value);
        } 
        if ($this->db->update("options", array("value" => $value), " type='sms' and `name`='sms'")) {
            return $this->SMSStatus($value);
        }
    }

    public function changeStatus($id) {
        $label = array("Bật", "Tắt");
        $data = $this->db->select("SELECT status from sms_templates where id = $id");
        $value = $data[0]['status'];
        if ($value == '0') {
            $value = '1';
        } else
            $value = '0';
        
        $this->db->update("sms_templates", array("status" => $value), " id = $id ");
        return $label[$value];
    }

    private function SMSStatus($value) {
        if ($value == 0) {
            return array("t" => "1", "html" => "SMS đã tắt");
        } else {
            return array("t" => "0", "html" => "SMS đã bật");
        }
    }

}
