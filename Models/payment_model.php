<?php

class payment_model extends Model {

    function __construct() {
        parent::__construct();
    }
    public function formatDate($date, $strFormat){
        $newDate= date_create($date);
        return date_format($newDate, $strFormat);
    }
    public function getTimeAutoConfirmSpa($user_id){
        $sql =<<<SQL
        SELECT user_limit_auto_confirm
        FROM user
        WHERE user_id = {$user_id}
SQL;
         $select = $this->db->select($sql);
         $minuteSpa = $select[0]['user_limit_auto_confirm'];
         // add time limit spa = (Time Book service + time spa)
         $now = date('Y-m-d H:i:s');
         $date_time = strtotime($now)+($minuteSpa*60);
         return date("Y-m-d H:i:s", $date_time);
    }
    public function arrayUnique(){
        $arrIdSpa = array();
        if (!empty($_SESSION['booking_detail'])){
            foreach ($_SESSION['booking_detail'] as $key => $value) {
                array_push($arrIdSpa, $value['user_id']);
            }
        }
        if (!empty($_SESSION['eVoucher_detail'])){
            foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
                array_push($arrIdSpa, $value['user_id']);
            }
        }
        return array_unique($arrIdSpa);
    }

    public function getEmailSpa($idSpa){
        $sql =<<<SQL
            SELECT user_notification_email
            FROM user
            WHERE user_id = {$idSpa}
SQL;
        $select = $this->db->select($sql);
        return $select[0]['user_notification_email'];
    }

    public function getNameSpa($idSpa){
        $sql =<<<SQL
        SELECT user_business_name
        FROM user
        WHERE user_id = {$idSpa}
SQL;
        $select = $this->db->select($sql);
        return $select[0]['user_business_name'];
    }

    public function processPayment($total_money, $booking_id) {
        Session::initIdle();
        $client_id = $_SESSION['client_id'];
        $status = 0;
        $gift_point = 0;
        $booking_content = '';
        $appointment_content = '';
        $gift_voucher_content ='';
        $evoucher_content = '';
        $listEvocher = "";
        $numEvocher = "";
        $total_money_vnd = $total_money;
        // begin insert database
        try {
            $this->db->beginTransaction();
            $sql = <<<SQL
                INSERT INTO booking
                VALUES(
                '{$booking_id}'
                , CURRENT_DATE()
                , {$total_money}
                , {$client_id}
                )
SQL;

            $arr_evoucher_tmp = null;

            $insert_1 = $this->db->prepare($sql);
            $insert_1->execute();
            //--------------------------------------------------------------
            $booking_content = $booking_id;
            if ($insert_1->rowCount() > 0) {
                // insert booking detail
                if (isset($_SESSION['booking_detail'])) {
                    foreach ($_SESSION['booking_detail'] as $key => $value) {
                        //(Now+time SPA)                       
                        $time_auto_confirm_spa = $this->getTimeAutoConfirmSpa($value['user_id']);
                        $query = <<<SQL
                        INSERT INTO booking_detail(
                            `booking_detail_price`
                            ,`booking_detail_quantity`
                            ,`booking_detail_date`
                            ,`booking_detail_time_start`
                            ,`booking_detail_time_end`
                            ,`booking_detail_user_id`
                            ,`booking_detail_user_service_id`
                            ,`booking_detail_booking_id`
                            ,`booking_detail_status`
                            ,`booking_detail_created`
                            ,`booking_detail_time_confirm`
                       
                        )
                        VALUES(
                        '{$value['choosen_price']}'
                        , '{$value['booking_quantity']}'
                        , '{$value['booking_detail_date']}'
                        , '{$value['booking_detail_time']}'
                        , '{$value['booking_detail_time']}'
                        , '{$value['user_id']}'
                        , '{$value['user_service_id']}'
                        , '{$booking_id}'
                        , {$status}
                        , NOW()
                        , '{$time_auto_confirm_spa}'
                        
                        )
SQL;
                        $insert_2 = $this->db->prepare($query);
                        $insert_2->execute();
                        //--------------------------------------------------------------
            
                        $appointment_content .=
                            '<div style="margin:0; padding: 5px 10px; border-bottom: 1px solid #ddd;">
                                <span><b>Địa điểm:</b> ' . $value['user_business_name']. ' </span><br>
                                <span><b>Thời gian:</b> '.$value['booking_detail_time'].' '.$this->formatDate($value['booking_detail_date'], "d/m/Y"). ' </span><br>
                                <span><b>Dịch vụ:</b> '. $value['user_service_name']. ' </span><br>
                                <span><b>Số lượng:</b> '. $value['booking_quantity']. ' </span><br>
                                <span><b>Giá:</b> '. number_format($value['choosen_price'],"0",",","."). ' VNĐ </span><br>
                                </div>';
                        $gift_point = $gift_point + $value['booking_quantity'];
                    }
                }

// E voucher              
                if (isset($_SESSION['eVoucher_detail'])) {
                    $arr_evoucher_tmp = $_SESSION['eVoucher_detail'];
                    foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
                        $numEvocher = $value['booking_quantity'];
                        for ($i = 0; $i < $value['booking_quantity']; $i++) {
                            $e_voucher_id = $this->createEVoucherId();
                            $listEvocher .= '&#9679; '.$e_voucher_id.'  ';
                            $arr_evoucher_tmp[$key]['e_voucher_id'] = $e_voucher_id;
                            $user_evoucher = array();
                            $query = <<<SQL
                                INSERT INTO e_voucher(
                                `e_voucher_id`
                                ,`e_voucher_due_date`
                                ,`e_voucher_price`
                                ,`e_voucher_user_service_id`
                                ,`e_voucher_booking_id`
                                ,`e_voucher_user_id`
                                ,`e_voucher_status`
                                )
                                VALUES(
                                '{$e_voucher_id}'
                                ,'{$value['eVoucher_due_date']}'
                                , '{$value['choosen_price']}'
                                , '{$value['user_service_id']}'
                                , '{$booking_id}'
                                , '{$value['user_id']}'
                                , {$status}
                                )
SQL;
                            $insert_3 = $this->db->prepare($query);
                            $insert_3->execute();
                            //---------------------------------------------------------

                            $evoucher_content .= '<div style="margin:0; padding: 5px 10px; border-bottom: 1px solid #ddd;">
                                                    <span><b>Địa điểm: </b> '. $value['user_business_name'] . ' </span><br>
                                                    <span><b>Dịch vụ:</b> ' . $value['user_service_name'] . ' </span><br>
                                                    <span><b>Giá:</b> ' .  number_format($value['choosen_price'],"0",",",".") . ' VNĐ</span><br>
                                                    <span><b>Ngày hết hạn:</b> ' . $this->formatDate($value['eVoucher_due_date'], "d/m/Y") . ' </span><br>
                                                    <span><b>E-voucher code:</b> ' . $e_voucher_id . ' </span><br>
                                                    </div>';

                        }
   
                        $gift_point = $gift_point + $value['booking_quantity'];
                    }
                }
				// gift voucher
				if(isset($_SESSION['gift_detail'])){
					$bytes = openssl_random_pseudo_bytes(4);
					$hex = bin2hex($bytes);
					$gift_voucher_code = 'G-' . $hex;
					for ($i = 0; ; $i++) {
						$check_gift_voucher_code = $this -> checkExistGiftVoucher($gift_voucher_code);
						if ($check_gift_voucher_code == 0) {
							break;
						} else {
							$bytes = openssl_random_pseudo_bytes(4);
							$hex = bin2hex($bytes);
							$gift_voucher_code = 'G-' . $hex;
						}
					}
					$date = explode('/', $_SESSION['gift_detail'][0]['gift_voucher_date']);
					$date = $date[2] . '-' . $date[1] . '-' . $date[0];
					$sql = <<<SQL
                            INSERT INTO gift_voucher(
                                gift_voucher_code
                                , gift_voucher_due_date
                                , gift_voucher_message
                                , gift_voucher_price
                                , gift_voucher_name
                                , gift_voucher_email
                                , gift_voucher_type
                                , gift_voucher_date
                                , gift_voucher_client_id
                                , gift_voucher_address
                                , gift_voucher_phone
                                )
                                VALUES(
                                '{$gift_voucher_code}'
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_due_date']}'
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_mess']}'
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_price']}'
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_sender']}'
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_email']}'
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_type']}'
                                , '{$date}'
                                , {$_SESSION['client_id']}
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_address']}'
                                , '{$_SESSION['gift_detail'][0]['gift_voucher_phone']}'
                            )
SQL;
					$insert = $this -> db -> prepare($sql);
					$insert -> execute();

                    $gift_voucher_content .= '<div style="margin:0; padding: 5px 10px; border-bottom: 1px solid #ddd;">
                                                <span><b>Người nhận: </b> '. $_SESSION['gift_detail'][0]['gift_voucher_sender'] . ' </span><br>
                                                <span><b>Email người nhận:</b> ' . $_SESSION['gift_detail'][0]['gift_voucher_email'] . ' </span><br>
                                                <span><b>E-voucher code:</b> ' . $gift_voucher_code . ' </span><br>
                                                <span><b>Trị giá:</b> ' . number_format($_SESSION['gift_detail'][0]['gift_voucher_price'],"0",",",".") . 'VNĐ </span><br>
                                                <span><b>Ngày hết hạn:</b> ' .$this->formatDate($_SESSION['gift_detail'][0]['gift_voucher_due_date'], "d/m/Y"). ' </span><br>
                                                <span><b>Lời nhắn:</b> ' .$_SESSION['gift_detail'][0]['gift_voucher_mess']. ' </span>
                                            </div>';
				}
				if(isset($_SESSION['has_credit_point'])){
					if($_SESSION['has_credit_point'] == 1){
						$total_money_minus = $total_money - ($_SESSION['client_creditpoint']*MONEY_PER_POINT);
						$total_point_minus = $total_money_minus/MONEY_PER_POINT;
						$sql = <<<SQL
							UPDATE client
							SET client_creditpoint = {$total_point_minus}
							WHERE client_id = {$_SESSION['client_id']}
SQL;
						$update_point = $this->db->prepare($sql);
						$update_point->execute();
                        $_SESSION['client_creditpoint'] = $total_point_minus;
					}else if($_SESSION['has_credit_point'] == 2){
						$total_money_minus = ($_SESSION['client_creditpoint']*MONEY_PER_POINT) - $total_money;
						$total_point_minus = $total_money_minus/MONEY_PER_POINT;
						$sql = <<<SQL
							UPDATE client
							SET client_creditpoint = {$total_point_minus}
							WHERE client_id = {$_SESSION['client_id']}
SQL;
						$update_point = $this->db->prepare($sql);
						$update_point->execute();
                        $_SESSION['client_creditpoint'] = $total_point_minus;
					}
                }
            } else {
                return 0;
                exit;
            }


            $gift_point = $gift_point + $_SESSION['client_giftpoint'];
            $sql = <<<SQL
                UPDATE client
                SET client_giftpoint = {$gift_point}
                WHERE client_id = {$_SESSION['client_id']}
SQL;
            $update_point = $this->db->prepare($sql);
            $update_point->execute();
            $_SESSION['client_giftpoint'] = $gift_point;
            $this->db->commit();

            // send email Client ----------------------------------------------------

            //luuhoabk
            $to = $_SESSION['client_email'];
            $sdt = $_SESSION['client_phone'];
            try{
                $email = new email_template();
                $sms = new sms();
            }catch (Exception $e){}
            $content_payment = '';
            if(!empty($_SESSION['booking_detail'])){
                $content_payment .= '<div style="font-size: 14px; font-weight: 600; margin-bottom: 5px;">
                                        &bull; <span>Chi tiết lịch hẹn (Booking):</span>
                                        </div>
                                     <div style="border: 1px solid #ddd;">'.$appointment_content .'</div>
                                     <br>';
            }
            if(!empty($_SESSION['eVoucher_detail'])){
                $content_payment .= '<div style="font-size: 14px; font-weight: 600; margin-bottom: 5px;">
                                        &bull; <span>Chi tiết EVoucher</span>
                                    </div>
                                    <div style="border: 1px solid #ddd;">'.$evoucher_content .'</div>
                                    <br>';
            }
            if(!empty($_SESSION['gift_detail'])){
                $content_payment .= '<div style="font-size: 14px; font-weight: 600; margin-bottom: 5px;">
                                        &bull; <span>Chi tiết Gift Voucher:</span>
                                        </div>
                                        <div style="border: 1px solid #ddd;">'.$gift_voucher_content .'</div>
                                    <br>';
            }

            $params_email = [
                "CLIENT_NAME" => $_SESSION['client_name'],
                "BOOKING_CODE" => $booking_id,
                "PAYMENT_CONTENT" => $content_payment ,
                "MONEY_TOTAL" => number_format($total_money,"0",",","."),
            ];
            try{
                $email->send($to, $params_email, 'clientPayment');
            }catch (Exception $e){}


            if(!empty($_SESSION['gift_detail'])){
                // email cho nguoi nhan
                $params_email_receiver = [
                    "SENDER_NAME" => $_SESSION['client_name'],
                    "SENDER_EMAIL" => $to,
                    "RECEIVER_NAME" => $_SESSION['gift_detail'][0]['gift_voucher_sender'] ,
                    "RECEIVER_EMAIL" => $_SESSION['gift_detail'][0]['gift_voucher_email'] ,
                    "GIFT_CODE" => $gift_voucher_code ,
                    "PRICE" => number_format($_SESSION['gift_detail'][0]['gift_voucher_price'],"0",",","."),
                    "DUE_DATE" =>  $this->formatDate($_SESSION['gift_detail'][0]['gift_voucher_due_date'], "d/m/Y"),
                    "MESSAGE" => $_SESSION['gift_detail'][0]['gift_voucher_mess'],
                ];

                try {
                    $email->send($_SESSION['gift_detail'][0]['gift_voucher_email'], $params_email_receiver, 'clientReceiverGiftVoucher');
                }catch (Exception $e){
}

            }
            // End send email Client ----------------------------------------------------

            // send email Spa ---------------------------------------------------------------------------------------------------------
            if(!empty($_SESSION['booking_detail']) || !empty($_SESSION['eVoucher_detail'])){
                $arrayUnique = $this->arrayUnique();

                foreach($arrayUnique as $key1=>$idSpa){ // duyet qua mang spa de gui thong tin
                    $content_email_spa = "";
                    $total_money_spa = 0;
                    if(!empty($_SESSION['booking_detail'])){
                        $booking_item ='';
                        foreach($_SESSION['booking_detail'] as $key2=>$val2){
                            if($val2['user_id'] == $idSpa){
                                $booking_item .=
                                    '<div style="margin:0; padding: 5px 10px; border-bottom: 1px solid #ddd;">
                                        <span><b>Địa điểm:</b> ' . $val2['user_business_name']. ' </span><br>
                                        <span><b>Thời gian:</b> '.$val2['booking_detail_time'].' '.$this->formatDate($val2['booking_detail_date'], "d/m/Y"). ' </span><br>
                                        <span><b>Dịch vụ:</b> '. $val2['user_service_name']. ' </span><br>
                                        <span><b>Số lượng:</b> '. $val2['booking_quantity']. ' </span><br>
                                        <span><b>Giá:</b> '. number_format($val2['choosen_price'],"0",",","."). ' VNĐ </span><br>
                                    </div>';
                                $total_money_spa += $val2['booking_quantity']*$val2['choosen_price'];
                            }
                        }
                        $content_email_spa .=
                            '<div style="font-size: 14px; font-weight: 600; margin-bottom: 5px;">
                                &bull; <span>Chi tiết lịch hẹn (Booking):</span>
                                </div>
                             <div style="border: 1px solid #ddd;">'.$booking_item .'</div>
                             <br>';
                    }

                    if(!empty($arr_evoucher_tmp)){
                        $evoucher_item ='';
                        foreach($arr_evoucher_tmp as $key3=>$val3){
                            if($val3['user_id'] == $idSpa){
                                $evoucher_item .=
                                    '<div style="margin:0; padding: 5px 10px; border-bottom: 1px solid #ddd;">
                                        <span><b>Địa điểm: </b> '. $val3['user_business_name'] . ' </span><br>
                                        <span><b>Dịch vụ:</b> ' . $val3['user_service_name'] . ' </span><br>
                                        <span><b>Giá:</b> ' .  number_format($val3['choosen_price'],"0",",",".") . ' VNĐ</span><br>
                                        <span><b>Ngày hết hạn:</b> ' . $this->formatDate($val3['eVoucher_due_date'], "d/m/Y") . ' </span><br>
                                        <span><b>E-voucher code:</b> ' . $val3['e_voucher_id'] . ' </span><br>
                                    </div>';
                                $total_money_spa += $val3['choosen_price'];
                            }
                        }
                        $content_email_spa .=
                            '<div style="font-size: 14px; font-weight: 600; margin-bottom: 5px;">
                                &bull; <span>Chi tiết EVoucher</span>
                            </div>
                            <div style="border: 1px solid #ddd;">'.$evoucher_item .'</div>
                            <br>';
                    }
                    $params_email_spa = [
                        "SPA_NAME" => $this->getNameSpa($idSpa),
                        "CLIENT_NAME" => $_SESSION['client_name'],
                        "CLIENT_EMAIL" => $_SESSION['client_email'],
                        "CLIENT_PHONE" => $_SESSION['client_phone'],
                        "BOOKING_CODE" => $booking_id,
                        "PAYMENT_CONTENT" => $content_email_spa ,
                        "MONEY_TOTAL" => number_format($total_money_spa,"0",",","."),
                    ];
                    $email_spa = $this->getEmailSpa($idSpa);
                    // begin send enail
                    try{
                        $email->send($email_spa, $params_email_spa, 'spaPayment');
                    } catch(Exception $e){}
                }
            }
//             End send email Spa----------------------------------------------------------------

//             send SMS
            $params_sms = [
                "TEN" => $_SESSION['client_name'],
                "MABOOKING" => $booking_id,
                "TONGCONG" => number_format($total_money, "0", ",", "."),
            ];
            try {
                $sms->send($sdt, $params_sms, 'clientOrderSuccess');
            } catch(Exception $e){}
            unset($_SESSION['booking_detail']);
            unset($_SESSION['eVoucher_detail']);
            unset($_SESSION['gift_detail']);

            return 1;    

        } catch (Exception $e) {
            $this->db->rollBack();
            return 0;
        }
    }

    public function createBookingId() {
        $bytes = openssl_random_pseudo_bytes(5);
        $hex = bin2hex($bytes);
        $booking_id = 'BK' . $hex;
        for ($i = 0;; $i++) {
            $check_booking_id = $this->checkExistBookingId($booking_id);
            if ($check_booking_id == 0) {
                break;
            } else {
                $bytes = openssl_random_pseudo_bytes(5);
                $hex = bin2hex($bytes);
                $booking_id = 'BK' . $hex;
            }
        }
        return $booking_id;
    }

    public function createEVoucherId() {
        $bytes = openssl_random_pseudo_bytes(4);
        $hex = bin2hex($bytes);
        // $hex = substr($hex, 0, 8);
        $e_voucher_id = 'E-' . $hex;
        for ($j = 0;; $j++) {
            $check_e_voucher_id = $this->checkExisteVoucherId($e_voucher_id);
            if ($check_e_voucher_id == 0) {
                break;
            } else {
                $bytes = openssl_random_pseudo_bytes(4);
                $hex = bin2hex($bytes);
                $e_voucher_id = 'E-' . $hex;
            }
        }
        return $e_voucher_id;
    }

    public function checkExistBookingId($booking_id) {
        $sql = <<<SQL
SELECT COUNT(*) AS check_booking_id
FROM booking
WHERE booking_id = '{$booking_id}'
SQL;
        $select = $this->db->select($sql);
        return $select[0]['check_booking_id'];
    }

    public function checkExisteVoucherId($e_voucher_id) {
        $sql = <<<SQL
SELECT COUNT(*) AS check_eVoucher_id
FROM e_voucher
WHERE e_voucher_id = '{$e_voucher_id}'
SQL;
        $select = $this->db->select($sql);
        return $select[0]['check_eVoucher_id'];
    }
	
	public function checkExistGiftVoucher($gift_voucher_code) {
		$sql = <<<SQL
SELECT COUNT(*) AS check_gift_voucher_code
FROM gift_voucher
WHERE gift_voucher_code = '{$gift_voucher_code}'
SQL;
		$select = $this -> db -> select($sql);
		return $select[0]['check_gift_voucher_code'];
	}
}

