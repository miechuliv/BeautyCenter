<?php
#########################################################
#                                                       #
#  CC / CREDIT CARD payment method class                #
#  This module is used for real time processing of      #
#  Austrian Bankdata of customers.                      #
#                                                       #
#  Released under the GNU General Public License.       #
#  This free contribution made by request.              #
#  If you have found this script usefull a small        #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_cc.php                             #
#                                                       #
#########################################################
class ControllerPaymentnovalnetcc extends Controller {
     public $key = 6;
	 public $cc_product;
	 public $cc_tariff;
	 public $cc_manual_check_limit;
	 public $cc_vendor_id;
	 public $cc_auth_code;
	 public $cc_product2;
	 public $cc_tariff2;
	 public $cc_test_mode;
	 public $shop_url;  
	 public function index() {
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
	    $this->language->load('payment/novalnet_cc');
	    $this->data['text_creditcard'] = $this->language->get('text_creditcard');
		$this->data['text_heading'] = $this->language->get('text_heading');
		$this->data['text_wait'] = $this->language->get('text_wait');
		$this->data['text_errormsg'] = $this->language->get('text_errormsg');
		$this->data['text_novalnet_testmode_desc'] = $this->language->get('text_novalnet_testmode_desc');
		$this->data['testmode_desc'] = html_entity_decode($this->config->get('novalnet_cc_test'), ENT_QUOTES, 'UTF-8');

		
		$_SESSION['novalnet_cc_order_info'] = 	 $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		$this->data['first_name'] = $order_info['firstname'];
		$this->data['vendor_id'] = html_entity_decode(trim($this->config->get('novalnet_cc_merchant')), ENT_QUOTES, 'UTF-8');
		
		$this->data['auth_code'] = html_entity_decode(trim($this->config->get('novalnet_cc_authorisation')), ENT_QUOTES, 'UTF-8');
		
    	$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');
        $this->data['text_novalnet_redirection'] = $this->language->get('text_novalnet_redirection');	
		$this->data['text_empty'] = $this->language->get('text_empty');
		
		$this->data['continue'] = $this->shop_url. 'index.php?route=checkout/confirm';
		
		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/checkout';
		} else {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/guest_step_2';
		}
		
