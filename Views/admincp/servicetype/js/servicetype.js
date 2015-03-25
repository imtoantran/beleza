$(document).ready(function() {
	if (IS_INDEX == 1 && IS_ADD == 0 && IS_EDIT == 0) {
		loadServiceTypeList();
	}
	if (IS_INDEX == 0 && IS_ADD == 1 && IS_EDIT == 0) {

	}
	if (IS_INDEX == 0 && IS_ADD == 0 && IS_EDIT == 1) {
		loadServiceTypeDetailEdit();
	}
	$('.fa-choosen').on('click', function(){
		$('#service_type_icon').val($(this).attr('value'));
		$('#choose_icon').modal('hide');
	});
});

function addServiceTypeDetail() {
	jumpToOtherPage(URL + 'admincp_service_type/addServiceTypeDetail');
}

function returnToServiceType() {
	jumpToOtherPage(URL + 'admincp_service_type');
}

function loadServiceTypeList() {
	$.ajax({
		url : URL + 'admincp_service_type/loadServiceTypeList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			var html = '';
			$.each(response, function(key, value) {
				html += '<tr>';
				$.each(value, function(i, item) {
					html += '<td>';
					if(i == 'service_type_icon'){
						html += '<span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa '+ item +' fa-stack-1x text-white"></i></span>';
					}else{
						html += item;
					}
					html += '</td>';
				});
				html += '</tr>';
			});
			$('#service_type_list tbody').html(html);
		},
		complete : function() {
			oTable = $('#service_type_list').dataTable({
				"oLanguage" : {
					"sZeroRecords" : "Không có dữ liệu nào cả.",
					"sSearch" : "Tìm kiếm: ",
					"sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
					"sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
					"sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
				}
			});
			$("#service_type_list").delegate("tbody tr", "click", function() {
				var service_type_id = $(this).find('td').eq(0).text();
				// console.log(user_id);
				jumpToOtherPage(URL + 'admincp_service_type/editServiceTypeDetail/' + service_type_id);
			});
		}
	});
}

function saveServiceType() {
	$('#error_add_service_type').fadeOut();
	$('div.done').fadeOut(function() {
		$('div.s-loading').fadeIn(function() {
			var service_type_name = $('#service_type_name').val();
			var service_type_name_short = $('#service_type_name_short').val();
			var service_type_icon = $('#service_type_icon').val();
			var service_type_image = document.getElementById('fileinput_service_type_image');
			if (service_type_name == '' || service_type_name_short == '' || service_type_icon == '') {
				$('#error_add_service_type').text('Nhập đầy đủ các trường có (*)');
				$('#error_add_service_type').fadeIn(function() {
					$('div.s-loading').fadeOut(function() {
						$('div.done').fadeIn();
					});
				});
			} else {
				var data_form = new FormData();
				data_form.append('service_type_image', service_type_image.files[0]);
				data_form.append('service_type_name', service_type_name);
				data_form.append('service_type_name_short', service_type_name_short);
				data_form.append('service_type_icon', service_type_icon);

				$.ajax({
					url : URL + 'admincp_service_type/saveServiceType',
					type : 'post',
					data :data_form,
					async: false,
					cache: false,
			        contentType: false,
			        processData: false,
					success : function(response) {
						if (response == 200) {
							alert('Thêm loại dịch vụ thành công');
							jumpToOtherPage(URL + 'admincp_service_type');
						} else {
							$('#error_add_service_type').text('Thêm thất bại!');
							$('#error_add_service_type').fadeIn(function() {
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

function loadServiceTypeDetailEdit() {
	$.ajax({
		url : URL + 'admincp_service_type/loadServiceTypeDetailEdit',
		type : 'post',
		dataType : 'json',
		data : {
			service_type_id : SERVICE_TYPE_ID
		},
		success : function(response) {
			if (response[0] != null) {
				$.each(response[0], function(key, value) {
					$('#' + key).val(value);
				});
				$('.fileinput-preview').html('<img src="' + URL + response[0]['service_type_image'] + '" />');
			} else {
				$('#main_detail').html('<div class="alert alert-warning"><h3><b>Cảnh báo!</b></h3><span>Quận không tồn tại</span></div>');
			}
		},
		complete : function() {

		}
	});
}

function editServiceType() {
	cfirm = confirm('Bạn có muốn sửa không?');
	if (cfirm == true) {
		$('#btn_edit_service_type').attr('disabled', true);
		$('#btn_delete_service_type').attr('disabled', true);
		$('#error_edit_service_type').fadeOut();
		$('div.done').fadeOut(function() {
			$('#edit_loading').fadeIn(function() {
				var service_type_id = $('#service_type_id').val();
				var service_type_name = $('#service_type_name').val();
				var service_type_name_short = $('#service_type_name_short').val();
				var service_type_icon = $('#service_type_icon').val();
				var service_type_image = document.getElementById('fileinput_service_type_image');
				if (service_type_id == '' || service_type_name == '' || service_type_name_short == '' || service_type_icon == '') {
					$('#error_edit_service_type').text('Nhập đầy đủ các trường có (*)');
					$('#error_edit_service_type').fadeIn(function() {
						$('#edit_loading').fadeOut(function() {
							$('div.done').fadeIn();
							$('#btn_edit_service_type').attr('disabled', false);
							$('#btn_delete_service_type').attr('disabled', false);
						});
					});
				} else {
					var data_form = new FormData();
					data_form.append('service_type_image', service_type_image.files[0]);
					data_form.append('service_type_id', SERVICE_TYPE_ID);
					data_form.append('service_type_name', service_type_name);
					data_form.append('service_type_name_short', service_type_name_short);
					data_form.append('service_type_icon', service_type_icon);

					$.ajax({
						url : URL + 'admincp_service_type/editServiceType',
						type : 'post',
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
										jumpToOtherPage(URL + 'admincp_service_type');
									});
								});
							} else {
								alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										$('#btn_edit_service_type').attr('disabled', false);
										$('#btn_delete_service_type').attr('disabled', false);
									});
								});
							}
						},
						complete : function() {
							$('#btn_edit_service_type').attr('disabled', false);
							$('#btn_delete_service_type').attr('disabled', false);
						}
					});
				}
			});
		});
	}
}

function deleteServiceType() {
	cfirm = confirm('Bạn có muốn xóa không?');
	if (cfirm == true) {
		$('#btn_edit_service_type').attr('disabled', true);
		$('#btn_delete_service_type').attr('disabled', true);
		$('#error_edit_service_type').fadeOut();
		$('div.remove').fadeOut(function() {
			$('#remove_loading').fadeIn(function() {
				$.ajax({
					url : URL + 'admincp_service_type/deleteServiceType',
					type : 'post',
					data : {
						service_type_id : SERVICE_TYPE_ID,
					},
					success : function(response) {
						if (response == 200) {
							alert('Xóa thành công !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									jumpToOtherPage(URL + 'admincp_service_type');
								});
							});
						} else {
							alert('Xóa thất bại !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									$('#btn_edit_service_type').attr('disabled', false);
									$('#btn_delete_service_type').attr('disabled', false);
								});
							});
						}
					},
					complete : function() {
						$('#btn_edit_service_type').attr('disabled', false);
						$('#btn_delete_service_type').attr('disabled', false);
					}
				});

			});
		});
	}
}
