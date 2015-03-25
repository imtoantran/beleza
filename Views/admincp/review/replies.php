<div class="modal fade" id="modal-reply">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div id="reply-content" data-id="" data-status="">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger updateStatus" data-status="unverified">Không duyệt</button>
				<button class="btn btn-success updateStatus" data-status="verified">Duyệt</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3>Bình luận đánh giá</h3>
			<div class="form-horizontal" role="form">			
					<button class="btn btn-danger form-control loadReplies" data-status="unverified">Chưa duyệt</button>
					<hr>
					<button class="btn btn-info form-control btn-danger loadReplies" data-status="reported">Báo xấu</button>
					<hr>
						<button class="btn btn-info form-control loadReplies" data-status="verified">Đã duyệt</button>						
					<hr>
					<div class="input-group">
						<span class="input-group-addon"  data-toggle="tooltip" data-placement="right" title='Bật/tắt tự động duyệt'>
							<input type="checkbox" <?php if($this->defaultStatus == 'auto') print 'checked' ?> id="set-auto-verify" value="auto">
						</span>
						<button class="btn btn-info form-control loadReplies" data-status="auto">Tự động duyệt</button>						
					</div><!-- /input-group -->
			</div>			
		</div>
	</div>

	<div class="main-content table-responsive">
		<table id="replies_list" class="table table-hover" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th width="40"><b>ID</b></th>					
					<th width="250"><b>Tên người đăng</b></th>
					<th><b>Nội Dung</b></th>
					<th><b>Ngày đăng</b></th>
					<th width="130"><b>Duyệt</b></th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th width="40"><b>ID</b></th>					
					<th width="250"><b>Tên người đăng</b></th>
					<th><b>Nội Dung</b></th>
					<th><b>Ngày đăng</b></th>
					<th width="130"><b>Duyệt</b></th>
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
	var currData;
</script>