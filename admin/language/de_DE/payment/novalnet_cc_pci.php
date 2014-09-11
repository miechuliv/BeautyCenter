<?php
//To check http or https server
$shop_url = (($this->data == 'SSL') ? 'https' : 'http:').'//';

// Heading
$_['heading_title']         = 'Novalnet Kreditkarte PCI ';
$_['admin_heading_title']   = '<a href=\''.$shop_url.'www.novalnet.de\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0" alt="novalnet.de" title="Novalnet AG" height="20" /></a>Kreditkarte PCI<a href=\''.$shop_url.'www.novalnet.de\' target=\'_blank\'"><img style="float:right" src="'.$shop_url.'www.novalnet.de/img/creditcard_small.jpg" border="0" alt="Kreditkarte PCI" title="Novalnet AG" height="20" /></a>';
$_['novalnet_contact_info'] = 'Wenn Sie weitere Informationen ben&ouml;tigen, k&ouml;nnen Sie unsere Website f&uuml;r Endkunden besuchen am <b><a style="text-decoration:none;" href="https://card.novalnet.de" target="_blank">https://card.novalnet.de</a></b> oder kontaktieren Sie unser Vertriebsteam bei <b><a href="mailto:sales@novalnet.de" style="text-decoration:none;">sales@novalnet.de</a></b>.';

// Text
$_['text_payment']          = 'Bezahlung';
$_['text_success']          = 'erfolgreich: Sie haben ge&auml;ndert Novalnet Kreditkarte PCI Modul!';
$_['text_novalnet_cc_pci']  = '<a href=\''.$shop_url.'www.novalnet.de\' target=\'_blank\'"><img src="'.$shop_url.'www.novalnet.de/img/NN_Logo_T.png" border="0" alt="novalnet.de" title="Novalnet AG" /></a>';

// Entry
$_['entry_total']           = 'Summe:<br /><span class="help">Der Warenkorb muss diese Summe beinhalten, damit dieses Zahlungsverfahren verf&uuml;gbar ist.</span>';
$_['entry_test']            = 'Testmodus einschalten';
$_['entry_merchant']        = 'Novalnet H&auml;ndler ID<br /><span class="help">Geben Sie Ihre Novalnet H&auml;ndler-ID ein</span>';
$_['entry_authorisation']   = 'Novalnet Authorisierungsschl&uuml;ssel<br /><span class="help">Geben Sie Ihren Novalnet-Authorisierungsschl&uuml;ssel ein</span>';
$_['entry_productid']       = 'Novalnet Produkt ID<br /><span class="help">Geben Sie Ihre Novalnet Produkt-ID ein</span>';
$_['entry_tariffid']        = 'Novalnet Tarif ID<br /><span class="help">Geben Sie Ihre Novalnet Tarif-ID ein</span>';
$_['entry_bookingamount']   = 'Manuelle &Uuml;berpr&uuml;fung des Betrags in Cent<br /><span class="help">Bitte den Betrag in Cent eingeben</span>';
$_['entry_productid2']      = 'Zweite Novalnet Produkt ID<br /><span class="help">zur manuellen &Uuml;berpr&uuml;fung</span>';
$_['entry_tariffid2']       = 'Zweite Novalnet Tarif ID<br /><span class="help">zur manuellen &Uuml;berpr&uuml;fung</span>';
$_['entry_enduser']         = 'Informationen f&uuml;r den End kunden<br /><span class="help">wird im Bezahlformular erscheinen</span>';
$_['entry_sort_order']      = 'Sortierung nach<br /><span class="help">Sortierung der Anzeige. Der niedrigste Wert wird zuerst angezeigt</span>';
$_['entry_order_status']    = 'Bestellstatus setzen<br /><span class="help">Setzen Sie den Status von &uuml;ber dieses Zahlungsmodul durchgef&uuml;hrten Bestellungen auf diesen Wert</span>';
$_['entry_geo_zone']        = 'Geografisches Gebiet<br/><span class="help">Wird ein Bereich ausgew&auml;hlt, dann wird dieses Modul nur f&uuml;r den ausgew&auml;hlten Bereich aktiviert</span>';
$_['entry_proxy']           = 'Proxy-Server<br /><span class="help">Wenn Sie einen Proxy-Server einsetzen, tragen Sie hier Ihre Proxy-IP und den Port ein (z.B. www.proxy.de:80)</span>';
$_['entry_password']        = 'Novalnet Paymentzugriffsschl&uuml;ssel <br/><span class="help">Geben Sie Ihr Novalnet Paymentzugriffsschl&uuml;ssel ein </span>';
$_['entry_status']          = 'Modul aktivieren';
$_['entry_text']            = 'Ja';
$_['entry_text']            = 'Nein';
$_['text_true']             = 'wahr';
$_['text_false']            = 'Falsch';
$_['text_enabled']          = 'Aktiviert';
$_['text_disabled']         = 'Deaktiviert';

// Error
$_['error_permission']      = 'Warnung: Sie sind nicht berechtigt, die Zahlung &auml;ndern Novalnet Kreditkarte PCI';
$_['error_warning']    	    = 'Bitte beheben Sie die folgenden Fragen zu aktualisieren Novalnet Kreditkarte PCI Einstellungen!';
$_['error_merchant']        = 'Novalnet H&auml;ndler ID!';
$_['error_authorisation']   = 'Novalnet H&auml;ndler Authorisierungsschl&uuml;ssel!';
$_['error_productid']       = 'Novalnet Produkt ID';
$_['error_tariffid']        = 'Novalnet Tarif ID!';
$_['error_password']        = 'Passwort erforderlich!';
$_['error_bookingamount']   = 'Produkt-ID2 und / oder Tarif-ID2 fehlen!';
?>
