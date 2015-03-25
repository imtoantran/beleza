$(document).ready(function() {
	$('#hidden_change_pass').on('click', function() {

		if ($('#client_change_pass').is(':hidden') == false) {
			$('#client_change_pass').slideUp();
			$('#change_pass_btn').children('span').remove();
			$('#client_old_pass').val('');
			$('#client_pass_1').val('');
			$('#client_pass_2').val('');
		} else {
			$('#client_change_pass').slideDown();
			$('body,html').animate({
				scrollTop : ($(document).height() * 50 / 100)
			});
		}
	});
	loadUserDetail();
	$('#client_name_edit_btn, #client_phone_edit_btn, #client_note_edit_btn, #client_birth_edit_btn').tooltip({
		placement : 'right',
		html : true,
		container : 'body',
		delay : 0
	});
	$('#client_name, #client_phone, #client_note, #client_birth').tooltip({
		placement : 'left',
		html : true,
		container : 'body',
		delay : 0
	});
	$('#client_name_edit_btn').on('click', function() {
		if ($('#client_name_edit_btn').hasClass('fa-save')) {
			$('#client_name_edit_btn').removeClass('fa-save');
			$('#client_name_edit_btn').addClass('fa-pencil');
			$('#client_name').attr('readonly', true);
			editName();
		} else {
			$('#client_name_edit_btn').removeClass('fa-pencil');
			$('#client_name_edit_btn').addClass('fa-save');
			$('#client_name').attr('readonly', false);
		}
	});
	$('#client_phone_edit_btn').on('click', function() {
		if ($('#client_phone_edit_btn').hasClass('fa-save')) {
			$('#client_phone_edit_btn').removeClass('fa-save');
			$('#client_phone_edit_btn').addClass('fa-pencil');
			$('#client_phone').attr('readonly', true);
			editPhone();
		} else {
			$('#client_phone_edit_btn').removeClass('fa-pencil');
			$('#client_phone_edit_btn').addClass('fa-save');
			$('#client_phone').attr('readonly', false);
		}
	});
	$('#client_note_edit_btn').on('click', function() {
		if ($('#client_note_edit_btn').hasClass('fa-save')) {
			$('#client_note_edit_btn').removeClass('fa-save');
			$('#client_note_edit_btn').addClass('fa-pencil');
			$('#client_note').attr('readonly', true);
			editNote();
		} else {
			$('#client_note_edit_btn').removeClass('fa-pencil');
			$('#client_note_edit_btn').addClass('fa-save');
			$('#client_note').attr('readonly', false);
		}
	});
	$('#client_birth_edit_btn').on('click', function() {
		if ($('#client_birth_edit_btn').hasClass('fa-save')) {
			$('#client_birth_edit_btn').removeClass('fa-save');
			$('#client_birth_edit_btn').addClass('fa-pencil');
			$('#client_birth').attr('disabled', true);
			$("#client_birth").datepicker("destroy");
			editBirth();
		} else {
			$('#client_birth_edit_btn').removeClass('fa-pencil');
			$('#client_birth_edit_btn').addClass('fa-save');
			$('#client_birth').attr('disabled', false);
			$("#client_birth").datepicker("destroy");
		}
	});
});
function loadUserDetail() {
	$('#gear').addClass('fa-spin');
	$.ajax({
		url : URL + 'clientsetting/loadUserDetail',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			$.each(response[0], function(key, value) {
				if (key == 'client_sex') {
					if (value == 1) {
						$('p#' + key).prepend('<i class="fa fa-male"></i>');
					} else if (value == 0) {
						$('p#' + key).prepend('<i class="fa fa-female"></i>');
					}
				} else if (key == 'client_name' || key == 'client_phone' || key == 'client_note'|| key == 'client_birth') {
					$('#' + key).val(value);
				} else {
					$('p#' + key).prepend(value);
				}
			});
			$('.fileinput-preview').html('<img src="' + URL + response[0]['client_avatar'] + '" />');
		},
		complete : function() {
			setTimeout(function(){
				$('#gear').removeClass('fa-spin');
			},1000);
		}
	});
}

