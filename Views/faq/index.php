

<div id="header-2" class="clearfix" style="margin-bottom: 5px;">
	<div id="faq-1">
		<div class="container">
			<!-- <div class="col-xs-1">
				<img src="<?php echo ASSETS . 'img/message-icon.png' ?>" />
			</div> -->
			<div class="col-xs-12">
				<div class="faq-1-title">
					GÓC DIỄN ĐÀN
				</div>
				<div class="faq-1-description">
					THAM KHẢO Ý KIẾN CỦA CHUYÊN GIA, ĐỌC CÁC BÀI VIẾT VỀ LÀM ĐẸP, CẬP NHẬT THÊM KIẾN THỨC CHO BẠN!
				</div>
			</div>
		</div>
	</div>
</div>



<div id="content-wrap" >
	<div id="faq-2" class="container">
		<div class="faq-2-intro clearfix">
			<div class="col-md-12">
				<p id="page_faq_gioithieu"></p>
			</div>
		</div>
		<div class="faq-2-title-q clearfix">
			<div class="col-md-12">
				ĐẶT CÂU HỎI CHO CHUYÊN GIA
			</div>
		</div>
		<div class="faq-2-form clearfix">
			<div class="col-md-5">
				<form id="goto_askQuestion_form" action="#" method="POST">
					<textarea name="faq_title" placeholder="Không quá 100 từ..." class="input-q form-control" style="min-width: 100%;max-width: 100%;min-height: 200px" rows="10" required max-length="100" title="Nhập câu hỏi"></textarea>
					<p></p>
					<div class="clearfix">
						<div class="col-md-9 remove-padding" style="line-height: 33px">
							<!-- <i class="font-size:10px; text-danger">Không quá 100 từ</i> -->
						</div>
						<div class="col-md-3 remove-padding">
							<?php 
								if(isset($_SESSION['client_id'])){
									echo '<button type="submit" class="btn btn-block btn-orange"> <strong>Đặt câu hỏi</strong> </button>';
								} else {
									echo '<button type="button" class="btn btn-block btn-orange" data-toggle="modal" data-target="#login_modal"> <strong>Đặt câu hỏi</strong> </button>';
								}
							?>
						</div>
					</div>
				</form>

			</div>

			<div class="col-md-7">
				<div class="clearfix">
					<div class="faq-2-title-c">
						CÁC CHỦ ĐỀ
					</div>
					<div class="clearfix">
						<ul id="list_service_type" class="list-unstyled clearfix">
							
						</ul>
					</div>
				</div>
			</div>
		</div>		
	</div>

	
	<div id="faq-3" class="container">
		<div class="row">
			<div class="col-md-12">
				<div>
					<div class="faq-3-title col-xs-12">
						<span class="title-wrap">CÂU HỎI MỚI NHẤT</span>
					</div>

					<div id="question_list" class="clearfix">

					</div>

					<div class="faq-3-allq clearfix">
						<button type="button" class="btn btn-default pull-right hidden">
							Xem tất cả
						</button>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div>
					<div class="faq-3-title col-xs-12">
						<span class="title-wrap">BÀI VIẾT VỀ SỨC KHỎE & SẮC ĐẸP MỚI NHẤT</span>
					</div>

					<div id="news_list">

					</div>

					<div class="faq-3-allq clearfix">
						<button type="button" class="btn btn-default pull-right hidden">
							Xem tất cả
						</button>
					</div>
				</div>
				
				<div class="hidden">
					<div class="faq-3-title col-xs-12">
						<span class="title-wrap">BÀI ĐÁNH GIÁ NỔI BẬT</span>
					</div>

					<div class="faq-3-q clearfix">
						<div class="image col-xs-2">
							<img class="image-responsive" src="<?php echo ASSETS . 'img/message-icon.png' ?>" />
						</div>

						<div class="col-xs-10">
							<div class="title-q">
								Tiêu đề bài viết Tiêu đề bài viết Tiêu đề bài viết Tiêu đề bài viết Tiêu đề bài viết
							</div>
							<div class="source-q">
								<i>Được đánh giá bởi Hoanghau34 </i>|<i> Cách đây 1 giờ</i>
							</div>
							<div class="rating-q">
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-empty"></i>
							</div>
							<div class="answer-q">
								Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết
								 Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết
								  Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết
								   Nội dung bài viết ... <a href="#">Xem thêm>>></a>
							</div>
						</div>
					</div>	

					<div class="faq-3-q clearfix">
						<div class="image col-xs-2">
							<img class="image-responsive" src="<?php echo ASSETS . 'img/message-icon.png' ?>" />
						</div>

						<div class="col-xs-10">
							<div class="title-q">
								Tiêu đề bài viết Tiêu đề bài viết Tiêu đề bài viết Tiêu đề bài viết Tiêu đề bài viết
							</div>
							<div class="source-q">
								<i>Được đánh giá bởi Hoanghau34 </i>|<i> Cách đây 1 giờ</i>
							</div>
							<div class="rating-q">
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-empty"></i>
							</div>
							<div class="answer-q">
								Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết
								 Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết
								  Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết Nội dung bài viết
								   Nội dung bài viết ... <a href="#">Xem thêm>>></a>
							</div>
						</div>
					</div>	

					<div class="faq-3-allq clearfix">
						<button type="button" class="btn btn-default pull-right hidden">
							Xem tất cả
						</button>
					</div>
				</div>

				
			</div>
		</div>
	</div>
</div>