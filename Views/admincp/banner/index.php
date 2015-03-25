<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<p class="title-admincp">Quản lý banner</p>
			<button onclick="addBannerDetail()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-plus"></div>
					Thêm banner
				</div>
			</button>
		</div>
	</div>
	<div class="main-content table-responsive">
		<table id="spa_list" class="table table-hover" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th><b>ID</b></th>
	                <th><b>Tên Banner</b></th>
	                <th><b>Alias</b></th>
	            </tr>
	        </thead>
	 
	        <tfoot>
	            <tr>
	                <th><b>ID</b></th>
	                <th><b>Tên Banner</b></th>
	                <th><b>Alias</b></th>
	            </tr>
	        </tfoot>
	 
	        <tbody>
	            
	        </tbody>
	    </table>
	</div>
</div>
<script>
	var IS_ADD = 0;
	var IS_EDIT = 0;
</script>