<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3>Quản lý dịch vụ</h3>
			<button onclick="addServiceDetail()" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-plus"></div>
					Thêm dịch vụ
				</div>
			</button>
		</div>
	</div>

	<div class="main-content table-responsive">
		<table id="service_list" class="table table-hover" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th style="width: 20%"><b>Mã Dịch Vụ</b></th>
					<th style="width: 40%"><b>Tên Dịch Vụ</b></th>
					<th style="width: 40%"><b>Tên Loại Dịch Vụ</b></th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th style="width: 20%"><b>Mã Dịch Vụ</b></th>
					<th style="width: 40%"><b>Tên Dịch Vụ</b></th>
					<th style="width: 40%"><b>Tên Loại Dịch Vụ</b></th>
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