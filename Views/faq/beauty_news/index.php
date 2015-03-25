

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

<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1519995188216019&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="content_news" class="container" >
	<div class="row">
		<div class="col-md-8">
			<h3 class="faq_title"></h1>
			<div class="faq-info">
				<p><small><i>Bài đăng của <a class="faq_author" href="javascript:void(0)"></a> - Vào lúc <span class="faq_created"></span></i></small></p>	
				
				<div class="fb-like" data-href="localhost" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
			</div>

			<div class="faq_content">
				
			</div>

			<div class="">
				Tags: 
				<p class="faq_tag">

				</p>
			</div>

			<div id="fb-comments" class="fb-comments" data-href="" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
		</div>
		<div class="col-md-4">
			<h3>Bài viết liên quan</h3>
			<ul class="list-unstyled faq_related">

			</ul>
		</div>
	</div>
	
	
</div>

<script>
	var NEWS_ID = '<?php echo $this->n_id; ?>';
</script>