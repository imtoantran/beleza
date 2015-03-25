<?php

	/**
	 * 
	 */
	class faq extends Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		////////////////////////////////// FAQ /////////////////////////////////////////
		function index() {
			Session::initIdle();
			$this->view->style = array(
				URL . 'Views/faq/css/faq.css'
			);

			$this->view->script = array(
				ASSETS . 'plugins/jquery-easypaginate/jquery.easypaginate.min.js',
				URL . 'Views/faq/js/faq.js'
			);

			$this->view->render('faq/index');
		}

		function goto_askQuestion() {
			Session::init();
			$faq_title = $_POST['faq_title'];

			Session::set('faq_title', $faq_title);

			return false;
		}


		function xhrGet_list_service_type() {
			$this->model->get_list_service_type();
		}

		function xhrGet_list_service() {
			$this->model->get_list_service();
		}

		function xhrGet_page_faq() {
			$this->model->get_page_faq();
		}
		
		/////////////////////////////////// FIND LOCATION /////////////////////////////////
		function find_location($xhr = false) {
			switch ($xhr) {
				case 'xhrGet_load_page':
					$this->model->get_load_page();
					break;

				case 'xhrGet_near_location':
					$this->model->get_near_location();
					break;

					
				default:
					$this->view->style = array(
						URL . 'Views/faq/find_location/css/find_location.css'
					);

					$this->view->script = array(
						'http://maps.google.com/maps/api/js?sensor=true',
						ASSETS . 'plugins/jquery-ui-map/ui/jquery.ui.map.js',
						ASSETS . 'plugins/jquery-ui-map/ui/jquery.ui.map.extensions.js',
						URL . 'Views/faq/find_location/js/find_location.js'
					);

					$this->view->render('faq/find_location/index');
					break;
			}
		}
		
		/////////////////////////////////// ASK QUESTION /////////////////////////////////
		function ask_question($xhr = false) {
			switch ($xhr) {
				case 'xhrGet_service_system':
					$this->model->get_service_system();
					break;

				case 'xhrInsert_question':
					$this->model->insert_question();
					break;
					
				default:
					$this->view->style = array(
						ASSETS . 'plugins/select2/select2.css',
						// ASSETS . 'plugins/jquery-multi-select/css/multi-select.css',
						URL . 'Views/faq/ask_question/css/ask_question.css'
					);

					$this->view->script = array(
						ASSETS . 'plugins/select2/select2.min.js',
						// ASSETS . 'plugins/jquery-multi-select/js/jquery.multi-select.js',
						URL . 'Views/faq/ask_question/js/ask_question.js'
					);

					$this->view->render('faq/ask_question/index');
					break;
			}

		}
		
		/////////////////////////////////// DETAIL QUESTION /////////////////////////////////
		function detail_question($question_id = false) {
			if ($question_id == '') {
				header('location:' . URL . 'faq');
			}

			$this->view->style = array(
				URL . 'Views/faq/detail_question/css/detail_question.css'
			);

			$this->view->script = array(
				ASSETS . 'plugins/jquery-moment/livestamp.min.js',
				URL . 'Views/faq/detail_question/js/detail_question.js'
			);

			$this->view->q_id = $question_id;

			$this->view->render('faq/detail_question/index');
			
		}

		function xhrGet_question() {
			$this->model->get_question();
		}

		function xhrGet_questions() {
			$this->model->get_questions();
		}

		function xhrGet_service_related() {
			$this->model->get_service_related();
		}

		function xhrInsert_answer_question() {
			Session::initIdle();
			$this->model->insert_answer_question();
		}

		function xhrGet_list_answer() {
			$this->model->get_list_answer();
		}

		function xhrInsert_comment_answer() {
			Session::initIdle();
			$this->model->insert_comment_answer();
		}

		function xhrUpdate_like() {
			Session::initIdle();
			$this->model->update_like();
		}

		function xhrCheck_login() {
			Session::initIdle();
			Session::init();
			$client_id = Session::get('client_id');

			if($client_id){
				echo 1;
			} else {
				echo 0;
			}
		}

		
		/////////////////////////////////// BEAUTY NEWS /////////////////////////////////
		function beauty_news($news_id = false) {
			if ($news_id == '') {
				header('location:' . URL . 'faq');
			}

			$this->view->style = array(
				URL . 'Views/faq/beauty_news/css/beauty_news.css'
			);

			$this->view->script = array(
				URL . 'Views/faq/beauty_news/js/beauty_news.js'
			);

			$this->view->n_id = $news_id;

			$this->view->render('faq/beauty_news/index');
		}

		function xhrGet_list_news() {
			$this->model->get_list_news();
		}

		function xhrGet_content_news() {
			$this->model->get_content_news();
		}

		function xhrGet_news_related() {
			$this->model->get_news_related();
		}
	}