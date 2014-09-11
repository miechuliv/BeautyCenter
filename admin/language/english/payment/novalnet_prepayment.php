<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Heading Pay safe and easy through Novalnet AG Before activating please enter the required Novalnet IDs in Edit mode
$_['heading_title']      		= 'Novalnet Prepayment';
$_['admin_heading_title']       = '<div style="float:left"><a href=\''.$shop_url.'www.novalnet.com\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0" alt="novalnet.com" title="Novalnet AG" height="23" /></a> </div><div style="float:right"><a href=\''.$shop_url.'www.novalnet.com\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/vorauskasse.jpg" border="0" alt="Prepayment" title="Novalnet AG" height="23" /></a></div><div style="float:left">Prepayment</div>';
$_['novalnet_contact_info']     = 'If you need further information, you can visit our Website for End-Customers at <b><a style="text-decoration:none;" href="https://card.novalnet.de" target="_blank">https://card.novalnet.de</a></b> or contact our sales team at <b><a href="mailto:sales@novalnet.de" style="text-decoration:none;">sales@novalnet.de</a></b>.<br/>You can get your Password via the admin tool admin.novalnet.de -> Stammdaten -> Paymentzugriffsschluessel';

// Text
$_['text_payment']       		= 'Payment';
$_['text_success']       		= 'Success: You have modified Novalnet Prepayment payment module!';
$_['text_novalnet_prepayment']  = '<a href=\''.$shop_url.'www.novalnet.com\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0" alt="novalnet.com" title="Novalnet AG" /></a>';

 //Entry
$_['entry_total']               = 'Total:<br /><span class="help">The checkout total the order must reach before this payment method becomes active.</span>';
$_['entry_allowedzone']		    = 'Allowed zones<br/><span class="help">Please enter the zones separately which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))</span>';
$_['entry_module']     		    = 'Enabled Module<br/><span class="help"></span>';
$_['entry_test']       		    = 'Enable Test Mode';
$_['entry_merchantid']   	    = 'Novalnet Merchant ID<br /><span class="help">Enter your Novalnet Merchant ID</span>';
$_['entry_authorisation'] 	    = 'Novalnet Merchant Authorisation code<br /><span class="help">Enter your Novalnet Merchant Authorisation code</span>';
$_['entry_productid']     	    = 'Novalnet Product ID<br /><span class="help">Enter your Novalnet Product ID</span>';
$_['entry_tariffid']            = 'Novalnet Tariff ID<br /><span class="help">Enter your Novalnet Tariff ID</span>';
$_['entry_InformationtotheCustomer'] = 'Information to the end customer<br/><span class="help">will appear in the payment form</span>';
$_['entry_sort_order']   	    = 'Sort order of display<br /><span class="help">Sort order of display. Lowest is displayed first.</span>';
$_['entry_order_status']        = 'Set Order Status<br /><span class="help">Set the status of orders made with this payment module to this value</span>';
$_['entry_payment_zone']        = 'Geo Zones<br /><span class="help">If a zone is selected then this module is activated only for Selected zone</span>';
$_['entry_proxy']     		    = 'Proxy-Server<br/><span class="help">If you use a Proxy Server, enter the Proxy Server IP with port here (e.g. www.proxy.de:80)</span>';
$_['entry_status']       	    = 'Enable module';
$_['text_true']                 = 'True';
$_['text_false']                = 'False';
$_['text_Enabled']              = 'Enabled';
$_['text_Disabled']             = 'Disabled';

// Error
$_['error_permission']   	    = 'Warning: You do not have permission to modify payment Novalnet Prepayment';
$_['error_warning']    	  	    = 'Kindly fix the following issues to update Novalnet Prepayment settings!';
$_['error_merchant']      	    = 'Merchant ID Required!';
$_['error_authorisation'] 	    = 'Authorisation Required!';
$_['error_productid']     	    = 'Product ID Required!';
$_['error_tariffid']      	    = 'Tariff ID Required!';
?>
