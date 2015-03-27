<?php

/**
 *
 */
class service extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Session::initIdle();
		header('location:' . URL);
	}

	public function servicePlace($user_id) {
		Session::initIdle();
		if ($user_id == '') {
			header('location:' . URL);
		}
		$this -> view -> style = array(URL . 'Views/service/css/service.css');
		$this -> view -> script = array(URL . 'Views/service/js/service.js', URL . 'Views/service/js/consult.js', URL . 'Views/service/js/promotion.js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBUxUNFuJ09fVcA24HZcEq0gwxs37ESDo4&language=vi-VI');
		$this -> view -> user_id = $user_id;
		$this -> view -> isBookmarked = $this->model->isBookmarked($user_id);
		if (isset($_SESSION['client_id'])) {
			$this -> view -> client_id = $_SESSION['client_id'];
		} else {
			$this -> view -> client_id = '';
		}
		$this -> view -> render('service/index');
	}

	public function loadLocationDetail() {
		Session::initIdle();
		if (isset($_POST['user_id'])) {
			$check_exist_user = $this -> model -> checkExistUser($_POST['user_id']);
			if ($check_exist_user > 0) {
				$this -> model -> updateTotalView($_POST['user_id']);
				$this -> model -> loadLocationDetail($_POST['user_id']);
			} else {
				echo 0;
			}
		}
	}

	public function loadLocationStarRating() {
		Session::initIdle();
		if (isset($_POST['user_id'])) {
			$this -> model -> loadLocationStarRating($_POST['user_id']);
		}
	}

	public function loadServiceStarRating() {
		Session::initIdle();
		if (isset($_POST['user_id'])) {
			$this -> model -> loadServiceStarRating($_POST['user_id']);
		}
	}

	public function loadReview() {
		Session::initIdle();
		if (isset($_POST['review_user_id']) && isset($_POST['review_result'])) {
			$data['user_id'] = $_POST['review_user_id'];
			$data['review_result'] = $_POST['review_result'];
			$this -> model -> loadReview($data);
		}
	}

	public function loadPersonReview() {
		Session::initIdle();
		Session::init();
		if (isset($_SESSION['client_id'])) {
			if (isset($_POST['review_user_id'])) {
				$data['user_id'] = $_POST['review_user_id'];
				$data['client_id'] = $_SESSION['client_id'];
				$this -> model -> loadPersonReview($data);
			}
		} else {
			echo '[]';
		}
	}

	public function sendReview() {
		Session::initIdle();
		Session::init();
		if (isset($_POST['review_content']) && isset($_SESSION['client_id'])) {
			$data['user_id'] = $_POST['review_user_id'];
			$data['client_id'] = $_SESSION['client_id'];
			$data['user_review_content'] = $_POST['review_content'];
			$data['user_review_active'] = 0;
			$data['user_review_clean'] = 0;
			$data['user_review_quality'] = 0;
			$data['user_review_staff'] = 0;
			$data['user_review_valuable'] = 0;
			$data['user_review_overall'] = 0;
			//print_r($data);
			$this -> model -> sendReview($data);
		}
	}

	public function loadListPromotion() {
		Session::initIdle();
		if (isset($_POST['user_id'])) {
			$this -> model -> loadListPromotion($_POST['user_id']);
		}
	}

	public function loadItemPromotion() {
		Session::initIdle();
		if (isset($_POST['id_promotion'])) {
			$this -> model -> loadItemPromotion($_POST['id_promotion']);
		}
	}

	public function sendRating() {
		Session::initIdle();
		Session::init();
		if (isset($_POST['review_user_id']) && isset($_POST['field']) && isset($_POST['rating_value']) && isset($_SESSION['client_id'])) {
			$data['user_id'] = $_POST['review_user_id'];
			$data['client_id'] = $_SESSION['client_id'];
			$data[$_POST['field']] = $_POST['rating_value'];
			$data['field'] = $_POST['field'];
			$this -> model -> sendRating($data);
		}
	}

	public function sendServiceRating() {
		Session::initIdle();
		Session::init();
		if (isset($_POST['user_service_id']) && isset($_POST['user_service_review_value']) && isset($_SESSION['client_id'])) {
			$data['user_service_id'] = $_POST['user_service_id'];
			$data['client_id'] = $_SESSION['client_id'];
			$data['user_service_review_value'] = $_POST['user_service_review_value'];
			$this -> model -> sendServiceRating($data);
		}
	}

	public function xhrGet_user_slide() {
		Session::initIdle();
		if (isset($_GET['user_id'])) {
			$user_id = $_GET['user_id'];
			$this -> model -> get_user_slide($user_id);
		}
	}

	public function loadFirstConsultingQuestion() {
		Session::initIdle();
		if (isset($_POST['user_id'])) {
			$_SESSION['rule_group'] = '';
			$this -> model -> loadFirstConsultingQuestion($_POST['user_id']);
		}
	}

	public function loadConsultingQuestion() {
		Session::initIdle();
		if (isset($_POST['question_service_type_id'])) {
			$data['question_service_type_id'] = $_POST['question_service_type_id'];
			$this -> model -> loadConsultingQuestion($data);
		}
	}

	public function consulting() {
		Session::initIdle();
		if (isset($_POST['fact_id'])) {
			$data['fact_id'] = $_POST['fact_id'];
			$this -> model -> consulting($data);
		}
	}

	public function loadAdviseService() {
		Session::initIdle();
		if (isset($_POST['user_id']) && isset($_POST['service_id'])) {
			$data['user_id'] = $_POST['user_id'];
			$data['service_id'] = $_POST['service_id'];
			$this -> model -> loadAdviseService($data);
		}
	}

	public function saveHobby() {
		Session::initIdle();
		if (isset($_POST['client_id']) && isset($_POST['service_type_id'])) {
			$data['client_id'] = $_POST['client_id'];
			$data['service_type_id'] = $_POST['service_type_id'];
			$data['hobby_answer'] = $_POST['hobby_answer'];
			$this -> model -> saveHobby($data);
		}
	}

	public function loadClientHobby() {
		Session::initIdle();
		if (isset($_POST['client_id']) && isset($_POST['service_type_id'])) {
			$data['client_id'] = $_POST['client_id'];
			$data['service_type_id'] = $_POST['service_type_id'];
			$this -> model -> loadClientHobby($data);
		}
	}
	
	public function loadClientHobbyRule() {
		Session::initIdle();
		if (isset($_POST['client_hobby_rule'])) {
			$data['client_hobby_rule'] = $_POST['client_hobby_rule'];
			$this -> model -> loadClientHobbyRule($data);
		}
	}
	/* imtoantran save comment */
	public function saveComment()
	{
		# code...
		Session::init();
		if(isset($_SESSION['client_id'])){
			$this -> model -> saveComment();
		}else{
			print json_encode(['error'=>'Cần phải đăng nhập để gửi bình luận']);
		}
		
	}
	/* imtoantran report spam */
	public function reportSpam()
	{
		# code...
		Session::init();
		print json_encode($this->model->reportSpam());
	}
	/* imtoantran report spam */

	/* imtoantran bookmark place start */
	public function bookmark(){
		Session::init();
		header('Content-Type: application/json');
		if(isset($_SESSION['client_id'])){
			echo json_encode($this->model->bookmark());
		}
	}
	/* imtoantran bookmark place stop */
}
?>