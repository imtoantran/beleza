<div id="menu-holder" class="content-holder has-offers">
	<!-- content -->
	<div class="section-main2" >
		<div class="container-fluid clearfix">
			<!-- HEAD -->
			<div class="row promotion-head">
					<div class="col-md-9">
						<div class="promotion-name-spa">
							<i class="fa fa-bars" style="color: #dbb107;"></i>
							<span id="promotion-title-spa"></span>
						</div>
					</div>
					<div class="col-md-3 text-right">
						<button class="button button-primary redeem" id="show-add-promotion" data-toggle="modal" data-target="#addPromotion" style="padding: 0px 10px;" title="Thêm khuyến mãi">
							<i class="fa fa-plus"></i>
							Thêm khuyến mãi
						</button>
					</div>
			</div>

			<!-- CONTENT -->
			<div class="row promotion-content-title">				
                <div class="col-md-5">Tiêu đề</div>
                <div class="col-md-2 created-date">Ngày tạo</div>
                <div class="col-md-2 ">Bắt đầu</div>
                <div class="col-md-2 end-date">Kết Thúc</div>
                <!-- <div class="col-md-1">Ngày còn lại</div> -->
                <div class="col-md-1 text-right">Xóa</div>           
			</div>
			<div class="row">			
				<ul id="promotion-content">					
					
				</ul>
			</div><!-- END CONTENT -->
			
		</div>
		<div id="promotion-mesage-list" class="alert alert-danger" style="display:none">
			Danh sách Khuyến mãi đang rỗng.
		</div>
	</div>

	<!-- aside -->
	<div class="section-aside2" id="promotion-list-publish" style="padding:5px;">
		<div >
			<span style="font-weight:bold; font-size:1.2em;">Tin khuyến mãi đang hoạt động</span>
			<p>
				Tin khuyến mãi sẽ hiển thị ở trang dịch vụ của Beleza và các website đối tác của chúng tôi
			</p>
			<div style="background-color: #f3f3f3; padding:5px; margin:5px;">
				<div class="btn-help">
				<button class="button button-other promotion-items-publish" >
					<i class="fa fa-check"></i>
				</button> Kích hoạt khuyến mãi
				</div>			
				<div class="btn-help"> 
					<span style="background-color:#000; color:#fff; padding: 1px 3px; border-radius:100%;"><i class="fa fa-close"></i></span>
					Ngưng khuyến mãi
				</div> 
				<div class="btn-help"> 
					<button class="button button-secondary" style="padding-left:3px;">
						<i class="fa fa-trash"></i>
					</button> Xóa tin khuyến mãi
				</div>
			</div>
			
		</div>
		<div class="promotion-item-publish-wrap">
			
		</div>

		<!-- <div data-id="4" class="offer state-act"><div tabindex="-1" class="offer-content"><img class="pic" alt="" src="//localhost/project_wahanda_alternative/public/assets/plugins/image-manager/upload/1/thumbnails/1/hot-scissors-hair-cut1_165x95.jpg"><div class="title"><span class="icon icons-act"></span>Cắt tóc cô dâu</div></div><div class="offer-delete" data-id="4"><div class="icons-delete2 unfeature"></div></div></div>	 -->
	</div>
</div>


