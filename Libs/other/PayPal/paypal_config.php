<?php

//url send to paypal
define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');

//email receiver
define('RECEIVER_EMAIL', 'luuhoabk.developer@gmail.com');

// url paypal return
define('RETURN_URL', URL.'payment/processPaypalPayment');

// url paypal cancel
define('CANCEL_URL', URL.'payment/processPaypalPayment?cancel_return=1');

// url paypal notify
define('NOTIFY_URL', URL.'payment/processPaypalPayment?notify_url=1');
