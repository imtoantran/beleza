<?php

/**
 *
 */
class servicelocation extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		header('location:' . URL);
	}

	public function searchLocation() {
		Session::initIdle();
		$this -> view -> style = array(URL . 'Views/servicelocation/css/servicelocation.css');
		$this -> view -> script = array(URL . 'Views/servicelocation/js/servicelocation.js',URL . 'Views/servicelocation/js/range-price.js', URL . 'Views/servicelocation/js/advantagesearch.js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBUxUNFuJ09fVcA24HZcEq0gwxs37ESDo4&language=vi-VI');
		if (isset($_GET['s']) && isset($_GET['c'])) {
			$this -> view -> service = $_GET['s'];
			if(isset($_GET['l'])){
				$this -> view -> location = $_GET['l'];
			}else{
				$this -> view -> location = '';
			}
			$this -> view -> city = $_GET['c'];
			if(isset($_GET['mh'])){
				$this -> view -> param_from_m_h = $_GET['mh'];
			}else{
				$this -> view -> param_from_m_h = '';
			}
		} else {
			header('location:' . URL);
		}
		$this -> view -> MAX_PRICE = $this->model->getMaxPrice();
		$this -> view -> render('servicelocation/index');
	}

	public function loadResultSearch() {
		Session::initIdle();
		if (isset($_POST['service_name']) && isset($_POST['district_id']) && isset($_POST['page'])) {
			$data['service_name'] = $_POST['service_name'];
			$data['district_id'] = $_POST['district_id'];
			$data['city_id'] = $_POST['city_id'];
			$data['param_from_m_h'] = $_POST['param_from_m_h'];
			$data['page'] = $_POST['page'];
			$data['sort_by'] = $_POST['sort_by'];
			$data['user_address_1'] = $_POST['user_address_1'];
			$data['user_address_2'] = $_POST['user_address_2'];
			$data['service_type_id'] = $_POST['service_type_id'];
			$data['service_id'] = $_POST['service_id'];
			$data['user_service_sale_price'] = $_POST['user_service_sale_price'];
			$data['user_service_use_evoucher'] = $_POST['user_service_use_evoucher'];
			$data['user_open_hour'] = $_POST['user_open_hour'];
			$data['user_limit_before_booking'] = $_POST['user_limit_before_booking'];
			$data['x_curr'] = $_POST['x_curr'];
			$data['y_curr'] = $_POST['y_curr'];
			/* imtoantran changed, not use */
			// $this -> model -> loadResultSearch($data);
			/* imtoantran changed, not use */
			$this -> model -> loadResultSearch($_POST);
			/* imtoantran changed, not use */
		}
	}

	public function loadAdvantageSearch() {
		Session::initIdle();
		if (isset($_POST['service_name']) && isset($_POST['district_id'])) {
			$data['service_name'] = $_POST['service_name'];
			$data['district_id'] = $_POST['district_id'];
			$data['city_id'] = $_POST['city_id'];
			$data['param_from_m_h'] = $_POST['param_from_m_h'];
			$data['sort_by'] = $_POST['sort_by'];
			$data['user_address_1'] = $_POST['user_address_1'];
			$data['user_address_2'] = $_POST['user_address_2'];
			$data['service_type_id'] = $_POST['service_type_id'];
			$data['service_id'] = $_POST['service_id'];
			$data['user_open_hour'] = $_POST['user_open_hour'];
			$data['user_limit_before_booking'] = $_POST['user_limit_before_booking'];
			$this -> model -> loadAdvantageSearch($data);
		}
	}

	public function reloadService() {
		Session::initIdle();
		if (isset($_POST['service_name']) && isset($_POST['district_id'])) {
			$data['service_name'] = $_POST['service_name'];
			$data['district_id'] = $_POST['district_id'];
			$data['sort_by'] = $_POST['sort_by'];
			$data['user_address_1'] = $_POST['user_address_1'];
			$data['user_address_2'] = $_POST['user_address_2'];
			$data['service_type_id'] = $_POST['service_type_id'];
			$data['service_id'] = $_POST['service_id'];
			$this -> model -> reloadService($data);
		}
	}

	public function reloadTypeBuy() {
		Session::initIdle();
		if (isset($_POST['service_name']) && isset($_POST['district_id'])) {
			$data['service_name'] = $_POST['service_name'];
			$data['district_id'] = $_POST['district_id'];
			$data['sort_by'] = $_POST['sort_by'];
			$data['user_address_1'] = $_POST['user_address_1'];
			$data['user_address_2'] = $_POST['user_address_2'];
			$data['service_type_id'] = $_POST['service_type_id'];
			$data['service_id'] = $_POST['service_id'];
			$this -> model -> reloadTypeBuy($data);
		}
	}

	public function loadFromGoogle() {
		Session::initIdle();
		if (isset($_POST['service_name'])) {
			$query = urlencode($_POST['service_name']);
			$html = file_get_html('https://www.google.com.vn/search?hl=vi&output=search&q=địa+điểm+spa&gws_rd=ssl&q=' . $query);

			$i = 0;
			$array_search_1 = array();
			foreach ($html->find('li[class=g]') as $element) {
				$element = str_replace('marker-noalpha.png', 'marker.png', $element);
				$element = str_replace('<span class="st">', '<small class="st">', $element);
				$element = str_replace('</span>', '</small>', $element);
				$element = str_replace('<a', '<a class="text-orange-black" target="_blank"', $element);
				$element = str_replace('<b>', '', $element);
				$element = str_replace('</b>', '', $element);
				$element = str_replace('<cite>', '<i>', $element);
				$element = str_replace('</cite>', '</i>', $element);
				$element = str_replace('href="/url', 'href="http://google.com.vn/url', $element);
				$element = str_replace('src="/map', 'src="http://google.com.vn/map', $element);
				$array_search_1[] = $element;
				echo iconv("ISO-8859-1", "UTF-8", $element);
				;
			}
			$html = file_get_html('https://www.google.com.vn/search?hl=vi&output=search&q=địa+điểm+salon&gws_rd=ssl&q=' . $query);

			$i = 0;
			$array_search_2 = array();
			foreach ($html->find('li[class=g]') as $element) {
				$element = str_replace('marker-noalpha.png', 'marker.png', $element);
				$element = str_replace('<span class="st">', '<small class="st">', $element);
				$element = str_replace('</span>', '</small>', $element);
				$element = str_replace('<a', '<a class="text-orange-black" target="_blank"', $element);
				$element = str_replace('<b>', '', $element);
				$element = str_replace('</b>', '', $element);
				$element = str_replace('<cite>', '<i>', $element);
				$element = str_replace('</cite>', '</i>', $element);
				$element = str_replace('href="/url', 'href="http://google.com.vn/url', $element);
				$element = str_replace('src="/map', 'src="http://google.com.vn/map', $element);
				$array_search_2[] = $element;
				echo iconv("ISO-8859-1", "UTF-8", $element);
				;
			}
			$html = file_get_html('https://www.google.com.vn/search?hl=vi&output=search&q=địa+điểm+beauty&gws_rd=ssl&q=' . $query);

			$i = 0;
			$array_search_3 = array();
			foreach ($html->find('li[class=g]') as $element) {
				$element = str_replace('marker-noalpha.png', 'marker.png', $element);
				$element = str_replace('<span class="st">', '<small class="st">', $element);
				$element = str_replace('</span>', '</small>', $element);
				$element = str_replace('<a', '<a class="text-orange-black" target="_blank"', $element);
				$element = str_replace('<b>', '', $element);
				$element = str_replace('</b>', '', $element);
				$element = str_replace('<cite>', '<i>', $element);
				$element = str_replace('</cite>', '</i>', $element);
				$element = str_replace('href="/url', 'href="http://google.com.vn/url', $element);
				$element = str_replace('src="/map', 'src="http://google.com.vn/map', $element);
				$array_search_3[] = $element;
				echo iconv("ISO-8859-1", "UTF-8", $element);
				;
			}
		}
	}

}
