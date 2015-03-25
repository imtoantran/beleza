
$(document).ready(function () {
    if (IS_ADD == 1 && IS_EDIT == 0) {
//            loadParentMenu();
        checkValid();
        uploadImage();
    } else if (IS_ADD == 0 && IS_EDIT == 1) {
        loadMenuItem();
        checkValid();
        changeIcon();
    } else {
        loadMenuList();
    }

});


function uploadImage() {
    // show/ hide box upload
    actionBoxUpload();

    // just allow upload image when menu level =1 
    $('#menu_level').on('change', function () {
        if ($(this).val() != 1) {
            $('#box-upload').fadeOut('fast', function () {
                $('#select_upload').prop('disabled', true).val(0);
                $('#menu_background').val('').attr('data-url', '');
                $('#result_upload').html('');
            });
        } else {
            $('#select_upload').prop('disabled', false);
        }
    })

    // submit upload
    $('#upload_form').submit(function (e) {
        $.ajax({
            url: URL + 'admincp_menu/uploadImage',
            type: 'post',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (res) {
                // Upload success!
                var tag_error = $('#error_add_menu');
                switch (res.error) {
                    case 0:
                        alert('Upload hình thành công');
                        $('#result_upload').html('<img src="' + URL + '/' + res.url + '" style="padding: 5px; width:100%; border: 1px solid #cfcfcf;">');
                        $('#menu_background').attr('data-url', res.url);
                        break;

                    case 1:
                        alert('Kich thuong file khong qua 1MB');
                        $('#menu_background').attr('data-url', res.url);
                        $('#menu_background').attr('data-url', '');
                        break;

                    case 2:
                        alert('File nay da ton tai');
                        $('#menu_background').attr('data-url', '');
                        break;

                    case 3:
                        alert('Kieu file khong hop le');
                        $('#menu_background').attr('data-url', '');
                        break;

                    case 4:
                        alert('Vui long chon file');
                        $('#menu_background').attr('data-url', '');
                        break;
                }
            }
        });
        e.preventDefault();
    });

}
function returnToMenu() {
    jumpToOtherPage(URL + 'admincp_menu');
}
function loadMenuList() {
    $('#check-all').on('change', function () {
        if ($('#check-all').attr('checked') == 'checked') {
            $.each($(".radio-menu"), function () {
                $(this).prop('checked', true);
                ;
            });
        } else {
            $.each($(".radio-menu"), function () {
                $(this).prop('checked', false);
            });
        }
    });
    $.ajax({
        url: URL + 'admincp_menu/loadMenuList',
        type: 'post',
        dataType: 'json',
        success: function (response) {

            if (response[0] != null) {
                var html = '';
                $.each(response, function (i, item) {
                    html += '<tr role="row">';
                    // all
                    html += '<td class="text-center mn-lv' + item.menu_level + '">';
                    html += '<input class="radio-menu" type="checkbox" name="vehicle" value="' + item.menu_id + '">';
                    html += '</td>';

                    // id
                    html += '<td class="text-right">';
                    html += item.menu_id;
                    html += '</td>';

                    // title    
                    html += '<td class="item-menu-title">';
                    html += item.menu_title;
                    html += '</td>';

                    //level     
                    html += '<td>';
                    html += item.menu_level;
                    html += '</td>';

                    //parent
                    html += '<td class="text-right">';
                    html += item.menu_parent;
                    html += '</td>';

                    //icon
                    html += '<td class="text-center">';
                    html += '<i class="' + item.menu_icon + '"></i>'
                    html += '</td>';

                    //order
                    html += '<td class="text-center">';
                    html += item.menu_order;
                    html += '</td>';

                    //link
                    html += '<td>';
                    html += '<a href="' + item.menu_link + '" style="font-size: 0.9em;" target="blank" title="' + item.menu_link + '">';
                    html += reduceText(item.menu_link, 30);
                    html += '</a>';
                    html += '</td>';

                    //background
                    html += '<td>';
                    if (item.menu_background.length > 0) {
                        html += '<img class="text-algin" src="' + URL + '/' + item.menu_background + '" style=" padding: 5px; width:100%; border: 1px solid #cfcfcf;" title="' + item.menu_background + '">';
                    }
                    html += '</td>';

                    //status
                    html += '<td class="text-center">';
                    if (item.menu_enable == 0) {
                        html += '<span class="badge">Ẩn</span>';
                    } else {
                        html += '<span class="badge" style="background-color: #000;">Hiện</span>';

                    }
                    html += '</td>';

                    html += '</tr>';
                });
                $('#menu_list tbody').html(html);
            }
        },
        complete: function () {
            $('#menu_list').DataTable();
//			$("#spa_list").delegate("tbody tr", "click", function() {
//				var user_id = $(this).find('td').eq(0).text();
//				// console.log(user_id);
//				jumpToOtherPage(URL + 'admincp_spa/editSpaDetail/' + user_id);
//			});
        }
    });
}
function reduceText(text, limit) {
    if (text.length > limit && text != "") {
        return (text.substr(0, limit) + '...');
    }
    return text;
}
function deleteMenu() {
    var arr_check = [];
    $.each($(".radio-menu"), function () {
        if ($(this).attr('checked') == 'checked') {
            arr_check.push($(this).val());
        }
    });
    if (arr_check.length > 0) {
        var r = confirm("Có " + arr_check.length + " danh mục menu muốn xóa?");
        if (r == true) {
            $.ajax({
                url: URL + 'admincp_menu/deleteMenu',
                type: 'post',
                data: {'arr_check': arr_check},
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response == 1) {
                        loadMenuList();
                        alert('Xóa menu thành công');

                    } else {
                        alert('Xóa menu không thành công, xin mời bạn kiểm tra lại.');
                    }
                }
            });
        } else {
            alert('Xóa menu không thành công, xin mời kiểm tra lại.');
        }
    } else {
        alert('Xin mời chọn danh mục menu cần xóa.');
    }


}
function addNewMenu() {
    jumpToOtherPage(URL + 'admincp_menu/addNewMenu');
}
function editMenu() {
    var arr_check = [];
    $.each($(".radio-menu"), function () {
        if ($(this).attr('checked') == 'checked') {
            arr_check.push($(this).val());
        }
    });
    if (arr_check.length == 1) {
        var id_checked = "";
        $.each($(".radio-menu"), function () {
            if ($(this).attr('checked') == 'checked') {
                jumpToOtherPage(URL + 'admincp_menu/editMenu/' + $(this).val());
            }
        });
    } else {
        alert('Chọn 1 menu để chỉnh sửa.');
    }

}


