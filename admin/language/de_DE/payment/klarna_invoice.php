<?php
/**
 * @version		$Id: klarna_invoice.php 3392 2013-08-11 16:53:23Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']         = 'Klarna Rechnung';

// Text
$_['text_payment']          = 'Zahlung';
$_['text_success']          = 'Datensatz erfolgreich geändert!';
$_['text_klarna_invoice']   = '<a onclick="window.open(\'https://merchants.klarna.com/signup\');"><img src="view/image/payment/klarna.png" alt="Klarna" title="Klarna" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_live']             = 'Live';
$_['text_beta']             = 'Beta';
$_['text_sweden']           = 'Schweden';
$_['text_norway']           = 'Norwegen';
$_['text_finland']          = 'Finnland';
$_['text_denmark']          = 'Dänemark';
$_['text_germany']          = 'Deutschland';
$_['text_netherlands']      = 'Holland';

// Entry
$_['entry_merchant']        = 'Klarna Händlernummer<span class="help">(estore id) Von Klarna erhältlich.</span>';
$_['entry_secret']          = 'Geheimbegriff<span class="help">Von Klarna erhältlich</span>';
$_['entry_server']          = 'Server';
$_['entry_total']           = 'Summe<span class="help">Mindestgesamtbetrag des Warenkorbs um Zahlungsart im Frontend zu aktivieren.</span>';
$_['entry_order_status']    = 'Auftragsstatus';
$_['entry_pending_status']  = 'Wartestatus';
$_['entry_accepted_status'] = 'Akzeptiert Status';
$_['entry_geo_zone']        = 'Geozone';
$_['entry_status']          = 'Status';
$_['entry_sort_order']      = 'Reihenfolge';

// Error
$_['error_permission']      = 'Keine ausreichenden Rechte für diese Aktion!';
$_['error_xmlrpc']          = 'XML-RPC PHP Erweiterung muss aktiviert sein (ggf. Provider kontaktieren)!';
$_['error_merchant']        = 'Händlernummer  erforderlich!';
$_['error_secret']          = 'Geheimbegriff erforderlich!';