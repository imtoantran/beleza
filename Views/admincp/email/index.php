<?php $email = $this->email; ?>
<!-- Modal -->
<div class="modal fade" id="saving" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body alert">  
                <div class="info"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div class="main-content table-responsive email">
    <div class="row">
        <div class="col-lg-10">            
            <p class="title-admincp">EMAIL TEMPLATE</p>
        </div>
        <div class="col-lg-2">
            <button  type="button" class="pull-right button action action-default button-primary add-template">
                <div class="button-inner">
                    <div class="button-icon icons-add-link"></div>
                    <div id="save_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                    <span class="msg msg-action-default">Thêm Template</span>
                </div>
            </button>        
        </div>
    </div>
    <table id="email_list" class="table table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><b>Template</b></th>
                <th><b>Slug</b></th>
                <th><b>Tiêu đề</b></th>
                <th><b>Nội dung</b></th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><b>Template</b></th>
                <th><b>Slug</b></th>
                <th><b>Tiêu đề</b></th>
                <th><b>Nội dung</b></th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            foreach ($email as $key => $value) {
                print "<tr id='".$value['id']."'>";
                print "<td width='200' id='template-" . $value['id'] . "'>" . $value['name'] . "</td>";
                print "<td width='200' id='slug-" . $value['id'] . "'>" . $value['slug'] . "</td>";
                print "<td width='200'><input id='email-subject-" . $value['id'] . "' disabled value='" . $value['subject'] . "' class='form-control'></td>";
                print "<td><input id='email-content-" . $value['id'] . "' disabled value='" . $value['content'] . "' class='form-control'></td>";
                print "<td width='120'>"
                        . "<button id='template-id-" . $value['id'] . "' class='btn btn-success edit btn-sm'>Sửa</button>"
                        . "<button id='delete-template-id-" . $value['id'] . "' class='pull-right btn btn-danger btn-sm delete'>Xóa</button>"
                        . "</td>";
                print "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">
            <button  type="button" class="pull-right button action action-default button-primary add-template">
                <div class="button-inner">
                    <div class="button-icon icons-add-link"></div>
                    <div id="save_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
                    <span class="msg msg-action-default">Thêm Template</span>
                </div>
            </button>        
        </div>
    </div>

    <form id="form-holder" action="<?php print URL ?>admincp_email/edit" method="post" >
        <input name="id" type="hidden"/>
        <input name="template" type="hidden"/>
        <input name="content" type="hidden"/>
        <input name="subject" type="hidden"/>
        <input name="slug" type="hidden"/>
    </form>
</div>