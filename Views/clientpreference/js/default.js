$(document).ready(function() {
	var data_select = [];
	var url = URL + 'admincp_community/xhrGet_service_system';
	$.ajax({url:url,type:"post",dataType:"json",success:function(response){
		$.each(response, function(index, group_s){
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

		$('.tag-data').select2({
			multiple: true,
			data: {
				results: data_select
			}
		});
		
		$.ajax({
			url: URL+'clientpreference/getTag',
			type: 'POST',
			dataType: 'JSON',
		})
		.done(function(response) {
			if(response.success)
				$('.tag-data').select2("data",response.content);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			$('#save-tag').attr("disabled",false).find(".fa-spin").fadeOut("slow");
		});
		
	}});
	$("#save-tag").on("click",function(e){
		var _ = this;
		$(_).attr("disabled",true);
		$(_).find(".fa-spin").fadeIn("slow");
		$.ajax({
			url:URL+$(_).data("controller"),
			data:{data:JSON.stringify($(".tag-data").select2("data"))},
			type:"post",
			dataType:"json",
			success:function(response){

			},
			complete:function(){$(_).attr("disabled",false);$(_).find(".fa-spin").fadeOut("slow");}
		})
	});
});