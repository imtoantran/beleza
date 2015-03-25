jQuery(document).ready(function ($) {
    /*
     * imtoantran 
     * save email template
     */
    $(".edit").click(function (event) {
        id = $(this).attr("id").replace("template-id-", '');
        $("input[name='id']").val(id);
        $("input[name='content']").val($("#email-content-" + id).val());
        $("input[name='template']").val($("#template-" + id).html());
        $("input[name='subject']").val($("#email-subject-" + id).val());
        $("input[name='slug']").val($("#slug-" + id).text());
        //console.log($("#email-content-"+ id).val());
        $("#form-holder").submit();
    });
    /*
     *@author imtoantran 
     * save email template
     */
    $(".add-template").click(function (event) {
        $("input[name='id']").val('');
        $("input[name='content']").val('');
        $("input[name='template']").val('');
        $("input[name='subject']").val('');
        //console.log($("#email-content-"+ id).val());
        $("#form-holder").submit();
    });
    
    /*
     * 
     * @author imtoantran@gmail.com
     * delete email template
     */
    $(".delete").click(function (event) {
        if(!confirm("Bạn muốn xóa email template này?"))
        {
            return false;
        }
        id = $(this).attr("id").replace("delete-template-id-", '');
        $.ajax({
            url: URL + 'admincp_email/delete',
            type: 'POST',
            data: {id: id},
        }).done(function () {
            $(".modal-body").html("Đã xóa email template thành công ...");
            $("#saving").modal("show");
        }).fail(function () {
            $(".modal-body").html("Lỗi xóa email template thất bại ...");
            $("#saving").modal("show");
        }).always(function () {
            console.log("complete");
        });
    });
    $("#saving").on('hidden.bs.modal', function (e) {
        $("tr#" + id).remove();
    });
    $("table").dataTable({
		"pageLength": 50
	});
});