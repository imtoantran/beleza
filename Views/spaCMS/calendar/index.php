<div id="calendar-holder" class="content-holder type-appointment">
	<div class="section-aside has-upgrade-note">
		<div class="calendar-wrapper">
			<div class="calendar-buttons">
				<div class="redeem-evoucher-box">
					<button id="redeem" class="button button-primary redeem" type="button">
						<div class="button-inner">
							<div class="button-icon icons-voucher"></div>
							Xác thực Evoucher
						</div>
					</button>
				</div>
			</div><!-- END redeem-evoucher-box -->


		</div>

		<div class="b-upgrade-blocks">
			<div class="info-block listing-upgrade-block b-to-premium calendar-note">
				<div class="info-block-inner">
					<h2>Ghi chú:</h2>
					<ul class="list-unstyled">
						<li><i class="fa fa-square past-day"></i> Ngày quá khứ</li>
						<li><i class="fa fa-square to-day"></i> Ngày hôm nay</li>
						<li><i class="fa fa-square future-day"></i> Ngày tương lai</li>
						<li><i class="fa fa-square event-appointment"></i> Lịch hẹn </li>
						<li><i class="fa fa-square event-booking"></i> Lịch book online </li>
						<li><i class="fa fa-square event-request-change"></i> Lịch book đang chờ đổi</li>
						<li><i class="fa fa-check text-success"></i> Lịch đã xác thực</li>
					</ul>
					<button type="button" class="button button-basic hidden button-flexible upgrade-to-premium"><div class="button-inner"><div class="button-icon icons-upgrade2"></div>Find out more</div></button>
				</div>
			</div>
		</div>
	</div><!-- END Side bar -->


	<!-- Section Main -->
	<div class="section-main">
		<div class="calendar-pane">
			<div class="calendar-main-header">
				<div class="calendar-search top-search">
					<div class="txt-input">
						<input type="text" placeholder="Search: client, phone#, order#..." id="calendar_search" name="calendar_search" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
						<a class="clear-search display_none" href="#" ><div class="icons-clear-search-mini"></div></a>
						<div class="search_loader loading" ></div>
					</div>
					<ul id="search_results" class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all search-results" role="listbox" aria-activedescendant="ui-active-menuitem" style="top: 23px; left: 1px; display: none; z-index: 1000; max-height: 286px;">
						<li class="ui-menu-item" role="menuitem">
							<a href="#" class="ui-corner-all" tabindex="-1">
								<span class="icon fa fa-font"></span>
								<span class="is_confirm fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x "></i>
									<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
								</span>
								<span class="is_done fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
								</span>
								<span class="name">0903676222</span>
								<span class="info phone">+84 90 367 62 22</span>
								<span class="info">04/12/2014 - 08:30</span>
								<span class="info">BKc8398c85b0</span>
								<span class="info">Massage mặt làm móng chân và móng tay</span>
							</a>
						</li>
						<li class="ui-menu-item" role="menuitem">
							<a href="#" class="ui-corner-all" tabindex="-1">
								<span class="icon fa fa-bold"></span>
								<span class="is_confirm fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
								</span>
								<span class="is_done fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
								</span>
								<span class="name">Lê Trọng Lợi</span>
								<span class="info phone">+84 90 367 62 22</span>
								<span class="info">04/12/2014 - 08:30</span>
								<span class="info">Massage mặt làm móng chân và móng tay</span>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div><!-- END Calendar Pane -->

		<div class="form-content">
			<div id='script-warning'>
				<!-- <code>php/get-events.php</code> must be running. -->
				Mất kết nối với máy chủ.
			</div>

			<div id='loading' class="search-loader"> loading...</div>

			<!-- CALENDAR -->
			<div id='calendar'></div>
		</div>

		<div class="sync-button" id="employee-ext-calendar-sync">
			<button title="Click to update availabilities from external calendar" class="button button-basic no-txt btnAct_refresh_calendar" type="button">
				<div class="button-inner">
					<div class="button-icon icons-sync"></div>
				</div>
			</button>
		</div>
	</div>
</div>


