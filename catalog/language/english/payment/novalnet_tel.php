<?php
//To check http or https
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 			        = 'Novalnet Telephone Payment<img src="'.$shop_url.'www.novalnet.de/img/novaltel_logo.png" height="20"/>';
$_['text_tel']                  = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com"  title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		        = 'Telephone Payment <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/novaltel_logo.png" alt="Telephone Payment" title="Novalnet AG" height="25"/></a>';

$_['text_tel_testorder'] 	    = 'Test order';
$_['text_tel_transactionid']    = 'Novalnet Transaction ID : ';
$_['text_tel_status'] 		    = 'There was an error and your <br>payment could not be completed';
$_['text_tel_automaticredirection'] ='You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_tel_redirection'] 	    = 'Redirecting...';
$_['text_novalnet_redirection']	= 'Your amount will be added in your telephone bill when you place the order.';
$_['text_novalnet_amt_greater'] = 'Amounts below 0,99 Euros and above 10,00 Euros cannot be processed and are not accepted!';
$_['text_wait'] 				= 'Please wait...!';
$_['text_novalnet_amt_variation'] = 'You have changed the order amount after receiving telephone number, please try again with a new call';
/*Telephone Step one*/
$_['text_novalnet_referstep'] = '<b>Refer the steps which is mentioned in the telephone payment to complete the process </b>';
$_['text_novalnet_follow_step']    = 'Following steps are required to complete your payment:';
$_['text_novalnet_follow_step1']   = 'Step 1: Please call the telephone number displayed: ';
$_['text_novalnet_follow_steps']   = '* This call will cost ';
$_['text_novalnet_follow_stepss']  = ' (including VAT) and it is possible only for German landline connection! *';

/*Telephone Step Two*/
$_['text_novalnet_follow_step2']   = 'Step 2: Please wait for the beep and then hang up the listeners.';
$_['text_novalnet_follow_stepsss'] = 'After your successful call, please proceed with the payment. ';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
?>

