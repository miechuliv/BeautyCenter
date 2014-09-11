<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

$_['lang_heading_title']        = 'OpenBay Pro für eBay | Einstellungen';
$_['lang_openbay']              = 'OpenBay Pro';
$_['lang_ebay']                 = 'eBay';
$_['lang_settings']             = 'Einstellungen';
$_['lang_save']                 = 'Sichern';
$_['lang_cancel']               = 'Abbrechen';
$_['lang_yes']                  = 'Ja';
$_['lang_update']               = 'Aktual.';
$_['lang_no']                   = 'Nein';
$_['lang_import']               = 'Import';
$_['lang_clear']                = 'Löschen';
$_['lang_add']                  = 'Neu';
$_['lang_remove']               = 'Entfernen';
$_['lang_load']                 = 'Lade';
$_['lang_text_success']         = 'Einstellungen wurden gespeichert';

$_['lang_error_save_settings']  = 'Zuerst müssen die Einstellungen gespeichert werden.';

$_['lang_tab_token']            = 'API Details';
$_['lang_tab_general']          = 'Allgemein';
$_['lang_tab_setup']            = 'Einstellungen';
$_['lang_tab_defaults']         = 'Vorgaben Listungen';
$_['lang_tab_shipping']         = 'Vorgaben Versand';

$_['lang_legend_api']           = 'API Verbindungsdetails';
$_['lang_legend_app_settings']  = 'Anwendungseinstellungen';
$_['lang_legend_default_import']= 'Vorgabe Importeinstellungen';
$_['lang_legend_payments']      = 'Zahlarten';
$_['lang_legend_returns']       = 'Retouren';
$_['lang_legend_linkup']        = 'Verlinkte Artikel';
$_['lang_legend_usage']         = 'Verwendung';
$_['lang_legend_subscription']  = 'Abonnement';

$_['lang_error_oc_version']     = 'Die installierte Shopversion wird <u>nicht</u> unterstützt';

$_['lang_status']               = 'Status';
$_['lang_enabled']              = '<span style="color:green">Aktiv</span>';
$_['lang_disabled']             = '<span style="color:red;">Ni. Aktiv</span>';
$_['lang_obp_token']            = 'Token';
$_['lang_obp_token_register']   = 'Hier klicken um Token zu registrieren';
$_['lang_obp_token_renew']      = 'Hier klicken um Token zu erneuern';
$_['lang_obp_secret']           = 'Geheim';
$_['lang_obp_string1']          = 'Verschlüsselung Wert 1';
$_['lang_obp_string2']          = 'Verschlüsselung Wert 2';
$_['lang_app_setting_msg']      = 'Die Anwendungseinstellungen bestimmen wie OpenBay Pro arbeitet und im System integriert ist.';
$_['lang_app_end_ebay']         = 'Beende Listung?<span class="help">Wenn ein Artikel ausverkauft ist, soll das Listing auf eBay beendet werden?</span>';
$_['lang_app_relist_ebay']      = 'Nochmalige Listing?<span class="help">Wenn ein ausverkaufter Artikel verlinkt und wieder auf Lager ist, wird er automatisch auch eBay wieder verfügbar</span>';
$_['lang_app_logging']          = 'Aktiviere Aufzeichnungen';
$_['lang_app_currency']         = 'Standardwährung';
$_['lang_app_currency_msg']     = 'Basierend auf den lokalen Shopwährungen';
$_['lang_app_cust_grp']         = 'Kundengruppe<span class="help">Welcher Kundengruppe sollen neue Kunden automatisch zugeordnet werden?</span>';

$_['lang_app_stock_allocate']   = 'Reservierung Lager<span class="help">Wann soll lokaler Lagerstand reserviert werden?</span>';
$_['lang_app_stock_1']          = 'Wenn Kunde kauft';
$_['lang_app_stock_2']          = 'Wenn Kunde bezahlt hat';
$_['lang_created_hours']        = 'Limit neue Aufträge<span class="help">Aufträge werden als NEU eingestuft wenn jünger (in Stunden) als angegeben sind (Standard 72 Stunden)</span>';

$_['lang_import_ebay_items']    = 'Importiere eBay-Artikel';

$_['lang_import_pending']       = 'Importiere unbezahlte Aufträge';
$_['lang_import_def_id']        = 'Import Standardstatus';
$_['lang_import_paid_id']       = 'Status Bezahlt';
$_['lang_import_shipped_id']    = 'Status Versendet';
$_['lang_import_cancelled_id']  = 'Status Abgebrochen';
$_['lang_import_refund_id']     = 'Status Rückerstattet';
$_['lang_import_part_refund_id']= 'Status tw. Rückerstattet';

