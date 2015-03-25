$(document).ready(function() {
	if (IS_INDEX == 1 && IS_ADD == 0 && IS_EDIT == 0) {
		loadClientList();
		oTable = $('#client_list').dataTable({
			"oLanguage" : {
				"sZeroRecords" : "Không có dữ liệu nào cả.",
				"sSearch" : "Tìm kiếm: ",
				"sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
				"sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
				"sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
			}
		});
	}
	if (IS_INDEX == 0 && IS_ADD == 1 && IS_EDIT == 0) {

	}
	if (IS_INDEX == 0 && IS_ADD == 0 && IS_EDIT == 1) {
		loadClientDetailEdit();
	}
	$('input:radio[name="client_sex"]').on('change', function() {
		if ($('.client_sex').is(':checked')) {
			CLIENT_SEX = $(this).val();
		}
		// alert(CLIENT_SEX);
	});

	// client active load
	var client = $('#client_is_active');
	
	if($(client).val() == 0){
			$(client).css('color','red');
		}else{
			$(client).css('color','#9fac04');
		}
	$(client).find('option').css('color','#4f4f4f');

	// client active change
	$('#client_is_active').on('change', function(){
		if($(this).val() == 0){
			$(this).css('color','red');
		}else{
			$(this).css('color','#9fac04');
		}
		$(this).find('option').css('color','#4f4f4f');
	})
});

function addClientDetail() {
	jumpToOtherPage(URL + 'admincp_client/addClientDetail');
}

function returnToClient() {
	jumpToOtherPage(URL + 'admincp_client');
}

function loadClientList() {
	$.ajax({
		url : URL + 'admincp_client/loadClientList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			oTable.fnClearTable();
			oTable.fnAddData(response);
		},
		complete : function() {
			$("#client_list").delegate("tbody tr", "click", function() {
				var client_id = $(this).find('td').eq(0).text();
				// console.log(user_id);
				jumpToOtherPage(URL + 'admincp_client/editClientDetail/' + client_id);
			});
		}
	});
}

function saveClient() {
	$('#error_add_client').fadeOut();
	$('div.done').fadeOut(function() {
		$('div.s-loading').fadeIn(function() {
			var e_mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var client_name = $('#client_name').val();
			var client_email = $('#client_email').val();
			var check = e_mail.test(client_email);
			var client_phone = $('#client_phone').val();
			var client_username = $('#client_username').val();
			var client_pass = $('#client_pass').val();
			var client_is_active = $('#client_is_active').val();
			if (client_name == '' || client_email == '' || client_phone == '' || client_username == '' || client_pass == '') {
				$('#error_add_client').text('Nhập đầy đủ các trường có (*)');
				$('#error_add_client').fadeIn(function() {
					$('div.s-loading').fadeOut(function() {
						$('div.done').fadeIn();
					});
				});
			} else {
				if (check == true) {
					$.ajax({
						url : URL + 'admincp_client/saveClient',
						type : 'post',
						data : {
							client_name : client_name,
							client_email : client_email,
							client_phone : client_phone,
							client_username : client_username,
							client_pass : client_pass,
							client_is_active : client_is_active,
							client_sex : CLIENT_SEX,
						},
						success : function(response) {
							if (response == 200) {
								alert('Thêm người dùng thành công');
								jumpToOtherPage(URL + 'admincp_client');
							} else {
								$('#error_add_client').text('Thêm thất bại, username hoặc email đã tồn tại!');
								$('#error_add_client').fadeIn(function() {
									$('div.s-loading').fadeOut(function() {
										$('div.done').fadeIn();
									});
								});
							}
						},
						complete : function() {

						}
					});
				} else {
					$('#error_add_client').text('Định dạng e-mail không đúng!');
					$('#error_add_client').fadeIn(function() {
						$('div.s-loading').fadeOut(function() {
							$('div.done').fadeIn();
						});
					});
				}
			}
		});
	});
}

