<?php
/**
 * @version		$Id: product.php 3286 2013-05-30 12:58:56Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

/**
 * Generic
 */
$_['lang_page_title']               = 'eBay Listung';
$_['lang_cancel']                   = 'Abbruch';
$_['lang_none']                     = 'Kein';
$_['lang_preview']                  = 'Vorschau';
$_['lang_pixels']                   = 'Pixel';
$_['lang_yes']                      = 'Ja';
$_['lang_no']                       = 'Nein';
$_['lang_add']                      = 'Neu';
$_['lang_remove']                   = 'Entfernen';
$_['lang_save']                     = 'Sichern';
$_['lang_other']                    = 'Andere';
$_['lang_select']                   = 'Wählen';
$_['lang_loading']                  = 'Lade ..';
$_['lang_confirm_action']           = 'Sicher löschen?';

$_['lang_return']                   = 'Zurück zu Produkte';
$_['lang_view']                     = 'Zeige Listungen';
$_['lang_edit']                     = 'Bearbeiten';

$_['lang_catalog_pretext']          = 'Zeigt alle Artikel aus dem eBay - Katalog, zuerst eine Kategorie wählen.';
$_['lang_feature_pretext']          = 'Zeigt alle Artikeleinzelheiten - zuerst eine Kategorie wählen.';

/**
 * Ajax messages
 */
$_['lang_ajax_noload']              = 'Keine Verbindung möglich';
$_['lang_ajax_catproblem']          = 'Zuerst müssen die Kategorien bereinigt werden. Bitte neu aufbauen.';
$_['lang_ajax_item_condition']      = 'Artikelzustand';
$_['lang_ajax_error_cat']           = 'Bitte eine eBay-Kategorie wählen';
$_['lang_ajax_error_sku']           = 'Produkt ohne SKU kann nicht übermittelt werden';
$_['lang_ajax_error_name']          = 'Produkt ohne Name kann nicht übermittelt werden';
$_['lang_ajax_error_name_len']      = 'Produktname darf nicht länger als 80 Ziechen lang sein';
$_['lang_ajax_error_loc']           = 'Postleitzahl fehlt';
$_['lang_ajax_error_time']          = 'Versandzeit feht';
$_['lang_ajax_error_nat_svc']       = 'Mind. ein lokaler Versanddienst muss angegeben sein';
$_['lang_ajax_error_stock']         = 'Ohne Lagerstand kann keine Listung erfolgen';
$_['lang_ajax_error_duration']      = 'Dauer der Listung auswählen, dazu Kategorie auswählen';
$_['lang_ajax_image_size']          = 'Es müssen die Masse für Bild sowie Vorschaubild vorhanden sein';
$_['lang_ajax_duration']            = 'Es muss eine Zeitdauer der Listung angegeben sein';
$_['lang_ajax_noimages']            = 'Sollen sicher keine eBay-Bilder hinzu gefügt werden?';
$_['lang_ajax_mainimage']           = 'Es muss ein Hauptbild für eBay ausgewählt sein';

/**
 * Tabs
 */
$_['lang_tab_general']              = 'Kategorie';
$_['lang_tab_feature']              = 'Ausstattung';
$_['lang_tab_description']          = 'Beschreibung';
$_['lang_tab_images']               = 'Vorlage &amp; Gallerie';
$_['lang_tab_price']                = 'Preis &amp; Details';
$_['lang_tab_payment']              = 'Zahlungsart';
$_['lang_tab_shipping']             = 'Versand';
$_['lang_tab_returns']              = 'Retouren';

/**
 * Category tab
 */
$_['lang_category']                 = 'Kategorie';
$_['lang_category_suggested']       = 'Von eBay vorgeschlagene Kategorie';
$_['lang_category_suggested_help']  = 'Basierend auf dem Titel';
$_['lang_category_suggested_check'] = 'Überprüfe vorgeschlagene Ebay-Kategorien - bitte warten ..';
$_['lang_category_popular']         = 'Beliebte Kategorien';
$_['lang_category_popular_help']    = 'Basieren auf bisherigen Verkäufen';
$_['lang_category_checking']        = 'Überprüfe Anforderungen für eBay-Kategorie - bitte warten ..';
$_['lang_category_features']        = 'Artikelspezifikationen<span class="help">Je genauer der Artikel beschrieben ist, desto besser werden Kunden ihn finden. Ebenso kann dann eBay den Gesamtscore anheben was zu besseren Verkäufen führt.</span>';

/**
 * Description Tab
 */
