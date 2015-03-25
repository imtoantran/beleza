$(document).ready(function() {
	var url = URL + 'giftvoucher/xhrGet_page_giftvoucher';
	$.get(url, function(data) {
        if(!jQuery.isEmptyObject(data)) {

			$.each(data, function(index, value) {
				if(index == 'page_contact_hinhanh') {
					$("#"+index).attr("src", value);
					return;
				} 
				else if(index == 'page_contact_dvcskh' || index == 'page_contact_dangba' || index == 'page_contact_congtac' || index == 'page_contact_tuyendung') {
					$("#"+index).attr("href", "mailto:" + value);
					// continue;
					// return;
				}

                $("#"+index).html(value);
            });
        }
    }, 'json')
    .done(function(){
        
    });


	// $('button.voucher-card-btn').on('click', function() {
		// setTimeIdle();
		// GIFT_TYPE = 1;
		// $('#gift_sender').val('');
		// $('#gift_email').val('');
		// $('#gift_message').val('');
		// $('#gift_date').val('');
		// $('#gift_send_mail').prop('checked', 'checked');
		// $('#error_message_gift').hide();
		// GIFT_PRICE = $(this).attr('gift-price-data');
		// if (GIFT_PRICE != '') {
			// $('#gift_value').text(GIFT_PRICE + ' VNĐ');
			// $('#gift_modal').modal('show');
		// }
	// });
	$('input:radio[name="gift_send_type"]').on('change', function() {
		if ($('.gift_send_type').is(':checked')) {
			GIFT_TYPE = $(this).val();
		}
		if($(this).val()==2){
			$('.box-gifcard').slideDown();
		}else{
			$('.box-gifcard').slideUp();
		}
	});
	loadPlaceUseGift();
	loadGiftPriceList();
});

function saveGiftvoucher() {
	$('#error_message_gift').hide();
	$('#waiting_for_gift').fadeIn(function() {
		var e_mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var gift_phone = $('#gift_phone').val();
		var gift_address = $('#gift_address').val();
		var gift_email = $('#gift_email').val();
		var check = e_mail.test(gift_email);
		var gift_sender = $('#gift_sender').val();
		var gift_email = $('#gift_email').val();
		var gift_date = $('#gift_date').val();
		var gift_message = $('#gift_message').val();
		if (gift_sender == '' || gift_email == '' || gift_date == '' || gift_message == '') {
			$('#error_message_gift').text('Nhập đầy đủ thông tin ');
			$('#error_message_gift').fadeIn(function() {
				$('#waiting_for_gift').fadeOut();
			});
		} else {
			if (check == true) {
				if($('input:radio[name="gift_send_type"]:checked').val() == 2){
					if(gift_address == '' || gift_phone == ''){
						$('#error_message_gift').text('Nhập đầy đủ thông tin');
						$('#error_message_gift').fadeIn(function() {
							$('#waiting_for_gift').fadeOut();
						});
						return false;
					}
				}

				$.ajax({
					url : URL + 'giftvoucher/saveGiftvoucher',
					type : 'post',
					data : {
						gift_voucher_sender : $('#gift_sender').val(),
						gift_voucher_email : $('#gift_email').val(),
						gift_voucher_address : $('#gift_address').val(),
						gift_voucher_phone : $('#gift_phone').val(),
						gift_voucher_type : GIFT_TYPE,
						gift_voucher_date : $('#gift_date').val(),
						gift_voucher_mess : $('#gift_message').val(),
						gift_voucher_price : GIFT_PRICE
					},
					success : function(response) {
						if (response != 0 && response != -1) {
							$('#gift_modal').modal('hide');
							shoppingCartDetail();
							$('#booking_amount b').text(response);
							// jumpToOtherPage(URL + 'payment');
						} else if (response == 0) {
							$('#waiting_for_gift').fadeOut(function() {
								$('#login_modal').modal('show');
							});
						} else if (response == -1) {
							$('#waiting_for_gift').fadeOut(function() {
								alert('Chưa nhập đầy đủ thông tin!');
							});
						}
					},
					complete : function() {

					}
				});
			} else {
				$('#error_message_gift').text('Email không hợp lệ ');
				$('#error_message_gift').fadeIn(function() {
					$('#waiting_for_gift').fadeOut();
				});
			}
		}
	});
}

function loadPlaceUseGift() {
	$.ajax({
		url : URL + 'giftvoucher/loadPlaceUseGift',
		type : 'post',
		success : function(response) {
			var html = '';
			if(response[0] != null){
				//console.log(response);
				response = JSON.parse(response);
				$.each(response, function(key, value){
					html += '<li>';
					html += '<div align="center">';
					html += '<img style="height: 120px; width: 180px" class="img-responsive" src="' + value.user_logo + '">';
					html += '<p><small><b>' + value.user_business_name + '</b></small></p>';
					html += '</div>';
					html += '</li>';
				});
				$('#place_use_gift_voucher').html(html);
			}else{
				
			}
		},
		complete : function() {

		}
	});
}

function loadGiftPriceList() {
	$.ajax({
		url : URL + 'giftvoucher/loadGiftPriceList',
		type : 'post',
		success : function(response) {
			var html = '';
			var html_2 = '';
			if(response[0] != null){
				//console.log(response);
				response = JSON.parse(response);
				$.each(response, function(key, value){
					html += '<li>';
					html += '<button gift-price-data="' + value.gift_price + '" class="btn btn-default voucher-card-btn">';
					html += '<img class="btn-xeng" src="' + URL + 'public/assets/img/xeng.png" />';
					html += $.number(value.gift_price) +' đ</button>';
					html += '</div>';
					html += '</li>';
					html_2 += '<option value="' + value.gift_price + '">';
					html_2 += '' + $.number(value.gift_price) + ' đ';
					html_2 += '</option>';
				});
				$('#gift_price_list').html(html);
				$('#gift_value').html(html_2);
			}else{
				
			}
		},
		complete : function() {
			$('button.voucher-card-btn').on('click', function() {
				setTimeIdle();
				GIFT_TYPE = 1;
				$('#gift_sender').val('');
				$('#gift_email').val('');
				$('#gift_address').val('');
				$('#gift_phone').val('');
				$('#gift_message').val('');
				$('#gift_date').val('');
				$('#gift_send_mail').prop('checked', 'checked');
				$('#error_message_gift').hide();
				GIFT_PRICE = $(this).attr('gift-price-data');
				if (GIFT_PRICE != '') {
					$('#gift_value').val(GIFT_PRICE).prop('selected');
					$('#gift_modal').modal('show');
					$('#waiting_for_gift').hide();
				}
			});
			$('#gift_value').on('change', function(){
				GIFT_PRICE = $(this).val();
			});
		}
	});
}