<?php
#########################################################
#                                                       #
#  CC / CREDIT CARD PCI payment method class      	    #
#  This module is used for real time processing of      #
#  Credit card data of customers.     			        #
#                                                       #
#  Released under the GNU General Public License.       #
#  This free contribution made by request.              #
#  If you have found this script usefull a small        #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_cc_pci.php                         #
#                                                       #
#########################################################
class ControllerPaymentnovalnetccpci extends Controller {
	protected $key = 6;
	public $cc_pci_product_id;
	public $cc_pci_tariff_id;
	public $cc_pci_manual_check_limit;
	public $cc_pci_product_id2; 
	public $cc_pci_tariff_id2;
	public $cc_pci_authcode; 
	public $cc_pci_vendor_id;
	public $cc_pci_test_mode;
	public $shop_url;
	
	protected function index() {
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
	    $this->language->load('payment/novalnet_cc_pci');
	    $this->data['text_creditcardpci'] = $this->language->get('text_creditcardpci');
		$this->data['text_heading'] = $this->language->get('text_heading');
	    $this->data['text_novalnet_redirection'] = $this->language->get('text_novalnet_redirection');
	    $this->data['text_novalnet_testmode_desc'] = $this->language->get('text_novalnet_testmode_desc');
		$this->data['testmode_desc'] = html_entity_decode($this->config->get('novalnet_cc_pci_test'), ENT_QUOTES, 'UTF-8');
			
		$_SESSION['novalnet_cc_pci_order_info'] = $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
 
    	$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');
		
		$this->data['continue'] = $this->shop_url . 'index.php?route=checkout/confirm';
		
		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/checkout';
		} else {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/guest_step_2';
	    }
		
