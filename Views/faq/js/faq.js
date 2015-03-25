$(document).ready(function() {

	var url = URL + 'faq/xhrGet_page_faq';
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

	FAQ.init();
	Question.init();
	News.init();

});

var FAQ = function() {
	var list_st = $('ul#list_service_type');

	var goto_askQuestion = function() {
		gtaQ_form = $('#goto_askQuestion_form');
		gtaQ_form.on('submit', function(){
			var _self = $(this);
			var data = _self.serializeArray();
			var url = URL + 'faq/goto_askQuestion';
			$.post(url, data, function(){

			})
			.done(function(){
				window.location.href = URL + 'faq/ask_question';
			});

			return false;
		});
	}

	var xhrGet_list_service_type = function() {
		var html = '<li data-type="service_type" data-id=":service_type_id" title=":service_type_name">'
			// +		'<a href="javascript:void(0)">'
			+		'<div align="center">'
			+			'<img class="img-circle" src=":service_type_image" width="62" height="62" />'
			+		'</div>'
			+		'<div align="center">'
			+			'<strong>:service_type_name_short</strong>'
			+		'</div>'
			// +		'</a>'
			+	'</li>';

		var url = URL + 'faq/xhrGet_list_service_type';
		$.get(url, function(data) {

	        if(!jQuery.isEmptyObject(data)) {
				// console.log(data);
				var out = '';
				$.each(data, function(index, value) {
					out = html.replace(':service_type_id', value['service_type_id']);
					out = out.replace(':service_type_name', value['service_type_name']);
					out = out.replace(':service_type_name_short', value['service_type_name_short']);
					out = out.replace(':service_type_image', URL + value['service_type_image']);

					list_st.append(out);
				});
				// Click -> load service
				xhrGet_list_service();
	        }
	    }, 'json')
	    .done(function(){
	        jQuery(function($){ 
				$('ul#list_service_type').easyPaginate({
					step : 8,
					delay: 100,
					numeric: true,
					nextprev: true
				});
			}); 

			// việt hóa
			$("#pagination").find('.prev').text("Trước");
			$("#pagination").find('.next').text("Sau");
	    });
	}

	var xhrGet_list_service = function() {
		var st_li = list_st.find('li');

		var html_back = '<li class="back">'
			+		'<div align="center">'
			+			'<img class="img-circle" src="' + URL + 'public/assets/img/arrow-80-128.png" width="62" height="62" />'
			+		'</div>'
			+		'<div align="center">'
			+			'<i>Trở lại</i>'
			+		'</div>'
			+	'</li>';

		var html = '<li data-type="service" data-id=":service_id">'
			+		'<a href=":link">'
			+			'<div align="center">'
			+				'<img class="img-circle" src=":service_image" width="62" height="62" />'
			+			'</div>'
			+			'<div align="center">'
			+				'<strong>:service_name</strong>'
			+			'</div>'
			+		'</a>'
			+	'</li>';

		st_li.on('click', function(){
			var _self = $(this);
			var data_id = _self.attr('data-id');
			var data_type = _self.attr('data-type');

			// clear
			list_st.html('');
			$('#pagination').remove();

			if(data_type == 'service_type') {
				var url = URL + 'faq/xhrGet_list_service';
				$.get(url, {'service_type_id':data_id}, function(data) {
			        if(!jQuery.isEmptyObject(data)) {
			        	list_st.append(html_back);
						var out = '';
						$.each(data, function(index, value) {
							out = html.replace(':service_id', value['service_id']);
							out = out.replace(':service_name', value['service_name']);
							out = out.replace(':service_image', URL + value['service_image']);
							out = out.replace(':link', URL + 'faq/find_location?sid=' + value['service_id']);

							list_st.append(out);
						});

						// sự kiện quay lui (back)
						goto_back();

			        } else {
			        	list_st.append('Không có kết quả');
			        }
			    }, 'json')
			    .done(function(){
			        jQuery(function($){ 
						$('ul#list_service_type').easyPaginate({
							step : 8
						});
					}); 
			    });
			}

			
		});

	}

	var goto_back = function() {
		var btnAct_back = list_st.find('li.back');

		btnAct_back.on('click', function() {
			// clear
			list_st.html('');
			$('#pagination').remove();

			// 
			xhrGet_list_service_type();
		});
	}


	return {
		init : function() {
			goto_askQuestion();
			xhrGet_list_service_type();
		}
	}
}();

