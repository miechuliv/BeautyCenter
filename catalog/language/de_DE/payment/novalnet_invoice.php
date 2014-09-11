<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';
// Text
$_['text_img'] 		             = 'Novalnet Kauf auf Rechnung <img src="'.$shop_url.'www.novalnet.de/img/kauf-auf-rechnung.jpg" height="20"/>';
$_['text_Invoice']               = '<a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.de" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 	             = 'Kauf auf Rechnung <a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/kauf-auf-rechnung.jpg" alt="Kauf auf Rechnung" title="Novalnet AG" height="25"/></a>'; 
$_['text_invoice_testorder'] 	 = 'TESTBESTELLUNG';
$_['text_invoice_transactionid'] = 'Novalnet Transaktions-ID : ';
$_['text_invoice_status'] 		 = 'Es gab einen Fehler und Ihre Zahlung konnte nicht abgeschlossen werden';
$_['text_invoice_automaticredirection'] = 'Sie werden in ein paar Sekunden an das Kauf auf Rechnung Gateway der Firma Novalnet weitergeleitet ';
$_['text_invoice_redirection']	 = 'umgeleitet...';
$_['text_invoice_accountholder'] = 'Kontoinhaber : <b>';
$_['text_invoice_accountno']	 = 'Kontonummer : <b>';
$_['text_invoice_bankcode']		 = 'Bankleitzahl : <b>';
$_['text_invoice_bank']			 = 'Bank :&nbsp;';
$_['text_invoice_swift']		 = 'SWIFT / BIC : <b>';
$_['text_invoice_amount']		 = 'Betrag : <b>';
$_['text_invoice_tid']			 = 'Verwendungszweck : <b>TID&nbsp;';
$_['text_invoice_ref']			 = '<br><br><b>Nur bei Auslands&uuml;berweisungen:</b>';
$_['text_invoice_date'] 		 = 'F&auml;lligkeitsdatum :&nbsp;';
$_['text_invoice_transfer']		 = '<br><br><b>Bitte &uuml;berweisen Sie den Betrag mit der folgenden Information an unseren Zahlungsdienstleister Novalnet AG</b> ';
$_['text_novalnet_redirection']  = 'Die Bankverbindung wird Ihnen nach Abschluss Ihrer Bestellung per E-Mail zugeschickt';
$_['text_invoice_iban']			 = 'IBAN : ';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Bitte beachten Sie: Diese Transaktion wird im Test-Modus ausgeführt werden und der Betrag wird nicht belastet werden.<br /><br /></font>';
?>
