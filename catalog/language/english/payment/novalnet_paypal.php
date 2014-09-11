<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 		            = 'Novalnet PayPal <img src="'.$shop_url.'www.novalnet.de/img/paypal-medium.png" height="20"/>';
$_['text_paypal']               = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 	            = 'PayPal<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/paypal-medium.png" alt="PayPal" title="Novalnet AG" height="25"/></a>';
$_['text_paypal_testorder'] 	= 'Test order';
$_['text_paypal_transactionid'] = 'Novalnet Transaction ID : ';
$_['text_paypal_status'] 		= 'There was an error and your <br>payment could not be completed';
$_['text_paypal_automaticredirection'] = 'You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_paypal_redirection'] 	= 'Redirecting...';
$_['text_novalnet_redirection'] = 'You will be redirected to Novalnet AG website when you place the order';
$_['text_redirect'] 			= 'You will be redirected to checkout page Please Wait.....';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
?>
