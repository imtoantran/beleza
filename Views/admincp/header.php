<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>BELEZA Admin CP</title>
        <meta name="description" content="" />
        <meta name="author" content="TrongLoi" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0" />

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="" />
        <link rel="apple-touch-icon" href="../img/ico/Cat-Brown-icon-72px.png" />

        <!-- Chèn link CSS -->
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/> -->
        <style type="text/css">
            /** {
                font-family: "Open Sans";
            }*/
        </style>
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/bootstrap/css/bootstrap.min.css" type="text/css"  />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/font-awesome/css/font-awesome.min.css" type="text/css"  />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/data-tables/DT_bootstrap.css" type="text/css"  />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/select2/select2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/jquery-alerts/jquery.alerts.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS ?>css/spaCMS/spaCMS.css" type="text/css"  />

        <!-- <link rel="stylesheet" href="<?php echo URL ?>public/assets/css/spaCMS/tooltip.css" type="text/css"  /> -->

        <?php
            if(isset($this->style)){
                foreach ($this->style as $style) {
                    echo '<link rel="stylesheet" type="text/css" href="'. $style .'" />';
                }
            }
        ?>
    </head>

    <body id="dashboard-module">
        <!-------------------------------------------------- Navbar -------------------------------------------------->
        <div class="clearfix" id="header">
            <div id="venues">
            	<a href="<?php echo URL; ?>admincp_dashboard">
	                <div class="current">
	                    <div class="icons-arrow-bottom"></div>
	                    <div class="name pointer" style="position: absolute; height: 15px; top: 50%; margin-top: -7.5px;">
	                        <i class="fa fa-lg fa-wrench"></i> Admin Control Panel
	                    </div>
	                </div>
                </a>
                <ul class="hidden"></ul>
            </div>
            <ul id="nav1">
                <li id="nav-reports">
                    <a title="Email" href="<?php echo URL; ?>admincp_email"> <div class="fa-icon"><i class="fa fa-2x fa-envelope pull-left"></i></div>
                    <div class="title">
                        Email
                    </div> </a>
                </li>
                <li id="nav-reports">
                    <a title="Báo cáo" href="<?php echo URL; ?>admincp_report"> <div class="icons-nav-reports"></div>
                    <div class="title">
                        Báo cáo
                    </div> </a>
                </li>
                <li id="nav-settings" class="hidden">
                    <a title="Khuyến mãi" href="<?php echo URL; ?>admincp_promotion"> <div class="fa-icon"><i class="fa fa-2x fa-arrow-down pull-left"></i></div>
                    <div class="title">
                        Khuyến mãi
                    </div> </a>
                </li>
                <li id="nav-settings">
                    <a title="Gift voucher" href="<?php echo URL; ?>admincp_gift"> <div class="fa-icon"><i class="fa fa-2x fa-gift pull-left"></i></div>
                    <div class="title">
                        Gift-voucher
                    </div> </a>
                </li>
                <li id="nav-menu">
                    <a title="Trang" href="<?php echo URL; ?>admincp_page"> <div class="icons-nav-menu"></div>
                    <div class="title">
                        Trang
                    </div> </a>
                </li>
                <li id="nav-settings">
                    <a title="Cài đặt" href="<?php echo URL; ?>admincp_setting"> <div class="icons-nav-settings"></div>
                    <div class="title">
                        Cài đặt
                    </div> </a>
                </li>
                <li class="management" id="nav-settings" style="position: relative;">
                    <a id="management_ddown" title="Quản lý" href="javascript:;"> 
                    	<div class="fa-icon"><i class="fa fa-2x fa-briefcase pull-left"></i></div>
	                    <div class="title">
	                        Quản lý <i class="icon caret"></i>
	                    </div> 
                    </a>
                    <ul id="management_content_ddown" class="ddown" role="menu" style="position: absolute; width: 180%; display: none;">
                        <li style="width: 100%">
                           <a href="<?php echo URL; ?>admincp_menu" style="width: 100%;"> 
                               <div class="fa-icon"><i class="fa fa-2x fa-bars pull-left"></i></div> 
                               <div class="title">QUẢN LÝ MENU</div> 
                           </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_sms" style="width: 100%;"> 
                                <div class="fa-icon"><i class="fa fa-2x fa-wechat pull-left"></i></div> 
                                <div class="title">SMS Template</div> 
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_banner" style="width: 100%;"> 
                                <div class="fa-icon"><i class="fa fa-2x fa-picture-o pull-left"></i></div> 
                                <div class="title">Quản lý banner</div> 
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_spa" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-building-o pull-left"></i></div> 
                            	<div class="title">Quản lý địa điểm</div> 
                            </a>
                        </li>
						<li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_city" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-map-marker pull-left"></i></div> 
                            	<div class="title">Quản lý thành phố</div>  
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_district" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-map-marker pull-left"></i></div> 
                            	<div class="title">Quản lý quận</div>  
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_client" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-users pull-left"></i></div> 
                            	<div class="title">Quản lý người dùng</div>  
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_review" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-comment-o pull-left"></i></div> 
                            	<div class="title">Quản lý đánh giá</div>  
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_service" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-cube pull-left"></i></div>
                            	<div class="title">Quản lý dịch vụ</div>
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_service_type" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-cubes pull-left"></i></div>
                            	<div class="title"> Quản lý loại dịch vụ</div>
                            </a>
                        </li>
                        <!--<li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_typebusiness" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-share-alt-square pull-left"></i></div>
                            	<div class="title"> Quản lý dịch vụ chính</div>
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_consulting" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-compass pull-left"></i></div>
                            	<div class="title">Quản lý luật tư vấn</div>
                            </a>
                        </li>
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_question" style="width: 100%;"> 
                                <div class="fa-icon"><i class="fa fa-2x fa-question pull-left"></i></div> 
                                <div class="title">Quản lý câu hỏi tư vấn</div>
                            </a>
                        </li>-->
                        <li style="width: 100%">
                            <a href="<?php echo URL; ?>admincp_community" style="width: 100%;"> 
                            	<div class="fa-icon"><i class="fa fa-2x fa-comments pull-left"></i></div> 
                            	<div class="title">Diễn đàn hỏi-đáp</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="ddown-menu" id="user">
                <div class="user-wrapper">
                    <a class="current" href="javascript:;" data-toggle="dropdown">
                    <div class="person-pic-small">
                    </div> <div class="icons-arrow-bottom"></div>
                    <div class="name">
                        <div>
                            <?php
                                echo Session::get('admin_username');
                            ?>
                        </div>
                    </div> </a>
                    <ul id="logout" class="ddown" role="menu" style="display:none;">
                        <li>
                            <a href="<?php echo URL . 'admincp/logout' ?>"> <div class="icons-logout"></div> Thoát </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>