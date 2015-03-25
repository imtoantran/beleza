<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<p class="title-admincp">Quản lý Slides</p>
			<button onclick="returnToBanner()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về Quản lý Banner
				</div>
			</button>
		</div>
	</div>
	<div class="main-content">
		<h3 class="add-place">Sửa/ Xóa banner</h3>
		<hr />
	<div class="main-content table-responsive">
		<table id="slides_list" class="table table-hover" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th><b>ID</b></th>
	                <th><b>Hình ảnh</b></th>
	                <th><b>Hành động</b></th>
	            </tr>
	        </thead>
	 
	        <tfoot>
	            <tr>
	                <th><b>ID</b></th>
	                <th><b>Hình ảnh</b></th>
	                <th><b>Hành động</b></th>
	            </tr>
	        </tfoot>
	 
	        <tbody>
	            
	        </tbody>
	    </table>
	</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="addSlide()" id="btn_approve_spa" type="button" class="button action action-default button-other save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick approve"></div>
						<div id="approve_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Thêm slide</span>
					</div>
				</button>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_ADD = 0;
	var IS_EDIT = 1;
	var slider_id = "<?php echo $this -> slider_id; ?>";
</script>