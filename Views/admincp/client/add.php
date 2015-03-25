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
	<div class="main-content">
		<h3 class="add-place">Thêm một người dùng</h3>
		<hr />
		<div class="row">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-md-3">Họ Tên (*)</label>
					<div class="col-md-7">
						<input placeholder="Nhập họ tên...(*)" class="form-control" id="client_name" name="" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Email (*)</label>
					<div class="col-md-7">
						<input placeholder="Nhập email...(*)" class="form-control" id="client_email" name="" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Số ĐT (*)</label>
					<div class="col-md-7">
						<input onkeypress="inputNumbers(event)" placeholder="Nhập họ tên...(*)" class="form-control" id="client_phone" name="" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Username (*)</label>
					<div class="col-md-7">
						<input placeholder="Nhập username...(*)" class="form-control" id="client_username" name="" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Password (*)</label>
					<div class="col-md-7">
						<input placeholder="Nhập password...(*)" class="form-control" id="client_pass" name="" type="password"/>
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
							<option value="1" selected>Đã kích hoạt</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="saveClient()" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Thêm</span>
					</div>
				</button>
				<small id="error_add_client" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_INDEX = 0;
	var IS_ADD = 1;
	var IS_EDIT = 0; 
	var CLIENT_SEX = 1;
</script>