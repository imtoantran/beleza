

<div id="header-2" class="clearfix" style="margin-bottom: 0px;">
	<div id="faq-1">
		<div class="container">
			<!-- <div class="col-xs-1">
				<img src="<?php echo ASSETS . 'img/message-icon.png' ?>" />
			</div> -->
			<div class="col-xs-12">
				<div class="faq-1-title">
					<a href="<?php echo URL . 'faq'; ?>">GÓC DIỄN ĐÀN</a>
				</div>
				<div class="faq-1-description">
					THAM KHẢO Ý KIẾN CỦA CHUYÊN GIA, ĐỌC CÁC BÀI VIẾT VỀ LÀM ĐẸP, CẬP NHẬT THÊM KIẾN THỨC CHO BẠN!
				</div>
			</div>
		</div>
	</div>
</div>



<div id="content-wrap" >
	<div class="container">
		<section>
			<div class="page-header" id="section-contact">
				<h2>Đặt câu hỏi.</h2>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<form id="askQuestion_form" action="#" method="POST" class="form-horizontal" >
						<div class="form-group">
							<label for="contact-name" class="col-lg-2 control-label">Câu hỏi</label>

							<div class="col-lg-10">
								<?php 
									if(isset($_SESSION['faq_title'])){
										echo '<input type="text" name="faq_title" class="form-control" id="contact-name" placeholder="Tóm lược câu hỏi" value="' . $_SESSION['faq_title'] . '">';
										// unset($_SESSION['faq_title']);
									} else {
										echo '<input type="text" name="faq_title" class="form-control" id="contact-name" placeholder="Tóm lược câu hỏi">';
									}
								?>
								
							</div>
						</div>
						<div class="form-group">
							<label for="contact-message" class="col-lg-2 control-label">Chi tiết hơn</label>

							<div class="col-lg-10">
								<textarea name="faq_content" id="contact-message" class="form-control" cols="30" rows="10" placeholder="Chi tiết hơn" required title="Nhập chi tiết câu hỏi"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="faq_tag" class="col-lg-2 control-label">Thể loại câu hỏi</label>

							<div class="col-lg-10">
								<!-- <select multiple="multiple" class="multi-select" id="faq_tag" name="faq_tag[]">
									<optgroup label="NFC EAST">
									<option>Dallas Cowboys</option>
									<option>New York Giants</option>
									<option>Philadelphia Eagles</option>
									<option>Washington Redskins</option>
									</optgroup>
									<optgroup label="NFC NORTH">
									<option>Chicago Bears</option>
									<option>Detroit Lions</option>
									<option>Green Bay Packers</option>
									<option>Minnesota Vikings</option>
									</optgroup>
									<optgroup label="NFC SOUTH">
									<option>Atlanta Falcons</option>
									<option>Carolina Panthers</option>
									<option>New Orleans Saints</option>
									<option>Tampa Bay Buccaneers</option>
									</optgroup>
									<optgroup label="NFC WEST">
									<option>Arizona Cardinals</option>
									<option>St. Louis Rams</option>
									<option>San Francisco 49ers</option>
									<option>Seattle Seahawks</option>
									</optgroup>
								</select> -->

								<input name="faq_tag" style="width: 620px;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary pull-right btnAct_submit">
									<i class="fa fa-check done"></i>
									<i class="fa fa-spin fa-refresh loading"></i>
									Gửi câu hỏi
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-4">
					<!-- <p class="fa fa-2x">We play fair</p> -->
					<p>Nhận được sự tư vấn khách quan từ cộng đồng về sức khỏe, làm đẹp, và lời khuyên từ các chuyên gia làm đẹp của Beleza.</p>
					<strong>Bạn muốn liên lạc với một địa điểm?</strong><br>
					Nếu bạn đang cố gắng để liên lạc với một địa điểm, xin vui lòng sử dụng tìm kiếm hàng đầu để tìm các địa điểm bạn đang tìm kiếm, và bạn sẽ tìm thấy thông tin chi tiết liên lạc của họ trên trang danh sách của họ
					<p></p>
					<strong>Bạn muốn liên lạc với Beleza?</strong><br>
					Nếu bạn muốn liên lạc với Beleza xin vui lòng email cho chúng tôi về customer@beleza.vn
					<p></p>
					<address>
						<strong>Beleza Việt Nam</strong><br>
						<div id="page_contact_belezavn">
							
						</div>
					</address>
				</div>
			</div>
		</section>
			
	</div>
</div>