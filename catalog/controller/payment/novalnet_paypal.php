<?php
#########################################################
#                                                       #
#  Paypal payment method class                          #
#  This module is used for real time processing of      #
#  transaction of customers.                            #
#                                                       #
#  Released under the GNU General Public License.       #
#  This free contribution made by request.              #
#  If you have found this script usefull a small        #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_paypal.php                         #
#                                                       #
#########################################################
class ControllerPaymentnovalnetpaypal extends Controller {
    public $shop_url;
	 
	protected function index() {
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
	    $this->language->load('payment/novalnet_paypal');
		$this->data['text_paypal'] = $this->language->get('text_paypal');
		$this->data['text_novalnet_redirection'] = $this->language->get('text_novalnet_redirection');
		$this->data['text_heading'] = $this->language->get('text_heading');
		$this->data['text_novalnet_testmode_desc'] = $this->language->get('text_novalnet_testmode_desc');
		$this->data['testmode_desc'] = html_entity_decode($this->config->get('novalnet_paypal_testmode'), ENT_QUOTES, 'UTF-8');	
		$_SESSION['novalnet_paypal_order_info'] = $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');
		$this->data['continue'] = $this->shop_url . 'index.php?route=checkout/confirm';
						
		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/checkout';
		} else {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/guest_step_2';
		}
		$this->id = 'payment';

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/novalnet_paypal.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/novalnet_paypal.tpl';
		} else {
			$this->template = 'default/template/payment/novalnet_paypal.tpl';
		}	
		$this->render();
	}
	
	public function callback() {
		global $session;			
		$this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$this->language->load('payment/novalnet_paypal');
		if(isset($_REQUEST['status'])){
			if (!$this->checkHash($_REQUEST)&& ($_REQUEST['status']==100)){
			$error_status_desc = $_REQUEST['status_desc'];
			$this->session->data['error'] = $error_status_desc;
			$this->redirect($this->shop_url .'index.php/?route=checkout/cart');
			} else {
			   $_REQUEST['auth_code']  = $this->decode($_REQUEST['auth_code']);
			   $_REQUEST['product_id'] = $this->decode($_REQUEST['product']);
			   $_REQUEST['tariff_id']  = $this->decode($_REQUEST['tariff']);
			   $_REQUEST['amount']     = $this->decode($_REQUEST['amount']);
			   $_REQUEST['test_mode']  = $this->decode($_REQUEST['test_mode']);
			   $_REQUEST['uniqid']     = $this->decode($_REQUEST['uniqid']);
			}
			
            if(isset($_REQUEST['status']) && ($_REQUEST['status']==100) || ($_REQUEST['status']==90)){
				### Passing through the Transaction ID from Novalnet's paygate into order-info ###
				$this->load->model('checkout/order');
				
				 ### Send Postback Params to Server 	
		       $_SESSION['nn_tid'] = $_POST['tid'];
		       $order_id = $this->session->data['order_id'];
	   
	           if(isset($_POST['tid']) && $_POST['tid'] != '' )
		       {
	            $url = 'https://payport.novalnet.de/paygate.jsp';
	
		        $urlparam = array(
		                  'vendor'          =>  html_entity_decode(trim($this->config->get('novalnet_paypal_merchantid')), ENT_QUOTES, 'UTF-8'),
		                  'product'         =>  html_entity_decode(trim($this->config->get('novalnet_paypal_productid')), ENT_QUOTES, 'UTF-8'),
		                  'tariff'          =>  html_entity_decode(trim($this->config->get('novalnet_paypal_tariffid')), ENT_QUOTES, 'UTF-8'),  
		                  'key'             =>  '34',  
		                  'auth_code'       =>  html_entity_decode(trim($this->config->get('novalnet_paypal_auth_code')), ENT_QUOTES, 'UTF-8'),
		                  'status'          =>  '100',
		                  'tid'             =>  $_SESSION['nn_tid'],
		                  'order_no'        =>  $order_id,
		                  '&vwz2'           =>  $order_id,
		                  'vwz3'            =>  date('Y-m-d H:i:s')
		                 );

               list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
	           unset($_SESSION['nn_tid']);	
               } 
				
				$novalnet_paypal_comments ='';
				$testmode  = html_entity_decode($this->config->get('novalnet_paypal_testmode'), ENT_QUOTES, 'UTF-8');
		     $test_order_status = (((isset($_REQUEST['test_mode']) && $_REQUEST['test_mode'] == 1) || (isset($testmode) && $testmode == 1)) ? 1 : 0 );
		        if(isset($test_order_status)){
				  $novalnet_paypal_comments .= $this->language->get('text_paypal_testorder')."<br />";
			      } 
				$novalnet_paypal_comments .= $this->language->get('text_paypal_transactionid').$_POST['tid'];
				
				
				if($_REQUEST['status']==100){
					$this->model_checkout_order->confirm($_POST['order_no'], $this->config->get('novalnet_paypal_order_status_id'),$novalnet_paypal_comments, true);
				    }
				elseif($_REQUEST['status']==90){
					$this->model_checkout_order->confirm($_POST['order_no'], $this->config->get('novalnet_paypal_order_status_id'),$novalnet_paypal_comments, true);
					  if($this->config->get('novalnet_paypal_order_status_id')!=1)
			          {
			          $this->model_checkout_order->confirm($_POST['order_no'],1,$novalnet_paypal_comments, true);
		              }
		              else
		              {
			          $this->model_checkout_order->confirm($_POST['order_no'], $this->config->get('novalnet_paypal_order_status_id'),$novalnet_paypal_comments, true);
		              }
		          }
		     $this->redirect($this->shop_url .'index.php/?route=checkout/success');	    
			   }
			
			else{
               ### Passing through the Error Response from Novalnet's paygate into order-info ###
               if(isset($_POST['status_text']))  {
               $error_status_desc = $_POST['status_text'];
               } else {
			   $error_status_desc = $this->language->get('text_paypal_status');
			   } 
			   $error_status_desc = $this->ReplaceSpecialGermanChars($error_status_desc);
			   $this->data['oc_version'] = (int)str_replace('.', '', VERSION); 
                 if(version_compare(VERSION, '1.5.1.3', '>')){
			        $this->load->model('checkout/order');              			
			  	    $this->data['text_failure_wait'] = $this->language->get('text_redirect');
				    //$this->data['heading_title'] = 'Novalnet AG';
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
		global $session;
		$this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$order_info = $_SESSION['novalnet_paypal_order_info'];
		$amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], FALSE);
		if (preg_match('/[^\d\.]/', $amount) or !$amount){
		### $amount contains some unallowed chars or empty ###
			$err = '$amount ('.$amount.') is empty or has a wrong format';
			$order->info['comments'] .= '. Novalnet Error Message : '.$err;
			$payment_error_return     = 'payment_error='.$this->code.'&error='.$err;
		}
		$amount = sprintf('%0.2f', $amount);
		$amount = preg_replace('/^0+/', '', $amount);
		$amount = str_replace('.', '', $amount);
		$product_id   = html_entity_decode(trim($this->config->get('novalnet_paypal_productid')), ENT_QUOTES, 'UTF-8');
		$tariff_id    = html_entity_decode(trim($this->config->get('novalnet_paypal_tariffid')), ENT_QUOTES, 'UTF-8');
		$language 	  = strtoupper($session->data['language']);
		$uniqueid     = uniqid();
		$authcode     = $this->encode(html_entity_decode(trim($this->config->get('novalnet_paypal_auth_code')), ENT_QUOTES, 'UTF-8'));
		$product_id   = $this->encode($product_id);
		$tariff_id    = $this->encode($tariff_id);
		$amount       = $this->encode($amount);
		$test_mode    = $this->encode(html_entity_decode(trim($this->config->get('novalnet_paypal_testmode')), ENT_QUOTES, 'UTF-8'));
		$uniqueid     = $this->encode($uniqueid);
		$api_user     = $this->encode(html_entity_decode(trim($this->config->get('novalnet_paypal_api_username')), ENT_QUOTES, 'UTF-8'));
		$api_pw       = $this->encode(html_entity_decode(trim($this->config->get('novalnet_paypal_api_password')), ENT_QUOTES, 'UTF-8'));
		$api_signature = $this->encode(html_entity_decode(trim($this->config->get('novalnet_paypal_api_signature')), ENT_QUOTES, 'UTF-8'));
		$hash         = $this->hash(array('authcode' => $authcode, 'product_id' => $product_id, 'tariff' => $tariff_id, 'amount' => $amount, 'test_mode' => $test_mode, 'uniqid' => $uniqueid));
		
		if($order_info['customer_id'] == 0 ||  $order_info['customer_id'] == '') {
		   $order_info['customer_id'] = ($language == 'EN') ? "Guest" : "Gast";
		  
		}
		if (!isset($this->request->server['HTTPS']) || ($this->request->server['HTTPS'] != 'on')) {
			$this->data['base'] = $this->config->get('config_url');
		} else {
			$this->data['base'] = $this->config->get('config_ssl');
		}
		### Process the payment to paygate ##
		$url = 'https://payport.novalnet.de/paypal_payport';
		$status_url = $this->url->link('payment/novalnet_paypal/callback','','SSL');
		$urlparam = array('vendor'    	=> html_entity_decode(trim($this->config->get('novalnet_paypal_merchantid')),ENT_QUOTES, 'UTF-8'),
		'product'    	      		    => $product_id,
		'key'       		            => '34',
		'tariff'        		        => $tariff_id,
		'auth_code'                     => $authcode,
		'currency'                      => $order_info['currency_code'],
		'uniqid'                        => $uniqueid,
		'hash'                          => $hash,
		'api_user'                      => $api_user,
		'api_pw'                        => $api_pw,
		'api_signature'                 => $api_signature,
		'first_name'                    => $order_info['payment_firstname'],
		'last_name'                     => $order_info['payment_lastname'],
		'gender'	                    => 'u',
		'email'                         => $order_info['email'],
		'street'                        => $order_info['payment_address_1'],
		'search_in_street'              => 1,
		'city'                          => $order_info['payment_city'],
		'zip'                           => $order_info['payment_postcode'],
		'lang'                          => $language,
		'language'                      => $language,
		'tel'                           => $order_info['telephone'],
		'fax'				            => $order_info['fax'],
		'country'                       => $order_info['payment_iso_code_2'],
		'country_code'                  => $order_info['payment_iso_code_2'],    
		'remote_ip'                     => $_SERVER['REMOTE_ADDR'],
		'user_variable_0'               => ((($this->data['base'] == 'SSL') ? HTTP_SERVER : HTTPS_SERVER)),
		'return_url'                    => $status_url,
		'return_method'                 => 'POST',
		'order_no'                      => $this->session->data['order_id'],
		'customer_no'                   => $order_info['customer_id'],
		'error_return_url'              => $status_url,
		'error_return_method'           => 'POST',
		'use_utf8'                      => 1,
		'test_mode'                     => $test_mode,
		'amount'                        => $amount
       ); 
       
       $this->sendForm($url, $urlparam); 
   return;
 }
    public function sendForm($url, $aParams) {
	  if( $aParams ) {
	  $this->language->load('payment/novalnet_paypal');
      $frmData = '<form name="frmnovalnet" method="post" action="' . $url . '">';
	  $frmEnd  = $this->language->get('text_paypal_automaticredirection').'<br> <input type="submit" name="enter" value='.$this->language->get('text_paypal_redirection').' /></form>';
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
       ## establish connection
       $data = curl_exec($ch);
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
         $data = bin2hex($data.html_entity_decode(trim($this->config->get('novalnet_paypal_password')), ENT_QUOTES, 'UTF-8'));
		 $data = strrev(base64_encode($data));
        } catch (Exception $e){
       echo('Error: '.$e);
     }
    return $data;
   }
   
    function hash($h){
    #$h contains encoded data
     global $amount_zh;
     if (!$h) return'Error: no data';
     if (!function_exists('md5')){return'Error: func n/a';}
    return md5($h['authcode'].$h['product_id'].$h['tariff'].$h['amount'].$h['test_mode'].$h['uniqid'].strrev(html_entity_decode(trim($this->config->get('novalnet_paypal_password')), ENT_QUOTES, 'UTF-8')));
     }
 
    function checkHash($request){
     if (!$request) return false; #'Error: no data';
	  $h['authcode']  = $request['auth_code'];#encoded
	  $h['product_id'] = $request['product'];#encoded
	  $h['tariff'] = $request['tariff'];#encoded
	  $h['amount']     = $request['amount'];#encoded
	  $h['test_mode']  = $request['test_mode'];#encoded
	  $h['uniqid']     = $request['uniqid'];#encoded
	
		if ($request['hash2'] != $this->hash($h)){
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
			$data = substr($data, 0, stripos($data, html_entity_decode(trim($this->config->get('novalnet_paypal_password')), ENT_QUOTES, 'UTF-8')));
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
