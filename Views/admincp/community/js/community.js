
$(document).ready(function() {

	CKEDITOR.replace('editPost_content');
	CKEDITOR.replace('addPost_content');

	More_detail.init();
	Question.init();
	Post.init();
	Answer.init();
});	

var More_detail = function() {

	var xhrGet_service_system = function() {
		var data_select = [];

        var url = URL + 'admincp_community/xhrGet_service_system';
        $.get(url, function(data){
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
                })
            }); 

            var question_form = $("#question_form");
            $('input[name=faq_tag]', question_form).select2({
            	multiple: true,
            	data: {
            		results: data_select
            	}
            });

            var addPost_form = $("#addPost_form");
            $('input[name=faq_tag]', addPost_form).select2({
            	multiple: true,
            	data: {
            		results: data_select
            	}
            });

            var editPost_form = $("#editPost_form");
            $('input[name=faq_tag]', editPost_form).select2({
            	multiple: true,
            	data: {
            		results: data_select
            	}
            });
        }, 'json');
    }

    return {
    	init: function() {
    		xhrGet_service_system();
    	}
    }
}();

var Question = function() {
	
	var question_table = $("#question_table");
	var question_modal = $("#question_modal");
	var question_form = $("#question_form");

	var xhrGet_question = function() {
		var html = '<tr data_id=":data_id">'
            	+	'<td>:faq_id</td>'
            	+	'<td>:faq_title</td>'
            	+	'<td>:faq_created</td>'
            	+	'<td>:faq_status</td>'
            	+	'<td>:faq_created_sort</td>'
            	+	'<td>:faq_status_sort</td>'
            	+'</tr>';

        var status_0 = '<span class="label label-danger">Chưa duyệt</span>';
        var status_1 = '<span class="label label-confirmed">Đã duyệt</span>';

		var url = URL + 'admincp_community/xhrGet_question';
		var out = '';
		$.get(url, function(data) {
	        if(data.length > 0) {
	        	$.each(data, function(index, value) {
	        		out = html.replace(':faq_id', value['faq_id']);
					out = out.replace(':faq_title', value['faq_title']);
					out = out.replace(':faq_created', moment(value['faq_created'], "YYYY-MM-DD").format("YYYY-MM-DD"));
					out = out.replace(':faq_status', value['faq_status'] == 1 ? status_1 : status_0);
					out = out.replace(':faq_created_sort', moment(value['faq_created'], "YYYY-MM-DD").format("YYYYMMDD"));
					out = out.replace(':faq_status_sort', value['faq_status']);
					out = out.replace(':data_id', value['faq_id']);
					question_table.find('tbody').append(out);
	        	});
	        }	
	    }, 'json')
	    .done(function(){
	        question_table.dataTable({
                "aaSorting": [[ 4, "desc" ]],
                "aoColumns": [
                    { "bSortable": true },
                    { "bSortable": true },
                    { "bSortable": false },
                    { "bSortable": true },
                    { "bVisible": false },
                    { "bVisible": false }
                ],
                "aLengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"] // change per page values here
                ],

                // set the initial value
                "iDisplayLength": 10,
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    },
                    "sZeroRecords" : "Không có dữ liệu nào cả.",
                    "sSearch" : "Tìm kiếm: ",
                    "sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
                    "sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
                    "sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
                }
            });

            // jQuery('#question_table_wrapper .dataTables_filter input').addClass("form-control input-medium input-inline"); // modify table search input
            // jQuery('#question_table_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown
            // jQuery('#question_table_wrapper .dataTables_length select').select2(); // initialize select2 dropdown

            xhrGetOM_detail_question();
	    });
	}

	var xhrGetOM_detail_question = function() {
		var btnOM_question = $("#question_table tbody").find("tr");
		btnOM_question.on("click", function() {
			var _self = $(this);
			
			var data_id = _self.attr("data_id");

			var faq_id 	= $('input[name=faq_id]', question_form);
			var faq_title 	= $('input[name=faq_title]', question_form);
			var faq_content = $('textarea[name=faq_content]', question_form);
			var faq_tag 	= $('input[name=faq_tag]', question_form);
			var faq_status 	= question_form.find('.faq_status');
			var faq_id_answer = $('input[name=faq_id_answer]', question_form);
			var faq_content_answer = $('textarea[name=faq_content_answer]', question_form);

			var btnAct_confirm = question_form.find('.btnAct_confirm');

			var status_0 = '<span class="label label-default">Chưa duyệt</span>';
			var status_1 = '<span class="label label-confirmed">Đã duyệt</span>';
	
			var url = URL + 'admincp_community/xhrGetOM_detail_question';
			$.get(url, {"data_id" : data_id}, function(data) {
		        if(data['faq_id']) {
					faq_id.val(data['faq_id']);
					faq_title.val(data['faq_title']);
					faq_content.val(data['faq_content']);

					if(data['faq_tag']) {
						faq_tag.select2("data", JSON.parse(data['faq_tag']));
					}

					if(data['faq_status'] == 1) {
						faq_status.html(status_1)
						btnAct_confirm.addClass('.sr-only');
					} else {
						faq_status.html(status_0)
						btnAct_confirm.removeClass('sr-only');
						btnAct_confirm.attr("data_id", data['faq_id']);
					}

					var url = URL + 'admincp_community/xhrGet_answer_question';
					$.get(url, {"data_id" : data_id}, function(data){
						if(data != null){
							faq_content_answer.val(data['faq_content']);
							faq_id_answer.val(data['faq_id']);
						} else {
							faq_content_answer.val(null);
							faq_id_answer.val(null);
						}
						
					}, 'json');
		        }
		    }, 'json')
		    .done(function(){
		        question_modal.modal("show");
		    });
		});
	}

	var xhrUpdate_question_tag = function() {
		var btnAct_update_tag = question_form.find('.btnAct_update_tag');
		btnAct_update_tag.on("click", function(){
	        var _self = $(this);

	        var faq_id = $('input[name=faq_id]', question_form).val();
	        var faq_tag = $('input[name=faq_tag]', question_form).select2("data");

	        var data_update = {
	        	"faq_id" : faq_id,
	        	"faq_tag" : JSON.stringify(faq_tag)
	        };
	
	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	        
	        jConfirm('Cập nhật những lĩnh vực liên quan cho câu hỏi này?', 'Cập nhật lĩnh vực', function(e_msg){
	            if(e_msg == true){
	                loading.fadeIn();
	                done.hide();
	
	                var url = URL + "admincp_community/xhrUpdate_question_tag";
	                $.post(url, data_update, function(result){
	                    if (result == 'success') {
	                    	// faq_tag.select2("data", JSON.parse(data['faq_tag']));

	                        isSuccess = true;
	                    }
	                })
	                .done(function(){
	                    loading.hide();
	                    done.show();
	
	                    if(isSuccess){
	                    	jAlert("Đã xong!");
	                    } else {
	                        jAlert("Update error!");
	                    }
	                }); 
	            }
	        });

	        return false;
	    });
	}

	var xhrUpdate_question_confirm = function() {
		var btnAct_confirm = question_form.find('.btnAct_confirm');
		var faq_status 	= question_form.find('.faq_status');
		btnAct_confirm.on("click", function(){
	        var _self = $(this);
			
			var data_id = _self.attr("data_id");

	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	        
	        jConfirm('Duyệt câu hỏi này.<br>Sau khi duyệt, câu hỏi sẽ được phép đăng trên diễn đàn?', 'Duyệt câu hỏi', function(e_msg){
	            if(e_msg == true){
	                loading.fadeIn();
	                done.hide();
					
	                var url = URL + "admincp_community/xhrUpdate_question_confirm";
	                $.post(url, {"data_id": data_id}, function(result){
	                    if (result == 'success') {
	                    	_self.fadeOut();
	                    	faq_status.fadeOut();

	                    	_self.addClass('sr-only');
	                    	var status_1 = '<span class="label label-confirmed">Đã duyệt</span>';
	                    	faq_status.html(status_1);

	                        isSuccess = true;
	                    }
	                })
	                .done(function(){
	                    loading.hide();
	                    done.show();
	
	                    if(isSuccess){
	                    	faq_status.fadeIn();
	                    } else {
	                        jAlert("Update confirm question error!");
	                    }
	                }); 
	            }
	        });
	    });
	}

	var xhrUpdate_question = function() {
		question_form.on("submit", function(){
			var data_answer = $('textarea[name=faq_content_answer]', question_form).val();
			if(data_answer.length<=0){
				jAlert("Vui lòng nhập nội dung câu trả lời");
				return false;
			}
	        var _self = $(this);

	        var faq_id = $('input[name=faq_id]', question_form).val();
	        var faq_id_answer = $('input[name=faq_id_answer]', question_form).val();
	        var faq_tag = $('input[name=faq_tag]', question_form).select2("data");
			
	        var data_update = {
	        	"faq_id" : faq_id,
	        	"faq_tag" : JSON.stringify(faq_tag)
	        };

	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	        jConfirm('Duyệt và chỉnh sửa câu trả lời?', 'Cập nhật', function(e_msg){
	            if(e_msg == true){
	                loading.fadeIn();
	                done.hide();
	
	                var url = URL + "admincp_community/xhrUpdate_question";
	                $.post(url, data_update, function(result){
	                    if (result == 'success') {
	                    	if(faq_id_answer) {
	                    		xhrUpdate_answer();
	                    	} else {
	                    		xhrInsert_answer();
	                    	}

	                        isSuccess = true;
	                    }
	                })
	                .done(function(){
	                    loading.hide();
	                    done.show();
	
	                    if(isSuccess){
	                    	question_modal.modal("hide");
	                    } else {
	                        jAlert("Update error!");
	                    }
	                }); 
	            }
	        });

	        return false;
	    });

	}

	var xhrInsert_answer = function() {
		var data_id = $('input[name=faq_id]', question_form).val();
        var data_answer = $('textarea[name=faq_content_answer]', question_form).val();
		if(data_answer.length<=0){
			alert("Vui lòng nhập nội dung câu trả lời");
			return true;
		}
        var data_insert = {
        	"faq_parent_id" : data_id,
        	"faq_content" : data_answer
        };

        var url = URL + 'admincp_community/xhrInsert_answer';
        $.post(url, data_insert, function(result){
            if(result == 'success') {
                isSuccess = true;
            }
        })
        .done(function(){
            if(isSuccess) {
            	// Do nothing
            } else {
                jAlert("insert answer error!");
            }
            
        });  
	}

	var xhrUpdate_answer = function() {
		var data_id = $('input[name=faq_id_answer]', question_form).val();
        var data_answer = $('textarea[name=faq_content_answer]', question_form).val();
		if(data_answer.length<=0){
			return jAlert("Vui lòng nhập nội dung câu trả lời");
		}
        var data_update = {
        	"faq_id" : data_id,
        	"faq_content" : data_answer
        };

        var url = URL + 'admincp_community/xhrUpdate_answer';
        $.post(url, data_update, function(result){
            if(result == 'success') {
                isSuccess = true;
            }
        })
        .done(function(){
            if(isSuccess) {
            	// Do nothing
            } else {
                jAlert("update answer error!");
            }
            
        }); 
	}

	return {
		init: function() {
			xhrGet_question();
			xhrUpdate_question_tag();
			xhrUpdate_question_confirm();
			xhrUpdate_question();
		}
	}
}();

