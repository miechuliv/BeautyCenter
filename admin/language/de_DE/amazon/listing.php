<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

$_['lang_title']                    = 'Neue Amazon Listung';
$_['lang_openbay']                  = 'OpenBay Pro';
$_['lang_amazon']                   = 'Amazon';

$_['button_search']                 = 'Suche';
$_['button_new']                    = 'Neues Produkt';
$_['button_return']                 = 'Zur�ck zu Produkte';
$_['button_amazon_price']           = 'Amazonpreis holen';
$_['button_list']                   = 'Bei Amazon listen';

$_['text_view_on_amazon']           = 'Zeige auf Amazon';
$_['text_list']                     = 'Zeigen';
$_['text_new']                      = 'Neu';
$_['text_used_like_new']            = 'Gebraucht - wie neu';
$_['text_used_very_good']           = 'Gebraucht - sehr guter Zustand';
$_['text_used_good']                = 'Gebraucht - guter Zustand';
$_['text_used_acceptable']          = 'Gebraucht - Akzeptabel';
$_['text_collectible_like_new']		= 'Sammlerst�ck - wie neu';
$_['text_collectible_very_good']	= 'Sammlerst�ck - sehr guter Zustand';
$_['text_collectible_good']			= 'Sammlerst�ck - guter Zustand';
$_['text_collectible_acceptable']	= 'Sammlerst�ck - Akzeptabel';
$_['text_refurbished']				= 'Erneuert';
$_['text_germany']					= 'Deutschland';
$_['text_france']					= 'Frankreich';
$_['text_italy']					= 'Italien';
$_['text_spain']					= 'Spanien';
$_['text_united_kingdom']			= 'Grossbritannien';

$_['text_product_sent']				= 'Produkt erfolgreich an Amazon gesendet';
$_['text_product_not_sent']			= 'Produkt konnt enicht an Amazon gesendet werden - Grund: %s';

$_['lang_no_results']				= 'Keine Ergebnisse';

$_['column_image']					= 'Bild';
$_['column_asin']					= 'ASIN<span style="help">Amazon Standard Identifikationsnummer, siehe <a href="http://www.amazon.de/gp/seller/asin-upc-isbn-info.html" target="_blank">Amazons Abk�rzungen</a></span>';
$_['column_name']					= 'Name';
$_['column_price']					= 'Preis';
$_['column_action']					= 'Aktion';

$_['entry_sku']						= 'SKU';
$_['entry_condition']				= 'Zustand';
$_['entry_condition_note']			= 'Anmerkung Zustand';
$_['entry_price']					= 'Preis';
$_['entry_sale_price']				= 'Verkaufspreis';
$_['entry_quantity']				= 'Anzahl';
$_['entry_start_selling']			= 'Verf�gbar ab Datum';
$_['entry_restock_date']			= 'Datum Lagerauff�llung';
$_['entry_country_of_origin']		= 'Herkunftsland';
$_['entry_release_date']			= 'Ver�ffentlichungsdatum';
$_['entry_from']					= 'Von';
$_['entry_to']						= 'Bis';

$_['help_sku']						= 'Einmalige Artikelnummer zugewiesen durch H�ndler';
$_['help_restock_date']				= 'Datum der sp�testm�glichen Auslieferung von Bestellr�ckst�nden. Datum sollte nicht mehr als 30 Tage betragen ansonsten die Bestellung automatisch storniert wird.';
$_['help_sale_price']				= 'Verkaufspreis muss ein Anfangs- und Enddatum haben';

$_['lang_not_in_catalog']			= 'Oder wenn nicht im Katalog&nbsp;&nbsp;&nbsp;';

