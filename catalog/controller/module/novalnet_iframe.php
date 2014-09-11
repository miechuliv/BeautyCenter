<?php
/*require(dirname(__FILE__).'/config.php');
require_once(DIR_SYSTEM . 'startup.php');

// Config
$config = new Config();

$registry = new Registry();
print_r($registry);
echo $config->get('config_store_id'); exit();*/

class ControllerModuleNovalnetIframe extends Controller
{
	function novalnet_new_cc(){	
		$request = array();	
		
		$order_info = $_SESSION['novalnet_cc_order_info'];
		
		$nn_language =	strtoupper($order_info['language_code']);
		$nn_cc_vendor_id = html_entity_decode(trim($this->config->get('novalnet_cc_merchant')), ENT_QUOTES, 'UTF-8'); 
		$nn_cc_product = html_entity_decode(trim($this->config->get('novalnet_cc_productid')), ENT_QUOTES, 'UTF-8');
		$nn_cc_product2 = html_entity_decode(trim($this->config->get('novalnet_cc_productid2')), ENT_QUOTES, 'UTF-8');
		$manual_check_limit = html_entity_decode(trim($this->config->get('novalnet_cc_manualamount')), ENT_QUOTES, 'UTF-8');
		  
				
		$amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], FALSE);
        $amount = sprintf('%0.2f', $amount);
        $amount = preg_replace('/^0+/', '', $amount);
        $amount = str_replace('.', '', $amount);
    
	    $product		    = $nn_cc_product; 
        $manual_check_limit = $manual_check_limit;
        $manual_check_limit = str_replace(',', '', $manual_check_limit);
        $manual_check_limit = str_replace('.', '', $manual_check_limit);
	
        if($manual_check_limit && $amount>=$manual_check_limit){
           $product = $nn_cc_product2;
	    }
		 
		$request['nn_lang_nn'] = $nn_language;
		$request['nn_vendor_id_nn'] = $nn_cc_vendor_id;
		$request['nn_product_id_nn'] = $product;
		$request['nn_payment_id_nn'] = 6;#default
		
		$url = "http://payport.novalnet.de/direct_form.jsp";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request);  // add POST fields
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$output = curl_exec($ch);
		curl_close($ch);
		echo $output;
		exit;
		}
}
?>
