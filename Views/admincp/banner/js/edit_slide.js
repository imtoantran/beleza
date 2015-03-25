/***
* author: imtoantran
* load slides
*/

function loadSlide() {
	$.ajax({
		url : URL + 'admincp_banner/loadSlide',
		type : 'post',
		dataType : 'json',
		data:{slide_id:slide_id},
		success : function(response) {
			if (response != null) {
				
				try{
					if(JSON.parse(response.params))
						params = JSON.parse(response.params);
					window.layers = JSON.parse(response.layers);
					$.each(window.layers, function(index, val) {
						caption = "<div id='slide_layer_"+index+"' style='z-index: 1; position: absolute; white-space: nowrap; right: auto; left: "+val.left+"px; bottom: auto; top: "+val.top+"px; width: auto; height: auto;' class='ui-draggble'>";
						caption +="<div class='innerslide-layer tp-caption "+val.style+"'>";
						caption +=val.text;
						caption +="</div>";
						caption += "</div>";
						li = document.createElement('li');
						$(li).attr('id', 'layer_sort_'+index);
						$(li).append(val.text);
						//$(li).append(val['2d_origin_y']);
						$('#sort_list').append(li);
						$('.rs-preview').append(caption);
					});
				}catch(e){

				}
				$(".rs-preview").css('background','url('+URL+'public/assets/revslider/images/'+params.image+')');				

			}
			$(".ui-draggble").draggable({
				drag:function (event,ui) {
					// body...		
					// change position			
					$("#layer_top").val($(this).position().top);
					layers[layerindex].top =  $(this).position().top;
					$("#layer_left").val($(this).position().left);
					layers[layerindex].left = $(this).position().left;
				}
			});
			$("#sort_list").sortable({
				update:function (event,ui) {
					// body...
					console.log($("#sort_list li"));
				}
			});
			$(".innerslide-layer").mousedown(function(event) {
				$('.layer-selected').removeClass('layer-selected');
				$(this).parent().addClass('layer-selected');
				$("#layer_text").val($(this).html());
				// position
				$("#layer_top").val($(this).parent().position().top);
				$("#layer_left").val($(this).parent().position().left);
				layerindex = $(this).parent().attr('id').replace("slide_layer_",'');
				$("#layer_style").val(layers[layerindex].style);
			});

		},
		complete : function() {
			
		}
	});
}


