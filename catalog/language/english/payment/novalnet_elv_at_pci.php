<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 			            = 'Novalnet Direct Debit Austria PCI <img src="'.$shop_url.'www.novalnet.de/img/ELV_Logo.png" height="20"/>';
$_['text_austriapci']               = '<a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.com" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		            = 'Direct Debit Austria PCI <a href="'.$shop_url.'www.novalnet.com" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/ELV_Logo.png" alt="Austrian direct debit" title="Novalnet AG" height="25"/></a>';
$_['text_elv_at_pci_testorder'] 	= 'Test order';
$_['text_elv_at_pci_transactionid'] = 'Novalnet Transaction ID : ';
$_['text_elv_at_pci_status'] 		= 'There was an error and your <br>payment could not be completed';
$_['text_elv_at_pci_automaticredirection'] = 'You will be redirected automatically. If not redirected automatically within 5 seconds, click here ';
$_['text_elv_at_pci_redirection'] 	= 'Redirecting...';
$_['text_novalnet_redirection'] 	= 'You will be redirected to Novalnet AG website when you place the order';
$_['text_redirect'] 				= 'You will be redirected to the shop. Please wait';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Please Note: This transaction will run on TEST MODE and the amount will not be charged.<br /><br /></font>';
?>