function loadClientDetailEdit() {
	$.ajax({
		url : URL + 'admincp_client/loadClientDetailEdit',
		type : 'post',
		dataType : 'json',
		data : {
			client_id : CLIENT_ID
		},
		success : function(response) {
			if (response[0] != null) {
				$.each(response[0], function(key, value) {
					if (key == 'client_sex') {
						if (value == 1) {
							$('#client_sex_male').prop('checked', 'checked');
							CLIENT_SEX = 1;							
						}
					}
					$('#' + key).val(value);

				});
			} else {
				$('#main_detail').html('<div class="alert alert-warning"><h3><b>Cảnh báo!</b></h3><span>Người dùng không tồn tại</span></div>');
			}
		},
		complete : function() {
			
	// client active load
	var client = $('#client_is_active');
	if($(client).val() == 0){
			$(client).css('color','red');
		}else{
			$(client).css('color','#9fac04');
		}
	$(client).find('option').css('color','#4f4f4f');
		}
	});
}

function editClient() {
	cfirm = confirm('Bạn có muốn sửa không?');
	if (cfirm == true) {
		$('#btn_edit_client').attr('disabled', true);
		$('#btn_delete_client').attr('disabled', true);
		$('#error_edit_client').fadeOut();
		$('div.done').fadeOut(function() {
			$('#edit_loading').fadeIn(function() {
				var e_mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var client_name = $('#client_name').val();
				var client_email = $('#client_email').val();
				var check = e_mail.test(client_email);
				var client_phone = $('#client_phone').val();
				var client_is_active = $('#client_is_active').val();
				if (client_name == '' || client_phone == '') {
					$('#error_edit_client').text('Nhập đầy đủ các trường có (*)');
					$('#error_edit_client').fadeIn(function() {
						$('#edit_loading').fadeOut(function() {
							$('div.done').fadeIn();
							$('#btn_edit_client').attr('disabled', false);
							$('#btn_delete_client').attr('disabled', false);
						});
					});
				} else {
					if (check == true) {
						$.ajax({
							url : URL + 'admincp_client/editClient',
							type : 'post',
							data : {
								client_id : CLIENT_ID,
								client_name : client_name,
								client_is_active : client_is_active,
								client_phone : client_phone,
								client_sex : CLIENT_SEX,
							},
							success : function(response) {
								if (response == 200) {
									alert('Sửa thành công !');
									$('div#edit_loading').fadeOut(function() {
										$('div.done').fadeIn(function() {
											jumpToOtherPage(URL + 'admincp_client');
										});
									});
								} else {
									alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
									$('div#edit_loading').fadeOut(function() {
										$('div.done').fadeIn(function() {
											$('#btn_edit_client').attr('disabled', false);
											$('#btn_delete_client').attr('disabled', false);
										});
									});
								}
							},
							complete : function() {
								$('#btn_edit_client').attr('disabled', false);
								$('#btn_delete_client').attr('disabled', false);
							}
						});
					} else {
						$('#error_edit_client').text('Định dạng e-mail không đúng!');
						$('#error_edit_client').fadeIn(function() {
							$('div.s-loading').fadeOut(function() {
								$('div.done').fadeIn();
							});
						});
					}
				}
			});
		});
	}
}

function deleteClient() {
	cfirm = confirm('Bạn có muốn xóa không?');
	if (cfirm == true) {
		$('#btn_edit_client').attr('disabled', true);
		$('#btn_delete_client').attr('disabled', true);
		$('#error_edit_client').fadeOut();
		$('div.remove').fadeOut(function() {
			$('#remove_loading').fadeIn(function() {
				$.ajax({
					url : URL + 'admincp_client/deleteClient',
					type : 'post',
					data : {
						client_id : CLIENT_ID,
					},
					success : function(response) {
						if (response == 200) {
							alert('Xóa thành công !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									jumpToOtherPage(URL + 'admincp_client');
								});
							});
						} else {
							alert('Xóa thất bại !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									$('#btn_edit_client').attr('disabled', false);
									$('#btn_delete_client').attr('disabled', false);
								});
							});
						}
					},
					complete : function() {
						$('#btn_edit_client').attr('disabled', false);
						$('#btn_delete_client').attr('disabled', false);
					}
				});

			});
		});
	}
}
