<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

//Payment page links
$_['text_amazon_checkout']	= '<a onclick="window.open(\'http://go.amazonservices.com/UKCBASPOpenCart.html\');"><img src="view/image/payment/amazon.png" alt="Amazon Bezahlen" title="Amazon Bezahlen" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_amazon_join']		= '<a href="http://go.amazonservices.com/UKCBASPOpenCart.html" title="Click here to join Amazon Payments">Hier klciken um ein Amazon Bezahlen KOnto zu eröffnen</a>';

//Headings
$_['heading_title']			= 'Amazon Bezahlbutton';
$_['text_home']				= 'Home';
$_['text_payment']			= 'Zahlung';

//Text
$_['text_cron_job_url']		= 'Cronjob URL';
$_['help_cron_job_url']		= 'Einen Cronjob definieren zum Aufruf dieser URL';
$_['text_cron_job_token']	= 'Geheimes Token';
$_['help_cron_job_token']	= 'Hinweis: leicht zu merken, aber dennoch schwierig zu erraten';
$_['text_access_key']		= 'Zugangsschlüssel';
$_['text_access_secret']	= 'Geheimschlüssel';
$_['text_merchant_id']		= 'Händlernummer';
$_['text_marketplace']		= 'Marktplatz';
$_['text_germany']			= 'Deutschland';
$_['text_uk']				= 'Grossbritannien';
$_['text_checkout_mode']	= 'Checkoutmodus';
$_['text_geo_zone']			= 'Geozone';
$_['text_status']			= 'Status';
$_['text_live']				= 'Live';
$_['text_sandbox']			= 'Sandbox';
$_['text_sort_order']		= 'Reihenfolge';
$_['text_minimum_total']	= 'Mindestbestellsumme Gesamt';
$_['text_all_geo_zones']	= 'Alle Geozonen';
$_['text_status_enabled']	= 'Aktiv';
$_['text_status_disabled']	= 'Ni. Aktiv';
$_['text_default_order_status']		= 'Wartestellung';
$_['text_ready_order_status']		= 'Status Fertig zum Versand';
$_['text_canceled_order_status']	= 'Status Abgebrochen';
$_['text_shipped_order_status']		= 'Status Versendet';
$_['text_last_cron_job_run']		= 'Cronjob wurde zuletzt ausgeführt';
$_['text_allowed_ips']				= 'Erlaubte IP-Adressen';
$_['text_add']						= 'Neu';
$_['text_upload_success']			= 'Datei wurde erfolgreich hochgeladen';
$_['help_adjustment']				= 'Fett markierte Felder und mindestens 1 "-adj" Feld sind erforderlich';
$_['help_allowed_ips']				= 'Leer lassen wenn jeder den Checkoutbutton sehen soll';

// Buttons
$_['button_cancel']	= 'Abbrechen';
$_['button_save']	= 'Speichern';

// Errors
$_['error_permissions']			= 'Hinweis: keine Rechte zum Bearbeiten dieses Moduls';
$_['error_empty_access_secret']	= 'Geheimschlüssel ist erforderlich';
$_['error_empty_access_key']	= 'Zugangsschlüssel ist erforderlich';
$_['error_empty_merchant_id']	= 'Händlernummer ist erforderlich';
$_['error_curreny']				= 'Der Shop muss %s Wahrungen installiert und aktiviert haben';
$_['error_upload']				= 'Upload fehlgeschlagen';

// Checkout button settings
$_['text_button_settings']		= 'Checkoutbutton Einstellungen';
$_['text_colour']				= 'Farbe';
$_['text_orange']				= 'Orange';
$_['text_tan']					= 'Gelbbraun';
$_['text_white']				= 'Weiß';
$_['text_light']				= 'Hell';
$_['text_dark']					= 'Dunkel';
$_['text_size']					= 'Größe';
$_['text_medium']				= 'Mittel';
$_['text_large']				= 'Groß';
$_['text_x_large']				= 'Extragroß';
$_['text_background']			= 'Hintergrund';
$_['text_download']				= '<a href="%s">Download</a> eine Vorlage';

// Messages
$_['text_success']				= 'Modul erfolgreich aktualisiert';

// Order Info
$_['text_amazon_details']		= 'Amazon Details';
$_['text_amazon_order_id']		= 'Amazon Auftragsnr.';
$_['text_upload']				= 'Upload';
$_['text_upload_template']		= 'Hochladen des Templates durch klicken des Buttons. Sichergehen dass es als Tab-Delimited Datei gespeichert wurde.';
$_['tab_order_adjustment']		= 'Auftragseinstellung';

//Table columns
$_['column_submission_id']		= 'Übermittlungsnr.';
$_['column_status']				= 'Status';
$_['column_text']				= 'Antwort';
$_['column_amazon_order_item_code']	= 'Amazon Auftragsnr.';