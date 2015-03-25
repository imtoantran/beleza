$(document).ready(function() {
    loadPaymentDetail();
    $('#mastercard, #visa, #discover').on('click', function() {
            $(this).siblings().removeClass('payment_type_choosen');
            $(this).addClass('payment_type_choosen');
    });        
});


/*TOGGLE SHOW PAYMENT*/
// function toggleShowPayment(type){
//     var pp=$('#box-paypal');
//     var nl=$('#box-nganluong');
//     if(type == 'paypal'){
//         if(!hasDisplay(pp)){
//             pp.slideDown('fast', function(){
//             $('#icon-plus-minus-nganluong').removeClass('fa-minus-square').addClass('fa-plus-square');
//                 if(!hasDisplay(nl)){
//                     nl.slideUp('fast');
//                     $('#icon-plus-minus-paypal').removeClass('fa-plus-square').addClass('fa-minus-square');
//                 }
//             });
//         }
//     }else{
//         if(!hasDisplay(nl)){
//             nl.slideDown('fast', function(){
//                 $('#icon-plus-minus-paypal').removeClass('fa-minus-square').addClass('fa-plus-square');
//                 if(!hasDisplay(pp)){
//                    pp.slideUp('fast');
//                    $('#icon-plus-minus-nganluong').removeClass('fa-plus-square').addClass('fa-minus-square');
//                 }
//             });
//         }
//     }
// }

// function hasDisplay(tag){
//     return (tag.attr('display')=='block')? true : false;
// }
/*END TOGGLE SHOW PAYMENT*/

/*MAKE PAYMENT NGANLUONG*/
function makePayment(type){      
    $('#back-dialog').modal('show');
    if(type == 'nganluong'){       
        $.ajax({
            url: URL + 'payment/nganluongPayment',
            type: 'post',
            data:{},
            success: function(response){
                if(response != "")
                self.location= response;
            },
            complete: function(){
            }
        });
    }else{            
        $.ajax({
            url: URL + 'payment/paypalPayment',
            type: 'post',
            success: function(response){
				//console.log('test ='+response);
                self.location = response;
            },
            complete: function(){ }
        });
    }    
}

/*END MAKE PAYMENT NGANLUONG*/


/*PROCESSING ONLINE PAYMENT*/
// function processPaypalPayment() {
// 	var payment_result = 0;
// 	if (PAYMENT_TYPE == 'mastercard' || PAYMENT_TYPE == 'visa' || PAYMENT_TYPE == 'discover') {
// 		if ($('#client_card_number').val() == '' || $('#client_security_code').val() == '' || $('#month_expire').val() == '' || $('#year_expire').val() == '' || $('#client_card_holder_first').val() == '' || $('#client_card_holder_last').val() == '') {
// 			alert('Bạn chưa nhập đầy đủ.');
// 		} else {
// 			cfirm = confirm('Bạn có muốn thành toán?');
// 			if (cfirm == true) {
// 				$('#btn_online_process_payment').attr('disabled', true);
// 				$('#btn_online_payment').attr('disabled', true);
// 				$('#btn_point_payment').attr('disabled', true);
// 				$('#waiting_for_online_payment').fadeIn(function() {
// 					$.ajax({
// 						url : URL + 'payment/processPaypalPayment',
// 						type : 'post',
// 						data : {
// //							payment_type : PAYMENT_TYPE,
// //							card_number : $('#client_card_number').val(),
// //							secure_code : $('#client_security_code').val(),
// //							date_expire : $('#month_expire').val() + $('#year_expire').val(),
// //							first_name : $('#client_card_holder_first').val(),
// //							last_name : $('#client_card_holder_last').val()
// 						},
// 						success : function(response) {
// 							if (response != '0') {
// 								var json_encode = JSON.parse(response);
// 								if (json_encode[0] != null) {
// 									alert_desc = 'PAYPAL NÓI RẰNG: \n';
// 									// console.log(JSON.parse(response));
// 									if (json_encode[0].ACK != 'Failure') {
// 										payment_result = 1;
// 									}
// 									$.each(json_encode[0], function(i, item) {
// 										alert_desc += i + ': ' + item + '\n';
// 									});
// 									alert(alert_desc);
// 								}
// 							} else if (response == '0') {
// 								payment_result = 0;
// 							}
// 						},
// 						complete : function() {
// 							if (payment_result == 1) {
// 								$('#waiting_for_online_payment').fadeOut(function() {
// 									alert('Cám ơn bạn đã thanh toán thành công');
// 									jumpToOtherPage(URL);
// 								});
// 							} else {
// 								$('#waiting_for_online_payment').fadeOut(function() {
// 									alert('Thanh toán thất bại, xin vui lòng nhập lại thông tin');
// 									//jumpToOtherPage(URL);
// 									$('#btn_online_process_payment').attr('disabled', false);
// 									$('#btn_online_payment').attr('disabled', false);
// 									$('#btn_point_payment').attr('disabled', false);
// 								});
// 							}
// 						}
// 					});
// 				});
// 			}
// 		}
// 	} else {
// 		$('#reminder').fadeIn(function() {
// 			$('#reminder').fadeOut();
// 		});
// 	}
// }