<!-- ADD PROMOTION -->
<div id="addPromotion" class="modal in" tabindex="-1">
	<div class="modal-dialog" style="width:900px;">


		<div class="modal-content">
			<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">

				
				<div class="promotion-add-head-title text-center">
					THÊM PROMOTION
					<div class="pull-right">
						<button class="btn btn-black btn-close-modal">
							<i class="fa fa-close"></i>						
						</button>
					</div>
				</div>
				<div class="form-horizontal" id="form-promotion">
					<div class="contaner-fluid">
						<div class="row">
							<div class="col-md-8">					
								<!-- Title -->
								<div class="form-group clearfix promotion-add-item">
									<label for="" class="control-label col-md-3">Tiêu đề:</label>
									<div class="col-md-6">
										<input type="text" name="promotion-add-title" id="promotion-add-title" class="form-control" placeholder="Tiêu đề..." required pattern=".{4,}" title="ít nhất 4 ký tự" maxlength="100">
									</div>
								</div>
						
								<!-- Start date -->
								<div class="form-group clearfix promotion-add-item">
									<label for="" class="control-label col-md-3">Ngày bắt đầu:</label>
									<div class="col-md-6">
										<input type="text" name="promotion-add-start-date" id="promotion-add-start-date" class="form-control" placeholder="ngày/tháng/năm">
									</div>					
								</div>

								<!-- End date -->
								<div class="form-group clearfix promotion-add-item">
									<label for="" class="control-label col-md-3">Ngày kết thúc:</label>
									<div class="col-md-6">
										<input type="text" name="promotion-add-end-date" id="promotion-add-end-date" class="form-control" placeholder="ngày/tháng/năm">
									</div>					
								</div>
							</div>	
							<div class="col-md-4">
								<!-- Image -->
								<div class="form-group clearfix promotion-add-item row" style="margin-top:100px">
									<label for="" class="control-label" style="width: 100px;">Hình ảnh:</label>
									<div class="col-md-4">						
										<ul class="menu-item-pictures" >
											<div id="ListIM_addUS"></div> 
											<li class="single-picture empty">
												<div id="iM_addUS" class="single-picture-wrapper imageManager_openModal" style="position: relative;" data-toggle="modal" data-target="#imageManager_modal">
													<div class="add-picture vertically-centered" style="position: absolute; height: 34px; top: 50%; margin-top: -17px;">
														<div class="icon icons-plus3"></div>
														Thêm hình
													</div>
												</div>
											</li>
										</ul>
									</div>					
								</div>					
							</div>
						</div>
						
						<div class="row-fluid">
								<!-- Content -->
							<span class="col-md-12 text-center promotion-add-lbl-content"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;..:: Nội Dung ::..</span>
							<div class="form-group clearfix promotion-add-item">					
								<div class="text-center promotion-add-content-editor">
									<textarea id="promotionContent"></textarea>
								</div>			


								<!-- BUTTON SUBMIT -->
								<div class="text-left" style="margin-left: 10px;">
									<button class="btn btn-success" id="add-new-promotion" data-toggle="modal" data-target="#addPromotion">
										<i class="fa fa-check"></i>
										Thêm mới
									</button>

									<button class="btn btn-default" id="refres-promotion" data-toggle="modal" data-target="#addPromotion">
										<i class="fa fa-check"></i>
										Tạo lại
									</button>
									<span class="alert alert-danger promotion-message" style="display:none; margin-left: 10px;">
										
									</span>
									
								</div>		
							<!-- END BUTTON SUBMIT -->						
							</div>						
						</div>
					</div>			
	
				</div>		
			</div>
		</div>	
	</div>	
</div>
<!-- END ADD PROMOTION -->

