<?php
/**
 * @version		$Id: language.php 3392 2013-08-11 16:53:23Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']     = 'Sprache';

// Text
$_['text_success']      = 'Datensatz erfolgreich geändert!';

// Column
$_['column_name']       = 'Name';
$_['column_code']       = 'Code';
$_['column_sort_order'] = 'Reihenfolge';
$_['column_action']     = 'Aktion';

// Entry
$_['entry_name']        = 'Name';
$_['entry_code']        = 'Code<span class="help">Bitte nicht ändern, wenn dies die Standardsprache ist. Wird unter anderem zur HTML-Erstellung verwendet und muss XHTML-Konform sein.<br />Beispiel:de, de-DE oder de_DE</span>';
$_['entry_locale']      = 'Lokale Einstell.<span class="help">Wird zur Browsererkennung verwendet.<br />Beispiel: de,de_de,de-DE,de_DE (mehrere mit Komma trennen)</span>';
$_['entry_image']       = 'Bild<span class="help">Wird zur Anzeige der Flaggen verwendet.<br />Sollte nicht größer als 16x16px sein und als .png vorliegen</span>';
$_['entry_directory']   = 'Ordner<span class="help">Verzeichnis in welchem sich die Sprachdateien befinden (Groß-/Kleinschreibung beachten)<br />Beispiel: de_DE [Standard] oder de oder german</span>';
$_['entry_filename']    = 'Dateiname<span class="help">Name der Hauptsprachendatei ohne Dateierweiterung<br />(kann der Gleiche wie der Ordner sein, z.B. de_DE)</span>';
$_['entry_status']      = 'Status<span class="help">Im Shop als Sprachenauswahl zeigen/verbergen</span>';
$_['entry_sort_order']  = 'Reihenfolge';

// Error
$_['error_permission']  = 'Keine Rechte für diese Aktion!';
$_['error_name']        = 'Titel muss zwischen 3 und 32 Buchstaben lang sein!';
$_['error_code']        = 'Sprachcode muss aus mindestens zwei Buchstaben bestehen!';
$_['error_locale']      = 'Lokalisierung erforderlich!';
$_['error_image']       = 'Name der Bilddatei muss zwischen 3 und 64 Zeichen lang sein!';
$_['error_directory']   = 'Verzeichnis erforderlich!';
$_['error_filename']    = 'Dateiname muss zwischen 3 und 64 Zeichen lang sein!';
$_['error_default']     = 'Sprache kann nicht gelöscht werden da als Standardsprache des Shops definiert!';
$_['error_admin']       = 'Sprache ist aktuell die Standardsprache der Verwaltung und kann daher nicht gelöscht werden!';
$_['error_store']       = 'Sprache kann nicht gelöscht werden da sie aktuell %s Shops zugeordnet ist!';
$_['error_order']       = 'Sprache kann nicht gelöscht werden weil sie noch %s Aufträgen zugeordnet ist!';