/*END PROCESSING ONLINE PAYMENT*/
/*----------------------------------*/

/*PROCESSING VENUE PAYMENT*/
function processVenuePayment() {
	var payment_result = 0;
	$('#btn_venue_process_payment').attr('disabled', true);
	$('#waiting_for_venue_payment').fadeIn(function() {
		$.ajax({
			url : URL + 'payment/processVenuePayment',
			type : 'post',
			success : function(response) {
				if (response == '200') {
					payment_result = 1;
				} else {
					payment_result = 0;
				}
			},
			complete : function() {
				if (payment_result == 1) {
					$('#waiting_for_venue_payment').fadeOut(function() {
						alert('Cám ơn bạn đã thanh toán thành công');
						jumpToOtherPage(URL);
					});
				} else {
					$('#waiting_for_venue_payment').fadeOut(function() {
						alert('Thanh toán thất bại, xin vui lòng nhập lại thông tin');
						//jumpToOtherPage(URL);
						$('#btn_venue_process_payment').attr('disabled', false);
					});
				}
			}
		});
	});
}

/*END PROCESSING VENUE PAYMENT*/
/*----------------------------------*/

/*PROCESSING POINT PAYMENT*/
function processChecking(type) {
	if (type == 1) {
		checkCreditPoint();
	} else if (type == 2) {
		checkGiftPoint();
	}
}

function checkCreditPoint() {
	var CHECK_CREDIT = 0;
	$.ajax({
		url : URL + 'payment/checkCreditPoint',
		type : 'post',
		success : function(response) {
			if (response == 200) {
				processCreditPointPayment();
			} else {
				alert('Bạn không đủ điểm credit point để thực hiện thanh toán.');
			}
		}
	});
}

function checkGiftPoint() {
	var CHECK_GIFT = 0;
	$.ajax({
		url : URL + 'payment/checkGiftPoint',
		type : 'post',
		success : function(response) {
			if (response == 200) {
				processGiftPointPayment();
			} else {
				alert('Bạn không đủ điểm gift point để thực hiện thanh toán.');
			}
		}
	});
}

function processCreditPointPayment() {
	cfirm = confirm('Bạn có muốn thành toán?');
	if (cfirm == true) {
		$('#btn_creditpoint_process_payment').attr('disabled', true);
		$('#btn_giftpoint_process_payment').attr('disabled', true);
		$('#btn_online_payment').attr('disabled', true);
		$('#btn_point_payment').attr('disabled', true);
		$('#waiting_for_creditpoint_payment').fadeIn(function() {
			$.ajax({
				url : URL + 'payment/processCreditPointPayment',
				type : 'post',
				dataType : 'json',
				data : {

				},
				success : function(response) {
					if (response == 200) {
						alert('Cám ơn bạn đã thanh toán thành công!');
						jumpToOtherPage(URL);
					} else {
						alert('Thanh toán thất bại!');
						$('#waiting_for_creditpoint_payment').fadeOut(function() {
							$('#btn_creditpoint_process_payment').attr('disabled', false);
							$('#btn_giftpoint_process_payment').attr('disabled', false);
							$('#btn_online_payment').attr('disabled', false);
							$('#btn_point_payment').attr('disabled', false);
						});
					}
				},
				complete : function() {
					$('#waiting_for_creditpoint_payment').fadeOut(function() {
						$('#btn_creditpoint_process_payment').attr('disabled', false);
						$('#btn_giftpoint_process_payment').attr('disabled', false);
						$('#btn_online_payment').attr('disabled', false);
						$('#btn_point_payment').attr('disabled', false);
					});
				}
			});
		});
	}
}