function editBirth() {
	var client_birth = $('#client_birth').val();
	//alert(client_birth);
	$.ajax({
		url : URL + 'clientsetting/editBirth',
		type : 'post',
		data : {
			client_birth : client_birth
		},
		success : function(response) {
			//console.log(response);
			if(response == 0){
				$('#client_birth').css('border-left','3px solid #cc3333');
			}else if(response == 1){
				$('#client_birth').css('border-left','');
			}
		}
	});

}

function editNote() {
	var client_note = $('#client_note').val();
	$.ajax({
		url : URL + 'clientsetting/editNote',
		type : 'post',
		data : {
			client_note : client_note
		},
		success : function(response) {
			//console.log(response);
			if(response == 0){
				$('#client_note').css('border-left','3px solid #cc3333');
			}else if(response == 1){
				$('#client_note').css('border-left','');
			}
		}
	});

}

function editName() {
	var client_name = $('#client_name').val();
	$('#client_name_edit').children('span').remove();
	$.ajax({
		url : URL + 'clientsetting/editUserDetail',
		type : 'post',
		data : {
			client_name : client_name
		},
		success : function(response) {
			//console.log(response);
			if(response == 0){
				$('#client_name').css('border-left','3px solid #cc3333');
			}else if(response == 1){
				$('#client_name').css('border-left','');
			}
		}
	});

}

function editPhone() {
	var client_phone = $('#client_phone').val();
	$.ajax({
		url : URL + 'clientsetting/editUserDetail',
		type : 'post',
		data : {
			client_phone : client_phone
		},
		success : function(response) {
			//console.log(response);
			if(response == 0 || response == -2 || response == -1){
				$('#client_phone').css('border-left','3px solid #cc3333');
			}else if(response == 1){
				$('#client_phone').css('border-left','');
			}
		}
	});
}

function changePass() {
	var check_change_pass;
	$('#change_pass_btn').children('span').remove();
	$('#change_pass_btn').append('<i class="fa fa-refresh fa-spin"></i>');
	$.ajax({
		url : URL + 'clientsetting/changePass',
		type : 'post',
		data : {
			client_old_pass : $('#client_old_pass').val(),
			client_pass_1 : $('#client_pass_1').val(),
			client_pass_2 : $('#client_pass_2').val(),
		},
		success : function(response) {
			// console.log(response);
			if (response == -2) {
				$('#change_pass_btn').children('i').remove();
				$('#change_pass_btn').append('<span class="text-danger"><small><i> Mật khẩu cũ không đúng!</small></i></span>');
			} else if (response == -1) {
				$('#change_pass_btn').children('i').remove();
				$('#change_pass_btn').append('<span class="text-danger"><small><i> Không được để rỗng các ô nhập!</small></i></span>');
			} else if (response == 0) {
				$('#change_pass_btn').children('i').remove();
				$('#change_pass_btn').append('<span class="text-danger"><small><i> Mật khẩu mới phải lớn > hoặc = 6 ký tự!</small></i></span>');
			} else if (response == 1) {
				$('#change_pass_btn').children('i').remove();
				$('#change_pass_btn').append('<span class="text-danger"><small><i> Mật khẩu nhập lại không đúng!</small></i></span>');
			} else if (response == 2) {
				$('#change_pass_btn').children('i').remove();
				$('#change_pass_btn').append('<span class="text-danger"><small><i> Không thể đổi mật khẩu!</small></i></span>');
			} else if (response == 200) {
				$('#change_pass_btn').children('i').remove();
				$('#change_pass_btn').append('<span class="text-success"><small><i> Đổi mật khẩu thành công!</small></i></span>');
				setTimeout(function() {
					$('#client_change_pass').slideUp();
					$('#change_pass_btn').children('span').remove();
					$('#client_old_pass').val('');
					$('#client_pass_1').val('');
					$('#client_pass_2').val('');
				}, 400);
			}
		},
		complete : function() {
		}
	});
}

function update_avatar() {
	var client_avatar = document.getElementById('fileinput_client_avatar');

	var data_form = new FormData();
	data_form.append('client_avatar', client_avatar.files[0]);

	$.ajax({
		url : URL + 'clientsetting/update_avatar',
		type : 'post',
		data : data_form,
		async: false,
		cache: false,
        contentType: false,
        processData: false,
		success : function(response) {
			if (response == 200) {
				jumpToOtherPage(URL + 'clientsetting');
			} else {
				
			}
		}
	});

}