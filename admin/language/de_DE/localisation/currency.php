<?php
/**
 * @version		$Id: currency.php 3392 2013-08-11 16:53:23Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']        = 'Währung';

// Text
$_['text_success']         = 'Datensatz erfolgreich geändert!';

// Column
$_['column_title']         = 'Name';
$_['column_code']          = 'Code';
$_['column_value']         = 'Wert';
$_['column_date_modified'] = 'Letzte Änderung';
$_['column_action']        = 'Aktion';

// Entry
$_['entry_title']          = 'Name';
$_['entry_code']           = 'Code<span class="help">Bitte nicht ändern, wenn dies die Standardwährung ist.<br />Für gültige ISO Codes siehe <a href="http://www.xe.com/iso4217.php" target="_blank">hier</a></span>';
$_['entry_value']          = 'Wert<span class="help">Wert mit 1.00000 definieren wenn dies die Standardwährung ist.</span>';
$_['entry_symbol_left']    = 'Symbol davor';
$_['entry_symbol_right']   = 'Symbol danach';
$_['entry_decimal_place']  = 'Dezimalstellen';
$_['entry_status']         = 'Status';

// Error
$_['error_permission']     = 'Keine Rechte für diese Aktion!';
$_['error_title']          = 'Währungsbezeichnung muss zwischen 3 und 32 Buchstaben lang sein!';
$_['error_code']           = 'Währungscode muss aus 3 Buchstaben bestehen!';
$_['error_default']        = 'Währung kann nicht gelöscht werden da Standardwährung des Shops!';
$_['error_store']          = 'Währung kann nicht gelöscht werden weil sie noch in %s Shops verwendet wird!';
$_['error_order']          = 'Währung kann nicht gelöscht werden weil damit noch %s Bestellungen verknüpft ist!';