$_['error_text_missing']			= 'Suchbegriffe fehlen';
$_['error_data_missing']			= 'Es fehlen notwendige Angaben';
$_['error_missing_asin']			= 'ASIN fehlt';
$_['error_marketplace_missing']		= 'Bitte eine Marktplatz w�hlen';
$_['error_condition_missing']		= 'Zustand muss bestimmt werden';
$_['error_fetch']					= 'Konnte Daten nicht abholen';
$_['error_amazon_price']			= 'Preis von Amazon konnte nicht geholt werden';
$_['error_stock']					= 'Ohne Lagerstand kann kein Artikel gelistet werden';
$_['error_sku']						= 'SKU fehlt';
$_['error_price']					= 'Preis fehlt';

$_['tab_required_info']				= 'Erforderlich';
$_['tab_additional_info']			= 'Weitere Optionen';

$_['lang_placeholder_search']		= 'Produktname, UPC, EAN, ISBN or ASIN angeben';
$_['lang_placeholder_condition']	= 'Hier den Zustand der Produkte angeben';

/* Headers, tab names */
$_['item_links_header_text']		= 'Artikellinks';
$_['quick_listing_header_text']		= 'Schnelllistung';
$_['advanced_listing_header_text']	= 'Erweiterte Listung';
$_['saved_heder_text']				= 'Gespeicherte Listungen';
$_['lang_tab_main']					= 'Haupt';

$_['item_links_tab_text']			= 'Artikellinks';
$_['quick_listing_tab_text']		= 'Schnelllistung';
$_['advanced_listing_tab_text']		= 'Erweiterte Listung';
$_['saved_tab_text']				= 'Gespeicherte Listungen';

$_['text_error_connecting']			= 'Hinweis: es gibt ein Problem mit der Verbindung zum Welfords API-Server. BItte die OpenBay Pro Amazon Einstellungen �berpr�fen. Besteht das Problem weiterhin, bitte den Support von Welford kontaktieren.';

/* Quick/advanced listing tabs */
$_['quick_listing_description']		= 'Diese Methode verwenden wenn Produkt bereits bei Amazon gelistet ist. �bereinstimmung wenn ASIN, ISBN, UPS, EAN gleich sind';
$_['advanced_listing_description']	= 'Diese Methode anwenden um neue Listung bei Amazon anzulegen.';
$_['listing_row_text']				= 'Listung f�r Produkt';
$_['already_saved_text']			= 'Dieses Produkt ist bereits in den gespeicherten Listungen. Klicken um zu erneuern.';
$_['save_button_text']				= 'Sichern';
$_['save_upload_button_text']		= 'Sichern &amp; Upload';
$_['saved_listings_button_text']	= 'Zeige gespeicherte Listungen';
$_['cancel_button_text']			= 'Abbrechen';
$_['field_required_text']			= 'Feld ist erforderlich!';
$_['not_saved_text']				= 'Listung konnte nicht gespeichert werden - Felder �berpr�fen!';
$_['chars_over_limit_text']			= 'Zeichen �ber Limit';
$_['minimum_length_text']			= 'Mindestl�nge ist';
$_['characters_text']				= 'Zeichen';
$_['delete_confirm_text']			= 'Sicher l�schen?';

$_['clear_image_text']				= 'L�schen';
$_['browse_image_text']				= 'Hinzuf�gen';

$_['category_selector_field_text']	= 'Amazon Kategorie';

/* Item links tab */
$_['item_links_description']		= 'Hier k�nnen nicht bereits bei Amazon gelistete Produkte bearbeitet werden. Dies erlaubt eine Lagerstandskontrolle zwischen den aktivierten Marktpl�tzen. Wenn openStock installier ist, k�nnen Links zu einzelnen Amazon SKUs erstellt werden (laden von Produkten des Shop nach Amazon erstellt diese Links automatisch)';
$_['new_link_table_name']			= 'Neuer Link';
$_['new_link_product_column']		= 'Produkt';
$_['new_link_sku_column']			= 'SKU';
$_['new_link_amazon_sku_column']	= 'Amazon Artikel SKU';
$_['new_link_action_column']		= 'Aktion';

