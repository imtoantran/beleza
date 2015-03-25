<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3 class="title-admincp">Quản lý dịch vụ</h3>
			<button onclick="returnToService()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trở về trang dịch vụ
				</div>
			</button>
		</div>
	</div>
	<div class="main-content" id="main_detail">
		<h3 class="add-place">Sửa/ Xóa một dịch vụ</h3>
		<hr />
		<form id="editService_form" method="POST" class="form-horizontal" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3">Mã Dịch Vụ</label>
						<div class="col-md-7">
							<input disabled="disabled" placeholder="Nhập mã dịch vụ..." class="form-control" id="service_id" name="service_id" type="text" readonly="readonly" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tên Dịch Vụ (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập tên dịch vụ..." class="form-control" id="service_name" name="service_name" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Loại Dịch Vụ (*)</label>
						<div class="col-md-7">
							<select id="service_type_id" class="form-control" name="service_service_type_id">
								<option selected="selected" value="">Chọn loại dịch vụ</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Mô Tả Dịch Vụ</label>
						<div class="col-md-7">
							<textarea id="service_description" name="service_description" rows="4" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Hình ảnh</label>
						<div class="col-md-7">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 170px; height: 150px;">
								</div>
								<div>
									<span class="btn btn-default btn-file">
										<span class="fileinput-new">
											Chọn hình
										</span>
										<span class="fileinput-exists">
											Đổi hình
										</span>
										<input id="fileinput_service_image" type="file" name="service_image">
									</span>
									<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
										Xóa
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="editService()" id="btn_edit_service" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button>
				<!-- <button id="btn_edit_service" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button> -->
				<button onclick="deleteService()" id="btn_delete_service" type="button" class="button action action-default button-secondary save-action">
					<div class="button-inner">
						<div class="button-icon icons-delete remove"></div>
						<div id="remove_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Xóa</span>
					</div>
				</button>
				<small id="error_edit_service" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
		</form>
	</div>
</div>
<script>
	var IS_INDEX = 0;
	var IS_ADD = 0;
	var IS_EDIT = 1;
	var SERVICE_ID = "<?php echo $this -> service_id; ?>";
</script>