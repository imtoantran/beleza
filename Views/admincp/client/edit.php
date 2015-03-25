<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3 class="title-admincp">Quản lý người dùng</h3>
			<button onclick="returnToClient()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về trang người dùng
				</div>
			</button>
		</div>
	</div>
	<div class="main-content" id="main_detail">
		<h3 class="add-place">Sửa/ Xóa một người dùng</h3>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3">Mã Người dùng</label>
						<div class="col-md-7">
							<input disabled="disabled" placeholder="Nhập người dùng..." class="form-control" id="client_id" name="" type="text" readonly="readonly" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Họ Tên (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập họ tên...(*)" class="form-control" id="client_name" name="" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Email</label>
						<div class="col-md-7">
							<input disabled="disabled" placeholder="Nhập email..." class="form-control" id="client_email" name="" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Số ĐT (*)</label>
						<div class="col-md-7">
							<input onkeypress="inputNumbers(event)" placeholder="Nhập họ tên...(*)" class="form-control" id="client_phone" name="" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Usernam</label>
						<div class="col-md-7">
							<input disabled="disabled" placeholder="Nhập username..." class="form-control" id="client_username" name="" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Giới Tính (*)</label>
						<div class="col-md-7">
							<label class="radio-inline">
								<input class="client_sex" checked="checked" type="radio" name="client_sex" id="client_sex_female" value="0">
								Nữ </label>
							<label class="radio-inline">
								<input class="client_sex" type="radio" name="client_sex" id="client_sex_male" value="1">
								Nam </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Trạng Thái</label>
						<div class="col-md-2">
							<select class="form-control" name="client_is_active" id="client_is_active" width="100px">
								<option value="0">Tạm ngưng</option>
								<option value="1">Đã kích hoạt</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="editClient()" id="btn_edit_client" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button>
				<button onclick="deleteClient()" id="btn_delete_client" type="button" class="button action action-default button-secondary save-action">
					<div class="button-inner">
						<div class="button-icon icons-delete remove"></div>
						<div id="remove_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Xóa</span>
					</div>
				</button>			
				<small id="error_edit_client" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_INDEX = 0;
	var IS_ADD = 0;
	var IS_EDIT = 1;
	var CLIENT_ID = "<?php echo $this -> client_id; ?>";
	var CLIENT_SEX = 1;
</script>