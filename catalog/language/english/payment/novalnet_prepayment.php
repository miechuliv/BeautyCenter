<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 			            = 'Novalnet Prepayment <img src="'.$shop_url.'www.novalnet.de/img/vorauskasse.jpg" height="20"/>';
$_['text_Prepayment']               = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		            = 'Prepayment <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/vorauskasse.jpg" alt="Prepayment" title="Novalnet AG" height="25"/></a>';
$_['text_prepayment_testorder'] 	= 'Test order';
$_['text_prepayment_transactionid'] = 'Novalnet Transaction ID : ';
$_['text_prepayment_status'] 		= 'There was an error and your <br>payment could not be completed';
$_['text_prepayment_automaticredirection'] ='You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_prepayment_redirection'] 	= 'Redirecting...';
$_['text_prepayment_accountholder']	= 'Account holder : ';
$_['text_prepayment_accountno']		= 'Account number : ';
$_['text_prepayment_bankcode']		= 'Bankcode : ';
$_['text_prepayment_bank']			= 'Bank : ';
$_['text_prepayment_swift']			= 'SWIFT / BIC : ';
$_['text_prepayment_amount']		= 'Amount : ';
$_['text_prepayment_tid']			= 'Reference : <b>TID</b> ';
$_['text_prepayment_ref']			= '<br><br><b>Only for international transfers:</b>';
$_['text_prepayment_transfer']		= '<br><br><b>Please transfer the amount to the following information to our payment service Novalnet AG</b>';
$_['text_prepayment_iban']			= 'IBAN : ';
$_['text_novalnet_redirection']		= 'The bank details will be emailed to you soon after the completion of checkout process';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
?>
