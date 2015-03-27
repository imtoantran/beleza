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
	}});
	$("[data-action=save]").on("click",function(e){
		var _ = this;
		$(_).attr("disabled",true);
		$.ajax({
			url:URL+$(_).data("controller"),
			data:{data:JSON.stringify($(".tag-data").select2("data"))},
			type:"post",
			dataType:"json",
			success:function(response){

			},
			complete:function(){$(_).attr("disabled",false);}
		})
	});
});