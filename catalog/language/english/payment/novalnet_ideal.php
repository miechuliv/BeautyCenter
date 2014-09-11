<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 			        = 'Novalnet iDEAL <img src="'.$shop_url.'www.novalnet.de/img/ideal_payment_small.png" height="20"/>';
$_['text_ideal']                = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		        = 'iDEAL <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/ideal_payment_small.png" alt="iDEAL" title="Novalnet AG" height="25"/></a>';
$_['text_ideal_testorder'] 		= 'Test order';
$_['text_ideal_transactionid'] 	= 'Novalnet Transaction ID : ';
$_['text_ideal_status'] 		= 'There was an error and your <br>payment could not be completed';
$_['text_ideal_automaticredirection'] = 'You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_ideal_redirection'] 	= 'Redirecting...';
$_['text_redirect'] 		    = 'You will be redirected to the shop. Please wait';
$_['text_novalnet_redirection'] = 'You will be redirected to Novalnet AG website when you place the order';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
?>