		$this->id = 'payment';

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/novalnet_cc.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/novalnet_cc.tpl';
		} else {
			$this->template = 'default/template/payment/novalnet_cc.tpl';
		}	
		 		$this->render();
	}
	
	
	public function confirm() { 
	$newline ="<br>";   
	     $this->cc_product = html_entity_decode(trim($this->config->get('novalnet_cc_productid')), ENT_QUOTES, 'UTF-8');  
		 $this->cc_tariff = html_entity_decode(trim($this->config->get('novalnet_cc_tariffid')), ENT_QUOTES, 'UTF-8');
		 
		 $this->cc_manual_check_limit = html_entity_decode(trim($this->config->get('novalnet_cc_manualamount')), ENT_QUOTES, 'UTF-8');
		 $this->cc_vendor_id = html_entity_decode(trim($this->config->get('novalnet_cc_merchant')), ENT_QUOTES, 'UTF-8'); 
		 $this->cc_auth_code = html_entity_decode(trim($this->config->get('novalnet_cc_authorisation')), ENT_QUOTES, 'UTF-8');
		 $this->cc_product2 = html_entity_decode(trim($this->config->get('novalnet_cc_productid2')), ENT_QUOTES, 'UTF-8');
		 $this->cc_tariff2  = html_entity_decode(trim($this->config->get('novalnet_cc_tariffid2')), ENT_QUOTES, 'UTF-8');
		 $this->cc_test_mode = html_entity_decode($this->config->get('novalnet_cc_test'), ENT_QUOTES, 'UTF-8');
		 
	     $this->language->load('payment/novalnet_cc');

	     $order_info = $_SESSION['novalnet_cc_order_info'];
         $amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], FALSE);
         $amount = sprintf('%0.2f', $amount);
         $amount = preg_replace('/^0+/', '', $amount);
         $amount = str_replace('.', '', $amount);
    
	     $product		    = $this->cc_product; 
         $tariff             = $this->cc_tariff;
         $manual_check_limit = $this->cc_manual_check_limit;
         $manual_check_limit = str_replace(',', '', $manual_check_limit);
         $manual_check_limit = str_replace('.', '', $manual_check_limit);

	     $vendor_id = $this->cc_vendor_id; 	
	     $auth_code = $this->cc_auth_code;
	
         if($manual_check_limit && $amount>=$manual_check_limit){
         $product = $this->cc_product2;
         $tariff  = $this->cc_tariff2;
	     }

	     $language =	strtoupper($order_info['language_code']);
	     if($order_info['customer_id'] == 0 ||  $order_info['customer_id'] == '') {
		   /*$order_info['customer_id'] = "Guest";*/
		   $order_info['customer_id'] = ($language == 'EN') ? "Guest" : "Gast";
		  }
	     $json = array();
	     $json['error'] = '';
	     if(!isset($product) || !isset($tariff) || !isset($vendor_id) || !isset($auth_code) ){
		 $json['error'] .=$this->language->get('text_basic');
	     }
	     if($json['error'] != ''){
		 $this->response->setOutput(json_encode($json));
	    }else{

            $cc_pan_hash = isset($_POST['cardno_id']) ? $_POST['cardno_id']: '';	
            $cc_unique_id = isset($_POST['unique_id']) ? $_POST['unique_id']: '';
            
            $json = array();
	        $json['error'] = '';
	        if(empty($cc_pan_hash) || empty($cc_unique_id)){
		     $json['error'] = $this->language->get('text_errormsg');
		     $this->response->setOutput(json_encode($json));	
		   return false;
		   }
           elseif((empty($_POST['cc_holder']) || preg_match('/[#%\^<>@$=*!]/', $_POST['cc_holder'])) || empty($_POST['cc_type']) || empty($_POST['cc_cvv_cvc'])){
				$json['error'] = $this->language->get('text_empty');
				$this->response->setOutput(json_encode($json));	
				return false;
			}
			elseif(empty($_POST['cc_exp_year']) || empty($_POST['cc_exp_month']) || $_POST['cc_exp_year'] < date('Y') ){
				$json['error'] = $this->language->get('text_empty');
				$this->response->setOutput(json_encode($json));	
				return false;
			}
			elseif($_POST['cc_exp_year'] == date('Y') && $_POST['cc_exp_month'] < date('m')){
				$json['error'] = $this->language->get('text_empty');
				$this->response->setOutput(json_encode($json));	
				return false;
			}		
			elseif(strlen($_POST['cc_cvv_cvc']) < 3){
				$json['error'] = $this->language->get('text_empty');
				$this->response->setOutput(json_encode($json));	
				return false;	
           }
		   
		### Process the payment to paygate ##  
		$url = 'https://payport.novalnet.de/paygate.jsp';
		$urlparam = 'vendor='.$vendor_id.'&product='.$product.'&key='.$this->key.'&tariff='.$tariff.'&auth_code='.$auth_code.'&currency='.$order_info['currency_code'];
		$urlparam .='&test_mode='.$this->cc_test_mode; 
		$urlparam .= '&amount='.$amount;
		$urlparam .= '&cc_holder='.$_POST['cc_holder'];
		$urlparam .= '&cc_no=';
		$urlparam .= '&pan_hash='.$_POST['cardno_id'];
		$urlparam .= '&cc_exp_month='.$_POST['cc_exp_month'];
		$urlparam .= '&cc_exp_year='.$_POST['cc_exp_year'];
		$urlparam .= '&cc_cvc2='.$_POST['cc_cvv_cvc'];
		$urlparam .= '&unique_id='.$_POST['unique_id'];
		$urlparam .= '&input4=cc_types';
		$urlparam .= '&inputval4='.$_POST['cc_type'];
		$urlparam .='&first_name='.$order_info['payment_firstname'].'&last_name='.$order_info['payment_lastname'];
		$urlparam .= '&street='.$order_info['payment_address_1'].'&city='.$order_info['payment_city'].'&zip='.$order_info['payment_postcode'];
		$urlparam .= '&country_code='.$order_info['payment_iso_code_2'].'&email='.$order_info['email'];
		$urlparam .= '&search_in_street=1&tel='.$order_info['telephone'].'&remote_ip='.$_SERVER['REMOTE_ADDR'];
		$urlparam .= '&gender=u&fax='.$order_info['fax'];
		$urlparam .= '&tel='.$order_info['telephone'];
		$urlparam .= '&country='.$order_info['payment_iso_code_2'].'&lang='.$language.'&language='.$language;	
		$urlparam .= '&input1=order_id&=&inputval1='.$this->session->data['order_id'];
		$urlparam .= '&order_no='.$this->session->data['order_id'];
		$urlparam .= '&use_utf8=' . 1;
        $urlparam .= '&customer_no='.$order_info['customer_id'];

		list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
		
		$aryResponse = array();
		#capture the result and message and other parameters from response data '$data' in an array
		$aryPaygateResponse = explode('&', $data);
		foreach($aryPaygateResponse as $key => $value){
		   if($value!=""){
			  $aryKeyVal = explode("=",$value);
			  $aryResponse[$aryKeyVal[0]] = $aryKeyVal[1];
		   }
		}
   
		if($aryResponse['status']==100){
		    
		   ### Passing through the Transaction ID from Novalnet's paygate into order-info ###
		   $this->load->model('checkout/order');
		   $novalnet_cc_comments = '';
		   $testmode  = $this->cc_test_mode;
		   $test_order_status = (((isset($aryResponse['test_mode']) && $aryResponse['test_mode'] == 1) || (isset($testmode) && $testmode == 1)) ? 1 : 0 );
		   
			if(isset($test_order_status)){
				
				$novalnet_cc_comments .= $this->language->get('text_cc_testorder').$newline;
			}
		
		  $novalnet_cc_comments .= $this->language->get('text_cc_transactionid').$aryResponse['tid'];
		  
		  $_SESSION['nn_tid'] = $aryResponse['tid'];
		  $order_id = $this->session->data['order_id'];
	      if(isset($aryResponse['tid']) && $aryResponse['tid'] != '' )
		  {
	       $url = 'https://payport.novalnet.de/paygate.jsp';
	
		   $urlparam = array(
		                  'vendor'          =>  $vendor_id,
		                  'product'         =>  $product,  
		                  'tariff'          =>  $tariff,  
		                  'key'             =>  $this->key,  
		                  'auth_code'       =>  $auth_code,
		                  'status'          =>  '100',
		                  'tid'             =>  $_SESSION['nn_tid'],
		                  'order_no'        =>  $order_id,
		                  '&vwz2'           =>  $order_id,
		                  'vwz3'            =>  date('Y-m-d H:i:s')
		                 );
          
          list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
	      unset($_SESSION['nn_tid']);
          }
		  $this->model_checkout_order->confirm($aryResponse['inputval1'], $this->config->get('novalnet_cc_order_status_id'),$novalnet_cc_comments,true);
		  $json['success'] = $this->url->link('checkout/success', '', 'SSL');
		  $this->response->setOutput(json_encode($json));		   
	
		 }else{
		  ### Passing through the Error Response from Novalnet's paygate into order-info ###
		  if($aryResponse['status_desc'])  {
			$error_status_desc = $aryResponse['status_desc'];
		  } else {
			$error_status_desc = "There was an error and your <br>payment could not be completed";
		  }
			$error_warning = $error_status_desc;
			$error_warning = html_entity_decode($error_warning);
			$_SESSION['novalnet_error'] = $error_warning;
			$json['error'] =$error_warning;
			$this->response->setOutput(json_encode($json));			
		}
    }
 }
 
	
 
### Realtime accesspoint for communication to the Novalnet payport ###
  function perform_https_request($nn_url, $urlparam)
  {
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
      if ($this->config->get('novalnet_cc_proxy')) { curl_setopt($ch, CURLOPT_PROXY, $this->config->get('novalnet_cc_proxy')); }

      ## establish connection
      $data = curl_exec($ch);

      ## determine if there were some problems on cURL execution
      $errno = curl_errno($ch);
      $errmsg = curl_error($ch);

      ###bug fix for PHP 4.1.0/4.1.2 (curl_errno() returns high negative value in case of successful termination)
      if($errno < 0) $errno = 0;
      ##bug fix for PHP 4.1.0/4.1.2

      if($debug)
      {
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
}
?>
