<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 			           = 'Novalnet Credit Card <img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" height="20"/>';
$_['text_creditcard']              = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		           = 'Credit Card <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" alt="Visa & Mastercard" title="Novalnet AG" height="25"/></a>';
$_['text_empty'] 	               = '* Please enter valid credit card details!';
$_['text_basic']                   = '* Basic Parameter Missing! ';
$_['text_wait'] 		           = 'Please wait...!';
$_['text_errormsg']                = '* Please enter valid credit card details!';
$_['text_cc_testorder']            = 'Test order';
$_['text_cc_transactionid']        = 'Novalnet Transaction ID : ';
$_['text_cc_status'] 		       = 'There was an error and your <br>payment could not be completed';
$_['text_cc_automaticredirection'] = 'You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_cc_redirection'] 		   = 'Redirecting...';
$_['text_novalnet_redirection']    = 'The amount will be booked immediately from your credit card when you submit the order.';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
$_['text_redirect'] 			   = 'You will be redirected to the shop. Please wait';
?>
