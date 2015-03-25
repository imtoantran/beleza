<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3 class="title-admincp">Quản lý quận</h3>
			<button onclick="returnToDistrict()" id="" class="button button-primary redeem" type="button">
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
						<label class="control-label col-md-3">Mã Quận</label>
						<div class="col-md-7">
							<input disabled="disabled" placeholder="Nhập mã quận..." class="form-control" id="district_id" name="" type="text" readonly="readonly" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tên Quận (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập tên quận..." class="form-control" id="district_name" name="" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Thành Phố (*)</label>
						<div class="col-md-7">
							<select class="form-control" id="city_id"></select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="editDistrict()" id="btn_edit_district" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button>
				<button onclick="deleteDistrict()" id="btn_delete_district" type="button" class="button action action-default button-secondary save-action">
					<div class="button-inner">
						<div class="button-icon icons-delete remove"></div>
						<div id="remove_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Xóa</span>
					</div>
				</button>
				<small id="error_edit_district" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_INDEX = 0;
	var IS_ADD = 0;
	var IS_EDIT = 1;
	var DISTRICT_ID = "<?php echo $this -> district_id; ?>";
</script>