<div id="header-2" class="clearfix">
	<!--	############### imtoantran - add revslider #######################	-->
	<!-- <div id="rev_slider_2" class="revslider tp-banner-container"></div> -->
	<!--	############### imtoantran - add revslider #######################	-->	
</div>

<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 account-manager">
			<div class="text-center text-black title-info-user"> <i id="gear" class="fa fa-gear"></i>&nbsp;QUẢN LÝ TÀI KHOẢN</i> </div>
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange bold">HÌNH ĐẠI DIỆN :</p></div>
				<div class="col-md-6">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 135px; height: 120px;">
						</div>
						<div>
							<button class="btn btn-xs btn-primary fileinput-exists" data-dismiss="fileinput" onclick="update_avatar()">
								Đồng ý
							</button>
							<span class="btn btn-xs btn-default btn-file">
								<span class="fileinput-new">
									Chọn hình
								</span>
								<span class="fileinput-exists">
									Đổi hình
								</span>
								<input id="fileinput_client_avatar" type="file" name="client_avatar">
							</span>
							<a href="#" class="btn btn-xs btn-danger fileinput-exists" data-dismiss="fileinput">
								Xóa
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">EMAIL :</p></div>
				<div class="col-md-6"><p class="" id="client_email"></p></div>
			</div>
		
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange control-label">HỌ TÊN :</p></div>
				<div class="col-md-3">
					<input placeholder="Nhập họ tên..." title="<strong>Lưu ý</strong>: Không được để trống!" class="form-control" id="client_name" type="text" readonly=""/>		
				</div>
				<div class="col-md-3" id="client_name_edit"><i title="Sửa họ tên" id="client_name_edit_btn" class="fa fa-pencil text-orange-black"></i></div>
			</div>
		
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">GIỚI TÍNH :</p></div>
				<div class="col-md-6"><p class="" id="client_sex"></p></div>
			</div>
		
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">ĐIỆN THOẠI :</p></div>
				<div class="col-md-3">
					<input placeholder="Nhập số điện thoại..." title="<strong>Lưu ý</strong>: Không được để trống, <br/>là số và ít nhất 9 ký tự!" class="form-control" id="client_phone" type="text" readonly=""/>		
				</div>
				<div class="col-md-3"><i title="Sửa số điện thoại" id="client_phone_edit_btn" class="fa fa-pencil text-orange-black"></i></div>
			</div>
		
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">USERNAME :</p></div>
				<div class="col-md-6"><p class="" id="client_username"></p></div>
			</div>
			
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">NGÀY SINH :</p></div>
				<div class="col-md-3">
					<input onkeypress="inputNothing(event)" placeholder="Chọn ngày sinh..." title="<strong>Lưu ý</strong>: Không được để trống!" class="form-control" id="client_birth" type="text" disabled=""/>		
				</div>
				<div class="col-md-3"><i title="Sửa ngày sinh" id="client_birth_edit_btn" class="fa fa-pencil text-orange-black"></i></div>
			</div>
	
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">CREDIT POINT :</p></div>
				<div class="col-md-6"><p class="" id="client_creditpoint"></p></div>
			</div>
		
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">GIFT POINT :</p></div>
				<div class="col-md-6"><p class="" id="client_giftpoint"></p></div>
			</div>
			
			<div class="row">
				<div class="col-md-offset-3 col-md-3"><p class="text-orange">GHI CHÚ :</p></div>
				<div class="col-md-3">
					<textarea maxlength="200" placeholder="Nhập ghi chú..." style="min-width: 100%;min-height: 120px;" title="<strong>Lưu ý</strong>: Nhiều nhất 200 ký tự!" class="form-control" id="client_note" type="text" readonly=""/></textarea>		
				</div>
				<div class="col-md-3"><i title="Sửa ghi chú" id="client_note_edit_btn" class="fa fa-pencil text-orange-black"></i></div>
			</div>
	
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center text-orange page-header">
						<a class="text-orange-black" id="hidden_change_pass" style="cursor: pointer;">- <i class="fa fa-shield"></i>&nbsp;ĐỔI MẬT KHẨU</i> -</a>
					</h3>
				</div>
			</div>
	
			<div class="row" id="client_change_pass" style="display: none;">
				<!-- <div class="col-md-offset-3 col-md-3"><p class=""><strong>ĐỔI MẬT KHẨU :</strong></p></div> -->
				<div class="col-md-12">
					<form class="form-horizontal">
						<div class="form-group">
							<b class="control-label col-md-4 text-orange">MẬT KHẨU CŨ : </b>
							<div class="col-md-5">
								<input type="password" class="form-control" name="client_old_pass" id="client_old_pass" placeholder="Nhập mật khẩu cũ..."/>
							</div>
						</div>
						<div class="form-group">
							<b class="control-label col-md-4 text-orange">MẬT KHẨU MỚI (1) : </b>
							<div class="col-md-5">
								<input type="password" class="form-control" name="client_pass_1" id="client_pass_1" placeholder="Nhập mật khẩu mới..."/>
							</div>
						</div>
						<div class="form-group">
							<b class="control-label col-md-4 text-orange">MẬT KHẨU MỚI (2) : </b>
							<div class="col-md-5">
								<input type="password" class="form-control" name="client_pass_2" id="client_pass_2" placeholder="Nhập lại mật khẩu mới..."/>
							</div>
						</div>
						<div class="form-group">
							<span class="control-label col-md-4"></span>
							<div class="col-md-6" id="change_pass_btn">
								<a class="btn btn-orange-black" onclick="changePass()">Đổi mật khẩu</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<br />
		</div>
	</div>
</div>
<style>
	div.account-manager{
		border: 1px solid #e4e4e4;
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		margin-bottom: 20px;
		
		padding:0!important;
		box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1)!important;
		-moz-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1)!important;
		-webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1)!important;
	}
	div.account-manager p{font-weight: bold;}
	.title-info-user{
		padding: 10px;
		font-size: 2em;
		background-color: #f1f1f1;
		border-bottom: 1px solid #e5e5e5;
	}
	div.account-manager .row{
		/*background-color: rgba(228, 228, 228, 0.12);*/
		margin: 15px 0px;
		padding-top: 8px;
	}
	i.fa-pencil, i.fa-save{
		cursor: pointer;
	}
	i.fa-pencil:hover, i.fa-save:hover{
		font-size: 18px;
		color: #000000;
	}
	input#client_name, input#client_phone{
		margin-top: -8px;
	}
</style>