function loadMenuItem() {
    $.ajax({
        url: URL + 'admincp_menu/loadMenuItem',
        type: 'post',
        data: {'menu_id': MENU_ID},
        dataType: 'json',
        success: function (response) {
            if (response[0] != null) {
                $.each(response, function (k, v) {
                    $('#menu_title').val(v.menu_title);
                    $('#menu_icon').val(v.menu_icon);
                    $('#menu_level').val(v.menu_level);
                    $('#menu_link').val(v.menu_link);
                    $('#menu_enable').val(v.menu_enable);
                    $('#menu_order').val(v.menu_order);
                    loadParentMenu(v.menu_level, v.menu_parent);
                    actionBoxUpload();
                    uploadImage();
                    if (v.menu_background != "") {
                        $('#select_upload').val(1);
                        $('#box-upload').fadeIn('fast', function () {
                            $('#menu_background').attr('data-url', v.menu_background);
                        });
                        $('#result_upload').html('<img src="' + URL + '/' + v.menu_background + '" style="padding: 5px; width:100%; border: 1px solid #cfcfcf;">');
                    }
                });
            }
        },
        complete: function () {
            changeIcon();
        }
    });
}

function actionBoxUpload() {
    $('#select_upload').on('change', function () {
        if ($(this).val() == 1) {
            $('#box-upload').fadeIn('');
        } else {
            $('#box-upload').fadeOut('fast', function () {
                $('#result_upload').html('');
                $('#menu_background').val('').attr('data-url', '');
            });

        }
    });
}
function addSaveItemMenu() {
    $('#error_add_menu').fadeOut();
    $('div.done').fadeOut(function () {
        $('div.s-loading').fadeIn(function () {
            var menu_title = $('#menu_title').val();
            var menu_icon = $('#menu_icon').val();
            var menu_link = $('#menu_link').val();
            var menu_background = $('#menu_background').attr('data-url');
            var menu_level = $('#menu_level').val();
            var menu_parent = $('#menu_parent').val();
            var menu_order = $('#menu_order').val();
            var menu_enable = $('#menu_enable').val();

            if (menu_title == '') {
                $('#error_add_menu').text('Nhập đầy đủ các trường có (*)');
                $('#error_add_menu').fadeIn(function () {
                    $('div.s-loading').fadeOut(function () {
                        $('div.done').fadeIn();
                    });
                });
            } else {
                $.ajax({
                    url: URL + 'admincp_menu/addSaveMenu',
                    type: 'post',
                    data: {
                        menu_title: menu_title,
                        menu_icon: menu_icon,
                        menu_link: menu_link,
                        menu_background: menu_background,
                        menu_level: menu_level,
                        menu_parent: menu_parent,
                        menu_order: menu_order,
                        menu_enable: menu_enable
                    },
                    success: function (response) {
                        if (response == 1) {
                            alert('Thêm menu thành công');
                            jumpToOtherPage(URL + 'admincp_menu');
                        } else {
                            $('#error_add_menu').text('Thêm menu thất bại, Xin vui lòng thử kiểm tra lại !');
                            $('#error_add_menu').fadeIn(function () {
                                $('div.s-loading').fadeOut(function () {
                                    $('div.done').fadeIn();
                                });
                            });
                        }
                    }
                });
            }
        });
    });
}
function updateSaveItemMenu() {
    $('#error_add_menu').fadeOut();
    $('div.done').fadeOut(function () {
        $('div.s-loading').fadeIn(function () {
            var menu_title = $('#menu_title').val();
            var menu_title = $('#menu_title').val();
            var menu_icon = $('#menu_icon').val();
            var menu_link = $('#menu_link').val();
            var menu_background = $('#menu_background').attr('data-url');
            var menu_level = $('#menu_level').val();
            var menu_parent = $('#menu_parent').val();
            var menu_order = $('#menu_order').val();
            var menu_enable = $('#menu_enable').val();

            if (menu_title == '') {
                $('#error_add_menu').text('Nhập đầy đủ các trường có (*)');
                $('#error_add_menu').fadeIn(function () {
                    $('div.s-loading').fadeOut(function () {
                        $('div.done').fadeIn();
                    });
                });
            } else {
                $.ajax({
                    url: URL + 'admincp_menu/updateSaveMenu',
                    type: 'post',
                    data: {
                        menu_id: MENU_ID,
                        menu_title: menu_title,
                        menu_icon: menu_icon,
                        menu_link: menu_link,
                        menu_background: menu_background,
                        menu_level: menu_level,
                        menu_parent: menu_parent,
                        menu_order: menu_order,
                        menu_enable: menu_enable
                    },
                    success: function (response) {
                        if (response == 1) {
                            alert('Chỉnh sửa menu thành công');
                            location.reload(true);
                        } else {
                            $('#error_add_menu').text('Thêm menu thất bại, Xin vui lòng thử kiểm tra lại !');
                            $('#error_add_menu').fadeIn(function () {
                                $('div.s-loading').fadeOut(function () {
                                    $('div.done').fadeIn();
                                });
                            });
                        }
                    }
                });
            }
        });
    });
}

