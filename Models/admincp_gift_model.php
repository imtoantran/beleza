<?php
/**
 *
 */
class admincp_gift_model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function loadGiftPrice(){
		$sql = <<<SQL
			SELECT *
			FROM gift
			WHERE gift_delete_flg = 0
SQL;
		$select = $this -> db -> select($sql);
		return $select;
	}

	public function loadGiftList($type) {
		$sql = <<<SQL
			SELECT *
			FROM gift_voucher
			INNER JOIN client ON gift_voucher.gift_voucher_client_id = client.client_id
			WHERE gift_voucher_type = $type
			ORDER BY gift_voucher_date ASC
SQL;
		$select = $this -> db -> select($sql);
		return $select;
	}
	// add price
	public function addPrice($giftPrice, $gift_status){
		$arr = [];
		$sql = <<<SQL
			INSERT INTO gift(
			gift_price
			, gift_status
			, gift_delete_flg
			)
			values(
				{$giftPrice}
				, {$gift_status}
				, 0
			)
SQL;
		$insert = $this -> db -> prepare($sql);
		$insert -> execute();
		if($insert -> rowCount()){
			$arr['id'] = $this->db->lastInsertId();
			$arr['price'] = number_format($giftPrice,"0",",",".");
			echo json_encode($arr);
		}else{
			echo 0;
		}
	}


	public function updatePrice($giftId, $giftPrice, $giftStatus){
		$sql = <<<SQL
			UPDATE gift
			SET gift_price = {$giftPrice}, gift_status = {$giftStatus}
			WHERE gift_id = {$giftId}
SQL;
			$update = $this -> db -> prepare($sql);
		$update -> execute();
		if($update -> rowCount()){
			echo number_format($giftPrice,"0",",",".");
		}else{
			echo 0;
		}
	}

	// delete price
	public function deletePrice($giftId){
		$sql = <<<SQL
			UPDATE gift
			SET gift_delete_flg = 1
			WHERE gift_id = {$giftId}
SQL;
			$update = $this -> db -> prepare($sql);
		if($update -> execute()){
			return 1;
		}
		return 0;
	}
	// loadEmailDetail
	public function loadEmailDetail($giftId) {
		$sql = <<<SQL
			SELECT *
			FROM gift_voucher
			INNER JOIN client ON gift_voucher.gift_voucher_client_id = client.client_id
			WHERE gift_voucher_id = {$giftId}
SQL;
		$select = $this -> db -> select($sql);
		echo json_encode($select);
	}

	public function updateStatus() {
		if(isset($_POST['gift_status']) && isset($_POST['gift_id'])){
			$sql = <<<SQL
			UPDATE gift_voucher
			SET gift_voucher_status = {$_POST['gift_status']}
			WHERE gift_voucher_id = {$_POST['gift_id']}
SQL;
			$update = $this -> db -> prepare($sql);
			$update -> execute();
			echo 1;
		}else{
			echo 0;
		}
	}
	public function export_excel_card(){
		$strGiftId = isset($_GET['data'])? $_GET['data'] : "";

		$sql = <<<SQL
			SELECT *
			FROM gift_voucher
			INNER JOIN client ON gift_voucher.gift_voucher_client_id = client.client_id
			WHERE gift_voucher_id IN($strGiftId)
SQL;
		$data = $this->db->select($sql);

		$data_import = array();
		foreach ($data as $row) {
			$data_import[] = array(
				$row['client_name'],
				$row['gift_voucher_name'],
				$row['gift_voucher_email'],
				$row['gift_voucher_code'],
				date_format(date_create($row['gift_voucher_due_date']), "d-m-Y"),
				$row['gift_voucher_address'],
				$row['gift_voucher_phone'],
				number_format($row['gift_voucher_price'],"0",",",".").' VNĐ',
				$row['gift_voucher_message']
			);
		}



///////////////////// EXPORT EXCEL & CSV //////////////////////
//file name
		$file_name = 'GiftVoucherEmail' . '_' . preg_replace('/[^a-zA-Z0-9]/','',date('d_m_Y'));
//Header
		$header = array(
			'Người gửi',
			'Người nhận',
			'Email người nhận',
			'Mã GiftVoucher',
			'Ngày hết hạn',
			'Địa chỉ',
			'Điện thoại',
			'Giá',
			'Lời nhắn'
		);
		require_once(OTHER_LIBS .DS. 'exportExcelCSV.php');

		$export = new ExportExcelCSV($file_name, $header, $data_import);
		$export->exportExcel();
//		echo $link = "<script>window.open('dsd')</script>";


	}
}


