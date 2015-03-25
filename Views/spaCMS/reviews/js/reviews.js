/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    var params = {user_type: 'user'};
    var tb = $("#review_list").dataTable();
    $(".modal").on("show.bs.modal", function (e) {
        $("#review-reply").val('');
        r = $(e.relatedTarget);
        r.removeClass('alert alert-danger');
        r.removeAttr('title');
        $("#review-content").empty().html(r.find(".review-content").html());
        $("#client-name").empty().html(r.find(".client-name").html());
        params.user_id = r.attr("data-user-id");
        params.client_id = r.attr("data-client-id");
        $.ajax({
            url: URL + 'spaCMS/reviews/loadReplies',
            type: 'post',
            dataType: 'json',
            data: params,
        }).done(function (response) {
            try {
                $("#review-replies-list").empty();
                $.each(response, function (index, val) {
                    /* iterate through array or object */
                    html = "<span class='author-name'>" + val.name + "</span>: " + val.content;
                    html += "<p class='reply-time small'>" + val.timecreated + "</p>";
                    $(".blank").clone().html(html).removeClass('hidden blank').addClass(val.user_type).appendTo('#review-replies-list');
                });
            } catch (e) {

            }
        }).fail(function () {

        }).always(function () {

        });
    });
    $("#do_reply").click(function (e) {
        var element = $(this);
        params.content = $("#review-reply").val();
        if(params.content.length<3){
            alert("Vui lòng nhập nội dung trên 3 ký tự");
            return false;
        }
        element.find(".button-icon").hide();
        element.find(".s-loading").show();
        $.ajax({
            url: URL + 'spaCMS/reviews/saveReply',
            type: 'post',
            data: params,
            dataType:"json"
        }).done(function (response) {
            if(response.success){
                $("#review-reply").val('');
                $("#review-replies-list").append('<div class="small reply-item user"><span class="author-name">'+response.username+'</span>: '+params.content+'<p class="reply-time small"> </p></div>');
            }

        }).fail(function () {
        }).always(function () {
            element.find(".button-icon").show();
            element.find(".s-loading").hide();
        });
    });

})