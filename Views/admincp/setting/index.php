<!-- <div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<h3>Quản lý tài khoản</h3>
		</div>
	</div>
	<div class="main-content" id="main_detail">
		<h3 class="add-place">Đổi mật khẩu</h3>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3">Mật Khẩu Cũ (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập mật khẩu cũ...(*)" class="form-control" id="admin_old_password" name="" type="password" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Mật Khẩu Mới (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập mật khẩu mới...(*)" class="form-control" id="admin_new_password" name="" type="password" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Lặp Lại Mật Khẩu Mới (*)</label>
						<div class="col-md-7">
							<input placeholder="Nhập lại mật khẩu mới...(*)" class="form-control" id="admin_renew_password" name="" type="password" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-7">
							<small class="text-danger">Lưu ý: Password không phân biệt chữ hoa, chữ thường</small>
						</div>
					</div>
				</div>		
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="editPassword()" id="btn_edit_password" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button>
				<small id="error_edit_password" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script></script> -->


<div id="settings-holder" class="content-holder">
    <div class="ui-tabs ui-widget ui-widget-content ui-corner-all" id="settings-tabs">
        <div class="section-aside">
            <ul id="nav2" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                role="tablist">
                <li id="venue-settings-tab" class="ui-state-default ui-corner-top active">
                    <a href="#setting-user-manager" style="position: relative;" role="tab" data-toggle="tab">
                        <div class="nav-icon icons-nav-venue"></div>
                        <div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
                            Quản lý tài khoản
                        </div>
                    </a>
                </li>

                <li id="finance-tab" class="ui-state-default ui-corner-top">
                    <a href="#setting-embed-script" style="position: relative;" role="tab" data-toggle="tab">
                        <div class="nav-icon icons-nav-supplier"></div>
                        <div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
                            Chèn Script
                        </div>
                    </a>
                </li>
                <!--				imtoantran general setting start -->
                <li id="general-tab" class="ui-state-default ui-corner-top">
                    <a href="#setting-general" style="position: relative;" role="tab" data-toggle="tab">
                        <div class="nav-icon icons-nav-supplier"></div>
                        <div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
                            Cài đặt chung
                        </div>
                    </a>
                </li>
                <!--				imtoantran general setting end -->
            </ul>
        </div>

        <div class="tab-content section-main">

            <!-- USER MANAGER -->
            <div class="tab-pane active" id="setting-user-manager">
                <div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <!-- item sub menu -->
                    <div class="nav3">
                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                            role="tablist">
                            <li class="ui-state-default ui-corner-top active">
                                <a href="#venue-details" role="tab" data-toggle="tab"> Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </div>

                    <!-- content - sub menu -->
                    <div class="tab-content tab-content-fix">
                        <div id="venue-details" class="tab-pane active">
                            <div class="main-content" id="main_detail">
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Mật Khẩu Cũ (*)</label>

                                                <div class="col-md-7">
                                                    <input placeholder="Nhập mật khẩu cũ...(*)" class="form-control"
                                                           id="admin_old_password" name="" type="password"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Mật Khẩu Mới (*)</label>

                                                <div class="col-md-7">
                                                    <input placeholder="Nhập mật khẩu mới...(*)" class="form-control"
                                                           id="admin_new_password" name="" type="password"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Lặp Lại Mật Khẩu Mới (*)</label>

                                                <div class="col-md-7">
                                                    <input placeholder="Nhập lại mật khẩu mới...(*)"
                                                           class="form-control" id="admin_renew_password" name=""
                                                           type="password"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"></label>

                                                <div class="col-md-7">
                                                    <small class="text-danger">Lưu ý: Password không phân biệt chữ hoa,
                                                        chữ thường
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button onclick="editPassword()" id="btn_edit_password" type="button"
                                                class="button action action-default button-primary save-action">
                                            <div class="button-inner">
                                                <div class="button-icon icons-tick done"></div>
                                                <div id="edit_loading"
                                                     class="button-icon fa fa-spin fa-refresh s-loading"></div>
                                                <span class="msg msg-action-default">Lưu</span>
                                            </div>
                                        </button>
                                        <small id="error_edit_password" style="color: red; display: none;">Nhập đầy đủ
                                            các trường có (*)
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END VENUA DETAILS -->
                    </div>
                </div>
            </div>
            <!-- END USER MANAGER -->

            <!-- EMBED SCRIPT -->
            <div class="tab-pane" id="setting-embed-script">
                <div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <!-- item sub menu -->
                    <div class="nav3">
                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                            role="tablist">
                            <li class="ui-state-default ui-corner-top active">
                                <a href="#google-details" role="tab" data-toggle="tab"> Google Analytic</a>
                            </li>
                            <li class="ui-state-default ui-corner-top">
                                <a href="#facebook-details" role="tab" data-toggle="tab"> Facebook</a>
                            </li>
                        </ul>
                    </div>

                    <!-- content - sub menu -->
                    <div class="tab-content tab-content-fix">
                        <!-- google -->
                        <div id="google-details" class="tab-pane active">
                            <div class="main-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Header</label>

                                                <div class="col-md-7">
                                                    <textarea class="form-control" name="google-header"
                                                              id="google-header" cols="30" rows="5"></textarea>
                                                </div>
                                                <button class="btn-delete-script" data-name-script="google-header"><i
                                                        class="fa fa-close"> Xóa</i></button>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Footer</label>

                                                <div class="col-md-7">
                                                    <textarea class="form-control" name="google-footer"
                                                              id="google-footer" cols="30" rows="5"></textarea>
                                                </div>
                                                <button class="btn-delete-script" data-name-script="google-footer"><i
                                                        class="fa fa-close"> Xóa</i></button>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"></label>

                                                <div class="col-md-7">
                                                    <small class="text-danger">Lưu ý: Chèn các script của Google...
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- button google -->
                                        <button onclick="embedScript(1,'google')" type="button"
                                                class="button action action-default button-primary save-action">
                                            <div class="button-inner">
                                                <div class="button-icon icons-tick done"></div>
                                                <div id="edit_loading"
                                                     class="button-icon fa fa-spin fa-refresh s-loading"></div>
                                                <span class="msg msg-action-default">Lưu</span>
                                            </div>
                                        </button>
                                        <small style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END  google -->

                        <!-- facebook -->
                        <div id="facebook-details" class="tab-pane">
                            <div class="main-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Header</label>

                                                <div class="col-md-7">
                                                    <textarea class="form-control" name="facebook-header"
                                                              id="facebook-header" cols="30" rows="5"></textarea>
                                                </div>
                                                <button class="btn-delete-script" data-name-script="facebook-header"><i
                                                        class="fa fa-close"> Xóa</i></button>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Footer</label>

                                                <div class="col-md-7">
                                                    <textarea class="form-control" name="facebook-footer"
                                                              id="facebook-footer" cols="30" rows="5"></textarea>
                                                </div>
                                                <button class="btn-delete-script" data-name-script="facebook-footer"><i
                                                        class="fa fa-close"> Xóa</i></button>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"></label>

                                                <div class="col-md-7">
                                                    <small class="text-danger">Lưu ý: Chèn các script của Facebook...
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- button facebook -->
                                        <button onclick="embedScript(2,'facebook')" type="button"
                                                class="button action action-default button-primary save-action">
                                            <div class="button-inner">
                                                <div class="button-icon icons-tick done"></div>
                                                <div id="edit_loading"
                                                     class="button-icon fa fa-spin fa-refresh s-loading"></div>
                                                <span class="msg msg-action-default">Lưu</span>
                                            </div>
                                        </button>
                                        <small style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END  facebook -->

                    </div>
                </div>
            </div>
            <!-- END EMBED SCRIPT -->
            <!--	GENERAL SETTINGS START	-->
            <div class="tab-pane" id="setting-general">
                <div id="venue-settings-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <!-- item sub menu -->
                    <div class="nav3">
                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                            role="tablist">
                            <li class="ui-state-default ui-corner-top active">
                                <a href="#tab1" role="tab" data-toggle="tab">Duyệt bình luận</a>
                            </li>
                        </ul>
                    </div>

                    <!-- content - sub menu -->
                    <div class="tab-content tab-content-fix">
                        <!-- google -->
                        <div id="tab1" class="tab-pane active">
                            <div class="main-content">
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                                    <div class="input-group" id="auto-verify">
						<span class="input-group-addon" data-toggle="tooltip" data-placement="right"
                              title='Bật/tắt tự động duyệt'>
							<input type="checkbox" <?php if ($this->defaultStatus == 'auto') print 'checked' ?>
                                   id="set-auto-verify" value="auto">
						</span>
                                        <button class="btn btn-info form-control loadReplies" data-status="auto">Tự động
                                            duyệt
                                        </button>
                                    </div>
                                    </div>
                                    <!-- /input-group -->

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