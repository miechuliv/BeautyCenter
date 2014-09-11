<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

$_['heading_title']					= 'Amazon US Listungen';

/* Headers, tab names */
$_['item_links_header_text']		= 'Artikellinks';
$_['quick_listing_header_text']		= 'Schnelllistung';
$_['advanced_listing_header_text']	= 'Erweiterte Listung';
$_['saved_heder_text']				= 'Gespeicherte Listungen';


$_['item_links_tab_text']			= 'Artikellinks';
$_['quick_listing_tab_text']		= 'Schnelllistung';
$_['advanced_listing_tab_text']		= 'Erweiterte Listung';
$_['saved_tab_text']				= 'Gespeicherte Listungen';

$_['text_error_connecting']			= 'Achtung: es gab ein Problem mit der Verbindung zum API-Server. Bitte OpenBay Pro Amazon US Einstellungen überprüfen. Besteht das Problem weiterhin, dann bitte den Support von Welford kontaktieren.';

/* Quick/advanced listing tabs */
$_['quick_listing_description']		= 'Diese Methode verwenden wenn Produkt bereits bei Amazon gelistet ist. Übereinstimmung wenn ASIN, ISBN, UPS, EAN gleich sind';
$_['advanced_listing_description']	= 'Diese Methode anwenden um neue Listung bei Amazon anzulegen.';
$_['listing_row_text']				= 'Listung für Produkt';
$_['already_saved_text']			= 'Dieses Produkt ist bereits in den gespeicherten Listungen. Klicken um zu erneuern.';
$_['save_button_text']				= 'Sichern';
$_['save_upload_button_text']		= 'Sichern &amp; Upload';
$_['saved_listings_button_text']	= 'Zeige gespeicherte Listungen';
$_['cancel_button_text']			= 'Abbrechen';
$_['field_required_text']			= 'Feld ist erforderlich!';
$_['not_saved_text']				= 'Listung konnte nicht gespeichert werden - Felder überprüfen!';
$_['chars_over_limit_text']			= 'Zeichen über Limit';
$_['minimum_length_text']			= 'Mindestlänge ist';
$_['characters_text']				= 'Zeichen';
$_['delete_confirm_text']			= 'Sicher löschen?';

$_['clear_image_text']				= 'Löschen';
$_['browse_image_text']				= 'Hinzufügen';

$_['category_selector_field_text']	= 'Amazon Kategorie';

/* Item links tab */
$_['item_links_description']		= 'Hier können nicht bereits bei Amazon gelistete Produkte bearbeitet werden. Dies erlaubt eine Lagerstandskontrolle zwischen den aktivierten Marktplätzen. Wenn openStock installier ist, können Links zu einzelnen Amazon SKUs erstellt werden (laden von Produkten des Shop nach Amazon erstellt diese Links automatisch)';
$_['new_link_table_name']			= 'Neuer Link';
$_['new_link_product_column']		= 'Produkt';
$_['new_link_sku_column']			= 'SKU';
$_['new_link_amazonus_sku_column']	= 'Amazon Artikel SKU';
$_['new_link_action_column']		= 'Aktion';

$_['item_links_table_name']			= 'Artikellinks';

/* Marketplaces */
$_['marketplaces_field_text']		= 'Marktplatz';
$_['marketplaces_help']				= 'Standardmarktplatz bei Amazon kann in den Amazoneinstellungen definiert werden.';

/* Saved listings tab */
$_['saved_listings_description']	= 'Übersicht aller Produkte welche lokal gespeichert sind und bereit zum Hochladen zu Amazon sind. Klicken um Hochladen zu starten.';
$_['actions_edit_text']				= 'Bearbeiten';
$_['actions_remove_text']			= 'Entfernen';
$_['upload_button_text']			= 'Upload';

$_['name_column_text']				= 'Name';
$_['model_column_text']				= 'Art.Nr.';
$_['sku_column_text']				= 'SKU';
$_['amazonus_sku_column_text']		= 'Amazon Artikel-SKU';
$_['actions_column_text']			= 'Aktion';
$_['saved_localy_text']				= 'Listung lokal gespeichert';
$_['uploaded_alert_text']			= 'Gespeicherte Listing(s) hoch geladen!';
$_['upload_failed']					= 'Produkt mit SKU: "%s" nicht hoch geladen - Grund: "%s" > Hochladen abgebrochen.';

/* ITEM LINKS */
$_['links_header_text']				= 'Artikel verlinken';
$_['links_desc1_text']				= 'Verlinkte Artikel erlauben eine Lagerstandskontrolle der Amazon-Listungen.<br />Jedes hochgeladene Produkt bei Amazon wird mit dem lokalen Lagerstand abgeglichen';
$_['links_desc2_text']				= 'Entweder Amazon SKU und Name angeben oder alle nicht verlinkten Artikel hochladen und anschließend die Amazon SKU angeben (hochladen der Artikel vom lokalen Shop nach Amazon verlinkt automatisch)';
$_['links_load_btn_text']			= 'Laden';
$_['links_new_link_text']			= 'Neuer Link';
$_['links_autocomplete_product_text']	= 'Produkt<span class="help">(Autovervollständigung)</span>';
$_['links_amazonus_sku_text']			= 'Amazon Artikel-SKU';
$_['links_action_text']				= 'Aktion';
$_['links_add_text']				= 'Neu';
$_['links_add_sku_tooltip']			= 'Weitere SKU';
$_['links_remove_text']				= 'Entfernen';
$_['links_linked_items_text']		= 'Verlinkte Artikel';
$_['links_unlinked_items_text']		= 'Ni. verlinkte Artikel';
$_['links_name_text']				= 'Name';
$_['links_model_text']				= 'Art.Nr.';
$_['links_sku_text']				= 'SKU';
$_['links_amazonus_sku_text']		= 'Amazon Artikel-SKU';
$_['links_sku_empty_warning']		= 'Amazon SKU darf nicht leer sein!';
$_['links_name_empty_warning']		= 'Produktname darf nicht leer sein!';
$_['links_product_warning']			= 'Produkt nicht vorhanden (bitte Autovervollständigung verwenden)';