var Post = function() {
	var addPost_modal = $("#addPost_modal");
	var addPost_form = $("#addPost_form");

	var editPost_modal = $("#editPost_modal");
	var editPost_form = $("#editPost_form");

	var xhrGetOM_addPost= function() {
		var faq_content = $('textarea[name=faq_content]', addPost_form);
		var btnOM_addPost = $("#billing-details .btnOM_addPost");
		btnOM_addPost.on("click", function() {
			var _self = $(this);
			addPost_form[0].reset();
			faq_content.html('');
			addPost_modal.modal("show");
		});
	}

	var xhrInsert_post = function() {
		var faq_title = $('input[name=faq_title]', addPost_form);
		// var faq_content = $('textarea[name=faq_content]', addPost_form);
		var faq_tag = $('input[name=faq_tag]', addPost_form);
		var faq_status = $('select[name=faq_status]', addPost_form);
		var faq_image = $('input[name=faq_image]', addPost_form);

		var faq_content = CKEDITOR.instances.addPost_content.getData();

	    addPost_form.on('submit', function(e){
	    	e.preventDefault();
			/* imtoantran check title and content is empty start */
			if(CKEDITOR.instances.addPost_content.getData().length*faq_title.length<=0)
			{
				jAlert("Vui lòng nhập tiêu đề và nội dung");
				return false;
			}
			/* imtoantran check title and content is empty end */
			var _self = $(this);

	        var data_insert = new FormData($(this)[0]);
	        
	        data_insert.append("faq_tag", JSON.stringify(faq_tag.select2("data")));
	
	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	
	        loading.fadeIn();
	        done.hide();

	        var url = URL + 'admincp_community/xhrInsert_post';
	        // $.post(url, data_insert, function(result){
	        //     if(result == 'success') {
	        //     	// Do it...
	        //         isSuccess = true;
	        //     }
	        // })
	        // .done(function(){
	        //     loading.hide();
	        //     done.show();
	
	        //     if(isSuccess) {
	        //     	jAlert("Thêm thành công!");
	        //     } else {
	        //         jAlert("Thêm thất bại!");
	        //     }
	            
	        // });

	        $.ajax({
		        url: url,
		        type: 'POST',
		        data: data_insert,
		        async: false,
		        success: function (result) {
		            if(result == 'success') {
		            	// Do it...
		                isSuccess = true;
		            }
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    })
		    .done(function(){
		    	loading.hide();
	            done.show();
	
	            if(isSuccess) {
	            	jAlert("Thêm thành công!");
	            	location.reload();
	            } else {
	                jAlert("Thêm thất bại!");
	            }
		    });

	        return false;
	    });    
	}

	var xhrGet_post = function() {
		var post_table = $('#post_table');
		var html = '<tr data_id=":data_id">'
            	+	'<td>:faq_id</td>'
            	+	'<td>:faq_title</td>'
            	+	'<td>:faq_created</td>'
            	+	'<td>:faq_status</td>'
            	+	'<td>:faq_created_sort</td>'
            	+	'<td>:faq_status_sort</td>'
            	+'</tr>';

        var status_0 = '<span class="label label-danger">Chưa duyệt</span>';
        var status_1 = '<span class="label label-confirmed">Đã duyệt</span>';

		var url = URL + 'admincp_community/xhrGet_post';
		var out = '';
		$.get(url, function(data) {
	        if(data.length > 0) {
	        	$.each(data, function(index, value) {
	        		out = html.replace(':faq_id', value['faq_id']);
					out = out.replace(':faq_title', value['faq_title']);
					out = out.replace(':faq_created', moment(value['faq_created'], "YYYY-MM-DD").format("YYYY-MM-DD"));
					out = out.replace(':faq_status', value['faq_status'] == 1 ? status_1 : status_0);
					out = out.replace(':faq_created_sort', moment(value['faq_created'], "YYYY-MM-DD").format("YYYYMMDD"));
					out = out.replace(':faq_status_sort', value['faq_status']);
					out = out.replace(':data_id', value['faq_id']);
					post_table.find('tbody').append(out);
	        	});
	        }	
	    }, 'json')
	    .done(function(){
	        post_table.dataTable({
                "aaSorting": [[ 4, "desc" ]],
                "aoColumns": [
                    { "bSortable": true },
                    { "bSortable": true },
                    { "bSortable": false },
                    { "bSortable": true },
                    { "bVisible": false },
                    { "bVisible": false }
                ],
                "aLengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"] // change per page values here
                ],

                // set the initial value
                "iDisplayLength": 10,
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    },
                    "sZeroRecords" : "Không có dữ liệu nào cả.",
                    "sSearch" : "Tìm kiếm: ",
                    "sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
                    "sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
                    "sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
                }
            });

            // jQuery('#question_table_wrapper .dataTables_filter input').addClass("form-control input-medium input-inline"); // modify table search input
            // jQuery('#question_table_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown
            // jQuery('#question_table_wrapper .dataTables_length select').select2(); // initialize select2 dropdown

            xhrGetOM_detail_post();
	    });
	}

	var xhrGetOM_detail_post = function() {
		var faq_id = $('input[name=faq_id]', editPost_form);
		var faq_title = $('input[name=faq_title]', editPost_form);
		var faq_content = $('textarea[name=faq_content]', editPost_form);
		var faq_tag = $('input[name=faq_tag]', editPost_form);
		var faq_status = $('select[name=faq_status]', editPost_form);
		var faq_image = $('input[name=faq_image]', editPost_form);

		var fileinput_preview = editPost_form.find('.fileinput-preview');
		
		var tr = $('#post_table tbody').find('tr');
		tr.on("click", function() {
			var _self = $(this);
	
			var data_id = _self.attr("data_id");
			var data_get = {
				"data_id" : data_id
			}
		
			var url = URL + 'admincp_community/xhrGet_detail_post';
			$.get(url, data_get, function(data) {
		        if(!jQuery.isEmptyObject(data)) {
					faq_id.val(data['faq_id']);
					faq_title.val(data['faq_title']);
					// faq_content.html(data['faq_content']);
					// $('#editPost_content').htmlcode(data['faq_content']);
					// faq_image.val(data['faq_image']);
					fileinput_preview.html('<img src="' + URL + data['faq_image'] + '" />');

					if(data['faq_tag']) {
						faq_tag.select2("data", JSON.parse(data['faq_tag']));
					}
					faq_status.find('option[value='+data['faq_status']+']').prop("selected", true);

					CKEDITOR.instances.editPost_content.setData(data['faq_content']);
		        }
		    }, 'json')
		    .done(function(){
		        editPost_modal.modal("show");
		    });
		});
		
	}


	var xhrUpdate_post = function() {
		var faq_id = $('input[name=faq_id]', editPost_form);
		var faq_title = $('input[name=faq_title]', editPost_form);
		var faq_content = $('textarea[name=faq_content]', editPost_form);
		var faq_tag = $('input[name=faq_tag]', editPost_form);
		var faq_status = $('select[name=faq_status]', editPost_form);

		editPost_form.on("submit", function(e){
			e.preventDefault();
	        var _self = $(this);

	        var data_update = new FormData(_self[0]);
	        
	        data_update.append("faq_tag", JSON.stringify(faq_tag.select2("data")));
	        data_update.append("faq_content", CKEDITOR.instances.editPost_content.getData());
			
	        // var data_update = {
	        // 	'faq_id' : faq_id.val(),
	        // 	'faq_title' : faq_title.val(),
	        // 	'faq_content' : faq_content.bbcode(),
	        // 	'faq_tag' : JSON.stringify(faq_tag.select2("data")),
	        // 	'faq_status' : faq_status.val()
	        // };
	
	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	        
	        jConfirm('Update?', 'Update', function(e_msg){
	            if(e_msg == true){
	                loading.fadeIn();
	                done.hide();
	
	                var url = URL + "admincp_community/xhrUpdate_post";
	      //           $.post(url, data_update, function(result){
	      //               if (result == 'success') {
	      //               	// Do it...
	      //                   isSuccess = true;
	      //               }
	      //           })
	      //           .done(function(){
	      //               loading.hide();
	      //               done.show();
	
	      //               if(isSuccess){
	      //               	// Do it...
							// jAlert("Update thành công!");
							// editPost_modal.modal("hide");
	      //               } else {
	      //                   jAlert("Update error!");
	      //               }
	      //           }); 

	                $.ajax({
				        url: url,
				        type: 'POST',
				        data: data_update,
				        async: false,
				        success: function (result) {
				            if(result == 'success') {
				            	// Do it...
				                isSuccess = true;
				            }
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    })
				    .done(function(){
				    	loading.hide();
			            done.show();
			
			            if(isSuccess) {
			            	jAlert("Update thành công!");
			            	location.reload();
			            } else {
			                jAlert("Update thất bại!");
			            }
				    });
	            }
	        });
	        return false;
	    });
	}

	var xhrDelete_post= function() {
		var btnDel_post = editPost_form.find('.btnDel_post');
	    btnDel_post.on("click", function() {
	        var _self = $(this);
	        var data_id = $('input[name=faq_id]', editPost_form).val();
	
	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');
	
	        jConfirm('Delete?', 'Delete', function(e_msg) {
	            if(e_msg == true){
	            
	                loading.fadeIn();
	                done.hide();
	
	                var url = URL + "admincp_community/xhrDelete_post";
	                $.post(url, {'data_id':data_id}, function(result){
	                    if(result == 'success') {
	                    	// Do it....
	                    	
	                        isSuccess = true;
	                    }
	                })
	                .done(function(){
	                    loading.hide();
	                    done.show();
	
	                    if(isSuccess) {
	                        // Do it....
							editPost_modal.modal("hide");
							location.reload();
	                    } else {
	                        jAlert("Delete error!");
	                    }
	                });
	            }
	        });
	
	        return false;
	    });
	}

	return {
		init: function() {
			xhrGetOM_addPost();
			xhrInsert_post();
			xhrGet_post();
			xhrUpdate_post();
			xhrDelete_post();
		}
	}
}();