var Question = function() {

	var xhrGet_questions = function() {
		var html = '<div class="faq-3-q col-md-6 clearfix">'
			+	'<div class="image col-xs-2">'
			+		'<img class="image-responsive img-circle" width="63" height="63" src=":client_avatar" />'
			+	'</div>'
			+	'<div class="col-xs-10">'
			+		'<div class="title-q">'
			+			'<a href=":faq_link">:faq_title</a>'
			+		'</div>'
			+		'<div class="source-q">'
			+			'<i>Hỏi bởi :client_name </i> | <i> lúc :faq_created</i>'
			+		'</div>'
			+		'<div class="answer-q">'
			+			':faq_content... <!--<a class="pull-right" href=":faq_link">Xem chi tiết...</a>-->'
			+		'</div>'
			+	'</div>'
			+'</div>';

		var out = '';
		var question_list = $('#question_list');

		var url = URL + 'faq/xhrGet_questions';
		$.get(url, function(data) {
	        if(data != 0) {
				$.each(data, function(index, value) {
					out = html.replace(':faq_title', value['faq_title']);
					out = out.replace(':faq_content', value['faq_content']);
					out = out.replace(':faq_created', moment(value['faq_created'], 'YYYY-MM-DD HH:mm:ss').format('HH:mm, DD/MM/YYYY'));
					out = out.replace(':client_avatar', URL + value['client_avatar']);
					out = out.replace(':client_name', value['client_name']);
					out = out.replace(/:faq_link/g, URL + 'faq/detail_question/' + value['faq_id']);

					question_list.append(out);
				});
	        }
	    }, 'json')
	    .done(function(){
	        
	    });
	}

	return {
		init : function () {
			xhrGet_questions();
		}
	}
}();

var News = function() {

	var xhrGet_list_news = function() {
		var html = '<div class="faq-3-q col-md-3 clearfix">'
			+	'<div class="image">'
			+		'<img class="img-thumbnail" width="154" height="100%" src="'+URL+':faq_image" />'
			+	'</div>'
			+	'<div class="">'
			+		'<div class="title-q">'
			+			'<a href=":faq_link">:faq_title</a>'
			+		'</div>'
			+		'<div class="source-q">'
			// +			'<i>Đăng bởi :faq_author </i> | <i> lúc :faq_created</i>'
			+		'</div>'
			+		'<div class="answer-q">'
			+			':faq_content... <!--<a class="pull-right" href=":faq_link">Xem chi tiết...</a>-->'
			+		'</div>'
			+		'<div class="news-btn-more pull-right">'
			+		'<a class="btn btn-sm btn-orange" href=":faq_link">Xem thêm</a>'
			+		'</div>'
			+	'</div>'
			+'</div>';

		var out = '';
		var news_list = $('#news_list');

		var url = URL + 'faq/xhrGet_list_news';
		$.get(url, function(data) {
	        if(data != 0) {
				$.each(data, function(index, value) {
					out = html.replace(':faq_title', value['faq_title']);
					out = out.replace(':faq_content', value['faq_content'].substr(0, 100));
					out = out.replace(':faq_created', moment(value['faq_created'], 'YYYY-MM-DD HH:mm:ss').format('HH:mm, DD/MM/YYYY'));
					out = out.replace(':faq_image', value['faq_image']);
					out = out.replace(':faq_author', value['faq_author']);
					out = out.replace(/:faq_link/g, URL + 'faq/beauty_news/' + value['faq_id']);

					news_list.append(out);
				});
	        }
	    }, 'json')
	    .done(function(){
	        
	    });
	}

	return {
		init : function () {
			xhrGet_list_news();
		}
	}
}();