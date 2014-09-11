<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';
// Text
$_['text_img'] 		               = 'Novalnet Kreditkarte <img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" height = "20"/>';
$_['text_creditcard']              = '<a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.de" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		           = 'Kreditkarte <a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" alt="Visa & Mastercard" title="Novalnet AG" alt="Novalnet Kreditkarte" height="25"/></a>';
$_['text_cc_testorder']            = 'TESTBESTELLUNG';
$_['text_empty'] 	               = '* Geben Sie bitte g&uuml;ltige Kreditkartendaten ein!';
$_['text_basic']                   = '* Grundlegende Parameter fehlt! ';
$_['text_errormsg']                = '* Geben Sie bitte g&uuml;ltige Kreditkartendaten ein!';
$_['text_wait'] 	               = 'Bitte warten ...!';
$_['text_cc_transactionid']        = 'Novalnet Transaktions-ID : ';
$_['text_cc_status'] 		       = 'Es gab einen Fehler und Ihre Zahlung konnte nicht abgeschlossen werden';
$_['text_cc_automaticredirection'] = 'Sie werden in ein paar Sekunden an das Kreditkarte  Gateway der Firma Novalnet weitergeleitet';
$_['text_cc_redirection'] 	       = 'umgeleitet...';
$_['text_novalnet_redirection']    = 'Die Belastung Ihrer Kreditkarte erfolgt mit dem Abschluss der Bestellung';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Bitte beachten Sie: Diese Transaktion wird im Test-Modus ausgeführt werden und der Betrag wird nicht belastet werden.<br /><br /></font>';
$_['text_redirect'] 		       = 'Sie werden zum Shop weitergeleitet. Bitte warten Sie';
?>
