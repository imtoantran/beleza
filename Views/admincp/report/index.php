<?php 

?>
<div id="settings-holder" class="content-holder">
	<div class="ui-tabs ui-widget ui-widget-content ui-corner-all" id="settings-tabs">
		<div class="section-aside">
			<ul id="nav2" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
				<li id="general-report-tab" class="ui-state-default ui-corner-top active" >
					<a href="#sale-general" style="position: relative;" role="tab" data-toggle="tab"> <div class="nav-icon icons-nav-settings-on"></div>
						<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
							Tổng quan
						</div> 
					</a>
				</li>
				<li id="sale-report-tab" class="ui-state-default ui-corner-top">
					<a href="#sale-report" style="position: relative;" role="tab" data-toggle="tab"> <div class="nav-icon icons-nav-supplier"></div>
						<div class="title" style="position: absolute; height: 17px; top: 50%; margin-top: -8.5px;">
							Doanh thu
						</div> 
					</a>
				</li>
			</ul>
		</div>

		<div class="tab-content section-main">

            <div class="tab-pane active" id="sale-general">

                <div class="report-actions">

                    <div class="date-range-selector">
                        <div id="dashboard-report-range" class="dashboard-date-range tooltips current" data-placement="top" data-original-title="Change dashboard date range">
                            <div class="icon icons-date-selector"></div>
                            <span>
                            </span>
                            <!-- <i class="fa fa-angle-down"></i> -->
                            <div class="arrow icons-arrow-bottom2"></div>
                        </div>
                    </div>

                </div>
                <div class="report-content">
                    <div class="printed-date">
                        <span class="title">Ngày in báo cáo</span>
                        <span class="date"></span>
                    </div>
                    <h1>Tổng doanh số bán hàng</h1>
                    
                    <div class="stats-group general">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Khoảng thời gian</th>
                                    <th>Tổng doanh thu</th>
                                    <th>Tổng eVoucher</th>
                                    <th>Tổng giftVoucher </th>
                                    <th>Tổng Lượt booking </th>
                                </tr>
                                <tr class="important">
                                    <td>
                                    <span class="period"></span>
                                        <span class="highlighted"></span>
                                        <div class="change positive hidden">
                                            <div class="icon ic ons-change-up"></div>
                                            <div class="value"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="highlighted totalSale_value"></span>
                                        <div class="change positive hidden">
                                            <div class="icon ic ons-change-up"></div>
                                            <div class="value"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="highlighted totalEvoucher_value"></span>
                                        <div class="change positive hidden">
                                            <div class="icon ic ons-change-up"></div>
                                            <div class="value"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="highlighted totalGiftvoucher_value">0 đ</span>
                                        <div class="change positive hidden">
                                            <div class="icon ic ons-change-up"></div>
                                            <div class="value"></div>
                                        </div>
                                    </td>
                                    <td>                                        
                                        <span class="highlighted totalBooking_value">0 đ</span>
                                        <div class="change positive hidden">
                                            <div class="icon ic ons-change-up"></div>
                                            <div class="value"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                	<td></td>
                                	<td></td>
                                	<td><span class="totalEvoucher_count"></span></td>
                                	<td><span class="totalGiftvoucher_count"></span></td>
                                	<td><span class="totalBooking_count"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                    	<div class="col-xs-6">
                    		<div class="page-header">
  							<h2 class="text-center">Tổng số lượng người dùng </h1>
  							<h1 class="text-center"><?php print $this->totalClient; ?></h2>
							</div>
                    	</div>
                    	<div class="col-xs-6">
                    		<div class="page-header">
  							<h2 class="text-center">Tổng số lượng Spa </h2>
  							<h1 class="text-center"><?php print $this->totalUser; ?></h1>
						</div>                    		
                    	</div>
                    </div>
                </div>
            </div>
			<!-- END GENERAL REPORT -->

			<div class="tab-pane" id="sale-report">
				<div id="sale-report-tabs" class="tabs-inner ui-tabs ui-widget ui-widget-content ui-corner-all">
					<div class="nav3">
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
							<li class="ui-state-default ui-corner-top active">
								<a href="#user-sale-details" role="tab" data-toggle="tab">Doanh thu theo Spa</a>
							</li>
							<li class="ui-state-default ui-corner-top">
								<a href="#service-sale-details" role="tab" data-toggle="tab">Doanh thu theo Dịch vụ</a>
							</li>
						</ul>
					</div>

					<div class="tab-content tab-content-fix main-content">
						<!-- START USER SALE REPORT DETAILS -->
						<div id="user-sale-details" class="tab-pane active">
							<div class="">
								<div class="row">
									<div class="col-xs-12">
										<div class="control">
											<div class="form-horizontal" role="form">
												<div class="form-group">
													<label class="col-sm-7 control-label">Từ ngày</label>
													<div class="col-sm-2">
														<input type="text" id="from" name="from" class="from form-control input-sm">
													</div>
													<label class="col-sm-1 control-label">Đến:</label>
													<div class="col-sm-2">														
														<input type="text" id="to" name="to" class="to form-control input-sm">
													</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<table class="user-sale-details table table-striped table-bordered">
										<thead style="background-color: #428CCC;">
											<tr>
												<td>Tên</td>
												<td>Email</td>
												<td>Số điện thoại</td>
												<td>Địa chỉ</td>												
												<td>Doanh thu</td>
											</tr>
										</thead>	
										<tbody></tbody>					
										<tfoot>
											<tr>
												<td>Tên</td>
												<td>Email</td>
												<td>Số điện thoại</td>
												<td>Địa chỉ</td>												
												<td>Doanh thu</td>
											</tr>
										</tfoot>						
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- END USER SALE REPORT DETAILS -->
						<!-- START SERVICE SALE REPORT DETAILS -->
						<div id="service-sale-details" class="tab-pane">
							<div class="">
								<div class="row">
									<div class="col-xs-12">
										<div class="control">
											<div class="form-horizontal" role="form">
												<div class="form-group">
													<label class="col-sm-7 control-label">Từ ngày</label>
													<div class="col-sm-2">
														<input type="text" id="service_sale_from" name="from" class="form-control input-sm">
													</div>
													<label class="col-sm-1 control-label">Đến:</label>
													<div class="col-sm-2">														
														<input type="text" id="service_sale_to" name="to" class="form-control input-sm">
													</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<table class="service-sale-details table table-striped table-bordered">
										<thead style="background-color: #428CCC;">
											<tr>
												<td>Tên dịch vụ</td>
												<td>Tên địa điểm</td>
												<td>Số điện thoại</td>
												<td>Địa chỉ</td>
												<td>Doanh thu</td>
											</tr>
										</thead>	
										<tbody></tbody>					
										<tfoot>
											<tr>
												<td>Tên dịch vụ</td>
												<td>Tên địa điểm</td>
												<td>Số điện thoại</td>
												<td>Địa chỉ</td>
												<td>Doanh thu</td>
											</tr>
										</tfoot>						
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- END SERVICE DETAILS -->
					</div>						
				</div>
			</div>
			<!-- END sale REPORT -->
		</div>
	</div>
</div>