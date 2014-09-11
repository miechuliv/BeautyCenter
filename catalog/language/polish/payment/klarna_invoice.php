<?php
// Text
$_['text_title']          = 'Faktury Klarna';
$_['text_fee']            = 'Faktury Klarna - Zapłać w ciągu 14 dni <span id="klarna_invoice_toc_link"></span> (+%s)<script text="javascript\">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\', charge: %s});})</script>';
$_['text_no_fee']         = 'Faktury Klarna - Zapłać w ciągu 14 dni <span id="klarna_invoice_toc_link"></span><script text="javascript">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\'});})</script>';
$_['text_additional']     = 'Faktury Klarna wymaga dodatkowej Informacji przed realizacją zamówienia.';
$_['text_wait']           = 'Proszę czekać!';
$_['text_male']           = 'Mężczyzna';
$_['text_female']         = 'Kobieta';
$_['text_year']           = 'Rok';
$_['text_month']          = 'Miesiąc';
$_['text_day']            = 'Dzień';
$_['text_comment']        = "Numer Faktury Klarna: %s\n%s/%s: %.4f";

// Entry
$_['entry_gender']         = 'Płeć:';
$_['entry_pno']            = 'Numer Ubezpieczenia:<br /><span class="help">Prosimy wpisać numer Social Security.</span>';
$_['entry_dob']            = 'Data urodzenia:';
$_['entry_phone_no']       = 'Numer telefonu:<br /><span class="help">Prosimy wpisać numer telefonu.</span>';
$_['entry_street']         = 'Ulica:<br /><span class="help">Proszę pamiętać, że przy płatności z konta Klarna adres wysyłki musi odpowiadać adresowi płatności.</span>';
$_['entry_house_no']       = 'Numer Domu.:<br /><span class="help">Prosimy wpisać numer domu.</span>';
$_['entry_house_ext']      = 'Mieszkanie.:<br /><span class="help">Prosimy wpisać numer lub nazwę mieszkania. Np: A, B, C, Red, Blue itd.</span>';
$_['entry_company']        = 'Regon:<br /><span class="help">Prosimy wpisać numer Regon</span>';

// Error
$_['error_deu_terms']     = 'Musisz zaakceptować politykę prywatności Klarna (Datenschutz)';
$_['error_address_match'] = 'Przy płatności z konta Klarna adres wysyłki musi odpowiadać adresowi płatności';
$_['error_network']       = 'Wystąpił błąd podczas łączenia się z Klarna. Spróbuj ponownie później.';
?>
