/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * @author imtoantran@gmail.com
 */
 jQuery(document).ready(function($) {
CKEDITOR.config.entities = false;
 	$('#editUserServices_modal').on('shown.bs.modal', function (e) {
 		CKEDITOR.replace('user_description_edit',{allowedContent:true, filter:false,});
 	});
 	/* destroy instance */
 	$('#editUserServices_modal').on('hidden.bs.modal', function (e) {
 		CKEDITOR.instances.user_description_edit.destroy();
 	});
 	$('#addUserServices_modal').on('shown.bs.modal', function (e) {
 		CKEDITOR.replace('user_description_add',{allowedContent:true, filter:false,});
 	});
 	/* destroy instance */
 	$('#addUserServices_modal').on('hidden.bs.modal', function (e) {
 		CKEDITOR.instances.user_description_add.destroy();
 	});

 });