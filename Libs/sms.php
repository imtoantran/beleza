<?php

/**
 * @author imtoantran@gmail.com
 * @copyright 2014
 * 
 */
////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Define Service URL
////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* imtoantran fix config file missing :v */
/* imtoantran fix config file missing :v */
// require_once LIBS.'Database.php';

////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
 * Gửi SMS
 */
class SMS {

    /**
     * imtoantran@gmail.com
     * Gửi sms thông báo đặt hàng thành công
     */
    var $db;
    var $template;
    var $option;
    var $url;

    function __construct() {
        $this->url = 'http://api.abenla.com/Service.asmx/';
        $this->db = new Database();
        // check SMS module status
        $this->status = 0;
        $opt = $this->db->select("SELECT * FROM options WHERE type='sms'");
        foreach ($opt as $key => $value) {
            $this->option[$value['name']] = $value['value'];
        }
        // load templates
        $templates = $this->db->select("select * from sms_templates");
        foreach ($templates as $key => $value) {
            $this->template[$value['slug']]['content'] = $value['content'];
            $this->template[$value['slug']]['status'] = $value['status'];
        }
    }

    public function send($sdt,$params,$template)
    {
        if($this->template[$template]['status'] == 0){
            return 'sms off';
        }
        $content = $this->template[$template]['content'];
        foreach ($params as $key => $value) {print $key;
            $content = str_replace("{{".$key."}}", $value, $content);
        }
        return $this->sendSMS2($sdt,$content);
    }

    /*
     * imtoantran
     * Thông báo đổi lịch tới khách hàng
     */

    public function clientCalendarChanged($sdt, $ten, $madonhang = '') {
        if ($this->template['clientCalendarChanged']['status'] == '0')
            return;
        $content = str_replace("{{TEN}}", $ten, $this->template['clientCalendarChanged']['content']);
        $content = str_replace("{{MDH}}", $madonhang, $content);
        $this->sendSMS2($sdt, $content);
    }

    /*
     * imtoantran
     * Gửi sms thông báo đặt hàng thành công cho khách hàng
     */

    public function clientOrderSuccess($sdt, $ten, $madonhang = '') {
        if ($this->template['clientOrderSuccess']['status'] == '0')
            return;
        $content = str_replace("{{TEN}}", $ten, $this->template['clientOrderSuccess']['content']);
        $content = str_replace("{{MDH}}", $madonhang, $content);
        $this->sendSMS2($sdt, $content);
    }

    /*
     * imtoantran
     * Gửi sms thông báo đơn hàng mới tới chủ spa
     */

    public function spaNewOrder($sdt, $ten, $madonhang = '') {
        if ($this->template['spaNewOrder']['status'] == '0')
            return;
        $content = str_replace("{{TEN}}", $ten, $this->template['spaNewOrder']['content']);
        $content = str_replace("{{MDH}}", $madonhang, $content);
        $this->sendSMS2($sdt, $content);
    }

    /**
     * imtoantran@gmail.com
     * Xác thực 
     */
    public function clientOrderConfirmed($sdt, $ten, $madonhang = '') {
        if ($this->template['clientOrderConfirmed']['status'] == '0')
            return;
        $content = str_replace("{{TEN}}", $ten, $this->template['clientOrderConfirmed']['content']);
        $content = str_replace("{{MDH}}", $madonhang, $content);
        $this->sendSMS2($sdt, $content);
    }

    /**
     * imtoantran@gmail.com
     * Hủy lịch
     */
    public function spaOrderCanceled($sdt, $ten, $madonhang = '') {
        if ($this->template['spaOrderCanceled']['status'] == '0')
            return;
        $content = str_replace("{{TEN}}", $ten, $this->template['spaOrderCanceled']['content']);
        $content = str_replace("{{MDH}}", $madonhang, $content);
        $this->sendSMS2($sdt, $content);
    }

    /**
     * imtoantran@gmail.com
     * chấp nhận đổi lịch
     */
    public function spaCalendarAccepted($sdt, $ten, $madonhang = '') {
        if ($this->template['spaCalendarAccepted']['status'] == '0')
            return;
        $content = str_replace("{{TEN}}", $ten, $this->template['spaCalendarAccepted']['content']);
        $content = str_replace("{{MDH}}", $madonhang, $content);
        $this->sendSMS2($sdt, $content);
    }

    /**
     * imtoantran@gmail.com
     * không chấp nhận đổi lịch
     */
    public function spaCalendarDenied($sdt, $ten, $madonhang = '') {
        if ($this->template['spaCalendarDenied']['status'] == '0')
            return;
        $content = str_replace("{{TEN}}", $ten, $this->template['spaCalendarDenied']['content']);
        $content = str_replace("{{MDH}}", $madonhang, $content);
        $this->sendSMS2($sdt, $content);
    }

    public function promotion() {
        if ($this->template['promotion']['status'] == '0')
            return;
    }

    private function sendSMS2($phoneNumber, $content) {
        # code...
        if ($this->option['sms'] == '0') {
            return;
        }
        $loginName = $this->option['login'];
        $passWord = md5($this->option['pass']);
        $brandName = $this->option['brandName'];

        $sign = md5($loginName . '-' . $passWord . '-' . $brandName . '-' . '1');

        $objContent = Array(
            'PhoneNumber' => $phoneNumber,
            'Message' => $content,
            'SmsGuid' => '11111ss',
            'ContentType' => '1'
        );
        $strContent = json_encode($objContent);

        $client = simplexml_load_file($this->url . 'SendSms2?loginName=' . $loginName . '&brandName=' . $brandName . '&serviceTypeId=1&content=' . $strContent . '&Sign=' . $sign);
    }

}

?>