<?php
/**
 * @version		$Id: zone.php 3392 2013-08-11 16:53:23Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']          = 'Zonen';

// Text
$_['text_success']           = 'Datensatz erfolgreich geändert!';

// Column
$_['column_name']            = 'Name';
$_['column_code']            = 'Code';
$_['column_country']         = 'Land';
$_['column_action']          = 'Aktion';

// Entry
$_['entry_status']           = 'Status';
$_['entry_name']             = 'Name';
$_['entry_code']             = 'Code<span class="help">Offizieller, 3-stelliger ISO 639-2 Code<br />Mehr dazu <a onclick="window.open(\'http://en.wikipedia.org/wiki/ISO_3166-1\')">hier</a></span>';
$_['entry_country']          = 'Land';

// Error
$_['error_permission']       = 'Keine Rechte für diese Aktion!';
$_['error_name']             = 'Name muss zwischen 3 und 128 Zeichen lang sein!';
$_['error_default']          = 'Zone kann nicht gelöscht werden da als Standardvorgabe definiert!';
$_['error_store']            = 'Zone kann nicht gelöscht werden da sie aktuell %s Shop(s) zugeordnet ist!';
$_['error_address']          = 'Zone kann nicht gelöscht werden da sie %s Adressbucheinträgen zugeordnet ist!';
$_['error_affiliate']        = 'Zone kann nicht gelöscht werden da sie %s Partnern zugeordnet ist!';
$_['error_zone_to_geo_zone'] = 'Zone kann nicht gelöscht werden da sie %s Geozonen zugeordnet ist!';