$_['lang_title']                    = 'Titel';
$_['lang_title_error']              = 'Titel darf nicht mehr als 80 Zeichen lang sein';
$_['lang_subtitle']                 = 'Untertitel';
$_['lang_subtitle_help']            = 'ebay kann zusätzliche Gebühren für Untertitel verlangen - <a href="http://pages.ebay.co.uk/help/sell/seller-fees.html" target="_blank" onclick="subtitleRefocus();">siehe Gebühren</a>';
$_['lang_template']                 = 'Vorlage';
$_['lang_template_link']            = 'Eigene Vorlage benötigt?';
$_['lang_description']              = 'Beschreibung';

/**
 * Images tab
 */
$_['lang_images_text_1']            = 'eBay Bilder weren zu eBay hochgeladen und können eventuell Mehrkosten bedeuten.<br />Übergrößen sowie Galleriebilder sind ebenfalls Erweiterungen welche verrechnet werden können.';
$_['lang_images_text_2']            = 'Vorlagenbilder am lokalen Server werden der Listung hinzu gefügt und sind kostenlos (die Vorlage muss den Platzhalter {gallery} enthalten)';
$_['lang_image_gallery']            = 'Größe Galleriebild';
$_['lang_image_thumb']              = 'Größe Vorschaubild';
$_['lang_template_image']           = 'Vorlagenbild';
$_['lang_main_image_ebay']          = 'eBay Hauptbild';
$_['lang_image_ebay']               = 'eBay Bild';
$_['lang_images_none']              = 'Keine Bilder für dieses Produkt';
$_['lang_images_supersize']         = 'Übergroße Bilder<span class="help">Bilder mit Übergröße</span>';
$_['lang_images_gallery_plus']      = 'Große Galleriebilder<span class="help">Große Bilder für Suchergebnisse</span>';

/**
 * Price and details tab
 */
$_['lang_listing_condition']        = 'Artikelzustand';
$_['lang_listing_duration']         = 'Dauer Listung';
$_['lang_listing_1day']             = '1 Tag';
$_['lang_listing_3day']             = '3 Tage';
$_['lang_listing_5day']             = '5 Tage';
$_['lang_listing_7day']             = '7 Tage';
$_['lang_listing_10day']            = '10 Tage';
$_['lang_listing_30day']            = '30 Tage';
$_['lang_listing_gtc']              = 'GTC - Solange gültig bis Abbruch';

$_['lang_stock_matrix']             = 'Lagerstand';
$_['lang_stock_col_qty_total']      = 'Lagernd';
$_['lang_stock_col_qty']            = 'Anführen';
$_['lang_stock_col_qty_reserve']    = 'Reserviert';
$_['lang_stock_col_comb']           = 'Kombination';
$_['lang_stock_col_price']          = 'Preis';
$_['lang_stock_col_enabled']        = 'Aktiviert';
$_['lang_qty']                      = 'Zeige Anzahl<span class="help">Niedrigere Menge angeben wenn Lagerstand auf eBay weniger als Lokaler sein soll</span>';
$_['lang_price_ex_tax']             = 'Preis ohne Steuer';
$_['lang_price_ex_tax_help']        = 'Nettopreis - wird nicht an eBay gesendet.';
$_['lang_price_inc_tax']            = 'Preis inkl. Steuer';
$_['lang_price_inc_tax_help']       = 'Bruttopreis auf eBay welche Kunden zu bezahlen haben.';
$_['lang_tax_inc']                  = 'Steuer inklusive';
$_['lang_offers']                   = 'Erlaube Käufern ein Angebot zu machen';
$_['lang_private']                  = 'Privater Verkauf<br />(Käufername wird nicht angezeigt)';
$_['lang_imediate_payment']         = 'Sofortige Bezahlung erforderlich?';
$_['lang_payment']                  = 'Akzeptierte Bezahlarten';
$_['lang_payment_pp_email']         = 'PayPal Verkäuferemail';
$_['lang_payment_instruction']      = 'Zahlungsanweisungen';

/**
 * Shipping tab
 */
$_['lang_item_postcode']            = 'Postleitzahl<span class="help">Hilft eBay die Listung nach Gegend einzuordnen</span>';
$_['lang_item_location']            = 'Stadt oder Bezirk<span class="help">Angabe eines Ortes ist weniger genau als Postleitzahl</span>';
$_['lang_despatch_time']            = 'Lieferzeit<span class="help">Max. Tage für Versand</span>';
$_['lang_shipping_national']        = 'Nationaler Lieferdienst';
$_['lang_shipping_international']   = 'Internationaler Lieferdienst';
$_['lang_service']                  = '<strong>Service</strong>';
$_['lang_shipping_cost_first']      = '<strong>Kosten</strong>';
$_['lang_shipping_cost_add']        = '<strong>Jedes zusätzlich</strong>';
$_['lang_shipping_post_to']         = '<strong>Sende an</strong>';
$_['lang_shipping_post_ww']         = 'Weltweit';
$_['lang_shipping_post_dm']         = 'Inland und folgende';
$_['lang_shipping_max_national']    = 'Für die gewählte Kategorie erlaubt eBay maximal nachfolgende Versandkosten ';
$_['lang_shipping_getitfast']       = 'Schnelllieferung!';