<!-- Modal redeemVoucher_modal-->
<div id="redeemVoucher_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-voucher-redemption" aria-hidden="true">
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">
			<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
				<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
					<span class="ui-dialog-title" id="ui-dialog-title-voucher-redemption">Xác thực Evoucher</span>
					<a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"> <span class="ui-icon ui-icon-closethick">close</span> </a>
				</div>
				<div id="voucher-redemption" class="ui-dialog-content ui-widget-content" scrolltop="0" scrollleft="0">
					
					<div class="voucher-search">
						<form id="redeemVoucher_form" action="#" method="POST">
							<div class="icon icons-logo-vouchers"></div>

							<div class="reference-container txt-input txt-input-big">
								<input id="e_voucher_id" name="e_voucher_id" class="required evoucher-code valid"  type="text" />
								<div class="clear-search">
									<div class="icons-delete3"></div>
								</div>
							</div>
							<button class="button action action-default button-primary find-action" type="submit">
								<div class="button-inner">
									<span class="msg msg-action-default">Xác thực</span>
									<span class="msg msg-action-doing">Searching...</span>
								</div>
							</button>
						</form>
					</div>
					
					<div class="voucher-redemption-wrapper">
						<div class="voucher-note voucher-start" style="position: relative;">
							<div class="voucher-note-inner vertically-centered" style="position: absolute; height: 101px; top: 50%; margin-top: -50.5px;">
								<p class="main-title">
									Vui lòng nhập mã Evoucher 
								</p>
								<ul class="simple-list">
									<li>
										Mã evoucher sẽ được gửi tới email sau khi khách hàng booking thành công.
									</li>
									<li>
										Chỉ xác thực evoucher.
									</li>
								</ul>
							</div>
						</div>
						<!-- Seaching... -->
						<div class="voucher-note voucher-searching display_none">
							<div align="center" class="voucher-note-inner vertically-centered">
								<div class="fa fa-spin fa-3x fa-cog"></div>
								Searching...
							</div>
						</div><!-- end Seaching... -->

						<div class="voucher-note voucher-not-found display_none">
							<div class="voucher-note-inner vertically-centered">
								Không tìm thấy evoucher
								<span>Vui lòng kiểm tra lại và nhập mã evoucher một cách chính xác.</span>
							</div>
						</div>
						<div class="voucher-note voucher-belongs display_none">
							<div class="voucher-note-inner vertically-centered">
								Voucher belongs to another venue
								<span><a class="login-link" target="_blank" href="/login?route=%2Fhome">Do you want to login as different user?</a></span>
							</div>
						</div>

						<div class="voucher-info display_none">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th class="active">Tên KH</th>
										<td class="client_name"></td>
									</tr>
									<tr>
										<th class="active">Sđt KH</th>
										<td class="client_phone"></td>
									</tr>
									<tr>
										<td class="active">Booking ID</td>
										<td class="booking_id"></td>
									</tr>
									<tr>
										<td class="active">Dịch vụ</td>
										<td class="user_service_name"></td>
									</tr>
									<tr>
										<td class="active">Mệnh giá</td>
										<td class="e_voucher_price"></td>
									</tr>
									<tr>
										<td class="active">Ngày hết hạn</td>
										<td class="e_voucher_due_date"></td>
									</tr>

								</tbody>
							</table>
							<div class="meta-wrapper">
								Status:
								<!-- <span class="evoucher-order-ref "></span> -->
								<span class="status status-unpaid e_voucher_status_1 display_none">Đã được sử dụng</span>
								<span class="status-prepaid label label-confirmed e_voucher_status_0 display_none">Chưa sử dụng</span>
							</div>
							<div class="venue-wrapper hidden">
								<form novalidate="novalidate">
									<table cellspacing="0" cellpadding="0" class="default-form ">
										<tbody>
											<tr class="form-row">
												<td class="label-part"><label for="voucher-redemption-venue-id">Redeem at this venue:</label></td>
												<td class="input-part evoucher-venue-container"></td>
											</tr>
										</tbody>
									</table>
								</form>
							</div>
						</div>
						<div class="message-wrapper message-valid voucher-redeem-success display_none">
						<div class="message">
							<span class="v-message-title">Xác nhận evoucher thành công!</span>
							<span class="payment-date b-payment-date v-payment-date"></span>
						</div>
					</div>
					</div>
					
					<div class="dialog-actions">
						<!-- <button class="button action action-default button-primary redeem-another " type="button">
							<div class="button-inner">
								<div class="button-icon icons-voucher"></div>
								Redeem another
							</div>
						</button> -->
						<button class="button action-default button-primary redeem-action" type="button" style="display:none;">
							<div class="button-inner">
								<div class="button-icon icons-voucher done"></div>
								<div class="button-icon fa fa-spin fa-refresh loading"></div>
								Sử dụng Evoucher
							</div>
						</button>
						<!-- <button class="button button-primary a-create-appointment " type="button">
							<div class="button-inner">
								<div class="button-icon icons-plus"></div>
								Book an appointment
							</div>
						</button> -->
						<a class="button-cancel a-cancel" data-dismiss="modal" href="javascript:;">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Modal confirmedAppointment_modal-->
