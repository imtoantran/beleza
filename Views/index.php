<div class="container">
	<?php
	Session::init();
	if (isset($_SESSION['checkSignup'])) {
		if (Session::get('checkSignup') == TRUE) {
			echo '<div class="alert alert-block alert-success">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo '<h4>Chúng mừng bạn!</h4>';
			echo 'Bạn đã đang ký tài khoản thành công vui lòng kiểm tra email để <strong>kích hoạt tài khoản!</strong>';
			echo '</div>';
			unset($_SESSION['checkSignup']);
		}
	}
	?>
</div>
<div id="header-2" class="clearfix">
	<!--	############### imtoantran - add revslider #######################	-->
	<div id="rev_slider_hinh-anh" class="revslider tp-banner-container"></div>
	<!--	############### imtoantran - add revslider #######################	-->
</div>
<div id="content-wrap">
	<div class="container">
		<div id="search" class="clearfix">
			<h4 class="s-title">BẠN CẦN TÌM</h4>
			<form method="get" action="<?php echo URL.'servicelocation/searchLocation'; ?>">
				<div class="item col-md-4">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input type="text" name="s" class="form-control" placeHolder="Địa điểm, Loại hình dịch vụ...">
					</div>
				</div>
				<div class="item col-md-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<select id="city_field" name="c" class="form-control">
							<option value="" selected>Thành Phố...</option>
						</select>
					</div>
				</div>
				<div class="item col-md-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<select id="district_field" name="l" class="form-control">
							<option value="" selected>Quận...</option>
						</select>
					</div>	
				</div>
				<div class="item col-md-2">
					<button type="submit" class="btn btn-default btn-block btn-submit">
						TÌM KIẾM
					</button>
				</div>
			</form>
		</div>
	</div>
	
	<div style="display: none;" id="concern_service" class="container">
		<div class="title">
			<span class="m-title-icon fa-stack"><i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
			<span class="m-title-name">CÓ THỂ BẠN QUAN TÂM </span>
		</div>
		<div id="concern_service_list">
			<div id="waiting_for_concern_service" class="text-center"><i style="color: #FDBD0E"  class="fa fa-3x fa-refresh fa-spin text-center"></i></div>
		</div>
	</div>
	<!-- END DỊCH VỤ BẠN QUAN TÂM -->
	<div style="display: none;" id="concern_service_separate" class="separate"></div>
	<div id="service-list" class="container">
		<div class="title">
			<span class="m-title-icon fa-stack"><i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i> </span>
			<span class="m-title-name">DỊCH VỤ NỔI BẬT </span>
		</div>
		<div id="top_service">
			<div id="waiting_for_top_service" class="text-center"><i style="color: #FDBD0E" class="fa fa-3x fa-refresh fa-spin text-center"></i></div>
			<!-- <div class="col-sm-6 col-md-4">
				<div class="item">
					<p align="center" class="name" data-toggle="modal" data-target="#service_detail">
						CẮT TÓC HÀN QUỐC MỚI
					</p>
					<div class="clearfix svl-01">
						<span class="rating pull-left"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> </span>
						<span class="count-rating pull-right">345 lượt bình chọn</span>
					</div>
					<div class="image" class="clearfix"  data-toggle="modal" data-target="#service_detail">
						<img class="img-responsive" alt="Responsive image" src="<?php echo ASSETS; ?>img/tp-hcm-thanh-dai-cong-truong-thi-cong-metro-1408499845_490x294.jpg" />
					</div>
					<div class="clearfix">
						<span class="price pull-left">1.500.000 VND</span>
						<span class="sale-percent pull-right"> <i class="fa fa-arrow-down"></i> GIẢM 15% </span>
					</div>
					<p class="description">
						Ngọc Anh Hair Salon với đội ngũ chuyên nghiệp........
					</p>
					<div class="clearfix">
						<button data-toggle="modal" data-target="#service_detail" class="btn btn-sm btn-orange pull-right book-now-btn">
							BOOK NOW
						</button>
						<a href="#" class="service-similar pull-left">DỊCH VỤ TƯƠNG TỰ</a>
					</div>
				</div>
			</div> -->
		</div>
	</div>
	<!-- END DỊCH VỤ NỔI BẬT -->
	<div class="separate"></div>

	<div id="service-new" class="container">
		<div class="title">
			<span class="m-title-icon fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-stack-1x fa-inverse" style="font-size: 10px;">NEW</i> </span>
			<span class="m-title-name">DỊCH VỤ MỚI NHẤT CHO BẠN </span>
		</div>
		<div id="new_service">
			<div id="waiting_for_new_service" class="text-center"><i style="color: #FDBD0E" class="fa fa-3x fa-refresh fa-spin text-center"></i></div>
			<!-- <div class="col-sm-6 col-md-3 col-padding-5px">
				<div class="item">
					<div class="image" class="clearfix">
						<img class="img-responsive" alt="Responsive image" src="<?php echo ASSETS; ?>img/tp-hcm-thanh-dai-cong-truong-thi-cong-metro-1408499845_490x294.jpg" />
					</div>
					<div class="col-md-4 remove-padding">
						<span class="rating"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> </span>
						<small class="count-rating pull-right">345 lượt đánh giá</small>
					</div>
					<div class="price col-md-5">
						<span>111.500.000 VND</span>
					</div>
					<div class="sale-percent col-md-3">
						<span>GIẢM 15%</span>
					</div>
					<div class="clearfix"></div>
					<p align="center" class="name">
						CẮT TÓC HÀN QUỐC MỚI
					</p>
					<p class="description">
						Ngọc Anh Hair Salon với đội ngũ chuyên nghiệp........
					</p>
					<div class="clearfix">
						<button class="btn btn-xs btn-brown pull-right">
							BOOK NOW
						</button>
						<a href="#" class="service-similar pull-left">DỊCH VỤ TƯƠNG TỰ</a>
					</div>
				</div>
			</div> -->		
		</div>
	</div>
	<!-- END DỊCH VỤ MỚI NHÂT -->
	<div class="separate"></div>

	<div id="location-new" class="container">
		<div class="title">
			<span class="m-title-icon fa-stack"> <i class="fa fa-map-marker fa-stack-2x"></i> </span>
			<span class="m-title-name">ĐỊA ĐIỂM MỚI NHẤT CHO BẠN </span>
		</div>
		<div id="new_location">
			<div id="waiting_for_new_location" class="text-center"><i style="color: #FDBD0E" class="fa fa-3x fa-refresh fa-spin text-center"></i></div>
			<!-- <div class="col-sm-6 col-md-3 remove-padding new_location_items">
				<img class="image img-responsive" alt="Responsive image" src="<?php echo ASSETS; ?>img/tp-hcm-thanh-dai-cong-truong-thi-cong-metro-1408499845_490x294.jpg" >
				<div class="info">
					<div class="info-content clearfix">
						<div class="name">
							SPA SEN
						</div>
						<div class="description">
							Spa cao cấp số 1 Sài Gòn với những dịch vụ thời thượng. Đem đến cho bạn những cảm giác thư giãn và nghỉ ngơi tuyệt vời
						</div>
						<a class="readmore pull-right" href="#">Xem thêm chi tiết >></a>
					</div>
				</div>
				</img>
			</div> -->
		</div>
	</div>
</div>
<div id="popup-payment" style="display: none;" data-popup="<?php if(isset($_SESSION['popup_payment'])){echo $_SESSION['popup_payment']; unset($_SESSION['popup_payment']); } else {echo 0;}?>"></div>
<script>
	var REVIEW_RESULT = 0;
	var RESULT_PER_SHOW_MORE = "<?php echo RESULT_PER_SHOW_MORE; ?>";

</script>
