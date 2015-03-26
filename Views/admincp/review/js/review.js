$(document).ready(function () {
    var f = function (e) {
        var _ = this;
        $(_).find(".glyphicon").fadeOut("fast",function(){$(_).find(".s-loading").fadeIn();});

        $.ajax({
            url: $(this).data("controller"),
            type: 'post',
            dataType: 'json',
            success: function (response) {
                oTable.fnClearTable();
                if(response.length) {
                    oTable.fnAddData(response);
                }
            },
            complete: function () {
                $("#review_list").delegate("tbody tr", "click", function () {
                    var aPos = $(this).index();
                    var aData = currData[aPos];
                    var client_id = aData[6];
                    var user_id = aData[7];
                    jumpToOtherPage(URL + 'admincp_review/editReviewDetail/' + client_id + ',' + user_id);
                });
                $(_).find(".s-loading").fadeOut("fast",function(){$(_).find(".glyphicon").fadeIn();});
            },
            done:function(){
                $(_).find(".s-loading").fadeOut("fast",function(){$(_).find(".glyphicon").fadeIn();});
            }
        });
    }
    $(".sidebar").on("click", ".loadreview", f);
    if (IS_INDEX == 1 && IS_ADD == 0 && IS_EDIT == 0) {
        $(".loadreview:first").trigger("click");
        oTable = $('#review_list').dataTable({
            "oLanguage": {
                "sZeroRecords": "Không có dữ liệu nào cả.",
                "sSearch": "Tìm kiếm: ",
                "sLengthMenu": "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
                "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
                "sInfoEmpty": "Hiển thị 0 đến 0 của 0 dòng."
            },
            "fnPreDrawCallback": function (oSettings) {
                /* reset currData before each draw*/
                currData = [];
            },
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                /* push this row of data to currData array*/
                currData.push(aData);

            },
            "fnDrawCallback": function (oSettings) {
                /* can now access sorted data array*/
                // console.log(currData);
            }
        });
    }
    if (IS_INDEX == 0 && IS_ADD == 1 && IS_EDIT == 0) {

    }
    if (IS_INDEX == 0 && IS_ADD == 0 && IS_EDIT == 1) {
        loadReviewDetailEdit();
    }
});

function returnToReview() {
    jumpToOtherPage(URL + 'admincp_review');
}

function loadReviewDetailEdit() {
    $.ajax({
        url: URL + 'admincp_review/loadReviewDetailEdit',
        type: 'post',
        dataType: 'json',
        data: {
            review_id: REVIEW_ID
        },
        success: function (response) {
            if (response[0] != null) {
                $.each(response[0], function (key, value) {
                    if (key == 'user_review_status') {
                        if (value != 1) {
                            $('#btn_edit_review').attr('disabled', false);
                            $('#edit_text').text('Duyệt');
                            $('#btn_delete_review').show();
                        }
                    }
                    $('#' + key).val(value);
                    if (key == 'client_join_date') {
                        var join_date = value.split(' ');
                        $('#' + key).val(formatDate(join_date[0]) + ' ' + join_date[1]);
                    }
                });
            } else {
                $('#main_detail').html('<div class="alert alert-warning"><h3><b>Cảnh báo!</b></h3><span>Đánh Giá không tồn tại</span></div>');
            }
        },
        complete: function () {

        }
    });
}

function editReview() {
    cfirm = confirm('Bạn có muốn kiểm duyệt không?');
    if (cfirm == true) {
        $('#btn_edit_review').attr('disabled', true);
        $('#btn_delete_review').attr('disabled', true);
        $('div.done').fadeOut(function () {
            $('#edit_loading').fadeIn(function () {
                $.ajax({
                    url: URL + 'admincp_review/editReview',
                    type: 'post',
                    data: {
                        review_id: REVIEW_ID,
                    },
                    success: function (response) {
                        if (response == 200) {
                            alert('Kiểm duyệt thành công!');
                            $('div#edit_loading').fadeOut(function () {
                                $('div.done').fadeIn(function () {
                                    jumpToOtherPage(URL + 'admincp_review');
                                });
                            });
                        } else {
                            alert('Kiểm duyệt thất bại!');
                            $('div#edit_loading').fadeOut(function () {
                                $('div.done').fadeIn(function () {
                                    $('#btn_edit_review').attr('disabled', false);
                                    $('#btn_delete_review').attr('disabled', false);
                                });
                            });
                        }
                    },
                    complete: function () {
                        $('#btn_edit_review').attr('disabled', false);
                        $('#btn_delete_review').attr('disabled', false);
                    }
                });
            });
        });
    }
}

function deleteReview() {
    cfirm = confirm('Bạn có muốn xóa đánh giá này không?');
    if (cfirm == true) {
        $('#btn_edit_review').attr('disabled', true);
        $('#btn_delete_review').attr('disabled', true);
        $('div.remove').fadeOut(function () {
            $('#remove_loading').fadeIn(function () {
                $.ajax({
                    url: URL + 'admincp_review/deleteReview',
                    type: 'post',
                    data: {
                        review_id: REVIEW_ID,
                    },
                    success: function (response) {
                        if (response == 200) {
                            alert('Xóa đánh giá thành công !');
                            $('div#remove_loading').fadeOut(function () {
                                $('div.remove').fadeIn(function () {
                                    jumpToOtherPage(URL + 'admincp_review');
                                });
                            });
                        } else {
                            alert('Xóa đánh giá thất bại !');
                            $('div#remove_loading').fadeOut(function () {
                                $('div.remove').fadeIn(function () {
                                    $('#btn_edit_review').attr('disabled', false);
                                    $('#btn_delete_review').attr('disabled', false);
                                });
                            });
                        }
                    },
                    complete: function () {
                        $('#btn_edit_review').attr('disabled', false);
                        $('#btn_delete_review').attr('disabled', false);
                    }
                });

            });
        });
    }
}