$_['lang_developer']            = 'Entwickler';
$_['lang_developer_desc']       = 'Wrte sollte nicht verwendet werden sofern nicht dazu angewiesen wurde.';
$_['lang_developer_empty']      = 'Lösche ALLE Daten?';
$_['lang_setting_desc']         = 'Vorgaben dienen zur Vereinfachung verschiedener eBay-Optionen. Alle Vorgaben können jederzeit geändert werden.';
$_['lang_payment_instruction']  = 'Zahlungsanweisungen';
$_['lang_payment_paypal']       = 'PayPal Akzeptiert';
$_['lang_payment_paypal_add']   = 'PayPal Geschäftsemail';
$_['lang_payment_cheque']       = 'Scheck Akzeptiert';
$_['lang_payment_card']         = 'Kreditkarten Akzeptiert';
$_['lang_payment_desc']         = 'Siehe Beschreibung (z.B. Banküberweisung)';
$_['lang_payment_imediate']     = 'Sofortzahlung erforderlich';
$_['lang_tax_listing']          = 'Produktsteuer<span class="help">Wird ein Wert aus der Liste verwendet sicherstellen dass Produkt auf eBay mit richtiger Steuer angezeigt wird</span>';
$_['lang_tax_use_listing']      = 'Verwende Wert von eBay';
$_['lang_tax_use_value']        = 'Verwende Wert für alles';
$_['lang_tax']                  = '% Steuer verwendet für alles<span class="help">Verwendung bei Import von Artikeln und Aufträgen</span>';

$_['lang_ajax_dev_enter_pw']    = 'Bitte Adminpasswort angeben';
$_['lang_ajax_dev_enter_warn']  = 'Diese Aktion ist ncht ungefährlich, daher muss Admin mit Passwort bestätigen.';

$_['lang_legend_notify_settings']           = 'Einstellungen Benachrichtigungen';
$_['lang_openbaypro_update_notify']         = 'Auftragsupdates<span class="help">Anwendung nur bei automatischen Updates</span>';
$_['lang_notify_setting_msg']               = 'Wann sollen Kunden benachrichtigt werden. Aktivieren kann zukünftige Berwertungen positiv beeinflussen';
$_['lang_openbaypro_confirm_notify']        = 'Neuer Auftrag - Käufer<span class="help">Informiere Käufer mit dem Standardbestätigungsemail</span>';
$_['lang_openbaypro_confirmadmin_notify']   = 'Neuer Auftrag - Admin<span class="help">Informiert den Admin bei neuen Aufträgen</span>';
$_['lang_openbaypro_brand_disable']         = 'Copyright Link<span class="help">Entfernt den Hinweis auf OpenBay Pro in Emails</span>';

$_['lang_listing_1day']             = '1 Tag';
$_['lang_listing_3day']             = '3 Tage';
$_['lang_listing_5day']             = '5 Tage';
$_['lang_listing_7day']             = '7 Tage';
$_['lang_listing_10day']            = '10 Tage';
$_['lang_listing_30day']            = '30 Tage';
$_['lang_listing_gtc']              = 'GTC - Bis Kunde storniert';
$_['lang_openbay_duration']         = 'Vorgabe Dauer Listung<span class="help">GTC ist nur bei eBay-Shop möglich</span>';
$_['lang_address_format']           = 'Vorgabe Adressformat<span class="help">Nur verwendet wenn das Land noch kein vordefiniertes Format besitzt</span>';

$_['lang_legend_stock_rep']         = 'Lagerberichte';
$_['lang_desc_stock_rep']           = 'Sendet an Admins in Abständen ein Email über Lagerstand - nur verfügbar in ausgewählten Abos.';
$_['lang_stock_reports']            = 'Sende Berichte';
$_['lang_stock_summary']            = 'Sende kompletten Bericht<span class="help">Wenn nicht aktiv, nur Zusammenfassung wird gesendet</span>';

$_['lang_api_status']               = 'API Verbindungsstatus';
$_['lang_api_checking']             = 'Überprüfe ...';
$_['lang_api_ok']                   = '<span style="color:green;">Verbindung OK, Token läuft ab</span>';
$_['lang_api_failed']               = '<span style="color:red;">Überprüfung fehlgeschlagen</span>';
$_['lang_api_connect_fail']         = '<span style="color:red;">Verbindungsfehler</span>';
$_['lang_api_connect_error']        = '<span style="color:red;">Keine Verbindung</span>';

$_['lang_create_date']              = 'Datum für neue Aufträge';
$_['lang_create_date_0']            = 'Wenn in lokalen Shop hinzugefügt';
$_['lang_create_date_1']            = 'Wenn auf eBay angelegt';
$_['lang_obp_detail_update']        = 'Hier klicken um Store-URL &amp; Kontaktemail zu aktualisieren';
$_['lang_developer_repairlinks']    = 'Repariere Artikellinks';

$_['lang_timezone_offset']          = 'Zeitzonen Verschiebung<span class="help">In Stunden - 0 ist GMT (Grossbritannien). Nur wenn eBay-Zeit zur Auftragserstellung verwendet wird</span>';