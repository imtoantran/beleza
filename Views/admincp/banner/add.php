<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<p class="title-admincp">Quản lý Banner</p>
			<button onclick="returnToBanner()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về Quản lý Banner
				</div>
			</button>
		</div>
	</div>
	<div class="main-content">
		<h3 class="add-place">Thêm banner</h3>
		<hr />
		<div class="row">
			<div class="form-horizontal">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4">Tên</label>
						<div class="col-md-8">
							<input id="user_full_name" name="user_full_name" class="form-control" type="text" placeholder="Nhập tên banner..." />
						</div>
					</div>

				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="addSaveDetail()" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Thêm</span>
					</div>
				</button>
				<small id="error_add_spa" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_ADD = 1;
	var IS_EDIT = 0;
</script>