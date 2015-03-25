<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3 class="title-admincp">Quản lý Loại dịch vụ</h3>
			<button onclick="returnToServiceType()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về trang loại dịch vụ
				</div>
			</button>
		</div>
	</div>
	<div class="main-content" id="main_detail">
		<h3 class="add-place">Sửa loại dịch vụ</h3>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3">Mã Loại Dịch Vụ</label>
						<div class="col-md-7">
							<input disabled="disabled" placeholder="Nhập mã loại dịch vụ..." class="form-control" id="service_type_id" name="" type="text" readonly="readonly" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tên Loại Dịch Vụ (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập tên loại dịch vụ...(*)" class="form-control" id="service_type_name" name="" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tên Loại Dịch Vụ (viết tắt) (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập tên loại dịch vụ (viết tắt)...(*)" class="form-control" id="service_type_name_short" name="" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Chọn Icon (*)</label>
						<div class="col-md-5">
							<input placeholder="Chọn Icon...(*)" class="form-control" type="text" value="" id="service_type_icon" readonly="readonly"/>
						</div>
						<div class="col-md-2">
							<button data-toggle="modal" data-target="#choose_icon" class="btn btn-danger">
								Chọn Icon...
							</button>
						</div>
					</div>
					<div class="form-group">
					<label for="" class="col-md-3 control-label">Hình ảnh</label>
					<div class="col-md-7">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 170px; height: 150px;">
							</div>
							<div>
								<span class="btn btn-default btn-file">
									<span class="fileinput-new">
										Chọn hình
									</span>
									<span class="fileinput-exists">
										Đổi hình
									</span>
									<input id="fileinput_service_type_image" type="file" name="service_type_image">
								</span>
								<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
									Xóa
								</a>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="editServiceType()" id="btn_edit_service_type" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button>
				<small id="error_edit_service_type" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<div style="width: 100%" id="choose_icon" style="z-index: 1051;" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-max-height="440">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px">
			<div class="modal-header" style="background-color: #333333; padding: 6px 10px;">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h5 class="modal-title" id="myModalLabel" style="color: #FFFFFF;text-align:center; font-weight:bold;">CHỌN ICON</h5>
			</div>
			<div class="modal-body" style="padding: 10px;font-size: 18px;">
				<span value="fa-adjust" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-adjust fa-stack-1x text-white"></i>
				</span>
				<span value="fa-adn" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-adn fa-stack-1x text-white"></i>
				</span>
				<span value="fa-medkit" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-medkit fa-stack-1x text-white"></i>
				</span>
				<span value="fa-cut" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-cut fa-stack-1x text-white"></i>
				</span>
				<span value="fa-child" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-child fa-stack-1x text-white"></i>
				</span>
				<span value="fa-hand-o-up" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-hand-o-up fa-stack-1x text-white"></i>
				</span>
				<span value="fa-smile-o" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-smile-o fa-stack-1x text-white"></i>
				</span>
				<span value="fa-medkit" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-medkit fa-stack-1x text-white"></i>
				</span>
				<span value="fa-heart" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-heart fa-stack-1x text-white"></i>
				</span>
				<span value="fa-building-o" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-building-o fa-stack-1x text-white"></i>
				</span>
				<span value="fa-barcode" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-barcode fa-stack-1x text-white"></i>
				</span>
				<span value="fa-gamepad" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-gamepad fa-stack-1x text-white"></i>
				</span>
				<span value="fa-gift" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-gift fa-stack-1x text-white"></i>
				</span>
				<span value="fa-recycle" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-recycle fa-stack-1x text-white"></i>
				</span>
				<span value="fa-reddit" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-reddit fa-stack-1x text-white"></i>
				</span>
				<span value="fa-refresh" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-refresh fa-stack-1x text-white"></i>
				</span>
				<span value="fa-gear" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-gear fa-stack-1x text-white"></i>
				</span>
				<span value="fa-gears" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-gears fa-stack-1x text-white"></i>
				</span>
				<span value="fa-cube" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-cube fa-stack-1x text-white"></i>
				</span>
				<span value="fa-cubes" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-cubes fa-stack-1x text-white"></i>
				</span>
				<span value="fa-question" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-question fa-stack-1x text-white"></i>
				</span>
				<span value="fa-compass" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-compass fa-stack-1x text-white"></i>
				</span>
				<span value="fa-google-plus" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-google-plus fa-stack-1x text-white"></i>
				</span>
				<span value="fa-ambulance" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-ambulance fa-stack-1x text-white"></i>
				</span>
				<span value="fa-area-chart" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-area-chart fa-stack-1x text-white"></i>
				</span>
				<span value="fa-apple" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-apple fa-stack-1x text-white"></i>
				</span>
				<span value="fa-bank" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-bank fa-stack-1x text-white"></i>
				</span>
				<span value="fa-behance" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-behance fa-stack-1x text-white"></i>
				</span>
				<span value="fa-beer" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-beer fa-stack-1x text-white"></i>
				</span>
				<span value="fa-bicycle" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-bicycle fa-stack-1x text-white"></i>
				</span>
				<span value="fa-calendar" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-calendar fa-stack-1x text-white"></i>
				</span>
				<span value="fa-camera" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-camera fa-stack-1x text-white"></i>
				</span>
				<span value="fa-car" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-car fa-stack-1x text-white"></i>
				</span>
				<span value="fa-desktop" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-desktop fa-stack-1x text-white"></i>
				</span>
				<span value="fa-dashboard" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-dashboard fa-stack-1x text-white"></i>
				</span>
				<span value="fa-dollar" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-dollar fa-stack-1x text-white"></i>
				</span>
				<span value="fa-deviantart" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-deviantart fa-stack-1x text-white"></i>
				</span>
				<span value="fa-delicious" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-delicious fa-stack-1x text-white"></i>
				</span>
				<span value="fa-edit" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-edit fa-stack-1x text-white"></i>
				</span>
				<span value="fa-eject" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-eject fa-stack-1x text-white"></i>
				</span>
				<span value="fa-empire" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-empire fa-stack-1x text-white"></i>
				</span>
				<span value="fa-envelope" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-envelope fa-stack-1x text-white"></i>
				</span>
				<span value="fa-facebook" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x text-white"></i>
				</span>
				<span value="fa-fast-backward" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-fast-backward fa-stack-1x text-white"></i>
				</span>
				<span value="fa-fast-forward" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-fast-forward fa-stack-1x text-white"></i>
				</span>
				<span value="fa-fax" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-fax fa-stack-1x text-white"></i>
				</span>
				<span value="fa-female" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-female fa-stack-1x text-white"></i>
				</span>
				<span value="fa-file" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-file fa-stack-1x text-white"></i>
				</span>
				<span value="fa-gavel" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-gavel fa-stack-1x text-white"></i>
				</span>
				<span value="fa-gbp" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-gbp fa-stack-1x text-white"></i>
				</span>
				<span value="fa-ge" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-ge fa-stack-1x text-white"></i>
				</span>
				<span value="fa-git" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-git fa-stack-1x text-white"></i>
				</span>
				<span value="fa-glass" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-glass fa-stack-1x text-white"></i>
				</span>
				<span value="fa-google" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-google fa-stack-1x text-white"></i>
				</span>
				<span value="fa-h-square" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-h-square fa-stack-1x text-white"></i>
				</span>
				<span value="fa-hacker-news" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-hacker-news fa-stack-1x text-white"></i>
				</span>
				<span value="fa-header" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-header fa-stack-1x text-white"></i>
				</span>
				<span value="fa-headphones" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-headphones fa-stack-1x text-white"></i>
				</span>
				<span value="fa-history" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-history fa-stack-1x text-white"></i>
				</span>
				<span value="fa-home" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-home fa-stack-1x text-white"></i>
				</span>
				<span value="fa-hospital-o" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-hospital-o fa-stack-1x text-white"></i>
				</span>
				<span value="fa-ils" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-ils fa-stack-1x text-white"></i>
				</span>
				<span value="fa-image" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-image fa-stack-1x text-white"></i>
				</span>
				<span value="fa-inbox" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-inbox fa-stack-1x text-white"></i>
				</span>
				<span value="fa-indent" class="fa-stack fa-choosen pointer">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-indent fa-stack-1x text-white"></i>
				</span>
			</div>
			
		</div>
	</div>
</div>
<script>
	var IS_INDEX = 0;
	var IS_ADD = 0;
	var IS_EDIT = 1;
	var SERVICE_TYPE_ID =  "<?php echo $this -> service_type_id; ?>";
</script>