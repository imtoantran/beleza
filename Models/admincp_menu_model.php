<?php

class Admincp_Menu_Model extends Model {
    function __construct() {
            parent::__construct();
    }
    /**
    * author:imtoantran 
    * load banner list
    */
    
    public function loadMenuList($value='')
    {
            # code...
            $sql = "SELECT * FROM menu";		
            $select = $this -> db -> select($sql);          
            return $select;
    }

    public function loadParentMenu($level=''){
            # code...
            $sql = "SELECT menu_id,menu_title FROM menu WHERE menu_level=".$level;		
            $select = $this -> db -> select($sql);          
            return $select;
    }

    public function loadMenuItem($data=''){
//            # code...
        $sql = "SELECT * FROM menu WHERE menu_id=".$data;		
        $select = $this -> db -> select($sql);          
        return $select;
    }

    public function addSaveMenu($data){
            # code...
            $sql = "INSERT INTO menu(menu_title, menu_icon, menu_link, menu_background, menu_level, menu_parent, menu_order, menu_enable)"
                    . "VALUE('".$data['menu_title']."', '".$data['menu_icon']."', '".$data['menu_link']."',"
                    . "'".$data['menu_background']."', '".$data['menu_level']."', '".$data['menu_parent']."', '".$data['menu_order']."', '".$data['menu_enable']."')";		

            $insert = $this -> db -> prepare($sql);
            $insert = $insert -> execute();
            return $insert;
    }

    public function updateSaveMenu($data) {
        # code...		           
        $arr = array('menu_title' =>$data['menu_title'], 'menu_icon' =>$data['menu_icon'],
            'menu_link' =>$data['menu_link'], 'menu_background' =>$data['menu_background'], 
            'menu_parent' =>$data['menu_parent'], 'menu_order' =>$data['menu_order'],
            'menu_enable' =>$data['menu_enable']);
        $select = $this->db->update('menu',$arr,'menu_id='.$data['menu_id']);      
        return $select;
    }

    public function deleteMenu($data){
            if(count($data) > 0){
                foreach($data as $k => $v){
                     $this->db->delete("menu","menu_id ='".$v."'");	
                } 
                return 1;
            }
            return 0;
        }
        
}