<div id="confirmedAppointment_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix status-scheduled">
                    <span id="ui-dialog-title-1" class="ui-dialog-title">LỊCH HẸN</span>
                    <a role="button" class="ui-dialog-titlebar-close ui-corner-all" href="#">
                        <span class="ui-icon ui-icon-closethick" data-dismiss="modal">close</span>
                    </a>
                </div>   
                <div scrollleft="0" scrolltop="0" class="ui-dialog-content ui-widget-content">
                    <div class="calendar-appointment-wrapper">
                        <div class="dialog-content">
                            <div class="form-intro warning hidden">
                                <div class="icon icons-attention"></div>
                                <p>
                                    <span class="warning-title">Please assign employee for this appointment</span>
                                </p>
                            </div>
                            <div class="clearfix appointment-info">
                                <div class="calendar-time">
                                    <div class="weekday">Thứ </div>
                                    <div class="day">ngày</div>
                                    <div class="year-month">
                                        Tháng <span class="month">8</span>, <span class="year">2014</span>
                                    </div>
                                    <div class="time">13:00</div>
                                </div>
                                <div class="title-and-sku">
                                    <div class="title user_service_name">Service name</div>
                                    <div class="sku hidden"></div>
                                </div>
                                <table class="default-data-table" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <th>Thời gian</th>
                                        <td><span class="user_service_duration">80 phút </span></td>
                                    </tr>
                                    <tr class="b-price">
                                        <th class="price">Giá</th>
                                        <td>
                                            <span class="v-price user_service_price">200,000 đ</span>
                                            <span class="status-prepaid label label-confirmed display_none" style="display: none;">Đã thanh toán</span>
                                            <span class="status status-unpaid display_none" style="display: none;">Chưa thanh toán</span>
                                            <span class="status-paid label label-confirmed display_none" style="display: none;">Thanh toán tại spa</span>
                                            <span class="b-status status status-discounted hidden">status discounted</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Xác thực</th>
                                        <td>
                                        	<span class="label label-confirmed is_confirm_1 display_none">Đã xác thực</span>
                                        	<span class="label label-critical is_confirm_0 display_none">Chưa xác thực</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><span class="label label-confirmed status-complete display_none">Hoàn thành</span>
                                        	<span class="status status-uncomplete display_none">Chưa hoàn thành</span>
                                        	<span class="label label-critical status-cancel display_none">Đã hủy</span>
                                        </td>
                                    </tr>
                                    
                                </tbody></table>
                                <div class="appointment-actions">
                                    <button type="button" class="button button-primary accept-action">
                                    	<div class="button-inner"><div class="button-icon icons-tick5">
                                    	</div>Accept</div>
                                    </button>
                                    <button type="button" class="button button-attention smart-reschedule-action hidden">
                                    	<div class="button-inner">
                                    		<div class="button-icon icons-edit2"></div>
                                    		Smart reschedule
                                    	</div>
                                    </button>
                                    <button type="button" class="button button-secondary reject-action">
                                    	<div class="button-inner">
                                    		<div class="button-icon icons-reject2"></div>
                                    		Reject
                                    	</div>
                                    </button>
                                </div>
                            </div>
                            <div class="appointment-notes has-notes display_none">
                                <span class="notes-title">Ghi chú lịch hẹn:</span>
                                <span class="notes v-notes">
                                </span>
                                <div class="wahanda-notes b-verification-notes">
                                    <span class="icon icons-attention-small2"></span>
                                    <span class="notes-title hidden">Notes from Beleza:</span>
                                    <span class="notes v-verification-notes"></span>
                                </div>
                            </div>
                            <div class="client-info clearfix">
                                <div class="icons-customer"></div>
                                <ul class="person-info">
                                    <li class="person-name">
                                        <a href="javascript:;" class="a-view-consumer">
                                        	<span class="client_name">0903676222</span>
                                        </a>
                                        <a href="javascript:;" class="edit-link a-rebook hidden">
                                            Rebook
                                        </a>
                                    </li>
                                    <li class="consumer-phone-row">
                                        <div class="icon icons-phone"></div>
                                        <span class="consumer-phone client_phone">+84 90 367 62 22</span>
                                    </li>
                                    <li class="consumer-email-row">
                                        <div class="icon icons-email"></div>
                                        <a class="consumer-email client_email" href="mailto:vietnt134@gmail.com">vietnt134@gmail.com</a>
                                    </li>
                                </ul>

                                <div class="client-note">
                                    <span class="note-wrapper v-note client_note"></span>
                                    <div class="icons-note-tip2"></div>
                                </div>
                            </div>
                            <div class="appointment-meta">
                                Đặt lúc: <span class="full-date appointment_created">19/08/2014, 13:40</span>
                                <!-- - -->
                                <span class="separator">|</span>
                                Sửa đổi lúc: <span class="full-date appointment_updated">19/08/2014, 13:40</span>
                                <div class="hidden">
                                	<span class="separator">|</span>
                                	Source:<span class="source">Added in Connect by minhnhat</span>
                                </div>
                                
                                <span class="order-ref-part hidden">
                                    <span class="separator">|</span>
                                    Order ref#: <a href="javascript:;" class="order-ref">null</a>
                                </span>
                                <div class="b-evoucher-ref hidden">
                                    Created by using eVoucher: <a href="javascript:;" class="v-evoucher-ref"></a>
                                </div>
                            </div>
                        </div>
                        <div class="dialog-actions b-standard-actions">
                            <div><button type="button" class="button button-primary confirm_appointment_action">
                            	<div class="button-inner">
                            		<div class="button-icon icons-tick done"></div>
                            		<div class="button-icon fa fa-spin fa-refresh loading"></div>
	                            	Xác thực
	                            </div>
                            </button></div>
                            <div><button type="button" class="button button-edit change-only-this edit_appointment_action">
                                <div class="button-inner">
                                	<div class="button-icon icons-edit2 done"></div>
                                	<div class="button-icon fa fa-spin fa-refresh loading"></div>
                                	Sửa / Xếp lại lịch
                                </div>
                            </button></div>
                            <button type="button" class="button a-no-show button-secondary delete-action hidden">
                            	<div class="button-inner">
                            		<div class="button-icon icons-no-show"></div>
                            		No show
                            	</div>
                            </button>
                            <button type="button" class="button button-other a-checkout complete_appointment_action">
                            	<div class="button-inner">
                            		<div class="button-icon icons-tick done"></div>
                            		<div class="button-icon fa fa-spin fa-refresh loading"></div>
                            		Đã hoàn thành
                            	</div>
                            </button>
                            <button type="button" class="button action action-default a-delete button-secondary delete_appointment_action" >
                            	<div class="button-inner">
                            		<div class="button-icon icons-delete done"></div>
                            		<div class="button-icon fa fa-spin fa-refresh loading"></div>
                            		<span class="msg msg-action-default">Hủy lịch hẹn</span>
                            	</div>
                            </button>
                            <div class="sub-actions">
                                <a href="javascript:;" class="button-cancel" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div><!-- END confirmedAppointment_modal-->