function processGiftPointPayment() {
	cfirm = confirm('Bạn có muốn thành toán?');
	if (cfirm == true) {
		$('#btn_creditpoint_process_payment').attr('disabled', true);
		$('#btn_giftpoint_process_payment').attr('disabled', true);
		$('#btn_online_payment').attr('disabled', true);
		$('#btn_point_payment').attr('disabled', true);
		$('#waiting_for_giftpoint_payment').fadeIn(function() {
			$.ajax({
				url : URL + 'payment/processGiftPointPayment',
				type : 'post',
				dataType : 'json',
				data : {

				},
				success : function(response) {
					if (response == 200) {
						alert('Cám ơn bạn đã thanh toán thành công!');
						jumpToOtherPage(URL);
					} else {
						alert('Thanh toán thất bại!');
						$('#waiting_for_giftpoint_payment').fadeOut(function() {
							$('#btn_creditpoint_process_payment').attr('disabled', false);
							$('#btn_giftpoint_process_payment').attr('disabled', false);
							$('#btn_online_payment').attr('disabled', false);
							$('#btn_point_payment').attr('disabled', false);
						});
					}
				},
				complete : function() {
					$('#waiting_for_giftpoint_payment').fadeOut(function() {
						$('#btn_creditpoint_process_payment').attr('disabled', false);
						$('#btn_giftpoint_process_payment').attr('disabled', false);
						$('#btn_online_payment').attr('disabled', false);
						$('#btn_point_payment').attr('disabled', false);
					});
				}
			});
		});
	}
}

/*END PROCESSING POINT PAYMENT*/
/*----------------------------------*/

