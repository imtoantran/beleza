<div id="settings-holder" class="content-holder">
	<div class="ui-tabs ui-widget ui-widget-content ui-corner-all" id="settings-tabs">
		<div class="section-aside">
			<ul id="nav2" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
				<li id="notifications-settings-tab" class="ui-state-default ui-corner-top active">
					<a href="#notifications-settings" style="position: relative;" role="tab" data-toggle="tab"> <div class="nav-icon icons-nav-notifications"></div>
					<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
						Câu hỏi
					</div> </a>
				</li>
				<li id="finance-tab" class="ui-state-default ui-corner-top">
					<a href="#finance" style="position: relative;" role="tab" data-toggle="tab"> <div class="nav-icon icons-nav-supplier"></div>
					<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
						Bài viết
					</div> </a>
				</li>
				<li id="venue-settings-tab" class="ui-state-default ui-corner-top" >
					<a href="#venue-settings" style="position: relative;" role="tab" data-toggle="tab"> <div class="nav-icon icons-nav-venue"></div>
					<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
						Câu trả lời mới
					</div> </a>
				</li>
			</ul>
		</div>

		<div class="tab-content section-main">

			<div class="tab-pane active" id="notifications-settings">
				<div id="notifications-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#client-notifications" role="tab" data-toggle="tab">Danh sách câu hỏi mới nhất</a>
							</li>
							<!-- <li class="ui-state-default ui-corner-top">
								<a href="#fulfillment" role="tab" data-toggle="tab">Thông báo cho bạn</a>
							</li> -->
						</ul>
					</div>

					<div class="tab-content tab-content-fix">
						<div id="client-notifications" class="tab-pane active">
							<div class="home-data">
		                        <div class="portlet-body" style="margin-bottom: 30px">
		                            <div class="table-container">
		                                <table id="question_table" class="table table-bordered table-hover" style="margin-top: 10px;">
		                                    <thead style="background-color: #418BCB; font-weight: 700;">
		                                        <tr>
		                                            <th>
		                                                Question ID
		                                            </th>
		                                            <th>
		                                                Tiêu đề
		                                            </th>
		                                            <th>
		                                                Ngày gửi
		                                            </th>
		                                            <th>
		                                                Trạng thái
		                                            </th>
		                                            <th>
		                                                created
		                                            </th>
		                                            <th>
		                                                status
		                                            </th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                    	
		                                    </tbody>
		                                </table>
		                            </div>
		                        </div>
		                    </div>
						</div><!-- END Client Notifications -->

						<div id="fulfillment" class="tab-pane">
						</div>
						<!-- END Contact You -->
					</div>
				</div>
			</div><!-- END NOTIFICATIONS SETTINGS -->

		
			<div class="tab-pane" id="finance">
				<div id="finance-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#billing-details" role="tab" data-toggle="tab">Danh sách bài viết</a>
							</li>
							<li class="ui-state-default ui-corner-top hidden">
								<a href="#bank-details" role="tab" data-toggle="tab">Tìm bài viết hay</a>
							</li>
						</ul>
					</div>

					<div class="tab-content tab-content-fix">
						<div id="billing-details" class="tab-pane active">
							<div class="home-data">
		                        <div class="portlet-body" style="margin-bottom: 30px">
		                            <div class="table-container">
			                            <p style="margin-bottom: 20px;"> 
			                            	<button type="button" class="btn btn-sm btn-primary btnOM_addPost">
			                            		<i class="fa fa-plus"></i>
			                            		Thêm bài viết
			                            	</button>
			                            </p>
		                            	
		                                <table class="table table-bordered table-hover" id="post_table" style="margin-top: 10px;">
		                                    <thead style="background-color: #418BCB; font-weight: 700;">
		                                        <tr>
		                                            <th>
		                                                Post ID
		                                            </th>
		                                            <th>
		                                                Tiêu đề
		                                            </th>
		                                            <th>
		                                                Ngày đăng
		                                            </th>
		                                            <th>
		                                                Trạng thái
		                                            </th>
		                                            <th>
		                                                created
		                                            </th>
		                                            <th>
		                                                status
		                                            </th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>

		                                    </tbody>
		                                </table>
		                            </div>
		                        </div>
		                    </div>
						</div><!-- END BILLING DETAILS -->

						<div id="bank-details" class="tab-pane">
							<div class="home-data">
		                        <div class="portlet-body" style="margin-bottom: 30px">
		                            <div class="table-container">
		                            	<form id="searchForm" method="post">
											<fieldset>
									        	<i class="fa fa-search" style="position: absolute; font-size: 20px; color: rgb(204, 204, 204); left: 58px; top: 58px;"></i>
									           	<input id="s" type="text" />
									            
									            <input type="submit" value="Submit" id="submitButton" />
									            
									            <div id="searchInContainer">
									                <input type="radio" name="check" value="site" id="searchSite"  />
									                <label for="searchSite" id="siteNameLabel">Search</label>
									                
									                <input type="radio" name="check" value="web" id="searchWeb" checked/>
									                <label for="searchWeb">Search The Web</label>
												</div>
									                        
									            <ul class="icons">
									                <li class="web" title="Web Search" data-searchType="web">Web</li>
									                <li class="images" title="Image Search" data-searchType="images">Images</li>
									                <li class="news" title="News Search" data-searchType="news">News</li>
									                <li class="videos" title="Video Search" data-searchType="video">Videos</li>
									            </ul>
									            
									        </fieldset>
									    </form>
									    <div id="resultsDiv"></div>
		                            </div>
		                        </div>
		                    </div>
						</div><!-- END BANK DETAILS -->
					</div>
				</div>
			</div>
			<!-- END FINANCE SETTINGS -->

			<div class="tab-pane" id="venue-settings">
				<div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#venue-details" role="tab" data-toggle="tab">Duyệt câu trả lời</a>
							</li>
							<!-- <li class="ui-state-default ui-corner-top">
								<a href="#opening-hours" role="tab" data-toggle="tab">Giờ mở cửa</a>
							</li> -->
							<!-- <li class="ui-state-default ui-corner-top">
								<a href="#policies" role="tab" data-toggle="tab">Policies</a>
							</li> -->
							<!-- <li id="venue-vouchers-tab" class="ui-state-default ui-corner-top">
								<a href="#venue-vouchers" role="tab" data-toggle="tab">Gift Vouchers</a>
							</li> -->
						</ul>
					</div>

					<div class="tab-content tab-content-fix">
						<div id="venue-details" class="tab-pane active">
							<div class="home-data">
		                        <div class="portlet-body" style="margin-bottom: 30px">
		                            <div class="table-container">
		                                <table id="answer_table" class="table table-bordered table-hover" style="margin-top: 10px;" >
		                                    <thead style="background-color: #418BCB; font-weight: 700;">
		                                        <tr>
		                                            <th>
		                                                Answer ID
		                                            </th>
		                                            <th>
		                                                Câu trả lời
		                                            </th>
		                                            <th>
		                                                Lời bình luận
		                                            </th>
		                                            <th>
		                                                Tác giả
		                                            </th>
		                                            <th>
		                                                Ngày đăng
		                                            </th>
		                                            <th>
		                                                Duyệt
		                                            </th>
		                                            <th>
		                                                created
		                                            </th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                    	
		                                    </tbody>
		                                </table>
		                            </div>
		                        </div>
		                    </div>
						</div><!-- END VENUA DETAILS -->

						<div id="opening-hours" class="tab-pane ">
							
						</div><!-- END OPEN HOUR -->

						<div id="policies" class="tab-pane hidden">
							
						</div><!-- END POLICIES -->

						<div id="venue-vouchers" class="tab-pane">
							
						</div><!-- END VENUE VOUCHERS
					</div>
				</div>
			</div>
			<!-- END VENUE SETTINGS -->

		</div>
	</div>
