

<div id="header-2" class="clearfix" style="margin-bottom: 20px;">
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



<div id="detail_question" >
	<div class="container">
		<section>
			

			<div class="row">
				<div class="col-lg-8">
					<div class="">
						<h3>
							<!-- <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  -->
							CÂU HỎI: <span class="faq_title"></span>
						</h3>
						<div class="clearfix">
							<div class="pull-left" style="margin-right:10px; margin-bottom: 10px;">
								<img src="" class="client_avatar img-circle" width="50" height="50">
							</div>
							<div class="pull-left">
								Được hỏi bởi 
								<span href="javascript:void(0)" class="client_name"></span> 
								lúc <span class="faq_created" >0 weeks ago</span> <br>
								<span class="answer_count">0</span> câu trả lời
							</div>
						</div>
						
					</div>
					<!--///////////// DETAIL QUESTION /////////-->
					<div>
						<p class="faq_content"></p>
						Thuộc lĩnh vực:<br>
						<div class="faq_tag">

						</div><br><br>
					</div>
					

					<!--///////////// ANSWER BOX /////////-->
					<div id="answer-box" class="well" style="padding: 10px 20px;">
						<p><strong>Bạn có thể giúp đỡ?</strong></p>
						<div class="clearfix">
							<div class="pull-left" style="margin-right: 10px; margin-bottom: 10px;">
								<?php 
									if(isset($_SESSION['client_avatar'])){
										echo '<img width="50" height="50" src="' . URL . $_SESSION['client_avatar'] . '" class="border img-circle">';
									} else {
										echo '<img width="50" height="50" src="' . ASSETS . 'img/default.png' . '" class="border img-circle">';
									}
								?>
								
							</div>
							<div class="pull-left">
								<form id="answer_form" method="post" action="#">
									<input type="hidden" name="client_id" value="<?php echo $_SESSION['client_id']; ?>">
									<div class="form-group">
										<textarea name="faq_content" id="contact-message" class="form-control" cols="76" rows="4" placeholder="Bạn có thể trả lời câu hỏi này, giúp anh ấy/chị ấy ngay..." pattern=".{100,}" required title="Ít nhất 100 ký tự" style="resize: none;"></textarea>
									</div>
									<label style="font-weight: 500;" class="hidden">
										<input type="checkbox" name="notify-owner-on-answer" id="answer-notify-owner-on-answer"> 
										Nhận thông báo email khi có ai đó trả lời câu hỏi này
									</label>

									<?php 
										if(isset($_SESSION['client_id'])){
											echo '<button class="btn btn-sm btn-orange pull-right" id="answer_submit" type="submit"> <i class="fa fa-check done"></i><i class="fa fa-refresh fa-spin loading"></i> <span>Trả lời</span> </button>';
										} else {
											echo '<button class="btn btn-sm btn-orange pull-right" type="button" data-toggle="modal" data-target="#login_modal" > <span>Trả lời</span> </button> <small class="pull-right" style="line-height: 30px; padding-right: 10px;"><i>Đăng nhập trước khi trả lời</i></small>';
										}
									?>

								</form>
							</div>
						</div>
					</div>

					<!--///////////// TOP ANSWER /////////-->
					<div id="top-answer">
						<div class="top-answer-title">
							<img width="40" height="40" src="https://cdneu2.wahanda.net/images/static/qa-best-answer-star.png" alt="Best answer" class="qa-star" style="position: absolute;">
							<h4>Câu trả lời tốt nhất <small> &ndash; Đánh giá bởi cộng đồng</small></h4>
						</div>

						<!-- ANSWER -->

					</div><!--///////////// END TOP ANSWER /////////-->


					<!--///////////// OTHER ANSWER /////////-->
					<div id="other-answer">
						<h4 id="answers-heading" class="community-heading"><strong>Câu trả lời khác</strong> (<span class="answer_count">0</span>)</h4>

						
					</div>
					

				</div>




				<!-- SLIDE BAR -->
				<div id="service_related" class="col-lg-4">
					<h3 class="">Gợi ý dịch vụ cho bạn</h3>
					
					
				</div>
			</div>
		</section>
			
	</div>
</div>
<script>
	var QUESTION_ID = '<?php echo $this->q_id; ?>';
</script>