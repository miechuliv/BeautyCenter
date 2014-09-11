<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';
// Text
$_['text_img'] 			            = 'Novalnet Vorauskasse <img src="'.$shop_url.'www.novalnet.de/img/vorauskasse.jpg" height="20"/>';
$_['text_Prepayment']               = '<a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.de"  title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 		            = 'Vorauskasse <a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/vorauskasse.jpg" alt="Vorauskasse" title="Novalnet AG" height="25"/></a>';
$_['text_prepayment_testorder'] 	= 'TESTBESTELLUNG';
$_['text_prepayment_transactionid'] = 'Novalnet Transaktions-ID : ';
$_['text_prepayment_status'] 		= 'Es gab einen Fehler und Ihre Zahlung konnte nicht abgeschlossen werden';
$_['text_prepayment_automaticredirection'] = 'Sie werden in ein paar Sekunden an das Vorauskasse Gateway der Firma Novalnet weitergeleitet ';
$_['text_prepayment_redirection'] 	= 'umgeleitet...';
$_['text_prepayment_accountholder']	= 'Kontoinhaber :';
$_['text_prepayment_accountno']		= 'Kontonummer : ';
$_['text_prepayment_bankcode']		= 'Bankleitzahl :';
$_['text_prepayment_bank']			= 'Bank : ';
$_['text_prepayment_iban']			= 'IBAN : ';
$_['text_prepayment_swift']			= 'SWIFT / BIC : ';
$_['text_prepayment_amount']		= 'Betrag : ';
$_['text_prepayment_tid']			= 'Verwendungszweck : <b>TID&nbsp;</b>';
$_['text_prepayment_ref']			= '<br><br><b>Nur bei Auslands&uuml;berweisungen:</b>';
$_['text_prepayment_transfer']		= '<br><br><b>Bitte &uuml;berweisen Sie den Betrag mit der folgenden Information an unseren Zahlungsdienstleister Novalnet AG</b> ';
$_['text_novalnet_redirection'] 	= 'Die Bankverbindung wird Ihnen nach Abschluss Ihrer Bestellung per E-Mail zugeschickt';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Bitte beachten Sie: Diese Transaktion wird im Test-Modus ausgeführt werden und der Betrag wird nicht belastet werden.<br /><br /></font>';
?>