//
//
//    public function processCreditPointPayment() {
//        /*
//         * status = 0 pending
//         */
//        Session::initIdle();
//        $status = 0;
//        $gift_point = 0;
//        $client_id = $_SESSION['client_id'];
//        $total_money = 0;
//        $booking_content = '';
//        $appointment_content = '';
//        $evoucher_content = '';
//        if (isset($_SESSION['booking_detail'])) {
//            foreach ($_SESSION['booking_detail'] as $key => $value) {
//                $total_money += $value['choosen_price'] * $value['booking_quantity'];
//            }
//        }
//        if (isset($_SESSION['eVoucher_detail'])) {
//            foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
//                $total_money += $value['choosen_price'] * $value['booking_quantity'];
//            }
//        }
//        $total_point = $total_money / MONEY_PER_POINT;
//        try {
//            $booking_id = $this->createBookingId();
//            // echo "<pre/>";
//            // print_r($_SESSION['eVoucher_detail']);exit;
//            $this->db->beginTransaction();
//            $sql = <<<SQL
//INSERT INTO booking
//VALUES(
//'{$booking_id}'
//, CURRENT_DATE()
//, {$total_money}
//, {$client_id}
//)
//SQL;
//            $insert_1 = $this->db->prepare($sql);
//            $insert_1->execute();
//            $booking_content = $booking_id;
//            if ($insert_1->rowCount() > 0) {
//                // insert booking detail
//                if (isset($_SESSION['booking_detail'])) {
//                    foreach ($_SESSION['booking_detail'] as $key => $value) {
//                        $query = <<<SQL
//INSERT INTO booking_detail(
//`booking_detail_price`
//,`booking_detail_quantity`
//,`booking_detail_date`
//,`booking_detail_time_start`
//,`booking_detail_time_end`
//,`booking_detail_user_id`
//,`booking_detail_user_service_id`
//,`booking_detail_booking_id`
//,`booking_detail_status`
//,`booking_detail_created`
//)
//VALUES(
//'{$value['choosen_price']}'
//, '{$value['booking_quantity']}'
//, '{$value['booking_detail_date']}'
//, '{$value['booking_detail_time']}'
//, '{$value['booking_detail_time']}'
//, '{$value['user_id']}'
//, '{$value['user_service_id']}'
//, '{$booking_id}'
//, {$status}
//, NOW()
//)
//SQL;
//                        $insert_2 = $this->db->prepare($query);
//                        $insert_2->execute();
//                        $appointment_content .= '<p><span><b>Địa điểm:</b> '
//                                . $value['user_business_name']
//                                . ' </span><span><b>Ngày:</b> '
//                                . $value['booking_detail_date']
//                                . ' </span><span><b>Giờ:</b> '
//                                . $value['booking_detail_time']
//                                . ' </span><span><b>Số lượng:</b> '
//                                . $value['booking_quantity']
//                                . ' </span><span><b>Dịch vụ:</b> '
//                                . $value['user_service_name']
//                                . ' </span></p><hr/>';
//
//                        //email body
//                        $body = '<h1>BELEZA Thông báo</h1>';
//                        $body .= '<p>Có khách hàng đã đặt hẹn ở địa điểm của bạn trên BELEZA</p>';
//                        $body .= '<p>Mã booking là: ' . $booking_content . '</p>';
//                        $body .= '<p>Chi tiết cuộc hẹn</p>';
//                        $body .= '<hr/>';
//                        $body .= '<p><span><b>Địa điểm:</b> ';
//                        $body .= $value['user_business_name'];
//                        $body .= ' </span><span><b>Ngày:</b> ';
//                        $body .= $value['booking_detail_date'];
//                        $body .= ' </span><span><b>Giờ:</b> ';
//                        $body .= $value['booking_detail_time'];
//                        $body .= ' </span><span><b>Số lượng:</b> ';
//                        $body .= $value['booking_quantity'];
//                        $body .= ' </span><span><b>Dịch vụ:</b> ';
//                        $body .= $value['user_service_name'];
//                        $body .= ' </span></p><hr/>';
//                        $body .= '<p>Chúc bạn ngày mới tốt lành</p>';
//                        $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';
//
//                        //Gửi mail local
//                        $mail = new PHPMailer(TRUE);
//                        $mail->CharSet = "UTF-8";
//                        // create a new object
//                        $mail->IsSMTP();
//                        // enable SMTP
//                        $mail->SMTPDebug = 1;
//                        // debugging: 1 = errors and messages, 2 = messages only
//                        $mail->SMTPAuth = true;
//                        // authentication enabled
//                        $mail->SMTPSecure = 'ssl';
//                        // secure transfer enabled REQUIRED for GMail
//                        $mail->Host = SMTP_MAIL;
//                        $mail->Port = 465;
//                        // or 587
//                        $mail->IsHTML(true);
//                        $mail->Username = INFO_MAIL;
//                        $mail->Password = PASS_MAIL;
//                        $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
//                        $mail->Subject = "Thông tin khách hàng đặt hẹn từ Beleza!";
//                        $mail->Body = $body;
//                        $mail->AddAddress($value['user_email']);
//                        $mail->Send();
//                        /**
//                         * @IMTOANTRAN
//                         * Khách hàng đặt lịch hẹn
//                         */
//                        $to = $value['user_email'];
//                        $params = [
//                            "MABOOKING" => $booking_content,
//                            "DIADIEM" => $value['user_business_name'],
//                            "NGAY" => $value['booking_detail_date'],
//                            "GIO" => $value['booking_detail_time'],
//                            "SOLUONG" => $value['booking_quantity'],
//                            "TENDICHVU" => $value['user_service_name'],
//                        ];
//                        $email = new email_template();
//                        $email->send($to, $params, 'spaNewAppointment');
//                        /*                         * ************************ */
//                        $gift_point = $gift_point + $value['booking_quantity'];
//                    }
//                }
//                if (isset($_SESSION['eVoucher_detail'])) {
//                    foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
//                        $evoucher_content_1 = '';
//                        for ($i = 0; $i < $value['booking_quantity']; $i++) {
//                            $bytes = openssl_random_pseudo_bytes(8);
//                            $hex = bin2hex($bytes);
//                            $e_voucher_id = 'E-' . $hex;
//                            for ($j = 0;; $j++) {
//                                $check_e_voucher_id = $this->checkExisteVoucherId($e_voucher_id);
//                                if ($check_e_voucher_id == 0) {
//                                    break;
//                                } else {
//                                    $bytes = openssl_random_pseudo_bytes(8);
//                                    $hex = bin2hex($bytes);
//                                    $e_voucher_id = 'E-' . $hex;
//                                }
//                            }
//                            $query = <<<SQL
//INSERT INTO e_voucher(
//`e_voucher_id`
//,`e_voucher_due_date`
//,`e_voucher_price`
//,`e_voucher_user_service_id`
//,`e_voucher_booking_id`
//,`e_voucher_user_id`
//,`e_voucher_status`
//)
//VALUES(
//'{$e_voucher_id}'
//,'{$value['eVoucher_due_date']}'
//, '{$value['choosen_price']}'
//, '{$value['user_service_id']}'
//, '{$booking_id}'
//, '{$value['user_id']}'
//, {$status}
//)
//SQL;
//                            $insert_3 = $this->db->prepare($query);
//                            $insert_3->execute();
//                            $evoucher_content .= '<p><span><b>Địa điểm:</b> '
//                                    . $value['user_business_name'] . ' </span><span><b>Ngày hết hạn:</b> '
//                                    . $value['eVoucher_due_date']
//                                    . ' </span><span><b>E-voucher code:</b> '
//                                    . $e_voucher_id
//                                    . ' </span><span><b>Dịch vụ:</b> '
//                                    . $value['user_service_name']
//                                    . ' </span></p><hr/>';
//                            $evoucher_content_1 .= '<p><span><b>Địa điểm:</b> '
//                                    . $value['user_business_name']
//                                    . ' </span><span><b>Ngày hết hạn:</b> '
//                                    . $value['eVoucher_due_date']
//                                    . ' </span><span><b>E-voucher code:</b> '
//                                    . $e_voucher_id
//                                    . ' </span><span><b>Dịch vụ:</b> '
//                                    . $value['user_service_name']
//                                    . ' </span></p><hr/>';
//                        }
//                        //email body
//                        $body = '<h1>BELEZA Thông báo</h1>';
//                        $body .= '<p>Có khách hàng đã đặt hẹn ở địa điểm của bạn trên BELEZA</p>';
//                        $body .= '<p>Mã booking là: ' . $booking_content . '</p>';
//                        $body .= '<p>Chi tiết E voucher</p>';
//                        $body .= '<hr/>';
//                        $body .= $evoucher_content_1;
//                        $body .= '<p>Chúc bạn ngày mới tốt lành</p>';
//                        $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';
//
//                        //Gửi mail local
//                        $mail = new PHPMailer(TRUE);
//                        $mail->CharSet = "UTF-8";
//                        // create a new object
//                        $mail->IsSMTP();
//                        // enable SMTP
//                        $mail->SMTPDebug = 1;
//                        // debugging: 1 = errors and messages, 2 = messages only
//                        $mail->SMTPAuth = true;
//                        // authentication enabled
//                        $mail->SMTPSecure = 'ssl';
//                        // secure transfer enabled REQUIRED for GMail
//                        $mail->Host = SMTP_MAIL;
//                        $mail->Port = 465;
//                        // or 587
//                        $mail->IsHTML(true);
//                        $mail->Username = INFO_MAIL;
//                        $mail->Password = PASS_MAIL;
//                        $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
//                        $mail->Subject = "Thông tin khách hàng mua e-voucher từ Beleza!";
//                        $mail->Body = $body;
//                        $mail->AddAddress($value['user_email']);
//                        $mail->Send();
//                        /**
//                         * @IMTOANTRAN
//                         * Email khách hàng đặt mua Evoucher
//                         */
//                        $to = $value['user_email'];
//                        $params = [
//                            "MABOOKING" => $booking_content,
//                            "DIADIEM" => $value['user_business_name'],
//                            "NGAY" => $value['booking_detail_date'],
//                            "GIO" => $value['booking_detail_time'],
//                            "SOLUONG" => $value['booking_quantity'],
//                            "TENDICHVU" => $value['user_service_name'],
//                            "NGAYHETHAN" => $value['eVoucher_due_date'],
//                            "VOUCHERID" => $e_voucher_id,
//                        ];
//                        $email = new email_template();
//                        $email->send($to, $params, 'spaNewEvoucher');
//                        /*                         * ************************* */
//                        $gift_point = $gift_point + $value['booking_quantity'];
//                    }
//                }
//            } else {
//                echo 0;
//                exit;
//            }
//            $gift_point = ($gift_point + $_SESSION['client_giftpoint']);
//            $sql = <<<SQL
//                UPDATE client
//                SET client_giftpoint = {$gift_point}
//                WHERE client_id = {$_SESSION['client_id']}
//SQL;
//            $update_point = $this->db->prepare($sql);
//            $update_point->execute();
//            $credit_point = ($_SESSION['client_creditpoint'] - $total_point);
//            $sql = <<<SQL
//                UPDATE client
//                SET client_creditpoint = {$credit_point}
//                WHERE client_id = {$_SESSION['client_id']}
//SQL;
//            $update_point = $this->db->prepare($sql);
//            $update_point->execute();
//            $_SESSION['client_creditpoint'] = $credit_point;
//            $_SESSION['client_giftpoint'] = $gift_point;
//            $this->db->commit();
//            $body = '<h1>BELEZA Xác Nhận</h1>';
//            $body .= '<p>Bạn đã đặt hẹn trên BELEZA</p>';
//            $body .= '<p>Mã booking của bạn là: ' . $booking_content . '</p>';
//            $client_order_detail ='';
//            if ($appointment_content != '') {
//                $body .= '<p>Chi tiết cuộc hẹn</p>';
//                $body .= '<hr/>';
//                $body .= $appointment_content;
//                $client_order_detail = '<p>Chi tiết cuộc hẹn</p><hr/>' . $appointment_content;
//            }
//            if ($evoucher_content != '') {
//                $body .= '<p>Chi tiết E voucher</p>';
//                $body .= '<hr/>';
//                $body .= $evoucher_content;
//                $client_order_detail = '<p>Chi tiết E voucher</p><hr/>' . $evoucher_content;
//            }
//            $body .= '<div align="right"><h3><b>TỔNG CỘNG: </b> ' . $total_money . ' VNĐ</h3></div>';
//            $body .= '<p>Chúc bạn ngày mới tốt lành</p>';
//            $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';
//
//            //Gửi mail local
//            $mail = new PHPMailer(TRUE);
//            $mail->CharSet = "UTF-8";
//            // create a new object
//            $mail->IsSMTP();
//            // enable SMTP
//            $mail->SMTPDebug = 1;
//            // debugging: 1 = errors and messages, 2 = messages only
//            $mail->SMTPAuth = true;
//            // authentication enabled
//            $mail->SMTPSecure = 'ssl';
//            // secure transfer enabled REQUIRED for GMail
//            $mail->Host = SMTP_MAIL;
//            $mail->Port = 465;
//            // or 587
//            $mail->IsHTML(true);
//            $mail->Username = INFO_MAIL;
//            $mail->Password = PASS_MAIL;
//            $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
//            $mail->Subject = "Thông tin đặt hẹn từ Beleza!";
//            $mail->Body = $body;
//            $mail->AddAddress($_SESSION['client_email']);
//            /**
//             * @IMTOANTRAN
//             * Email khách hàng booking thành công
//             */
//            $to = $_SESSION['client_email'];
//            $params = [
//                "TEN" => 'xzxsxss',
//                "MABOOKING" => $booking_id,
//                "VOUCHERID" => $e_voucher_id,
//                "TONGCONG" => money_format($total_money,0),
//                "CHITIETDONHANG" => $client_order_detail,
//            ];
//            $email = new email_template();
//            /*             * ************************* */
//            if (!$email->send($to, $params,'clientOrderSuccess')) {
//                echo 0;
//            } else {
//                echo 200;
//                unset($_SESSION['booking_detail']);
//                unset($_SESSION['eVoucher_detail']);
//            }
//        } catch (Exception $e) {
//            $this->db->rollBack();
//            echo 0;
//        }
//    }
//
//    public function processGiftPointPayment() {
//        /*
//         * status = 0 pending
//         */
//        Session::initIdle();
//        $status = 0;
//        $gift_point = 0;
//        $client_id = $_SESSION['client_id'];
//        $total_money = 0;
//        $booking_content = '';
//        $appointment_content = '';
//        $evoucher_content = '';
//        if (isset($_SESSION['booking_detail'])) {
//            foreach ($_SESSION['booking_detail'] as $key => $value) {
//                $total_money += $value['choosen_price'] * $value['booking_quantity'];
//            }
//        }
//        if (isset($_SESSION['eVoucher_detail'])) {
//            foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
//                $total_money += $value['choosen_price'] * $value['booking_quantity'];
//            }
//        }
//        $total_point = $total_money / MONEY_PER_POINT;
//        try {
//            $booking_id = $this->createBookingId();
//            // echo "<pre/>";
//            // print_r($_SESSION['eVoucher_detail']);exit;
//            $this->db->beginTransaction();
//            $sql = <<<SQL
//INSERT INTO booking
//VALUES(
//'{$booking_id}'
//, CURRENT_DATE()
//, {$total_money}
//, {$client_id}
//)
//SQL;
//            $insert_1 = $this->db->prepare($sql);
//            $insert_1->execute();
//            $booking_content = $booking_id;
//            if ($insert_1->rowCount() > 0) {
//                // insert booking detail
//                if (isset($_SESSION['booking_detail'])) {
//                    foreach ($_SESSION['booking_detail'] as $key => $value) {
//                        $query = <<<SQL
//INSERT INTO booking_detail(
//`booking_detail_price`
//,`booking_detail_quantity`
//,`booking_detail_date`
//,`booking_detail_time_start`
//,`booking_detail_time_end`
//,`booking_detail_user_id`
//,`booking_detail_user_service_id`
//,`booking_detail_booking_id`
//,`booking_detail_status`
//,`booking_detail_created`
//)
//VALUES(
//'{$value['choosen_price']}'
//, '{$value['booking_quantity']}'
//, '{$value['booking_detail_date']}'
//, '{$value['booking_detail_time']}'
//, '{$value['booking_detail_time']}'
//, '{$value['user_id']}'
//, '{$value['user_service_id']}'
//, '{$booking_id}'
//, {$status}
//, NOW()
//)
//SQL;
//                        $insert_2 = $this->db->prepare($query);
//                        $insert_2->execute();
//                        $appointment_content .= '<p><span><b>Địa điểm:</b> '
//                                . $value['user_business_name']
//                                . ' </span><span><b>Ngày:</b> '
//                                . $value['booking_detail_date']
//                                . ' </span><span><b>Giờ:</b> '
//                                . $value['booking_detail_time']
//                                . ' </span><span><b>Số lượng:</b> '
//                                . $value['booking_quantity']
//                                . ' </span><span><b>Dịch vụ:</b> '
//                                . $value['user_service_name']
//                                . ' </span></p><hr/>';
//
//                        //email body
//                        $body = '<h1>BELEZA Thông báo</h1>';
//                        $body .= '<p>Có khách hàng đã đặt hẹn ở địa điểm của bạn trên BELEZA</p>';
//                        $body .= '<p>Mã booking là: ' . $booking_content . '</p>';
//                        $body .= '<p>Chi tiết cuộc hẹn</p>';
//                        $body .= '<hr/>';
//                        $body .= '<p><span><b>Địa điểm:</b> ';
//                        $body .= $value['user_business_name'];
//                        $body .= ' </span><span><b>Ngày:</b> ';
//                        $body .= $value['booking_detail_date'];
//                        $body .= ' </span><span><b>Giờ:</b> ';
//                        $body .= $value['booking_detail_time'];
//                        $body .= ' </span><span><b>Số lượng:</b> ';
//                        $body .= $value['booking_quantity'];
//                        $body .= ' </span><span><b>Dịch vụ:</b> ';
//                        $body .= $value['user_service_name'];
//                        $body .= ' </span></p><hr/>';
//                        $body .= '<p>Chúc bạn ngày mới tốt lành</p>';
//                        $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';
//
//                        //Gửi mail local
//                        $mail = new PHPMailer(TRUE);
//                        $mail->CharSet = "UTF-8";
//                        // create a new object
//                        $mail->IsSMTP();
//                        // enable SMTP
//                        $mail->SMTPDebug = 1;
//                        // debugging: 1 = errors and messages, 2 = messages only
//                        $mail->SMTPAuth = true;
//                        // authentication enabled
//                        $mail->SMTPSecure = 'ssl';
//                        // secure transfer enabled REQUIRED for GMail
//                        $mail->Host = SMTP_MAIL;
//                        $mail->Port = 465;
//                        // or 587
//                        $mail->IsHTML(true);
//                        $mail->Username = INFO_MAIL;
//                        $mail->Password = PASS_MAIL;
//                        $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
//                        $mail->Subject = "Thông tin khách hàng đặt hẹn từ Beleza!";
//                        $mail->Body = $body;
//                        $mail->AddAddress($value['user_email']);
//                        $mail->Send();
//                        /**
//                         * @IMTOANTRAN
//                         * Khách hàng đặt lịch hẹn
//                         */
//                        $to = $value['user_email'];
//                        $params = [
//                            "MABOOKING" => $booking_content,
//                            "DIADIEM" => $value['user_business_name'],
//                            "NGAY" => $value['booking_detail_date'],
//                            "GIO" => $value['booking_detail_time'],
//                            "SOLUONG" => $value['booking_quantity'],
//                            "TENDICHVU" => $value['user_service_name'],
//                        ];
//                        $email = new email_template();
//                        $email->send($to, $params, 'spaNewAppointment');
//                        /*                         * ************************* */
//                        $gift_point = $gift_point + $value['booking_quantity'];
//                    }
//                }
//                if (isset($_SESSION['eVoucher_detail'])) {
//                    foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
//                        $evoucher_content_1 = '';
//                        for ($i = 0; $i < $value['booking_quantity']; $i++) {
//                            $bytes = openssl_random_pseudo_bytes(8);
//                            $hex = bin2hex($bytes);
//                            $e_voucher_id = 'E-' . $hex;
//                            for ($j = 0;; $j++) {
//                                $check_e_voucher_id = $this->checkExisteVoucherId($e_voucher_id);
//                                if ($check_e_voucher_id == 0) {
//                                    break;
//                                } else {
//                                    $bytes = openssl_random_pseudo_bytes(8);
//                                    $hex = bin2hex($bytes);
//                                    $e_voucher_id = 'E-' . $hex;
//                                }
//                            }
//                            $query = <<<SQL
//INSERT INTO e_voucher(
//`e_voucher_id`
//,`e_voucher_due_date`
//,`e_voucher_price`
//,`e_voucher_user_service_id`
//,`e_voucher_booking_id`
//,`e_voucher_user_id`
//,`e_voucher_status`
//)
//VALUES(
//'{$e_voucher_id}'
//,'{$value['eVoucher_due_date']}'
//, '{$value['choosen_price']}'
//, '{$value['user_service_id']}'
//, '{$booking_id}'
//, '{$value['user_id']}'
//, {$status}
//)
//SQL;
//                            $insert_3 = $this->db->prepare($query);
//                            $insert_3->execute();
//                            $evoucher_content .= '<p><span><b>Địa điểm:</b> '
//                                    . $value['user_business_name']
//                                    . ' </span><span><b>Ngày hết hạn:</b> '
//                                    . $value['eVoucher_due_date']
//                                    . ' </span><span><b>E-voucher code:</b> '
//                                    . $e_voucher_id
//                                    . ' </span><span><b>Dịch vụ:</b> '
//                                    . $value['user_service_name']
//                                    . ' </span></p><hr/>';
//                            $evoucher_content_1 .= '<p><span><b>Địa điểm:</b> '
//                                    . $value['user_business_name']
//                                    . ' </span><span><b>Ngày hết hạn:</b> '
//                                    . $value['eVoucher_due_date']
//                                    . ' </span><span><b>E-voucher code:</b> '
//                                    . $e_voucher_id
//                                    . ' </span><span><b>Dịch vụ:</b> '
//                                    . $value['user_service_name']
//                                    . ' </span></p><hr/>';
//                        }
//                        //email body
//                        $body = '<h1>BELEZA Thông báo</h1>';
//                        $body .= '<p>Có khách hàng đã đặt hẹn ở địa điểm của bạn trên BELEZA</p>';
//                        $body .= '<p>Mã booking là: ' . $booking_content . '</p>';
//                        $body .= '<p>Chi tiết E voucher</p>';
//                        $body .= '<hr/>';
//                        $body .= $evoucher_content_1;
//                        $body .= '<p>Chúc bạn ngày mới tốt lành</p>';
//                        $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';
//
//                        //Gửi mail local
//                        $mail = new PHPMailer(TRUE);
//                        $mail->CharSet = "UTF-8";
//                        // create a new object
//                        $mail->IsSMTP();
//                        // enable SMTP
//                        $mail->SMTPDebug = 1;
//                        // debugging: 1 = errors and messages, 2 = messages only
//                        $mail->SMTPAuth = true;
//                        // authentication enabled
//                        $mail->SMTPSecure = 'ssl';
//                        // secure transfer enabled REQUIRED for GMail
//                        $mail->Host = SMTP_MAIL;
//                        $mail->Port = 465;
//                        // or 587
//                        $mail->IsHTML(true);
//                        $mail->Username = INFO_MAIL;
//                        $mail->Password = PASS_MAIL;
//                        $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
//                        $mail->Subject = "Thông tin khách hàng mua e-voucher từ Beleza!";
//                        $mail->Body = $body;
//                        $mail->AddAddress($value['user_email']);
//                        $mail->Send();
//                        /**
//                         * @IMTOANTRAN
//                         * Email khách hàng đặt mua Evoucher
//                         */
//                        $to = $value['user_email'];
//                        $params = [
//                            "MABOOKING" => $booking_content,
//                            "DIADIEM" => $value['user_business_name'],
//                            "NGAY" => $value['booking_detail_date'],
//                            "GIO" => $value['booking_detail_time'],
//                            "SOLUONG" => $value['booking_quantity'],
//                            "TENDICHVU" => $value['user_service_name'],
//                            "NGAYHETHAN" => $value['eVoucher_due_date'],
//                            "VOUCHERID" => $e_voucher_id,
//                        ];
//                        $email = new email_template();
//                        $email->send($to, $params, 'spaNewEvoucher');
//                        /*                         * ************************* */
//                        $gift_point = $gift_point + $value['booking_quantity'];
//                    }
//                }
//            } else {
//                echo 0;
//                exit;
//            }
//            $gift_point = ($gift_point + $_SESSION['client_giftpoint']) - $total_point;
//            $sql = <<<SQL
//UPDATE client
//SET client_giftpoint = {$gift_point}
//WHERE client_id = {$_SESSION['client_id']}
//SQL;
//            $update_point = $this->db->prepare($sql);
//            $update_point->execute();
//            $_SESSION['client_giftpoint'] = $gift_point;
//            $this->db->commit();
//            $body = '<h1>BELEZA Xác Nhận</h1>';
//            $body .= '<p>Bạn đã đặt hẹn trên BELEZA</p>';
//            $body .= '<p>Mã booking của bạn là: ' . $booking_content . '</p>';
//            $client_order_detail='';
//            if ($appointment_content != '') {
//                $body .= '<p>Chi tiết cuộc hẹn</p>';
//                $body .= '<hr/>';
//                $body .= $appointment_content;
//                $client_order_detail .= '<p>Chi tiết cuộc hẹn</p><hr/>' . $appointment_content;
//            }
//            if ($evoucher_content != '') {
//                $body .= '<p>Chi tiết E voucher</p>';
//                $body .= '<hr/>';
//                $body .= $evoucher_content;
//                $client_order_detail .= '<p>Chi tiết E voucher</p><hr/>' . $evoucher_content;
//            }
//            $body .= '<div align="right"><h3><b>TỔNG CỘNG: </b> ' . $total_money . ' VNĐ</h3></div>';
//            $body .= '<p>Chúc bạn ngày mới tốt lành</p>';
//            $body .= '<div align="right"><small><i><b>Ban quản trị BELEZA</b></i></small></div>';
//
//            //Gửi mail local
//            $mail = new PHPMailer(TRUE);
//            $mail->CharSet = "UTF-8";
//            // create a new object
//            $mail->IsSMTP();
//            // enable SMTP
//            $mail->SMTPDebug = 1;
//            // debugging: 1 = errors and messages, 2 = messages only
//            $mail->SMTPAuth = true;
//            // authentication enabled
//            $mail->SMTPSecure = 'ssl';
//            // secure transfer enabled REQUIRED for GMail
//            $mail->Host = SMTP_MAIL;
//            $mail->Port = 465;
//            // or 587
//            $mail->IsHTML(true);
//            $mail->Username = INFO_MAIL;
//            $mail->Password = PASS_MAIL;
//            $mail->SetFrom(INFO_MAIL, 'BELEZA VIETNAM');
//            $mail->Subject = "Thông tin đặt hẹn từ Beleza!";
//            $mail->Body = $body;
//            $mail->AddAddress($_SESSION['client_email']);
//            /**
//             * @IMTOANTRAN
//             * Email khách hàng booking thành công
//             */
//            $to = $_SESSION['client_email'];
//            $params = [
//                "MABOOKING" => $booking_content,
//                "VOUCHERID" => $e_voucher_id,
//                "TONGCONG" => $total_money_vnd,
//                "CHITIETDONHANG" => $client_order_detail,
//            ];
//            $email = new email_template();
//            /*             * ************************* */
//            if (!$email->clientOrderSuccess($to, $params)) {
//                echo 0;
//            } else {
//                echo 200;
//                unset($_SESSION['booking_detail']);
//                unset($_SESSION['eVoucher_detail']);
//            }
//        } catch (Exception $e) {
//            $this->db->rollBack();
//            echo 0;
//        }
//    }
//
//    public function processVenuePayment() {
//        /*
//         * status = 0 venue payment
//         * status = 1 completed
//         * status = 2 online paid but not do the appointment
//         */
//        Session::initIdle();
//        $status = 0;
//        $client_id = $_SESSION['client_id'];
//        $total_money = 0;
//        if (isset($_SESSION['booking_detail'])) {
//            foreach ($_SESSION['booking_detail'] as $key => $value) {
//                $total_money += $value['choosen_price'] * $value['booking_quantity'];
//            }
//        }
//        if (isset($_SESSION['eVoucher_detail'])) {
//            foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
//                $total_money += $value['choosen_price'] * $value['booking_quantity'];
//            }
//        }
//        try {
//            $booking_id = $this->createBookingId();
//            // echo "<pre/>";
//            // print_r($_SESSION['eVoucher_detail']);exit;
//            $this->db->beginTransaction();
//            $sql = <<<SQL
//INSERT INTO booking
//VALUES(
//'{$booking_id}'
//, CURRENT_DATE()
//, {$total_money}
//, {$client_id}
//)
//SQL;
//            $insert_1 = $this->db->prepare($sql);
//            $insert_1->execute();
//            if ($insert_1->rowCount() > 0) {
//                // insert booking detail
//                if (isset($_SESSION['booking_detail'])) {
//                    foreach ($_SESSION['booking_detail'] as $key => $value) {
//                        $query = <<<SQL
//INSERT INTO booking_detail(
//`booking_detail_price`
//,`booking_detail_quantity`
//,`booking_detail_date`
//,`booking_detail_time_start`
//,`booking_detail_time_end`
//,`booking_detail_user_id`
//,`booking_detail_user_service_id`
//,`booking_detail_booking_id`
//,`booking_detail_status`
//)
//VALUES(
//'{$value['choosen_price']}'
//, '{$value['booking_quantity']}'
//, '{$value['booking_detail_date']}'
//, '{$value['booking_detail_time']}'
//, '{$value['booking_detail_time']}'
//, '{$value['user_id']}'
//, '{$value['user_service_id']}'
//, '{$booking_id}'
//, {$status}
//)
//SQL;
//                        $insert_2 = $this->db->prepare($query);
//                        $insert_2->execute();
//                    }
//                }
//                if (isset($_SESSION['eVoucher_detail'])) {
//                    foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
//                        $bytes = openssl_random_pseudo_bytes(8);
//                        $hex = bin2hex($bytes);
//                        $e_voucher_id = 'E-' . $hex;
//                        for ($i = 0;; $i++) {
//                            $check_e_voucher_id = $this->checkExisteVoucherId($e_voucher_id);
//                            if ($check_e_voucher_id == 0) {
//                                break;
//                            } else {
//                                $bytes = openssl_random_pseudo_bytes(8);
//                                $hex = bin2hex($bytes);
//                                $e_voucher_id = 'E-' . $hex;
//                            }
//                        }
//                        $query = <<<SQL
//INSERT INTO e_voucher(
//`e_voucher_id`
//,`e_voucher_due_date`
//,`e_voucher_price`
//,`e_voucher_quantity`
//,`e_voucher_user_service_id`
//,`e_voucher_booking_id`
//,`e_voucher_user_id`
//,`e_voucher_status`
//)
//VALUES(
//'{$e_voucher_id}'
//,'{$value['eVoucher_due_date']}'
//, '{$value['choosen_price']}'
//, '{$value['booking_quantity']}'
//, '{$value['user_service_id']}'
//, '{$booking_id}'
//, '{$value['user_id']}'
//, {$status}
//)
//SQL;
//                        $insert_3 = $this->db->prepare($query);
//                        $insert_3->execute();
//                    }
//                }
//            } else {
//                echo 0;
//                exit;
//            }
//            echo 200;
//            unset($_SESSION['booking_detail']);
//            unset($_SESSION['eVoucher_detail']);
//            $this->db->commit();
//        } catch (Exception $e) {
//            echo 0;
//        }
//    }


?>