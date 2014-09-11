<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Text
$_['text_img'] 		                = 'Novalnet Lastschrift Deutschland PCI <img src="'.$shop_url.'www.novalnet.de/img/ELV_Logo.png" height="20" />';
$_['text_germanpci']                = '<a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" alt="novalnet.de" title="Novalnet AG" height="25"/></a>';
$_['text_heading'] 	                = 'Lastschrift Deutschland PCI <a href="'.$shop_url.'www.novalnet.de" target="_blank"><img src="'.$shop_url.'www.novalnet.de/img/ELV_Logo.png" alt="Deutsche Lastschriftverfahren" title="Novalnet AG" height="25"/></a>';
$_['text_elv_de_pci_testorder'] 	= 'TESTBESTELLUNG';
$_['text_elv_de_pci_transactionid'] = 'Novalnet Transaktions-ID : ';
$_['text_elv_de_pci_status'] 		= 'Es gab einen Fehler und Ihre Zahlung konnte nicht abgeschlossen werden';
$_['text_elv_de_pci_automaticredirection'] = 'Sie werden in ein paar Sekunden an das Lastschrift Deutschland PCI Gateway der Firma Novalnet weitergeleitet';
$_['text_elv_de_pci_redirection'] 	= 'umgeleitet...';
$_['text_novalnet_redirection'] 	= 'Sie werden zur Website der Novalnet AG umgeleitet, sobald Sie die Bestellung best&auml;tigen';
$_['text_redirect'] 				= 'Sie werden zum Shop weitergeleitet. Bitte warten Sie';
$_['text_novalnet_testmode_desc']  =  '<font color="red">Bitte beachten Sie: Diese Transaktion wird im Test-Modus ausgeführt werden und der Betrag wird nicht belastet werden.<br /><br /></font>';
?>
