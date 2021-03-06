<?php

	/**
	 * 
	 */
	class SpaCMS extends Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index() {
			Session::init();
			if(Session::get('spaCMS')) {
				header('location:' . URL . 'spaCMS/home');
			} else {
				$this->view->render_spaCMS('index', true);
			}
		}
		function loginSpaToAdmin(){
			$this->model->loginSpaToAdmin();
		}

		function login() {
			$this->model->login();
		}

		function logout() {
			$this->model->logout();
		}
		
		function home($xhr = false) {
			Auth::handleSpaCMSLogin();
			switch ($xhr) {
				case 'xhrGet_notification':
				$this->model->get_notification();
				break;

				case 'xhrGet_redeem_voucher':
				$this->model->get_redeem_voucher();
				break;

				case 'xhrGet_redeem_gvoucher':
				$this->model->get_redeem_gvoucher();
				break;

				case 'xhrUpdate_e_voucher':
				$this->model->update_e_voucher();
				break;

				case 'xhrUpdate_gift_voucher':
				$this->model->update_gift_voucher();
				break;

				case 'xhrGet_monthly_sales':
				$this->model->get_monthly_sales();
				break;

				case 'xhrGet_top_services_booking':
				$this->model->get_top_services_booking();
				break;

				case 'xhrGet_top_services_evoucher':
				$this->model->get_top_services_evoucher();
				break;

				case 'xhrGet_appointment_not_confirm':
				$this->model->get_appointment_not_confirm();
				break;

				default:
				$this->view->style = array(
					URL . 'Views/spaCMS/home/css/spaCMS_home.css'
					);

				$this->view->script = array(
					URL . 'Views/spaCMS/home/js/spaCMS_home.js'
					);

				$this->view->render_spaCMS('home/index');
				break;
			}

		}

		function menu($xhr = false) {
			Auth::handleSpaCMSLogin();
			switch ($xhr) {
				case 'xhrGet_service_system':
				$this->model->get_service_system();
				break;

				case 'xhrGetOM_add_group':
				$this->model->getOM_add_group();
				break;

				case 'xhrGet_group_user_service':
				$this->model->get_group_user_service();
				break;

				case 'xhrInsert_user_service':
				$this->model->insert_user_service();
				break;

				case 'xhrUpdate_user_service':
				$this->model->update_user_service();
				break;

				case 'xhrDelete_user_service':
				$this->model->delete_user_service();
				break;

				case 'xhrInsert_group_service':
				$this->model->insert_group_service();
				break;

				case 'xhrUpdate_group_service':
				$this->model->update_group_service();
				break;

				case 'xhrDelete_group_service':
				$this->model->delete_group_service();
				break;

				case 'xhrGet_user_service_featured':
				$this->model->get_user_service_featured();
				break;

				case 'xhrInsert_user_service_featured':
				$this->model->insert_user_service_featured();
				break;

				case 'xhrUpdate_user_service_featured':
				$this->model->update_user_service_featured();
				break;

				case 'xhrDelete_user_service_featured':
				$this->model->delete_user_service_featured();
				break;

				case 'xhrGet_user_service_description':
				$this->model->get_user_service_description();
				break;

				default:
				$this->view->style = array(
					ASSETS . 'plugins/image-manager/css/image-manager.min.css',
					URL . 'Views/spaCMS/menu/css/spaCMS_menu.css'
					);

				/* imtoantran add ckeditor*/
				$this->view->script = array(
					ASSETS . 'plugins/ckeditor/ckeditor.js',
					ASSETS . 'plugins/image-manager/js/image-manager.min.js',
					URL . 'Views/spaCMS/menu/js/toan.js',                                                
					URL . 'Views/spaCMS/menu/js/spaCMS_menu.js',                                                
					);
				/* imtoantran add ckeditor*/

				$this->view->render_spaCMS('menu/index');
				break;
			}
		}

		function calendar($xhr = false) {
			Auth::handleSpaCMSLogin();
			switch ($xhr) {
				case 'xhrGet_calendar':
				$this->model->get_calendar();
				break;
				
				case 'xhrGet_appointment':
				$this->model->get_appointment();
				break;

				case 'xhrGet_booking':
				$this->model->get_booking();
				break;

				case 'xhrGet_user_service':
				$this->model->get_user_service();
				break;

				case 'xhrInsert_appointment':
				$this->model->insert_appointment();
				break;

				case 'xhrGet_user_open_hour':
				$this->model->get_user_open_hour();
				break;

				case 'xhrGet_appointment_confirmed':
				$this->model->get_appointment_confirmed();
				break;

				case 'xhrGet_appointment_for_edit':
				$this->model->get_appointment_for_edit();
				break;

				case 'xhrDelete_appointment':
				$this->model->delete_appointment();
				break;

				case 'xhrUpdate_appointment_status':
				$this->model->update_appointment_status();
				break;

				case 'xhrUpdate_appointment_client':
				$this->model->update_appointment_client();
				break;

				case 'xhrUpdate_appointment':
				$this->model->update_appointment();
				break;

				case 'xhrUpdate_appointment_is_confirm':
				$this->model->update_appointment_is_confirm();
				break;

				case 'xhrCheck_appointment_is_confirmed':
				$this->model->check_appointment_is_confirmed();
				break;

				case 'xhrGetTimeAutoConfirmSpa':
				$this->model->get_time_auto_confirm_spa();
				break;

				case 'xhrGet_calendar_search':
				$this->model->get_calendar_search();
				break;

				case 'xhrGet_appointment_client_name':
				$this->model->get_appointment_client_name();
				break;

				case 'xhrUpdate_appointment_note':
					$this->model->update_appointment_note();
					break;

				default:
				$this->view->style = array(
					ASSETS . 'plugins/fullcalendar-2.1.0-beta2/fullcalendar.css',
					URL . 'Views/spaCMS/calendar/css/spaCMS_calendar.css'
						// URL . 'public/assets/plugins/fullcalendar-2.1.0-beta2/fullcalendar.print.css'
					);

				$this->view->script = array(
					ASSETS . 'plugins/fullcalendar-2.1.0-beta2/fullcalendar.min.js',
						// ASSETS . 'plugins/fullcalendar-2.1.0-beta2/lang/vi.js',
						// ASSETS . 'plugins/drags/drags.js',
					ASSETS . 'js/core/app.js',
					URL . 'Views/spaCMS/calendar/js/spaCMS_calendar.js'
					);

				$this->view->render_spaCMS('calendar/index');
				break;
			}
		}	

		function reports($xhr = false) {
			Auth::handleSpaCMSLogin();

			switch ($xhr) {
				// case 'xhrGet_booking_detail':
				// 	$this->model->get_booking_detail();
				// 	break;

				case 'xhrGet_sale_report':
				$this->model->get_sale_report();
				break;

				case 'xhrGet_evoucher_report':
				$this->model->get_evoucher_report();
				break;

				case 'xhrGet_evoucher_report_export_excel':
				$this->model->get_evoucher_report_export_excel();
				break;

				case 'xhrGet_booking_report':
				$this->model->get_booking_report();
				break;

				case 'xhrGet_booking_report_export_excel':
					$this->model->get_booking_report_export_excel();
					break;

				case 'xhrGet_client_report':
					$this->model->get_client_report();
					break;

				case 'xhrGet_client_report_export_excel':
					$this->model->get_client_report_export_excel();
					break;

				case 'xhrGet_giftvoucher_report':
					$this->model->get_giftvoucher_report();
					break;

				case 'xhrGet_giftvoucher_report_export_excel':
					$this->model->get_giftvoucher_report_export_excel();
					break;
					
				default:
				$this->view->style = array(
					ASSETS . 'plugins/data-tables/DT_bootstrap.css',
					ASSETS . 'plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
					ASSETS . 'css/style-metronic.css',
					ASSETS . 'css/style.css',
					ASSETS . 'css/style-responsive.css',
					ASSETS . 'css/plugins.css',
					ASSETS . 'css/custom.css',
					URL . 'Views/spaCMS/reports/css/spaCMS_reports.css'
					);

				$this->view->script = array(
					ASSETS . 'plugins/data-tables/jquery.dataTables.js',
					ASSETS . 'plugins/data-tables/DT_bootstrap.js',
					ASSETS . 'js/core/app.js',
					ASSETS . 'js/core/datatable.js',
						// ASSETS . 'plugins/bootstrap-daterangepicker/moment.min.js',
					ASSETS . 'plugins/bootstrap-daterangepicker/daterangepicker.js',
					ASSETS . 'js/spaCMS/index.js',
					URL . 'Views/spaCMS/reports/js/spaCMS_reports.js'
					);

				$this->view->render_spaCMS('reports/index');
				break;
			}			
		}	

		function settings( $xhr = false ) {
			Auth::handleSpaCMSLogin();

			switch ($xhr) {
				case 'xhrGet_country':
				$this->model->get_country();
				break;

				case 'xhrGet_city':
				$this->model->get_city();
				break;

				case 'xhrGet_district':
				$this->model->get_district();
				break;

				// case 'xhrGet_type_business':
				// 	$this->model->get_type_business();
				// 	break;

				case 'xhrGet_user_detail':
				$this->model->get_user_detail();
				break;
				
				case 'xhrUpdate_user_detail':
				$this->model->update_user_detail();
				break;	

				case 'xhrGet_user_open_hour':
				$this->model->get_user_open_hour();
				break;

				case 'xhrUpdate_user_open_hour':
				$this->model->update_user_open_hour();
				break;

				case 'xhrGet_user_is_use_voucher':
				$this->model->get_user_is_use_voucher();
				break;

				case 'xhrUpdate_user_is_use_voucher':
				$this->model->update_user_is_use_voucher();
				break;

				case 'xhrGet_user_company':
				$this->model->get_user_company();
				break;

				case 'xhrUpdate_user_company':
				$this->model->update_user_company();
				break;

				case 'xhrGet_user_bank_acc':
				$this->model->get_user_bank_acc();
				break;

				case 'xhrUpdate_user_bank_acc':
				$this->model->update_user_bank_acc();
				break;

				case 'xhrGet_user_slide':
				$this->model->get_user_slide();
				break;

				case 'xhrUpdate_user_notification':
				$this->model->update_user_notification();
				break;

				case 'xhrGet_user_notification_email':
				$this->model->get_user_notification_email();
				break;

				case 'xhrUpdate_user_password':
				$this->model->update_user_password();
				break;

				case 'xhrGet_user_is_use_gvoucher':
				$this->model->get_user_is_use_gvoucher();
				break;

				case 'xhrGet_user_limit_before_booking':
				$this->model->get_user_limit_before_booking();
				break;

				case 'xhrGet_user_is_use_evoucher':
				$this->model->get_user_is_use_evoucher();
				break;

				case 'xhrGet_user_is_use_appointment':
				$this->model->get_user_is_use_appointment();
				break;

				case 'xhrUpdate_online_booking':
				$this->model->update_online_booking();
				break;

				case 'xhrGet_user_map':
				$this->model->get_user_map();
				break;

				case 'xhrUpdate_user_map':
				$this->model->update_user_map();
				break;

				default:
				$this->view->style = array(
					ASSETS . 'plugins/image-manager/css/image-manager.min.css',
					URL . 'Views/spaCMS/settings/css/spaCMS_settings.css'
					);

				/* imtoantran add ckeditor*/
				$this->view->script = array(
					'https://maps.googleapis.com/maps/api/js?key=AIzaSyBUxUNFuJ09fVcA24HZcEq0gwxs37ESDo4&language=vi-VI',
					ASSETS . 'plugins/ckeditor/ckeditor.js',
					ASSETS . 'plugins/image-manager/js/image-manager.min.js',
					URL . 'Views/spaCMS/settings/js/toan.js',                                                
					URL . 'Views/spaCMS/settings/js/spaCMS_settings.js'
					);
				/* imtoantran add ckeditor*/

				$this->view->render_spaCMS('settings/index');
				break;
			}
		}		
		
				// luuhoabk - promotion
		function promotion($xhr = false) {
			Auth::handleSpaCMSLogin();
			switch ($xhr) {
				case 'xhrLoad_promotion_list':
					$this->model->load_promotion_list();
					break;

				case 'xhrLoad_promotion_item':
					$this->model->load_promotion_item();
					break;

				case 'xhrInsert_promotion_item':
					$this->model->insert_promotion_item();					
					break;

				case 'xhrDelete_promotion_item':
					$this->model->delete_promotion_item();					
					break;
				case 'xhrPublish_promotion_item':
					$this->model->publish_promotion_item();					
					break;

				case 'xhrUpdate_promotion_item':
					$this->model->update_promotion_item();					
					break;
				case 'xhrLoad_promotion_publish':
					$this->model->load_promotion_publish();					
					break;

					
				default:
					$this->view->style = array(
						ASSETS . 'plugins/image-manager/css/image-manager.min.css',
						URL . 'Views/spaCMS/promotion/css/spaCMS_promotion.css'
					);

					$this->view->script = array(						
						ASSETS . 'plugins/image-manager/js/image-manager.min.js',
						ASSETS . 'plugins/ckeditor/ckeditor.js',
						URL . 'Views/spaCMS/promotion/js/spaCMS_promotion.js'
					);

					$this->view->render_spaCMS('promotion/index');
					break;
			}
		}//end promotion	
		
                /**
                 * @author imtoantran
                 * @description add review management for spaCMS
                 */
                function reviews($action = false) {
                    Auth::handleSpaCMSLogin();
                    switch ($action){
                        case 'loadReplies':
                            print json_encode($this->model->loadReplies());
                            break;
                        case 'saveReply':
                            print json_encode($this->model->saveReply());
                            break;
                        default :
                            $this->view->data = $this->model->loadReviews();
                            $this->view->script = [
                                ASSETS . 'plugins/data-tables/jquery.dataTables.js', 
                                ASSETS . 'plugins/data-tables/DT_bootstrap.js', 
                                URL . 'Views/spaCMS/reviews/js/reviews.js', 
                            ];
                            $this -> view -> style[] = ASSETS."plugins/data-tables/DT_bootstrap.css";
                            $this -> view -> style[] = URL."Views/spaCMS/reviews/css/reviews.css";
                            $this->view->render_spaCMS('reviews/index');
                            breaak;
                    }
                    
                }
                
}
