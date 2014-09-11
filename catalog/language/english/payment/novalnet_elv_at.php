<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 		            = 'Novalnet Direct Debit Austria <img src="'.$shop_url.'www.novalnet.de/img/ELV_Logo.png" height="20"/>';
$_['text_austria']              = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 	            = 'Direct Debit Austria <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/ELV_Logo.png" height="20" alt="Austrian direct debit" title="Novalnet AG" height="25"/></a>';
$_['text_bank_account_owner'] 	= 'Account Holder';
$_['text_bank_account_number'] 	= 'Account Number';
$_['text_bank_code'] 			= 'Bankcode';
$_['text_elv_at_bank_no'] 		= 'Please enter valid account details!';
$_['text_elv_at_number'] 		= 'Please enter valid account details!';
$_['text_elv_at_holder'] 		= 'Please enter valid account details!';
$_['text_elv_at_testorder'] 	= 'Test order';
$_['text_elv_at_transactionid'] = 'Novalnet Transaction ID : ';
$_['text_wait'] 				= 'Please wait...!';
$_['text_empty'] 				= '* Please enter valid account details!';
$_['text_basic']                = '* Basic Parameter Missing!';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
$_['text_novalnet_redirection'] = 'Your account will be debited upon delivery of goods.';
?>
