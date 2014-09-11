<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 		                = 'Novalnet Invoice <img src="'.$shop_url.'www.novalnet.de/img/kauf-auf-rechnung.jpg" height="20"/>';
$_['text_Invoice']                  = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading']                  = 'Invoice <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/kauf-auf-rechnung.jpg" alt="Invoice" title="Novalnet AG" height="25"/></a>';
$_['text_invoice_testorder'] 		= 'Test order';
$_['text_invoice_transactionid'] 	= 'Novalnet Transaction ID : ';
$_['text_invoice_status'] 			= 'There was an error and your <br>payment could not be completed';
$_['text_invoice_automaticredirection'] = 'You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_invoice_redirection'] 		= 'Redirecting...';
$_['text_invoice_accountholder']	= 'Account holder : <b>';
$_['text_invoice_accountno']		= 'Account number : <b>';
$_['text_invoice_bankcode']			= 'Bankcode :<b>&nbsp;';
$_['text_invoice_bank']				= 'Bank : ';
$_['text_invoice_swift']			= 'SWIFT / BIC : <b>';
$_['text_invoice_amount']			= 'Amount : <b>';
$_['text_invoice_tid']				= 'Reference : <b>TID&nbsp;';
$_['text_invoice_ref']				= '<br><br><b>Only for international transfers:</b>';
$_['text_invoice_transfer']			= '<br><br><b>Please transfer the amount to the following information to our payment service Novalnet AG</b> ';
$_['text_novalnet_redirection']		= 'The bank details will be emailed to you soon after the completion of checkout process';
$_['text_invoice_date'] 			= 'Due date :&nbsp;'; 
$_['text_invoice_iban']				= 'IBAN : ';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
?>
