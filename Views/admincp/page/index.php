<div id="settings-holder" class="content-holder admincp_page">
	<div class="ui-tabs ui-widget ui-widget-content ui-corner-all" id="settings-tabs">
		<div class="section-aside">
			<ul id="nav2" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
				<li id="venue-settings-tab" class="ui-state-default ui-corner-top active" >
					<a href="#venue-settings" style="position: relative;" role="tab" data-toggle="tab"> <div class="nav-icon icons-nav-venue"></div>
					<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
						Trang
					</div> </a>
				</li>
				<li id="finance-tab" class="ui-state-default ui-corner-top">
					<a href="#finance" style="position: relative;" role="tab" data-toggle="tab"> <div class="nav-icon icons-nav-supplier"></div>
					<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
						Tạo trang
					</div> </a>
				</li>
			</ul>
		</div>

		<div class="tab-content section-main">

			<div class="tab-pane active" id="venue-settings">
				<div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#venue-details" role="tab" data-toggle="tab">Liên hệ</a>
							</li>
							<li class="ui-state-default ui-corner-top">
								<a href="#opening-hours" role="tab" data-toggle="tab">Về chúng tôi</a>
							</li>
							<li id="venue-vouchers-tab" class="ui-state-default ui-corner-top">
								<a href="#venue-vouchers" role="tab" data-toggle="tab">Thẻ quà tặng</a>
							</li>
							<li id="policies-tab" class="ui-state-default ui-corner-top">
								<a href="#policies" role="tab" data-toggle="tab">Diễn đàn</a>
							</li>
						</ul>
					</div>

					<div class="tab-content tab-content-fix">
						<div id="venue-details" class="tab-pane active">
							<form id="pageContact_form" action="" class="form-horizontal" method="POST">
								<div class="form-content">
								
									<div class="page-header" id="section-contact">
										<strong>Bản đồ</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_contact_map" class="col-lg-2 control-label">iFrame Bản đồ</label>

										<div class="col-lg-10">
											<textarea name="page_contact_map" id="page_contact_map" class="form-control" cols="30" rows="3"></textarea>
										</div>
									</div>

									<div class="page-header" id="section-contact">
										<strong>Trung tâm CSKH</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_contact_ttcskh" class="col-lg-2 control-label">Trung tâm CSKH</label>

										<div class="col-lg-10">
											<textarea name="page_contact_ttcskh" id="page_contact_ttcskh" class="form-control" cols="30" rows="3"></textarea>
										</div>
									</div>


									<div class="page-header" id="section-contact">
										<strong>Địa chỉ email</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_contact_dvcskh" class="col-lg-2 control-label">Dịch vụ CSKH</label>

										<div class="col-lg-10">
											<input type="text" name="page_contact_dvcskh" class="form-control" id="page_contact_dvcskh" placeholder="Địa chỉ Email">
										</div>
									</div>
									<div class="form-group">
										<label for="page_contact_dangba" class="col-lg-2 control-label">Đăng bạ dịch vụ</label>

										<div class="col-lg-10">
											<input type="text" name="page_contact_dangba" class="form-control" id="page_contact_dangba" placeholder="Địa chỉ Email">
										</div>
									</div>
									<div class="form-group">
										<label for="page_contact_congtac" class="col-lg-2 control-label">Cộng tác với chúng tôi</label>

										<div class="col-lg-10">
											<input type="text" name="page_contact_congtac" class="form-control" id="page_contact_congtac" placeholder="Địa chỉ Email">
										</div>
									</div>
									<div class="form-group">
										<label for="page_contact_tuyendung" class="col-lg-2 control-label">Tuyển dụng</label>

										<div class="col-lg-10">
											<input type="text" name="page_contact_tuyendung" class="form-control" id="page_contact_tuyendung" placeholder="Địa chỉ Email">
										</div>
									</div>

									<div class="page-header" id="section-contact">
										<strong>Quảng bá dịch vụ</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_contact_quangba" class="col-lg-2 control-label">Quảng bá dịch vụ</label>

										<div class="col-lg-10">
											<textarea name="page_contact_quangba" id="page_contact_quangba" class="form-control" cols="30" rows="5" ></textarea>
										</div>
									</div>

									<div class="page-header" id="section-contact">
										<strong>Thông tin doanh nghiệp</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_contact_hinhanh" class="col-lg-2 control-label">Hình ảnh</label>

										<div class="col-lg-10">
											<input type="url" name="page_contact_hinhanh" class="form-control" id="page_contact_hinhanh" placeholder="URL hình ảnh">
										</div>
									</div>

									<div class="form-group">
										<label for="page_contact_belezavn" class="col-lg-2 control-label">Beleza Việt Nam</label>

										<div class="col-lg-10">
											<textarea name="page_contact_belezavn" id="page_contact_belezavn" class="form-control" cols="30" rows="3" ></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="page_contact_chusohuu" class="col-lg-2 control-label">Chủ sở hữu</label>

										<div class="col-lg-10">
											<textarea name="page_contact_chusohuu" id="page_contact_chusohuu" class="form-control" cols="30" rows="3" ></textarea>
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button class="button action action-default button-primary save-action" type="submit">
										<div class="button-inner">
											<div class="button-icon icons-tick done"></div>
											<div class="button-icon fa fa-refresh loading"></div>
											<span class="msg msg-action-default">Lưu</span>
										</div>
									</button>
								</div>

							</form>
						</div><!-- END VENUA DETAILS -->


						<div id="opening-hours" class="tab-pane ">
							<form id="pageAboutus_form" action="" class="form-horizontal" method="POST">
								<div class="form-content">
								
									<div class="page-header" id="section-contact">
										<strong>Header</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_aboutus_slider" class="col-lg-2 control-label">Slider</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_slider" id="page_aboutus_slider" class="form-control" />
										</div>
									</div>

									<div class="page-header" id="section-contact">
										<strong>Intro</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_aboutus_tencty" class="col-lg-2 control-label">Tên công ty</label>

										<div class="col-lg-10">
											<input name="page_aboutus_tencty" id="page_aboutus_tencty" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_motacty" class="col-lg-2 control-label">Mô tả</label>

										<div class="col-lg-10">
											<textarea name="page_aboutus_motacty" id="page_aboutus_motacty" class="form-control" ></textarea>
										</div>
									</div>


									<div class="page-header" id="section-contact">
										<strong>Block 1</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_aboutus_b1icon" class="col-lg-2 control-label">Icon</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b1icon" class="form-control" id="page_aboutus_b1icon" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b1tieude" class="col-lg-2 control-label">Tiêu đề</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b1tieude" class="form-control" id="page_aboutus_b1tieude" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b1noidung" class="col-lg-2 control-label">Nội dung</label>

										<div class="col-lg-10">
											<textarea type="text" name="page_aboutus_b1noidung" class="form-control" id="page_aboutus_b1noidung" ></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b1link" class="col-lg-2 control-label">Đường link</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b1link" class="form-control" id="page_aboutus_b1link" />
										</div>
									</div>

									<div class="page-header" id="section-contact">
										<strong>Block 2</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_aboutus_b2icon" class="col-lg-2 control-label">Icon</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b2icon" class="form-control" id="page_aboutus_b2icon" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b2tieude" class="col-lg-2 control-label">Tiêu đề</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b2tieude" class="form-control" id="page_aboutus_b2tieude" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b2noidung" class="col-lg-2 control-label">Nội dung</label>

										<div class="col-lg-10">
											<textarea type="text" name="page_aboutus_b2noidung" class="form-control" id="page_aboutus_b2noidung"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b2link" class="col-lg-2 control-label">Đường link</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b2link" class="form-control" id="page_aboutus_b2link" />
										</div>
									</div>

									<div class="page-header" id="section-contact">
										<strong>Block 3</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_aboutus_b3icon" class="col-lg-2 control-label">Icon</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b3icon" class="form-control" id="page_aboutus_b3icon" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b3tieude" class="col-lg-2 control-label">Tiêu đề</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b3tieude" class="form-control" id="page_aboutus_b3tieude" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b3noidung" class="col-lg-2 control-label">Nội dung</label>

										<div class="col-lg-10">
											<textarea type="text" name="page_aboutus_b3noidung" class="form-control" id="page_aboutus_b3noidung" ></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="page_aboutus_b3link" class="col-lg-2 control-label">Đường link</label>

										<div class="col-lg-10">
											<input type="text" name="page_aboutus_b3link" class="form-control" id="page_aboutus_b3link" />
										</div>
									</div>

									

									<div class="page-header" id="section-contact">
										<strong>Quản lý lịch hẹn</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_aboutus_qllichhen" class="col-lg-2 control-label">Quản lý lịch hẹn</label>

										<div class="col-lg-10">
											<textarea name="page_aboutus_qllichhen" id="page_aboutus_qllichhen" class="form-control" cols="30" rows="5" ></textarea>
										</div>
									</div>

									<div class="page-header" id="section-contact">
										<strong>Bắt đầu thật dễ dàng</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_aboutus_buoc1" class="col-lg-2 control-label">Bước 1</label>

										<div class="col-lg-10">
											<textarea type="url" name="page_aboutus_buoc1" class="form-control" id="page_aboutus_buoc1" cols="30" rows="3" ></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="page_aboutus_buoc2" class="col-lg-2 control-label">Bước 2</label>

										<div class="col-lg-10">
											<textarea name="page_aboutus_buoc2" id="page_aboutus_buoc2" class="form-control" cols="30" rows="3" ></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="page_aboutus_buoc3" class="col-lg-2 control-label">Bước 3</label>

										<div class="col-lg-10">
											<textarea name="page_aboutus_buoc3" id="page_aboutus_buoc3" class="form-control" cols="30" rows="3" ></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="page_aboutus_linkdk" class="col-lg-2 control-label">Link đăng ký</label>

										<div class="col-lg-10">
											<input type="url" name="page_aboutus_linkdk" class="form-control" id="page_aboutus_linkdk" >
										</div>
									</div>

									<div class="form-group">
										<label for="page_aboutus_linkpremium" class="col-lg-2 control-label">Link gói Premium Account</label>

										<div class="col-lg-10">
											<input type="url" name="page_aboutus_linkpremium" class="form-control" id="page_aboutus_linkpremium" >
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button class="button action action-default button-primary save-action" type="submit">
										<div class="button-inner">
											<div class="button-icon icons-tick done"></div>
											<div class="button-icon fa fa-refresh loading"></div>
											<span class="msg msg-action-default">Lưu</span>
										</div>
									</button>
								</div>

							</form>
						</div><!-- END OPEN HOUR -->

						<div id="policies" class="tab-pane">
							<form id="pageFaq_form" action="" class="form-horizontal" method="POST">
								<div class="form-content">
									<div class="form-group">
										<label for="page_faq_gioithieu" class="col-lg-2 control-label">Giới thiệu</label>

										<div class="col-lg-10">
											<textarea type="text" name="page_faq_gioithieu" id="page_faq_gioithieu" class="form-control" rows="10" ></textarea>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<button class="button action action-default button-primary save-action" type="submit">
										<div class="button-inner">
											<div class="button-icon icons-tick done"></div>
											<div class="button-icon fa fa-refresh loading"></div>
											<span class="msg msg-action-default">Lưu</span>
										</div>
									</button>
								</div>
							</form>
						</div><!-- END POLICIES -->

						<div id="venue-vouchers" class="tab-pane">
							<form id="pageGiftVoucher_form" action="" class="form-horizontal" method="POST">
								<div class="form-content">
								
									<div class="page-header" id="section-contact">
										<strong>Hỏi - đáp</strong>
									</div> <!-- end page-header -->
									<div class="form-group">
										<label for="page_giftvoucher_thongtin" class="col-lg-2 control-label">Thông tin</label>

										<div class="col-lg-10">
											<input type="text" name="page_giftvoucher_thongtin" id="page_giftvoucher_thongtin" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label for="page_giftvoucher_block1" class="col-lg-2 control-label">Block 1</label>

										<div class="col-lg-10">
											<textarea type="text" name="page_giftvoucher_block1" id="page_giftvoucher_block1" class="form-control" rows="10" ></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="page_giftvoucher_block2" class="col-lg-2 control-label">Block 2</label>

										<div class="col-lg-10">
											<textarea type="text" name="page_giftvoucher_block2" id="page_giftvoucher_block2" class="form-control" rows="10" ></textarea>
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button class="button action action-default button-primary save-action" type="submit">
										<div class="button-inner">
											<div class="button-icon icons-tick done"></div>
											<div class="button-icon fa fa-refresh loading"></div>
											<span class="msg msg-action-default">Lưu</span>
										</div>
									</button>
								</div>

							</form>
						</div><!-- END VENUE VOUCHERS -->
					</div>
				</div>
			</div>
			<!-- END VENUE SETTINGS -->

			<div class="tab-pane" id="finance">
				<div id="finance-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#page" role="tab" data-toggle="tab">Danh sách trang</a>
							</li>
							<li class="ui-state-default ui-corner-top">
								<a href="#billing-details" role="tab" data-toggle="tab">Tạo trang</a>
							</li>
							<li class="ui-state-default ui-corner-top">
								<a href="#bank-details" role="tab" data-toggle="tab">Sidebar</a>
							</li>
						</ul>
					</div>

					<div class="tab-content tab-content-fix">
						<div id="billing-details" class="tab-pane">
							<form id="addPage_form" action="" class="form-horizontal" method="POST">
								<div class="form-content">
									<br>
									<div class="form-group">
										<label for="addPage_title" class="col-sm-1 control-label">Tiêu đề</label>
										<div class="col-sm-11">
											<input type="text" id="addPage_title" name="addPage_title" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label for="addPage_slug" class="col-sm-1 control-label">Slug</label>
										<div class="col-sm-11">
											<input type="text" id="addPage_slug" name="addPage_slug" class="form-control">
											<p class="help-block">Địa chỉ trang có dạng: <?php echo URL; ?>page/show/slug</p>
										</div>
									</div>
									<div class="form-group">
										<label for="addPage_content" class="col-sm-1 control-label">Nội dung</label>
										<div class="col-sm-11">
											<textarea type="text" name="addPage_content" class="form-control" id="addPage_content" rows="25"></textarea>
										</div>
									</div>
									<div class="form-group hidden">
										<label for="addPage_status" class="col-sm-1 control-label">Status</label>
										<div class="col-sm-2">
											<select id="addPage_status" class="form-control" name="addPage_status">
												<option value="0">Không đăng</option>
												<option value="1">Đăng</option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button class="button action action-default button-primary save-action" type="submit">
										<div class="button-inner">
											<div class="button-icon icons-tick done"></div>
											<div class="button-icon fa fa-refresh loading"></div>
											<span class="msg msg-action-default">Tạo</span>
										</div>
									</button>
								</div>
							</form>
						</div><!-- END BILLING DETAILS -->

						<div id="bank-details" class="tab-pane">
							<form id="slidebar_form" action="#" class="form-horizontal" method="POST">
								<div class="form-content">
									<div class="form-group">
										<label for="sidebar_iframe" class="col-sm-1 control-label">iFrame</label>
										<div class="col-sm-11">
											<textarea type="text" name="sidebar_iframe" class="form-control" id="sidebar_iframe" rows="3"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="sidebar_link" class="col-sm-1 control-label">Link</label>
										<div class="col-sm-11">
											<div id="sidebar_links">
												
											</div>
											<div class="input_fields_wrap">
											    <button class="btn btn-xs btn-primary add_field_button" style="margin-bottom: 10px;">+ Thêm link</button>
											    <div></div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button class="button action action-default button-primary save-action" type="submit">
										<div class="button-inner">
											<div class="button-icon icons-tick done"></div>
											<div class="button-icon fa fa-refresh loading"></div>
											<span class="msg msg-action-default">Lưu</span>
										</div>
									</button>
								</div>
							</form>
						</div><!-- END BANK DETAILS -->

						<div id="page" class="tab-pane active">
							<div class="form-content">
								<table id="pages_table" class="table table-hover" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th style="width: 20%"><b>Mã số trang</b></th>
											<th style="width: 40%"><b>Tiêu đề</b></th>
											<th style="width: 20%"><b>Slug</b></th>
											<!-- <th style="width: 20%"><b>Trạng thái</b></th> -->
										</tr>
									</thead>

									<tbody>

									</tbody>
								</table>
							</div>
						</div><!-- END BANK DETAILS -->
					</div>
				</div>
			</div>
			<!-- END FINANCE SETTINGS -->


		</div>
	</div>
