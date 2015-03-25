<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3 class="title-admincp">Quản lý quận</h3>
			<button onclick="returnToTypeBusiness()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về trang quản lý quận
				</div>
			</button>
		</div>
	</div>
	<div class="main-content" id="main_detail">
		<h3 class="add-place">Sửa/ Xóa một quận</h3>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3">Mã Dịch Vụ Chính</label>
						<div class="col-md-7">
							<input disabled="disabled" placeholder="Nhập mã dịch vụ chính..." class="form-control" id="type_business_id" name="" type="text" readonly="readonly" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tên Dịch Vụ Chính (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập tên dịch vụ chính..." class="form-control" id="type_business_name" name="" type="text"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="editTypeBusiness()" id="btn_edit_type_business" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button>
				<button onclick="deleteTypeBusiness()" id="btn_delete_type_business" type="button" class="button action action-default button-secondary save-action">
					<div class="button-inner">
						<div class="button-icon icons-delete remove"></div>
						<div id="remove_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Xóa</span>
					</div>
				</button>
				<small id="error_edit_type_business" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_INDEX = 0;
	var IS_ADD = 0;
	var IS_EDIT = 1;
	var TYPE_BUSINESS_ID = "<?php echo $this -> type_business_id; ?>";
</script>