function loadParentMenu(level, parent) {
    var menu_parent = $('#menu_parent');
    var selected = "";
    if (level == 0) {

    } else if (level == 1) {
        menu_parent.html('<option value=0 selected>--- Không có ---</option>');
    } else {
        $.ajax({
            url: URL + 'admincp_menu/loadParentMenu',
            type: 'post',
            data: {'menu_level': level - 1},
            dataType: 'json',
            success: function (response) {
                if (response[0] != null) {
                    var html = '<option value=0 selected>--- Không có ---</option>';
                    $.each(response, function (key, value) {
                        if (parent == value.menu_id) {
                            html += '<option selected value="' + value.menu_id + '">' + value.menu_title + '</option>';
                        }
                        html += '<option value="' + value.menu_id + '">' + value.menu_title + '</option>';
                    });
                    $('#menu_parent').html(html);
                }
            }
        });
    }
}

function getListImage() {
    $.ajax({
        url: URL + 'admincp_menu/getListImage',
        type: 'post',
        dataType: 'json',
        success: function (res) {
            var tag = '';
            var path = res.url;
            $.each(res.img, function (k, v) {
                var url = URL + 'public/assets/img/menu/' + v;
                tag += '<img class="img-menu" src="' + url + '">';
                tag += '<span class="text-center" style="margin: 0px 20px 0px -150px;">';
                tag += '<button class="fa fa-close btn btn-warning" style="margin-left:35px;" onclick=deleteImg("' + v + '")></button>';
                tag += '<button class="fa fa-check btn btn-success" style="margin-left:10px;" onclick=selectImg("' + v + '") ></button>';
                tag += '</span>';
            })

            $('#content-list-img').html(tag);
        },
        complete: function () {
            $("#bg-list-img").modal('show');
        }
    });
}
function closeBoxListImg() {
    $("#bg-list-img").modal('hide');
}
function checkValid(){
    var men_level = $('#menu_level');
    men_level.on('change', function () {
        var value = $('#menu_level').val();
        if (value == 1) {
            loadParentMenu(1);

        } else if (value == 2) {
            loadParentMenu(2);
        } else {
            loadParentMenu(3);
        }
    });



    $('#menu_icon').on('change',function () {
        changeIcon();
    });

}
function changeIcon() {
    var icon_fa = $('#menu_icon').val();
    if (icon_fa.length > 0) {
        $('#cl-icon').html('<span class="' + icon_fa + ' btn btn-default" style="line-height: 20px; cursor:default;"></span>')
    } else {
        $('#cl-icon').html('');
    }
}
function selectImg(img) {
    $('#result_upload').html('<img src="' + URL + 'public/assets/img/menu/' + img + '" style="padding: 5px; width:100%; border: 1px solid #cfcfcf;">')
    $('#menu_background').attr('data-url', 'public/assets/img/menu/' + img);
    closeBoxListImg();
}

function deleteImg(img) {

    var r = confirm("Bạn có muốn xóa hình này không");
    if (r == true) {
        $.ajax({
            url: URL + 'admincp_menu/deleteImage',
            type: 'post',
            data: {'img_menu': img},
            success: function (res) {
                if (res == 1) {
                    $.ajax({
                        url: URL + 'admincp_menu/getListImage',
                        type: 'post',
                        dataType: 'json',
                        success: function (res) {
                            var tag = '';
                            var path = res.url;
                            $.each(res.img, function (k, v) {
                                var url = URL + 'public/assets/img/menu/' + v;
                                tag += '<img class="img-menu" src="' + url + '">';
                                tag += '<span class="text-center" style="margin: 0px 20px 0px -150px;">';
                                tag += '<button class="fa fa-close btn btn-warning" style="margin-left:35px;" onclick=deleteImg("' + v + '")></button>';
                                tag += '<button class="fa fa-check btn btn-success" style="margin-left:10px;" onclick=selectImg("' + v + '") ></button>';
                                tag += '</span>';
                            });
                            $('#content-list-img').html(tag);
                        }
                    });
                } else {
                    alert('Xóa thất bại, Xin vui lòng kiểm tra lại.');
                }
            }
        });
    } else {

    }


}