<!-- UPDATE PROMOTION -->
<div id="updatePromotion" class="modal in" tabindex="-1" data-id-promotion="">
	<div class="modal-dialog" style="width:900px;">
		<div class="modal-content">
			<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">				
				<div class="promotion-add-head-title text-center">
					CHỈNH SỬA KHUYẾN MÃI
					<div class="pull-right">
						<button class="btn btn-black btn-close-modal">
							<i class="fa fa-close"></i>						
						</button>
					</div>
				</div>
				<div class="form-horizontal" id="form-promotion">	

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8">					
								<!-- Title -->
								<div class="form-group clearfix promotion-add-item created-day" >
									<label for="" class="control-label col-md-3">Tiêu đề:</label>
									<div class="col-md-6">
										<input type="text" name="promotion-update-title" id="promotion-update-title" class="form-control" placeholder="Tiêu đề..." required pattern=".{4,}" title="ít nhất 4 ký tự" maxlength="100">
									</div>
								</div>
						
								<!-- Start date -->
								<div class="form-group clearfix promotion-add-item">
									<label for="" class="control-label col-md-3">Ngày bắt đầu:</label>
									<div class="col-md-6">
										<input type="text" name="promotion-update-start-date" id="promotion-update-start-date" class="form-control" placeholder="ngày/tháng/năm">
									</div>					
								</div>

								<!-- End date -->
								<div class="form-group clearfix promotion-add-item">
									<label for="" class="control-label col-md-3">Ngày kết thúc:</label>
									<div class="col-md-6">
										<input type="text" name="promotion-update-end-date" id="promotion-update-end-date" class="form-control" placeholder="ngày/tháng/năm">
									</div>					
								</div>
							</div>	

							<div class="col-md-4">
								<div class="row">
										<!-- Image -->
								<div class="form-group clearfix promotion-add-item">
									<label for="" class="control-label col-md-2" style="width:100px;">Hình ảnh:</label>
									<div>						
										<ul class="menu-item-pictures">
											<div id="ListIM_editUS"></div> 
											<li class="single-picture empty">
												<div id="iM_editUS" class="single-picture-wrapper imageManager_openModal" style="position: relative;" data-toggle="modal" data-target="#imageManager_modal">
													<div class="add-picture vertically-centered" style="position: absolute; height: 34px; top: 50%; margin-top: -17px;">
														<div class="icon icons-plus3"></div>
														Thêm hình
													</div>
												</div>
											</li>
										</ul>
									</div>					
								</div>		
								</div>
											
							</div>		
						</div>
					</div>
						
	<!-- --------------------------------------------------------------------- -->

								

					<!-- Content -->
					<div class="row">
											<span class="col-md-12 text-center promotion-add-lbl-content">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ..:: Nội Dung ::..</span>
	
					</div>
					<div class="form-group promotion-add-item row">					
						<div class="text-center promotion-add-content-editor">
							<textarea id="promotionContentUpdate" styl="width:100%;" col="10"></textarea>
							<div style="clear:bold;" class="cl">
								
							</div>
						</div>			


							<!-- BUTTON SUBMIT -->
						<div class="text-left" style="margin-left: 10px;">
							<button class="button button-primary" id="update-promotion" style="padding:0px 5px;">
								<i class="fa fa-check"></i>
								Cập nhật
							</button>
							<span class="alert alert-danger promotion-message" style="display:none; margin-left: 10px;">
								
							</span>
							
						</div>		
						<!-- END BUTTON SUBMIT -->						
					</div>

					
				</div>		
			</div>
		</div>	
	</div>	
</div>
<!-- END UPDATE PROMOTION -->


<!-- Image Manager Modal -->
<div class="modal" id="imageManager_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="imageManager_modalLabel">Upload image</h4>
      </div>
      <div class="modal-body">
        <div id="imageManager_descriptionImage">
            <div id="imageManager_descriptionImage-content">
                <strong>Image title:</strong> </br>
                <span class="cover_title"></span>
                <div>
                    <h6>Image name: </h6><h6 class="cover_image_name"> </h6>
                    <h6>Image size: </h6><h6 class="cover_image_size"> </h6>
                    <h6>Thumbnail: </h6><h6 class="cover_thumbnail_name"> </h6>
                </div>
            </div>
            <button type="button" id="imageManager_removeImage" class="btn btn-sm btn-danger pull-left" disabled="disabled"><i class="fa fa-trash-o"></i> Remove</button>
        </div>
        <div id="imageManager_allImage">
            <!-- All image show here --> 
                
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer" style="margin-top: 0px;">
        <div class="col-md-9" style="border-right: 1px solid #CCC; margin-bottom: 10px;">
            <form id="imageManager_uploadForm" method="post" action="upload.php" enctype="multipart/form-data">
                
                <div id="upload_imagePreview" class="pull-left" >
                    <img src="" style="width: 127px; height: 70px;"/>
                </div>
                <div class="pull-left" align="left" style="margin-left: 10px; width: 120px;">
                    <span class="btn btn-sm btn-success fileinput-button" style="margin-bottom: 11px;">
                        <i class="fa fa-plus"></i>
                        <span>Add file ...</span>
                        <input type="file" name="file" id="imageManger_inputFile" >
                    </span>
                    </br>
                    <button type="submit" class="btn btn-sm btn-primary" value="Upload" id="imageManager_startUpload" >
                        <i class="fa fa-upload"></i>
                        <span>Start upload</span>
                    </button>
                </div>
                <div class="pull-left" style="width: 315px">
                    <input id="cover_title" name="cover_title" type="text" class="form-control" pattern=".{3,}" required title="3 characters minimum" placeHolder="Nhập tiêu đề cho cover" >
                    </br>
                    <div class="progress progress-striped active" style="margin-bottom: 0px;">
                      <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">45% Complete</span>
                      </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <button type="submit" id="imageManager_saveChange" class="btn btn-sm btn-primary" >Save changes</button>
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div><!--// END Image Manager Modal -->