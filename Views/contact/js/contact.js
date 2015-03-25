$(document).ready(function(){
	Contact.init();
});

var Contact = function() {
	var xhrGet_page_contact = function() {
		var url = URL + 'contact/xhrGet_page_contact';
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
	}

	var send_message = function() {
		var contact_form = $("#contact_form");
	    contact_form.on('submit', function(){
	        var _self = $(this);
	        
	        var data_insert = _self.serializeArray();
	
	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	
	        loading.fadeIn();
	        done.hide();
	
	        var url = URL + 'contact/send_message';
	        $.post(url, data_insert, function(result){
	            if(result == 'success') {
	            	// Do it...
	
	                isSuccess = true;
	            }
	        })
	        .done(function(){
	            loading.hide();
	            done.show();
	
	            if(isSuccess) {
	            	// Do it...
					alert("Cảm ơn bạn đã gửi tin nhắn đến cho chúng tôi! \n Chúc bạn một ngày tốt lành");
	            } else {
	            	
	            }
	            
	        });
	        return false;
	    });    
	}

	return {
		init: function() {
			xhrGet_page_contact();
			send_message();
		}
	}
}();