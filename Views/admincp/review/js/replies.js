$(document).ready(function() {
	var reply_id;
	var reply_content;
	var reply_status;
	var currentViewStatus = "unverified";// current view status
	function loadReplies(status) {
		$.ajax({
			url : URL + 'admincp_review/loadReplies',
			type : 'post',
			data:{status:status},
			dataType : 'json',
			success : function(response) {
				oTable.fnClearTable();
				if(response.length){
					oTable.fnAddData(response);
				}
			},
			complete : function() {
				$("#replies_list").delegate("tbody tr", "click", function(e) {
					form_reply = $("#reply-content");
					tr = $($(this)[0]).find("td");
					reply_id = tr[0].innerHTML;	
					$(".modal-title").html(tr[1].innerHTML);
					reply_content = tr[2].innerHTML;
					reply_status = tr[3].innerHTML;						
					form_reply.html(reply_content);
					$("#modal-reply").modal("show");
				});
			}
		});
	}

	oTable = $('#replies_list').dataTable({
					//data:response,
					"oLanguage" : {
						"sZeroRecords" : "Không có dữ liệu nào cả.",
						"sSearch" : "Tìm kiếm: ",
						"sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
						"sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
						"sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng.",
					},
					"fnPreDrawCallback" : function(oSettings) {
						/* reset currData before each draw*/
						currData = [];
					},
					"fnRowCallback" : function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
						/* push this row of data to currData array*/
						currData.push(aData);
					},
					"fnDrawCallback" : function(oSettings) {
						/* can now access sorted data array*/
					}
				})
	loadReplies('unverified');

	$(".modal-footer .updateStatus").click(function(event) {
		$.ajax({
			url: 'updateReply',
			type: 'POST',
			dataType: 'JSON',
			data: {id: reply_id,status:$(this).attr("data-status")},
		})
		.done(function() {

		})
		.fail(function() {

		})
		.always(function() {
			$("#modal-reply").modal("hide");
			loadReplies(currentViewStatus);
		});

	});
	/* load replies */
	$(".loadReplies").click(function(event) {
		currentViewStatus = $(this).attr("data-status");
		loadReplies(currentViewStatus);
	});
});