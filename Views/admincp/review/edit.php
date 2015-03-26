<?php $replies = $this->replies; ?>
<div class="modal fade" id="modal-reply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <strong class="text-primary modal-title"></strong>: <span id="reply-content" data-id=""
                                                                                      data-status=""></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger updateStatus" data-status="unverified">Không duyệt</button>
                <button class="btn btn-success updateStatus" data-status="verified">Duyệt</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="home-holder" class="content-holder pending">
    <div class="sidebar">
        <div class="venue-info">
            <h3 class="title-admincp">Quản lý đánh giá</h3>
            <button onclick="returnToReview()" id="" class="button button-primary redeem" type="button">
                <div class="button-inner">
                    <div class="button-icon icons-arrow-left2"></div>
                    Trờ về trang đánh giá
                </div>
            </button>
        </div>
    </div>
    <div class="main-content" id="main_detail">
        <h3 class="add-place">Duyệt đánh giá</h3>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3">Họ Tên</label>

                        <div class="col-md-7">
                            <input disabled="disabled" placeholder="Nhập tên người dùng..." class="form-control"
                                   id="client_name" name="" type="text" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Username</label>

                        <div class="col-md-7">
                            <input disabled="disabled" placeholder="Nhập username..." class="form-control"
                                   id="client_username" name="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Tham Gia</label>

                        <div class="col-md-7">
                            <input disabled="disabled" placeholder="Nhập ngày tham gia..." class="form-control"
                                   id="client_join_date" name="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Đánh Giá Trên Địa Điểm</label>

                        <div class="col-md-7">
                            <input disabled="disabled" placeholder="Nhập địa điểm..." class="form-control"
                                   id="user_business_name" name="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Nội Dung</label>

                        <div class="col-md-7">
                            <textarea style="min-width: 100%;max-width: 100%; min-height: 120px;" class="form-control"
                                      disabled="disabled" id="user_review_content"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <button disabled="disabled" onclick="editReview()" id="btn_edit_review" type="button"
                        class="button action action-default button-other save-action">
                    <div class="button-inner">
                        <div class="button-icon icons-tick done"></div>
                        <div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                        <span id="edit_text" class="msg msg-action-default">Đã Duyệt</span>
                    </div>
                </button>
                <button style="display: none;" onclick="deleteReview()" id="btn_delete_review" type="button"
                        class="button action action-default button-secondary save-action">
                    <div class="button-inner">
                        <div class="button-icon icons-delete remove"></div>
                        <div id="remove_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                        <span class="msg msg-action-default">Xóa Đánh Giá</span>
                    </div>
                </button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Quản lý bình luận</h3>
                    </div>
                    <div class="panel-body">
                        <?php if (count($replies)): ?>
                            <table class="table table-bordered table-hover" id="replies_list">
                                <thead style="background-color: #428CCC;">
                                <tr>
                                    <th width="50">#</th>
                                    <th width="200px">Tên</th>
                                    <th width="100">Ngày đăng</th>
                                    <th width="*">Nội dung</th>
                                    <th width="120">Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($replies as $key => $reply): ?>
                                    <tr data-id="<?php echo $reply['id'] ?>">
                                        <td><?php echo $key ?></td>
                                        <td><?php echo $reply['name'] ?></td>
                                        <td><?php echo $reply['timecreated'] ?></td>
                                        <td width="*"><?php echo $reply['content']; ?></td>
                                        <td><span
                                                class="label <?php if ($reply['status_code'] == 'verified') echo "status-confirmed"; else if ($reply['status_code'] == 'reported') echo "note-critical"; else if ($reply['status_code'] == 'auto') echo "label-quiet"; else echo "status-not-confirmed"; ?>"><?php echo $reply['status'] ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            Không có bình luận nào
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var IS_INDEX = 0;
    var IS_ADD = 0;
    var IS_EDIT = 1;
    var REVIEW_ID = "<?php echo $this -> review_id; ?>";

</script>