<?php
/**
 * @version		$Id: pp_express.php 3392 2013-08-11 16:53:23Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']         = 'PayPal Express';

// Text
$_['text_payment']          = 'Zahlung';
$_['text_success']          = 'Datensatz erfolgreich geändert!';
$_['text_pp_express']       = '<a href="https://www.paypal.com/at/mrb/pal=BCZYWJHWKF23Y" target="_blank"><img src="view/image/payment/paypal.png" alt="PayPal" title="PayPal" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorization']    = 'Genehmigung';
$_['text_sale']             = 'Verkauf';
$_['text_clear']			= 'Löschen';
$_['text_browse']			= 'Einfügen';
$_['text_image_manager']	= 'Bildverwaltung';
$_['text_ipn']				= 'IPN URL<span class="help">Erfordlerich für Abos</span>';

// Entry
$_['entry_username']     	= 'API Benutzername';
$_['entry_password']     	= 'API Passwort';
$_['entry_signature']    	= 'API Unterschrift';
$_['entry_test']         	= 'Testmodus';
$_['entry_method']       	= 'Transaktionsart';
$_['entry_geo_zone']     	= 'Geozone';
$_['entry_status']       	= 'Status';
$_['entry_sort_order']   	= 'Reihenfolge';
$_['entry_icon_sort_order']	= 'Icon Reihenfolge';
$_['entry_debug']			= 'Fehler mitschreiben';
$_['entry_total']			= 'Summe<span class="help">Mindestgesamtsumme im Warenkorb damit diese Zahlungsart verfügbar ist.</span>';
$_['entry_order_status']	= 'Auftragsstatus';
$_['entry_currency']                    = 'Standardwährung<span class="help">Verwendung bei Suche</span>';
$_['entry_profile_cancellation']        = 'Kunden dürfen Profil löschen';


// Order Status
$_['entry_canceled_reversal_status']    = 'Auftragsstatus Erstattung Abgebrochen<span class="help">Eine Erstattung wurde abgebrochen. Dies passiert, wenn der Händler eine Reklamation ablehnt und die Gutschrift zurückgebucht wird.</span>';
$_['entry_completed_status']            = 'Status Fertig';
$_['entry_denied_status']               = 'Auftragsstatus Abgelehnt<span class="help">Händler (Webshop) hat die Zahlung abgelehnt. Dies passiert nur, wenn die Zahlung aufgrund der folgenden Gründe ausstehend war.</span>';
$_['entry_expired_status']              = 'Status abgelaufen';
$_['entry_failed_status']               = 'Auftragsstatus Fehlgeschlagen<span class="help">Die Zahlung ist fehlgeschlagen. Das passiert nur, wenn die Zahlung vom Kundenkonto abgebucht wurde.</span>';
$_['entry_pending_status']              = 'Auftragsstatus Ausstehend<span class="help">Die Zahlung ist ausstehend; Die pending_reason Variable enthält weitere Informationen. Wenn der Auftragsstatus auf Vollständig, Fehlgeschlagen oder Abgelehnt wechselt, wird eine weitere IPN Nachricht erzeugt.</span>';
$_['entry_processed_status']            = 'Status bearbeitet';
$_['entry_refunded_status']             = 'Auftragsstatus Erstattet<span class="help">Händler zahlt den Betrag zurück.</span>';
$_['entry_reversed_status']             = 'Auftragsstatus Gutschrift<span class="help">Eine Zahlung wurde aufgrund einer Rückbuchung gutgeschrieben, sie wird vom eigenen Konto dem Kunden gutgeschrieben. Der Grund wird in der reason_code Variable angegeben.</span>';
$_['entry_voided_status']               = 'Status ungültig';

// Customise area
$_['entry_display_checkout']            = 'Zeige Quickcheckout Icon';
$_['entry_allow_notes']                 = 'Erlaube Kommentare';
$_['entry_logo']                        = 'Logo<span class="help">Max. 750px(B) x 90px(H)<br />Logo sollte nur bei einer https-Verbindung eingesetzt werden!</span>';
$_['entry_border_colour']               = 'Farbe Kopf Rahmen<span class="help">HEX-Code - 6-stellig (z.B. FF0000 = Rot)</span>';
$_['entry_header_colour']               = 'Farbe Kopf Hintergrund<span class="help">HEX-Code - 6-stellig (z.B. FF0000 = Rot)</span>';
$_['entry_page_colour']                 = 'Farbe Seite Hintergrund<span class="help">HEX-Code - 6-stellig (z.B. FF0000 = Rot)</span>';

// Error
$_['error_permission']	= 'Keine Rechte für diese Aktion!';
$_['error_username']    = 'API Benutzername erforderlich!';
$_['error_password']    = 'API Passwort erforderlich!';
$_['error_signature']   = 'API Unterschrift erforderlich!';
$_['error_data']		= 'Keine Daten aus Request';
$_['error_timeout']     = 'Requestzeit überschritten';

// Tab headings
$_['tab_general']       = 'Allgemein';
$_['tab_api_details']   = 'API Details';
$_['tab_order_status']  = 'Auftragsstatus';
$_['tab_customise']     = 'Individueller Bezahlvorgang';