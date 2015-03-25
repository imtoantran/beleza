<div class="modal fade" id="modal-gift-price">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Chỉnh sửa giá GiftVoucher</h2>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
					<!-- content -->
						<div class="form-group">
							<label class="control-label col-md-3" for="gift_edit_price"> Giá Gift (*)</label>
							<div class="col-md-7">
								<input placeholder="Nhập giá gift..." class="form-control" data-id="" id="gift_edit_price" name="gift_edit_price" type="text"/>
							</div>
						</div>
						<div class="form-group" style="padding-top: 30px;">
							<label class="control-label col-md-3" for="gift_edit_status">Trạng thái</label>
							<div class="col-md-3">
								<select id="gift_edit_status" class="form-control" name="gift_edit_status">
									<option value="0">Ẩn</option>
									<option value="1">Hiện</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" id="save_gift_price" data-status="verified">Lưu</button>
				<button class="btn btn-success" id="delete_gift_price" data-status="verified">Xóa</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>


<!--them moi gia-->
	<div class="modal fade" id="modal-gift-price-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Thêm mới giá GiftVoucher</h2>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- content -->
						<div class="row form-group">
							<label class="control-label col-md-3" for="gift_add_price"> Giá Gift (*)</label>
							<div class="col-md-7">
								<input placeholder="Nhập giá gift..." class="form-control" data-id="" id="gift_add_price" name="gift_add_price" type="text"/>
							</div>
						</div>
						<div class="form-group clearfix" style="padding-top: 30px;">
							<label class="control-label col-md-3" for="gift_add_status">Trạng thái</label>
							<div class="col-md-3">
								<select id="gift_add_status" data-id="" class="form-control" name="gift_add_status">
									<option value="0">Ẩn</option>
									<option value="1">Hiện</option>
								</select>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" id="add_gift_price" data-status="verified">Lưu</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!--end them moi gia-->

<!--gift email-->
<div class="modal fade" id="modal-gift-email">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Gift Voucher - Email</h2>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- content -->
						<div class="form-horizontal gift-voucher-detail gift-voucher-email-wrapper" >
							<div class="form-group">
								<label class="control-label col-md-3">Tên người gửi</label>
								<div class="col-md-7">
									<span class="gift-email-sender"> ... </span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Tên người nhận</label>
								<div class="col-md-7">
									<span class="gift-email-receiver">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email người nhận</label>
								<div class="col-md-7">
									<span class="gift-email-receiver-email">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Mã Gift Voucher</label>
								<div class="col-md-7">
									<span class="gift-email-code">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Ngày hết hạn</label>
								<div class="col-md-7">
									<span class="gift-email-due-date">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Giá</label>
								<div class="col-md-7">
									<span class="gift-email-due-date">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Tình trạng</label>
								<div class="col-md-7">
									<select class="gift-email-status" data-id="" style="padding: 4px;">
										<option value="0">Chưa xác thực</option>
										<option value="1">Đã xác thực</option>
									</select>
									<button data-id="" class="save-status-email button button-primary" style="padding: 0px 10px; margin-left: 20px;"><i class="fa fa-save"></i></button>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Lời nhắn</label>
								<div class="col-md-7">
									<span class="gift-email-message">...</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!--end gift email-->

<!--gift card-->
<div class="modal fade" id="modal-gift-card">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Gift Voucher - Thiệp</h2>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- content -->
						<div class="form-horizontal gift-voucher-detail gift-voucher-card-wrapper" >
							<div class="form-group">
								<label class="control-label col-md-4">Tên người gửi</label>
								<div class="col-md-7">
									<span class="gift-card-sender"> ... </span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Tên người nhận</label>
								<div class="col-md-7">
									<span class="gift-card-receiver">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Email người nhận</label>
								<div class="col-md-7">
									<span class="gift-card-email">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Địa chỉ người nhận</label>
								<div class="col-md-7">
									<span class="gift-card-address">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Điện thoại người nhận</label>
								<div class="col-md-7">
									<span class="gift-card-phone">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Mã Gift Voucher</label>
								<div class="col-md-7">
									<span class="gift-card-code">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Ngày hết hạn</label>
								<div class="col-md-7">
									<span class="gift-card-due-date">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Giá</label>
								<div class="col-md-7">
									<span class="gift-card-due-date">...</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Tình trạng</label>
								<div class="col-md-7">
									<select class="gift-card-status" data-id="" style="padding: 4px;">
										<option value="0">Chưa in</option>
										<option value="1">Đã sử dụng</option>
										<option value="2">Đã in</option>
										<option value="3">Đã giao</option>
										<option value="4">Lỗi</option>
									</select>
									<button data-id="" class="save-status-card button button-primary" style="padding: 0px 10px; margin-left: 20px;"><i class="fa fa-save"></i></button>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Lời nhắn</label>
								<div class="col-md-7">
									<span class="gift-card-message">...</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!--end gift card-->