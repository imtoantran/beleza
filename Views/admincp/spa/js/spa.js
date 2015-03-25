$(document).ready(function () {
    if (IS_ADD == 1 && IS_EDIT == 0) {
        loadCity();
    } else if (IS_ADD == 0 && IS_EDIT == 1) {
		loadCity();
        loadUserDetailDistrict();
    } else {
        loadSpaList();
    }

    $('#submit-login-spa').on('click', function () {
        $('#login-spa').submit();
    });
});

/*LOAD CITY*/
function loadCity() {
	$.ajax({
		url : URL + 'index/loadCity',
		type : 'post',
		dataType : 'json',
		async: false,
		success : function(response) {
			if (response[0] != null) {
				var html = '<option value="">Chọn thành phố</option>';
				$.each(response, function(key, value) {
					html += '<option value="' + value.city_id + '">' + value.city_name + '</option>';
				});
				$('#user_city_id').append(html);
			}
		},
		complete : function() {
			//console.log($('#city_field option'));
			$('#user_city_id').on('click', function() {
				if ($(this).val() != '') {
					//$('#district_field').attr('disabled', false);
					loadDistrict($(this).val());
				} else {
					//$('#district_field').attr('disabled', false);
					$('#user_district_id').html('<option value="" selected>Chọn quận...</option>');
					// $('#create_place_district').html('<option value="" selected>Quận...</option>');
				}
			});

		}
	});
}

/*END LOAD CITY*/
/*-----------------------*/

/*LOAD DISTRICT*/
function loadDistrict(city_id) {
	$.ajax({
		url : URL + 'index/loadDistrict',
		type : 'post',
		dataType : 'json',
		async: false,
		data : {
			city_id : city_id,
		},
		success : function(response) {
			if (response[0] != null) {
				var html = '<option value="" selected>Chọn quận...</option>';
				$.each(response, function(key, value) {
					html += '<option value="' + value.district_id + '">' + value.district_name + '</option>';
				});
				$('#user_district_id').html(html);
			}else{
				$('#user_district_id').html('<option value="" selected>Chọn quận...</option>');
			}
		},
	});
}

function loadDetailDistrict(city_id, district_detail_id) {
	$.ajax({
		url : URL + 'index/loadDistrict',
		type : 'post',
		dataType : 'json',
		data : {
			city_id : city_id,
		},
		success : function(response) {
			if (response[0] != null) {
				var html = '<option value="" selected>Chọn quận...</option>';
				$.each(response, function(key, value) {
					html += '<option value="' + value.district_id + '">' + value.district_name + '</option>';
				});
				$('#user_district_id').html(html);
			}else{
				$('#user_district_id').html('<option value="" selected>Chọn quận...</option>');
			}
		},
		complete : function(){
			if (IS_ADD == 0 && IS_EDIT == 1){
				$('#user_district_id').val(district_detail_id);
			}
		}
	});
}

function loadUserDetailDistrict() {
    $.ajax({
        url: URL + 'index/loadDistrict',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            /* imtoantran check response is null */
            if (response != null) {
                /* imtoantran check response is null */
                if (response[0] != null) {
                    var html = '';
                    $.each(response, function (key, value) {
                        html += '<option value="' + value.district_id + '">' + value.district_name + '</option>';
                    });
                    $('#user_district_id').append(html);
                }
            }
        },
        complete: function () {
            loadUserDetail();
        }
    });
}

function loadSpaList() {
    $.ajax({
        url: URL + 'admincp_spa/loadSpaList',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            if (response[0] != null) {
                var html = '';
                $.each(response, function (i, item) {
                    html += '<tr>';
                    $.each(item, function (key, value) {
                        html += '<td>';
                        if (key == 'user_status_approve') {
                            if (value == '1') {
                                html += '<i class="fa fa-check text-success"><span style="display: none">' + value + '</span></i>';
                            } else if (value == '0') {
                                html += '<i class="fa fa-times text-danger"><span style="display: none">' + value + '</span></i>';
                            }
                        }
                        /*imtoantran add unpublished field*/

                        else if (key == 'user_unpublished') {
                            if (value == '1') {
                                html += '<i class="fa fa-check text-success"><span style="display: none">' + value + '</span></i>';
                            } else if (value == '0') {
                                html += '<i class="fa fa-times text-danger"><span style="display: none">' + value + '</span></i>';
                            }
                        }
                        /*imtoantran add unpublished field*/
                        else {
                            html += value;
                        }
                        html += '</td>';
                    });
                    html += '</tr>';
                });
                $('#spa_list tbody').html(html);
            }
        },
        complete: function () {
            $('#spa_list').DataTable();
            $("#spa_list").delegate("tbody tr", "click", function () {
                var user_id = $(this).find('td').eq(0).text();
                // console.log(user_id);
                jumpToOtherPage(URL + 'admincp_spa/editSpaDetail/' + user_id);
            });
        }
    });
}

