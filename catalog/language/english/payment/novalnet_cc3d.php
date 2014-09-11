<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 				    = 'Novalnet Credit Card 3D Secure <img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" height="20"/>';
$_['text_creditcard3d']         = '<a href="http://www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 			    = ' Credit Card 3D Secure <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" alt ="Visa & Mastercard" title="Novalnet AG" height="25"/></a>';
$_['text_cc3d_number'] 		    = 'Card number';
$_['text_cc3d_holder'] 		    = 'Credit card holder';
$_['text_cc3d_exp_month'] 	    = 'Expiration Date';
$_['text_month'] 			    = 'Month';
$_['text_year'] 			    = 'Year';
$_['text_cc3d_cvc2'] 		    = 'CVC (Verification Code)';
$_['text_cc3d_cvc2_info'] 	    = '* On Visa-, Master- and Eurocard you will find the 3 digit CVC-Code near the signature field at the rearside of the creditcard.';
$_['text_cc3d_cvc2_error'] 	    = 'Please enter valid credit card details!';
$_['text_cc3d_exp_year_error'] 	= 'Please enter valid credit card details!';
$_['text_cc3d_exp_month_error'] = 'Please enter valid credit card details!';
$_['text_cc3d_exp_data_error'] 	= 'Please enter valid credit card details';
$_['text_cc3d_no_error'] 		= 'Please enter valid credit card details!';
$_['text_cc3d_holder_error'] 	= 'Please enter valid credit card details!';
$_['text_cc3d_testorder'] 		= 'Test order';
$_['text_cc3d_transactionid'] 	= 'Novalnet Transaction ID : ';
$_['text_cc3d_status'] 			= 'There was an error and your <br>payment could not be completed';
$_['text_cc3d_automaticredirection'] = 'You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_cc3d_redirection']     = 'Redirecting...';
$_['text_empty'] 			    = '* Please enter valid credit card details!';
$_['text_redirect'] 		    = 'You will be redirected to the shop. Please wait';
$_['text_january'] 		 	    = 'January';
$_['text_february']			    = 'February';
$_['text_march'] 			    = 'March';
$_['text_april'] 			    = 'April';
$_['text_may']				    = 'May';
$_['text_june'] 			    = 'June';
$_['text_july'] 			    = 'July';
$_['text_august']			    = 'August';
$_['text_september'] 		    = 'September';
$_['text_october'] 			    = 'October';
$_['text_november']			    = 'November';
$_['text_december'] 		    = 'December';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
$_['text_novalnet_redirection'] = 'The amount will be booked immediately from your credit card when you submit the order.';
?>
