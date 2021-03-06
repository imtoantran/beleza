<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3 class="title-admincp">Quản lý luật tư vấn</h3>
			<button onclick="returnToTypeBusiness()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về dịch vụ chính
				</div>
			</button>
		</div>
	</div>
	<div class="main-content">
		<h3 class="add-place">Thêm một dịch vụ chính</h3>
		<hr />
		<div class="row">
			<div class="form-horizontal">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3">Tên Dịch Vụ Chính (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập tên quận..." class="form-control" id="type_business_name" name="" type="text"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="saveTypeBusiness()" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Thêm</span>
					</div>
				</button>
				<small id="error_add_type_business" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_INDEX = 0;
	var IS_ADD = 1;
	var IS_EDIT = 0; 
</script>