$(document).ready(function(){
    CKEDITOR.replace('addPage_content');
    CKEDITOR.replace('editPage_content');

    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div style="margin-bottom: 10px;"><input type="text" name="sidebar_link_title[]" placeHolder="Tiêu đề link"/> <input type="text" name="sidebar_link[]" placeHolder="Địa chỉ link"/> <a href="#" class="remove_field">Xóa</a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });

    Page_Static.init();
    Page.init();
});


var Page_Static = function () {
    var xhrUpdate_page_contact = function() {
        var pageContact_form = $("#pageContact_form");
        pageContact_form.on("submit", function(){
            var _self = $(this);
    
            var data_update = _self.serializeArray();

            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
            
            jConfirm('Cập nhật?', 'Cập nhật', function(e_msg){
                if(e_msg == true){
                    loading.fadeIn();
                    done.hide();
    
                    var url = URL + "admincp_page/xhrUpdate_page_contact";
                    $.post(url, data_update, function(result){
                        if (result == 'success') {
                            // Do it...
                            isSuccess = true;
                        }
                    })
                    .done(function(){
                        loading.hide();
                        done.show();
    
                        if(isSuccess){
                            jAlert("Cập nhật thành công!");
    
                        } else {
                            jAlert("Lỗi cập nhật!");
                        }
                    }); 
                }
            });
            return false;
        });
    }

    var xhrGet_page_contact = function() {
        var url = URL + 'admincp_page/xhrGet_page_contact';
        $.get(url, function(data) {
            if(!jQuery.isEmptyObject(data)) {
                $.each(data, function(index, value) {
                    $("#"+index).val(value);
                });
            }
        }, 'json')
        .done(function(){
            
        });
    }

    var xhrUpdate_page_aboutus = function() {
        var pageAboutus_form = $("#pageAboutus_form");
        pageAboutus_form.on("submit", function(){
            var _self = $(this);
    
            var data_update = _self.serializeArray();

            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
            
            jConfirm('Cập nhật?', 'Cập nhật', function(e_msg){
                if(e_msg == true){
                    loading.fadeIn();
                    done.hide();
    
                    var url = URL + "admincp_page/xhrUpdate_page_aboutus";
                    $.post(url, data_update, function(result){
                        if (result == 'success') {
                            // Do it...
                            isSuccess = true;
                        }
                    })
                    .done(function(){
                        loading.hide();
                        done.show();
    
                        if(isSuccess){
                            jAlert("Cập nhật thành công!");
    
                        } else {
                            jAlert("Lỗi cập nhật!");
                        }
                    }); 
                }
            });
            return false;
        });
    }

    var xhrGet_page_aboutus = function() {
        var url = URL + 'admincp_page/xhrGet_page_aboutus';
        $.get(url, function(data) {
            if(!jQuery.isEmptyObject(data)) {
                $.each(data, function(index, value) {
                    $("#"+index).val(value);
                });
            }
        }, 'json')
        .done(function(){
            
        });
    }

    var xhrUpdate_page_giftvoucher = function() {
        var pageGiftVoucher_form = $("#pageGiftVoucher_form");
        pageGiftVoucher_form.on("submit", function(){
            var _self = $(this);
    
            var data_update = _self.serializeArray();

            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
            
            jConfirm('Cập nhật?', 'Cập nhật', function(e_msg){
                if(e_msg == true){
                    loading.fadeIn();
                    done.hide();
    
                    var url = URL + "admincp_page/xhrUpdate_page_giftvoucher";
                    $.post(url, data_update, function(result){
                        if (result == 'success') {
                            // Do it...
                            isSuccess = true;
                        }
                    })
                    .done(function(){
                        loading.hide();
                        done.show();
    
                        if(isSuccess){
                            jAlert("Cập nhật thành công!");
    
                        } else {
                            jAlert("Lỗi cập nhật!");
                        }
                    }); 
                }
            });
            return false;
        });
    }

    var xhrGet_page_giftvoucher = function() {
        var url = URL + 'admincp_page/xhrGet_page_giftvoucher';
        $.get(url, function(data) {
            if(!jQuery.isEmptyObject(data)) {
                $.each(data, function(index, value) {
                    $("#"+index).val(value);
                });
            }
        }, 'json')
        .done(function(){
            
        });
    }

    var xhrUpdate_page_faq = function() {
        var pageFaq_form = $("#pageFaq_form");
        pageFaq_form.on("submit", function(){
            var _self = $(this);
    
            var data_update = _self.serializeArray();

            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
            
            jConfirm('Cập nhật?', 'Cập nhật', function(e_msg){
                if(e_msg == true){
                    loading.fadeIn();
                    done.hide();
    
                    var url = URL + "admincp_page/xhrUpdate_page_faq";
                    $.post(url, data_update, function(result){
                        if (result == 'success') {
                            // Do it...
                            isSuccess = true;
                        }
                    })
                    .done(function(){
                        loading.hide();
                        done.show();
    
                        if(isSuccess){
                            jAlert("Cập nhật thành công!");
    
                        } else {
                            jAlert("Lỗi cập nhật!");
                        }
                    }); 
                }
            });
            return false;
        });
    }

    var xhrGet_page_faq = function() {
        var url = URL + 'admincp_page/xhrGet_page_faq';
        $.get(url, function(data) {
            if(!jQuery.isEmptyObject(data)) {
                $.each(data, function(index, value) {
                    $("#"+index).val(value);
                });
            }
        }, 'json')
        .done(function(){
            
        });
    }



    return {
        init: function() {
            xhrGet_page_contact();
            xhrUpdate_page_contact();
            xhrGet_page_aboutus();
            xhrUpdate_page_aboutus();
            xhrGet_page_giftvoucher();
            xhrUpdate_page_giftvoucher();
            xhrGet_page_faq();
            xhrUpdate_page_faq();
        }
    }
}();

