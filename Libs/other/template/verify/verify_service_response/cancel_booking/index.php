<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <title>Beleza notification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        #circleG {
            width: 18.666666666666668px;
        }

        .circleG {
            background-color: #FFFFFF;
            float: left;
            height: 4px;
            margin-left: 2px;
            width: 4px;
            -moz-animation-name: bounce_circleG;
            -moz-animation-duration: 1.9500000000000002s;
            -moz-animation-iteration-count: infinite;
            -moz-animation-direction: linear;
            -moz-border-radius: 3px;
            -webkit-animation-name: bounce_circleG;
            -webkit-animation-duration: 1.9500000000000002s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: linear;
            -webkit-border-radius: 3px;
            -ms-animation-name: bounce_circleG;
            -ms-animation-duration: 1.9500000000000002s;
            -ms-animation-iteration-count: infinite;
            -ms-animation-direction: linear;
            -ms-border-radius: 3px;
            -o-animation-name: bounce_circleG;
            -o-animation-duration: 1.9500000000000002s;
            -o-animation-iteration-count: infinite;
            -o-animation-direction: linear;
            -o-border-radius: 3px;
            animation-name: bounce_circleG;
            animation-duration: 1.9500000000000002s;
            animation-iteration-count: infinite;
            animation-direction: linear;
            border-radius: 3px;
        }

        #circleG_1 {
            -moz-animation-delay: 0.39s;
            -webkit-animation-delay: 0.39s;
            -ms-animation-delay: 0.39s;
            -o-animation-delay: 0.39s;
            animation-delay: 0.39s;
        }

        #circleG_2 {
            -moz-animation-delay: 0.9099999999999999s;
            -webkit-animation-delay: 0.9099999999999999s;
            -ms-animation-delay: 0.9099999999999999s;
            -o-animation-delay: 0.9099999999999999s;
            animation-delay: 0.9099999999999999s;
        }

        #circleG_3 {
            -moz-animation-delay: 1.1700000000000002s;
            -webkit-animation-delay: 1.1700000000000002s;
            -ms-animation-delay: 1.1700000000000002s;
            -o-animation-delay: 1.1700000000000002s;
            animation-delay: 1.1700000000000002s;
        }

        @-moz-keyframes bounce_circleG {
            0% {
            }
            50% {
                background-color: #000000
            }
            100% {
            }
        }

        @-webkit-keyframes bounce_circleG {
            0% {
            }
            50% {
                background-color: #000000
            }
            100% {
            }
        }

        @-ms-keyframes bounce_circleG {
            0% {
            }
            50% {
                background-color: #000000
            }
            100% {
            }
        }

        @-o-keyframes bounce_circleG {
            0% {
            }
            50% {
                background-color: #000000
            }
            100% {
            }
        }

        @keyframes bounce_circleG {
            0% {
            }
            50% {
                background-color: #000000
            }
            100% {
            }
        } </style>
</head>
<body style="margin: 0; padding: 0; background-color: #CCC ">
<div id="confirm" style="width: 500px; border-radius: 5px; margin: 110px auto; display: block;">
    <div
        style="text-align: center; border-radius: 5px 5px 0 0; background-color: #474747; font-size: 18px; color: #E2E2E2; padding: 10px; text-transform: uppercase; font-weight: 600;font-family: Arial, sans-serif; ">
        HỦY LỊCH HẸN
    </div>
    <div
        style="text-align:center; position:relative; border-radius: 0 0 5px 5px; background-color: #F9F9F9; padding: 20px; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
        Bạn có thực sự muốn hủy lịch hẹn này không?
        <br>
        <br>

        <div align="center">
            <a class="btn btn-xs btn-danger" href='{{URL}}');">Chấp nhận</a>
            <a class="btn btn-xs btn-primary" href="{{ABORT_URL}}">Trở về</a>
        </div>
    </div>
</div>
</body>
</html>