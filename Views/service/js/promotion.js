$(document).ready(function() {
	loadListPromotion();
});

var loadListPromotion = function (){
	

	$.ajax({
		url: URL + 'service/loadListPromotion',
		type: 'post',
		dataType: 'json',
		data: {user_id: USER_ID}
	})
	.done(function(response) {
			console.log(response);
		var html = '';
		if(response.length > 0){
			$.each(response, function(index, val) {
				var id_promotion = val.promotion_id;
				var title = val.promotion_title;
				// var content = val.promotion_content;
		
				var image   = JSON.parse(val.promotion_img);
					thumbnail   = image.thumbnail;
					img   = image.img;
				var startDate = val.promotion_start_date;
					if(startDate.length>0){
						startDate = startDate.substr(8, 2)+'/'+ startDate.substr(5, 2)+'/'+startDate.substr(0, 4);	
					}
					
				var endDate   = val.promotion_end_date;
					if(endDate.length>0){
						endDate = endDate.substr(8, 2)+'/'+ endDate.substr(5, 2)+'/'+endDate.substr(0, 4);	
					}

				html += '<div class="row promotion-items-wrapp">';
					html += '<div class="col-md-2 promotion-items-img">';
						html += '<img  style="width:100px; height:60px" src="'+thumbnail+'">';
					html += '</div>';
					html += '<div class="col-md-8">';
						html += '<div class="promotion-items-title">'+title+'</div>';
						html += '<div class="promotion-items-time col-md-10">';
							html += '<i class="fa fa-calendar"> </i>';
							html += ' <span>'+startDate+'</span> <i class="fa fa-hand-o-right"> </i> <span>'+endDate+'</span>';
						html += '</div>';						
					html += '</div>';
					html += '<div class="promotion-items-view text-right col-md-2">';
						html += '<button class="btn btn-orange promotion-items-btn" data-endDate="'+endDate+'" data-startDate="'+startDate+'" data-toggle="modal" data-target="#info-promotion"';
						html += ' data-id-promotion="'+id_promotion+'">';
							html += '<span class="show_2_more_text">Xem thêm</span>';
						html += '</button>';
					html += '</div>';
				html += '</div>';
									
			});

			$('#tab-promotion').find('.promotion-content').html(html);

		} else {
			$('#tab-promotion').hide('fast');
		}

		
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		$('.promotion-items-btn').on('click', function(){
			var id = $(this).attr('data-id-promotion');
			var endDate = $(this).attr('data-endDate');
			var startDate = $(this).attr('data-startDate');
			
			$.ajax({
				url: URL + 'service/loadItemPromotion',
				type: 'post',
				dataType: 'json',
				data: {id_promotion: id},
			})
			.done(function(response) {
				$.each(response, function(index, val) {
					var title = val.promotion_title;
					var content = val.promotion_content;
					var image   = JSON.parse(val.promotion_img);
					img   = image.img;
					
					$('.promotion-item-start-date').text(startDate);
					$('.promotion-item-end-date').text(endDate);
					$('.promotion-item-title').text(title);
					$('.promotion-item-img').html('<img src="'+img+'" alt="" style="border: 1px solid #e9e9e9 !important; margin: 20px 0px; padding: 4px !important;">');
					$('.promotion-item-content').html(content);
				});

				// console.log(response.promotion_title);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});
		})
	});


var loadItemPromotion = function (){
	$('button.promotion-items-btn').on('click', function(){
		$(this).find('i.waiting_booking_detail').fadeIn();
	})
}	
	
}