var Page = function() {

    var xhrInsert_page = function() {
        $("#addPage_form").on('submit', function(){
            var _self = $(this);
            
            var data_insert = _self.serializeArray();
            
            data_insert[2] = {name: 'addPage_content', value: CKEDITOR.instances.addPage_content.getData()};
            
            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
    
            loading.fadeIn();
            done.hide();
    
            var url = URL + 'admincp_page/xhrInsert_page';
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
                    jAlert("Thêm thành công!");
                    _self[0].reset();
                } else {
                    jAlert("Thêm thất bại!");
                }
                
            });
            return false;
        });    
    }

    var xhrUpdate_sidebar = function() {
        $("#slidebar_form").on("submit", function(){
            var _self = $(this);
    
            var data_update = _self.serializeArray();
            console.log(data_update);
            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
            
            jConfirm('Cập nhật?', 'Cập nhật', function(e_msg){
                if(e_msg == true){
                    loading.fadeIn();
                    done.hide();
    
                    var url = URL + "admincp_page/xhrUpdate_sidebar";
                    $.post(url, data_update, function(result){
                        if (result == 'success') {
                            // Do it...
                            isSuccess = true;
                        }
                    })
                    .done(function(){
                        loading.hide();
                        done.show();
    
                        if(isSuccess){
                            jAlert("Cập nhật thành công!");
    
                        } else {
                            jAlert("Cập nhật thất bại!");
                        }
                    }); 
                }
            });
            return false;
        });
    }

    var xhrGet_sidebar = function() {
        var sidebar_iframe = $("#sidebar_iframe");
        var sidebar_links = $("#sidebar_links");

        var url = URL + 'admincp_page/xhrGet_sidebar';
        $.get(url, function(data) {
            if(!jQuery.isEmptyObject(data)) {
                $(sidebar_iframe).val(data['sidebar_iframe']);

                var links = JSON.parse(data['sidebar_link']);

                $.each(links, function(key, value){
                    $(sidebar_links).append('<div style="margin-bottom: 10px;"><input type="text" name="sidebar_link_title[]" value="'+key+'"/> <input type="text" name="sidebar_link[]" value="'+value+'"/></div>');
                });
                
            }
        }, 'json')
        .done(function(){
            
        });
    }

    var xhrGet_page = function() {
        var pages_table = $("#pages_table");

        var html = '<tr data-id=":page_id"><td>:page_id</td><td>:page_title</td><td>:page_slug</td></tr>';

        var url = URL + 'admincp_page/xhrGet_page';
        $.get(url, function(data) {
            if(!jQuery.isEmptyObject(data)) {
                var out = '';
                $.each(data, function(index, value){
                    out = html.replace(/:page_id/g, value['page_id']);
                    out = out.replace(':page_title', value['page_title']);
                    out = out.replace(':page_slug', value['page_slug']);
                    // out = out.replace(':page_status', value['page_status'] == 1 ? 'Đang hoạt động' : 'Đóng');
                    pages_table.find('tbody').append(out);
                });
            }
        }, 'json')
        .done(function(){
            pages_table.dataTable({
                // "aaSorting": [[ 4, "desc" ]],
                // "aoColumns": [
                //     { "bSortable": true },
                //     { "bSortable": true },
                //     { "bSortable": false },
                //     { "bSortable": true },
                //     { "bVisible": false },
                //     { "bVisible": false }
                // ],
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

            xhrGetOM_detail_page();
        });
    }

    var xhrGetOM_detail_page = function() {
        var editPage_modal = $("#editPage_modal");
        var tr = $("#pages_table tbody").find('tr');
        tr.on('click', function() {
            var _self = $(this);
            var data_id = _self.attr('data-id');

            var url = URL + 'admincp_page/xhrGetOM_detail_page';
            $.getJSON(url, {'data_id': data_id}, function(data){
                $('input[name=editPage_id]').val(data['page_id']);
                $("#editPage_title").val(data['page_title']);
                // $("#editPage_content").val(data['page_title']);
                CKEDITOR.instances.editPage_content.setData(data['page_content']);
                $("#editPage_slug").val(data['page_slug']);
                $("#editPage_status").find('option[value="'+data['page_status']+'"]').prop("selected", true);
                $(".page_url").attr("href", URL + 'page/show/' + data['page_slug']);
                $(".page_slug").text(data['page_slug']);
            })
            .done(function(){
                editPage_modal.modal('show');
            });
        });
    }

    var xhrUpdate_page = function() {
        $("#btnEdit_page").on("click", function(){
            var _self = $(this);
    
            var data_update = $('#editPage_form').serializeArray();
            data_update[3] = {name: 'editPage_content', value: CKEDITOR.instances.editPage_content.getData()};

            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
            
            jConfirm('Cập nhật?', 'Cập nhật', function(e_msg){
                if(e_msg == true){
                    loading.fadeIn();
                    done.hide();
    
                    var url = URL + "admincp_page/xhrUpdate_page";
                    $.post(url, data_update, function(result){
                        if (result == 'success') {
                            // Do it...
                            isSuccess = true;
                        }
                    })
                    .done(function(){
                        loading.hide();
                        done.show();
    
                        if(isSuccess){
                            jAlert("Cập nhật thành công!");
                            
                        } else {
                            jAlert("Cập nhật thất bại!");
                        }
                    }); 
                }
            });
            return false;
        });
    }

    var xhrDelete_page = function(){
        $("#btnDel_page").on("click", function(){
            var _self = $(this);
    
            var data_id = $('#editPage_form').find('input[name=editPage_id]').val();

            var isSuccess = false;
            var loading = _self.find('.loading');
            var done = _self.find('.done');
            
            jConfirm('Xóa trang này?', 'Xóa trang', function(e_msg){
                if(e_msg == true){
                    loading.fadeIn();
                    done.hide();
    
                    var url = URL + "admincp_page/xhrDelete_page";
                    $.post(url, {'data_id':data_id}, function(result){
                        if (result == 'success') {
                            // Do it...
                            isSuccess = true;
                        }
                    })
                    .done(function(){
                        loading.hide();
                        done.show();
    
                        if(isSuccess){
                            jAlert("Xóa thành công!");
                            $("#editPage_modal").modal('hide');
                            // location.reload();
                        } else {
                            jAlert("Xóa thất bại!");
                        }
                    }); 
                }
            });
            return false;
        });
    }

    return {
        init: function() {
            xhrGet_page();
            xhrInsert_page();
            xhrGet_sidebar();
            xhrUpdate_sidebar();
            xhrDelete_page();
            xhrUpdate_page();
        }
    }
}();