</div>

<!-- MODAL QUESTION -->
<div class="modal fade" id="question_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 600px;">
		<div class="modal-content">
			<form id="question_form" action="#" method="POST" class="form-horizontal" role="form">
				<input type="hidden" name="faq_id">
				<input type="hidden" name="faq_id_answer">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">CHI TIẾT CÂU HỎI</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Câu hỏi</label>
						<div class="col-sm-10">
							<input type="text" name="faq_title" class="form-control" id="" readonly="readonly">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Chi tiết câu hỏi</label>
						<div class="col-sm-10">
							<textarea type="text" name="faq_content" class="form-control" id="" readonly="readonly" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Tag liên quan</label>
						<div class="col-sm-10">
							<input id="" name="faq_tag" style="width:380px;">
							<button type="button" class="btn btn-xs btn-primary pull-right btnAct_update_tag">
								<i class="fa fa-check done"></i>
								<i class="fa fa-spin fa-refresh loading"></i>
								Cập nhật
							</button>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Trạng thái</label>
						<div class="col-sm-10">
							<span class="faq_status">
								
							</span>
							<button type="button" class="btn btn-xs btn-success sr-only btnAct_confirm"> 
								<i class="fa fa-check done"></i>
								<i class="fa fa-spin fa-refresh loading"></i>
								Duyệt bài 
							</button>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Trả lời</label>
						<div class="col-sm-10">
							<textarea type="text" class="form-control" id="" name="faq_content_answer" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-primary btnAct_submit">
						<i class="fa fa-upload done"></i>
						<i class="fa fa-spin fa-refresh loading"></i>
						Duyệt và Gửi câu trả lời
					</button>
					<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--- Modal Them bai viet -->
