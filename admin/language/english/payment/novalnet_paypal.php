<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Heading Pay safe and easy through Novalnet AG Before activating please enter the required Novalnet IDs in Edit mode
$_['heading_title']      		= 'Novalnet PayPal';
$_['admin_heading_title']      	= '<a href=\''.$shop_url.'www.novalnet.com\' target=\'_blank\'"> <img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0" alt="novalnet.com" title="Novalnet AG" height="20" /></a>PayPal<a href=\''.$shop_url.'www.novalnet.com\' target=\'_blank\'"><img style="float:right" src="'.$shop_url.'www.novalnet.de/img/paypal-medium.png" border="0" alt="PayPal" title="Novalnet AG" height="20" /></a>';
$_['novalnet_contact_info']     = 'If you need further information, you can visit our Website for End-Customers at <b><a style="text-decoration:none;" href="https://card.novalnet.de" target="_blank">https://card.novalnet.de</a></b> or contact our sales team at <b><a href="mailto:sales@novalnet.de" style="text-decoration:none;">sales@novalnet.de</a></b>.<br/>You can get your Password via the admin tool admin.novalnet.de -> Stammdaten -> Paymentzugriffsschluessel';

// Text
$_['text_payment']       		= 'Payment';
$_['text_success']       		= 'Success: You have modified Novalnet PayPal payment module!';
$_['text_novalnet_paypal']	 	= '<a href=\''.$shop_url.'www.novalnet.com\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0" alt="novalnet.com" title="Novalnet AG" /></a>';

// Entry
$_['entry_total']                           = 'Total:<br /><span class="help">The checkout total the order must reach before this payment method becomes active.</span>';
$_['entry_novalnet_paypal_testmode']		= 'Enable Test Mode';
$_['entry_novalnet_paypal_merchantid']   	= 'Novalnet Merchant ID<br/><span class="help">Enter your Novalnet Merchant ID</span>';
$_['entry_novalnet_paypal_auth_code'] 		= 'Novalnet Merchant Authorisation code<br/><span class="help">Enter your Novalnet Merchant Authorisation code</span>';
$_['entry_novalnet_paypal_productid']     	= 'Novalnet Product ID<br/><span class="help">Enter your Novalnet Product ID</span>';
$_['entry_novalnet_paypal_tariffid']       	= 'Novalnet Tariff ID<br/><span class="help">Enter your Novalnet Tariff ID</span>';
$_['entry_novalnet_paypal_info']       		= 'Information to the end customer<br/><span class="help">will appear in the payment form</span>';
$_['entry_novalnet_paypal_sort_order']   	= 'Sort order of display<br/><span class="help">Sort order of display. Lowest is displayed first</span>';
$_['entry_novalnet_paypal_order_status'] 	= 'Set order Status<br/><span class="help">Set the status of orders made with this payment module to this value </span>';
$_['entry_novalnet_paypal_payment_zone']    = 'Geo Zones<br /><span class="help">If a zone is selected then this module is activated only for Selected zone</span>';
$_['entry_novalnet_paypal_proxy']     		= 'Proxy-Server<br/><span class="help">If you use a Proxy Server, enter the Proxy Server IP with port here (e.g. www.proxy.de:80)</span>';
$_['entry_novalnet_paypal_status']          = 'Enable Module';
$_['entry_novalnet_paypal_password']     	= 'Novalnet Payment access key <br/><span class="help">Enter your Novalnet payment access key </span>';
$_['entry_novalnet_paypal_api_username']    = 'PayPal API User Name<br/><span class="help"> Please enter your PayPal API username</span>';
$_['entry_novalnet_paypal_api_password']    = 'PayPal API Password <br/><span class="help">Please enter your PayPal API password</span>';
$_['entry_novalnet_paypal_api_signature']   = 'PayPal API Signature<br/><span class="help">Please enter your PayPal API signature </span>';
$_['text_true']           = 'True';
$_['text_false']          = 'False';
$_['text_Enabled']            	= 'Enabled';
$_['text_Disabled']            	= 'Disabled';

// Error
$_['error_permission']    = 'Warning: You do not have permission to modify payment Novalnet PayPal';
$_['error_warning']    	  = 'Kindly fix the following issues to update Novalnet PayPal settings!';
$_['error_merchant']      = 'Merchant ID Required!';
$_['error_authorisation'] = 'Authorisation Required!';
$_['error_productid']     = 'Product ID Required!';
$_['error_tariffid']      = 'Tariff ID Required!';
$_['error_password']      = 'Password Required!';
$_['error_api_username']  = 'PayPal Api username Required!';
$_['error_api_password']  = 'PayPal Api Password Required!';
$_['error_api_signature'] = 'PayPal Api Signature Required!';
?>
