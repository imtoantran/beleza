<?php $data = $this->data; ?>
<div class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h1 class="modal-title text-center">
                    <i class="fa-pencil-square-o fa"></i> Phản hồi                 
                </h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 review-item small">
                        <strong id="client-name"></strong>: <span id="review-content" class=""></span>
                    </div>                    
                </div>                
                <div class="row">
                    <div class="small blank hidden reply-item"></div>
                    <div class="col-xs-12" id="review-replies-list"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input id="review-reply" placeholder="Viết phản hồi của bạn" class="form-control" />
                    </div>
                    <hr>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:right;">
                        <button class="button action action-default button-secondary save-action" data-dismiss="modal">
                            <div class="button-inner">
                                <div class="button-icon icons-delete remove"></div>
                                <div id="save_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                                <span class="msg msg-action-default">Đóng</span>
                            </div>
                        </button>
                        <button class="button action action-default button-other save-action" id="do_reply">
                            <div class="button-inner">
                                <div class="button-icon icons-tick done"></div>
                                <div id="save_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                                <span class="msg msg-action-default">Phản hồi</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="content-holder">
<h2 class="box-hd">Quản lý đánh giá </h2>
<hr>
<table id="review_list" class="table table-reponsive table-bordered table-hover dataTable no-footer" cellspacing="0">
    <thead style="background-color: #428CCC;">
        <tr>
            <th width="*"><b>Khách hàng</b></th>
            <th width="10%"><b>Điện thoại</b></th>
            <th width="*"><b>Email</b></th>
            <th width="5%"><b>Ngày đăng</b></th>
            <th width="8%"><b>Giới tính</b></th>
            <th width="*"><b>Điểm</b></th>
            <th width="*"><b>Nội Dung</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
        // foreach ($data as $key => $value) {
        //     if($value['user_type'] == 'client' && $value['note'] != 'viewed'){
        //         $highlight = " class='alert alert-danger' ";
        //         $title = " title ='Có phản hồi mới' ";
        //     }
        //     print "<tr $highlight $title data-user-id='" . $value['user_id'] . "' data-client-id ='" . $value['client_id'] . "' data-toggle='modal' data-target='.modal'>";
        //     print "<td class='client-name'>" . $value['client_name'] . "</td>";
        //     print "<td>" . $value['client_phone'] . "</td>";
        //     print "<td>" . $value['client_email'] . "</td>";
        //     print "<td>" . date_format(new DateTime($value['client_birth']), "d/m/Y") . "</td>";
        //     print "<td>" . $value['client_sex'] . "</td>";
        //     print "<td class='review-content'>" .$value['user_review_content'] . " ...</td>";
        //     print "</tr>";
//, user_review.client_id
//, user_review.user_id    
        // }
        ?>

         <?php
        foreach ($data as $key => $value) {
            $highlight ="";
            $title ="";
            if($value['user_type'] == 'client' && $value['note'] != 'viewed'){
                $highlight = " class='alert alert-danger' ";
                $title = " title ='Có phản hồi mới' ";
            }
            print "<tr ".$highlight." ".$title." data-user-id='" . $value['user_id'] . "' data-client-id ='" . $value['client_id'] . "' data-toggle='modal' data-target='.modal'>";
            print "<td class='client-name' style='white-space: nowrap'>" . $value['client_name'] . "</td>";
            print "<td>" . $value['client_phone'] . "</td>";
            print "<td>" . $value['client_email'] . "</td>";
            print "<td>" . date_format(new DateTime($value['user_review_date']), "d/m/Y") . "</td>";
            print "<td align='center'>" . $value['client_sex'] . "</td>";
            print "<td style='white-space: nowrap'>" . $value['user_review_overall'] . "</td>";
            print "<td class='review-content'>" .$value['user_review_content'] . " ...</td>";
            print "</tr>";
            //, user_review.client_id
            //, user_review.user_id    
        }
        ?>



    </tbody>                            
</table>
</div>