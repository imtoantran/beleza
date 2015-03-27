$(document).ready(function() {
	loadClientWishlist();
	//xhrGet_appointment_time_end_for_edit();
	//xhrUpdate_booking_detail();
});

var loadClientWishlist = function() {
	var btnOM_cb = $("#client_wishlist_service tbody").find("tr");
	var cb_table = $("#client_wishlist_service");
	var cb_modal = $('#confirm_booking_modal');
	var cb_form = $('#confirm_booking_form');

	var html = '<tr data-service-id=":service_id" data-user-id=":user_id" class=":alert" data-user-lat=":user_lat" data-user-long=":user_long" :requestChange>'
			+	'<td>:stt</td>'
			+	'<td><img style="width: 60px; height: 60px; padding: 2px; border: 1px solid #eee;" src=":img_service" alt=""/> :service_name</td>'
			+	'<td>:service_location</td>'
			+	'<td>:full_price</td>'
			+	'<td>:sale_price</td>'
			+	'<td><button class="btn btn-danger btn-delete-wishlist" data-service-id=":service_id" >Xóa</button></td>'
			+	'</tr>';
	var out = '';

	var url = URL + 'clientwishlist/loadClientWishlist';
	$.get(url, function(data) {
        if(data.length > 0) {
				$.each(data, function(index, value) {

        		out = html.replace(':stt', index+1);
        		out = out.replace(':service_name', value['user_service_name']);
        		out = out.replace(':user_id', value['user_id']);
        		out = out.replace(':img_service', value['user_service_image']);
        		out = out.replace(':service_location', value['user_business_name']);
        		out = out.replace(':full_price',  $.number(value['user_service_full_price'])+' vnđ');
        		out = out.replace(':sale_price', $.number(value['user_service_sale_price'])+' vnđ');
        		out = out.replace(/:service_id/g, value['option_id']);
        		out = out.replace(':user_lat', value['user_lat']);
        		out = out.replace(':user_long', value['user_long']);

        		cb_table.find('tbody').append(out);
        	});

			cb_table.find('.btn-delete-wishlist').on('click', function(e){
				e.stopPropagation();
				var cf = confirm("Bạn có muốn xóa dịch vụ này ra khỏi danh sách yêu thích không?");
				if(cf){
					var self = $(this);
					var service_id = self.attr('data-service-id');
					$.ajax({
						url: URL + 'clientwishlist/deleteItemWishlist',
						type : 'post',
						data : {service_id: service_id},
						success : function(respon){
							if(respon){
								var parent_body = self.closest('tbody');
								self.closest('tr').remove();
								if(parent_body.find('tr').length <= 0){
									parent_body.append('<td valign="top" style="padding: 8px;" colspan="6" class="dataTables_empty">Không có dịch vụ nào được yêu thích.</td>');
								}
							}else{
								alert('Xóa dịch vụ thất bại, Xin vui lòng thử lại.')
							}
						}
					});
				}
			});


			cb_table.find('tr').on('click', function(){
				USER_SERVICE_ID = $(this).attr('data-service-id');
				USER_ID = $(this).attr('data-user-id');
				sUSER_LAT = $(this).attr('data-user-lat');
				USER_LONG = $(this).attr('data-user-long');

				var service_id = $(this).attr('data-service-id');

				loadServiceDetail(service_id);


			});



        }
    }, 'json')
    .done(function(){
    	cb_table.dataTable({
			"aaSorting" : [[1, "desc"]],
			"aoColumns": [
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
				//{ "bVisible": false },
			],
			"oLanguage" : {
				"sZeroRecords" : "Không có dịch vụ nào được yêu thích.",
				"sSearch" : "Tìm kiếm: ",
				"sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
				"sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
				"sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
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
				// console.log(currData);
			}
		});
		$('.dataTables_filter input').attr('placeholder', 'Gõ nội dung tìm kiếm...');

        //xhrGetOM_confirm_booking();

        // Nhấp nháy cho vui mắt
        var row_request_change = $("#client_wishlist_service tbody").find("tr[requestchange=1]");
		setInterval(function(){
			row_request_change.fadeOut();
			row_request_change.fadeIn();
		}, 3000);
    });
}
//
//var xhrGetOM_confirm_booking = function() {
//	var btnOM_cb = $("#client_wishlist_service tbody").find("tr");
//	var cb_table = $("#client_wishlist_service");
//	var cb_modal = $('#confirm_booking_modal');
//	var cb_form = $('#confirm_booking_form');
//	var eCA_modal = $('#editConfirmedAppointment_modal');
//	var eCA_form = $('#editConfirmedAppointment_form');
//
//	btnOM_cb.on("click", function() {
//		var _self = $(this);
//
//		var isChange = false; // Lịch này yêu cầu đổi?
//		var isSuccess = false;
//
//		// Nếu có thuộc tính yêu cầu đổi thì show modal đổi lịch
//		var requestChange = _self.attr("requestchange");
//		if(requestChange) {
//			isChange = true;
//
//			var data_id = _self.attr("data_id");
//			var data_get = {
//				"data_id" : data_id
//			}
//
//			var url = URL + 'bookinghistory/xhrGet_booking_detail';
//			$.get(url, data_get, function(data) {
//	            if(data.length == 0) return false;
//	            isSuccess = true;
//
//	            var user_id = data['data_user_id'];
//
//	            // DOM
//	            var data_u_bname        = eCA_modal.find('.data_u_bname');
//	            var data_u_id        	= $('input[name=bd_u_id]', eCA_modal);
//	            var data_us_id        	= $('input[name=bd_us_id]', eCA_modal);
//	            var data_us_name        = eCA_modal.find('.data_us_name');
//	            var data_date           = $('input[name=bd_date]', eCA_modal);
//	            var data_date_2         = eCA_modal.find('.data_date');
//	            var data_time_start     = $('input[name=bd_time_start]', eCA_modal);
//	            var data_time_start_2   = eCA_modal.find('.data_time_start');
//	            var data_time_end       = $('input[name=bd_time_end]', eCA_modal); //hidden
//	            var data_time_end_2     = eCA_modal.find('.data_time_end');
//	            var data_us_duration    = eCA_modal.find('.data_duration');
//
//	            // import data to view
//	            $('input[name=bd_id]', eCA_modal).val(data_id);
//	            data_u_bname.val(data['data_u_bname']);
//	            data_u_id.val(data['data_user_id']);
//	            data_us_id.val(data['data_us_id']);
//	            data_us_name.val(data['data_us_name']);
//	            data_date.val(data['data_date']);
//	            data_date_2.val( moment(data['data_date'], "YYYY-MM-DD").format("DD-MM-YYYY") );
//	            data_time_start.val( data['data_time_start'] );
//	            data_time_start_2.text( data['data_time_start'].substr(0,5) );
//	            data_time_end.val( data['data_time_end'] );
//	            data_time_end_2.text( data['data_time_end'].substr(0,5) );
//	            data_us_duration.text( data['data_us_duration'] );
//
//	            // Thêm sự kiện chọn dịch vụ
//	            // Điều chỉnh giờ bắt đầu phù hợp với dịch vụ được chọn,
//	            // và thông báo giờ kết thúc
//	            var user_openHour = $('input[name=user_openHour]', eCA_form);
//	            var user_closeHour = $('input[name=user_closeHour]', eCA_form);
//
//	            var date = moment(data_date.val(), "YYYY-MM-DD");
//	            var weekly = convert_num2dayval(date.format('d'));
//
//	            var isOpen = null;
//	            var openHour = null; // Giờ mở cửa
//	            var closeHour = null; // Giờ đóng cửa
//
//	            var url = URL + 'bookinghistory/xhrGet_user_open_hour';
//	            $.get(url, {'user_id':user_id} ,function(data){
//	                isOpen = data[weekly][0];
//	                openHour = data[weekly][1]; // Giờ mở cửa
//	                closeHour = data[weekly][2]; // Giờ đóng cửa
//
//	                user_openHour.val(openHour);
//	                user_closeHour.val(closeHour);
//
//	                var select_app_start = eCA_modal.find(".data_other_time");
//	                select_app_start.hide();
//	                // html cho option chọn thời gian bắt đầu
//	                var op_app_start = '<option value=":appointment_time_start" :isScheduled>:appointment_time_start</option>';
//	                var out_op_app_start = '<option value="">Chọn giờ</option>';
//	                var us_id = $('input[name=bd_us_id]', eCA_modal).val();
//	                var date = $('input[name=bd_date]', eCA_modal).val();
//	                // var openHour = $('input[name=user_openHour]', eCA_form).val();
//	                // var closeHour = $('input[name=user_closeHour]', eCA_form).val();
//	                var us_duration = eCA_modal.find('.data_duration').text(); // Thời gian thực hiện dịch vụ
//	                us_duration = parseInt(us_duration);
//
//	                // Tính các khoảng thời gian phù hợp để bắt đầu dịch vụ
//	                // openHour <= openHour + duration <= closeHour
//	                // Tạo danh sách giờ bắt đầu mới phù hợp với giờ mở cửa của spa và thời gian thực hiện dịch vụ
//	                var timeStart_begin = openHour*60; // Chuyển giờ sang phút để so sánh
//	                var timeStart_end   = closeHour*60;
//	                var timeStart_value = timeStart_begin;
//
//	                // ??? Tìm trong Appointment và Booking_detail
//	                //// Dịch vụ này (us_id), ngày này (date) có danh sách thời gian đã đặt chỗ chưa
//	                var url = URL + "bookinghistory/xhrGet_appointment_confirmed";
//	                $.get(url, {'us_id':us_id, 'date':date, 'user_id':user_id}, function(data_schedule){
//	                    var limit_booking = data_schedule["user_service_limit_booking"]; // Giới hạn cho phép đặt trùng giờ
//
//	                    while( timeStart_value < timeStart_end )
//	                    {
//	                        // Kiểm tra: thời gian này đã được đặt trước đó chưa?
//	                        var isScheduled = false;
//	                        var count_book = 0;
//
//	                        $.each(data_schedule, function(key, value){
//	                            // bỏ qua key lưu giá trị booking limit của dịch vụ vừa select
//	                            if(key == "user_service_limit_booking"){return;}
//
//	                            // Chuyển sang kiểu phút trước khi so sánh:
//	                            var schedule_time_start = convert_Hour2Min(value["schedule_time_start"]);
//	                            var schedule_time_end   = convert_Hour2Min(value["schedule_time_end"]);
//
//	                            // schedule_time_start <= timeStart_value < schedule_time_end
//	                            if( timeStart_value >= schedule_time_start && timeStart_value < schedule_time_end ) {
//	                                count_book++;
//	                            }
//	                        });
//	                        /// Nếu số lần đặt trùng giờ lớn hơn hoặc bằng giới hạn cho phép thì gán cờ ko cho phép đặt nữa
//	                        if(count_book >= limit_booking){
//	                            isScheduled = true;
//	                        }
//
//	                        // Chuyển từ phút sang kiểu hour:minute
//	                        timeStart_hourValue = convert_Min2Hour(timeStart_value);
//	                        out_op_app_start += op_app_start.replace(/:appointment_time_start/g, timeStart_hourValue);
//
//	                        // Nếu khoảng thời gian này đã được đặt trước đó thì disable thời gian này lại, để không cho người khác đặt trùng
//	                        if(isScheduled) {
//	                            out_op_app_start = out_op_app_start.replace(':isScheduled', 'disabled="disabled" style="color:red"');
//	                        } else {
//	                            out_op_app_start = out_op_app_start.replace(':isScheduled', '');
//	                        }
//
//	                        timeStart_value += us_duration; // Thời gian tiếp theo
//	                    }
//
//	                    select_app_start.html(out_op_app_start);
//	                },'json')
//	                .done(function(){
//	                    // Hiển thị danh sách thời gian bắt đầu phù hợp với ngày và dịch vụ này
//	                    select_app_start.fadeIn();
//	                });
//	            }, 'json');
//
//	        }, 'json')
//	        .done(function(){
//	            // loading.hide();
//	            // done.show();
//	            if(isSuccess && isChange){
//	                // Hiện giờ bắt đầu
//	                var vus_time_start = eCA_modal.find('.vus_time_start');
//	                vus_time_start.css("color","#000");
//	                eCA_form.find('.btnAct_submit').attr('disabled', 'disabled');
//
//	                eCA_modal.modal("show");
//	            } else {
//	                alert("Open editConfirmedAppointment popup error!");
//	            }
//
//	        });
//
//
//		}
//
//
//	    return false;
//	});
//}
//
//var xhrGet_appointment_time_end_for_edit = function() {
//		var eCA_modal = $('#editConfirmedAppointment_modal');
//		var eCA_form = $('#editConfirmedAppointment_form');
//        var select_app_start  = eCA_modal.find('.data_other_time');
//
//        select_app_start.change(function(){
//            var self = $(this);
//            var app_time_start  = self.val();
//            var app_time_end    = null;
//
//            if(app_time_start == "") {
//                app_time_start_old = eCA_modal.find('.data_time_start').text();
//                app_time_start = app_time_start_old;
//                // return false;
//            }
//
//            var us_duration = eCA_modal.find('.data_duration').text();
//            us_duration = parseInt(us_duration);
//
//            // Ẩn giờ bắt đầu
//            var vus_time_start = eCA_modal.find('.vus_time_start');
//            vus_time_start.css("color","#CCC");
//            eCA_form.find('.btnAct_submit').removeAttr('disabled');
//
//            var app_time_start_minute   = convert_Hour2Min(app_time_start);
//            var app_time_end_minute     = app_time_start_minute + us_duration;
//            var app_time_end            = convert_Min2Hour(app_time_end_minute);
//
//            var appointment_time_end = eCA_modal.find('.data_time_end');
//            appointment_time_end.text(app_time_end);
//            $('input[name=bd_time_end]', eCA_modal).val(app_time_end);
//            $('input[name=bd_time_start]', eCA_modal).val(app_time_start);
//        });
//
//
//		eCA_modal.find('.data_date').datepicker({
//            language: "vi",
//            // daysOfWeekDisabled: "0,6",
//            autoclose: true
//            // todayHighlight: true
//
//        }).on('changeDate',  function() {
//            var self = $(this);
//            var date_choice = self.val();
//
//            // Ẩn giờ bắt đầu
//            var vus_time_start = eCA_modal.find('.vus_time_start');
//            vus_time_start.css("color","#CCC");
//            eCA_form.find('.btnAct_submit').removeAttr('disabled');
//
//            var date = moment(date_choice, "DD-MM-YYYY").format('YYYY-MM-DD');
//            var us_id = $("input[name=bd_us_id]", eCA_form).val();
//            var user_id = $("input[name=bd_u_id]", eCA_form).val();
//            var us_duration = eCA_form.find('.data_duration').text();
//            var bd_date = $("input[name=bd_date]", eCA_modal);
//            bd_date.val(date);
//
//            // Clear danh sách giờ bắt đầu
//            select_app_start.hide();
//            var out_op_app_start = '';
//
//            var weekly = convert_num2dayval( moment(date).format('d') );
//            var isOpen = null;
//            var openHour = null; // Giờ mở cửa
//            var closeHour = null; // Giờ đóng cửa
//
//            var url = URL + 'bookinghistory/xhrGet_user_open_hour';
//	        $.get(url, {'user_id':user_id} ,function(data){
//                // console.log(data);
//
//                isOpen = data[weekly][0];
//                openHour = data[weekly][1]; // Giờ mở cửa
//                closeHour = data[weekly][2]; // Giờ đóng cửa
//
//                // Không đặt lịch hẹn nếu ngày này spa không có lịch mở cửa
//                if(!isOpen) {
//                	eCA_form.find('.btnAct_submit').attr('disabled', 'disabled');
//                    alert("Không có lịch làm việc vào ngày này, hãy chọn ngày khác!");
//                    return false;
//                }
//                eCA_form.find('.btnAct_submit').removeAttr('disabled');
//
//                var op_app_start = '<option value=":appointment_time_start" :isScheduled>:appointment_time_start</option>';
//                // var out_op_app_start = '<option value="">Chọn giờ</option>';
//
//                var user_openHour = $('input[name=user_openHour]', eCA_modal).val(openHour);
//                var user_closeHour = $('input[name=user_closeHour]', eCA_modal).val(closeHour);
//                us_duration = parseInt(us_duration);
//                // Tính các khoảng thời gian phù hợp để bắt đầu dịch vụ
//                // openHour <= openHour + duration <= closeHour
//                // Tạo danh sách giờ bắt đầu mới phù hợp với giờ mở cửa của spa và thời gian thực hiện dịch vụ
//                var timeStart_begin = openHour*60; // Chuyển giờ sang phút để so sánh
//                var timeStart_end   = closeHour*60;
//                var timeStart_value = timeStart_begin;
//
//                // ??? Tìm trong Appointment và Booking_detail
//                //// Dịch vụ này (us_id), ngày này (date) có danh sách thời gian đã đặt chỗ chưa
//                var url = URL + "bookinghistory/xhrGet_appointment_confirmed";
//                $.get(url, {'us_id':us_id, 'date':date, 'user_id':user_id}, function(data_schedule){
//                    var limit_booking = data_schedule["user_service_limit_booking"]; // Giới hạn cho phép đặt trùng giờ
//
//                    while( timeStart_value < timeStart_end )
//                    {
//                        // Kiểm tra: thời gian này đã được đặt trước đó chưa?
//                        var isScheduled = false;
//                        var count_book = 0;
//
//                        $.each(data_schedule, function(key, value){
//                            // bỏ qua key lưu giá trị booking limit của dịch vụ vừa select
//                            if(key == "user_service_limit_booking"){return;}
//
//                            // Chuyển sang kiểu phút trước khi so sánh:
//                            var schedule_time_start = convert_Hour2Min(value["schedule_time_start"]);
//                            var schedule_time_end   = convert_Hour2Min(value["schedule_time_end"]);
//
//                            // schedule_time_start <= timeStart_value < schedule_time_end
//                            if( timeStart_value >= schedule_time_start && timeStart_value < schedule_time_end ) {
//                                count_book++;
//                            }
//                        });
//                        /// Nếu số lần đặt trùng giờ lớn hơn hoặc bằng giới hạn cho phép thì gán cờ ko cho phép đặt nữa
//                        if(count_book >= limit_booking){
//                            isScheduled = true;
//                        }
//
//                        // Chuyển từ phút sang kiểu hour:minute
//                        timeStart_hourValue = convert_Min2Hour(timeStart_value);
//                        out_op_app_start += op_app_start.replace(/:appointment_time_start/g, timeStart_hourValue);
//
//                        // Nếu khoảng thời gian này đã được đặt trước đó thì disable thời gian này lại, để không cho người khác đặt trùng
//                        if(isScheduled) {
//                            out_op_app_start = out_op_app_start.replace(':isScheduled', 'disabled="disabled" style="color:red"');
//                        } else {
//                            out_op_app_start = out_op_app_start.replace(':isScheduled', '');
//                        }
//
//                        timeStart_value += us_duration; // Thời gian tiếp theo
//                    }
//                },'json')
//                .done(function(){
//                    // Hiển thị danh sách thời gian bắt đầu phù hợp với ngày và dịch vụ này
//                    select_app_start.html(out_op_app_start);
//                    select_app_start.fadeIn();
//
//                    // Khởi tạo thời gian kết thúc mặc định dịch vụ
//                    // = thời gian bắt đầu + duration
//                    app_time_start  = convert_Hour2Min( select_app_start.val() );
//                    app_time_end    = convert_Min2Hour( app_time_start + us_duration );
//
//                    // Khi thay đổi ngày hẹn thì giá trị của appointment_time_start = giờ mặc định của select chọn giờ khác
//                    $('input[name=bd_time_start]', eCA_modal).val(select_app_start.val());
//                });
//
//            }, 'json')
//            .done(function(){
//                if(isOpen) {
//                    // Hiển thị modal
//                    // aA_modal.modal('show');
//                }
//            });
//
//        });
//        $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
//}
//
//var xhrUpdate_booking_detail = function() {
//	var eCA_form = $('#editConfirmedAppointment_form');
//	eCA_form.on("submit", function(){
//        var _self = $(this);
//
//        var data_update = _self.serialize();
//        var isSuccess = false;
//        var loading = _self.find('.loading');
//        var done = _self.find('.done');
//        var warning_1 = _self.find('.b-service-not-exist');
//
//		if (confirm("Bạn chắc chắn đổi lịch hẹn này?")) {
//		    loading.fadeIn();
//            done.hide();
//
//            // Kiểm tra ngày này spa có mở cửa hay không?
//            var user_id = $('input[name=bd_u_id]', _self).val();
//            var date = _self.find('.data_date').val();
//            date = moment(date, "DD-MM-YYYY");
//            var weekly = convert_num2dayval(date.format('d'));
//            var isOpen = null;
//            var url = URL + 'bookinghistory/xhrGet_user_open_hour';
//            $.get(url, {'user_id':user_id}, function(data) {
//            	isOpen = data[weekly][0];
//
//                if(!isOpen) {
//                    warning_1.fadeIn();
//                    loading.hide();
//                    done.show();
//                    return false;
//                } /// Kết thúc kiểm tra ///
//
//                //luuhoabk
//                var appointment_date = _self.find('input[name="bd_date"]').val();
//	            var appointment_time = _self.find('input[name="bd_time_start"]').val();
//	            var dateAppointment = appointment_date+' '+appointment_time;
//
//	            $.ajax({
//	                    url: URL + 'bookinghistory/xhrGetTimeAutoConfirmSpa',
//	                    type: 'post',
//	                    data: {user_id:user_id}
//	            })
//	            .done(function(respon) {
//	            	var dateConfirm = respon;
//	            	data_update += '&appointment_time_confirm='+dateConfirm;
//	            	var url = URL + "bookinghistory/xhrUpdate_booking_detail";
//		            $.post(url, data_update, function(result){
//		                if (result == 'success') {
//		                	// Do it...
//		                    isSuccess = true;
//		                }
//		            })
//		            .done(function(data){
//		                loading.hide();
//		                done.show();
//		                if(isSuccess){
//		                	alert('Lịch hẹn mới của bạn đã được chúng tôi ghi nhận. \n\nVui lòng cập nhật email thường xuyên để cập nhật thông tin lịch hẹn. \n\nCảm ơn bạn!');
//		                	location.reload();
//		                } else {
//		                    // jAlert("Update error!");
//		                    alert('error');
//		                    location.reload();
//		                }
//		            });
//	            });
//	        }, 'json');
//		}
//        return false;
//    });
//}
//
//function convert_num2dayval(num) {
//    switch(num) {
//        case '1': return 2;
//        case '2': return 3;
//        case '3': return 4;
//        case '4': return 5;
//        case '5': return 6;
//        case '6': return 7;
//        case '0': return 8;
//        default: return false;
//    }
//}
//
//// Convert Minute to Hours
//function convert_Min2Hour(time) {
//    time = parseInt(time);
//    if (time < 1) {
//        return;
//    }
//    var hours = Math.floor(time / 60);
//    var minutes = (time % 60);
//
//    if(hours < 10)
//        hours = "0" + hours;
//    if(minutes < 10)
//        minutes = "0" + minutes;
//
//    var format = hours +":"+minutes;
//    return format;
//}
//
//// Convert Time to Minutes
//function convert_Hour2Min(time) {
//    var data    = null;
//    var hour    = null;
//    var minute  = null;
//    var minutes = null;
//
//    data = time.split(":");
//    hour = parseInt(data[0]);
//    minute = parseInt(data[1]);
//
//    minutes = hour*60 + minute;
//    return minutes;
//}