$(document).ready(function() {
	
	Beauty_News.init();
});

var Beauty_News = function() {
	var content_news = $('#content_news');

	var faq_title = content_news.find('.faq_title');
	var faq_content = content_news.find('.faq_content');
	var faq_tag = content_news.find('.faq_tag');
	var faq_author = content_news.find('.faq_author');
	var faq_created = content_news.find('.faq_created');
	var faq_related = content_news.find('.faq_related');

	var fb_like = content_news.find('.fb-like');
	var fb_comments = $("#fb-comments");

	var xhrGet_content_news = function() {
		var url = URL + 'faq/xhrGet_content_news';
		$.get(url, {'data_id' : NEWS_ID}, function(data) {
	        if(data != 0) {
				faq_title.text(data['faq_title']);
				faq_content.html(data['faq_content']);

				var data_tag = JSON.parse(data['faq_tag']);
				$.each(data_tag, function(index, value) {
					faq_tag.append('<a href="/treatment/">'+value['text']+'</a>, ');
				});

				faq_created.text(moment(data['faq_created'], 'YYYY-MM-DD HH:mm:ss').format('HH:mm, DD/MM/YYYY') );
				// faq_author.text(data['faq_author']);
				faq_author.text('Beleza Việt Nam');

				// link facebook
				fb_like.attr('data-href', URL + 'faq/beauty_news/' + data['faq_id']);
				fb_comments.attr('data-href', URL + 'faq/beauty_news/' + data['faq_id']);

				// Tìm bài viết liên quan
				var html = '<li><a href=":faq_link">:faq_title</a></li>';
				var out = '';
				var url = URL + 'faq/xhrGet_news_related';
				$.get(url, {'tags_related' : data_tag, 'data_id' : NEWS_ID}, function(data) {
					if(!jQuery.isEmptyObject(data)) {
						$.each(data, function(index, value) {
							out = html.replace(':faq_link', URL + 'faq/beauty_news/' + value['faq_id']);
							out = out.replace(':faq_title', value['faq_title']);

							faq_related.append(out);
							console.log(out);
						});
					}
					
				},'json');

	        } else {
	        	window.location.href = URL + 'faq';
	        }
	    }, 'json')
	    .done(function(){
	        
	    });
	}

	return {
		init : function() {
			xhrGet_content_news();
		}
	}
}();