jQuery(document).ready(function($) {
	loadSlide();
	// update text
	$("#layer_text").keyup(function(event) {
		try{
			$(".layer-selected div").html($(this).val());
			layers[layerindex].text = $(this).val();		
		}catch(e){}
	});
	// update position
	$("#layer_top,#layer_left").keyup(function(event) {
		/* Act on the event */		
		attrib = event.target.id.replace('layer_','');
		layers[layerindex][attrib] = $(this).val();
		$(".layer-selected div").parent().css(attrib, $(this).val()+'px');
	});
	// add layer
	$("#add_layer").click(function(event) {
		caption = document.createElement('div');
		$(caption).attr({
			id: 'slide_layer_'+layers.length,	
			class:'ui-draggble'
		});
		$(caption).css({

			width:'auto',
		});
		txtcaption ="<div class='innerslide-layer tp-caption medium_grey'>";
		txtcaption +="Text "+layers.length;
		txtcaption +="</div>";
		$(caption).html(txtcaption);	
		newCaptionIndex = $(caption).attr('id').replace('slide_layer_','');
		layers.push({text:"Text "+layers.length,style:'medium_grey'});
		$("#layer_style").val('medium_grey');	
		$(caption).draggable({
			drag:function (event,ui) {
				
					// body...		
					// change position			
					$("#layer_top").val($(this).position().top);
					layers[newCaptionIndex].top =  $(this).position().top;
					$("#layer_left").val($(this).position().left);
					layers[newCaptionIndex].left = $(this).position().left;					
				}
			});
		
		$(caption).children('.innerslide-layer').mousedown(function(event) {
			$('.layer-selected').removeClass('layer-selected');
			$(this).parent().addClass('layer-selected');
			$("#layer_text").val($(this).html());
				// position
				$("#layer_top").val($(this).parent().position().top);
				$("#layer_left").val($(this).parent().position().left);
				layerindex = $(this).parent().attr('id').replace("slide_layer_",'');	
				$("#layer_style").val(layers[layerindex].style);		
			});
		$(".rs-preview").append(caption);
	});
	// delete layer
	$("#del_layer").click(function(event) {		
		deleteIndex = $(".layer-selected").attr('id').replace('slide_layer_', '');
		maxIndex = layers.length - 1;
		if(maxIndex!=0&&deleteIndex!=maxIndex)
		{
			layers[deleteIndex] = layers[maxIndex];
			$("#slide_layer_"+maxIndex).attr('id', 'slide_layer_'+deleteIndex);
		}
		//remove from data
		layers.splice(maxIndex,1);

		console.log(layers);
		$(".layer-selected").remove();
	});
	// save slide
	$(".btn-save").click(function(event) {
		
		layer = JSON.stringify(layers);
		if(params==null){
			alert("Phải chọn hình cho slie");
			return false;
		}
		$("#loading").modal('show');
		$.ajax({
			url: URL+'/admincp_banner/saveSlide',
			type: 'post',
			dataType: 'json',
			data: {data:{slide_id: slide_id,params:params,layers:layer}},
		})
		.done(function() {
			$("#loading").modal('hide');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			$("#loading").modal('hide');
		});
		
	});
	// change style
	$("#layer_style").change(function(event) {
		try{
			var tem = $(".layer-selected div");
			$(tem).removeClass($(tem).attr('class'));
			$(tem).addClass('innerslide-layer tp-caption '+$(this).val());
			layers[layerindex].style = $(this).val();
		}catch(e){
			console.log(e);
		}
	});
	// change iamge
	$("#change_image").click(function(event) {
		/* Act on the event */		
		$("#image_manager").modal('show');
		loadAllSlides();
	});
});
// load all slides
var imageTable = null;
function loadAllSlides (argument) {
	$.ajax({
		url : URL + 'admincp_banner/loadAllSlides',
		type : 'post',
		dataType : 'json',
		success : function(response) {
			if (response[0] != null) {
				$('#slides_list tbody').html('');
				var html = '';
				$.each(response, function(i, item) {
					html += '<tr>';
					$.each(item, function(key, value) {
						html += '<td>';
						if(key == 'url'){
							//var thumb = JSON.parse(value);
							html += "<img height='50' width='50' src='"+baseURL+value+"'' />";
						}else{
							html += value;
						}
						html += '</td>';
					});
					html += '<td><button class="btn-danger btn deleteImage" data-image="'+item.name+'" data-id="'+item.id+'"><i class="fa fa-remove "></i></button></td>';
					html += '</tr>';
				});
				$('#slides_list tbody').html(html);
			}
		},
		complete : function() {
			imageTable = $('#slides_list').DataTable();
			$("#slides_list").undelegate(".deleteImage", "click");
			$("#slides_list").delegate('.deleteImage',"click",function(e){
				if(!confirm("Xóa hình này")){
					return false;
				}
				var thisRow = $(this).parent().parent();
				$.ajax({
					url: URL+'admincp_banner/deleteImage',
					type: 'post',
					data: {id: $(this).attr("data-id"),imageName:$(this).attr("data-image")},
				})
				.done(function() {
					thisRow.fadeOut('slow', function() {
						$(this).remove();
						$("#error-message").html("<h1>Xóa hình thành công</h1>");
						$("#error-modal").modal("show");
					});												
				})
				.fail(function() {
					alert("Xóa hình thất bại")
				})
				.always(function() {

				});	
				e.stopPropagation();
				return false;
			});				
			$("#slides_list").undelegate("tbody tr", "click");
			// selected image
			$("#slides_list").delegate("tbody tr", "click", function(e) {		
				btn = $(e.target);
				var slide_id = $('td',this).eq(0).text();				
				temImage = $('td',this).eq(1).text();
				params.image = temImage;
				$(".rs-preview").css('background-image', 'url('+URL+'public/assets/revslider/images/'+params.image+')');
				$("#image_manager").modal('hide');				
			});		
		}
	});	
}
// upload image
$( '#upload_form' ) .submit( function( e ) {
	$.ajax( {
		url: URL + 'admincp_banner/upload',
		type: 'POST',
		data: new FormData( this ),
		processData: false,
		contentType: false,
		success:function (res) {
			res = JSON.parse(res);
      	// body...
      	$(".upload-message").html();
      	if(res.success){
      		loadAllSlides();
      		$("#error-message").html('<p>'+res.success+'</p>');
      		$("#error-modal").modal("show");
      	}
      	else{
      		t = $("<div/>");
      		$.each(res.error, function(index, val) {
      			/* iterate through array or object */
      			t.append('<p class="alert alert-info">'+val+'</p>');
      		});
      		$("#error-message").html(t);
      		$("#error-modal").modal("show");
      	}
      }
  } );
	e.preventDefault();
} );
// edit css
$("#edit_css").click(function(event) {
	$("#save-css").attr('disabled', true);
	if(!layerindex){
		alert("Vui lòng chọn lớp");
		return;
	}
	$("#css_edit").modal('show');
	console.log($("#layer_style").val());
	cssName = $("#layer_style").val();

	
	$("input[name=class-name]").val(cssName);
	$.ajax({
		url: URL + 'admincp_banner/loadCssContent',
		type: 'POST',
		dataType: 'json',
		data: {name: cssName},
	})
	.done(function(res) {
		$("#save-css").attr('disabled', false);
		try{
			test = JSON.parse(res.params);
			var css='';
			$.each(test, function(index, val) {
				css+=index+':'+val+';';
			});
			$("textarea[name=css-content]").val(css);
		}catch(e){
			console.log(e);
		}
	})
	.fail(function() {
		//console.log("error");
	})
	.always(function() {
		//console.log("complete");
	});
	
});

