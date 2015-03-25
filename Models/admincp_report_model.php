<?php

class Admincp_Report_Model extends Model {
	function __construct() {
		parent::__construct();
	}
	/**
	* @author: imtoantran 	
	* @var 
	* @return [type] [description]
	* Tổng doanh thu theo spa
	*/	
	public function sale_report() {
		$params = $_REQUEST;
		$from = $params['from'];
		$to = $params['to'];
		$sql = <<<SQL
SELECT 
user_business_name
,user_email
,user_phone
,user_address
,COALESCE(SUM(bd.booking_detail_price),0) + COALESCE(SUM(e.e_voucher_price),0) total
FROM `user`
LEFT JOIN booking_detail bd
ON bd.booking_detail_user_id = user_id AND bd.booking_detail_date BETWEEN '{$from}' AND '{$to}' AND bd.booking_detail_status <> '2'
LEFT JOIN e_voucher e
ON e.e_voucher_booking_id = bd.booking_detail_booking_id
GROUP BY user_id
ORDER BY total DESC
SQL;
 //print $sql;
		$data = $this->db->select($sql,[],PDO::FETCH_NUM);
		return ["data"=>$data];
	}


	// Doanh thu theo dịch vụ
	public function service_sale_report() {
		$params = $_REQUEST;
		$from = $params['from'];
		$to = $params['to'];
		$aQuery = <<<SQL
SELECT 
user_service_name
,u.user_business_name
,u.user_phone
,u.user_address
,COALESCE(SUM(bd.booking_detail_price),'-') total
FROM user_service
JOIN booking_detail bd
ON bd.booking_detail_user_service_id = user_service.user_service_id AND bd.booking_detail_date BETWEEN '{$from}' AND '{$to}'  AND bd.booking_detail_status <> '2'
JOIN `user` u
ON u.user_id = bd.booking_detail_user_id
GROUP BY user_service_id
ORDER BY total DESC;
SQL;
		$data = $this->db->select($aQuery,[],PDO::FETCH_NUM);
// print $aQuery;
		return ["data"=>$data];
	}	

public function general($value='')
{
	$params = $_REQUEST;
	$from = $params['from'];
	$to = $params['to'];
	#get total sale
$aQuery_bookings = <<<SQL
SELECT 
COALESCE(SUM(booking_detail_price),'0') as value,
COUNT(*) AS count
FROM booking_detail 
WHERE  booking_detail_date BETWEEN '{$from}' AND '{$to}'
SQL;
$data_booking = $this->db->select($aQuery_bookings);
// print $aQuery_bookings;

#evoucher sale
$aQuery_evoucher = <<<SQL
SELECT 
COALESCE(SUM(e.e_voucher_price),0) as value,
COUNT(*) as count
FROM e_voucher e
JOIN booking b
ON e.e_voucher_booking_id = b.booking_id
WHERE ( b.booking_date BETWEEN '{$from}' AND '{$to}' )
SQL;
// print $aQuery_evoucher;
$data_evoucher = $this->db->select($aQuery_evoucher);

// gvoucher
$aQuery_gvoucher = <<<SQL
SELECT 
COALESCE(SUM(gift_voucher_price),0) as value,
COUNT(*) as count
FROM 
gift_voucher
-- WHERE ( gift_voucher_date BETWEEN '{$from}' AND '{$to}' )
SQL;
// print $aQuery_gvoucher;	
$data_giftvoucher = $this->db->select($aQuery_gvoucher);	
return [
	'totalBooking'=> $data_booking[0]
	,'totalEvoucher'=>$data_evoucher[0]
	,'totalGiftvoucher'=>$data_giftvoucher[0]
	,'totalSale'=>$data_giftvoucher[0]['value']+$data_evoucher[0]['value'] + $data_booking[0]['value']
];
}


public function totalClient($value='')
{
	$sql = <<<SQL
SELECT 
COUNT(*) as totalClient
FROM  client
SQL;
	$result = $this->db->select($sql);
	return $result[0]['totalClient'];
}

public function totalUser($value='')
{
	$sql = <<<SQL
SELECT 
COUNT(*) as totalUser
FROM  user
SQL;
	$result = $this->db->select($sql);
	return $result[0]['totalUser'];
}

}
