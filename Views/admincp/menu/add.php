<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<div class="title-admincp">Tạo Mới Menu</div>
			<button onclick="returnToMenu()" id="" class="button btn btn-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về Menu
				</div>
			</button>
		</div>
	</div>
    <div class="main-content">
         <div class="content-menu-title">TẠO MỚI MENU</div>
        <hr />
        <div class="row">
            <div class="form-horizontal">
                <div class="col-md-6">
                <!--title-->
                    <div class="form-group">
                        <label class="control-label col-md-4">Tiêu đề (*)</label>
                        <div class="col-md-8">
                            <input id="menu_title" name="menu_title" class="form-control" type="text" placeholder="Tiêu đề ..." />
                        </div>
                    </div>
                    
                <!--icon-->
                    <div class="form-group">
                        <label class="control-label col-md-4">Biểu tượng</label>
                        <div class="col-md-6">
                            <input id="menu_icon" name="menu_icon" class="form-control" type="text" placeholder="Icon... " />
                        </div>
                         <div id="cl-icon" class="col-md-2"></div>
                    </div>

                <!--background-->
                    <div class="form-group">                                          
                        <label class="control-label col-md-4">Hình nền</label>
                        <div class="col-md-3"> 
                            <select class="form-control" id="select_upload" name="select_upload">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>                                                   
                        </div>
                    </div>    
                        <div id="box-upload" class="form-group" style="display:none">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-8">
                                <form id="upload_form" method="post" name="upload_image" enctype="multipart/form-data">
                                    <input class="btn btn-default" id="menu_background" data-url="" name="menu_background"  value="upload" type="file" />
                                    <input class="btn btn-success text-center" id="upload_image"  value="Upload" name="submit" type="submit" style="margin-top:5px;"/>
                                    <input class="btn btn-black text-center" id="change_image"  value="Chọn hình" name="submit" type="button" onclick="getListImage()" style="margin-top:5px;"/>
                                </form>
                                <div  id="result_upload" style="margin: 5px;"> </div>
                            </div>
                        </div>                         
                </div>
                <!--------------------------------------------->
                <div class="col-md-6">			
                    <div class="form-group">
                        <label class="control-label col-md-4">Cấp độ</label>
                        <div class="col-md-2">
                            <select class="form-control" id="menu_level" name="menu_level">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        
                        
                        <label class="control-label col-md-4">Thứ tự</label>
                        <div class="col-md-2">
                            <input id="menu_order" name="menu_order" class="form-control" type="text" placeholder="STT..." />              
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Menu Cha</label>
                        <div class="col-md-6">
                            <select class="form-control" id="menu_parent" name="menu_parent">
                                <option value="" selected class="small">--- Không có ---</option>
                            </select>
                        </div>
                    </div> 
                    
                    <!--link-->
                    <div class="form-group">
                        <label class="control-label col-md-4">Liên kết</label>
                        <div class="col-md-8">
                            <textarea id="menu_link" name="menu_link"  class="form-control" row="20" style="height:100px;" placeholder="Link liên kết... "></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">                                          
                        <label class="control-label col-md-4">Hiển thị</label>
                        <div class="col-md-3"> 
                            <select class="form-control" id="menu_enable" name="menu_enable">
                                <option value="0">Không</option>
                                <option value="1" selected>Có</option>
                            </select>                                                   
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button onclick="addSaveItemMenu()" type="button" class="button action action-default button-primary save-action">
                    <div class="button-inner">
                        <div class="button-icon icons-tick done"></div>
                        <div class="button-icon fa fa-spin fa-refresh s-loading"></div>
                        <span class="msg msg-action-default">Thêm</span>
                    </div>
                </button>
                <small id="error_add_menu" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
            </div>
        </div>
    </div>
</div>
<div id="bg-list-img" class="dialog-show-box model fade" style="margin: 0 auto;">
    <div class="text-center modal-dialog" style="z-index: 1041;  width: 80%;">
        <div class="wrap-list-img">
            <button  class="btn btn-danger fa fa-close text-right pull-right" style="margin: 5px 20px 0px -55px;" onclick="closeBoxListImg()"></button>  
            <div id="content-list-img" class="text-left">
                
            </div>
        </div>            
    </div>
    <div class="clearfix"></div> 
</div>
<script>
	var IS_ADD = 1;
	var IS_EDIT = 0;
</script>