/*LOAD PAYMENT DETAIL*/
function loadPaymentDetail() {
	$.ajax({
		url : URL + 'payment/loadPaymentDetail',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			var html = '';
			html = '<tr>';
			html += '<th  style="border: none">DỊCH VỤ</th>';
			html += '<th  style="border: none">NGÀY - GIỜ</th>';
			html += '<th  style="border: none">GIÁ</th>';
			html += '<th  style="border: none">SỐ LƯỢNG</th>';
			html += '<th  style="border: none">TỔNG TIỀN</th>';
			html += '</tr>';
			if (response.booking != '' || response.eVoucher != '' || response.client_info != '') {
				var total_money = 0;
				$.each(response.booking, function(index, item) {
					var time_booking = item.booking_detail_time.split(':');
					var total_minutes = parseInt(time_booking[0]) * 60 + parseInt(time_booking[1]);
					var setAMPM = 'AM';
					if (total_minutes > (12 * 60)) {
						setAMPM = 'PM';
					}
					html += '<tr>';
					html += '<td width="38%">' + item.user_service_name.toUpperCase() + ' - <b>' + item.user_business_name + '</b></td>';
					html += '<td width="27%">' + formatDate(item.booking_detail_date) + ' - <b class="text-danger"><i>' + item.booking_detail_time + setAMPM + '</i></b></td>';
					html += '<td width="12%">' + $.number(item.choosen_price) + ' VNĐ</td>';
					html += '<td width="10%" align="center">' + item.booking_quantity + '</td>';
					html += '<td width="13%">' + $.number(parseInt(item.choosen_price) * parseInt(item.booking_quantity)) + ' VNĐ</td>';
					html += '</tr>';
					total_money = total_money + parseInt(item.choosen_price) * parseInt(item.booking_quantity);
				});
				$.each(response.eVoucher, function(index, item) {
					html += '<tr>';
					html += '<td width="38%">' + item.user_service_name.toUpperCase() + ' - <b>' + item.user_business_name + '</b></td>';
					html += '<td width="27%"><i class="text-danger"><b>e-Voucher</b></i> - Ngày hết hạn : ' + formatDate(item.eVoucher_due_date) + '</td>';
					html += '<td width="12%">' + $.number(item.choosen_price) + ' VNĐ</td>';
					html += '<td width="10%" align="center">' + item.booking_quantity + '</td>';
					html += '<td width="13%">' + $.number(parseInt(item.choosen_price) * parseInt(item.booking_quantity)) + ' VNĐ</td>';
					html += '</tr>';
					total_money = total_money + parseInt(item.choosen_price) * parseInt(item.booking_quantity);
				});
				$.each(response.gift, function(index, item) {
					html += '<tr>';
					html += '<td width="38%"><b class="text-info">Gift Voucher</b></td>';
					html += '<td width="27%"><b class="text-info">Ngày gửi mã:</b> ' + item.gift_voucher_date  + '</td>';
					html += '<td width="12%">' + $.number(item.gift_voucher_price) + ' VNĐ</td>';
					html += '<td width="10%" align="center">N/A</td>';
					html += '<td width="13%">' + $.number(parseInt(item.gift_voucher_price)) + ' VNĐ</td>';
					html += '</tr>';
					total_money = total_money + parseInt(item.gift_voucher_price);
				});
				$.each(response.client_info[0], function(key, value) {
					if (key == 'client_join_date') {
						var join_date = value.split(' ');
						$('#' + key + ' p i').text(formatDate(join_date[0]) + ' ' + join_date[1]);
					} else {
						$('#' + key + ' p i').text(value);
					}
				});
				html += '<tr>';
				html += '<td style="border-top: none" colspan="5" id="total_all_money"><b id="old_price" class="pull-right text-danger">TỔNG CỘNG: ' + $.number(total_money) + ' VNĐ </b></td>';
				html += '</tr>';
				if(response.client_info[0].client_creditpoint != '0'){
					html += '<tr>';
	                html += '<td style="border-top: none" colspan="5"><button id="minus_price" onclick="checkCreditPointAmount()" class="btn btn-orange pull-right">$ Bạn có: ' + response.client_info[0].client_creditpoint + ' credit point. Trừ vào giỏ hàng</button></td>';
	                html += '</tr>';
               	}
				$('table#table_payment_detail').html(html);
			}
		},
		complete : function(){
			$('#minus_price').on('click', function(){
				$(this).hide();
			});
			saveHobby();
		}
	});

}

function checkCreditPointAmount(){
	$('#back-dialog').modal('show');

	$.ajax({
		url : URL + 'payment/checkCreditPointAmount',
		type : 'post',
		success : function(response){
			if(response == 'success'){
				alert('Cám ơn bạn đã thanh toán thành công!');
				jumpToOtherPage(URL);
			}else if(response == 'error'){
				alert('Thanh toán thất bại, vui lòng nhập lại thông tin!');
			}else{
				$('#back-dialog').modal('hide');

				$('#minus_price').on('click', function(){
					$(this).hide();
				});
				$('#old_price').css('text-decoration', 'line-through');
				$('#total_all_money').append('<br/><b class="pull-right text-success"> TỔNG CỘNG: ' + $.number(response) + ' VNĐ</b>');
			}
		}
	});
}

function saveHobby(){
	$.ajax({
		url : URL + 'payment/saveHobby',
		type : 'post',
		success : function(response){
			
		}
	});
}

/*END LOAD PAYMENT DETAIL*/
/*----------------------------------*/

/*JUMP TO PAYMENT TAB*/
function jumbToPaymentTab(tab) {
	checkSessionIdle();
	$('#' + tab).siblings().hide();
	$('#' + tab).fadeIn();
	$('#btn_' + tab).addClass('btn-choose').removeClass('btn-orange');
	$('#btn_' + tab).siblings().addClass('btn-orange').removeClass('btn-choose');
}

/*END JUMP TO PAYMENT TAB*/

/*SELECT PAYMENT TYPE*/
function selectPaymentType(type) {
	PAYMENT_TYPE = type;
	// console.log(PAYMENT_TYPE);
}

/*END SELECT PAYMENT TYPE*/
/*----------------------------------*/