<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';
// Text
$_['text_img'] 			                =  'Novalnet Sofort&uuml;berweisung <img src="'.$shop_url.'www.novalnet.de/img/Sofort_Logo_t.jpg" height="20"/>';
$_['text_banktransfer']                 = '<a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.de" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		                = 'Sofort&uuml;berweisung <a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/Sofort_Logo_t.jpg" alt="Sofort&uuml;berweisung" title="Novalnet AG" height="25"/></a><br />';
$_['text_banktransfer_testorder'] 		= 'TESTBESTELLUNG';
$_['text_banktransfer_transactionid'] 	= 'Novalnet Transaktions-ID : ';
$_['text_banktransfer_status'] 			= 'Es gab einen Fehler und Ihre Zahlung konnte nicht abgeschlossen werden';
$_['text_banktransfer_automaticredirection'] ='Sie werden in ein paar Sekunden an das Sofort&Uuml;berweisung Gateway der Firma Novalnet weitergeleitet ';
$_['text_banktransfer_redirection'] 	= 'umgeleitet...';
$_['text_redirect'] 					= 'Sie werden zum Shop weitergeleitet. Bitte warten Sie';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Bitte beachten Sie: Diese Transaktion wird im Test-Modus ausgeführt werden und der Betrag wird nicht belastet werden.<br /><br /></font>';
$_['text_novalnet_redirection'] 		= 'Sie werden zur Website der Novalnet AG umgeleitet, sobald Sie die Bestellung best&auml;tigen';
?>