<!-- Modal editConfirmedAppointment_modal-->
<div id="editConfirmedAppointment_modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ui-dialog-title-appointment-dialog">
    <div class="modal-dialog" style="width: 615px;">
        <div class="modal-content">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                    <span id="ui-dialog-title-appointment-dialog" class="ui-dialog-title">Appointment</span>
                    <a role="button" class="ui-dialog-titlebar-close ui-corner-all" href="#">
                        <span class="ui-icon ui-icon-closethick">close</span>
                    </a>
                </div>
                <div scrollleft="0" scrolltop="0" class="ui-dialog-content ui-widget-content" id="appointment-dialog">
                <form id="editConfirmedAppointment_form" action="#" method="POST">
                	<input type="hidden" name="data_id" />
                	<input type="hidden" name="data_type" />
                	<input type="hidden" name="client_email" />
                	<input type="hidden" name="appointment_date" />
                    <input type="hidden" name="appointment_price" />
                    <input type="hidden" name="appointment_time_start" /> 
                    <input type="hidden" name="appointment_time_end" /> 
                    <input type="hidden" name="user_openHour" />
                    <input type="hidden" name="user_closeHour" />

                    <div class="dialog-content clearfix">
                        <table class="default-form part-one" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr class="form-row client-select">
                                    <td class="label-part">
                                        <label for="">Khách hàng</label>
                                    </td>
                                    <td class="input-part b-consumer">
                                        <!-- search -->
                                        <div class="txt-input b-consumer-autocomplete hidden">
                                            <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" id="consumer-block-search" name="consumer-block-search" class="ui-autocomplete-input" placeholder="Search by phone number or name" type="text">
                                            <input id="consumer-block-anonymous-comment" class="hidden" placeholder="Walk-in comment" type="text">
                                        </div>
                                        <!-- end search -->
                                        <!-- client -->
                                        <ul class="person-info b-person-info">
                                            <li class="person-name">
                                                <span class="b-consumer-name">
                                                    <a href="javascript:;" class="f-consumer-name a-show-customer client_name">0903676222</a>
                                                </span>
                                                <a href="javascript:;" class="edit-link a-consumer-edit edit_client_action">Sửa</a><i class="fa fa-spin fa-refresh e-loading"></i>
                                                <a style="display: none;" href="javascript:;" class="edit-link a-change-consumer">Change client</a>
                                            </li>
                                            <li class="consumer-phoneNumber-row b-consumer-phone">
                                                <div class="icon icons-phone"></div>
                                                <span class="v-consumer-phone client_phone">+84 90 367 62 22</span>
                                            </li>
                                            <li style="display: list-item;" class="consumer-email-row b-consumer-email">
                                                <div class="icon icons-email"></div>
                                                <span class="v-consumer-email client_email"></span>
                                            </li>
                                            <li class="consumer-note-row b-customer-note">
                                                <div class="client-note">

                                                    <span class="note-wrapper v-customer-note client_note">hello</span>

                                                    <div class="icons-note-tip2"></div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- end client -->
                                        <!-- buttons -->
                                        <div class="client-buttons b-consumer-buttons hidden">
                                            <button type="button" class="button button-basic button-mini a-new-consumer"><div class="button-inner"><div class="button-icon icons-plus4"></div>Create new</div></button>
                                            <button type="button" class="button button-basic button-mini a-walk-in"><div class="button-inner"><div class="button-icon icons-walkin"></div>Walk-in</div></button>
                                        </div>
                                        <!-- end buttons -->
                                        <!-- walkin -->
                                        <div class="client-walkin b-walkin hidden">
                                            <a href="javascript:;" class="edit-link a-change-consumer">Change client</a>
                                            <span class="walkin-status"><span class="icon icons-walkin2"></span> Walk-in</span>
                                        </div>
                                        <!-- end walkin -->
                                    </td>
                                </tr>

                                <tr class="form-row b-service-not-exist form-element-wrapper display_none">
                                    <td class="label-part"></td>
                                    <td class="input-part">
                                        <div class="form-note">
                                            <span class="icon icons-attention-small2"></span>
                                            <span class="notes">Spa không làm việc vào ngày này, hãy chọn ngày khác.</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="form-row appointment-service form-element-wrapper">
                                    <td class="label-part">
                                        <label for="appointment-offerId">Dịch vụ</label>
                                    </td>
                                    <td class="input-part">
                                        <select id="list_gus" class="v-appointment-service required select2 list_gus" name="user_service_service_id" required title="Trước tiên, bạn hãy chọn loại dịch vụ.">
                                        	<option value="">Chọn dịch vụ</option>
											<!-- List service system -->

                                        </select>
                                    </td>
                                </tr>
                                <tr class="form-row form-element-wrapper">
                                    <td class="label-part">
                                        <label for="appointment_date">Ngày</label>
                                    </td>
                                    <td class="input-part">
                                        <input class="input appointment_date" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" readonly="readonly">

                                        <span class="vus_time_start">Bắt đầu lúc: <span class="user_service_time_start">00:00</span></span>

                                        <span style="font-style: italic;">. Chọn giờ khác</span>
                                        <select class="required appointment_time_start">
                                            <option value="">Chọn giờ</option>
                                        </select>
                                        <span class="block-note b-rescheduled hidden">
                                            <input class="" id="rescheduled-block-old-time" type="checkbox">
                                            <label for="rescheduled-block-old-time">Block out original appointment time</label>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="form-row">
                                    <td class="label-part">
                                        <label for="cv-appointment-duration">Thời gian</label>
                                    </td>
                                    <td class="input-part">
                                        <span class="user_service_duration">00</span> phút.
                                        <span class="help-txt">Kết thúc lúc <span class="appointment_time_end">00:00</span></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="default-form part-two" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr class="form-row">
                                    <td class="label-part">
                                        <label class="optional" for="appointment-notes">Ghi chú </label><br>
                                        <button type="button" class="btnEdit_appointment_note" title="Cập nhật ghi chú lịch hẹn">
                                        	<i class="fa fa-save done"></i>
                                        	<i class="fa fa-spin fa-rotate-right loading"></i>
                                        </button>
                                    </td>
                                    <td class="input-part">
                                        <textarea rows="6" cols="5" class="full" id="appointment-notes" name="appointment_note"></textarea>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="b-evoucher-redemption-note hidden">
                            <div class="form-note">
                                <span class="icon icons-attention-small2"></span>
                                <span class="notes">Creating this appointment will lock the eVoucher. Make sure the customer understands that they will not be able to redeem it again.</span>
                            </div>
                        </div>
                        <div class="b-reschedule-note hidden">
                            <div class="form-note">
                                <span class="icon icons-attention-small2"></span>
                                <span class="notes">Please ensure that you have contacted the customer and confirmed that they are happy with the rescheduled time slot.</span>
                            </div>
                        </div>
                    </div>
                    <div class="dialog-actions">
                        <button type="submit" class="button action action-default button-primary save-action">
                            <div class="button-inner">
                                <div class="button-icon icons-tick done"></div>
                                <div class="button-icon fa fa-spin fa-refresh loading"></div>
                                <span class="msg msg-action-default">Lưu</span>
                            </div>
                        </button>
                        <button type="button" class="button action action-default button-primary save-action hidden">
                            <div class="button-inner">
                                <div class="button-icon icons-tick done"></div>
                                <div class="button-icon fa fa-spin fa-refresh loading"></div>
                                <span class="msg msg-action-default">Lưu và gửi mail khách hàng</span>
                            </div>
                        </button>
                        <a href="javascript:;" class="button-cancel" data-dismiss="modal">Hủy</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div> 
