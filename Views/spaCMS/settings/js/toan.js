/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * @author imtoantran@gmail.com
 */
CKEDITOR.replace('user_description');

 $('#user_detail_form').on('submit', function(){
     CKEDITOR.instances.user_description.updateElement();
 });