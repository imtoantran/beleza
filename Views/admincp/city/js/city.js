$(document).ready(function() {
	if (IS_INDEX == 1 && IS_ADD == 0 && IS_EDIT == 0) {
		loadCityList();
		oTable = $('#city_list').dataTable({
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
		loadCityDetailEdit();
	}
});

function addCityDetail() {
	jumpToOtherPage(URL + 'admincp_city/addCityDetail');
}

function returnToCity() {
	jumpToOtherPage(URL + 'admincp_city');
}

function loadCityList() {
	$.ajax({
		url : URL + 'admincp_city/loadCityList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			oTable.fnClearTable();
			oTable.fnAddData(response);
		},
		complete : function() {
			$("#city_list").delegate("tbody tr", "click", function() {
				var city_id = $(this).find('td').eq(0).text();
				// console.log(user_id);
				jumpToOtherPage(URL + 'admincp_city/editCityDetail/' + city_id);
			});
		}
	});
}

function saveCity() {
	$('#error_add_city').fadeOut();
	$('div.done').fadeOut(function() {
		$('div.s-loading').fadeIn(function() {
			// var city_id = $('#city_id').val();
			var city_name = $('#city_name').val();
			if (city_name == '') {
				$('#error_add_city').text('Nhập đầy đủ các trường có (*)');
				$('#error_add_city').fadeIn(function() {
					$('div.s-loading').fadeOut(function() {
						$('div.done').fadeIn();
					});
				});
			} else {
				$.ajax({
					url : URL + 'admincp_city/saveCity',
					type : 'post',
					data : {
						// city_id : city_id,
						city_name : city_name
					},
					success : function(response) {
						if (response == 200) {
							alert('Thêm quận thành công');
							jumpToOtherPage(URL + 'admincp_city');
						} else {
							$('#error_add_city').text('Thêm thất bại, mã hoặc tên quận đã tồn tại!');
							$('#error_add_city').fadeIn(function() {
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

function loadCityDetailEdit() {
	$.ajax({
		url : URL + 'admincp_city/loadCityDetailEdit',
		type : 'post',
		dataType : 'json',
		data : {
			city_id : CITY_ID
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

function editCity() {
	cfirm = confirm('Bạn có muốn sửa không?');
	if (cfirm == true) {
		$('#btn_edit_city').attr('disabled', true);
		$('#btn_delete_city').attr('disabled', true);
		$('#error_edit_city').fadeOut();
		$('div.done').fadeOut(function() {
			$('#edit_loading').fadeIn(function() {
				var city_id = $('#city_id').val();
				var city_name = $('#city_name').val();
				if (city_id == '' || city_name == '') {
					$('#error_edit_city').text('Nhập đầy đủ các trường có (*)');
					$('#error_edit_city').fadeIn(function() {
						$('#edit_loading').fadeOut(function() {
							$('div.done').fadeIn();
							$('#btn_edit_city').attr('disabled', false);
							$('#btn_delete_city').attr('disabled', false);
						});
					});
				} else {
					$.ajax({
						url : URL + 'admincp_city/editCity',
						type : 'post',
						data : {
							city_id : CITY_ID,
							city_name : city_name,
						},
						success : function(response) {
							if (response == 200) {
								alert('Sửa thành công !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										jumpToOtherPage(URL + 'admincp_city');
									});
								});
							} else {
								alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
								$('div#edit_loading').fadeOut(function() {
									$('div.done').fadeIn(function() {
										$('#btn_edit_city').attr('disabled', false);
										$('#btn_delete_city').attr('disabled', false);
									});
								});
							}
						},
						complete : function() {
							$('#btn_edit_city').attr('disabled', false);
							$('#btn_delete_city').attr('disabled', false);
						}
					});
				}
			});
		});
	}
}

function deleteCity() {
	cfirm = confirm('Bạn có muốn xóa không?');
	if (cfirm == true) {
		$('#btn_edit_city').attr('disabled', true);
		$('#btn_delete_city').attr('disabled', true);
		$('#error_edit_city').fadeOut();
		$('div.remove').fadeOut(function() {
			$('#remove_loading').fadeIn(function() {
				$.ajax({
					url : URL + 'admincp_city/deleteCity',
					type : 'post',
					data : {
						city_id : CITY_ID,
					},
					success : function(response) {
						if (response == 200) {
							alert('Xóa thành công !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									jumpToOtherPage(URL + 'admincp_city');
								});
							});
						} else {
							alert('Xóa thất bại !');
							$('div#remove_loading').fadeOut(function() {
								$('div.remove').fadeIn(function() {
									$('#btn_edit_city').attr('disabled', false);
									$('#btn_delete_city').attr('disabled', false);
								});
							});
						}
					},
					complete : function() {
						$('#btn_edit_city').attr('disabled', false);
						$('#btn_delete_city').attr('disabled', false);
					}
				});

			});
		});
	}
}
