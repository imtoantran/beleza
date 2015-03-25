
$(document).ready(function(){
/* imtoantran update replies verify  start*/
	$("#set-auto-verify").change(function(e) {
		$.ajax({
			url: URL+'admincp_review/saveOption',
			type: 'POST',
			dataType: 'JSON',
			data: {value: this.checked},
		})
			.done(function(response) {
				$("#auto-verify").fadeOut(function(){$(this).find("button").text(response.message);$(this).fadeIn()});
			})
			.fail(function() {

			})
			.always(function() {

			});
	});

	/* imtoantran update replies verify end*/
	// luuhoabk
	$('.btn-delete-script').on('click',function(){
		var dataTag = $(this).attr('data-name-script');
		$('#'+dataTag).val('');
	})

	$.ajax({
		url: URL +'admincp_setting/loadScript',
		type: 'POST',
		dataType: 'JSON',		
	})
	.done(function(data) {
		if(data.length >0){
			$.each(data, function(index, val) {
				$('#'+val.script_title+'-header').val(val.script_header);
				$('#'+val.script_title+'-footer').val(val.script_footer);
			});
		}
	})
	.fail(function() {
		console.log("setting error");
	})
	.always(function() {
		// console.log("complete");
	});
	

})	

// -----------------------------------------
function editPassword() {
	cfirm = confirm('Bạn có muốn đổi mật khẩu không?');
	if (cfirm == true) {
		$('#btn_edit_password').attr('disabled', true);
		$('#error_edit_password').fadeOut();
		$('div.done').fadeOut(function() {
			$('#edit_loading').fadeIn(function() {
				var admin_old_password = $('#admin_old_password').val();
				var admin_new_password = $('#admin_new_password').val();
				var admin_renew_password = $('#admin_renew_password').val();
				if (admin_old_password == '' || admin_new_password == '' || admin_renew_password == '') {
					$('#error_edit_password').text('Nhập đầy đủ các trường có (*).');
					$('#error_edit_password').fadeIn(function() {
						$('#edit_loading').fadeOut(function() {
							$('div.done').fadeIn();
							$('#btn_edit_password').attr('disabled', false);
						});
					});
				} else {
					if (admin_new_password != admin_renew_password) {
						$('#error_edit_password').text('Mật khẩu mới và lặp lại mật khẩu mới phải giống nhau.');
						$('#error_edit_password').fadeIn(function() {
							$('#edit_loading').fadeOut(function() {
								$('div.done').fadeIn();
								$('#btn_edit_password').attr('disabled', false);
							});
						});
					} else {
						$.ajax({
							url : URL + 'admincp_setting/editSetting',
							type : 'post',
							data : {
								admin_old_password : admin_old_password,
								admin_new_password : admin_new_password,
								admin_renew_password : admin_renew_password
							},
							success : function(response) {
								if (response == 200) {
									alert('Đổi password thành công !');
									var admin_old_password = $('#admin_old_password').val('');
									var admin_new_password = $('#admin_new_password').val('');
									var admin_renew_password = $('#admin_renew_password').val('');
									$('div#edit_loading').fadeOut(function() {
										$('div.done').fadeIn(function() {
											$('#btn_edit_password').attr('disabled', false);
										});
									});
								} else if (response == 0) {
									alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
									$('div#edit_loading').fadeOut(function() {
										$('div.done').fadeIn(function() {
											$('#btn_edit_password').attr('disabled', false);
										});
									});
								} else if (response == 800) {
									alert('Mật khẩu cũ không đúng !');
									$('div#edit_loading').fadeOut(function() {
										$('div.done').fadeIn(function() {
											$('#btn_edit_password').attr('disabled', false);
										});
									});
								}
							},
							complete : function() {
								$('#btn_edit_password').attr('disabled', false);
							}
						});
					}
				}
			});
		});
	}

}


//luuhoabk
function embedScript(typeScript, titleScript){
	var google = $('#'+titleScript+'-details');
	var header = google.find('#'+titleScript+'-header').val();
	var footer = google.find('#'+titleScript+'-footer').val();

	$.ajax({
			url: URL +'admincp_setting/embedScript',
			type: 'POST',
			dataType: 'JSON',
			data: {typeScript: typeScript, header: header, footer: footer},
		})
		.done(function(data) {

			if(data==0){
				alert('Kết nối chậm. Xin vui lòng thử lại.')
			}else{
				alert('Cập nhật Script '+titleScript+' thành công.')
			}
		})
		.fail(function() {
			console.log("service/setting/embedscript/error");
		})
		.always(function() {
			// console.log("complete");
		});			

	
}