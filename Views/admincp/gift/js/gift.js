$(document).ready(function() {
	$('.gif-status').val(function(){
		return $(this).attr('data-status');
	});
	$('.save-status').on('click', function(){
		var giftId = $(this).attr('data-id');
		var status = $('.gif-status').val();
		$.ajax({
			url : URL + 'admincp_gift/updateStatus',
			type : 'post',
			data : {
				gift_id: giftId,
				gift_status : status
			},
			success : function(response) {
				if(response){
					alert('Cập nhật trạng thái thành công.');
				}else{
					alert('Cập nhật trạng thái thất bại. Vui lòng thử lại.');
				}
			},
			complete : function() {}
		});
	});

	var arrTable = {
			"oLanguage" : {
				"sZeroRecords" : "Không có dữ liệu nào cả.",
				"sSearch" : "Tìm kiếm: ",
				"sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
				"sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
				"sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
			}
		}

		oTablePrice = $('#gift_price_list').dataTable();
		oTableEmail = $('#gift_email_list').dataTable();
		oTableCard = $('#gift_card_list').dataTable();

		loadDetailPrice();
		loadDetailEmail();
		loadDetailCard();
});

function loadDetailPrice(){
	var gift_id ='';
	var gift_price ='';
	var gift_status ='';

	//load price

	oTablePrice.delegate("tbody tr","click",function(){
		gift_id = $(this).attr('data-id');
		gift_status = $(this).attr('data-status');
		gift_price = $(this).attr('data-price');
		$('#gift_edit_price').val(gift_price).attr('data-id',gift_id);
		$('#gift_edit_status').val(gift_status);
		$('#modal-gift-price').modal('show');
	});

	// update price
	$('#save_gift_price').on('click',function(){
		var girt_id = $('#gift_edit_price').attr('data-id');
		var gift_price = $('#gift_edit_price').val();
		var gift_status = $('#gift_edit_status').val();
		$.ajax({
			url : URL + 'admincp_gift/updatePrice',
			type : 'post',
			data : {
				gift_id: girt_id,
				gift_price : gift_price,
				gift_status : gift_status
			},
			success : function(response) {
				if(response != 0){
					jAlert('Cập nhật giá thành công.');
					$('.gift_price_item').each(function(){
						if($(this).attr('data-id') == girt_id){
							console.log(response);
							$(this).attr('data-status',gift_status);
							$(this).attr('data-price',gift_price);
							$(this).find('td.td-gift-price').html(response +' VNĐ');
							var html = (gift_status == 1)?'<label class="label label-confirmed">Hiện</label>' : '<label class="label label-default">Ẩn</label>';
							$(this).find('td.td-gift-price-status').html(html);
						}
					});

					$('#modal-gift-price').modal('hide');
				}else{
					jAlert('Cập nhật giá thất bại. Giá đã tồn tại hoặc bị mất');
				}
			}
		});

	});

	//delete price
	$('#delete_gift_price').on('click',function(){
		var r = confirm("Bạn có muốn xóa giá này không!");
		if (r == true) {
			var girt_id = $('#gift_edit_price').attr('data-id');
			$.ajax({
				url : URL + 'admincp_gift/deletePrice',
				type : 'post',
				data : {gift_id: girt_id},
				success : function(response) {
					if(response){
						$('.gift_price_item').each(function(){
							if($(this).attr('data-id') == girt_id){
								$(this).remove();
							}
						});
						$('#modal-gift-price').modal('hide');
					}else{
						alert('Xóa giá thất bại. Vui lòng thử lại.');
					}
				}
			});
		}
	});

	// add new price
	$('#add-new-price').on('click', function(){
		$('#modal-gift-price-add').modal('show');
	});

	$('#add_gift_price').on('click',function(){
		var gift_price = $('#gift_add_price').val();
		var gift_status = $('#gift_add_status').val();
		$.ajax({
			url : URL + 'admincp_gift/addPrice',
			type : 'post',
			data : {
				gift_price : gift_price,
				gift_status : gift_status
			},
			success : function(response) {
				var data= $.parseJSON(response);
				if(response != 0){
					alert('Thêm mới giá thành công.');

					var tag = $('<tr/>',{class:'gift_price_item','data-status':gift_price, 'data-id':data.id, 'data-price':gift_price});
					//var html = '<tr class="gift_price_item" data-status="'+gift_price+'" data-id = "'+data.id+'" data-price = "'+gift_price+'">';
					var html = '<td class="td-gift-item-price text-right td-gift-price" data-id="'+data.id+'">'+data.price+' VNĐ</td>';
						html += '<td class="td-gift-item-price td-gift-price-status text-right" data-id="'+data.id+'">';
							if(gift_status == 1 ){
								html += '<label class="label label-confirmed">Hiện</label>';
							}else{
								html += '<label class="label label-default">Ẩn</label>';
							}
						html += '</td>';
						html += '</tr>';
					tag.on('click', function(){
						gift_id = $(this).attr('data-id');
						gift_status = $(this).attr('data-status');
						gift_price = $(this).attr('data-price');
						$('#gift_edit_price').val(gift_price).attr('data-id',gift_id);
						$('#gift_edit_status').val(gift_status);
						$('#modal-gift-price').modal('show');
					});
					var htmltag = tag.append(html);
					$('#gift_price_list tbody').append(htmltag);
					$('#modal-gift-price-add').modal('hide');
				}else{
					alert('Thêm giá mới thất bại.');
				}
			}
		});

	});


}

