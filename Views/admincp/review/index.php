<div id="home-holder" class="content-holder pending">
    <div class="sidebar">
        <div class="venue-info">
            <h3 class="title-admincp">Quản lý đánh giá</h3>
            <button class="button button-primary redeem loadreview active" type="button" data-controller='/admincp_review/loadReviewList'>
                <div class="button-inner">
                    <div class="button-icon glyphicon glyphicon-th-list"></div>
                    <div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                    Tất cả đánh giá
                </div>
            </button>
            <button class="button button-primary redeem loadreview" type="button" data-controller='/admincp_review/newReview'>
                <div class="button-inner">
                    <div class="button-icon glyphicon glyphicon-plus-sign"></div>
                    <div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                    Đánh giá mới
                </div>
            </button>
            <button class="button button-primary redeem loadreview" type="button" data-controller='/admincp_review/unverifiedReview'>
                <div class="button-inner">
                    <div class="button-icon glyphicon glyphicon-unchecked"></div>
                    <div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                    Chưa duyệt
                </div>
            </button>
            <button class="button button-primary redeem loadreview" type="button" data-controller='/admincp_review/verifiedReview'>
                <div class="button-inner">
                    <div class="button-icon glyphicon glyphicon-check"></div>
                    <div id="edit_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                    Đã duyệt
                </div>
            </button>
        </div>
    </div>
    <div class="table-responsive" style="margin-top:50px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="review_list" class="table table-hover" width="100%" cellspacing="0">
                <thead style="background-color: #428CCC;">
                <tr>
                    <th style="width: 16%;"><b>Tên Người Dùng</b></th>
                    <th style="width: 10%;"><b>Ngày đăng</b></th>
                    <th style="width: 120px;"><b>Điểm</b></th>
                    <th style="width: 18%;"><b>Đánh Giá Trên Địa Điểm</b></th>
                    <th><b>Nội Dung</b></th>
                    <th style="width: 9%;"><b>Trạng thái</b></th>
                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var IS_INDEX = 1;
    var IS_ADD = 0;
    var IS_EDIT = 0;
    var oTable;
    var currData;
</script>