<div class="modal fade" id="addPost_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 1100px;">
		<div class="modal-content">

			<form id="addPost_form" action="<?php echo URL; ?>admincp_community/xhrInsert_post" method="POST" class="form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="faq_id">
				<input type="hidden" name="faq_id_answer">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">CHI TIẾT CÂU HỎI</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Tiêu đề</label>
						<div class="col-sm-11">
							<input type="text" name="faq_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Nội dung</label>
						<div class="col-sm-11">
							<textarea type="text" name="faq_content" class="form-control" id="addPost_content" rows="15"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Tag liên quan</label>
						<div class="col-sm-5">
							<input name="faq_tag" style="width:500px;">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Hình ảnh</label>
						<div class="col-sm-11">
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
										<input type="file" name="faq_image">
									</span>
									<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
										Xóa
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-1 control-label">Trạng thái</label>
						<div class="col-sm-2">
							<select class="form-control faq_status" name="faq_status">
								<option value="0">Không đăng</option>
								<option value="1">Đăng</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-primary btnAct_submit">
						<i class="fa fa-check done"></i>
						<i class="fa fa-spin fa-refresh loading"></i>
						Lưu
					</button>
					<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--- Modal chi tiet bai viet -->
<div class="modal fade" id="editPost_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 1100px;">
		<div class="modal-content">
			<form id="editPost_form" action="<?php echo URL; ?>admincp_community/xhrUpdate_post" method="POST" class="form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="faq_id">
				<input type="hidden" name="faq_id_answer">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">CHI TIẾT CÂU HỎI</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Tiêu đề</label>
						<div class="col-sm-11">
							<input type="text" name="faq_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Nội dung</label>
						<div class="col-sm-11">
							<textarea type="text" name="faq_content" class="form-control" id="editPost_content" rows="15"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Tag liên quan</label>
						<div class="col-sm-5">
							<input name="faq_tag" style="width:500px;">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-1 control-label">Hình ảnh</label>
						<div class="col-sm-11">
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
										<input type="file" name="faq_image">
									</span>
									<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
										Xóa
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-1 control-label">Trạng thái</label>
						<div class="col-sm-2">
							<select class="form-control faq_status" name="faq_status">
								<option value="0">Không đăng</option>
								<option value="1">Đăng</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-primary btnAct_submit">
						<i class="fa fa-check done"></i>
						<i class="fa fa-spin fa-refresh loading"></i>
						Lưu
					</button>
					<button type="button" class="btn btn-sm btn-danger btnDel_post">
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