function addSaveDetail() {
    $('#error_add_spa').fadeOut();
    $('div.done').fadeOut(function () {
        $('div.s-loading').fadeIn(function () {
            var e_mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var user_email = $('#user_email').val();
            var check = e_mail.test(user_email);
            var user_full_name = $('#user_full_name').val();
            var user_business_name = $('#user_business_name').val();
			var user_city_id = $('#user_city_id').val();
            var user_district_id = $('#user_district_id').val();
            var user_address = $('#user_address').val();
            var user_phone = $('#user_phone').val();
            if (user_email == '' || user_business_name == '' || user_address == '' || user_district_id == '' || user_city_id =='') {
                $('#error_add_spa').text('Nhập đầy đủ các trường có (*)');
                $('#error_add_spa').fadeIn(function () {
                    $('div.s-loading').fadeOut(function () {
                        $('div.done').fadeIn();
                    });
                });
            } else {
                if (check == true) {
                    $.ajax({
                        url: URL + 'admincp_spa/addSaveDetail',
                        type: 'post',
                        data: {
                            user_full_name: user_full_name,
                            user_email: user_email,
                            user_business_name: user_business_name,
                            user_address: user_address,
							user_city_id: user_city_id,
                            user_district_id: user_district_id,
                            user_phone: user_phone
                        },
                        success: function (response) {
                            if (response == 200) {
                                alert('Thêm địa điểm thành công');
                                jumpToOtherPage(URL + 'admincp_spa');
                            } else {
                                $('#error_add_spa').text('Email đã tồn tại, chọn email khác !');
                                $('#error_add_spa').fadeIn(function () {
                                    $('div.s-loading').fadeOut(function () {
                                        $('div.done').fadeIn();
                                    });
                                });
                            }
                        }
                    });
                } else {
                    $('#error_add_spa').text('Email không hợp lệ !');
                    $('#error_add_spa').fadeIn(function () {
                        $('div.s-loading').fadeOut(function () {
                            $('div.done').fadeIn();
                        });
                    });
                }
            }
        });
    });
}

function loadUserDetail() {
    $.ajax({
        url: URL + 'admincp_spa/loadUserDetail',
        type: 'post',
        dataType: 'json',
        data: {
            user_id: USER_ID
        },
        success: function (response) {
            if (response[0] != null) {
                $.each(response[0], function (i, item) {
                    $('#' + i).val(item);
					if(i == 'user_city_id'){
						CITY_ID_2 = item;
					}
					if(i == 'user_district_id'){
						DISTRICT_ID_2 = item;
					}
                    if (i == "user_email") {
                        $('#user-email-login').val(item);
                    }
                    if (i == 'user_status_approve') {
                        if (item == '1') {
                            $('#btn_approve_spa span').text('Đã xác thực');
                            $('#btn_approve_spa').attr('disabled', true);
                        }
                    }
                    /* imtoantran load unpublished field*/
                    if (i == 'user_unpublished') {
                        checked = false;
                        if (item == 1) {
                            checked = true;
                            $.fn.bootstrapSwitch.defaults.state = true;
                        }
                        $('#' + i).attr("checked", checked);
                        $("[name='user_unpublished']").bootstrapSwitch({
                            state:checked,
                            onColor:'danger',
                            offColor:'success',
                            animate:true,
                            size:"small",
                            onText:"Không được hiển thị",
                            offText:"Được hiển thị",
                            onSwitchChange:function(e,s){
                                $.ajax({
                                    url:URL + "admincp_spa/saveDisplayOption",
                                    data:{disable:s,user_id:USER_ID},
                                    type:"post",
                                    dataType:"json",
                                    success:function(data){
                                        alert(data.message);
                                    }
                                })
                            }
                        });                    }
                    //$(".addition-info .modal-body").append("<div class='row'>"+i+": "+item+"</div>");
                    if (i == 'user_limit_before_booking') {
                        $("#modal-" + i).html(item + " ngày trong tương lai");
                    } else if (i == 'user_limit_before_service') {
                        hours = Math.round(item / 60);
                        days = Math.round(hours / 24);
                        weeks = Math.round(days / 7);
                        txt = '';
                        if (weeks) txt += weeks + ' tuần ';
                        if (days) txt += days + ' ngày ';
                        if (hours) txt += hours + ' giờ ';
                        $("#modal-" + i).html(txt);
                    } else if (i == 'user_is_use_gvoucher' || i == 'user_is_use_evoucher' || i == 'user_is_use_appointment') {
                        if (item) {
                            $("#modal-" + i).html('Có');
                        } else {
                            $("#modal-" + i).html('Không');
                        }
                    } else if (i == 'user_open_hour') {
                        opens = JSON.parse(item);
                        $.each(opens, function (index, value) {
                            $("#" + index + " input").attr("disabled", true);
                            if (value[0] == 0) {
                                $("#" + index + " input").removeAttr("checked");
                            }
                            $("#" + index).append("<span>" + value[1] + ":00 - " + value[2] + ":00 </span>");
                        })
                    }
                    else {
                        $("#modal-" + i).html(item);
                    }
                    /* imtoantran load unpublished field*/
                });
            } else {
                $('#edit_place').hide();
                $('#btn_edit_spa').hide();
                $('#btn_delete_spa').hide();
                $('#error_edit_place').fadeIn();
            }
        },
        complete: function () {
			loadDistrict(CITY_ID_2);
			$('#user_district_id').val(DISTRICT_ID_2);
        }
    });
}

