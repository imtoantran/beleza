<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <style>
#error{ margin: 50px;}
#error .title{
	font-size: 1.4em; 
	background-color: #ffcc00;
	font-weight: bold;
	padding: 5px;
}
#error a{
  margin-left: 25px;
  font-weight: bold;
  font-size: 1.5em;
  text-decoration: none;
	color: #4f4f4f;
	background-color: #ffcc00;
	padding: 5px 10px;
	border: 1px solid #FFCB00;
	border-radius: 4px;
}
#error a:hover{ background-color: #000; color: #fff;}
#error .error-content{
	margin: auto;
	width: 800px;
	text-align: center;
	padding-bottom: 20px;
	border: 1px solid #ffcc00;
 	shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
  	box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
  	webkit-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
}


    </style>
</head>
<body>
	<div id="error" class="container-fluid text-center">
	<div class="row text-center">
	<div class="text-center error-content">
	<div class="text-center title" >BELEZA THÔNG BÁO</div>
		<img width="500px" height="450px" src="<?php echo URL;?>/public/assets/img/404.png" alt="" style="max-height:550px;">
		<div class="row text-center">
			<a href="<?php echo URL;?>" class="btn btn-orange"> Trang chủ</a>
		</div>
	</div>
		
	</div>
	
</div>
</body>
