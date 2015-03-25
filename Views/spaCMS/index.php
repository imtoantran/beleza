<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title></title>
        <meta name="description" content="" />
        <meta name="author" content="TrongLoi" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0" />

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="../img/ico/Cat-Brown-icon-24px.png" />
        <link rel="apple-touch-icon" href="../img/ico/Cat-Brown-icon-72px.png" />

        <!-- Chèn link CSS -->
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/bootstrap/css/bootstrap.min.css" type="text/css"  />
        <link rel="stylesheet" href="<?php echo ASSETS ?>css/spaCMS/spaCMS.css" type="text/css"  />



    </head>

    <body class="login-page">
    	<div id="login-page">
    		<div class="wrapper1">
    			<div class="wrapper2">
    				<div class="wrapper3">
    					<!-- <h1>Beleza Connect</h1> -->
    					<div style="text-align:center; margin-bottom: 10px;">
    						<img src="./public/assets/img/Beleza_logo_Final.png" alt="">
						</div>
    					<form action="<?php echo URL . '/spaCMS/login' ?>" novalidate="novalidate" class="login-form" method="POST">
    						<label class="unauthorised-error-message error-message hidden">
    							Sorry, we were unable to log you in. Please check your username and password are correct.
    						</label>
    						<div class="no-venues-error-message error-message hidden">
    							Sorry, there are no venues associated with this account.
    						</div>
    						<input name="user_email" class="required v-email-or-profilename valid" placeholder="Email" type="email">
    						<input name="user_password" class="required" placeholder="Mật khẩu" type="password">

    						<label class="remember">
    							<input name="remember" type="checkbox">
    							<span class="text">Ghi nhớ tài khoản</span>
    						</label>
    						<!-- <a class="forgot" href="https://www.wahanda.com/request-password/">Forgot your password?</a>  -->
    						<!-- imtoantran@gmail.com -->
    						<a class="remember pull-right" data-toggle="modal" href='#modal-reset-password'><span class="text">Lấy lại mật khẩu?</span></a>
    						<!-- imtoantran@gmail.com -->
    						<button class="button">Đăng nhập</button>
    					</form>

			            <!-- <div class="signup">
			                <h2>Don't have business profile?</h2>
			                <a href="https://www.wahanda.com/business/signup/" class="button">Register</a>
			            </div> -->
			        </div>
			    </div>
			</div>
			
			<div class="footer">
				<div class="logo"></div>
				<ul>
					<!-- <li><a href="<?php echo URL ?>info/about-us/">About Us</a></li> -->
					<li><a href="<?php echo URL ?>contact">Liên hệ</a></li>
					<!-- <li class="terms">Terms Of Service</li> -->
					<li>© 2014 BELEZA</li>
				</ul>
			</div>
		</div>		
		<!-- imtoantran@gmail.com reset password modal -->
		<div class="modal fade" id="modal-reset-password">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title text-center">Yêu cầu lấy lại mật khẩu</h4>
					</div>
					<div class="modal-body">
						<form id='reset-password' action="<?php print URL; ?>requestpass/spaResetPassword" method="POST" class="form-horizontal" role="form">
							<div class="form-group">
								<dvi class="col-sm-9">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">@</span>
										<input name="email_address" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon">
									</div>
								</dvi>
								<div class="col-sm-3">
									<button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->    	
		<!-- imtoantran@gmail.com -->
		<!-- Chèn link JavaScript-->
		<script src="<?php echo ASSETS ?>js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo ASSETS ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script>
			/* imtoantran reset spa password */
			jQuery(document).ready(function($) {
				$("#reset-password").submit(function(event) {
					$.ajax({
						url: $(this).attr('action'),
						type: 'POST',
						dataType: 'json',
						data: $(this).serialize(),
					})
					.done(function(response) {
						alert(response.message);
						if(response.success){
							$("#modal-reset-password").modal("hide");
						}						
					})
					.fail(function() {
						alert("Lỗi trong quá trình xử lý");
					})
					.always(function() {
						
					});
					
					return false;
				});
			});
			/* imtoantran reset spa password */
		</script>
	</body>
	</html>