//save css
$("#save-css").click(function(event) {
	$("#save-css").attr('disabled', true);
	$(this).attr('disabled', 'true');
	tem = $("textarea[name=css-content]").val().split(";");
	cssName = $("input[name=class-name]").val();
	cssData={};
	$.each(tem, function(index, val) {
		/* iterate through array or object */
		item = val.split(':');		 
		cssData[item[0]]=item[1];
	});
	//console.log($(".layer-selected"));
	//cssData = $.parseJSON(cssData);
	cssData = JSON.stringify(cssData);
	$.ajax({
		url: URL + 'admincp_banner/saveCss',
		type: 'POST',
		//dataType: 'json',
		data: {name: cssName,params:cssData},
	})
	.done(function() {
		layers[layerindex].style = cssName;
		var tem = $(".layer-selected div");
		$(tem).removeClass($(tem).attr('class'));
		$(tem).addClass('innerslide-layer tp-caption '+layers[layerindex].style);
		if($("#layer_style").val()!=cssName){
			option = document.createElement('option');
			$(option).val(layers[layerindex].style);
			$(option).attr('selected','true');
			$(option).text(layers[layerindex].style);
			$("#layer_style").append(option);	
		}
		$.ajax({
			url: URL + 'admincp_banner/reloadCss',
			type: 'post',
		})
		.done(function(css) {
			$("body style").remove();
			$("body").append(css);
			console.log($("body").find('style').html());
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		$("#css_edit").modal('hide');
	}).fail(function() {
		console.log("error");
	});
});
//console.log(window.layers);
