
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center"><i class="fa fa-lg fa-history"></i> LỊCH SỬ ĐẶT HẸN</h3>
			<table id="booking_history_table" class="table table-bordered dataTable table-hover" width="100%" cellspacing="0">
				<thead style="background-color: rgb(253, 189, 14);">
					<tr>
						<th><b>Mã Đơn Hàng</b></th>
						<th><b>ID</b></th>
						<th><b>Địa Điểm</b></th>
						<th><b>Dịch Vụ</b></th>
						<th><b>Giá</b></th>
						<!-- <th><b>SL</b></th> -->
						<th><b>Ngày Hẹn</b></th>
						<th><b>Ngày Đặt</b></th>
						<!-- <th><b>Giờ Hẹn</b></th> -->
						<th style="width: 10%"><b>Xác thực</b></th>
						<th style="width: 10%"><b>Tình Trạng</b></th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th><b>Mã Đơn Hàng</b></th>
						<th><b>ID</b></th>
						<th><b>Địa Điểm</b></th>
						<th><b>Dịch Vụ</b></th>
						<th><b>Giá</b></th>
						<!-- <th><b>SL</b></th> -->
						<th><b>Ngày Hẹn</b></th>
						<th><b>Ngày Đặt</b></th>
						<!-- <th><b>Giờ Hẹn</b></th> -->
						<th style="width: 10%"><b>Xác thực</b></th>
						<th style="width: 10%"><b>Tình Trạng</b></th>
					</tr>
				</tfoot>

				<tbody class="pointer">

				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="editConfirmedAppointment_modal" style="z-index: 1051;" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-max-height="440">
	<div class="modal-dialog" style="width: 700px;">
		<div class="modal-content" style="border-radius: 0px">
			<div class="modal-header" style="background-color: #FDBD0E; padding: 6px 10px;">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h5 class="modal-title" id="myModalLabel" style="text-align:center; font-weight:bold;">THAY ĐỔI LỊCH HẸN</h5>
			</div>
			<div class="modal-body" style="padding: 15px 20px 0px;">
				<form id="editConfirmedAppointment_form" action="#" class="form-horizontal" role="form" method="POST">
                	<input type="hidden" name="bd_id" />
                	<input type="hidden" name="bd_u_id" />
                	<input type="hidden" name="bd_us_id" />
                	<input type="hidden" name="bd_date" />
                    <input type="hidden" name="bd_time_start" /> 
                    <input type="hidden" name="bd_time_end" /> 
                    <input type="hidden" name="user_openHour" />
                    <input type="hidden" name="user_closeHour" />

                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="alert alert-danger b-service-not-exist alert-dismissible " role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Có lỗi!</strong> Spa không làm việc vào ngày này, hãy chọn ngày khác.
							</div>

							<div class="form-group">
								<label class="col-lg-2 control-label">Địa điểm</label>

								<div class="col-lg-9">
									<input type="text" class="form-control data_u_bname" readonly="readonly">
								</div>
							</div>
                    		<div class="form-group">
								<label class="col-lg-2 control-label">Dịch vụ</label>

								<div class="col-lg-9">
									<input type="text" class="form-control data_us_name" readonly="readonly">
								</div>
							</div>
							<div class="form-group">

								<label class="col-lg-2 control-label">Ngày</label>

								<div class="col-lg-9">
									<input type="text" class="form-control pull-left data_date" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" readonly="readonly" style="width: 105px; cursor: pointer; font-weight:bold;">

									<div class="control-label">
										&nbsp;&nbsp;&nbsp;<span class="vus_time_start">Bắt đầu lúc: 
											<span class="data_time_start" style="font-weight:700">00:00</span>
										</span>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chọn giờ khác: 
										<select type="text" class="data_other_time" style="width:100px; cursor: pointer;"> 
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Thời gian</label>

								<div class="col-lg-9 control-label" style="text-align: left;">
									<span class="data_duration" style="font-weight:700">00</span> phút
									&nbsp;&nbsp;&nbsp;Kết thúc lúc: <span class="data_time_end" style="font-weight:700">00:00</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12" align="center">
									<button type="submit" class="btn btn-primary btnAct_submit">
										<i class="fa fa-check done"></i>
										<i class="fa fa-spin fa-refresh loading"></i>
										Đồng ý
									</button>
									<button class="btn btn-default pull-right" data-dismiss="modal">Đóng</button>
								</div>
							</div>
                    	</div>
						
					</div> <!-- end row -->
                </form>


			</div>
			<!-- <div class="modal-footer">
				<button class="btn btn-orange" data-dismiss="modal">Đóng</button>
			</div> -->
		</div>
	</div>
</div>