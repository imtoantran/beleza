<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3>Quản lý người dùng</h3>
			<button onclick="addClientDetail()" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-plus"></div>
					Thêm người dùng
				</div>
			</button>
		</div>
	</div>

	<div class="main-content table-responsive">
		<table id="client_list" class="table table-hover" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th><b>ID</b></th>
					<th><b>Họ Tên</b></th>
					<th><b>E-mail</b></th>
					<th><b>Số ĐT</b></th>
					<th><b>Username</b></th>
					<th><b>Giới Tính</b></th>
					<th><b>Credit Point</b></th>
					<th><b>Gift Point</b></th>
					<th><b>Tham Gia</b></th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th><b>ID</b></th>
					<th><b>Họ Tên</b></th>
					<th><b>E-mail</b></th>
					<th><b>Số ĐT</b></th>
					<th><b>Username</b></th>
					<th><b>Giới Tính</b></th>
					<th><b>Credit Point</b></th>
					<th><b>Gift Point</b></th>
					<th><b>Tham Gia</b></th>
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