function loadDetailEmail(){
	var giftTag = $('.gift-voucher-email-wrapper');
	giftTag.find('span.gift-email-sender').html('...');
	oTableEmail.delegate("tbody tr","click",function(){
		var gift_id = $(this).attr('data-id');
		giftTag.find('.gift-email-status').attr('data-id',gift_id);
		$('#modal-gift-email').modal('show');
		$.ajax({
			url : URL + 'admincp_gift/loadEmailDetail',
			type : 'post',
			dataType : 'json',
			data : {gift_id : gift_id},
			success : function(data) {
				giftTag.find('.gift-email-sender').text(data[0].client_name);
				giftTag.find('.gift-email-receiver').text(data[0].gift_voucher_name);
				giftTag.find('.gift-email-receiver-email').text(data[0].gift_voucher_email);
				giftTag.find('.gift-email-code').text(data[0].gift_voucher_code);
				giftTag.find('.gift-email-due-date').text(data[0].gift_voucher_due_date);
				giftTag.find('.gift-email-status').attr('data-status',data[0].gift_voucher_status).val(data[0].gift_voucher_status);
				giftTag.find('.gift-email-message').text(data[0].gift_voucher_message);
			}
		});
	})

	$('.save-status-email').on('click', function(){
		var giftStatus = giftTag.find('.gift-email-status').val();
		var gift_id = giftTag.find('.gift-email-status').attr('data-id');
		$.ajax({
			url: URL + 'admincp_gift/updateStatus',
			type: 'post',
			data: {gift_status: giftStatus, gift_id: gift_id},
			success: function (data) {
				if(data > 0) {
					alert('Cập nhật thành công.')
					var html ='';
					switch(parseInt(giftStatus)){
						case 0:
							html = '<label class="label label-default" style="padding: 3px 5px 16px 5px;">Chưa xác thực</label>';
							break;
						case 1:
							html = '<label class="label label-confirmed" style="padding: 3px 5px 16px 5px; ">Đã xác thực</label>';
							break;
						default : html = 'Undefined'; break;

					}
					$('tr.gift-voucher-email-item[data-id="'+gift_id+'"]').find('td.td-status').html(html);
				}else{
					alert('Cập nhật trạng thái thất bại, xin vui lòng thử lại.')
				}
				$('#modal-gift-email').modal('hide');
				giftTag.find('span.gift-email-sender').html('...');
			}
		});
	});
}

