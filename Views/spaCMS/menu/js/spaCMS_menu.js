$(document).ready(function(){$("#service_name, #price, #sell_service, #sold_as").tooltip({placement:"right",html:!0,container:"body"}),$("#menu_group").tooltip({placement:"top",html:!0,container:"body"}),$("input[name=user_service_full_price]").number(!0,0),$("input[name=user_service_sale_price]").number(!0,0),$("input[name=user_service_sale_price]",$("#editUserService_form")).on("focusout",function(){var e=$(this);if(""==e.attr("value")||null==e.attr("value")){var i=$("input[name=user_service_full_price]",$("#editUserService_form")).attr("value");e.attr("value",i)}})});var LoadMoreInfo=function(){var e=function(){var e='<li id="treatment-type-:service_type_id" class="ui-state-default ui-corner-top :is_first_gs">';e+='<a href="#treatment-type-cat-:service_type_id" role="tab" data-toggle="tab"> ',e+=':service_type_name <span class="count hidden">0</span>',e+="</a>",e+="</li>";var i='<div id="treatment-type-cat-:service_type_id" class="multiple-services-list ui-tabs-panel ui-widget-content ui-corner-bottom tab-pane fade :is_first_s">';i+="<ul>",i+=":list_service_system",i+="</ul>",i+="</div>";var r="<li>";r+='<input type="checkbox" value=":service_id" id="treatment-:service_id">',r+='<label for="treatment-:service_id">:service_name</label>',r+="</li>",r+=":list_service_system";var a='<optgroup data-service_type_id=":service_type_id" label=":service_type_name">';a+=":list_service_system",a+="</optgroup>";var s='<option value=":service_id">:service_name</option>';s+=":list_service_system";var t=URL+"spaCMS/menu/xhrGet_service_system";$.get(t,function(t){var c="",n="",_="";$.each(t,function(t,d){c=e.replace(/:service_type_id/g,d.service_type_id),c=c.replace(/:service_type_name/g,d.service_type_name),n=i.replace(/:service_type_id/g,d.service_type_id),0==t?(c=c.replace(/:is_first_gs/g,"active"),n=n.replace(/:is_first_s/g,"in active")):(c=c.replace(/:is_first_gs/g,""),n=n.replace(/:is_first_s/g,"")),_=a.replace(/:service_type_id/g,d.service_type_id),_=_.replace(/:service_type_name/g,d.service_type_name),"undefined"!=typeof d.list_service_system&&$.each(d.list_service_system,function(e,i){n=n.replace(":list_service_system",r),n=n.replace(/:service_id/g,i.service_id),n=n.replace(/:service_name/g,i.service_name),_=_.replace(/:list_service_system/g,s),_=_.replace(/:service_id/g,i.service_id),_=_.replace(/:service_name/g,i.service_name)}),n=n.replace(":list_service_system",""),_=_.replace(":list_service_system",""),$(".multiple-service-items").append(n),$(".multiple-services-groups-list").append(c),$("#select2_addService").append(_),$("#select2_editService").append(_)}),$("#select2_addService").select2({placeholder:"Vui lòng chọn loại dịch vụ",allowClear:!0}).on("select2-selecting",function(e){$("input[name=user_service_name]",$("#addUserService_form")).val(e.object.text),$("input[name=user_service_service_id]",$("#addUserService_form")).val(e.val)}),$("#select2_editService").select2({placeholder:"Vui lòng chọn loại dịch vụ",allowClear:!0}).on("select2-selecting",function(e){$("input[name=user_service_name]",$("#editUserService_form")).val(e.object.text),$("input[name=user_service_service_id]",$("#editUserService_form")).val(e.val)})},"json")};return{init:function(){e()}}}(),MenuGroupService=function(){var e=function(){$("#addUserService_form")[0].reset(),$("#select2_addService").select2("val",""),$("#ListIM_addUS").html(""),$("#addUserService_form").find(".warning").hide()},i=$("#addGroupName_modal"),r=$(".add-group"),a=($("#group_service_name"),function(){r.on("click",function(){i.modal("show")})}),s=function(){var i='<div class="offer-group">';i+='<div class="icon icons-drag"></div>',i+='<h2 class="group-title">',i+='<a class="aEditGroup" href="javascript:;" data-group_service_id=":group_service_id" data-group_service_name=":group_service_name" data-toggle="modal" data-target="#editGroupName_modal"> ',i+=":group_service_name </a>",i+='<button class="button button-basic button-mini add-offer" type="button" data-group_service_id=":group_service_id" data-toggle="modal" data-target="#addUserServices_modal">',i+='<div class="button-inner">',i+='<div class="button-icon icons-plus4"></div>',i+="Thêm dịch vụ",i+="</div>",i+="</button></h2>",i+=":list_user_service",i+="</div>";var r='<div class="offers ui-sortable">';r+='<div class="offer edit-offer" data-sid=":user_service_service_id" data-id=":user_service_id" data-gid=":user_service_group_id"',r+='data-name=":user_service_name" data-duration=":user_service_duration" data-price=":user_service_full_price" data-sale=":user_service_sale_price" data-featured=":user_service_is_featured" ',r+='data-status=":user_service_status" data-description=":user_service_description" data-image=":user_service_image" data-uevoucher=":user_service_use_evoucher" data-bookinglimit=":user_service_limit_booking" data-toggle="modal" data-target="#editUserServices_modal">',r+='<div class="offer-in">',r+='<div class="main clearfix">',r+='<div class="icon"></div>',r+='<div class="title">',r+='<a href="javascript:;"> ',r+='<span class="offer-name">:user_service_name</span> ',r+=":featured_label",r+="</a>",r+="</div>",r+='<div class="custom-info">',r+=":user_service_duration phút",r+="</div>",r+='<div class="price sku-price">',r+=":price",r+="</div>",r+="</div>",r+="</div>",r+="</div>",r+="</div>",r+=":list_user_service";var a='<span class="">:full_price đ</span>',s='<span class="sku-price--previous">:full_price đ</span>';s+='<span class="sku-price--discount">:sale_price đ</span>';var t='<span class="label label-featured v-fulfillment">Đặc trưng</span> ',c=URL+"spaCMS/menu/xhrGet_group_user_service",n="";$.get(c,function(c){$("#list_group_user_service").html(""),$.each(c,function(e,c){n=i.replace(/:group_service_id/g,c.group_service_id),n=n.replace(/:group_service_name/g,c.group_service_name),"undefined"!=typeof c.list_user_service&&$.each(c.list_user_service,function(e,i){n=n.replace(":list_user_service",r),n=n.replace(/:user_service_service_id/g,i.user_service_service_id),n=n.replace(/:user_service_group_id/g,i.user_service_group_id),n=n.replace(/:user_service_id/g,i.user_service_id),n=n.replace(/:user_service_name/g,i.user_service_name),n=n.replace(/:user_service_duration/g,i.user_service_duration),n=n.replace(/:user_service_status/g,i.user_service_status),n=1==i.user_service_is_featured?n.replace(":featured_label",t):n.replace(":featured_label",""),n=n.replace(/:user_service_is_featured/g,i.user_service_is_featured),n=n.replace(/:user_service_use_evoucher/g,i.user_service_use_evoucher),n=n.replace(/:user_service_limit_booking/g,i.user_service_limit_booking),n=n.replace(/:user_service_image/g,i.user_service_image),n=n.replace(/:user_service_full_price/g,i.user_service_full_price),n=n.replace(/:user_service_sale_price/g,i.user_service_sale_price),""==i.user_service_sale_price?(n=n.replace(":price",a),n=n.replace(":full_price",$.number(i.user_service_full_price))):(n=n.replace(":price",s),n=n.replace(":full_price",$.number(i.user_service_full_price)),n=n.replace(":sale_price",$.number(i.user_service_sale_price)))}),n=n.replace(":list_user_service",""),$("#list_group_user_service").append(n)}),$(".aEditGroup").on("click",function(){var e=$(this).attr("data-group_service_id"),i=$(this).attr("data-group_service_name");$("input[name=group_service_id]",$("#editGroupName_form")).val(e),$("input[name=group_service_name]",$("#editGroupName_form")).val(i)}),$(".add-offer").on("click",function(){e();var i=$(this).attr("data-group_service_id");$("input[name=user_service_group_id]",$("#addUserService_form")).val(i)}),$(".edit-offer").on("click",function(){$("#ListIM_editUS").html("");var e=$(this),i=$("#editUserService_form"),r=e.attr("data-gid"),a=e.attr("data-sid"),s=e.attr("data-id"),t=e.attr("data-name"),c=e.attr("data-duration"),n=e.attr("data-sale"),_=e.attr("data-price"),d=e.attr("data-status"),u=e.attr("data-image"),l=e.attr("data-featured"),v=e.attr("data-uevoucher"),o=e.attr("data-bookinglimit"),p=URL+"spaCMS/menu/xhrGet_user_service_description";if($.getJSON(p,{data_id:s},function(e){jQuery.isEmptyObject(e)||CKEDITOR.instances.user_description_edit.setData(e.user_service_description)}),$("#select2_editService").select2("val",a),$("input[name=user_service_group_id]",i).val(r),$("input[name=user_service_service_id]",i).val(a),$("input[name=user_service_id]",i).val(s),$("input[name=user_service_name]",i).val(t),$("select[name=user_service_duration]",i).find('option[value="'+c+'"]').prop("selected",!0),$("input[name=user_service_sale_price]",i).val(n),$("input[name=user_service_full_price]",i).val(_),$("select[name=user_service_status]",i).find('option[value="'+d+'"]').prop("selected",!0),$("select[name=user_service_use_evoucher]",i).find('option[value="'+v+'"]').prop("selected",!0),$("input[name=user_service_limit_booking]",i).val(o),"1"===l?$("input[name=user_service_is_featured]",i).attr("checked",!0):$("input[name=user_service_is_featured]",i).attr("checked",!1),""!=u){var m=u.split(","),f=null,g='<li class="single-picture">';g+='<div class="single-picture-wrapper">',g+='<img src=":img_thumbnail">',g+='<input type="hidden" name="user_service_image[]" value=":image">',g+="</div>",g+='<div class="del_image icons-delete2"></div>',g+="</li>";for(var h=0;h<m.length;h++){var S=get_thumbnail(m[h],user_id);f=g.replace(":img_thumbnail",S),f=f.replace(":image",m[h]),$("#ListIM_editUS").append(f)}$(".del_image").on("click",function(){var e=$(this).parent();e.remove();var i=$("#ListIM_editUS").children().length;5>i&&$("#iM_editUS").fadeIn()}),m.length>=5&&$("#iM_editUS").hide()}})},"json")},t=$("#addGroupName_form"),c=function(){t.on("submit",function(){var e=$(this),r=e.serialize(),a=!1,c=e.find(".s-loading"),n=e.find(".done");c.fadeIn(),n.hide();var _=URL+"spaCMS/menu/xhrInsert_group_service";return $.post(_,r,function(e){"success"===e&&(s(),t[0].reset(),a=!0)}).done(function(){c.fadeOut(),n.fadeIn(),a?(i.modal("hide"),alert("Thêm thành công!")):alert("Can not create menu group! :(")}),!1})},n=$("#editGroupName_modal"),_=$("#editGroupName_form"),d=_.find(".aDeleteGroup"),u=function(){d.on("click",function(){var e=$(this),i=$("input[name=group_service_id]",_).val(),r={group_service_id:i},a=!1,t=e.find(".loading"),c=e.find(".done");return jConfirm("Hủy bỏ nhóm dịch vụ này?","Xóa nhóm dịch vụ",function(e){if(1==e){t.fadeIn(),c.hide();var i=URL+"spaCMS/menu/xhrDelete_group_service";$.post(i,r,function(e){"success"===e&&(s(),a=!0)}).done(function(){t.hide(),c.show(),a?n.modal("hide"):jAlert("Delete error!")})}}),!1})},l=function(){_.on("submit",function(){var e=$(this).serialize(),i=!1,r=$(this).find(".e-loading"),a=$(this).find(".e-done");r.fadeIn(),a.hide();var t=URL+"spaCMS/menu/xhrUpdate_group_service";return $.post(t,e,function(e){"success"===e&&(s(),i=!0)}).done(function(){r.hide(),a.show(),i?(n.modal("hide"),alert("Sửa thành công!")):alert("Can not edit menu group! :(")}),!1})},v=function(){$("#addUserService_form").on("submit",function(){$(this).find("textarea")[0].text=CKEDITOR.instances.user_description_add.getData(),CKEDITOR.instances.user_description_add.updateElement();var e=$(this),i=e.serialize(),r=e.find(".s-loading"),a=e.find(".done"),t=e.find(".warning");r.fadeIn(),a.hide(),t.hide();var c=URL+"spaCMS/menu/xhrInsert_user_service";return $.post(c,i,function(i){"success"===i?(e[0].reset(),s(),m(),$(".button-cancel",e).click(),alert("Thêm dịch vụ thành công!")):"max_us_featured"===i?t.fadeIn():alert("Sorry! Can not create this service! :("),r.fadeOut(),a.fadeIn()}),!1})},o=function(){$("#editUserService_form").on("submit",function(){$(this).find("textarea")[0].text=CKEDITOR.instances.user_description_edit.getData(),CKEDITOR.instances.user_description_edit.updateElement();var e=$(this),i=e.serialize(),r=e.find(".e-loading"),a=e.find(".e-done"),t=e.find(".warning");r.fadeIn(),a.hide(),t.hide();var c=URL+"spaCMS/menu/xhrUpdate_user_service";return $.post(c,i,function(i){console.log(i),"success"===i?(s(),m(),$(".button-cancel",e).click(),alert("Sửa thành công!")):"max_us_featured"===i?t.fadeIn():alert("Sorry! Can not edit this service! :("),r.fadeOut(),a.fadeIn()}),!1})},p=function(){$("#deleteUserService").on("click",function(){jConfirm("Bạn có thực sự chắc chắn xóa bỏ dịch vụ này?","Xóa dịch vụ",function(e){if(e){var i=$("#editUserService_form"),r=$(this),a=r.find(".d-loading"),t=r.find(".d-done"),c=$("input[name=user_service_id]",i).val();a.fadeIn(),t.hide();var n=URL+"spaCMS/menu/xhrDelete_user_service";$.post(n,{user_service_id:c},function(e){"success"===e?(s(),m(),$(".button-cancel",i).click()):alert("Sorry! Can not edit this service! :("),a.fadeOut(),t.fadeIn()})}})}),$("#deleteUserService").on("click",function(){})},m=function(){var e='<div data-id=":user_service_id" class="offer state-act">';e+='<div tabindex="-1" class="offer-content">',e+='<img class="pic" alt="" src=":user_service_image">',e+='<div class="title">',e+='<span class="icon icons-act"></span>',e+=":user_service_name",e+="</div>",e+="</div>",e+='<div class="offer-delete" data-id=":user_service_id">',e+='<div class="icons-delete2 unfeature"></div>',e+="</div>",e+="</div>";var i='<div class="offer offer-empty">';i+="<p>",i+="Empty slot",i+="</p>",i+="</div>";var r=URL+"spaCMS/menu/xhrGet_user_service_featured";$.get(r,function(r){$(".featured").html("");var a="",t=5-r.length,c="";if($.each(r,function(i,r){c=r.user_service_image.split(","),c=get_thumbnail(c[0],user_id),a=e.replace(/:user_service_id/g,r.user_service_id),a=a.replace(/:user_service_name/g,r.user_service_name),a=a.replace(/:user_service_image/g,c),$(".featured").append(a)}),t>0)for(var n=0;t>n;n++)$(".featured").append(i);$(".offer-delete").on("click",function(){var e=$(this),r=e.attr("data-id"),a=URL+"spaCMS/menu/xhrDelete_user_service_featured";$.post(a,{user_service_id:r},function(r){if("success"===r){s();var a=e.parent();a.fadeOut(),$(".featured").append(i)}})})},"json")};return{init:function(){s(),c(),l(),u(),a(),v(),o(),p(),m()}}}(),ImageManager=function(){return{init:function(){$("#iM_editUS").click(function(){$("#imageManager_saveChange").attr("cover_id","editUS")}),$("#iM_addUS").click(function(){$("#imageManager_saveChange").attr("cover_id","addUS")}),$("#imageManager_saveChange").on("click",function(e){e.preventDefault();var i=$(this).attr("cover_id"),r=$("input:radio[name='iM-radio']:checked"),a=r.val(),s=r.attr("data-image");if("addUS"==i)var t=$("#iM_addUS"),c=$("#ListIM_addUS");else if("editUS"==i)var t=$("#iM_editUS"),c=$("#ListIM_editUS");var n=c.children().length+1;5==n&&t.hide();var _=null,d='<li class="single-picture">';d+='<div class="single-picture-wrapper">',d+='<img id="user_slide_thumbnail" src=":img_thumbnail">',d+='<input type="hidden" name="user_service_image[]" value=":image">',d+="</div>",d+='<div class="del_image icons-delete2"></div>',d+="</li>",_=d.replace(":img_thumbnail",s),_=_.replace(":image",a),c.append(_),$(".del_image").on("click",function(){var e=$(this).parent();e.remove();var i=c.children().length;5>i&&t.fadeIn()}),$("#imageManager_modal").modal("hide")})}}}(),UserServiceFeatured=function(){return{init:function(){}}}();LoadMoreInfo.init(),MenuGroupService.init(),ImageManager.init();