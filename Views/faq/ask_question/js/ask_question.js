$(document).ready(function() {
	// $('#faq_tag').multiSelect({
	//     // selectableOptgroup: true,
	//  //    selectableHeader: "<div class='custom-header'>Selectable items</div>",
	// 	// selectionHeader: "<div class='custom-header'>Selection items</div>",
	// 	// selectableFooter: "<small>* Tối đa là 5</small>",
	// 	selectionFooter: '<small>* Tối đa là 5</small>'
	// });
	
	Ask_Question.init();
});


var Ask_Question = function () {

	var askQuestion_form = $("#askQuestion_form");
	// var faq_title = $('input[name=faq_title]', askQuestion_form);
	// var faq_content = $('input[name=faq_content]', askQuestion_form);
	var faq_tag = $('input[name=faq_tag]', askQuestion_form);

	var xhrGet_service_system = function() {
		var url = URL + 'faq/ask_question/xhrGet_service_system';
		$.get(url, function(data){
			var data_select = [];
            $.each(data, function(index, group_s){
            	var childrens = [];
                if(typeof group_s['list_service_system'] !== 'undefined'){
                    $.each(group_s['list_service_system'], function(index, s){
                    	childrens.push({
                    		id: s['service_id'], 
                    		text: s['service_name']
                    	});
                    });
                }

                data_select.push({
                	text: group_s['service_type_name'], 
                	children: childrens
                });


            }); 

            // $('#faq_tag').multiSelect('data', data_select);
            
            faq_tag.select2({
            	multiple: true,
            	data: {
            		results: data_select
            	}
            });
        }, 'json');
	}

	var xhrInsert_question = function() {
		var btnAct_submit = askQuestion_form.find('.btnAct_submit');
	    askQuestion_form.on('submit', function(){
	        var _self = $(this);
	        
	        var data_insert = _self.serializeArray();
	        data_insert.push({ name: 'faq_tag', value: JSON.stringify(faq_tag.select2("data")) });

	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	
	        loading.fadeIn();
	        done.hide();
	
	        var url = URL + 'faq/ask_question/xhrInsert_question';
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
	            	alert('Câu hỏi của bạn đã được gửi đi \n\nCảm ơn bạn!');
					location.reload();
	            } else {
	                // jAlert("Thêm thất bại!");
	                alert('insert question error!');
	            }
	            
	        });

	        return false;
	    });    
	}

	var xhrGet_page_contact = function() {
		var url = URL + 'admincp_page/xhrGet_page_contact';
		$.get(url, function(data) {
	        if(!jQuery.isEmptyObject(data)) {
				$("#page_contact_belezavn").text(data['page_contact_belezavn']);
	        }
	    }, 'json')
	    .done(function(){
	        
	    });
	}

	return {
		init: function() {
			xhrGet_service_system();
			xhrInsert_question();
			xhrGet_page_contact();
		}
	}
}();
