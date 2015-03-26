<?php
/**
 *
 */
class admincp_review extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/review/css/review.css');
		$this -> view -> script = array(URL . 'Views/admincp/review/js/review.js');
		$this -> view -> render_admincp('review/index');

	}

	public function loadReviewList() {
		Auth::handleAdminLogin();
		$this -> model -> loadReviewList();
	}

	/* imtoantran new review start */
	public function newReview(){
		Auth::handleAdminLogin();
		echo json_encode($this->model->loadReviews(-1));
	}
	/* imtoantran new review stop */

	/* imtoantran new review start */
	public function unverifiedReview(){
		Auth::handleAdminLogin();
		echo json_encode($this->model->loadReviews(0));
	}
	/* imtoantran new review stop */

	/* imtoantran verified review start */
	public function verifiedReview(){
		Auth::handleAdminLogin();
		echo json_encode($this->model->loadReviews(1));
	}
	/* imtoantran verified review stop */

	public function editReviewDetail($review_id) {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/review/css/review.css');
		$this -> view -> script = array(URL . 'Views/admincp/review/js/review.js');
		$this -> view -> script[] = URL . 'Views/admincp/review/js/review_replies_details.js';
		$this -> view -> review_id = $review_id;
		/* imtoantran load replies by user start*/
		$this->view->replies = $this->model->loadUserReplies($review_id);
		/* imtoantran load replies by user end*/
		$this -> view -> render_admincp('review/edit');
	}

	public function loadReviewDetailEdit() {
		Auth::handleAdminLogin();
		if (isset($_POST['review_id'])) {
			$data['review_id'] = $_POST['review_id'];
			$this -> model -> loadReviewDetailEdit($data['review_id']);
		}
	}

	public function editReview() {
		Auth::handleAdminLogin();
		if (isset($_POST['review_id'])) {
			$data['review_id'] = $_POST['review_id'];
			$this -> model -> editReview($data);
		}
	}

	public function deleteReview() {
		Auth::handleAdminLogin();
		if (isset($_POST['review_id'])) {
			$this -> model -> deleteReview($_POST['review_id']);
		}
	}

	/* imtoantran manage reply*/
	public function replies()
	{
		# code...
		Auth::handleAdminLogin();
		$this -> view -> style[] = URL . 'Views/admincp/review/css/review.css';
		$this -> view -> script[] = URL . 'Views/admincp/review/js/replies.js';
		$this -> view -> defaultStatus = $this->model->loadOption();
		$this -> view ->render_admincp('review/replies');
	}
	public function loadReplies($value='')
	{
		Auth::handleAdminLogin();
		print json_encode($this -> model -> loadReplies());
	}
	public function updateReply()
	{
		Auth::handleAdminLogin();
		# code...
		print json_encode($this -> model -> updateReply());
	}
	/* imtoantran manage reply*/
	public function saveOption()
	{
		Auth::handleAdminLogin();
		# code...
		print json_encode($this->model->saveOption());
	}
}
?>