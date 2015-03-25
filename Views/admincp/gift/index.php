<div id="settings-holder" class="content-holder">
	<div class="ui-tabs ui-widget ui-widget-content ui-corner-all" id="settings-tabs">
		<div class="section-aside">
			<ul id="nav2" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
				role="tablist">
				<li id="venue-settings-tab" class="ui-state-default ui-corner-top active">
					<a href="#setting-user-manager" style="position: relative;" role="tab" data-toggle="tab">
						<div class="nav-icon icons-nav-venue"></div>
						<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
							GiftVoucher đã dùng
						</div>
					</a>
				</li>

				<li id="finance-tab" class="ui-state-default ui-corner-top">
					<a href="#setting-embed-script" style="position: relative;" role="tab" data-toggle="tab">
						<div class="nav-icon icons-nav-supplier"></div>
						<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
							GiftVoucher - Email
						</div>
					</a>
				</li>
				<!--				imtoantran general setting start -->
				<li id="general-tab" class="ui-state-default ui-corner-top">
					<a href="#setting-general" style="position: relative;" role="tab" data-toggle="tab">
						<div class="nav-icon icons-nav-supplier"></div>
						<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
							GiftVoucher - Thiệp
						</div>
					</a>
				</li>
				<!--				imtoantran general setting end -->
			</ul>
		</div>

		<div class="tab-content section-main">

			<!-- GIFT PRICE -->
			<div class="tab-pane active" id="setting-user-manager">
				<div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<!-- item sub menu -->
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
							role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#venue-details" role="tab" data-toggle="tab">Danh sách Giá GiftVoucher</a>
							</li>
						</ul>
					</div>

					<!-- content - sub menu -->
					<div class="tab-content tab-content-fix">
						<div id="venue-details" class="tab-pane active">
							<div class="main-content" id="main_detail">
								<button id="add-new-price" type="button" class="button button-primary" style="padding: 2px 5px;"> Thêm giá</button>
								<hr/>
								<div class="row">
									<div class="col-md-4">
										<table id="gift_price_list" class="gift-list-card table table-bordered table-hover dataTable no-footer" width="100%" cellspacing="0" style="margin-top: 10px;">
											<thead style="background-color: #418BCB; font-weight: 700;">
											<tr>
												<th style="width: 10%" class="text-center"><b>Giá</b></th>
												<th style="width: 5%" class="text-center"><b>Trạng thái</b></th>
											</tr>
											</thead>

											<tfoot>
											<tr>
												<th style="width: 10%" class="text-center"><b>Giá</b></th>
												<th style="width: 5%" class="text-center"><b>Trạng thái</b></th>
											</tr>
											</tfoot>
											<tbody>
											<?php foreach($this->dataPrice as $key => $value):?>
												<tr class="gift_price_item" data-status="<?php echo $value['gift_status'];?>" data-id = "<?php echo $value['gift_id']; ?>" data-price = "<?php echo $value['gift_price']; ?>">
													<td class="td-gift-item-price-p text-right td-gift-price" data-id="<?php echo $value['gift_id']; ?>">
														<?php echo number_format($value['gift_price'],"0",",","."); ?> VNĐ
													</td>
													<td class="td-gift-item-price td-gift-price-status text-right" data-id="<?php echo $value['gift_id']; ?>">
															<?php
															if($value['gift_status'] == 0){
																echo '<label class="label label-default">Ẩn</label>';
															}else{
																echo '<label class="label label-confirmed">Hiện</label>';
															}
															?>
														</label>

													</td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
						<!-- END VENUA DETAILS -->
					</div>
				</div>
			</div>
			<!-- END GIFT PRICE -->

			<!-- GIFT EMAIL -->
			<div class="tab-pane" id="setting-embed-script">
				<div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<!-- item sub menu -->
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
							role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#google-details" role="tab" data-toggle="tab"> Danh sách GiftVoucher - Email</a>
							</li>
						</ul>
					</div>

					<!-- content - sub menu -->
					<div class="tab-content tab-content-fix">
						<div id="google-details" class="tab-pane active">
							<div class="main-content">
								<div class="row">
									<div class="col-md-12">
										<div style="margin-bottom: 20px;">

											<span style="font-size: 1.5em;color: #c60101;font-weight: bold;vertical-align: middle;margin-left: 60px;">Danh sách Gift Voucher gửi bằng Email</span>
										</div>
										<table id="gift_email_list" class="gift-list-card table table-bordered table-hover dataTable no-footer" width="100%" cellspacing="0" style="margin-top: 10px;">
											<thead style="background-color: #418BCB; font-weight: 700;">
											<tr>
												<th style="width: 10%"><b>Nguời gửi</b></th>
												<th style="width: 10%"><b>Người nhận</b></th>
												<th style="width: 10%"><b>Mã gift</b></th>
												<th style="width: 10%"><b>Giá</b></th>
												<th style="width: 10%"><b>Ngày</b></th>
												<th style="width: 15%"><b>Lời nhắn</b></th>
												<th style="width: 8%"><b>Tình trạng</b></th>
											</tr>
											</thead>

											<tfoot>
											<tr>
												<th style="width: 10%"><b>Nguời gửi</b></th>
												<th style="width: 10%"><b>Người nhận</b></th>
												<th style="width: 10%"><b>Mã gift</b></th>
												<th style="width: 10%"><b>Giá</b></th>
												<th style="width: 10%"><b>Ngày</b></th>
												<th style="width: 15%"><b>Lời nhắn</b></th>
												<th style="width: 8%"><b>Tình trạng</b></th>
											</tr>
											</tfoot>
											<tbody>
												<?php foreach($this->dataEmail as $key => $value):?>
												<tr class="gift-voucher-email-item" data-id="<?php echo $value['gift_voucher_id']; ?>">
													<td><?php echo $value['client_name']; ?> </td>
													<td><?php echo $value['gift_voucher_name']; ?> </td>
													<td><?php echo $value['gift_voucher_code']; ?> </td>
													<td><?php echo number_format($value['gift_voucher_price'],"0",",","."); ?> VNĐ </td>
													<td>
														<?php echo date_format(date_create($value['gift_voucher_due_date']), "d-m-Y"); ?>
													</td>
													<td><?php echo $value['gift_voucher_message']; ?> </td>

													<td class="td-status text-right">
														<?php
															switch($value['gift_voucher_status']){
																case 0:
																	echo '<label class="label label-default" style="width: 82px; padding: 3px 5px 16px 5px;">Chưa xác thực</label>';
																	break;
																case 1:
																	echo '<label class="label label-confirmed" style="width: 82px; padding: 3px 5px 16px 5px; ">Đã xác thực</label>';
																	break;
																default:
																	echo '<label class="label label-critical" style="width: 82px; padding: 3px 5px 16px 5px; ">Undefined</label>';
																	break;
															}
														?>
													</td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END GIFT EMAIL -->

			<!--	GENERAL SETTINGS START	-->
			<div class="tab-pane" id="setting-general">
				<div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<!-- item sub menu -->
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
							role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#tab1" role="tab" data-toggle="tab">Danh sách GiftVoucher Thiệp</a>
							</li>
						</ul>
					</div>

					<!-- content - sub menu -->
					<div class="tab-content tab-content-fix">
						<div id="google-details" class="tab-pane active">
							<div class="main-content">
								<div class="row">
									<div class="col-md-12">
										<div style="margin-bottom: 20px;">
											<button id="gift_voucher_send_card" type="button" class="btn btn-primary">
												<i class="fa fa-file-excel-o"></i> Excel
											</button>
											<span style="font-size: 1.5em;color: #c60101;font-weight: bold;vertical-align: middle;margin-left: 60px;">Danh sách Gift Voucher gửi bằng thiệp</span>
										</div>
										<table id="gift_card_list" class="gift-list-card table table-bordered table-hover dataTable no-footer" width="100%" cellspacing="0" style="margin-top: 10px;">
											<thead style="background-color: #418BCB; font-weight: 700;">
											<tr>
												<th style="width: 2%" title="Hủy/Chọn tất cả."></th>
												<th style="width: 10%"><b>Nguời gửi</b></th>
												<th style="width: 10%"><b>Người nhận</b></th>
												<th style="width: 15%"><b>Địa chỉ</b></th>
												<th style="width: 10%"><b>Điện thoại</b></th>
												<th style="width: 10%"><b>Mã gift</b></th>
												<th style="width: 10%"><b>Giá</b></th>
												<th style="width: 10%"><b>Ngày</b></th>
												<th style="width: 15%"><b>Lời nhắn</b></th>
												<th style="width: 8%"><b>Tình trạng</b></th>
											</tr>
											</thead>

											<tfoot>
											<tr>
												<th style="width: 2%"><b></b></th>
												<th style="width: 10%"><b>Nguời gửi</b></th>
												<th style="width: 10%"><b>Người nhận</b></th>
												<th style="width: 15%"><b>Địa chỉ</b></th>
												<th style="width: 10%"><b>Điện thoại</b></th>
												<th style="width: 10%"><b>Mã gift</b></th>
												<th style="width: 10%"><b>Giá</b></th>
												<th style="width: 10%"><b>Ngày</b></th>
												<th style="width: 15%"><b>Lời nhắn</b></th>
												<th style="width: 8%"><b>Tình trạng</b></th>
											</tr>
											</tfoot>
											<tbody>
											<?php foreach($this->dataCard as $key => $value):?>
												<tr class="gift-voucher-card-item" data-id="<?php echo $value['gift_voucher_id']; ?>">
													<td class="td-gift-item-price">
														<input type="checkbox" data_id="<?php echo $value['gift_voucher_id']; ?>" class="gift-items-checked"/>
													</td>
													<td><?php echo $value['client_name']; ?> </td>
													<td><?php echo $value['gift_voucher_name']; ?> </td>
													<td><?php echo $value['gift_voucher_address']; ?> </td>
													<td><?php echo $value['gift_voucher_phone']; ?> </td>
													<td><?php echo $value['gift_voucher_code']; ?> </td>
													<td><?php echo number_format($value['gift_voucher_price'],"0",",","."); ?> VNĐ </td>
													<td>
														<?php echo date_format(date_create($value['gift_voucher_due_date']), "d-m-Y"); ?>
													</td>
													<td><?php echo $value['gift_voucher_message']; ?> </td>

													<td class="td-status">
														<?php
														switch($value['gift_voucher_status']){
															case 0:
																echo '<label class="label label-default" style="width: 82px;  padding: 3px 5px 16px 5px;">Chưa in</label>';
																break;
															case 1:
																echo '<label class="label label-confirmed" style="width: 82px; padding: 3px 5px 16px 5px; ">Đã sử dụng</label>';
																break;
															case 2:
																echo '<label class="label label-attention" style="width: 82px; padding: 3px 5px 16px 5px; ">Đã in</label>';
																break;
															case 3:
																echo '<label class="label " style="background-color: green ;width: 82px; padding: 3px 5px 16px 5px;">Đã giao</label>';
																break;
															case 4:
																echo '<label class="label label-critical" style="width: 82px; padding: 3px 5px 16px 5px;">Lỗi</label>';
																break;
															default: break;
														}
														?>
													</td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--	GENERAL SETTINGS END	-->
		</div>
	</div>
