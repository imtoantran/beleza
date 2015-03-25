$(document).ready(function() {
	if (IS_INDEX == 1 && IS_ADD == 0 && IS_EDIT == 0) {
		loadDistrictList();
		
		oTable = $('#district_list').dataTable({
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
		loadCityList();
	}
	if (IS_INDEX == 0 && IS_ADD == 0 && IS_EDIT == 1) {
		
		loadCityList();
	}
});

function addDistrictDetail() {
	jumpToOtherPage(URL + 'admincp_district/addDistrictDetail');
}

function returnToDistrict() {
	jumpToOtherPage(URL + 'admincp_district');
}

function loadCityList() {
	$.ajax({
		url : URL + 'admincp_city/loadCityList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			var html = '<option value="">Chọn thành phố</option>';
			$.each(response, function(key, value){
				html += '<option value="' + value[0] + '">' + value[1] + '</option>';
			});
			$('#city_id').html(html);
		},
		complete : function() {
			if (IS_INDEX == 0 && IS_ADD == 0 && IS_EDIT == 1) {
				loadDistrictDetailEdit();
			}
		}
	});
}

function loadDistrictList() {
	$.ajax({
		url : URL + 'admincp_district/loadDistrictList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			oTable.fnClearTable();
			oTable.fnAddData(response);
		},
		complete : function() {
			$("#district_list").delegate("tbody tr", "click", function() {
				var district_id = $(this).find('td').eq(0).text();
				// console.log(user_id);
				jumpToOtherPage(URL + 'admincp_district/editDistrictDetail/' + district_id);
			});
		}
	});
}

function saveDistrict() {
	$('#error_add_district').fadeOut();
	$('div.done').fadeOut(function() {
		$('div.s-loading').fadeIn(function() {
			var district_id = $('#district_id').val();
			var district_name = $('#district_name').val();
			var city_id = $('#city_id').val();
			if (district_id == '' || district_name == '' || city_id == '') {
				$('#error_add_district').text('Nhập đầy đủ các trường có (*)');
				$('#error_add_district').fadeIn(function() {
					$('div.s-loading').fadeOut(function() {
						$('div.done').fadeIn();
					});
				});
			} else {
				$.ajax({
					url : URL + 'admincp_district/saveDistrict',
					type : 'post',
					data : {
						district_id : district_id,
						district_name : district_name,
						city_id : city_id
					},
					success : function(response) {
						if (response == 200) {
							alert('Thêm quận thành công');
							jumpToOtherPage(URL + 'admincp_district');
						} else {
							$('#error_add_district').text('Thêm thất bại, mã hoặc tên quận đã tồn tại!');
							$('#error_add_district').fadeIn(function() {
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

function loadDistrictDetailEdit() {
	$.ajax({
		url : URL + 'admincp_district/loadDistrictDetailEdit',
		type : 'post',
		dataType : 'json',
		data : {
			district_id : DISTRICT_ID
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

function editDistrict() {
	cfirm = confirm('Bạn có muốn sửa không?');
	if (cfirm == true) {
		$('#btn_edit_district').attr('disabled', true);
		$('#btn_delete_district').attr('disabled', true);
		$('#error_edit_district').fadeOut();
		$('div.done').fadeOut(function() {
			$('#edit_loading').fadeIn(function() {
				var district_id = $('#district_id').val();
				var district_name = $('#district_name').val();
				var city_id = $('#city_id').val();
				if (district_id == '' || district_name == '' || city_id == '') {
					$('#error_edit_district').text('Nhập đầy đủ các trường có (*)');
					$('#error_edit_district').fadeIn(function() {
						$('#edit_loading').fadeOut(function() {
							$('div.done').fadeIn();
							$('#btn_edit_district').attr('disabled', false);
							$('#btn_delete_district').attr('disabled', false);
						});
					});
				} else {
					$.ajax({
						url : URL + 'admincp_district/editDistrict',
						type : 'post',
						data : {
							district_id : DISTRICT_ID,
							district_name : district_name,
							city_id : city_id
						},
						success : function(response) {
							if (response == 200) {
								alert('Sửa thành công !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										jumpToOtherPage(URL + 'admincp_district');
									});
								});
							} else {
								alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										$('#btn_edit_district').attr('disabled', false);
										$('#btn_delete_district').attr('disabled', false);
									});
								});
							}
						},
						complete : function() {
							$('#btn_edit_district').attr('disabled', false);
							$('#btn_delete_district').attr('disabled', false);
						}
					});
				}
			});
		});
	}
}

function deleteDistrict() {
	cfirm = confirm('Bạn có muốn xóa không?');
	if (cfirm == true) {
		$('#btn_edit_district').attr('disabled', true);
		$('#btn_delete_district').attr('disabled', true);
		$('#error_edit_district').fadeOut();
		$('div.remove').fadeOut(function() {
			$('#remove_loading').fadeIn(function() {
				$.ajax({
					url : URL + 'admincp_district/deleteDistrict',
					type : 'post',
					data : {
						district_id : DISTRICT_ID,
					},
					success : function(response) {
						if (response == 200) {
							alert('Xóa thành công !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									jumpToOtherPage(URL + 'admincp_district');
								});
							});
						} else {
							alert('Xóa thất bại !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									$('#btn_edit_district').attr('disabled', false);
									$('#btn_delete_district').attr('disabled', false);
								});
							});
						}
					},
					complete : function() {
						$('#btn_edit_district').attr('disabled', false);
						$('#btn_delete_district').attr('disabled', false);
					}
				});

			});
		});
	}
}
