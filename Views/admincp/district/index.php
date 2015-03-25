<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3>Quản lý quận</h3>
			<button onclick="addDistrictDetail()" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-plus"></div>
					Thêm quận
				</div>
			</button>
		</div>
	</div>

	<div class="main-content table-responsive">
		<table id="district_list" class="table table-hover" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th style="width: 30%"><b>Mã Quận</b></th>
					<th style="width: 35%"><b>Tên Quận</b></th>
					<th style="width: 35%"><b>Thành Phố</b></th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th style="width: 30%"><b>Mã Quận</b></th>
					<th style="width: 35%"><b>Tên Quận</b></th>
					<th style="width: 35%"><b>Thành Phố</b></th>
				</tr>
			</tfoot>

			<tbody>

			</tbody>
		</table>
	</div>
</div>
<script>
	var IS_INDEX = 1;
	var IS_ADD = 0;
	var IS_EDIT = 0;
	var oTable;
</script>