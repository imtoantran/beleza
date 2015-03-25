$(document).ready(function() {
	if (IS_INDEX == 1 && IS_ADD == 0 && IS_EDIT == 0) {
		loadTypeBusinessList();
		oTable = $('#type_business_list').dataTable({
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
		loadTypeBusinessDetailEdit();
	}
});

function addTypeBusinessDetail() {
	jumpToOtherPage(URL + 'admincp_typebusiness/addTypeBusinessDetail');
}

function returnToTypeBusiness() {
	jumpToOtherPage(URL + 'admincp_typebusiness');
}

function loadTypeBusinessList() {
	$.ajax({
		url : URL + 'admincp_typebusiness/loadTypeBusinessList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			oTable.fnClearTable();
			oTable.fnAddData(response);
		},
		complete : function() {
			$("#type_business_list").delegate("tbody tr", "click", function() {
				var type_business_id = $(this).find('td').eq(0).text();
				// console.log(user_id);
				jumpToOtherPage(URL + 'admincp_typebusiness/editTypeBusinessDetail/' + type_business_id);
			});
		}
	});
}

function saveTypeBusiness() {
	$('#error_add_type_business').fadeOut();
	$('div.done').fadeOut(function() {
		$('div.s-loading').fadeIn(function() {
			var type_business_name = $('#type_business_name').val();
			if (type_business_name == '') {
				$('#error_add_type_business').text('Nhập đầy đủ các trường có (*)');
				$('#error_add_type_business').fadeIn(function() {
					$('div.s-loading').fadeOut(function() {
						$('div.done').fadeIn();
					});
				});
			} else {
				$.ajax({
					url : URL + 'admincp_typebusiness/saveTypeBusiness',
					type : 'post',
					data : {
						type_business_name : type_business_name
					},
					success : function(response) {
						if (response == 200) {
							alert('Thêm dịch vụ chính thành công');
							jumpToOtherPage(URL + 'admincp_typebusiness');
						} else {
							$('#error_add_type_business').text('Thêm thất bại, mã hoặc tên quận đã tồn tại!');
							$('#error_add_type_business').fadeIn(function() {
								$('div.s-loading').fadeOut(function() {
									$('div.done').fadeIn();
								});
							});
						}
					},
					complete : function() {

					}
				});
			}
		});
	});
}

function loadTypeBusinessDetailEdit() {
	$.ajax({
		url : URL + 'admincp_typebusiness/loadTypeBusinessDetailEdit',
		type : 'post',
		dataType : 'json',
		data : {
			type_business_id : TYPE_BUSINESS_ID
		},
		success : function(response) {
			if (response[0] != null) {
				$.each(response[0], function(key, value) {
					$('#' + key).val(value);
				});
			} else {
				$('#main_detail').html('<div class="alert alert-warning"><h3><b>Cảnh báo!</b></h3><span>Quận không tồn tại</span></div>');
			}
		},
		complete : function() {

		}
	});
}

function editTypeBusiness() {
	cfirm = confirm('Bạn có muốn sửa không?');
	if (cfirm == true) {
		$('#btn_edit_type_business').attr('disabled', true);
		$('#btn_delete_type_business').attr('disabled', true);
		$('#error_edit_type_business').fadeOut();
		$('div.done').fadeOut(function() {
			$('#edit_loading').fadeIn(function() {
				var type_business_id = $('#type_business_id').val();
				var type_business_name = $('#type_business_name').val();
				if (type_business_id == '' || type_business_name == '') {
					$('#error_edit_type_business').text('Nhập đầy đủ các trường có (*)');
					$('#error_edit_type_business').fadeIn(function() {
						$('#edit_loading').fadeOut(function() {
							$('div.done').fadeIn();
							$('#btn_edit_type_business').attr('disabled', false);
							$('#btn_delete_type_business').attr('disabled', false);
						});
					});
				} else {
					$.ajax({
						url : URL + 'admincp_typebusiness/editTypeBusiness',
						type : 'post',
						data : {
							type_business_id : TYPE_BUSINESS_ID,
							type_business_name : type_business_name,
						},
						success : function(response) {
							if (response == 200) {
								alert('Sửa thành công !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										jumpToOtherPage(URL + 'admincp_typebusiness');
									});
								});
							} else {
								alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										$('#btn_edit_type_business').attr('disabled', false);
										$('#btn_delete_type_business').attr('disabled', false);
									});
								});
							}
						},
						complete : function() {
							$('#btn_edit_type_business').attr('disabled', false);
							$('#btn_delete_type_business').attr('disabled', false);
						}
					});
				}
			});
		});
	}
}

function deleteTypeBusiness() {
	cfirm = confirm('Bạn có muốn xóa không?');
	if (cfirm == true) {
		$('#btn_edit_type_business').attr('disabled', true);
		$('#btn_delete_type_business').attr('disabled', true);
		$('#error_edit_type_business').fadeOut();
		$('div.remove').fadeOut(function() {
			$('#remove_loading').fadeIn(function() {
				$.ajax({
					url : URL + 'admincp_typebusiness/deleteTypeBusiness',
					type : 'post',
					data : {
						type_business_id : TYPE_BUSINESS_ID,
					},
					success : function(response) {
						if (response == 200) {
							alert('Xóa thành công !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									jumpToOtherPage(URL + 'admincp_typebusiness');
								});
							});
						} else {
							alert('Xóa thất bại !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									$('#btn_edit_type_business').attr('disabled', false);
									$('#btn_delete_type_business').attr('disabled', false);
								});
							});
						}
					},
					complete : function() {
						$('#btn_edit_type_business').attr('disabled', false);
						$('#btn_delete_type_business').attr('disabled', false);
					}
				});

			});
		});
	}
}
