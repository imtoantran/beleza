<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>BELEZA | Trang quản trị dịch vụ</title>
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
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/bootstrap-select/bootstrap-select.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/bootstrap-datepicker/css/datepicker3.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/select2/select2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/select2/select2-metronic.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/jquery-alerts/jquery.alerts.css" type="text/css" />

        <link rel="stylesheet" href="<?php echo ASSETS ?>plugins/font-awesome/css/font-awesome.min.css" type="text/css" />
        <!-- <link rel="stylesheet" href="<?php echo URL ?>public/assets/css/spaCMS/tooltip.css" type="text/css"  /> -->
        <link rel="stylesheet" href="<?php echo ASSETS ?>css/spaCMS/spaCMS.css" type="text/css" />
        
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
                <div class="current">
                    <div class="icons-arrow-bottom"></div>
                    <div class="name text-center" style="line-height:40px; font-weight: bold;">
                    <i class="fa fa-ge" style="color:#ff9900;"> </i>
                        <?php 
                            echo Session::get('user_business_name');
                        ?>
                    </div>
                </div>
                <ul class="hidden"></ul>
            </div>
            <ul id="nav1" class="nav1-spa-cms">
                <li id="nav-notifications" class="display_none">
                    <span class="notification-badge display_none"> 
                        <span class="icons-notification"></span> 
                        <span class="notification-count">0</span>
                    </span>
                    <div class="notification-list display_none" role="menu">
                        <ul class="ddown radius-bottom" >
                            <li class="ddown-title">
                                Items need action:
                            </li>

                            <li class="notification-booking-confirm">
                                <a href="<?php echo URL ?>spaCMS/reports#"> 
                                    <span class="notification-item"><span class="b-count">0</span> lịch book cần được xác nhận</span> 
                                </a>
                            </li>
                            <li class="notification-appointment-confirm">
                                <a href="javascript:void(0)"> 
                                    <span class="notification-item"><span class="a-count">0</span> lịch hẹn cần được xác nhận</span> 
                                </a>
                            </li>
                            <li class="notification-evoucher-new">
                                <a href="javascript:void(0)"> 
                                    <span class="notification-item"><span class="e-count">0</span> evoucher mới được đặt mua</span> 
                                </a>
                            </li>
                        </ul>
                        <!-- <div class="notification-badge-wrapper">
                            <span class="notification-badge"> 
                                <span class="icons-notification"></span> 
                                <span class="notification-count">0</span> 
                            </span>
                        </div> -->
                    </div>
                </li>

                
               <li id="nav-home">
                     <a title="Home" href="./home" class="text-center"> 
                        <i class="fa fa-home"> </i>
                        <span> HOME</span>                    
                    </a>
                </li>
                <li id="nav-calendar">
                    <a title="Calendar" href="./calendar" class="text-center"> 
                        <i class="fa fa-calendar"> </i>
                        <span> LỊCH HẸN</span>  
                    </a>
                </li>
                <li id="nav-menu">
                    <a title="Menu" href="./menu" class="text-center"> 
                        <i class="fa fa-list"> </i>
                        <span> DỊCH VỤ</span>                        
                    </a>
                </li>
                <li id="nav-reports">
                    <a title="Reports" href="./reports" class="text-center">                  
                        <i class="fa fa-bar-chart"> </i>
                        <span> BÁO CÁO</span>
                        
                    </a>
                </li>
                <li id="nav-reviews">
                    <a title="Settings" href="./reviews" class="text-center">
                        <i class="fa fa-quote-left"> </i>
                        <span> ĐÁNH GIÁ</span>                         
                    </a>
                </li>

                <!-- luuhoabk -->
                <li id="nav-promotion">
                    <a title="Settings" href="./promotion" class="text-center">
                        <i class="fa fa-bullhorn"> </i>
                        <span> KHUYẾN MÃI</span>                            
                    </a>
                </li>
                <li id="nav-settings">
                    <a title="Settings" href="./settings" class="text-center">
                        <i class="fa fa-cogs"> </i>
                        <span> CÀI ĐẶT</span>                        
                    </a>
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
                                echo Session::get('user_email');
                            ?>
                        </div>
                    </div> </a>
                    <ul id="logout" class="ddown display_none" role="menu">
                        <li>
                            <a href="<?php echo URL . 'spaCMS/logout' ?>"> <div class="icons-logout"></div> Thoát </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>