<?php
/**
 *
 */
class servicelocation_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function searchLocation() {

	}

	public function loadResultSearch($data) {
		$page = ($data['page'] - 1) * MAX_PAGINATION_ITEM;
		$item_per_page = MAX_PAGINATION_ITEM;
		$return = array();
		$service_name = explode(' ', $data["service_name"]);
		$where = 'WHERE (';
		foreach ($service_name as $key => $value) {
			$where .= "service.service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user_service.user_service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user.user_business_name LIKE N'%{$value}%' OR ";
		}
		$where = substr($where, 0, strlen($where) - 4);
		$where .= ')';
		// if($data['sort_by'] == '5'){
			// if($data['user_address_1'] != '' && $data['user_address_2'] != ''){
				// $where .= ' AND (';
				// $user_address_1 = explode(', ', $data['user_address_1']);
				// $user_address_2 = explode(', ', $data['user_address_2']);
				// foreach ($user_address_1 as $key => $value) {
					// $where .= "user.user_address LIKE N'%{$value}%' OR ";
				// }
				// foreach ($user_address_2 as $key_1 => $value_1) {
					// $where .= "user.user_address LIKE N'%{$value_1}%' OR ";
				// }
				// $where = substr($where, 0, strlen($where) - 4);
				// $where .= ')';
			// }
		// }
		if($data['service_type_id'] != ''){
			$where .= "AND (";
			$where .= "service.service_service_type_id = {$data['service_type_id']}";
			if($data['service_id'] != ''){
				$where .= ' AND (';
				$data['service_id'] = rtrim($data['service_id'], ',');
				$service_id = explode(',', $data['service_id']);
				foreach ($service_id as $key_2 => $value_2) {
					$where .= "service.service_id = '{$value_2}' OR ";
				}
				$where = substr($where, 0, strlen($where) - 4);
				$where .= ")";
			}
			$where .= ")";
		}else if($data['service_type_id'] == ''){
			if($data['service_id'] != ''){
				$where .= ' AND (';
				$data['service_id'] = rtrim($data['service_id'], ',');
				$service_id = explode(',', $data['service_id']);
				foreach ($service_id as $key_2 => $value_2) {
					$where .= "service.service_id = '{$value_2}' OR ";
				}
				$where = substr($where, 0, strlen($where) - 4);
				$where .= ")";
			}
		}
		if(isset($data['user_service_sale_price'])&&isset($data['user_service_sale_price_low'])){
			$where .= ' AND (';
			/* imtoantran changed */
			//$where .= "user_service_sale_price <= 5000000 AND user_service_sale_price > {$data['user_service_sale_price']}";
			/* imtoantran add low price range search */
			$where .= "user_service_sale_price BETWEEN {$data['user_service_sale_price_low']} AND {$data['user_service_sale_price']} ";
			/* imtoantran add low price range search */
			$where .= ")";
		}
		if(isset($data['user_service_use_evoucher'])){
			$where .= ' AND (';
			if($data['user_service_use_evoucher'] != 2){				
				$where .= "user_service_use_evoucher = {$data['user_service_use_evoucher']} OR user_service_use_evoucher = 2";
			}else{
				$where .= "user_service_use_evoucher = 0 OR user_service_use_evoucher = 1 OR user_service_use_evoucher = 2";
			}
			$where .= ")";
		}
		if($data['user_open_hour'] != ''){
			$where .= ' AND (';
			$where .= " user_open_hour LIKE '%{$data['user_open_hour']}%'";
			$where .= ')';
		}
		if($data['user_limit_before_booking'] != ''){
			$where .= ' AND (';
			$where .= " user_limit_before_booking >= '{$data['user_limit_before_booking']}'";
			$where .= ')';
		}
		if($data['param_from_m_h'] != ''){
			$where .= ' AND (';
			$where .= " service.service_id = {$data['param_from_m_h']}";
			$where .= ')';
		}
		// if($data['service_name'] == ''){
			// $where = "WHERE (service.service_name LIKE '%{$data["service_name"]}%'";
			// $where .= "OR user_service.user_service_name LIKE '%{$data["service_name"]}%')";
		// }else{
			// $where = "WHERE (MATCH (service.service_name) AGAINST ('{$data["service_name"]}')";
			// $where .= "OR MATCH (user_service.user_service_name) AGAINST ('{$data["service_name"]}'))";
		// }
		$order = '';
		if($data['sort_by'] == '1'){
			$order = 'ORDER BY user.user_id DESC';
		}else if($data['sort_by'] == '2'){
			$order = 'ORDER BY star_amount DESC';
		}else if($data['sort_by'] == '3'){
			$order = 'ORDER BY user_service.user_service_sale_price ASC';
		}else if($data['sort_by'] == '4'){
			$order = 'ORDER BY user_service.user_service_sale_price DESC';
		}else if($data['sort_by'] == '5'){
			$order = 'ORDER BY DISTANCE ASC';
		}
		$sql = <<<SQL
SELECT COUNT(DISTINCT user.user_id) AS total_row
FROM user
INNER JOIN group_service ON user.user_id = group_service.group_service_user_id
INNER JOIN user_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN service ON user_service.user_service_service_id = service.service_id
LEFT JOIN 
(SELECT user_review.user_id
, COUNT(*) AS star_amount
FROM user, user_review
WHERE user.user_id = user_review.user_id
GROUP BY user_review.user_id) user_review ON user_review.user_id = user.user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
SQL;
		$select = $this -> db -> select($sql);
		$return['total_row'] = $select[0]['total_row'];
		$sql = <<<SQL
SELECT DISTINCT
SQRT(ABS((user_lat-{$data['x_curr']})*(user_lat-{$data['x_curr']}))+ABS((user_long-{$data['y_curr']})*(user_long-{$data['y_curr']}))) as DISTANCE
,user.user_id
,user.user_business_name
,user.user_address
,user.user_description
,user.user_logo
,user.user_lat
,user.user_long
,user.user_district_id
,user.user_city_id
,IF(user_review.star_amount IS NULL,0,user_review.star_amount) AS star_amount
FROM user
INNER JOIN group_service ON user.user_id = group_service.group_service_user_id
INNER JOIN user_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN service ON user_service.user_service_service_id = service.service_id
LEFT JOIN 
(SELECT user_review.user_id
, COUNT(*) AS star_amount
FROM user, user_review
WHERE user.user_id = user_review.user_id
GROUP BY user_review.user_id) user_review ON user_review.user_id = user.user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
{$order}
LIMIT {$page}, {$item_per_page}
SQL;
		$select = $this -> db -> select($sql);
		$array = array();
		foreach ($select as $key => $value) {
			$sql = <<<SQL
SELECT user_review_overall, COUNT(*) AS star_amount
FROM user_review
WHERE user_id = {$value['user_id']}
AND user_review.user_review_status = 1
GROUP BY user_review_overall
SQL;
			$select = $this -> db -> select($sql);
			$client_amount = 0;
			$star_point = 0;
			foreach ($select as $i => $item) {
				$star_point = $star_point + $item['user_review_overall'] * $item['star_amount'];
				$client_amount = $client_amount + $item['star_amount'];
			}
			// $star_review = $star_point / $client_amount;
			if ($client_amount == 0) {
				$star_review = 0;
			} else {
				$star_review = $star_point / $client_amount;
			}
			$array[$key]['star_review'] = round($star_review, 1);
			$array[$key]['user_id'] = $value['user_id'];
			$array[$key]['user_business_name'] = $value['user_business_name'];
			$array[$key]['user_address'] = $value['user_address'];
			$array[$key]['user_description'] = $value['user_description'];
			$array[$key]['user_logo'] = $value['user_logo'];
			$array[$key]['user_lat'] = $value['user_lat'];
			$array[$key]['user_long'] = $value['user_long'];
			$array[$key]['user_district_id'] = $value['user_district_id'];
			$array[$key]['user_city_id'] = $value['user_city_id'];
			$query = <<<SQL
SELECT
SQRT(ABS((user_lat-{$data['x_curr']})*(user_lat-{$data['x_curr']}))+ABS((user_long-{$data['y_curr']})*(user_long-{$data['y_curr']}))) as DISTANCE
,user_service.user_service_id
,user_service.user_service_name
,user_service.user_service_duration
,user_service.user_service_full_price
,user_service.user_service_sale_price
FROM user
INNER JOIN group_service ON user.user_id = group_service.group_service_user_id
INNER JOIN user_service ON user_service.user_service_group_id = group_service.group_service_id
INNER JOIN service ON user_service.user_service_service_id = service.service_id
LEFT JOIN 
(SELECT user_review.user_id
, COUNT(*) AS star_amount
FROM user, user_review
WHERE user.user_id = user_review.user_id
GROUP BY user_review.user_id) user_review ON user_review.user_id = user.user_id
{$where}
AND user.user_id = {$value["user_id"]}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
{$order}
SQL;
			$select_service = $this -> db -> select($query);
			$array[$key]['user_service'] = $select_service;
			$query = <<<SQL
SELECT DISTINCT service_type.service_type_id
,service_type.service_type_name
,service_type.service_type_name_short
,service_type.service_type_icon
FROM service_type,
service,
user_service,
group_service,
user
WHERE
service_type.service_type_id = service.service_service_type_id
AND service.service_id = user_service.user_service_service_id
AND user_service.user_service_group_id = group_service.group_service_id
AND user.user_id = group_service.group_service_user_id
AND user.user_id = {$value['user_id']}
AND user_service.user_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
SQL;
			$select_service_type = $this -> db -> select($query);
			$array[$key]['service_type'] = $select_service_type;
			$array[$key]['distance'] = $value['DISTANCE'];
		}
		$return['data'] = $array;
		echo json_encode($return);
	}

	public function loadAdvantageSearch($data){
		$return = array();
		$service_name = explode(' ', $data["service_name"]);
		$where = 'WHERE (';
		foreach ($service_name as $key => $value) {
			$where .= "service.service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user_service.user_service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user.user_business_name LIKE N'%{$value}%' OR ";
		}
		$where = substr($where, 0, strlen($where) - 4);
		$where .= ')';
		// if($data['sort_by'] == '5'){
			// if($data['user_address_1'] != '' && $data['user_address_2'] != ''){
				// $where .= ' AND (';
				// $user_address_1 = explode(', ', $data['user_address_1']);
				// $user_address_2 = explode(', ', $data['user_address_2']);
				// foreach ($user_address_1 as $key => $value) {
					// $where .= "user.user_address LIKE N'%{$value}%' OR ";
				// }
				// foreach ($user_address_2 as $key_1 => $value_1) {
					// $where .= "user.user_address LIKE N'%{$value_1}%' OR ";
				// }
				// $where = substr($where, 0, strlen($where) - 4);
				// $where .= ')';
			// }
		// }
		if($data['user_open_hour'] != ''){
			$where .= ' AND (';
			$where .= " user_open_hour LIKE '%{$data['user_open_hour']}%'";
			$where .= ')';
		}
		if($data['user_limit_before_booking'] != ''){
			$where .= ' AND (';
			$where .= " user_limit_before_booking >= '{$data['user_limit_before_booking']}'";
			$where .= ')';
		}
		if($data['param_from_m_h'] != ''){
			$where .= ' AND (';
			$where .= " service.service_id = {$data['param_from_m_h']}";
			$where .= ')';
		}
		// if($data['service_name'] == ''){
			// $where = "WHERE (service.service_name LIKE '%{$data["service_name"]}%'";
			// $where .= "OR user_service.user_service_name LIKE '%{$data["service_name"]}%')";
		// }else{
			// $where = "WHERE (MATCH (service.service_name) AGAINST ('{$data["service_name"]}')";
			// $where .= "OR MATCH (user_service.user_service_name) AGAINST ('{$data["service_name"]}'))";
		// }
		$sql = <<<SQL
SELECT service_type.service_type_id
, service_type.service_type_name
, COUNT(*) AS amount
FROM service_type
INNER JOIN service ON service.service_service_type_id = service_type.service_type_id
INNER JOIN user_service ON user_service.user_service_service_id = service.service_id
INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
GROUP BY service_type.service_type_id
SQL;
		$select = $this -> db -> select($sql);
		$return['service_type'] = $select;
		$sql = <<<SQL
SELECT service.service_id
, service.service_name
, COUNT(*) AS amount
FROM service_type
INNER JOIN service ON service.service_service_type_id = service_type.service_type_id
INNER JOIN user_service ON user_service.user_service_service_id = service.service_id
INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
GROUP BY service.service_id
SQL;
		$select = $this -> db -> select($sql);
		$return['service'] = $select;
		$array_type_buy[] = array('user_service_use_evoucher' => 0
							   ,'use_evoucher' => 0);
		$array_type_buy[] = array('user_service_use_evoucher' => 1
							   ,'use_evoucher' => 0);
		$sql = <<<SQL
SELECT user_service.user_service_use_evoucher,
COUNT(*) AS use_evoucher
FROM service_type
INNER JOIN service ON service.service_service_type_id = service_type.service_type_id
INNER JOIN user_service ON user_service.user_service_service_id = service.service_id
INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
-- imtoantran filter published spa --
AND user.user_unpublished = 0
-- imtoantran filter published spa --
GROUP BY user_service.user_service_use_evoucher
SQL;
		$select = $this -> db -> select($sql);
		foreach ($select as $key => $value) {
			if($value['user_service_use_evoucher'] == 0){
				$array_type_buy[0]['use_evoucher'] = $value['use_evoucher'];
			}
			if($value['user_service_use_evoucher'] == 1){
				$array_type_buy[1]['use_evoucher'] = $value['use_evoucher'];
			}
			if($value['user_service_use_evoucher'] == 2){
				$array_type_buy[0]['use_evoucher'] = $array_type_buy[0]['use_evoucher'] + $value['use_evoucher'];
				$array_type_buy[1]['use_evoucher'] = $array_type_buy[1]['use_evoucher'] + $value['use_evoucher'];
			}
		}
		$return['evoucher'] = $array_type_buy;
		echo json_encode($return);
	}
	
	public function reloadService($data){
		$return = array();
		$service_name = explode(' ', $data["service_name"]);
		$where = 'WHERE (';
		foreach ($service_name as $key => $value) {
			$where .= "service.service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user_service.user_service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user.user_business_name LIKE N'%{$value}%' OR ";
		}
		$where = substr($where, 0, strlen($where) - 4);
		$where .= ')';
		// if($data['sort_by'] == '5'){
			// if($data['user_address_1'] != '' && $data['user_address_2'] != ''){
				// $where .= ' AND (';
				// $user_address_1 = explode(', ', $data['user_address_1']);
				// $user_address_2 = explode(', ', $data['user_address_2']);
				// foreach ($user_address_1 as $key => $value) {
					// $where .= "user.user_address LIKE N'%{$value}%' OR ";
				// }
				// foreach ($user_address_2 as $key_1 => $value_1) {
					// $where .= "user.user_address LIKE N'%{$value_1}%' OR ";
				// }
				// $where = substr($where, 0, strlen($where) - 4);
				// $where .= ')';
			// }
		// }
		if($data['service_type_id'] != ''){
			$where .= "AND (";
			$where .= "service_type.service_type_id = {$data['service_type_id']}";
			if($data['service_id'] != ''){
				$where .= ' AND (';
				$data['service_id'] = rtrim($data['service_id'], ',');
				$service_id = explode(',', $data['service_id']);
				foreach ($service_id as $key_2 => $value_2) {
					$where .= "service.service_id = '{$value_2}' OR ";
				}
				$where = substr($where, 0, strlen($where) - 4);
				$where .= ")";
			}
			$where .= ")";
		}else if($data['service_type_id'] == ''){
			if($data['service_id'] != ''){
				$where .= ' AND (';
				$data['service_id'] = rtrim($data['service_id'], ',');
				$service_id = explode(',', $data['service_id']);
				foreach ($service_id as $key_2 => $value_2) {
					$where .= "service.service_id = '{$value_2}' OR ";
				}
				$where = substr($where, 0, strlen($where) - 4);
				$where .= ")";
			}
		}
		$sql = <<<SQL
SELECT service.service_id
, service.service_name
, COUNT(*) AS amount
FROM service_type
INNER JOIN service ON service.service_service_type_id = service_type.service_type_id
INNER JOIN user_service ON user_service.user_service_service_id = service.service_id
INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
GROUP BY service.service_id
SQL;
		$select = $this -> db -> select($sql);
		$return['service'] = $select;
		$array_type_buy[] = array('user_service_use_evoucher' => 0
							   ,'use_evoucher' => 0);
		$array_type_buy[] = array('user_service_use_evoucher' => 1
							   ,'use_evoucher' => 0);
		$sql = <<<SQL
SELECT user_service.user_service_use_evoucher,
COUNT(*) AS use_evoucher
FROM service_type
INNER JOIN service ON service.service_service_type_id = service_type.service_type_id
INNER JOIN user_service ON user_service.user_service_service_id = service.service_id
INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
GROUP BY user_service.user_service_use_evoucher
SQL;
		$select = $this -> db -> select($sql);
		foreach ($select as $key => $value) {
			if($value['user_service_use_evoucher'] == 0){
				$array_type_buy[0]['use_evoucher'] = $value['use_evoucher'];
			}
			if($value['user_service_use_evoucher'] == 1){
				$array_type_buy[1]['use_evoucher'] = $value['use_evoucher'];
			}
			if($value['user_service_use_evoucher'] == 2){
				$array_type_buy[0]['use_evoucher'] = $array_type_buy[0]['use_evoucher'] + $value['use_evoucher'];
				$array_type_buy[1]['use_evoucher'] = $array_type_buy[1]['use_evoucher'] + $value['use_evoucher'];
			}
		}
		$return['evoucher'] = $array_type_buy;
		echo json_encode($return);
	}

	public function reloadTypeBuy($data){
		$return = array();
		$service_name = explode(' ', $data["service_name"]);
		$where = 'WHERE (';
		foreach ($service_name as $key => $value) {
			$where .= "service.service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user_service.user_service_name LIKE N'%{$value}%' OR ";
		}
		foreach ($service_name as $key => $value) {
			$where .= "user.user_business_name LIKE N'%{$value}%' OR ";
		}
		$where = substr($where, 0, strlen($where) - 4);
		$where .= ')';
		// if($data['sort_by'] == '5'){
			// if($data['user_address_1'] != '' && $data['user_address_2'] != ''){
				// $where .= ' AND (';
				// $user_address_1 = explode(', ', $data['user_address_1']);
				// $user_address_2 = explode(', ', $data['user_address_2']);
				// foreach ($user_address_1 as $key => $value) {
					// $where .= "user.user_address LIKE N'%{$value}%' OR ";
				// }
				// foreach ($user_address_2 as $key_1 => $value_1) {
					// $where .= "user.user_address LIKE N'%{$value_1}%' OR ";
				// }
				// $where = substr($where, 0, strlen($where) - 4);
				// $where .= ')';
			// }
		// }
		if($data['service_type_id'] != ''){
			$where .= "AND (";
			$where .= "service_type.service_type_id = {$data['service_type_id']}";
			if($data['service_id'] != ''){
				$where .= ' AND (';
				$data['service_id'] = rtrim($data['service_id'], ',');
				$service_id = explode(',', $data['service_id']);
				foreach ($service_id as $key_2 => $value_2) {
					$where .= "service.service_id = '{$value_2}' OR ";
				}
				$where = substr($where, 0, strlen($where) - 4);
				$where .= ")";
			}
			$where .= ")";
		}else if($data['service_type_id'] == ''){
			if($data['service_id'] != ''){
				$where .= ' AND (';
				$data['service_id'] = rtrim($data['service_id'], ',');
				$service_id = explode(',', $data['service_id']);
				foreach ($service_id as $key_2 => $value_2) {
					$where .= "service.service_id = '{$value_2}' OR ";
				}
				$where = substr($where, 0, strlen($where) - 4);
				$where .= ")";
			}
		}
		$array_type_buy[] = array('user_service_use_evoucher' => 0
							   ,'use_evoucher' => 0);
		$array_type_buy[] = array('user_service_use_evoucher' => 1
							   ,'use_evoucher' => 0);
		$sql = <<<SQL
SELECT user_service.user_service_use_evoucher,
COUNT(*) AS use_evoucher
FROM service_type
INNER JOIN service ON service.service_service_type_id = service_type.service_type_id
INNER JOIN user_service ON user_service.user_service_service_id = service.service_id
INNER JOIN group_service ON group_service.group_service_id = user_service.user_service_group_id
INNER JOIN user ON user.user_id = group_service.group_service_user_id
{$where}
AND user.user_district_id LIKE N'%{$data["district_id"]}%'
AND user.user_city_id LIKE N'%{$data["city_id"]}%'
AND user.user_delete_flg = 0
AND user_service.user_service_delete_flg = 0
GROUP BY user_service.user_service_use_evoucher
SQL;
		$select = $this -> db -> select($sql);
		foreach ($select as $key => $value) {
			if($value['user_service_use_evoucher'] == 0){
				$array_type_buy[0]['use_evoucher'] = $value['use_evoucher'];
			}
			if($value['user_service_use_evoucher'] == 1){
				$array_type_buy[1]['use_evoucher'] = $value['use_evoucher'];
			}
			if($value['user_service_use_evoucher'] == 2){
				$array_type_buy[0]['use_evoucher'] = $array_type_buy[0]['use_evoucher'] + $value['use_evoucher'];
				$array_type_buy[1]['use_evoucher'] = $array_type_buy[1]['use_evoucher'] + $value['use_evoucher'];
			}
		}
		$return['evoucher'] = $array_type_buy;
		echo json_encode($return);
	}

	/**
	* imtoantran
	*/
	public function getMaxPrice()
	{
		# code...
$sql = <<<SQL
SELECT
IFNULL(MAX(user_service_full_price),0) as MAX_PRICE
FROM user_service
SQL;
		$select = $this->db->select($sql);
		return $select[0]['MAX_PRICE'];
	}
}
?>