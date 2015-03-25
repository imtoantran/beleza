
<?php
$help = "<table class='table'>"
        . "<thead>"
        . "<tr>"
        . "<td>Mã</td><td>Nội dung</td>"
        . "</tr>"
        . "</thead>"
        . "<tbody>"
        . "<tr><td><span class='label label-info'>{{TEN}}</span></td><td>Tên</td></tr>"
        . "<tr><td><span class='label label-info'>{{MABOOKING}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{MAEVOUCHER}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{NGAY}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{GIO}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{THANG}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{NAM}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{DIADIEM}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{TENDICHVU}}</span></td><td>Mã booking</td></tr>"
        . "<tr><td><span class='label label-info'>{{MADICHVU}}</span></td><td>Mã booking</td></tr>"
        . "</tbody>"        
        . "</table>";

?>

<div class="modal fade" id="modal_help">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Hướng dẫn</h4>
			</div>
			<div class="modal-body ">
                <table class="table table-bordered">
                    <thead>
                    <tr><th><b>#</b></th><th><b>Mã</b></th><th><b>Nội dung</b></th></tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach($this->helps as $key=>$value): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>{{<?php echo $key ?>}}</td>
                        <td><?php echo $value ?></td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<!-- /.modal -->
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
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-11">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Mã Template: </button>
                            </span>
                            <input name="slug" type="text" <?php  if(isset($_POST['id'])){ echo $_POST['id']; } ?> class="form-control" value="<?php print $_POST['slug']; ?>">
                        </div><!-- /input-group -->
                    </div>
                </div><!-- /.col-lg-6 -->                        
                <div class="col-xs-1">
                    <a href="<?php print URL . "admincp_email" ?>"><button class="btn btn-sm btn-danger form-control">Trở về</button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-11">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Tên Template: </button>
                            </span>
                            <input name="name" type="text" class="form-control" value="<?php print $_POST['template']; ?>">
                        </div><!-- /input-group -->
                    </div>
                </div><!-- /.col-lg-6 -->                        
                <div class="col-xs-1">
<!--                    <button class="btn btn-success" data-placement="left" data-container="body" data-html="true" data-toggle="popover" data-content="--><?php //print $help; ?><!--">Trợ giúp</button>-->
                    <button class="btn btn-primary" data-toggle="modal" href="#modal_help">Trợ giúp</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-11">
                    <div class="input-group">
                        <span class="input-group-addon">Tiêu đề email: </span>
                        <input name="subject" type="text" class="form-control" placeholder="Tiêu đề mail" value="<?php print $_POST['subject']; ?>">
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-xs-1">
                    <button id="sms-turn" class="btn btn-sm btn-success form-control save" data-toggle="modal" data-target="#saving">Lưu</button>
                </div>
                <input name="smsstatus" type="hidden" value=""/>
            </div>
        </div>
    </div>
    <textarea id="emailcontent" name="emailcontent">
        <?php  if(isset($_POST['content'])){echo $_POST['content'];}?>
    </textarea>
</div>

<script>
    var id = "<?php print $_POST['id'] ?>";
</script>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