/**
 * Returns tab
 */
$_['lang_return_accepted']          = 'Retoure angenommen?';
$_['lang_return_type']              = 'Retourart';
$_['lang_return_type_1']            = 'Erstattung';
$_['lang_return_type_2']            = 'Ersattung oder Austausch';
$_['lang_return_policy']            = 'Retourenbedingungen<strong>Innerhalb der EU verboten!</strong>';
$_['lang_return_days']              = 'Tage für Retouren';
$_['lang_return_scosts']            = 'Versandkosten';
$_['lang_return_scosts_1']          = 'Käufer bezahlt alle Retourkosten';
$_['lang_return_scosts_2']          = 'Verkäufer bezahlt alle Retourkosten';
$_['lang_return_buy_pays']          = 'Käufer bezahlt';
$_['lang_return_seller_pays']       = 'Verkäufer bezahlt';
$_['lang_return_10day']             = '10 Tage';
$_['lang_return_14day']             = '14 Tage';
$_['lang_return_30day']             = '30 Tage';
$_['lang_return_60day']             = '60 Tage';

/**
 * Review page
 */
$_['lang_review_costs']             = 'Kosten Listung';
$_['lang_review_costs_total']       = 'Gesamt eBay Gebühren';
$_['lang_review_edit']              = 'Bearbeite Listung';
$_['lang_review_preview']           = 'Vorschau Listung';
$_['lang_review_preview_help']      = '(eBay Platzhalter werden nicht angezeigt)';

/**
 * Created page
 */
$_['lang_created_title']            = 'Listung erstellt';
$_['lang_created_msg']              = 'Die eBay Listung wurde erstellt. Die eBay-Nummer ist';

/**
 * Failed page
 */
$_['lang_failed_title']             = 'Übermittlung der Listung fehlgeschlagen';
$_['lang_failed_msg1']              = 'Das kann mehrere Gründe haben.';
$_['lang_failed_li1']               = 'Entweder ein neuer eBay-Verkäufer oder zuwenig Verkäufe in der Vergangenheit - dann eBay kontaktieren um die Einschränkungen zu entfernen';
$_['lang_failed_li2']               = 'Es besteht kein Vertrag mit OpenBay Pro';
$_['lang_failed_li3']               = 'Der OpenBay Pro Zugang wurde gesperrt/ausgesetzt - bitte unter "Mein Konto" nachsehen';
$_['lang_failed_contact']           = 'Sollte der Fehler weiter bestehen und o.a. Gründe nicht zutreffen, dann bitte den Support von Wellmedia kontaktieren.';
$_['lang_gallery_select_all']       = 'Alle auswählen<span class="help">Klicken um alle auszuwählen</span>';
$_['lang_template_images']          = 'Vorlagenbilder';
$_['lang_ebay_images']              = 'eBay Bilder';
$_['lang_shipping_in_description']  = 'Frachtinfo in Beschreibung<span class="help">nur für US,GB,AU &amp; CA</span>';
$_['lang_profile_load']             = 'Lade Profil';
$_['lang_shipping_first']           = 'Erster Artikel ';
$_['lang_shipping_add']             = 'Weitere Artikel: ';
$_['lang_shipping_service']         = 'Service: ';
$_['lang_btn_remove']               = 'Entfernen';
$_['lang_shop_category']            = 'Shopkategorie';
$_['lang_tab_ebay_catalog']         = 'eBay Katalog';

/**
 * Option images
 */
$_['lang_option_images']            = 'Optionale Bilder';
$_['lang_option_images_grp']        = 'Optionsgruppe wählen';
$_['lang_option_images_choice']     = 'Bilder';
$_['lang_option_description']       = 'Optionale Bilder können zur Anzeige ausgewählter Optionen verwendet werden. Es kann jeweils ein Bilderset bis zu max. 12 Bilder erstellt werden. Standardbilder werden nach Optionswert geladen (siehe Katalog > Optionen)';

/**
 * Product catalog
 */
$_['lang_search_catalog']           = 'Suche in eBay-Katalog';
$_['lang_image_catalog']            = 'Verwende Standardbild<span class="help">Ändert Hauptbild und wird als eBay-Katalogbild eingesetzt</span>';

/**
 * Errors
 */
$_['lang_error_choose_category']    = 'Es muss eine Kategorie ausgewählt werden';
$_['lang_error_enter_text']         = 'Suchtext angeben';
$_['lang_error_no_stock']           = 'Artikel ohne Lagerstand kann nicht gelistet werden';
$_['lang_error_no_catalog_data']    = 'Kein eBay-Katalog für dieses ebay-Produkt gefunden';