function loadDetailCard() {
	var giftTag = $('.gift-voucher-card-wrapper');
	giftTag.find('span.gift-card-sender').html('...');
	oTableCard.delegate("tbody tr","click",function(){
		var gift_id = $(this).attr('data-id');
		giftTag.find('.gift-card-status').attr('data-id', gift_id);
		$('#modal-gift-card').modal('show');

		$.ajax({
			url: URL + 'admincp_gift/loadCardDetail',
			type: 'post',
			dataType: 'json',
			data: {gift_id: gift_id},
			success: function (data) {
				giftTag.find('.gift-card-sender').text(data[0].client_name);
				giftTag.find('.gift-card-receiver').text(data[0].gift_voucher_name);
				giftTag.find('.gift-card-email').text(data[0].gift_voucher_email);
				giftTag.find('.gift-card-code').text(data[0].gift_voucher_code);
				giftTag.find('.gift-card-due-date').text(data[0].gift_voucher_due_date);
				giftTag.find('.gift-card-status').attr('data-status', data[0].gift_voucher_status).val(data[0].gift_voucher_status);
				giftTag.find('.gift-card-message').text(data[0].gift_voucher_message);
				giftTag.find('.gift-card-address').text(data[0].gift_voucher_address);
				giftTag.find('.gift-card-phone').text(data[0].gift_voucher_phone);
			}
		});
	});

	$('.save-status-card').on('click', function () {
		var giftStatus = giftTag.find('.gift-card-status').val();
		var gift_id = giftTag.find('.gift-card-status').attr('data-id');
		$.ajax({
			url: URL + 'admincp_gift/updateStatus',
			type: 'post',
			data: {gift_status: giftStatus, gift_id: gift_id},
			success: function (data) {
				console.log(data);
				if (data > 0) {
					alert('Cập nhật thành công.')
					var html = '';

					switch (parseInt(giftStatus)) {
						case 0:
							html = '<label class="label label-default" style="width: 82px; padding: 3px 5px 16px 5px;">Chưa in</label>';
							break;
						case 1:
							html = '<label class="label label-confirmed" style="width: 82px; padding: 3px 5px 16px 5px; ">Đã sử dụng</label>';
							break;
						case 2:
							html = '<label class="label label-attention" style="width: 82px; padding: 3px 5px 16px 5px; ">Đã in</label>';
							break;
						case 3:
							html = '<label class="label " style="background-color: green ;width: 82px; padding: 3px 5px 16px 5px;">Đã giao</label>';
							break;
						case 4:
							html = '<label class="label label-critical" style="width: 82px; padding: 3px 5px 16px 5px;">Lỗi</label>';
							break;
						default :
							html = 'Undefined';
							break;

					}
					$('tr.gift-voucher-card-item[data-id="' + gift_id + '"]').find('td.td-status').html(html);
				} else {
					alert('Cập nhật trạng thái thất bại, xin vui lòng thử lại.')
				}
				$('#modal-gift-card').modal('hide');
				giftTag.find('span.gift-card-sender').html('...');
			}
		});
	});

	$('.td-gift-item-price').on('click', function (e) {
		e.stopPropagation();
	});
	$('.gift-items-checked').on('click', function (e) {
		e.stopPropagation();

	});

	$('#gift_voucher_send_card').on('click', function () {
		if ($("input.gift-items-checked:checked").length > 0) {
			$param = '';
			$("input:checked").each(function () {
				$param += $(this).attr('data_id') + ',';
			})
			var url = URL + "admincp_gift/export_excel_card";
			url = url + '&data=' + $param.substr(0, $param.length - 1);
			window.open(url, 'download');
			$("input.gift-items-checked:checked").prop('checked', false);
		} else {
			alert('Hãy chọn Gift Voucher !')
		}
	});
}
