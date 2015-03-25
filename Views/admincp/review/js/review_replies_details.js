$(document).ready(function() {
	var selected_review;
	$("#replies_list").dataTable();
	$(".save-action.reply").click(function(){

	});
	$("#replies_list").delegate("tbody tr", "click", function(e) {
		selected_review = $(this);
		form_reply = $("#reply-content");
		tr = $($(this)[0]).find("td");
		$(".modal-title").html(tr[1].innerHTML);
		reply_content = tr[3].innerHTML;
		reply_status = tr[3].innerHTML;
		form_reply.html(reply_content);
		$(".modal-footer .updateStatus").attr("data-id",$(this).attr("data-id"));
		$("#modal-reply").modal("show");
	});
	$(".modal-footer .updateStatus").click(function(event) {
		$.ajax({
			url: URL+'admincp_review/updateReply',
			type: 'POST',
			dataType: 'JSON',
			data: {id: $(this).attr("data-id"),status:$(this).attr("data-status")}
		})
			.done(function(response) {
				selected_review.find(".label").text(response.status_text);
			})
			.fail(function() {

			})
			.always(function() {

				$("#modal-reply").modal("hide");
			});

	});
});