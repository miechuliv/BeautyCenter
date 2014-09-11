<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['lang_heading_title']        = 'OpenBay Pro';
$_['lang_text_manager']         = 'OpenBay Pro Verwaltung';

// Text
$_['text_install']              = '<span style="color:grey;">Installieren</span>';
$_['text_uninstall']            = '<span style="red;">Deinstallieren</span>';
$_['lang_text_success']         = 'Einstellungen erfolgreich gespeichert';
$_['lang_text_no_results']      = 'Keine Ergebnisse vorhanden';
$_['lang_checking_version']     = 'Überprüfe Softwareversion';
$_['lang_btn_manage']           = 'Verwalten';
$_['lang_btn_retry']            = 'Wiederholen';
$_['lang_btn_save']             = 'Speichern';
$_['lang_btn_cancel']           = 'Abbrechen';
$_['lang_btn_update']           = 'Update';
$_['lang_btn_settings']         = 'Einstellungen';
$_['lang_btn_patch']            = 'Patch';
$_['lang_btn_test']             = 'Verbindungstest';
$_['lang_latest']               = 'Die neueste Version ist in Verwendung';
$_['lang_installed_version']    = 'Installierte Version';
$_['lang_admin_dir']            = 'Adminverzeichnis';
$_['lang_admin_dir_desc']       = 'Wurde das Adminverzeichnis (Standard admin) geändert, dann hier den neuen Ordnernamen angeben';
$_['lang_version_old_1']        = 'Eine neue Version ist verfügbar - die installierte ist';
$_['lang_version_old_2']        = 'die neueste ist';
$_['lang_use_beta']             = 'Verwende eine Betarelease';
$_['lang_use_beta_2']           = '<span style="color:red;">NICHT empfohlen!</span>';
$_['lang_test_conn']            = 'Teste FTP-Verbindung';
$_['lang_text_run_1']           = 'Update ausführen';
$_['lang_text_run_2']           = 'Los';
$_['lang_no']                   = 'Nein';
$_['lang_yes']                  = 'Ja';
$_['lang_language']             = 'API Antwortsprache';
$_['lang_getting_messages']     = 'Hole OpenBay Pro Nachrichten';

// Column
$_['lang_column_name']          = 'Pluginname';
$_['lang_column_status']        = 'Status';
$_['lang_column_action']        = 'Aktion';

// Error
$_['error_permission']          = 'Hinweis: keien Rechte zum Bearbeiten dieses Moduls!';
$_['lang_error_retry']          = 'Kann keine Verbindung zum OpenBay-Server aufbauen.';

// Updates
$_['lang_use_pasv']                     = 'Verwende passives FTP';
$_['field_ftp_user']                    = 'FTP Benutzername';
$_['field_ftp_pw']                      = 'FTP Passwort';
$_['field_ftp_server_address']          = 'FTP Serveradresse';
$_['field_ftp_root_path']               = 'FTP Pfad auf Server';
$_['field_ftp_root_path_info']          = '(Keine führenden Slashes z.B. httpdocs/www)';
$_['desc_ftp_updates']                  = 'Updates aktivieren bedeutet kein manuelles Bearbeiten. Es werden keine FTP-Daten an die API gesendet.<br />';

//Updates
$_['lang_run_patch_desc']               = 'Update Patch angeben<span class="help">Nur notwendig bei einem manuellem Update</span>';
$_['lang_run_patch']                    = 'Wende Patch an';
$_['update_error_username']             = 'Benutzername fehlt';
$_['update_error_password']             = 'Passwort fehlt';
$_['update_error_server']               = 'Serveradresse fehlt';
$_['update_error_admindir']             = 'Adminverzeichnis fehlt';
$_['update_okcon_noadmin']              = 'Verbindung OK, aber das lokale Adminverzeichnis kann nicht gefunden werden';
$_['update_okcon_nofiles']              = 'Verbindung OK, aber das lokale Shopverzeichnis kann nicht gefunden werden - ist der root-Pfad richtig?';
$_['update_okcon']                      = 'Verbindung OK, Shopverzeichnis gefunden';
$_['update_failed_user']                = 'Mit diesem Benutzer ist keine Anmeldung möglich';
$_['update_failed_connect']             = 'Kann den Server nicht erreichen';
$_['update_success']                    = 'Modul wurde aktualisiert (v.%s)';
$_['lang_patch_notes1']                 = 'Änderungen aktueller und früherer Updates';
$_['lang_patch_notes2']                 = 'hier klicken';

