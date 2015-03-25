<?php

/**
 *
 */
class admincp_banner extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/banner/css/banner.css');
		$this -> view -> script = array(URL . 'Views/admincp/banner/js/banner.js');
		$this -> view -> render_admincp('banner/index');
	}
	public function loadBannerList($value='')
	{
		Auth::handleAdminLogin();
		echo $this -> model -> loadBanners();		
	}
	public function loadSlides($id='')
	{
		# code...
		Auth::handleAdminLogin();
		echo $this -> model -> loadSlides($_POST['slider_id']);
	}
	public function loadAllSlides($id='')
	{
		# code...
		Auth::handleAdminLogin();
		echo $this -> model -> loadAllSlides($_POST['slider_id']);
	}
	public function loadSlide($slide_id='')
	{
		# code...
        if ($slide_id == '') {
            $slide_id = $_POST['slide_id'];
		}
		print json_encode($this->model->loadSlide($slide_id));
	}
	public function editBannerDetail($slider_id) {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/banner/css/banner.css');
		$this -> view -> script = array(URL . 'Views/admincp/banner/js/banner.js');
		$this -> view -> slider_id = $slider_id;
		$this -> view -> render_admincp('banner/edit');
	}
	function addBannerDetail() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/banner/css/banner.css');
		//$this -> view -> script = array(URL . 'Views/admincp/banner/js/banner.js');
		$this -> view -> render_admincp('banner/add');
	}
	public function editSlide($slide_id='')
	{
		Auth::handleAdminLogin();
		$css = $this->model->loadCss();		
		$inlineCss = '<style>';
		foreach ($css as $key => $value) {
			# code...			
			$cssClass[]=str_replace('.tp-caption.', '', $value['handle']);			
			$inlineCss.=$value['handle'].str_replace('\\','"',str_replace(',',';',str_replace('"',"",$value['params'])));
		}
		$inlineCss.="</style>";
		$this->view->inlineCss = $inlineCss;
		$this->view->cssClass = $cssClass;
		$ids = explode('-', $slide_id);
		$this -> view -> slider_id = $ids[1];
		$this -> view -> slide_id = $ids[0];
                
                
		$this -> view -> style = array(
			URL . 'Views/admincp/banner/css/banner.css',
			URL . 'Views/admincp/banner/css/editor.css',
			ASSETS.'plugins/rs-plugin/css/style.css',
			ASSETS.'plugins/rs-plugin/css/settings.css'			
			);
		$this -> view -> script = array(
			'https://code.jquery.com/ui/1.11.2/jquery-ui.min.js',
			ASSETS .'plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
			ASSETS .'plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',	
			//URL . 'Views/admincp/banner/js/banner.js',		
			URL . 'Views/admincp/banner/js/editor.js',
			URL . 'Views/admincp/banner/js/edit_slide.js',
			);
		$this -> view -> render_admincp('banner/editSlide');
	}
	public function saveSlide($value='')
	{
		Auth::handleAdminLogin();
		# code...
		$data = $_POST['data'];
		$this->model->saveSlide($data['slide_id'],json_encode($data['params']),$data['layers']);
	}
	public function revSlider($id)
	{
		# code...
		
	}
	public function upload($value='')
	{
		Auth::handleAdminLogin();
		$target_dir = "public/assets/revslider/images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$messages['success'][] = "OK - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$messages['error'][] = "File của bạn không phải là hình ảnh.";
				$uploadOk = 0;
			}
		}		
		//Check if file already exists
		if (file_exists($target_file)) {
			$messages['error'][] = "Hình ảnh này đã tồn tại.";
			$uploadOk = 0;
		}
		//Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			$messages['error'][] = "Dung lượng quá lớn.";
			$uploadOk = 0;
		}
		//Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			$messages['error'][] = "Chỉ cho phép JPG, JPEG, PNG & GIF.";
			$uploadOk = 0;
		}
		//Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$messages['error'][] = 'Hình ảnh không được upload.';
			print json_encode($messages);
		//if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$messages['success'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				print json_encode($messages);
				$this->model->upload($_FILES["fileToUpload"]["name"]);
			} else {
				$messages['error'][] = 'Có lỗi trong quá trình upload.';				
				print json_encode($messages);
			}
		}
	}
	public function loadCssContent()
	{
		# code...
		echo json_encode($this->model->loadCssContent($_POST['name']));
	}
	public function saveCss()
	{
		Auth::handleAdminLogin();
		# code...
		$this->model->saveCss($_POST['name'],$_POST['params']);
	}
	public function reloadCss()
	{
		$css = $this->model->loadCss();
		$inlineCss='<style>';
		foreach ($css as $key => $value) {
			# code...			
			$cssClass .=str_replace('.tp-caption.', '', $value['handle']);			
			$inlineCss.= ''.$value['handle'].str_replace('\\','"',str_replace(',',';',str_replace('"',"",$value['params']))).'';
		}
		$inlineCss.='</style>';
		echo $inlineCss;
	}
	public function addSlide()
	{
		Auth::handleAdminLogin();
		# code...
		$params = '{"image":"bp.jpg"}';
		$this->model->addSlide($_POST['slider_id'],$params);
	}
	public function delSlide($slide_id='')
	{
		Auth::handleAdminLogin();
		# code...
		$this->model->delSlide($_POST['slide_id']);
	}
	public function deleteImage($value='')
	{
		# code...
		Auth::handleAdminLogin();
		$this->model->deleteImage();
	}
}