</div><!-- END editConfirmedAppointment_modal-->


<!-- Modal editClient_modal-->
<div id="editClient_modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ui-dialog-title-4">
    <div class="modal-dialog" style="width: 460px;">
        <div class="modal-content">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                    <span id="ui-dialog-title-4" class="ui-dialog-title">Khách hàng</span>
                    <a role="button" class="ui-dialog-titlebar-close ui-corner-all" href="#">
                        <span class="ui-icon ui-icon-closethick">close</span>
                    </a>
                </div>
                <div scrollleft="0" scrolltop="0" class="client-info-dialog ui-dialog-content ui-widget-content">
                <form id="editClient_form" action="#" method="POST" class="edit-mode">
                	<input type="hidden" name="data_id" />
                	<input type="hidden" name="data_type" />

                    <div class="dialog-content clearfix">
                        <table class="default-form part-one" cellpadding="0" cellspacing="0">
                            <tbody><tr class="form-row client-name-row">
                                <td class="label-part">
                                    <label for="client_name">Tên</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input txt-input-big">
                                        <input name="client_name" id="client_name" class="required valid" type="text">
                                        <!-- <i class="fa fa-spin fa-refresh"></i>
                                        <ul class="results_client_name">
                                        	<li class="result_item">Trọng Lợi</li>
                                        </ul> -->
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part">
                                    <label for="client_phone">Điện thoại</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input">
                                        <input name="client_phone" id="client_phone" class="required phone-by-country" type="tel">
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part">
                                    <label class="optional" for="client_email">Email</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input">
                                        <input name="client_email" id="client_email" class="email" type="email">
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row hidden">
                                <td class="label-part"></td>
                                <td class="input-part">
                                    <input class="" name="client_sendMassEmails" id="client_sendMassEmails" type="checkbox">
                                    <label class="help-txt optional" for="client_sendMassEmails">Đồng ý nhận email thông báo lịch hẹn</label>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part">
                                    <label class="optional">Giới tính</label>
                                </td>
                                <td class="input-part">
                                    <div class="several">
                                        <input class="" name="client_sex" id="client_sex-female" value="0" type="radio">
                                        <label for="client_sex-female">Nữ</label>

                                        <input class="" name="client_sex" id="client_sex-male" value="1" type="radio">
                                        <label for="client_sex-male">Nam</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row hidden">
                                <td class="label-part">
                                    <label class="optional" for="client_birth">Ngày sinh</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input txt-input-mini">
                                        <input name="client_birthDay" pattern="\d*" id="client_birthDay" class="digits" require-with="#client_birthMonth" min="1" max="31" placeholder="day" type="number">
                                    </div>
                                    <!-- <div class="txt-input txt-input-mini"> -->
                                    <select class="" name="client_birthMonth" id="client_birthMonth"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option><option value="">Month</option></select>
                                    <!-- </div> -->
                                    <a href="javascript:;" class="edit-link a-show-year hidden">Set year</a>
                                    <div class="txt-input txt-input-mini b-birthYear">
                                        <input name="client_birthYear" pattern="\d*" id="client_birthYear" class="digits birthyear" placeholder="year" maxlength="4" type="number">
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row hidden">
                                <td class="label-part">
                                    <label class="optional" for="client_birth">Ngày sinh</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input">
                                        <input id="client_birth" type="date" name="client_birth" placeholder="Ngày tháng năm sinh">
                                    </div>
                                </td>
                            </tr>
                        </tbody></table>
                        <table class="default-form part-two" cellpadding="0" cellspacing="0">
                            <tbody><tr class="form-row">
                                <td class="label-part">
                                    <label class="optional" for="client_notes">Ghi chú</label>
                                </td>
                                <td class="input-part">
                                    <textarea rows="6" cols="5" class="full" id="client_notes" name="client_note"></textarea>
                                </td>
                            </tr>

                        </tbody></table>
                    </div>
                    <div class="dialog-actions">
                        <button type="submit" class="button action action-default button-primary save-action">
                            <div class="button-inner">
                                <div class="button-icon icons-tick done"></div>
                                <div class="button-icon fa fa-spin fa-refresh loading"></div>
                                <span class="msg msg-action-default">Lưu</span>
                            </div>
                        </button>
                        <a href="javascript:;" class="button-cancel" data-dismiss="modal">Hủy</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- END editClient_modal-->


