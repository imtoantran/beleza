<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
            <div class="venue-info">
                    <div class="title-admincp">
                        Quản lý Menu
                    </div>
                    <button onclick="addNewMenu()" id="btn-add-menu" class="button btn btn-success redeem" type="button">
                        <div class="button-inner">
                             <i class="fa fa-plus-circle"></i>
                            Tạo Menu
                        </div>
                    </button>   
                    
                    <button onclick="deleteMenu()" id="btn-delete-menu" class="button btn btn-danger redeem" type="button">
                        <div class="button-inner">
                            <i class="fa fa-close"></i>
                            Xóa Menu
                        </div>
                    </button> 
                    <button onclick="editMenu()" id="btn-update-menu" class="button btn btn-warning redeem" type="button">
                        <div class="button-inner">
                            <div class="button-icon icons-"></div>
                            <i class="fa fa-edit"></i>
                            Chỉnh sửa Menu
                        </div>
                    </button> 
            </div>
            
            
	</div>
	<div class="main-content table-responsive">
             <div class="content-menu-title">DANH SÁCH MENU</div>
		<table id="menu_list" class="table table-hover" width="100%" cellspacing="0">
	        <thead>
	            <tr>
                        <th style="width: 5%;">
                            <div>
                                <input id="check-all" type="checkbox"/>
                            </div>                          
                        </th>
	                <th style="width: 5%;"><b>ID</b></th>
	                <th style="width: 25%;"><b>Tiêu đề</b></th>
	                <th style="width: 5%;"><b>Cấp</b></th>
	                <th style="width: 10%;"><b>Menu Cha</b></th>
	                <th style="width: 10%;"><b>Biểu tượng</b></th>
	                <th style="width: 10%;"><b>Sắp xếp</b></th>
	                <th style=""><b>Liên kết</b></th>	           
	                <th style="width: 25%;"><b>Hình nền</b></th>
	                <th style="width: 10%;"><b>Trạng thái</b></th>    
	            </tr>
	        </thead>
	 
	        <tfoot>
	            <tr>
                        <th style="width: 5%;">
                            <div>
                                <input id="check-all" type="checkbox"/>
                            </div>                          
                        </th>
	                <th style="width: 5%;"><b>ID</b></th>
	                <th style="width: 25%;"><b>Tiêu đề</b></th>
	                <th style="width: 5%;"><b>Cấp</b></th>
	                <th style="width: 10%;"><b>Menu Cha</b></th>
	                <th style="width: 10%;"><b>Biểu tượng</b></th>
	                <th style="width: 10%;"><b>Thứ tự</b></th>
	                <th style=""><b>Liên kết</b></th>	           
	                <th style="width: 25%;"><b>Hình nền</b></th>
	                <th style="width: 10%;"><b>Trạng thái</b></th>    
	                   
	            </tr>
	        </tfoot>
	 
	        <tbody>
	            
	        </tbody>
	    </table>
	</div>
</div>
<script>
	var IS_INDEX = 1;
	var IS_ADD = 0;
	var IS_EDIT = 0;
	var oTable;
	var currData;
</script>