</div>

<!-- MODAL DETAIL PAGE -->
<div class="modal fade" id="editPage_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 1100px;">
		<div class="modal-content">
			<form id="editPage_form" action="" method="POST" class="form-horizontal">
				<input type="hidden" name="editPage_id">
				<div class="modal-header primary">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">CHI TIẾT TRANG</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="editPage_title" class="col-sm-1 control-label">Tiêu đề</label>
						<div class="col-sm-11">
							<input type="text" id="editPage_title" name="editPage_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="editPage_slug" class="col-sm-1 control-label">Slug</label>
						<div class="col-sm-11">
							<input type="text" id="editPage_slug" name="editPage_slug" class="form-control">
							<p class="help-block">Địa chỉ trang: 
								<a class="page_url" href="" target="_blank"><?php echo URL; ?>page/show/<span class="page_slug"></span></a>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label for="editPage_content" class="col-sm-1 control-label">Nội dung</label>
						<div class="col-sm-11">
							<textarea type="text" name="editPage_content" class="form-control" id="editPage_content" rows="25"></textarea>
						</div>
					</div>
					<div class="form-group hidden">
						<label for="editPage_status" class="col-sm-1 control-label">Status</label>
						<div class="col-sm-2">
							<select id="editPage_status" class="form-control" name="editPage_status">
								<option value="0">Không đăng</option>
								<option value="1">Đăng</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="btnEdit_page" type="button" class="btn btn-sm btn-primary">
						<i class="fa fa-check done"></i>
						<i class="fa fa-spin fa-refresh loading"></i>
						Lưu
					</button>
					<button id="btnDel_page" type="button" class="btn btn-sm btn-danger">
						<i class="fa fa-remove done"></i>
						<i class="fa fa-spin fa-refresh loading"></i>
						Xóa
					</button>
					<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</form>
		</div>
	</div>
</div>

