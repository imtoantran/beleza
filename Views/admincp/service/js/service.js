$(document).ready(function() {
	if (IS_INDEX == 1 && IS_ADD == 0 && IS_EDIT == 0) {
		loadServiceList();
		oTable = $('#service_list').dataTable({
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
		loadServiceType();
	}
	if (IS_INDEX == 0 && IS_ADD == 0 && IS_EDIT == 1) {
		loadServiceType();
	}
});

function addServiceDetail() {
	jumpToOtherPage(URL + 'admincp_service/addServiceDetail');
}

function returnToService() {
	jumpToOtherPage(URL + 'admincp_service');
}

function loadServiceList() {
	$.ajax({
		url : URL + 'admincp_service/loadServiceList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			oTable.fnClearTable();
			oTable.fnAddData(response);
		},
		complete : function() {
			$("#service_list").delegate("tbody tr", "click", function() {
				var service_id = $(this).find('td').eq(0).text();
				// console.log(user_id);
				jumpToOtherPage(URL + 'admincp_service/editServiceDetail/' + service_id);
			});
		}
	});
}

function saveService() {
	$('#error_add_service').fadeOut();
	$('div.done').fadeOut(function() {
		$('div.s-loading').fadeIn(function() {
			var service_type_id = $('#service_type_id').val();
			var service_name = $('#service_name').val();
			var service_description = $('#service_description').val();
			var service_image = document.getElementById('fileinput_service_image');
			if (service_type_id == '' || service_name == '') {
				$('#error_add_service').text('Nhập đầy đủ các trường có (*)');
				$('#error_add_service').fadeIn(function() {
					$('div.s-loading').fadeOut(function() {
						$('div.done').fadeIn();
					});
				});
			} else {
				var data_form = new FormData();
				data_form.append('service_image', service_image.files[0]);
				data_form.append('service_name', service_name);
				data_form.append('service_type_id', service_type_id);
				data_form.append('service_description', service_description);

				$.ajax({
					url : URL + 'admincp_service/saveService',
					type : 'post',
					data : data_form,
					async: false,
					cache: false,
			        contentType: false,
			        processData: false,
					success : function(response) {
						if (response == 200) {
							alert('Thêm thành công');
							jumpToOtherPage(URL + 'admincp_service');
						} else {
							$('#error_add_service').text('Thêm thất bại!');
							$('#error_add_service').fadeIn(function() {
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

function loadServiceDetailEdit() {
	$.ajax({
		url : URL + 'admincp_service/loadServiceDetailEdit',
		type : 'post',
		dataType : 'json',
		data : {
			service_id : SERVICE_ID
		},
		success : function(response) {
			if (response[0] != null) {
				$.each(response[0], function(key, value) {
					$('#' + key).val(value);
				});
				$('.fileinput-preview').html('<img src="' + URL + response[0]['service_image'] + '" />');
			} else {
				$('#main_detail').html('<div class="alert alert-warning"><h3><b>Cảnh báo!</b></h3><span>Dịch vụ không tồn tại</span></div>');
			}
		},
		complete : function() {

		}
	});
}

function loadServiceType(){
	$.ajax({
		url : URL + 'admincp_service/loadServiceType',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			if (response != null) {
				var html = '';
				$.each(response, function(key, value) {
					html += '<option value="' + value.service_type_id + '">' + value.service_type_name + '</option>';
				});
				$('#service_type_id').append(html);
			}
		},
		complete : function() {
			if (IS_INDEX == 0 && IS_ADD == 0 && IS_EDIT == 1) {
				loadServiceDetailEdit();
			}
		}
	});
}

function editService() {
	cfirm = confirm('Bạn có muốn sửa không?');
	if (cfirm == true) {
		$('#btn_edit_service').attr('disabled', true);
		$('#btn_delete_service').attr('disabled', true);
		$('#error_edit_service').fadeOut();
		$('div.done').fadeOut(function() {
			$('#edit_loading').fadeIn(function() {
				var service_id = $('#service_id').val();
				var service_name = $('#service_name').val();
				var service_type_id = $('#service_type_id').val();
				var service_description = $('#service_description').val();
				var service_image = document.getElementById('fileinput_service_image');
				if (service_id == '' || service_name == '') {
					$('#error_edit_service').text('Nhập đầy đủ các trường có (*)');
					$('#error_edit_service').fadeIn(function() {
						$('#edit_loading').fadeOut(function() {
							$('div.done').fadeIn();
							$('#btn_edit_service').attr('disabled', false);
							$('#btn_delete_service').attr('disabled', false);
						});
					});
				} else {
					var data_form = new FormData();
					data_form.append('service_image', service_image.files[0]);
					data_form.append('service_id', SERVICE_ID);
					data_form.append('service_name', service_name);
					data_form.append('service_type_id', service_type_id);
					data_form.append('service_description', service_description);

					$.ajax({
						url : URL + 'admincp_service/editService',
						type : 'POST',
						data : data_form,
						async: false,
						cache: false,
				        contentType: false,
				        processData: false,
						success : function(response) {
							if (response == 200) {
								alert('Sửa thành công !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										jumpToOtherPage(URL + 'admincp_service');
									});
								});
							} else {
								alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										$('#btn_edit_service').attr('disabled', false);
										$('#btn_delete_service').attr('disabled', false);
									});
								});
							}
						},
						complete : function() {
							$('#btn_edit_service').attr('disabled', false);
							$('#btn_delete_service').attr('disabled', false);
						}
					});
				}
			});
		});
	}
}

function deleteService() {
	cfirm = confirm('Bạn có muốn xóa không?');
	if (cfirm == true) {
		$('#btn_edit_service').attr('disabled', true);
		$('#btn_delete_service').attr('disabled', true);
		$('#error_edit_service').fadeOut();
		$('div.remove').fadeOut(function() {
			$('#remove_loading').fadeIn(function() {
				$.ajax({
					url : URL + 'admincp_service/deleteService',
					type : 'post',
					data : {
						service_id : SERVICE_ID,
					},
					success : function(response) {
						if (response == 200) {
							alert('Xóa thành công !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									jumpToOtherPage(URL + 'admincp_service');
								});
							});
						} else {
							alert('Xóa thất bại !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									$('#btn_edit_service').attr('disabled', false);
									$('#btn_delete_service').attr('disabled', false);
								});
							});
						}
					},
					complete : function() {
						$('#btn_edit_service').attr('disabled', false);
						$('#btn_delete_service').attr('disabled', false);
					}
				});

			});
		});
	}
}
