$(document).ready(function() {
    PromotionGroup.init();
    PromotionGroup.loadImage();
    $('#add-new-promotion').on('click', function(){
        PromotionGroup.addNew();
    })

    $('#update-promotion').on('click', function(){
        PromotionGroup.update();
    })

    // date picker
    $('#promotion-add-end-date').datepicker({
        format: "dd/mm/yyyy"
    });
    $('#promotion-add-start-date').datepicker({
        format: "dd/mm/yyyy"
    });
    $('#promotion-update-start-date').datepicker({
        format: "dd/mm/yyyy"
    });
              
    $('#promotion-update-end-date').datepicker({
        format: "dd/mm/yyyy"
    });

    //editor
    CKEDITOR.replace('promotionContent');
    CKEDITOR.replace('promotionContentUpdate');
    
});



var PromotionGroup = function () {

    // load list promotion
    var loadListPromotion = function() {    

        var html = '';     

        $.ajax({
            url: URL + 'spaCMS/promotion/xhrLoad_promotion_list',
            type: 'get',
            dataType: 'json',         
        })
        .done(function(data) {
            $('span#promotion-title-spa').text('DANH SÁCH TIN KHUYẾN MÃI');
            if(data['list'].length >0 ){     
                $('#promotion-mesage-list').hide('fast');      
                var totalPublish = 0;    
                $.each(data['list'], function(k, val){
                    totalPublish = (val.promotion_state == 1)? totalPublish+1 : totalPublish;
                    var state = (val.promotion_state == 0)? "button-other": "hide";                        
                    var nowDay = new Date();
                    var endDay  = val.promotion_end_date;

                    var createDay = val.promotion_create_date;
                    var end_Day = val.promotion_end_date;
                    var startDay = val.promotion_start_date;
                    var strMark = "";
                    strMark = (new Date(end_Day) < new Date())? "color: red; text-decoration: line-through;" : "";
                        createDay = createDay.substr(8, 2)+'/'+ createDay.substr(5, 2)+'/'+createDay.substr(0, 4);
                        startDay = startDay.substr(8, 2)+'/'+ startDay.substr(5, 2)+'/'+startDay.substr(0, 4); 
                        end_Day = end_Day.substr(8, 2)+'/'+ end_Day.substr(5, 2)+'/'+end_Day.substr(0, 4); 
                    // var promotion_img = JSON.parse(val.promotion_img);

                    html += '<li class="row promotion-list-item" data-toggle="modal" data-target="#updatePromotion" data-id-promotion="'+val.promotion_id+'">';
                    html += '<div class="col-md-5" style="font-weight: 600; color: #888;">'+val.promotion_title+'</div>';
                    html += '<div class="col-md-2 created-date">'+createDay+'</div>';
                    html += '<div class="col-md-2">'+startDay+'</div>';
                    html += '<div class="col-md-2 end-date" style="'+strMark+'">'+end_Day+'</div>';
                    // html += '<div class="col-md-1">'+totalDay+'</div>';
                    html += '<div class="col-md-1 text-right" style="padding:0px;">';
                      
                        html += '<button class="button '+state+' promotion-items-publish" data-promotion-id="'+val.promotion_id+'" title="Kích hoạt"> ';
                        html += '<i class="fa fa-check"></i>';
                        html += '</button> ';
                        html += '<button class="button button-secondary redeem promotion-items-delete" data-promotion-id="'+val.promotion_id+'" title="Xóa"> ';
                        html += '<i class="fa fa-trash"></i>';
                        html += '</button>';
                    html += '</div>';
                    html += '</li>';              
                });
                     html += '<input class="input-hide-state" type="hidden" value="'+totalPublish+'">';  
                $('#promotion-content').html(html);    
            }else{
                $('#promotion-content').html('');    
                $('#promotion-mesage-list').fadeIn('fast');
            }        
        })
        .always(function(){
            
             $('.promotion-items-delete').on('click',function(e){
                var id_promotion = $(this).attr('data-promotion-id');
                e.stopPropagation();              
                var cfr = confirm('Bạn có muốn xóa promotion này không?');
                    if(cfr == true){
                        deletePromotion(id_promotion);   
                    }                
            });

            $('.promotion-items-publish').on('click',function(e){
                var id_promotion = $(this).attr('data-promotion-id');
                var self = $(this);
                var state = 1; // kich hoat
                e.stopPropagation();
                if($('input.input-hide-state').val() >4){
                    alert('Chỉ hiển thị được 5 promotion.'); 
                }else{
                     publishPromotion(id_promotion, state); 
                }
            });


            $('.btn-close-modal').on('click',function (){
                $(".modal").modal('hide');
            })
            $('#refres-promotion').on('click', function(){
                refresh();
            });

            $('li.promotion-list-item').on('click', function(){         
                var self = $(this);                    
                var id_promotion = self.attr('data-id-promotion');
                $.ajax({
                    url: URL + 'spaCMS/promotion/xhrLoad_promotion_item',
                    type: 'post',
                    dataType: 'json',
                    data: {promotion_id: id_promotion},
                })
                .done(function(data) {
                    $.each(data, function(index, value) {
                        var title = value.promotion_title;
                        var id_promotion = value.promotion_id;

                        // img
                        var image   = JSON.parse(value.promotion_img);
                        var img   = image.img;
                        var thumbnail = image.thumbnail;

                        //date                      
                        var sDate = value.promotion_start_date;
                            sDate = sDate.replace(/-/g,' ');
                        var startDate = new Date(sDate);
                            

                        var endDate  = value.promotion_end_date;
                            endDate = new Date(endDate.replace(/-/g,' '));

                        var mainUpdate = $('#updatePromotion');
                        mainUpdate.find('#promotion-update-title').val(title);    
                        mainUpdate.attr('data-id-promotion', id_promotion);  

                        $('#promotion-update-start-date').datepicker('update',startDate);
                        $('#promotion-update-end-date').datepicker('update',endDate);

                        CKEDITOR.instances.promotionContentUpdate.setData(value.promotion_content);                    

                        var items = $('#ListIM_editUS');
                        var caller = $('#iM_editUS');
                          // ktra so luong hinh anh da co 
                        caller.hide();
                        var out = null;
                        var html = '<li class="single-picture">';
                            html += '<div class="single-picture-wrapper">';
                            html += '<img id="user_slide_thumbnail" src=":img_thumbnail" data-img=":data-image" style="width:100px; height:70px;">';
                            html += '<input type="hidden" name="user_service_image[]" value=":image">';
                            html += '</div>';
                            html += '<div class="del_image icons-delete2"></div>';
                            html += '</li>';

                        out = html.replace(':img_thumbnail', thumbnail);
                        out = out.replace(':data-image', img);
                        out = out.replace(':image', img);
                        items.html(out);
                        // del image 
                    $('.del_image').on("click", function(){
                        var self = $(this).parent();
                        // self.attr("disabled","disabled");
                        self.remove();

                        // Truong hop dac biet, ktra so luong hinh anh da co 
                        var childrens = items.children().length;
                        if(childrens < 5) {
                            caller.fadeIn();
                        }
                    });
                    });
                })
                .always(function() {
                });

                
                      
                })
             

        });    
    }

    function loadAsidePublish() {
        var html = '';
        $.ajax({
            url: URL + 'spaCMS/promotion/xhrLoad_promotion_publish',
            type: 'post',
            dataType: 'json',
            data: {promotion_state: 1},
        })
        .done(function(respon) {
            if(respon.length > 0){
                $.each(respon, function(index, val) {
                    // img
                    var title   = val.promotion_title;
                    var image   = JSON.parse(val.promotion_img);
                    var img   = image.img;
                    var thumbnail = image.thumbnail;    
   

                    html += '<div class="promotion-item-publish">';
                        html += '<div class="row-fluid">';
                            html += '<div class="promotion-item-puslish-title col-md-12">';
                                html += '<i class="fa fa-bullhorn"></i>';
                                html += '<span>'+title+'</span>';
                            html += '</div>';
                            // html += '<div class="col-sm-1">';
                                html += '<button class="btn btn-black promotion-items-change-publish" data-promotion-id="'+val.promotion_id+'" title="Tạm ngưng"> <i class="fa fa-close"></i></button>';
                            html += '</div>';
                        // html += '</div>';
                
                        html += '<div class="promotion-item-publish-img row-fluid">';
                            html += '<img class="pic" alt="" src="'+thumbnail+'">  ';
                        html += '</div>';
                    html += '</div>';
                }); //end each                      
            }else{
                html +='<div class="row-fluid" style="padding:5px;padding: 5px; border: 1px solid #d88c8a;background-color: #F7E4E4;"><span><i class="fa fa-warning" style="color: #ffcc00;"></i> Hiện tại không có quảng cáo nào hiển thị.</span></div>';
            }
            $('.promotion-item-publish-wrap').html(html);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $('.promotion-items-change-publish').on('click', function(){
                var promotion_id = $(this).attr('data-promotion-id');
                publishPromotion(promotion_id,0);
            });

        });
        
    }
    // add new promotion
    var addNewPromotion = function() {
        var title = $('#promotion-add-title').val();
        var now = new Date();
            month = now.getMonth()+1;
        var start_day = $('#promotion-add-start-date').val();
            if(start_day.length >0){
                start_day = start_day.substring(6,10)+'-'+start_day.substring(3,5)+'-'+start_day.substring(0,2)+' 00:00:00';    
            }else{
                start_day = now.getFullYear()+'-'+month+'-'+now.getDate()+' 00:00:00'; 
            }

        var end_day = $('#promotion-add-end-date').val();
            if(end_day.length >0){
                end_day = end_day.substring(6,10)+'-'+end_day.substring(3,5)+'-'+end_day.substring(0,2)+' 00:00:00';            
            }else{
                end_day = now.getFullYear()+'-'+month+'-'+now.getDate()+' 00:00:00'; 
            }

        var url_img = "";
        var tagImg  = $('#user_slide_thumbnail');
            if(tagImg[0]){
                var img = tagImg.attr('data-img');
                var thumbnail = tagImg.attr('src');
                url_img={};
                url_img.img = img;
                url_img.thumbnail = thumbnail;
            }else{
                url_img={};
                url_img.img = URL+'/public/assets/img/noimage.jpg';
                url_img.thumbnail = URL+'/public/assets/img/noimage.jpg';
            }

        var content = CKEDITOR.instances.promotionContent.getData();
        var message = $('.promotion-message');
        var jdata = {"title": title, "start_date": start_day, "end_date": end_day, "url_img": JSON.stringify(url_img), "content": content};

        if(title.length<4){
            message.text('Tiêu đề phải hơn 4 kí tự.').fadeIn('fast');
            return false;
        }else{
            $.ajax({
                url: URL + 'spaCMS/promotion/xhrInsert_promotion_item',
                type: 'post',
                dataType: 'json',
                data: jdata,
            })
            .done(function(respon) {
                if(respon === 1){
                    alert('Thêm promotion thành công.')
                }else{
                    alert('Thêm promotion thất bại, bạn vui lòng thử lại.')
                }
            })
            .fail(function() {
            
            })
            .always(function() {
                loadListPromotion();
                $(".modal").modal('hide'); 
                refresh();
            });
            
        }
    }

    //delete Promotion
    var deletePromotion = function(id_promotion) {
        $.ajax({
            url: URL + 'spaCMS/promotion/xhrDelete_promotion_item',
            type: 'post',
            dataType: 'json',
            data: {'id_promotion': id_promotion},
        })
        .done(function(respon) {
            if(respon==0){
                alert('Xóa promotion thất bại, Xin vui lòng kiểm tra lại');
            }
        })
        .fail(function(error) {
            console.log("error: "+error);
        })
        .always(function() {
            loadListPromotion();
            loadAsidePublish();
        });       
    }

    var publishPromotion = function(id_promotion,state){
          $.ajax({
            url: URL + 'spaCMS/promotion/xhrPublish_promotion_item',
            type: 'post',
            dataType: 'json',
            data: {'id_promotion': id_promotion, 'state_promotion': state},
        })
        .done(function(respon) {
            if(respon == 0){
                alert('Kích hoạt promotion thất bại, Xin vui lòng kiểm tra lại');
            }
        })
        .fail(function(error) {
            console.log("error: "+error);
        })
        .always(function() {
            loadListPromotion();  
            loadAsidePublish()         
        }); 
    }

    // update Promotion
    var updatePromotion = function(){
        var title = $('#promotion-update-title').val();
        var id_promotion = $('#updatePromotion').attr('data-id-promotion');
        var start_day = $('#promotion-update-start-date').val();
        var end_day = $('#promotion-update-end-date').val();
        var now = new Date();
        var month = now.getMonth()+1;
            if( end_day.length >0 ){

                end_day = end_day.substring(6,10)+'-'+end_day.substring(3,5)+'-'+end_day.substring(0,2)+' 00:00:00';    
            } else {
                end_day = now.getFullYear()+'-'+month+'-'+now.getDate()+' 00:00:00'; 
            }

            if( start_day.length >0 ){
                start_day = start_day.substring(6,10)+'-'+start_day.substring(3,5)+'-'+start_day.substring(0,2)+' 00:00:00';    
            } else {
                start_day = now.getFullYear()+'-'+month+'-'+now.getDate()+' 00:00:00'; 
            }

        var url_img = "";
        var tagImg  = $('#user_slide_thumbnail');
            if(tagImg[0]){
                var img = tagImg.attr('data-img');
                var thumbnail = tagImg.attr('src');
                // url_img = '{"img": "'+img+'", "thumbnail": "'+thumbnail+'"}';
                url_img={};
                url_img.img = img;
                url_img.thumbnail = thumbnail;
            }else{
                url_img={};
                url_img.img = URL+'/public/assets/img/noimage.jpg';
                url_img.thumbnail = URL+'/public/assets/img/noimage.jpg';
            }

        var content = CKEDITOR.instances.promotionContentUpdate.getData();
        var message = $('.promotion-message');
        var jdata = {"id_promotion": id_promotion, "title": title, "start_date": start_day, "end_date": end_day, "url_img": JSON.stringify(url_img), "content": content};

        if(title.length<4){
            message.text('Tiêu đề phải hơn 4 kí tự.').fadeIn('fast');
            return false;
        }else{
            $.ajax({
                url: URL + 'spaCMS/promotion/xhrUpdate_promotion_item',
                type: 'post',
                dataType: 'json',
                data: jdata,
            })
            .done(function(respon) {
                if(respon === 1){
                    alert('Cập nhật promotion thành công.')
                }else{
                    alert('Cập nhật promotion thất bại, bạn vui lòng thử lại.')
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                loadListPromotion();
                loadAsidePublish();
                $(".modal").modal('hide'); 
            });
            
        }
    }
    // refresh form promotion
    var refresh = function(){
        var frmPromotion = $('#form-promotion');
        frmPromotion.find('input#promotion-add-title').val('');
        frmPromotion.find('input#promotion-add-end-date').val('');
        frmPromotion.find('input#promotion-add-end-date').val('');
        frmPromotion.find('span.promotion-message').fadeOut('fast').text('');
        CKEDITOR.instances.promotionContent.setData('');
          // del image 
        
        var self = $('.del_image').parent();
        self.remove();
        $('#iM_addUS').fadeIn('fast');
    }

    // Image Manager
    var imageManager = function() {   
        
        // Gán thuộc tính cover_id tương ứng
        $('#iM_editUS').click(function(){
            $('#imageManager_saveChange').attr('cover_id','editUS');
        });

        $('#iM_addUS').click(function(){
            $('#imageManager_saveChange').attr('cover_id','addUS');
        });


        // <!-- Save Change -->
        $('#imageManager_saveChange').on('click', function(evt) {
            evt.preventDefault();
            // Define position insert to image
            var cover_id = $(this).attr('cover_id');
            // Define selected image 
            var radio_checked = $("input:radio[name='iM-radio']:checked"); // Radio checked
            // image and thumbnail_image
            var image = radio_checked.val();
            var thumbnail = radio_checked.attr('data-image');

            // Truong hop dac biet
            if(cover_id == 'addUS') {
                var caller = $('#iM_addUS');
                var items = $('#ListIM_addUS');
            } 
            else if(cover_id == 'editUS') {
                var caller = $('#iM_editUS');
                var items = $('#ListIM_editUS');
            }


            // ktra so luong hinh anh da co 
            var childrens = items.children().length + 1;
            if(childrens == 1) {
                caller.hide();
            }

            var out = null;
            var html = '<li class="single-picture">';
                html += '<div class="single-picture-wrapper">';
                html += '<img id="user_slide_thumbnail" src=":img_thumbnail" data-img=":data-image" style="width:100px; height:60px;">';
                html += '<input type="hidden" name="user_service_image[]" value=":image">';
                html += '</div>';
                html += '<div class="del_image icons-delete2"></div>';
                html += '</li>';

            out = html.replace(':img_thumbnail', thumbnail);
            out = out.replace(':data-image', image);
            out = out.replace(':image', image);

            items.html(out);

            // del image 
            $('.del_image').on("click", function(){
                var self = $(this).parent();
                // self.attr("disabled","disabled");
                self.remove();

                // Truong hop dac biet, ktra so luong hinh anh da co 
                var childrens = items.children().length;
                if(childrens < 1) {
                    caller.fadeIn();
                }
            });


            // Hide Modal
            $("#imageManager_modal").modal('hide'); 
        });         
    }



    return {
        init: function() { loadListPromotion(); loadAsidePublish();},
        addNew: function(){ addNewPromotion(); },
        update: function(){ updatePromotion(); },
        loadImage: function(){ imageManager(); }
    }

    var refresh = function() {
        console.log('refresh');
    }
}();

// function offsetDay(dayStart, dayEnd){
//     var offset = dayEnd.getTime() - dayStart.getTime(); 
//         console.log(dayEnd.getTime()+'-'+dayStart.getTime());
//     // lấy độ lệch của 2 mốc thời gian, đơn vị tính là millisecond
//     var totalDays = Math.round(offset / 1000 / 60 / 60 / 24);
//     console.log(dayStart.getTime());
//     return totalDays;
// }






  