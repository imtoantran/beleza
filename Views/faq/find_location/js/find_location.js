$(document).ready(function(){Find_Location.init()});var Find_Location=function(){var e=function(){var e=$(".data_service_name"),i=$(".data_service_image"),a=$(".data_service_description"),n='<div class="item row"><a href=":user_link"><div class="col-md-4"><img class="thumbnail" src=":user_logo" width="170" height="150" /></div><div class="col-md-8"><div class="clearfix"><div class="spa-name">:user_business_name</div><div class="rating">:user_rating</div></div><div class="spa-description">:user_description...</div></div></a></div>',s='<div class="item row"><div class="col-sm-2"><img class="img-reponsive img-circle" src=":client_avatar" width="72" height="72" /></div><div class="col-sm-10"><div class="clearfix"><div class="question-title"><a href=":question_link">:faq_title</a></div><div class="question-author"><em>Hỏi bởi <a href="javascript:void(0)">:client_name</a> - :faq_created</em></div></div><div class="question-content">:faq_content...</div></div></div>',t='<div class="item col-md-3"><div class=""><a href=":news_link"><img class="thumbnail" src=":news_image" width="200" height="150" /></a></div><div class=""><div class="clearfix"><p class="news-title"><a href=":news_link">:news_title</a></p></div><div class="news-content">:news_content...</div><div class="news-btn-more pull-right"><a class="btn btn-sm btn-orange" href=":news_link">Xem thêm</a></div></div></div>',c='<i class="fa fa-star"></i>',r='<i class="fa fa-star-o"></i>',l="",o=URL+"faq/find_location/xhrGet_load_page";$.get(o,{service_id:SERVICE_ID},function(o){jQuery.isEmptyObject(o)||(console.log(o),e.text(o.service.service_name),i.attr("src",URL+o.service.service_image),a.text(o.service.service_description),$.each(o.recent_location,function(e,i){l=n.replace(":user_logo",i.user_logo),l=l.replace(":user_business_name",i.user_business_name);for(var a="",s=0,t=0;5>s;s++,t++)a+=t<i.user_review_overall?c:r;l=l.replace(":user_rating",a),l=l.replace(":user_description",i.user_description.substr(0,200)),l=l.replace(":user_link",URL+"service/servicePlace/"+i.user_id),$(".recent-location").append(l)}),$.each(o.recent_question,function(e,i){l=s.replace(":client_avatar",URL+i.client_avatar),l=l.replace(":faq_title",i.faq_title),l=l.replace(":client_name",i.client_name),l=l.replace(":faq_created",i.faq_created),l=l.replace(":faq_content",i.faq_content.substr(0,100)),l=l.replace(/:question_link/g,URL+"faq/detail_question/"+i.faq_id),$(".list_question").append(l)}),$.each(o.recent_news,function(e,i){l=t.replace(":news_title",i.faq_title),l=l.replace(":news_image",URL+i.faq_image),l=l.replace(":news_content",i.faq_content.substr(0,190)),l=l.replace(/:news_link/g,URL+"faq/beauty_news/"+i.faq_id),$(".list_news").append(l)}))},"json").done(function(){})},i=function(){var e=$("#near-location");e.gmap({disableDefaultUI:!0,zoom:5}).bind("init",function(){e.gmap("getCurrentPosition",function(i,a){if("OK"===a){var n=new google.maps.LatLng(i.coords.latitude,i.coords.longitude);e.gmap("addMarker",{position:n,title:"Vị trí của bạn",icon:URL+"public/assets/img/map-marker.png",bounds:!0});var s={service_id:SERVICE_ID,current_lat:i.coords.latitude,current_lng:i.coords.longitude},t=URL+"faq/find_location/xhrGet_near_location";$.getJSON(t,s,function(i){var a=null;$.each(i,function(i,n){a=new google.maps.LatLng(n.user_lat,n.user_long),e.gmap("addMarker",{position:a,title:n.user_business_name,bounds:!0}).click(function(){e.gmap("openInfoWindow",{content:'<a href="'+URL+"service/servicePlace/"+n.user_id+'">'+n.user_business_name+"</a>"},this)})})}).done(function(){e.gmap("refresh")})}})})};return{init:function(){e(),i()}}}();