<!-- Modal addAppointment_modal-->
<div id="addAppointment_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ui-dialog-title-appointment-dialog">
    <div class="modal-dialog" style="width: 615px;">
        <div class="modal-content">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                    <span id="ui-dialog-title-appointment-dialog" class="ui-dialog-title">LÊN LỊCH HẸN</span>
                    <a role="button" class="ui-dialog-titlebar-close ui-corner-all" href="#">
                        <span class="ui-icon ui-icon-closethick">close</span>
                    </a>
                </div>
                <div scrollleft="0" scrolltop="0" class="ui-dialog-content ui-widget-content" id="appointment-dialog">
                <form id="addAppointment_form" action="#" method="POST">
                	<input type="hidden" name="appointment_price">
                	<input type="hidden" name="appointment_date" />
                    <input type="hidden" name="user_openHour" />
                    <input type="hidden" name="user_closeHour" />
                    <input type="hidden" name="appointment_time_end">

                    <div class="dialog-content clearfix">
                        <table class="default-form part-one" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr class="form-row client-select">
                                    <td class="label-part">
                                        <label for="">Khách hàng</label>
                                    </td>
                                    <td class="input-part b-consumer">
                                        <!-- client -->
                                        <div class="col-md-6" style="padding:0;">
                                        	<i class="fa fa-spin fa-refresh search_a_client_name loading"></i>
                                        	<input id="appointment_client_name" type="text" name="appointment_client_name" placeHolder="Tên khách hàng" autocomplete="off">
                                        	<div id="results_search_a_client_name">
                                        		<ul class="display_none" style="max-height: 111px; overflow: auto;">
													
												</ul>
                                        	</div>

                                        	<div class="icon icons-phone"></div>
                                        	<input type="text" name="appointment_client_phone" placeHolder="Số điện thoại">
                                        	<div class="icon icons-email"></div>
                                        	<input type="text" name="appointment_client_email" placeHolder="Email khách hàng">
                                        </div>
                                        <div class="col-md-6" style="padding:0;">
                                        	<div class="client-note">
                                                <textarea name="appointment_client_note" class="form_control" placeHolder="Ghi chú" rows="7" cols="30"></textarea>
                                            </div>
                                        </div>
                                        <!-- end client -->
                                        <!-- buttons -->
                                        <div class="client-buttons b-consumer-buttons hidden">
                                            <button type="button" class="button button-basic button-mini a-new-consumer"><div class="button-inner"><div class="button-icon icons-plus4"></div>Create new</div></button>
                                            <button type="button" class="button button-basic button-mini a-walk-in"><div class="button-inner"><div class="button-icon icons-walkin"></div>Walk-in</div></button>
                                        </div>
                                        <!-- end buttons -->
                                        <!-- walkin -->
                                        <div class="client-walkin b-walkin hidden">
                                            <a href="javascript:;" class="edit-link a-change-consumer">Change client</a>
                                            <span class="walkin-status"><span class="icon icons-walkin2"></span> Walk-in</span>
                                        </div>
                                        <!-- end walkin -->
                                    </td>
                                </tr>

                                <tr class="form-row b-service-not-exist form-element-wrapper hidden">
                                    <td class="label-part"></td>
                                    <td class="input-part">
                                        <div class="form-note">
                                            <span class="icon icons-attention-small2"></span>
                                            <span class="notes">Service on eVoucher is no longer available. Select another service.</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="form-row appointment-service form-element-wrapper">
                                    <td class="label-part">
                                        <label for="list_gus">Dịch vụ</label>
                                    </td>
                                    <td class="input-part">
                                        <select id="list_gus" class="v-appointment-service required select2 list_gus" name="user_service_service_id" data-placeholder="Vui lòng chọn loại dịch vụ" required title="Trước tiên, bạn hãy chọn loại dịch vụ.">
                                        	<option value="">Chọn loại dịch vụ</option>
											<!-- List service system -->

                                        </select>
                                    </td>
                                </tr>
                                <tr class="form-row form-element-wrapper">
                                    <td class="label-part">
                                        <label for="appointment_date">Ngày</label>
                                    </td>
                                    <td class="input-part">
                                        <input class="appointment_date" type="text" readonly="true" style="width:90px; padding:0 5px;">

                                        Bắt đầu lúc: 
                                        <select name="appointment_time_start" class="required appointment_time_start">
                                            <option >00:00</option>
                                        </select>
                                        <span class="block-note b-rescheduled hidden">
                                            <input class="" id="rescheduled-block-old-time" type="checkbox">
                                            <label for="rescheduled-block-old-time">Block out original appointment time</label>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="form-row">
                                    <td class="label-part">
                                        <label for="cv-appointment-duration">Thời gian</label>
                                    </td>
                                    <td class="input-part">
                                        <span class="user_service_duration">00</span> phút.
                                        <span class="help-txt">Kết thúc lúc <span class="appointment_time_end">00:00</span></span> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="default-form part-two" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr class="form-row">
                                    <td class="label-part">
                                        <label class="optional" for="appointment_note">Ghi chú </label>
                                    </td>
                                    <td class="input-part">
                                        <textarea rows="6" cols="5" class="full" id="appointment_note" name="appointment_note"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="b-evoucher-redemption-note hidden">
                            <div class="form-note">
                                <span class="icon icons-attention-small2"></span>
                                <span class="notes">Creating this appointment will lock the eVoucher. Make sure the customer understands that they will not be able to redeem it again.</span>
                            </div>
                        </div>
                        <div class="b-reschedule-note hidden">
                            <div class="form-note">
                                <span class="icon icons-attention-small2"></span>
                                <span class="notes">Please ensure that you have contacted the customer and confirmed that they are happy with the rescheduled time slot.</span>
                            </div>
                        </div>
                    </div>
                    <div class="dialog-actions">
                        <button type="submit" class="button action action-default button-primary save-action">
                            <div class="button-inner">
                                <div class="button-icon icons-tick done"></div>
                                <div class="button-icon fa fa-spin fa-refresh loading"></div>
                                <span class="msg msg-action-default">Thêm lịch hẹn</span>
                            </div>
                        </button>
                        <a href="javascript:;" class="button-cancel" data-dismiss="modal">Hủy</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div> 
</div><!-- END addConfirmedAppointment_modal-->