<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

$_['lang_heading']                      = 'Artikelimport';
$_['lang_openbay']                      = 'OpenBay Pro';
$_['lang_page_title']                   = 'OpenBay Pro für eBay';
$_['lang_ebay']                         = 'eBay';
$_['lang_btn_return']                   = 'Zurück';
$_['lang_sync_import_line1']            = '<strong>Achtung!</strong> Damit wird alle Produkte von eBay importiert und die lokale Kategoriestruktur überschrieben. Es wird empfohlen zuerst die lokalen Kategorien und Produkte zu löschen.<br />Die Kategoriestruktur ist die von eBay, nicht die Lokale (wenn ein eBay-Shop aktiviert ist). Die importierten Kategorien können umbenannt, bearbeitet und gelöscht werden ohne dabei die eBay-Kategorien/-Produkte zu ändern.';
$_['lang_sync_import_line2']            = 'Diese Option macht Gebrauch von oftmaligem Aufruf der API - 1x pro Produkt sowie plus 1x alle 2 Artikel.';
$_['lang_sync_import_line3']            = 'Vor Durchführung sicherstellen dass der Server für eine solche Datenmenge konfiguriert ist.<br />Beispiel: 1000 eBay Artikel sind etwa 40 Mb groß. Sollte die Aktion fehlschlagen, ist das Serverlimit wahrscheinlich zu gering, es sollte mind. 128 Mb betragen.';
$_['lang_sync_server_size']             = 'Aktuell ist der Server konfiguriert für: ';
$_['lang_sync_memory_size']             = 'Das PHP Speicherlimit: ';
$_['lang_sync_item_description']        = 'Import Artikelbeschreibungen<span class="help">Damit wird alles auch HTML, Zähler usw. importiert</span>';
$_['lang_sync_notes_location']          = 'Import eBay Anmerkungen';
$_['lang_import_ebay_items']            = 'Import eBay Artikel';
$_['lang_import']                       = 'Import';
$_['lang_error_validation']             = 'Um das Modul zu aktiviern wird ein API-Zugang benötigt.';
$_['lang_ajax_import_confirm']          = 'Damit werden ALLE eBayprodukte als NEU importiert - fortfahren?<br />Diese Aktion kann NICHT abgebrochen werden - daher VORHER ein Backup der lokalen Daten erstellen!';
$_['lang_ajax_import_notify']           = 'Der Importvorgang wurde begonnen - Zeitdauer pro 1.000 ca. 1 Stunde.';
$_['lang_ajax_load_error']              = 'Serververbindung konnte nicht erstellt werden';
$_['lang_maintenance_fail']             = 'Der Shop ist aktuell im Wartungsmodus - Import daher nicht möglich!';
$_['lang_import_images_msg1']           = 'Bilder von eBay in Warteschleife. Seite nochmals aufrufen wenn die Nummer sich nicht erhöht';
$_['lang_import_images_msg2']           = 'hier klicken';
$_['lang_import_images_msg3']           = 'und warten. Weiter Infos dazu <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=8_45" target="_blank">hier</a>';