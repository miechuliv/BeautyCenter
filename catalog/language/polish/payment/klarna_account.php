<?php
// Text
$_['text_title']           = 'Konto Klarna';
$_['text_pay_month']       = 'Konto Klarna - Płać od %s/miesięcznie <span id="klarna_account_toc_link"></span><script text="javascript">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Account({ el: \'klarna_account_toc_link\', eid: \'%s\',   country: \'%s\'});})</script>';
$_['text_information']     = 'Dane Konta Klarna';
$_['text_additional']      = 'Konto Klarna wymaga dodatkowych informacji przed realizacją zamówienia.';
$_['text_wait']            = 'Proszę czekać!';
$_['text_male']            = 'Mężczyzna';
$_['text_female']          = 'Kobieta';
$_['text_year']            = 'Rok';
$_['text_month']           = 'Miesiąc';
$_['text_day']             = 'Dzień';
$_['text_payment_option']  = 'Dostępne opcje płatności';
$_['text_single_payment']  = 'Jednorazowa Płatność';
$_['text_monthly_payment'] = '%s - %s miesięcznie';
$_['text_comment']         = "Numer faktury Klarna: %s\n%s/%s: %.4f";

// Entry
$_['entry_gender']         = 'Płeć:';
$_['entry_pno']            = 'Numer Ubezpieczenia:<br /><span class="help">Proszę wpisać swój numer Social Security.</span>';
$_['entry_dob']            = 'Data urodzenia:';
$_['entry_phone_no']       = 'Numer telefonu:<br /><span class="help">Proszę wpisać numer telefonu.</span>';
$_['entry_street']         = 'Ulica:<br /><span class="help">Proszę pamiętać, że dostawa może odbyć się tylko na zarejestrowany adres w przypadku płatności Klarna.</span>';
$_['entry_house_no']       = 'Numer.:<br /><span class="help">Proszę wpisać numer domu.</span>';
$_['entry_house_ext']      = 'Numer / Nazwa Mieszkania.:<br /><span class="help">Proszę wpisać numer lub nazwę mieszkania. Np: A, B, C, Red, Blue itd.</span>';
$_['entry_company']        = 'Regon:<br /><span class="help">Proszę wpisać Company\'s registration number</span>';

// Error
$_['error_deu_terms']      = 'Musisz zaakceptować politykę prywatności Klarna (Datenschutz)';
$_['error_address_match']  = 'Jeśli chcesz zapłacić przy pomocy konta Klarna Adres Fakturowania i Adres Wysyłki muszą być takie same.';
$_['error_network']        = 'Wystąpił błąd podczas łączenia się z Klarna. Spróbuj ponownie później.';
?>
