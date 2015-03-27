
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center"><i class="fa fa-lg fa-map-marker"></i> Danh sách bookmark</h3>
			<table id="booking_history_table" class="table table-bordered dataTable table-hover" width="100%" cellspacing="0">
				<thead style="background-color: rgb(253, 189, 14);">
					<tr>
						<th width="80" class="text-center"><b>STT</b></th>
						<th><b>Địa Điểm</b></th>
						<th width="150"><b>#</b></th>
					</tr>
				</thead>
				<tbody class="pointer">
				<?php foreach($this->bookmark as $bookmark):?>
					<tr data-id="<?php echo $bookmark['user_id']?>">
						<td class="text-center"></td>
						<td>
								<?php echo $bookmark['user_business_name']?>
						</td>
						<td class="text-center">
							<a href="<?php echo URL.'service/servicePlace/'.$bookmark['user_id'] ?>" class="btn btn-xs btn-success">Xem</a>
							<button data-controller="bookmark/remove" data-id="<?php echo $bookmark['user_id'] ?>" data-action="delete" class="btn btn-xs btn-danger">Xóa</button>
						</td>
					</tr>
				<?php endforeach;?>
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