</div>


<?php include'detail.php';?>


<!--<div id="home-holder" class="content-holder pending">-->
<!--	<div class="sidebar">-->
<!--		<div class="venue-info">-->
<!--			<h3>Quản lý Gift Voucher</h3>-->
<!--			<button onclick="addGiftDetail()" class="button button-primary redeem" type="button">-->
<!--				<div class="button-inner" >-->
<!--					<div class="button-icon icons-plus"></div>-->
<!--					Thêm giá Gift-->
<!--				</div>-->
<!--			</button>-->
<!--			<button onclick="loadGiftEmail()" class="button button-other redeem" type="button">-->
<!--				<div class="button-inner" style="line-height: 16px;">-->
<!--					<div class="button-icon fa">@</div>-->
<!--					Danh sách Gift Email-->
<!--				</div>-->
<!--			</button>-->
<!--			<button onclick="loadGiftCard()" class="button button-secondary redeem" type="button">-->
<!--				<div class="button-inner" style="line-height: 16px;">-->
<!--					<div class="button-icon fa fa-credit-card"></div>-->
<!--					Danh sách Gift thiệp-->
<!--				</div>-->
<!--			</button>-->
<!--		</div>-->
<!--	</div>-->
<!---->
<!--	<div class="main-content table-responsive" style="padding-top: 10px;">-->
<!--		<div style="margin-bottom: 20px;">-->
<!--			<span style="font-size: 1.5em;color: #5975A6 ;font-weight: bold;vertical-align: middle;margin-left: 60px;">Danh sách Gift Voucher gửi bằng Email</span>-->
<!--		</div>-->
<!--		<table id="gift_list" class="gift-list-email table table-bordered table-hover dataTable no-footer" width="100%" cellspacing="0" style="margin-top: 10px;">-->
<!--			<thead style="background-color: #418BCB; font-weight: 700;">-->
<!--				<tr>-->
<!--					<th style="width: 40%"><b>Nguời gửi</b></th>-->
<!--					<th style="width: 40%"><b>Người nhận</b></th>-->
<!--					<th style="width: 40%"><b>Email người nhận</b></th>-->
<!--					<th style="width: 40%"><b>Mã gift</b></th>-->
<!--					<th style="width: 20%"><b>Ngày</b></th>-->
<!--					<th style="width: 20%"><b>Giá</b></th>-->
<!--					<th style="width: 10%"><b>Tình trạng</b></th>-->
<!--				</tr>-->
<!--			</thead>-->
<!---->
<!--			<tfoot>-->
<!--			<tr>-->
<!--				<th style="width: 15%"><b>Nguời gửi</b></th>-->
<!--				<th style="width: 15%"><b>Nguời nhận</b></th>-->
<!--				<th style="width: 20%"><b>Email người nhận</b></th>-->
<!--				<th style="width: 10%"><b>Mã gift</b></th>-->
<!--				<th style="width: 10%"><b>Ngày</b></th>-->
<!--				<th style="width: 10%"><b>Giá</b></th>-->
<!--				<th style="width: 10%"><b>Tình trạng</b></th>-->
<!--			</tr>-->
<!--			</tfoot>-->
<!--			<tbody>-->
<!--				--><?php //foreach($this->data as $key => $value):?>
<!--					<tr class="gift-voucher-items" data-id="--><?php //echo $value['gift_voucher_id'] ?><!--">-->
<!--						<td data-id = "">--><?php //echo $value['client_name']; ?><!-- </td>-->
<!--						<td data-id = "">--><?php //echo $value['gift_voucher_name']; ?><!-- </td>-->
<!--						<td data-id = "">--><?php //echo $value['gift_voucher_email']; ?><!-- </td>-->
<!--						<td data-id = "">--><?php //echo $value['gift_voucher_code']; ?><!-- </td>-->
<!--						<td data-id = "">--><?php //echo number_format($value['gift_voucher_price'],"0",",","."); ?><!-- VNĐ </td>-->
<!--						<td data-id = "">-->
<!--							--><?php //echo date_format(date_create($value['gift_voucher_due_date']), "d-m-Y"); ?>
<!--						</td>-->
<!--						<td data-id = "">-->
<!--							--><?php
//								switch($value['gift_voucher_status']){
//									case 0:
//										echo '<label class="label label-default" style="padding: 3px 5px 16px 5px;">Chưa in</label>';
//										break;
//									case 1:
//										echo '<label class="label label-attention" style="padding: 3px 5px 16px 5px; ">Đã in</label>';
//										break;
//									case 2:
//										echo '<label class="label label-confirmed" style="padding: 3px 5px 16px 5px; ">Đã giao</label>';
//										break;
//									case 3:
//										echo '<label class="label label-critical" style="padding: 3px 5px 16px 5px;">Lỗi</label>';
//										break;
//									default: break;
//								}
//							?>
<!--						</td>-->
<!--					</tr>-->
<!--				--><?php //endforeach; ?>
<!--			</tbody>-->
<!--		</table>-->
<!--	</div>-->
<!--</div>-->
<!--<script>-->
<!--	var IS_INDEX = 1;-->
<!--	var IS_ADD = 0;-->
<!--	var IS_EDIT = 0;-->
<!--	var oTable;-->
<!--</script>-->