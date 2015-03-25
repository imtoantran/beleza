$(document).ready(function() {
	Page.init();

});

var Page = function(){

	var xhrGet_page = function() {
		if(SLUG == "" || SLUG == null){
			window.location(URL + 'error');
			return false;
		}

		var url = URL + 'page/xhrGet_page';
		$.get(url, {'page_slug':SLUG}, function(data) {
	        if(!jQuery.isEmptyObject(data)) {
				$('#page_title').text(data['page_title']);
				$('#page_content').html(data['page_content']);
	        }
	    }, 'json')
	    .done(function(){
	        
	    });
	}

	var xhrGet_sidebar = function() {
		var url = URL + 'page/xhrGet_sidebar';
		$.get(url, function(data) {
	        if(!jQuery.isEmptyObject(data)) {
				$('#sidebar_iframe').html(data['sidebar_iframe']);
				var sidebar_links = JSON.parse(data['sidebar_link']);
				$.each(sidebar_links, function(key, value) {
					$('#sidebar_links').append('<li><a href="'+value+'">'+key+'</a></li>');
				});
	        }
	    }, 'json')
	    .done(function(){
	        
	    });
	}
	
	return {
		init : function() {
			xhrGet_page();
			xhrGet_sidebar();
		}
	}
}();