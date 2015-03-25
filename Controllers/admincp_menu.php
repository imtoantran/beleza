<?php

/**
 *
 */
class admincp_menu extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        Auth::handleAdminLogin();
        $this->view->style = array(URL . 'Views/admincp/menu/css/menu.css');
        $this->view->script = array(URL . 'Views/admincp/menu/js/menu.js');
        $this->view->render_admincp('menu/index');
    }
    
    function loadMenuList() {
        Auth::handleAdminLogin();
        echo json_encode($this->model->loadMenuList());
    }

    function loadParentMenu() {
        Auth::handleAdminLogin();
        $level = isset($_POST['menu_level']) ? $_POST['menu_level'] : "";
        echo json_encode($this->model->loadParentMenu($level));
    }

    function loadMenuItem() {
        Auth::handleAdminLogin();
        $data = isset($_POST['menu_id']) ? $_POST['menu_id'] : "";
        echo json_encode($this->model->loadMenuItem($data));
    }

    function addNewMenu() {
        Auth::handleAdminLogin();
        $this->view->style = array(URL . 'Views/admincp/menu/css/menu.css');
        $this->view->script = array(URL . 'Views/admincp/menu/js/menu.js');
        $this->view->render_admincp('menu/add');
    }

    function editMenu($menu_id) {
        Auth::handleAdminLogin();
        $this->view->style = array(URL . 'Views/admincp/menu/css/menu.css');
        $this->view->script = array(URL . 'Views/admincp/menu/js/menu.js');
        $this->view->menu_id = $menu_id;
        $this->view->render_admincp('menu/edit');
    }

    function addSaveMenu() {
        Auth::handleAdminLogin();
        $data['menu_title'] = $_POST['menu_title'];
        $data['menu_icon'] = $_POST['menu_icon'];
        $data['menu_link'] = $_POST['menu_link'];
        $data['menu_background'] = $_POST['menu_background'];
        $data['menu_level'] = $_POST['menu_level'];
        $data['menu_parent'] = $_POST['menu_parent'];
        $data['menu_order'] = $_POST['menu_order'];
        $data['menu_enable'] = $_POST['menu_enable'];

        echo ($this->model->addSaveMenu($data));
    }

    function updateSaveMenu() {
        Auth::handleAdminLogin();
        $data['menu_id'] = $_POST['menu_id'];
        $data['menu_title'] = $_POST['menu_title'];
        $data['menu_icon'] = $_POST['menu_icon'];
        $data['menu_link'] = $_POST['menu_link'];
        $data['menu_background'] = $_POST['menu_background'];
        $data['menu_level'] = $_POST['menu_level'];
        $data['menu_parent'] = $_POST['menu_parent'];
        $data['menu_order'] = $_POST['menu_order'];
        $data['menu_enable'] = $_POST['menu_enable'];

        echo ($this->model->updateSaveMenu($data));
    }

    public function uploadImage($value = '') {
        if (isset($_POST['submit'])) { // Người dùng đã ấn submit
            $path = "public/assets/img/menu/"; // file sẽ lưu vào thư mục data
            $tmp_name = $_FILES['menu_background']['tmp_name'];
            $name = $_FILES['menu_background']['name'];
            $type = $_FILES['menu_background']['type'];
            $size = $_FILES['menu_background']['size'];
            $filename = $path . $name;

            if ($name != NULL) { // Đã chọn file
                // Tiến hành code upload file
                if ($type == "image/jpeg" || $type == "image/png" || $type == "image/gif") {
                    // là file ảnh
                    // Tiến hành code upload    
                    if ($size > 1048576) {
                        //File khong duoc lon hon 1mb
                        $messages['error'] = 1;
                    } else {
                        if (file_exists($filename)) {
                            //File nay da ton tai.
                            $messages['error'] = 2;
                        } else {
                            // Upload file
                            move_uploaded_file($tmp_name, $filename);
                            //Upload file thanh cong
                            $messages['error'] = 0;
                            $messages['url'] = $path . $name;
                        }
                    }
                } else {
                    // kieu file khong hop le
                    $messages['error'] = 3;
                }
            } else {
                //Vui long chon file
                $messages['error'] = 4;
            }
            echo json_encode($messages);
        }
    }

    public function deleteMenu() {
        $data = $_POST['arr_check'];
        echo ($this->model->deleteMenu($data));
    }
    
    //get list image from folder image menu
    public function getListImage(){
        $url = getcwd().'/public/assets/img/menu';
        if (is_dir($url)) {
            $files1 = scandir($url);
            $files['img'] = array_merge(array_diff($files1, array(".", "..")));
            $files['url'][] = $url;
            echo json_encode($files);
        }else{
             echo 0;
        }
    }
    
    public function deleteImage(){
        if(isset($_POST['img_menu']) && $_POST['img_menu']!=""){
            $img = $_POST['img_menu'];
            $url = getcwd().'/public/assets/img/menu/'.$img;           
            if(file_exists($url)){
                echo unlink($url);
            }else{
                echo 0;
            }           
        }else{
            echo 0;
        }

        
    }

}
