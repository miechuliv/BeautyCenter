<?php
/**
 * @version		$Id: customer_group.php 3392 2013-08-11 16:53:23Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']    = 'Kundengruppen';

// Text
$_['text_success']     = 'Datensatz erfolgreich geändert!';

// Column
$_['column_name']      = 'Bezeichnung';
$_['column_sort_order']= 'Reihenfolge';
$_['column_action']    = 'Aktion';

// Entry
$_['entry_name']                = 'Name';
$_['entry_description']         = 'Beschreibung<span class="help">Interne Notizen</span>';
$_['entry_approval']            = 'Genehmigung Neu<span class="help">Neue Kunden müssen vor dem ersten Anmelden vom Admin genehmigt werden.</span>';
$_['entry_company_id_display']  = 'Firmennummer<span class="help">Zeige Feld zur Angabe der Firmennummer</span>';
$_['entry_company_id_required'] = 'Firmennummer Pflicht<span class="help">Diese Kundengruppe muss ihre Firmennummer angeben um bezahlen zu können.</span>';
$_['entry_tax_id_display']      = 'Steuernummer<span class="help">Zeige Feld zur Angabe der Steuernummer (UID)</span>';
$_['entry_tax_id_required']     = 'Steuernummer Pflicht<span class="help">Diese Kundengruppe muss bei der Rechnungsadresse ihre Steuernummer angeben um bezahlen zu können.</span>';
$_['entry_sort_order']          = 'Reihenfolge';

// Error
$_['error_permission'] = 'Keine Rechte für diese Aktion!';
$_['error_name']       = 'Name muss zwischen 3 und 32 Zeichen lang sein!';
$_['error_default']    = 'Kundengruppe kann nicht gelöscht werden da als Standardvorgabe definiert!';
$_['error_store']      = 'Kundengruppe kann nicht gelöscht werden da sie %s Shops zugeordnet ist!';
$_['error_customer']   = 'Kundengruppe kann nicht gelöscht werden da ihr noch %s Kunden zugeordnet sind!';