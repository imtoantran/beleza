<?php

/**
 * @author imtoantran
 * Thông báo đổi lịch tới khách hàng
 * @params 
 * params: array($key=>$value);
 * $key: "TEN": Tên; "MDH": Mã đơn hàng; "MDV": Mã dịch vụ
 * 
 */
class email_template {

    function __construct() {
        $this->db = new Database();
        // load templates
        $templates = $this->db->select("select * from email_templates");
        foreach ($templates as $key => $value) {
            $this->template[$value['slug']]['content'] = $value['content'];
            $this->template[$value['slug']]['subject'] = $value['subject'];
        }
    }

    /**
     * @description Thông báo đổi lịch tới khách hàng
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */
    public function clientAppointmentChanged($to, $params) {
        $content = $this->prepare($this->template['clientAppointmentChanged']['content'], $params);
        $subject = $this->prepare($this->template['clientAppointmentChanged']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    /*
     * @description Gửi thông báo đặt hàng thành công cho khách hàng
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */

    public function clientOrderSuccess($to, $params, $template = '') {
        $content = $this->prepare($this->template['clientOrderSuccess']['content'], $params);
        $subject = $this->prepare($this->template['clientOrderSuccess']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }



    public function clientEvoucherSuccess($to, $params, $template = '') {
        $content = $this->prepare($this->template['clientOrderSuccess']['content'], $params);
        $subject = $this->prepare($this->template['clientOrderSuccess']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    /*
     * @description Thông báo đơn hàng mới tới chủ spa
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */

    public function spaNewOrder($to, $params, $template = 'spaNewAppoitment') {
        $content = $this->prepare($this->template[$template]['content'], $params);
        $subject = $this->prepare($this->template[$template]['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    /*
     * @description gửi mail
     * @author imtoantran@gmail.com
     * @param $params: array($key=>$value);
     * @param $key "TEN": Tên;
     * @param $key "MDH": Mã đơn hàng; 
     * @param $key "MDV": Mã dịch vụ;
     * @param $template 'spaNewAppoitment'...
     */

    public function send($to, $params, $template = '') {
        if ($template != '') {
            $content = $this->prepare($this->template[$template]['content'], $params);
            $subject = $this->prepare($this->template[$template]['subject'], $params);
            return $this->sendMail($to, $subject, $content);
        }
        return 0;
    }

    /*
     * @description Thông báo đơn hàng mới tới chủ spa
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */

    public function spaNewBooking($to, $params) {
        $content = $this->prepare($this->template['spaNewOrder']['content'], $params);
        $subject = $this->prepare($this->template['spaNewOrder']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    /**
     * imtoantran@gmail.com
     * @description Spa xác thực 
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */
    public function clientAppointmentConfirmed($to, $params) {
        $content = $this->prepare($this->template['clientAppointmentConfirmed']['content'], $params);
        $subject = $this->prepare($this->template['clientAppointmentConfirmed']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    /**
     * imtoantran@gmail.com
     * @description Khách hàng hủy lịch
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */
    public function spaOrderCanceled($to, $params) {
        $content = $this->prepare($this->template['spaOrderCanceled']['content'], $params);
        $subject = $this->prepare($this->template['spaOrderCanceled']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    /**
     * imtoantran@gmail.com
     * @description Khách hàng chấp nhận đổi lịch
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */
    public function spaCalendarAccepted($to, $params) {
        $content = $this->prepare($this->template['spaCalendarAccepted']['content'], $params);
        $subject = $this->prepare($this->template['spaCalendarAccepted']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    /**
     * imtoantran@gmail.com
     * @description Khách hàng không chấp nhận đổi lịch
     * @author imtoantran@gmail.com
     * @usage: Cách dùng
     * @$params: array($key=>$value);
     * @$key "TEN": Tên;
     * @$key "MDH": Mã đơn hàng; 
     * @$key "MDV": Mã dịch vụ;
     */
    public function spaCalendarDenied($to, $params) {
        $subject = $this->prepare($this->template['spaCalendarDenied']['content'], $params);
        $subject = $this->prepare($this->template['spaCalendarDenied']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    public function promotion() {
        $content = $this->prepare($this->template['promotion']['content'], $params);
        $subject = $this->prepare($this->template['promotion']['subject'], $params);
        return $this->sendMail($to, $subject, $content);
    }

    private function prepare($content, $params) {
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $param = str_replace(" ", "", $key);
                if ($param != '')
                    $content = str_replace("{{" . $param . "}}", $value, $content);
            }
        }
        $content = preg_replace("/{{(.)*}}/", "", $content);
        return $content;
    }

    private function sendMail($to, $subject, $content) {
        $mail = new PHPMailer(TRUE);
        $mail->CharSet = "UTF-8";
        // create a new object
        $mail->IsSMTP();
        // enable SMTP
        $mail->SMTPDebug = 1;
        // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;
        // authentication enabled
        $mail->SMTPSecure = 'ssl';
        // secure transfer enabled REQUIRED for GMail
        $mail->Host = SMTP_MAIL;
        $mail->Port = 465;
        // or 587
        $mail->IsHTML(true);
        $mail->Username = INFO_MAIL;
        $mail->Password = PASS_MAIL;
        $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AddAddress($to);
        return $mail->Send();
    }

}
