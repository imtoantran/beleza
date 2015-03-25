$(document).ready(function() {
	if (IS_ADD == 1 && IS_EDIT == 0) {
		loadDistrict();
	} else if (IS_ADD == 0 && IS_EDIT == 1) {
		loadSlides();
	} else {
		loadBannerList();
	}
});

function loadBannerList() {
	$.ajax({
		url : URL + 'admincp_banner/loadBannerList',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			if (response[0] != null) {
				var html = '';
				$.each(response, function(i, item) {
					html += '<tr>';
					$.each(item, function(key, value) {
						html += '<td>';
						if(key == 'user_status_approve'){
							if(value == '1'){
								html += '<i class="fa fa-check text-success"><span style="display: none">' + value + '</span></i>';
							}else if(value == '0'){
								html += '<i class="fa fa-times text-danger"><span style="display: none">' + value + '</span></i>';
							}
						}else{
							html += value;
						}
						html += '</td>';
					});
					html += '</tr>';
				});
				$('#spa_list tbody').html(html);
			}
		},
		complete : function() {
			$('#spa_list').DataTable();
			$("#spa_list").delegate("tbody tr", "click", function() {
				var slider_id = $(this).find('td').eq(0).text();
				// console.log(slider_id);
				jumpToOtherPage(URL + 'admincp_banner/editBannerDetail/' + slider_id);
			});
		}
	});
}

function addSaveDetail() {
	$('#error_add_spa').fadeOut();
	$('div.done').fadeOut(function() {
		$('div.s-loading').fadeIn(function() {
			var e_mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var user_email = $('#user_email').val();
			var check = e_mail.test(user_email);
			var user_full_name = $('#user_full_name').val();
			var user_business_name = $('#user_business_name').val();
			var user_district_id = $('#user_district_id').val();
			var user_address = $('#user_address').val();
			var user_phone = $('#user_phone').val();
			if (user_email == '' || user_business_name == '' || user_address == '' || user_district_id == '') {
				$('#error_add_spa').text('Nhập đầy đủ các trường có (*)');
				$('#error_add_spa').fadeIn(function() {
					$('div.s-loading').fadeOut(function() {
						$('div.done').fadeIn();
					});
				});
			} else {
				if (check == true) {
					$.ajax({
						url : URL + 'admincp_banner/addSaveDetail',
						type : 'post',
						data : {
							user_full_name : user_full_name,
							user_email : user_email,
							user_business_name : user_business_name,
							user_address : user_address,
							user_district_id : user_district_id,
							user_phone : user_phone
						},
						success : function(response) {
							if (response == 200) {
								alert('Thêm địa điểm thành công');
								jumpToOtherPage(URL + 'admincp_banner');
							} else {
								$('#error_add_spa').text('Email đã tồn tại, chọn email khác !');
								$('#error_add_spa').fadeIn(function() {
									$('div.s-loading').fadeOut(function() {
										$('div.done').fadeIn();
									});
								});
							}
						}
					});
				} else {
					$('#error_add_spa').text('Email không hợp lệ !');
					$('#error_add_spa').fadeIn(function() {
						$('div.s-loading').fadeOut(function() {
							$('div.done').fadeIn();
						});
					});
				}
			}
		});
});
}

/***
* author: imtoantran
* load slides
*/
function loadSlides() {
	$.ajax({
		url : URL + 'admincp_banner/loadSlides',
		type : 'post',
		dataType : 'json',
		data:{slider_id:slider_id},
		success : function(response) {
			if (response[0] != null) {
				var html = '';
				$.each(response, function(i, item) {
					html += '<tr>';
					$.each(item, function(key, value) {
						html += '<td>';
						if(key == 'params'){
							var thumb = JSON.parse(value);
							html += "<img width='120' src='"+URL+'public/assets/revslider/images/'+thumb.image+"'' />";
						}else{
							html += value;
						}
						html += '</td>';
					});
					html += '<td width = "120">';
					html += '<button class="btn-edit btn btn-primary btn-sm">Sửa</button>';
					html += '&nbsp;';
					html += '<button class="btn-del btn btn-danger btn-sm">Xóa</button>';
					html += '</td>';
					html += '</tr>';
				});
				$('#slides_list tbody').html(html);
			}
		},
		complete : function() {
			$('#slides_list').DataTable();

			$("#slides_list").delegate("tbody tr", "click", function() {
				var slide_id = $(this).find('td').eq(0).text();
				// console.log(slide_id);
				//jumpToOtherPage(URL + 'admincp_banner/editSlide/' + slide_id);
			});
			$("#slides_list").delegate("tbody tr button.btn-edit", "click", function() {
				var slide_id = $(this).parent().parent().find('td').eq(0).text();
				 console.log(slide_id);
				jumpToOtherPage(URL + 'admincp_banner/editSlide/' + slide_id+'-'+slider_id);
			});
			$("#slides_list").delegate("tbody tr button.btn-del", "click", function() {
				var slide_id = $(this).parent().parent().find('td').eq(0).text();
				console.log(slide_id);
				$.ajax({
					url : URL + 'admincp_banner/delSlide',
					type: 'post',
					dataType: 'json',
					data: {slide_id: slide_id},
				})
				.done(function() {
					location.reload();
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			});
		}
	});
}

function addBannerDetail() {
	jumpToOtherPage(URL + 'admincp_banner/addBannerDetail');
}

function returnToBanner() {
	jumpToOtherPage(URL + 'admincp_banner');
}
function addSlide() {
	$.ajax({
		url: URL + 'admincp_banner/addSlide',
		type:'post',
		data: {slider_id: slider_id},
	})
	.done(function() {
		console.log("success");
		location.reload(); 
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

}