//Help tab
$_['lang_help_title']                   = 'Hilfe &amp; Unterstützung';
$_['lang_help_support_title']           = 'Unterstützung';
$_['lang_help_support_description']     = 'Bitte zuerst die <a href="http://shop.openbaypro.com/index.php?route=information/faq" title="OpenBay Pro für OpenCart FAQ">FAQ</a> lesen, eventuell gibt es schon eine Antwort auf die Frage. <br />Falls dennoch nicht, kann <a href="http://support.welfordmedia.co.uk" title="OpenBay Pro für OpenCart Support">hier</a> ein neues Ticket erstellt werden';
$_['lang_help_template_title']          = 'Neue eBay Vorlage';
$_['lang_help_template_description']    = 'Informationen für Entwickler &amp; Designer zur Vorlagenerstellung <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=30" title="OpenBay Pro HTML Vorlagen für eBay">hier</a>';

$_['lang_tab_help']                     = 'Hilfe';
$_['lang_help_guide']                   = 'Benutzeranweisungen';
$_['lang_help_guide_description']       = 'Downladen und lokal Handbücher für eBay &amp; Amazon ansehen <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=37" title="OpenBay Pro Benutzeranweisungen">hier klicken</a>';

$_['lang_mcrypt_text_false']            = 'Die PHP-Funktion "mcrypt_encrypt" ist nicht aktiviert - bitte Provider kontaktieren.';
$_['lang_mb_text_false']                = 'Die PHP-Bibliothek "mb strings" ist nicht aktiviert - bitte Provider kontaktieren.';
$_['lang_ftp_text_false']               = 'Einige PHP FTP-Funktionen sind nicht verfügbar - bitte Provider kontaktieren.';
$_['lang_error_oc_version']             = 'Die installierte Shopversion wurde noch nicht mit diesem Modul getestet - es können unerwartete Probleme auftauchen.';
$_['lang_patch_applied']                = 'Patch angewendet';
$_['faqbtn']                            = 'FAQ ansehen';
$_['lang_clearfaq']                     = 'Bereinige versteckte FAQ popups';
$_['lang_clearfaqbtn']                  = 'Reinigen';

// Ajax elements
$_['lang_ajax_ebay_shipped']            = 'Der Auftrag wird bei eBay automatisch als versendet markiert';
$_['lang_ajax_play_shipped']            = 'Der Auftrag wird bei play.com automatisch als versendet markiert';
$_['lang_ajax_amazoneu_shipped']        = 'Der Auftrag wird bei Amazon EU automatisch als versendet markiert';
$_['lang_ajax_amazonus_shipped']        = 'Der Auftrag wird bei Amazon US automatisch als versendet markiert';
$_['lang_ajax_play_refund']             = 'Eine Rückerstattung für dieses Auftrag wird bei play.com automatisch erstellt';
$_['lang_ajax_refund_reason']           = 'Grund für Rückerstattung';
$_['lang_ajax_refund_message']          = 'Rückerstattung Nachricht';
$_['lang_ajax_refund_entermsg']         = 'Es muss eine Nachricht zur Rückersattung angegeben werden';
$_['lang_ajax_refund_charmsg']          = 'Rückerstattungsnachricht muss weniger als 1.000 Zeichen lang sein';
$_['lang_ajax_refund_charmsg2']         = 'Die Nachricht darf kein < sowie > enthalten';
$_['lang_ajax_courier']                 = 'Botendienst';
$_['lang_ajax_courier_other']           = 'Anderer Botendienst';
$_['lang_ajax_tracking']                = 'Nachverfolgungsnr.';
$_['lang_ajax_tracking_msg']            = 'Es muss eine Nachverfolgungsnr. angegeben werden, falls keine vorhanden dann "none" angeben';
$_['lang_ajax_tracking_msg2']           = 'Die Nachverfolgungsnr. darf keine < sowie > enthalten';
$_['lang_ajax_tracking_msg3']           = 'Es muss ein Botendienst ausgewählt werden wenn eine Nachverfolgungsnr. hochgeladen werden soll.';
$_['lang_ajax_tracking_msg4']           = 'Feld für Botendienst leer lassen wenn keiner verwendet wird.';

$_['lang_title_help']                   = 'Hilfe zu OpenBay Pro benötigt?';
$_['lang_pod_help']                     = 'Hilfe';
$_['lang_title_manage']                 = 'Verwaltet OpenBay Pro; Updates, Einstellungen und mehr';
$_['lang_pod_manage']                   = 'Verwalten';
$_['lang_title_shop']                   = 'OpenBay Pro Shop; Eerweiterungen, Vorlagen und mehr';
$_['lang_pod_shop']                     = 'Shop';

$_['lang_checking_messages']            = 'Überprüfe auf Nachrichten';
$_['lang_title_messages']               = 'Nachrichten &amp; Mitteilungen';