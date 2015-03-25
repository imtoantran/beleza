<?php $sms = $this->sms; ?>
<div class="modal fade bs-example-modal-sm show-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <center>
                <i class="fa fa-refresh fa-spin"></i>
            </center>
        </div>
    </div>
</div>
<div class="main-content table-responsive sms">
    <p class="title-admincp">SMS TEMPLATE</p>

    <table id="sms_list" class="table table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><b>ID</b></th>
                <th><b>Template</b></th>
                <th><b>Mã</b></th>
                <th><b>Nội dung</b></th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><b>ID</b></th>
                <th><b>Template</b></th>
                <th><b>Mã</b></th>
                <th><b>Nội dung</b></th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            foreach ($sms as $key => $value) {
                $status = "Tắt";
                if ($value['status'] == '0')
                    $status = "Bật";
                print "<tr>";
                print "<td width='50'>" . $value['id'] . "</td>";
                print "<td width='200'>" . $value['name'] . "</td>";
                print "<td width='200'>" . $value['slug'] . "</td>";
                print "<td><input id='sms-content-" . $value['id'] . "' value='" . $value['content'] . "' class='form-control'></td>";
                print "<td width='50'><button disabled id='sms-" . $value['id'] . "' class='btn btn-danger save'>Lưu</button></td>";
                print "<td width='50'><button data-toggle='modal' data-target='.show-modal' id='status-" . $value['id'] . "' class='btn btn-info stat'>" . $status . "</button></td>";
                print "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>