var Answer = function() {

	var xhrGet_answer = function() {
		var answer_table = $('#answer_table');
		var answer_table_tbody = answer_table.find('tbody');

		var html = '<tr>'
            	+	'<td>:faq_id</td>'
            	+	'<td>:faq_parent_content</td>'
            	+	'<td>:faq_content</td>'
            	+	'<td>:client_name</td>'
            	+	'<td>:faq_created</td>'
            	+	'<td>:btnAct_confirm</td>'
            	+	'<td>:faq_created_sort</td>'
            	+'</tr>';

        var btnAct_confirm = '<button class="btn btn-xs btn-primary btnAct_confirm_answer" data_id=":faq_id"><i class="fa fa-check done/><i class="fa fa-spin fa-refresh loading"/> Duyệt</button>';

		var url = URL + 'admincp_community/xhrGet_answer';
		$.get(url, function(data) {
	        if(!jQuery.isEmptyObject(data)) {
	        	var out = '';
				console.log(data);

				$.each(data, function(index, answer) {
					out = html.replace(':faq_parent_content', answer['faq_parent_content']);
					out = out.replace(':faq_content', answer['faq_content']);
					out = out.replace(':client_name', answer['client_name']);
					out = out.replace(':faq_created', answer['faq_created']);
					out = out.replace(':faq_created_sort', moment(answer['faq_created'], "YYYY-MM-DD HH:mm:ss").format("YYYYMMDDHHmmss"));
					out = out.replace(':btnAct_confirm', btnAct_confirm);
					out = out.replace(/:faq_id/g, answer['faq_id']);

					answer_table_tbody.append(out);
				});
	        }

	        // Act duyệt câu trả lời
	        xhrUpdate_confirm_answer();
	    }, 'json')
	    .done(function(){
	        answer_table.dataTable({
                "aaSorting": [[ 6, "desc" ]],
                "aoColumns": [
                    { "bSortable": true },
                    { "bSortable": true },
                    { "bSortable": true },
                    { "bSortable": true },
                    { "bSortable": false },
                    { "bSortable": false },
                    { "bVisible": false }
                ],
                "aLengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"] // change per page values here
                ],

                // set the initial value
                "iDisplayLength": 10,
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    },
                    "sZeroRecords" : "Không có dữ liệu nào cả.",
                    "sSearch" : "Tìm kiếm: ",
                    "sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
                    "sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
                    "sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
                }
            });
	    });
	}

	var xhrUpdate_confirm_answer = function() {
		var btnAct_confirm = $('.btnAct_confirm_answer');
		var t
		btnAct_confirm.on("click", function(){
			//console.log($(this).closest('tbody').find('tr').length);
	        var _self = $(this);

            var data_id = _self.attr('data_id');

	        var data_update = {
	        	'data_id' : data_id
	        };

	        var isSuccess = false;
	        var loading = _self.find('.loading');
	        var done = _self.find('.done');

	        jConfirm('Duyệt câu trả lời?', 'Duyệt câu trả lời này?', function(e_msg){
	            if(e_msg == true){
	                loading.fadeIn();
	                done.hide();

	                var url = URL + "admincp_community/xhrUpdate_confirm_answer";
	                $.post(url, data_update, function(result){
	                    if (result == 'success') {
							var tbody= _self.closest('tbody');
							_self.closest('tr').remove();

							if(tbody.find('tr').length <=0){
								tbody.append('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">Không có dữ liệu nào cả.</td></tr>');
							}
	                        isSuccess = true;
	                    }
	                })
	                .done(function(){
	                    loading.hide();
	                    done.show();

	                    if(isSuccess){
	                    	// Do it...

	                    } else {
	                        jAlert("Update error!");
	                    }
	                });
	            }
	        });
	    });
	}

	return {
		init: function() {
			xhrGet_answer();
		}
	}
}();