$_['item_links_table_name']			= 'Artikellinks';


/* Marketplaces */
$_['marketplaces_field_text']		= 'Marktplatz';
$_['marketplaces_help']				= 'Standardmarktplatz bei Amazon kann in den Amazoneinstellungen definiert werden.';

/* Saved listings tab */
$_['saved_listings_description']	= '�bersicht aller Produkte welche lokal gespeichert sind und bereit zum Hochladen zu Amazon sind. Klicken um Hochladen zu starten.';
$_['actions_edit_text']				= 'Bearbeiten';
$_['actions_remove_text']			= 'Entfernen';
$_['upload_button_text']			= 'Upload';

$_['name_column_text']				= 'Name';
$_['model_column_text']				= 'Art.Nr.';
$_['sku_column_text']				= 'SKU';
$_['amazon_sku_column_text']		= 'Amazon Artikel-SKU';
$_['actions_column_text']			= 'Aktion';
$_['saved_localy_text']				= 'Listung lokal gespeichert';
$_['uploaded_alert_text']			= 'Gespeicherte Listing(s) hoch geladen!';
$_['upload_failed']					= 'Produkt mit SKU: "%s" nicht hoch geladen - Grund: "%s" > Hochladen abgebrochen.';


/* ITEM LINKS */
$_['links_header_text']				= 'Artikel verlinken';
$_['links_desc1_text']				= 'Verlinkte Artikel erlauben eine Lagerstandskontrolle der Amazon-Listungen.<br />Jedes hochgeladene Produkt bei Amazon wird mit dem lokalen Lagerstand abgeglichen';
$_['links_desc2_text']				= 'Entweder Amazon SKU und Name angeben oder alle nicht verlinkten Artikel hochladen und anschlie�end die Amazon SKU angeben (hochladen der Artikel vom lokalen Shop nach Amazon verlinkt automatisch)';
$_['links_load_btn_text']			= 'Laden';
$_['links_new_link_text']			= 'Neuer Link';
$_['links_autocomplete_product_text']	= 'Produkt<span class="help">(Autovervollst�ndigung)</span>';
$_['links_amazon_sku_text']			= 'Amazon Artikel-SKU';
$_['links_action_text']				= 'Aktion';
$_['links_add_text']				= 'Neu';
$_['links_add_sku_tooltip']			= 'Weitere SKU';
$_['links_remove_text']				= 'Entfernen';
$_['links_linked_items_text']		= 'Verlinkte Artikel';
$_['links_unlinked_items_text']		= 'Ni. verlinkte Artikel';
$_['links_name_text']				= 'Name';
$_['links_model_text']				= 'Art.Nr.';
$_['links_sku_text']				= 'SKU';
$_['links_amazon_sku_text']			= 'Amazon Artikel-SKU';
$_['links_sku_empty_warning']		= 'Amazon SKU darf nicht leer sein!';
$_['links_name_empty_warning']		= 'Produktname darf nicht leer sein!';
$_['links_product_warning']			= 'Produkt nicht vorhanden (bitte Autovervollst�ndigung verwenden)';

$_['option_default']				= '-- Option w�hlen --';
$_['lang_error_load_nodes']			= 'Kann Verlinkung nicht laden';

/* Listin edit page */
$_['text_edit_heading']				= '�bersicht Listungen';

$_['text_has_saved_listings']		= 'Dieses Produkt hate eine oder mehrere lokal gespeicherte Listungen.';

$_['text_product_links']			= 'Produktlinks';
$_['button_create_new_listing']		= 'Neue Listung';
$_['button_remove_links']			= 'Entferne Links';
$_['button_saved_listings']			= 'Zeige gespeicherte Listungen';

$_['column_name']					= 'Produktname';
$_['column_model']					= 'Art.Nr.';
$_['column_combination']			= 'Kombination';
$_['column_sku']					= 'SKU';
$_['column_amazon_sku']				= 'Amazon Artikel-SKU';