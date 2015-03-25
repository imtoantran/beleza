<?php /**
 *
 */
class payment extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Session::initIdle();
		Auth::handleClientLogin();
		if (!isset($_SESSION['booking_detail']) && !isset($_SESSION['eVoucher_detail']) && !isset($_SESSION['gift_detail'])) {
			header('Location:' . URL);
		}
		$this -> view -> style = array(URL . 'Views/payment/css/payment.css');
		$this -> view -> script = array(URL . 'Views/payment/js/payment.js');
		$this -> view -> is_payment_page = 1;
		$this -> view -> render('payment/index');
	}

	public function saveHobby() {
		Session::initIdle();
//		$this -> model -> saveHobby();
	}

	/* MAKE PAYMENT
	 * $return_url      : url response
	 * $receiver        : account receive money
	 * $order_code      : bill code
	 * $transaction_info: trade info
	 * $price           : price of cart
	 * $curent          : unit currency
	 * $tax             : tax money VAT
	 * $discount        : discount money
	 * $buyer_info      : info buyer("ho ten*|*email*|*sdt*|*dia chi nhan dang*|*loi nhan tu nguoi ban");
	 */
	function nganluongPayment() {
		Session::init();
		$cl_name = (isset($_SESSION['client_name'])) ? $_SESSION['client_name'] : "";
		$cl_email = (isset($_SESSION['client_email'])) ? $_SESSION['client_email'] : "";
		$cl_phone = (isset($_SESSION['client_phone'])) ? $_SESSION['client_phone'] : "";

		require LIBS . DS . 'other' . DS . 'NganLuong' . DS . 'nganluong_config.php';
		require LIBS . DS . 'other' . DS . 'NganLuong' . DS . 'nganluong_class.php';

		$receiver = RECEIVER;
		$return_url = URL . 'payment/processNganLuongPayment';
		$transaction_info = "Beleza.vn";
		$order_code = $this -> model -> createBookingId();
		// $price = $this->getTotalMoney();
		$price = 2000;
		$currency = "vnd";
		$quantity = "1";
		$tax = "0";
		$discount = "0";
		$fee_cal = "0";
		$fee_shipping = "0";
		$order_description = "";
		$buyer_info = $cl_name . "*|*" . $cl_email . "*|*" . $cl_phone;
		$affiliate_code = "";

		//Initialize object of class 'NL_Checkout'
		$nl = new NL_Checkout();
		$nl -> nganluong_url = "https://www.nganluong.vn/checkout.php";
		$nl -> affiliate_code = "";
		$nl -> merchant_site_code = MERCHANT_ID;
		$nl -> secure_pass = MERCHANT_PASS;

		//Create link make make payment form nganluong.vn
		$url = $nl -> buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount, $fee_cal, $fee_shipping, $order_description, $buyer_info, $affiliate_code);

		echo $url . "&cancel_url=" . URL;
	}

	public function paypalPayment() {

//		echo $this-> model-> processPayment($this->getTotalMoney(), $this->model->createBookingId());

		require_once LIBS . DS . 'other' . DS . 'PayPal' . DS . 'paypal_config.php';
		require_once LIBS . DS . 'other' . DS . 'PayPal' . DS . 'RateVietComBank.php';

		// Get rate USD of VietCom Bank
		$rateUSD = new RateVietComBank();
		$rate = $rateUSD -> getRate('USD');
		if ($rate <= 0 && $rate == 'undefined') {
			$rate = 21000;
		}

		//email of receiver
		$receiver_email = RECEIVER_EMAIL;
		$item_name = $this -> model -> createBookingId();

		$return = RETURN_URL . '?item_name=' . $item_name;
		//Total money
		$item_amount = round($this -> getTotalMoney() / $rate, 2);
		$item_number = "";

		$url = "?business=" . urlencode($receiver_email) . "&";
		$url .= "item_name=" . urlencode($item_name) . "&";
		$url .= "amount=" . urlencode($item_amount) . "&";
		$url .= "cmd=_xclick&";
		$url .= "no_note=1&";
		$url .= "lc=US&";
		$url .= "currency_code=USD&";
		$url .= "bn=PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest&";
		$url .= "first_name=&";
		$url .= "last_name=&";
		$url .= "payer_email=" . (isset($_SESSION['client_email'])) ? $_SESSION['client_email'] : "";
		$url .= "item_number=" . $item_number . "&";
		$url .= "return=" . urlencode(stripslashes($return)) . "&";
		$url .= "cancel_return=" . urlencode(stripslashes(CANCEL_URL)) . "&";
		$url .= "notify_url=" . urlencode(NOTIFY_URL);

		echo(PAYPAL_URL . $url);
	}

	public function processPaypalPayment() {
		Session::initIdle();
		if (isset($_GET['item_name'])) {
			require_once LIBS . DS . 'other' . DS . 'PayPal' . DS . 'RateVietComBank.php';
			$rateUSD = new RateVietComBank();
			$rate = $rateUSD -> getRate('USD');
			if ($rate <= 0 && $rate == 'undefined') {
				$rate = 21000;
			}

			$order_code = $_GET['item_name'];
			$usd_gross = (isset($_GET['amt'])) ? $_GET['amt'] : round($this -> getTotalMoney() / $rate, 2);
			//usd return

			// import class get rate vietcombank
			$total_money = round($usd_gross * $rate, -3);

			$result = $this -> model -> processPayment($total_money, $order_code);
			// =0 is insert false
			if ($result == 0) {
				Header("Location: " . URL . 'error');
			} else {
				Header("Location:" . URL);
			}
		} else {
			Header("Location:" . URL);
		}
	}

	public function processNganLuongPayment() {
		$order_code = (isset($_GET['order_code'])) ? $_GET['order_code'] : "";
		$total_money = (isset($_GET['price'])) ? $_GET['price'] : "";
		$error_text = (isset($_GET['error_text'])) ? $_GET['error_text'] : "error";

		//          is = empety is success
		if (($error_text != null) and ($error_text != "")) {
			Header("Location: " . URL . 'error');
		} else {
			$rerult = $this -> model -> processPayment($total_money, $order_code);
			//                // =0 is insert false
			if ($rerult == 0) {
				Header("Location: " . URL . 'error');
			} else {
				Header("Location:" . URL);
			}
		}
	}

	function processVenuePayment() {
		Session::initIdle();
		if (isset($_SESSION['client_id'])) {
			$this -> model -> processVenuePayment();
		} else {
			echo 0;
		}
	}

	function checkIsLoginPayment() {
		Session::initIdle();
		if (isset($_SESSION['client_id'])) {
			$_SESSION['popup_payment'] = 0;
			echo 200;
		} else {
			$_SESSION['popup_payment'] = 1;
			echo 0;
		}
	}

	function loadPaymentDetail() {
		Session::initIdle();
		Session::init();
		$_SESSION['has_credit_point'] = 0;
		$result = array();
		if (isset($_SESSION['booking_detail'])) {
			$result['booking'] = $_SESSION['booking_detail'];
		} else {
			$result['booking'] = '';
		}
		if (isset($_SESSION['eVoucher_detail'])) {
			$result['eVoucher'] = $_SESSION['eVoucher_detail'];
		} else {
			$result['eVoucher'] = '';
		}
		if (isset($_SESSION['gift_detail'])) {
			$result['gift'] = $_SESSION['gift_detail'];
		} else {
			$result['gift'] = '';
		}
		if (isset($_SESSION['client_id'])) {
			$result['client_info'][0]['client_id'] = $_SESSION['client_id'];
			$result['client_info'][0]['client_username'] = $_SESSION['client_username'];
			$result['client_info'][0]['client_email'] = $_SESSION['client_email'];
			$result['client_info'][0]['client_name'] = $_SESSION['client_name'];
			$result['client_info'][0]['client_phone'] = $_SESSION['client_phone'];
			$result['client_info'][0]['client_join_date'] = $_SESSION['client_join_date'];
			$result['client_info'][0]['client_creditpoint'] = $_SESSION['client_creditpoint'];
			$result['client_info'][0]['client_giftpoint'] = $_SESSION['client_giftpoint'];
		} else {
			$result['client_info'] = '';
		}
		echo json_encode($result);
	}

	public function checkCreditPoint() {
		Session::initIdle();
		$total_money = 0;
		if (isset($_SESSION['booking_detail'])) {
			foreach ($_SESSION['booking_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		if (isset($_SESSION['eVoucher_detail'])) {
			foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		$total_point = $total_money / MONEY_PER_POINT;
		if ($total_point <= $_SESSION['client_creditpoint']) {
			echo 200;
		} else {
			echo 0;
		}
	}

	public function checkGiftPoint() {
		Session::initIdle();
		$total_money = 0;
		if (isset($_SESSION['booking_detail'])) {
			foreach ($_SESSION['booking_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		if (isset($_SESSION['eVoucher_detail'])) {
			foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		$total_point = $total_money / MONEY_PER_POINT;
		if ($total_point <= $_SESSION['client_giftpoint']) {
			echo 200;
		} else {
			echo 0;
		}
	}

	public function processCreditPointPayment() {
		Session::initIdle();
		if (isset($_SESSION['client_id'])) {
			$this -> model -> processCreditPointPayment();
		}
	}

	public function processGiftPointPayment() {
		Session::initIdle();
		if (isset($_SESSION['client_id'])) {
			$this -> model -> processGiftPointPayment();
		}
	}

	public function getTotalMoney() {
		Session::initIdle();
		$total_money = 0;
		if (isset($_SESSION['booking_detail'])) {
			foreach ($_SESSION['booking_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		if (isset($_SESSION['eVoucher_detail'])) {
			foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		if (isset($_SESSION['gift_detail'])) {
			foreach ($_SESSION['gift_detail'] as $key => $value) {
				$total_money += $value['gift_voucher_price'];
			}
		}
		if(isset($_SESSION['has_credit_point'])){
			if($_SESSION['has_credit_point'] == 1){
				$total_money = ($total_money - $_SESSION['client_creditpoint']*MONEY_PER_POINT);
			}
		}
		return $total_money;
	}

	public function checkCreditPointAmount() {
		Session::initIdle();
		$total_money = 0;
		$_SESSION['has_credit_point'] = 0;
		if (isset($_SESSION['booking_detail'])) {
			foreach ($_SESSION['booking_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		if (isset($_SESSION['eVoucher_detail'])) {
			foreach ($_SESSION['eVoucher_detail'] as $key => $value) {
				$total_money += $value['choosen_price'] * $value['booking_quantity'];
			}
		}
		if (isset($_SESSION['gift_detail'])) {
			foreach ($_SESSION['gift_detail'] as $key => $value) {
				$total_money += $value['gift_voucher_price'];
			}
		}
		if($total_money <= $_SESSION['client_creditpoint']*MONEY_PER_POINT){
			$_SESSION['has_credit_point'] = 2;
			//echo $total_money . ':' . $_SESSION['client_creditpoint']*MONEY_PER_POINT;
			$order_code = $this -> model -> createBookingId();
			$result = $this -> model -> processPayment($total_money, $order_code);
			// =0 is insert false
			if ($result == 0) {
				echo 'error';
			} else {
				echo 'success';
			}
			// echo 'No';
			
		}else if($total_money > $_SESSION['client_creditpoint']*MONEY_PER_POINT){
			//echo $total_money . ':' . $_SESSION['client_creditpoint']*MONEY_PER_POINT;
			$_SESSION['has_credit_point'] = 1;
			echo $this -> getTotalMoney();
		}
	}

}
