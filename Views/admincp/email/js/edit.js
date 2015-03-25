console.log(window.id);
CKEDITOR.replace(
        'emailcontent',
    {
        allowedContent:true, 
        filter:false,
    });
$(".save").click(function (event) {
    content = CKEDITOR.instances.emailcontent.getData();
    subject = $("input[name='subject']").val();
    slug = $("input[name='slug']").val();
    name = $("input[name='name']").val();
    $(".modal-body").html("<i class='fa fa-refresh fa-spin'></i> Đang lưu email template...");
    if (slug == '') {
        $(".modal-body").html("Mã template không được để trống.");
        $("#saving").modal("show");
        return false;
    }
    $("#saving").modal("show");
    $.ajax({
        url: URL + 'admincp_email/save',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id, slug: slug, name: name, content: content, subject: subject
        },
    }).done(function (res) {
        $(".modal-body").html("Lưu email template thành công ...");
        if (res) {
            if (res.error) {
                $(".modal-body").html("Mã template này đã tồn tại hoặc không hợp lệ ...");
            } else {
                if (!id) {
                    id = res.id;
                    $("input[name='slug']").attr("disabled", true);
                }
            }
        }
    }).fail(function () {
        $(".modal-body").html("Lỗi lưu email template thất bại ...");
    }).always(function () {
        $("#saving").modal("show");
    });
});
$(function () {
    $('[data-toggle="popover"]').popover();
})
