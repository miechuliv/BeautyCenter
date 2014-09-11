<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']			= 'PayPal Payments Pro Payflow Edition';

// Text
$_['text_payment']			= 'Zahlung';
$_['text_success']			= 'Modul wurde erfolgreich aktualisiert!';
$_['text_pp_pro_pf']		= '<a onclick="window.open(\'https://www.paypal.com/uk/mrb/pal=W9TBB5DTD6QJW\');"><img src="view/image/payment/paypal.png" alt="PayPal Payments Pro Payflow Edition" title="PayPal Payments Pro Payflow Edition" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorization']	= 'Genehmigung';
$_['text_sale']				= 'Verkauf';

// Entry
$_['entry_vendor']       = 'Anbieter<span class="help">Händlernr. welche bei der Anmeldung zu Website Payments Pro Konto erteilt wurde</span>';
$_['entry_user']         = 'Benutzer<span class="help">Wurden mehrere Benutzer auf PPPro angelegt, hier die ID desjenigen angeben welcher für Überweisungen berechtigt ist. Ist nur ein Berechtigter eingetragen, hier dieselbe ID wie beim Anbieter angeben.</span>';
$_['entry_password']     = 'Passwort<span class="help">Das 6 bis 32 Zeichen lange Passwort, dass während der Registrierung definiert wurde.</span>';
$_['entry_partner']      = 'Partner<span class="help">Die ID welche vom PayPal Verkäufer erhalten wurde (für die Payflow SDK). Wurde direkt bei PayPal gekauft, dann hier die PayPal UK ID angeben.</span>';
$_['entry_test']         = 'Testmodus<span class="help">Modul im Test- (JA) oder Livemodus (Nein) verwenden?</span>';
$_['entry_transaction']  = 'Transaktionsmethode';
$_['entry_total']        = 'Summe<span class="help">Mindestgesamtsumme im Warenkorb damit diese Zahlungsart verfügbar ist.</span>';
$_['entry_order_status'] = 'Auftragsstatus';
$_['entry_geo_zone']     = 'Geozone';
$_['entry_status']       = 'Status';
$_['entry_sort_order']   = 'Reihenfolge';

// Error
$_['error_permission']   = 'Keine Rechte für diese Aktion!';
$_['error_vendor']       = 'Lieferant erforderlich!';
$_['error_user']         = 'Benutzer erforderlich!';
$_['error_password']     = 'Passwort erforderlich!';
$_['error_partner']      = 'Partner erforderlich!';