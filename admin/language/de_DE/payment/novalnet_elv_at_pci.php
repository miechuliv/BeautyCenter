<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Heading Pay safe and easy through Novalnet AG Before activating please enter the required Novalnet IDs in Edit mode
$_['heading_title']      	   = 'Novalnet Lastschrift &Ouml;sterreich PCI';
$_['admin_heading_title']      = '<div style="float:left"><a href=\''.$shop_url.'www.novalnet.de\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0" alt="novalnet.de" title="novalnet.de" height="23" /></a> </div><div style="float:right"><a href=\''.$shop_url.'www.novalnet.de\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/ELV_Logo.png" border="0" alt="Lastschrift &Ouml;sterreich PCI" title="Novalnet AG" height="23" /></a></div><div style="float:right">Lastschrift &Ouml;sterreich PCI</div>';
$_['novalnet_contact_info']    = 'Wenn Sie weitere Informationen ben&ouml;tigen, k&ouml;nnen Sie unsere Website f&uuml;r Endkunden besuchen am <b><a style="text-decoration:none;" href="https://card.novalnet.de" target="_blank">https://card.novalnet.de</a></b> oder kontaktieren Sie unser Vertriebsteam bei <b><a href="mailto:sales@novalnet.de" style="text-decoration:none;">sales@novalnet.de</a></b>.';

// Text
$_['text_payment']       	   = 'Bezahlung';
$_['text_success']      	   = 'erfolgreich: Sie haben ge&auml;ndert Novalnet Lastschrift &Ouml;sterreich PCI Modul!';
$_['text_novalnet_elv_at_pci'] = '<a href=\''.$shop_url.'www.novalnet.de\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0"  alt="novalnet.de" title="Novalnet AG" /></a>';

// Entry
$_['entry_total']              = 'Summe:<br /><span class="help">Der Warenkorb muss diese Summe beinhalten, damit dieses Zahlungsverfahren verf&uuml;gbar ist.</span>';
$_['entry_novalnet_elv_at_pci_module']       = 'Novalnet Lastschrift &Ouml;sterreich PCI Modul aktivierung:<br/><span class="help"></span>';
$_['entry_novalnet_elv_at_pci_testmode']     = 'Testmodus einschalten';
$_['entry_novalnet_elv_at_pci_merchantid']   = 'Novalnet H&auml;ndler ID<br/><span class="help">Geben Sie Ihre Novalnet H&auml;ndler-ID ein</span>';
$_['entry_novalnet_elv_at_pci_auth_code']    = 'Novalnet Authorisierungsschl&uuml;ssel<br/><span class="help">Geben Sie Ihren Novalnet-Authorisierungsschl&uuml;ssel ein </span>';
$_['entry_novalnet_elv_at_pci_productid']    = 'Novalnet Produkt ID<br/><span class="help">Geben Sie Ihre Novalnet Produkt-ID ein </span>';
$_['entry_novalnet_elv_at_pci_tariffid']     = 'Novalnet Tarif ID<br/><span class="help">Geben Sie Ihre Novalnet Tarif-ID ein </span>';
$_['entry_novalnet_elv_at_pci_manualcheck']  = 'Manuelle &Uuml;berpr&uuml;fung des Betrags in Cent<br/><span class="help"> Bitte den Betrag in Cent eingeben</span>';
$_['entry_novalnet_elv_at_pci_productid2']   = 'Zweite Novalnet Produkt ID<br/><span class="help">zur manuellen &Uuml;berpr&uuml;fung</span>';
$_['entry_novalnet_elv_at_pci_tariffid2']    = 'Zweite Novalnet Tarif ID<br/><span class="help">zur manuellen &Uuml;berpr&uuml;fung</span>';
$_['entry_novalnet_elv_at_pci_info']         = 'Informationen f&uuml;r den End kunden<br /><span class="help">wird im Bezahlformular erscheinen </span>';
$_['entry_novalnet_elv_at_pci_sort_order']   = 'Sortierung nach<br/><span class="help">Sortierung der Anzeige. Der niedrigste Wert wird zuerst angezeigt</span>';
$_['entry_novalnet_elv_at_pci_order_status'] = 'Bestellstatus setzen<br/><span class="help">Setzen Sie den Status von &uuml;ber dieses Zahlungsmodul durchgef&uuml;hrten Bestellungen auf diesen Wert</span>';
$_['entry_novalnet_elv_at_pci_payment_zone'] = 'Geografisches Gebiet<br/><span class="help">Wird ein Bereich ausgew&auml;hlt, dann wird dieses Modul nur f&uuml;r den ausgew&auml;hlten Bereich aktiviert</span>';
$_['entry_novalnet_elv_at_pci_proxy']     	 = 'Proxy-Server<br/><span class="help">Wenn Sie einen Proxy-Server einsetzen, tragen Sie hier Ihre Proxy-IP und den Port ein (z.B. www.proxy.de:80)</span>';
$_['entry_novalnet_elv_at_pci_status']       = 'Modul aktivieren';
$_['entry_novalnet_elv_at_pci_password']     = 'Novalnet Paymentzugriffsschl&uuml;ssel <br/><span class="help">Geben Sie Ihr Novalnet Paymentzugriffsschl&uuml;ssel ein </span>';
$_['text_true']           = 'wahr';
$_['text_false']          = 'Falsch';
$_['text_enabled']        = 'Aktiviert';
$_['text_disabled']       = 'Deaktiviert';
// Error
$_['error_permission']    = 'Warnung: Sie sind nicht berechtigt, die Zahlung &auml;ndern Novalnet Lastschriftverfahren &Ouml;sterreich PCI';
$_['error_warning']    	  = 'Bitte beheben Sie die folgenden Fragen zu aktualisieren Novalnet Lastschriftverfahren &Ouml;sterreich PCI Einstellungen!';
$_['error_merchant']      = 'Novalnet H&auml;ndler ID!';
$_['error_authorisation'] = 'Novalnet H&auml;ndler Authorisierungsschl&uuml;ssel!';
$_['error_productid']     = 'Novalnet Produkt ID';
$_['error_tariffid']      = 'Novalnet Tarif ID!';
$_['error_password']      = 'Passwort erforderlich!';
$_['error_manualcheck']   = 'Produkt-ID2 und / oder Tarif-ID2 fehlen!';
?>