function saveEditDetail() {
    cfirm = confirm('Bạn có muốn sửa không?');
    if (cfirm == true) {
        $('#btn_edit_spa').attr('disabled', true);
        $('#btn_delete_spa').attr('disabled', true);
        $('#btn_approve_spa').attr('disabled', true);
        $('div.done').fadeOut(function () {
            $('div#save_loading').fadeIn(function () {
                var user_full_name = $('#user_full_name').val();
                var user_district_id = $('#user_district_id').val();
				var user_city_id = $('#user_city_id').val();
                var user_address = $('#user_address').val();
                var user_phone = $('#user_phone').val();
                $.ajax({
                    url: URL + 'admincp_spa/saveEditDetail',
                    type: 'post',
                    data: {
                        user_id: USER_ID,
                        user_full_name: user_full_name,
                        user_address: user_address,
                        user_district_id: user_district_id,
						user_city_id: user_city_id,
                        user_phone: user_phone,
                        /* imtoantran save unpublished field */
                        user_unpublished: user_unpublished
                        /* imtoantran save unpublished field */
                    },
                    success: function (response) {
                        if (response == 200) {
                            $('div#save_loading').fadeOut(function () {
                                $('div.done').fadeIn(function () {
                                    alert('Sửa thành công !');
                                    jumpToOtherPage(URL + 'admincp_spa');
                                });
                            });
                        } else {
                            $('div#save_loading').fadeOut(function () {
                                $('div.done').fadeIn(function () {
                                    alert('Sửa thất bại hoặc bạn chưa sửa gì hết !');
                                    $('#btn_edit_spa').attr('disabled', false);
                                    $('#btn_delete_spa').attr('disabled', false);
                                    $('#btn_approve_spa').attr('disabled', false);
                                });
                            });
                        }
                    },
                    complete: function () {
                        // $('div#save_loading').fadeOut(function() {
                        // $('div.done').fadeIn();
                        // });
                    }
                });
            });
        });
    }
}

function deleteUser() {
    cfirm = confirm('Bạn có muốn xóa không?');
    if (cfirm == true) {
        $('#btn_edit_spa').attr('disabled', true);
        $('#btn_delete_spa').attr('disabled', true);
        $('#btn_approve_spa').attr('disabled', true);
        $('div.remove').fadeOut(function () {
            $('div#remove_loading').fadeIn(function () {
                $.ajax({
                    url: URL + 'admincp_spa/deleteUser',
                    type: 'post',
                    data: {
                        user_id: USER_ID,
                    },
                    success: function (response) {
                        if (response == 200) {
                            $('div#remove_loading').fadeOut(function () {
                                $('div.remove').fadeIn(function () {
                                    alert('Xóa thành công !');
                                    jumpToOtherPage(URL + 'admincp_spa');
                                });
                            });
                        } else {
                            $('div#remove_loading').fadeOut(function () {
                                $('div.remove').fadeIn(function () {
                                    alert('Xóa thất bại !');
                                    $('#btn_edit_spa').attr('disabled', false);
                                    $('#btn_delete_spa').attr('disabled', false);
                                    $('#btn_approve_spa').attr('disabled', false);
                                });
                            });
                        }
                    },
                    complete: function () {
                    }
                });
            });
        });
    }
}

function approveUser() {
    cfirm = confirm('Bạn có muốn xác thực spa này không?');
    if (cfirm == true) {
        $('#btn_edit_spa').attr('disabled', true);
        $('#btn_delete_spa').attr('disabled', true);
        $('#btn_approve_spa').attr('disabled', true);
        $('div.approved').fadeOut(function () {
            $('div#approved_loading').fadeIn(function () {
                var user_email = $('#user_email').val();
                $.ajax({
                    url: URL + 'admincp_spa/approveUser',
                    type: 'post',
                    data: {
                        user_id: USER_ID,
                        user_email: user_email
                    },
                    success: function (response) {
                        if (response == 200) {
                            $('div#approve_loading').fadeOut(function () {
                                $('div.approve').fadeIn(function () {
                                    alert('Xác thực thành công !');
                                    jumpToOtherPage(URL + 'admincp_spa');
                                });
                            });
                        } else {
                            $('div#approve_loading').fadeOut(function () {
                                $('div.approve').fadeIn(function () {
                                    alert('Xác thực thất bại !');
                                    $('#btn_edit_spa').attr('disabled', false);
                                    $('#btn_delete_spa').attr('disabled', false);
                                    $('#btn_approve_spa').attr('disabled', false);
                                });
                            });
                        }
                    },
                    complete: function () {
                    }
                });
            });
        });
    }
}

function addSpaDetail() {
    jumpToOtherPage(URL + 'admincp_spa/addSpaDetail');
}

function returnToSpa() {
    jumpToOtherPage(URL + 'admincp_spa');
}
