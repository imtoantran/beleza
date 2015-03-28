$(document).ready(function() {
	var tb = $("#booking_history_table").DataTable({
		"columnDefs": [ {
			"searchable": false,
			"orderable": false,
			"targets": 0
		}],
		            "oLanguage": {
                "sZeroRecords": "Không có dữ liệu nào cả.",
                "sSearch": "Tìm kiếm: ",
                "sLengthMenu": "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
                "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
                "sInfoEmpty": "Hiển thị 0 đến 0 của 0 dòng."
            },
		"order": [[ 1, 'asc' ]]
	});

	tb.on('order.dt search.dt', function () {
		tb.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			cell.innerHTML = i+1;
		} );
	}).draw();

	$("#booking_history_table").on("click","[data-action=delete]",function(e){
		var _ = this;
		$(_).attr("disabled",true);
		$(_).prepend(" <i class='fa fa-spin fa-refresh'/> ");
		$.ajax({url:URL+$(_).data("controller"),type:"post",data:$(_).data(),dataType:"json",success:function(response){
			if(response.success){
				$(_).closest("tr").fadeOut("slow",function(){tb.row($(this)).remove().draw()});
			}
		},complete:function(){
			$(_).find("<i class='fa fa-spin fa-refresh'/> ").remove();
		}});
	});
});