		$this->id = 'payment';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/novalnet_cc_pci.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/novalnet_cc_pci.tpl';
		} else {
			$this->template = 'default/template/payment/novalnet_cc_pci.tpl';
		}	
		
		$this->render();
	}
	
	public function callback() {
		global $session;
	    $newline ="<br>";
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
	    $this->language->load('payment/novalnet_cc_pci');
		  if(isset($_POST['status'])){
			if (!$this->checkHash($_POST)&& $_POST['status']==100){
				$error_status_desc = $_POST['status_desc'];
				$this->session->data['error'] = $error_status_desc;
				$this->redirect($this->shop_url .'index.php/?route=checkout/cart');	
			   }else{
				 $_POST['vendor_authcode']  = $this->decode($_POST['vendor_authcode']);
				 $_POST['product_id'] = $this->decode($_POST['product_id']);
				 $_POST['tariff_id']  = $this->decode($_POST['tariff_id']);
				 $_POST['amount']     = $this->decode($_POST['amount']);
				 $_POST['test_mode']  = $this->decode($_POST['test_mode']);
				 $_POST['uniqid']     = $this->decode($_POST['uniqid']);
			  }
		
			  if($_POST['status']==100){
			  ### Passing through the Transaction ID from Novalnet's paygate into order-info ###
				$this->load->model('checkout/order');
				$novalnet_cc_pci_comments ='';
				$testmode  = html_entity_decode(trim($this->config->get('novalnet_cc_pci_test')), ENT_QUOTES, 'UTF-8');
		        $test_order_status = (((isset($_POST['test_mode']) && $_POST['test_mode'] == 1) || (isset($testmode) && $testmode == 1)) ? 1 : 0 );
		        if(isset($test_order_status)){
				 $novalnet_cc_pci_comments .= $this->language->get('text_cc_pci_testorder'). $newline;
				}
				$novalnet_cc_pci_comments .= $this->language->get('text_cc_pci_transactionid').$_POST['tid'];
		
		        ### Send Postback Params to Server 	
		        $_SESSION['nn_tid'] = $_POST['tid'];
		        $order_id = $this->session->data['order_id'];
	            $this->params();
	              if(isset($_POST['tid']) && $_POST['tid'] != '' ) {
	                 $url = 'https://payport.novalnet.de/paygate.jsp';
	
		             $urlparam = array(
		                  'vendor'          =>  $this->cc_pci_vendor_id,
		                  'product'         =>  $this->product_id,
		                  'tariff'          =>  $this->tariff_id,  
		                  'key'             =>  $this->key,  
		                  'auth_code'       =>  $this->cc_pci_authcode,
		                  'status'          =>  '100',
		                  'tid'             =>  $_SESSION['nn_tid'],
		                  'order_no'        =>  $order_id,
		                  '&vwz2'           =>  $order_id,
		                  'vwz3'            =>  date('Y-m-d H:i:s')
		                 );
                     
                     list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
	                 unset($_SESSION['nn_tid']);	
                     }
	            $this->model_checkout_order->confirm($_POST['order_no'], $this->config->get('novalnet_cc_pci_order_status_id'),$novalnet_cc_pci_comments,'true');
		        $this->redirect($this->shop_url .'index.php/?route=checkout/success');			  
			  }else{
				### Passing through the Error Response from Novalnet's paygate into order-info ###
			   if(isset($_POST['status_desc']))  {
				  $error_status_desc = $_POST['status_desc'];
				}else{
				  $error_status_desc = $this->language->get('text_cc_pci_status');
				}
			
				$error_status_desc = $this->ReplaceSpecialGermanChars($error_status_desc);
				$this->data['oc_version'] = (int)str_replace('.', '', VERSION); 
                  if(version_compare(VERSION, '1.5.1.3', '>')){
				    $this->load->model('checkout/order');
				    $this->data['text_failure_wait'] = $this->language->get('text_redirect');
				    $this->data['novalnet_title'] = 'Novalnet AG';
				    $this->data['text_response'] = $_POST['status'];
				    $this->data['continue'] = $this->url->link('checkout/checkout');
				    $this->template = 'default/template/payment/novalnet_failure.tpl';
                    $this->data['text_failure'] = utf8_decode($error_status_desc);
				    $msg = "<font color = red>" . $error_status_desc . "</font>"; 
				    $this->data['text_failure'] = $msg;
				    $this->response->setOutput($this->render());
				    }
				   else{
				      $this->session->data['error'] = utf8_decode($error_status_desc); 
			          $this->redirect($this->shop_url .'index.php/?route=checkout/cart');
				 }		 
			}  
		}		
	}
	
	public function confirm() {
	    global $session,$implementation;
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
	    $this->implementation  = 'PHP_PCI';
	    $order_info = $_SESSION['novalnet_cc_pci_order_info'];
		
		$this->params();
        
        $language     = strtoupper($session->data['language']);
	    $uniqueid     = uniqid();
	    $authcode     = $this->encode($this->cc_pci_authcode); 
	    $product_id   = $this->encode($this->product_id);
	    $tariff_id    = $this->encode($this->tariff_id);
	    $amount       = $this->encode($this->amount);	
	    $test_mode    = $this->encode($this->cc_pci_test_mode);
	    $uniqueid     = $this->encode($uniqueid);
	    $hash         = $this->hash(array('authcode' => $authcode, 'product_id' => $product_id, 'tariff' => $tariff_id, 'amount' => $amount, 'test_mode' => $test_mode, 'uniqid' => $uniqueid));
	      if($order_info['customer_id'] == 0 ||  $order_info['customer_id'] == '') {
		      $order_info['customer_id'] = ($language == 'EN') ? "Guest" : "Gast";
		       }
		### Process the payment to paygate ##
	    $url = 'https://payport.novalnet.de/pci_payport';
	    $status_url = $this->url->link('payment/novalnet_cc_pci/callback','','SSL');
  
	    $urlparam = array(    	  
		   'vendor_id'                                      => $this->cc_pci_vendor_id,
		   'product_id'                                     => $product_id,
		   'key'                                            => $this->key ,
		   'tariff_id'                                      => $tariff_id,
		   'vendor_authcode'                                => $authcode, 
		   'currency'                                       => $order_info['currency_code'],
		   'uniqid'                        	                => $uniqueid,
		   'amount'                                         => $amount,
		   'hash'                                           => $hash,
		   'first_name'                                     => $order_info['payment_firstname'],
		   'last_name'                                      => $order_info['payment_lastname'],
		   'gender'	                                        => 'u',
		   'email'                                          => $order_info['email'],
		   'street'                                         => $order_info['payment_address_1'],
		   'search_in_street'                               => 1,
		   'city'                                           => $order_info['payment_city'],
		   'tel'                                            => $order_info['telephone'],
		   'zip'                                            => $order_info['payment_postcode'],
		   'lang'                                           => $language,
		   'language'                                       => $language,
		   'country_code'                                   => $order_info['payment_iso_code_2'],
		   'country'                                        => $order_info['payment_iso_code_2'],
		   'remote_ip'                                      => $_SERVER['REMOTE_ADDR'],
		   'return_url'                                     => $status_url,
		   'order_no'                         	            => $this->session->data['order_id'],
		   'customer_no'                                    => $order_info['customer_id'],
		   'return_method'                                  => 'POST',
		   'error_return_url'                               => $status_url,
		   'implementation'                                 => $this->implementation,
		   'error_return_method'                            => 'POST',
		   'use_utf8'                                       => 1,
		   'test_mode'                                      => $test_mode

			    );
		$this->sendForm($url, $urlparam);
        return;

       }
    public function params(){
		global $session,$product_id,$tariff_id,$amount;
		$this->cc_pci_product_id = html_entity_decode(trim($this->config->get('novalnet_cc_pci_productid')),ENT_QUOTES, 'UTF-8');  
	    $this->cc_pci_tariff_id = html_entity_decode(trim($this->config->get('novalnet_cc_pci_tariffid')),ENT_QUOTES, 'UTF-8');
	    $this->cc_pci_manual_check_limit = html_entity_decode(trim($this->config->get('novalnet_cc_pci_bookingamount')),ENT_QUOTES, 'UTF-8');
	    $this->cc_pci_product_id2 = html_entity_decode(trim($this->config->get('novalnet_cc_pci_productid2')),ENT_QUOTES, 'UTF-8');
	    $this->cc_pci_tariff_id2 = html_entity_decode(trim($this->config->get('novalnet_cc_pci_tariffid2')),ENT_QUOTES, 'UTF-8');
	    $this->cc_pci_authcode  = html_entity_decode(trim($this->config->get('novalnet_cc_pci_authorisation')), ENT_QUOTES, 'UTF-8');
	    $this->cc_pci_vendor_id = html_entity_decode(trim($this->config->get('novalnet_cc_pci_merchant')), ENT_QUOTES,'UTF-8');
	    $this->cc_pci_test_mode = html_entity_decode(trim($this->config->get('novalnet_cc_pci_test')), ENT_QUOTES, 'UTF-8');
 	   
	    $order_info = $_SESSION['novalnet_cc_pci_order_info'];
		$this->amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], FALSE);
    
	    if (preg_match('/[^\d\.]/', $this->amount) or !$this->amount){
         ### $amount contains some unallowed chars or empty ###
          $err = '$amount ('.$this->amount.') is empty or has a wrong format';
          $order->info['comments'] .= '. Novalnet Error Message : '.$err;
          $payment_error_return     = 'payment_error='.$this->code.'&error='.$err;
           }
        $this->amount = sprintf('%0.2f', $this->amount);
        $this->amount = preg_replace('/^0+/', '', $this->amount);
        $this->amount = str_replace('.', '', $this->amount);
        
        $this->product_id   = $this->cc_pci_product_id;
        $this->tariff_id    = $this->cc_pci_tariff_id;
        $manual_check_limit = $this->cc_pci_manual_check_limit;
        $manual_check_limit = str_replace(',', '', $manual_check_limit);
        $manual_check_limit = str_replace('.', '', $manual_check_limit);
       
        if($manual_check_limit && $this->amount>=$manual_check_limit)
           {     
         
           $this->product_id = $this->cc_pci_product_id2;
           $this->tariff_id  = $this->cc_pci_tariff_id2;
          }
	   } 
	public function sendForm($url, $aParams) {
		if( $aParams ) {
			$this->language->load('payment/novalnet_cc_pci');

			$frmData = '<form name="frmnovalnet" method="post" action="' . $url . '">';
			$frmEnd  =$this->language->get('text_cc_pci_automaticredirection').'<br> <input type="submit" name="enter" value='.$this->language->get('text_novalnet_redirect').' /></form>';
			$js      = '<script>document.forms.frmnovalnet.submit();</script>';
			foreach( $aParams as $k => $v ) {
				$frmData .= '<input type="hidden" name="' . $k . '" value="' . $v . '" />' . "\n";
			}
			echo $frmData, $frmEnd, $js;
			exit();
		} 
   }				
  
    ### Realtime accesspoint for communication to the Novalnet payport ###
    function perform_https_request($nn_url, $urlparam){
        $debug = 0;#set it to 1 if you want to activate the debug mode

        if($debug) print "<BR>perform_https_request: $nn_url<BR>\n\r\n";
        if($debug) print "perform_https_request: $urlparam<BR>\n\r\n";

        ## some prerquisites for the connection
        $ch = curl_init($nn_url);
        curl_setopt($ch, CURLOPT_POST, 1);  // a non-zero parameter tells the library to do a regular HTTP post.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $urlparam);  // add POST fields
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);  // don't allow redirects
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // decomment it if you want to have effective ssl checking
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // decomment it if you want to have effective ssl checking
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // return into a variable
        curl_setopt($ch, CURLOPT_TIMEOUT, 240);  // maximum time, in seconds, that you'll allow the CURL functions to take
         if ($this->proxy) {curl_setopt($ch, CURLOPT_PROXY, $this->proxy); }

        ## establish connection
        $data = curl_exec($ch);
        $data = $this->ReplaceSpecialGermanChars($data);

        ## determine if there were some problems on cURL execution
        $errno = curl_errno($ch);
        $errmsg = curl_error($ch);

        ###bug fix for PHP 4.1.0/4.1.2 (curl_errno() returns high negative value in case of successful termination)
        if($errno < 0) $errno = 0;
        ##bug fix for PHP 4.1.0/4.1.2

        if($debug){
         print_r(curl_getinfo($ch));
         echo "\n<BR><BR>\n\n\nperform_https_request: cURL error number:" . $errno . "\n<BR>\n\n";
         echo "\n\n\nperform_https_request: cURL error:" . $errmsg . "\n<BR>\n\n";
         }

        #close connection
        curl_close($ch);

        ## read and return data from novalnet paygate
        if($debug) print "<BR>\n\n" . $data . "\n<BR>\n\n";

        return array ($errno, $errmsg, $data);
	    }	
	
	    ### replace the Special German Charectors ###
	    function ReplaceSpecialGermanChars($string){
		  $what = array("ä", "ö", "ü", "Ä", "Ö", "Ü", "ß");
		  $how = array("ae", "oe", "ue", "Ae", "Oe", "Ue", "ss");

		  $string = str_replace($what, $how, $string);

		  return $string;
	 }
  
    function encode($data){
      $data = trim($data);
      if ($data == '') return'Error: no data';
      if (!function_exists('base64_encode') or !function_exists('pack') or !function_exists('crc32')){return'Error: func n/a';}

      try {
        $crc = sprintf('%u', crc32($data));# %u is a must for ccrc32 returns a signed value
        $data = $crc."|".$data;
        $data = bin2hex($data.html_entity_decode(trim($this->config->get('novalnet_cc_pci_password')), ENT_QUOTES, 'UTF-8'));
        $data = strrev(base64_encode($data));
      }catch (Exception $e){
        echo('Error: '.$e);
     }
     return $data;
  }

    function hash($h){
      #$h contains encoded data
      global $amount_zh;
      if (!$h) return'Error: no data';
      if (!function_exists('md5')){return'Error: func n/a';}
	
      return md5($h['authcode'].$h['product_id'].$h['tariff'].$h['amount'].$h['test_mode'].$h['uniqid'].strrev(html_entity_decode(trim($this->config->get('novalnet_cc_pci_password')), ENT_QUOTES, 'UTF-8')));
	}
  
 
    function checkHash($data){
	   
	 if (!$data) return false; #'Error: no data';
		$h['authcode']  = $data['vendor_authcode'];#encoded
		$h['product_id'] = $data['product_id'];#encoded
		$h['tariff'] = $data['tariff_id'];#encoded
		$h['amount']     = $data['amount'];#encoded
		$h['test_mode']  = $data['test_mode'];#encoded
		$h['uniqid']     = $data['uniqid'];#encoded
		
		if ($data['hash2'] != $this->hash($h)){
		  return false;
		}
		return true;
   }

	function decode($data){
		$data = trim($data);
		if ($data == '') {return'Error: no data';}
		if (!function_exists('base64_decode') or !function_exists('pack') or !function_exists('crc32')){return'Error: func n/a';} 

		try {
		  $data =  base64_decode(strrev($data));
		  $data = pack("H".strlen($data), $data);
		  $data = substr($data, 0, stripos($data, html_entity_decode(trim($this->config->get('novalnet_cc_pci_password')), ENT_QUOTES, 'UTF-8')));
		  $pos = strpos($data, "|");
		  if ($pos === false){
			return("Error: CKSum not found!");
		  }
		  $crc = substr($data, 0, $pos);
		  $value = trim(substr($data, $pos+1));
		  if ($crc !=  sprintf('%u', crc32($value))){
			return("Error; CKSum invalid!");
		  }
		  return $value;
		}catch (Exception $e){
		  echo('Error: '.$e);
		}
	  }
}
?>
