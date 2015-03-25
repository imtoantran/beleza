

<div class="container">
    <!--Background dialog-->
    <div id="back-dialog" class="model fade" style="margin: 0 auto;">
        <div class="text-center modal-dialog" style="z-index: 1041;">
            <i class="fa fa-spin fa-refresh fa-4x text-center" style="color:#FFCC00; position: fixed"></i>  
            <div class="fa fa-2x text-center" style="color:#FFCC00; position: fixed; margin: 70px 0px 0px -35px;"> Đang xử lý...</div>
        </div>
        <div class="clearfix"></div>
    </div>
    
	<!-- Booking detail -->
	<div class="row">
            <div class="col-md-12 thumbnail" style="border-radius: 0px">
                <h4 class="text-center" style="color: #FFCC00"><i class="fa fa-shopping-cart"></i><b> CHI TIẾT GIỎ HÀNG</b></h4>
                <div class="table-responsive">
                    <table id="table_payment_detail" class="table table-responsive">
                        <tr>
                            <th  style="border: none">DỊCH VỤ</th>
                            <th  style="border: none">NGÀY - GIỜ</th>
                            <th  style="border: none">GIÁ</th>
                            <th  style="border: none">SỐ LƯỢNG</th>
                            <th  style="border: none">TỔNG TIỀN</th>
                        </tr>
                        <tr>
                        	<td colspan="5"><button class="btn btn-orange">Bạn còn</button>></td>
                        </tr>
                    </table>
                </div>
            </div>
	</div>
	<!--End booking detail -->
	<div class="row">
		<!-- Payment -->
		<div class="col-md-7">
			<h4 style="color: #FFCC00"><i class="fa fa-credit-card"></i><b> THANH TOÁN</b></h4>
				<div class="container-fluid" id="payment-wrap">					
					<div class="row payment-quocte" style="margin-bottom: 35px; margin-top:7px;">
						<div class="col-md-4 text-center payment-item-wrap">
							<button class="btn payment-item-btn" onclick="makePayment('paypal')">
								<i class="fa fa-cc-paypal"></i>	
							</button>
							<div class="payment-title">
								Paypal Creadit
							</div>													
						</div>
						<div class="col-md-4 text-center payment-item-wrap">
							<button class="btn payment-item-btn" onclick="makePayment('paypal')">
								<i class="fa fa-cc-visa"></i>	
							</button>
							<div class="payment-title">
								Visa Creadit
							</div>													
						</div>
						<div class="col-md-4 text-center payment-item-wrap">
							<button class="btn payment-item-btn" onclick="makePayment('paypal')">
								<i class="fa fa-cc-mastercard"></i>	
							</button>
							<div class="payment-title">
								MasterCard Creadit
							</div>													
						</div>
					</div>

					<div class="row payment-noidia">
						<div class="col-md-4 text-center payment-item-wrap">
							<button class="btn payment-item-btn" onclick="makePayment('nganluong')">
								<img src="./public/assets/img/payments/nganluong.png"/>		
							</button>
							<div class="payment-title">
								Ví điện tử ngân lượng
							</div>													
						</div>
						<div class="col-md-4 text-center payment-item-wrap">
							<button class="btn payment-item-btn" onclick="makePayment('nganluong')">
								<img src="./public/assets/img/payments/atm.png"/>	
							</button>
							<div class="payment-title">
								Thẻ ATM nội địa
							</div>													
						</div>
						<div class="col-md-4 text-center payment-item-wrap">
						<!-- 	<button class="btn payment-item-btn" onclick="makePayment('paypal')">
								<img src="./public/assets/img/payments/visa-noidia.png"/>	
							</button>
							<div class="payment-title">
								MasterCard Creadit
							</div>	 -->												
						</div>						
					</div>
					
				</div>



			<!-- Credit Point Payment -->
			<!-- <div class="row">
				<div class="col-md-12">
					<button id="btn_online_payment" onclick="jumbToPaymentTab('online_payment')" class="btn btn-choose">
						Thanh toán online
					</button>
					<button id="btn_venue_payment" onclick="jumbToPaymentTab('venue_payment')" class="btn btn-orange">
						Thanh toán tại địa điểm
					</button>
					<button id="btn_point_payment" onclick="jumbToPaymentTab('point_payment')" class="btn btn-orange">
						Thanh toán bằng điểm
                        <a href="../../../../../Users/Admin/Desktop/tam/project_wahanda_alternative/Views/payment/index.php"></a>
					</button>
				</div>
			</div>
			<br />  -->
			<!-- Online Payment -->
			<!-- <div class="row"> -->
                <!-- PAYPAL -->
            <!--     <div id="online_payment" class="col-md-12">
                    <div style="background-color: #f7f7f7;">
                        <div class="form-horizontal">
                            
                            <div id="online-payment" class="row-fluid">
                                <div class="col-md-12 head-payment-online">
                                    <div class="text-left col-md-10 title-payment-online" onclick="toggleShowPayment('paypal')">                                                    
                                        <i class="fa fa-paypal"></i>
                                        Thanh toán bằng Paypal
                                    </div>
                                    <div class="col-md-2 text-right icon-payment-online">
                                        <i id="icon-plus-minus-paypal" class="fa fa-plus-square icon-payment-plus-minus" onclick="toggleShowPayment('paypal')"></i>
                                    </div>                                                    
                                </div>
                                
                                <div id="box-paypal" class="col-md-12 body-payment-online">                                                                                              
                                    <div class="col-md-6">                                                   
                                        <button onclick="makePayment('paypal')">
                                            Paypal Creadit &nbsp;
                                            <img src="./public/assets/img/payments/paypal.png"/>
                                               <form >
                                                   <input id="value-test" type="hidden" value="11111">
                                               </form> 
                                            
                                            
                                        </button>                                                   
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button onclick="makePayment('paypal')">
                                            Thẻ quốc tế &nbsp;
                                            <img src="./public/assets/img/payments/visa.png"/>
                                            <img src="./public/assets/img/payments/master.png"/>
                                        </button>                                                    
                                    </div>
                                </div>  

                                <div class="col-md-12 head-payment-online" >
                                    <div class="text-left col-md-10 title-payment-online" onclick="toggleShowPayment('nganluong')">                                                    
                                        <i class="fa fa-credit-card"></i>
                                        Thanh toán bằng Ngân lượng
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <i id="icon-plus-minus-nganluong" class="fa fa-plus-square icon-payment-plus-minus" onclick="toggleShowPayment('nganluong')"></i>
                                    </div>                                                    
                                </div>
                                
                                <div id="box-nganluong" class="col-md-12 body-payment-online">                                                                                              
                                    <div class="col-md-6">
                                        <button onclick="makePayment('nganluong')">
                                            Ví điện tử ngân lượng &nbsp;
                                            <img src="./public/assets/img/payments/nganluong.png"/>
                                        </button>                                                   
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button onclick="makePayment('nganluong')">
                                            Thẻ ATM nội địa &nbsp;
                                            <img src="./public/assets/img/payments/atm.png"/>
                                        </button>                                                    
                                    </div>
                                </div>
                            </div>                                                                                     
						</div>
					</div>
				</div>	 -->
							
				<!-- POINT PAYMENT -->
			<!-- 	<div id="point_payment" style="display: none;" class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div style="background-color: #f7f7f7; padding: 24px 12px 24px 12px;">
								<small style="font-size: 13px;">Bạn sẽ được tính tiền bằng điểm tích lũy mà bạn có được. </small>
								<br />
								<br />
								<small style="font-size: 13px;"><i>
									<b>Vui lòng đặt hẹn có trách nhiệm</b>. Thường thì các địa điểm là các doanh nghiệp 
									độc lập, vì vậy thực sự rất buồn khi bạn tự ý hủy một cuộc hẹn mà bạn đã đặt. 
									Chúng tôi biết kế hoạch của bạn có thể thay đổi, vì vậy nếu bạn 
									không thể thực hiện cuộc hẹn mà bạn đã đặt, xin vui lòng làm điều đúng đắn và 
									liên hệ cho địa điểm bạn hủy cuộc hẹn càng sớm càng tốt. 
									Nếu bạn tự ý hủy một cuộc hẹn không lý do, 
									bạn sẽ không được phép đặt bất cứ một cuộc hẹn nào trên <b>BELEZA</b>.
								</i></small>
								<br />
								<br />
								<small style="font-size: 13px;"><i>
									<b>Credit point: </b>điểm có được khi cuộc hẹn của bạn bị hủy ở địa điểm.
									<br />
									<b>Gift point: </b>điểm có được khi bạn viết đánh giá hay hoặc thành toán thành công.
								</i></small>
								<hr />
								<div class="row">
									<div class="col-md-12">
										<button id="btn_creditpoint_process_payment" onclick="processChecking(1)" class="btn btn-orange-black">
											<i id="waiting_for_creditpoint_payment" class="fa fa-refresh fa-spin" style="display: none;"></i> <i class="fa fa-credit-card"></i> Thanh toán bằng credit point
										</button>
										<button id="btn_giftpoint_process_payment" onclick="processChecking(2)" class="btn btn-orange-black">
											<i id="waiting_for_giftpoint_payment" class="fa fa-refresh fa-spin" style="display: none;"></i> <i class="fa fa-gift"></i> Thanh toán bằng gift point
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br />
				</div> -->
				<!-- END POINT PAYMENT -->
			<!-- </div> -->
			<!-- <br /> -->
		</div>
		<!-- End payment -->
		<!--Payer detail-->
		<div id="payer_info" class="col-md-5 thumbnail" style="border-radius: 0px">
			<h5 class="text-center" style="color: #FFCC00"><i class="fa fa-user"></i><b> THÔNG TIN KHÁCH HÀNG</b></h5>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Mã số khách hàng : </b>
					</p>
				</div>
				<div id="client_id" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Họ tên : </b>
					</p>
				</div>
				<div id="client_name" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Username : </b>
					</p>
				</div>
				<div id="client_username" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Email : </b>
					</p>
				</div>
				<div id="client_email" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Số điện thoại : </b>
					</p>
				</div>
				<div id="client_phone" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Tham gia : </b>
					</p>
				</div>
				<div id="client_join_date" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Credit point : </b>
					</p>
				</div>
				<div id="client_creditpoint" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<p>
						<b>Gift point : </b>
					</p>
				</div>
				<div id="client_giftpoint" class="col-md-6">
					<p>
						<i>...</i>
					</p>
				</div>
			</div>
		</div>
		<!--End payer detail-->
	</div>
</div>
<script>
	var PAYMENT_TYPE = '';
	// var CHECK_CREDIT = 0;
	// var CHECK_GIFT = 0;
</script>