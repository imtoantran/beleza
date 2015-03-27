
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center"><i class="fa fa-lg fa-heart"></i> DANH SÁCH DỊCH VỤ ĐƯỢC YÊU THÍCH</h3>
			<table id="client_wishlist_service" class="table table-bordered dataTable table-hover" width="100%" cellspacing="0">
				<thead style="background-color: rgb(253, 189, 14);">
					<tr>
						<th style="width: 2%" class="text-center"><b>STT</b></th>
						<th><b>Tên dịch vụ</b></th>
						<th><b>Địa điểm</b></th>
						<th><b>Giá</b></th>
						<th><b>Giá đã giảm</b></th>
						<th style="width: 5%"><b>Hủy</b></th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th style="width: 2%" class="text-center"><b>STT</b></th>
						<th><b>Tên dịch vụ</b></th>
						<th><b>Địa điểm</b></th>
						<th><b>Giá</b></th>
						<th><b>Giá đã giảm</b></th>
						<th style="width: 5%"><b>Hủy</b></th>
					</tr>
				</tfoot>

				<tbody class="pointer">

				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
		var CLIENT_ID = <?php echo $this->client_id; ?>;
		var REVIEW_RESULT = 0;
		var RESULT_PER_SHOW_MORE = "<?php echo RESULT_PER_SHOW_MORE; ?>";
		var LAT = '';
		var LNG = '';
		var CONSULT_ANSWER = '';
		var CONSULT_RESULT = '';
		var CONSULT_SUPPOSE = '';
		var CONSULT_SERVICE_TYPE = '';
		var QUESTION_NUMBER = 1;
		var CONSULT_SERVICE_TYPE_NAME = '';
		var RULE_SERVICE_ID = '';
		var HOBBY_ANSWER = '';
		var HAS_HOBBY = 0;
		var CLIENT_HOBBY_ANSWER;
		var CLIENT_HOBBY_RULE;
		var IS_SAVE = 1;
</script>
