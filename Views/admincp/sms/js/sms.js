jQuery(document).ready(function ($) {
    var loadSMSstatus = function () {
        $.ajax({
            url: URL + 'admincp_sms/switchSMS',
            type: 'POST',
            dataType: 'json',
            data: {value: $("input[name=smsstatus]").val()}
        }).done(function (res) {
            $("#sms-status").html(res.html);
            $("input[name=smsstatus]").val(res.t);
        }).fail(function () {
            console.log("error");
        }).always(function () {
            $(".show-modal").modal("hide");
        });
    }

    $("#sms_list input").keypress(function () {
        id = $(this).attr("id").replace("sms-content-", "");
        $("#sms-" + id).attr("disabled", false);
    })    /*
     * imtoantran 
     * save sms
     */
    $(".save").click(function (event) {
        $(this).attr('disabled', true);
        id = $(this).attr("id").replace("sms-", '');
        content = $("#sms-content-" + id).val();
        $.ajax({
            url: URL + 'admincp_sms/saveSMS',
            type: 'POST',
            data: {id: id, content: content},
        }).done(function () {
            alert("Đã lưu SMS template")
        }).fail(function () {
            console.log("error");
        }).always(function () {
            console.log("complete");
        });
    });
    /*
     * imtoantran
     * turn sms module on/off
     */
    $("#sms-turn").click(loadSMSstatus);
    /**
     * @author imtoantran@gmail.com
     * 
     */
    $(".stat").click(function () {
        id = $(this).attr("id").replace("status-", '');
        var thisElement = $(this);
        $.ajax({
            url: URL + 'admincp_sms/changeStatus',
            type: 'POST',
            data: {id: id},
        }).done(function (res) {
            $(thisElement).html(res);
        }).fail(function () {
            console.log("error");
        }).always(function () {
            $(".show-modal").modal("hide");
        });
    });
});