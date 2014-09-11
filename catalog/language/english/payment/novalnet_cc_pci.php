<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';
// Text
$_['text_img'] 				    = 'Novalnet Credit Card PCI <img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" height="20"/>';
$_['text_creditcardpci']        = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 			    = 'Credit Card PCI<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg"  title="Novalnet AG" alt = "Visa & Mastercard" height="25"/></a>';
$_['text_cc_pci_testorder']     = 'Test order';
$_['text_cc_pci_transactionid'] = 'Novalnet Transaction ID : ';
$_['text_cc_pci_status'] 		= 'There was an error and your <br>payment could not be completed';
$_['text_cc_pci_automaticredirection'] = 'You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_cc_pci_redirection'] 	= 'Redirecting...';
$_['text_novalnet_redirection'] = 'You will be redirected to Novalnet AG website when you place the order';
$_['text_novalnet_redirect'] 	= 'Continue';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
$_['text_redirect'] 			= 'You will be redirected to the shop. Please wait';
?>
