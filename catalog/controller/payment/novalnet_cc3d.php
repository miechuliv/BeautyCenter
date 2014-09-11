<?php
#########################################################
#                                                       #
#  CC / CREDIT CARD 3d secure payment method class      #
#  This module is used for real time processing of      #
#  Credit card data of customers.                       #
#                                                       #
#  Released under the GNU General Public License.       #
#  This free contribution made by request.              #
#  If you have found this script usefull a small        #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_cc3d.php                           #
#                                                       #
#########################################################
class ControllerPaymentnovalnetcc3d extends Controller {
    protected $key = 6;
	public $cc3d_product_id;
    public $cc3d_tariff_id;
    public $cc3d_manual_check_limit;
    public $cc3d_product_id2;	
    public $cc3d_tariff_id2;
    public $cc3d_vendor;
    public $cc3d_auth_code;
    public $cc3d_test_mode;	
    public $shop_url;  
		
    protected function index() {
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$this->language->load('payment/novalnet_cc3d');
		$montharray = array();
		for ($i = 01; $i < 13; $i ++) 
		{  
		 $montharray[$i]  = $this->language->get('text_'.strtolower(strftime('%B', mktime(0, 0, 0, $i, 1, date("Y")))));
		} 
		$this->data['monthary'] = $montharray;		 
		$this->data['text_creditcard3d'] = $this->language->get('text_creditcard3d');
		$this->data['text_heading'] = $this->language->get('text_heading');
		$this->data['text_novalnet_testmode_desc'] = $this->language->get('text_novalnet_testmode_desc');
		$this->data['testmode_desc'] = html_entity_decode($this->config->get('novalnet_cc3d_test'), ENT_QUOTES, 'UTF-8');
		$this->data['text_cc3d_holder'] = $this->language->get('text_cc3d_holder');
		$this->data['text_cc3d_number'] = $this->language->get('text_cc3d_number');
		$this->data['text_cc3d_exp_month'] = $this->language->get('text_cc3d_exp_month');
		$this->data['text_month'] = $this->language->get('text_month');
		$this->data['february'] = $this->language->get('february');
		$this->data['text_year'] = $this->language->get('text_year');
		$this->data['text_cc3d_cvc2'] = $this->language->get('text_cc3d_cvc2');
		$this->data['text_cc3d_cvc2_info'] = $this->language->get('text_cc3d_cvc2_info');
		$this->data['text_novalnet_redirection'] = $this->language->get('text_novalnet_redirection');		
		$_SESSION['novalnet_cc3d_order_info'] = 	 $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		$this->data['first_name'] = $order_info['firstname'];
    	$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');

		$this->data['text_empty'] = $this->language->get('text_empty');
		$this->data['text_cc3d_holder_error'] = $this->language->get('text_cc3d_holder_error');
		$this->data['text_cc3d_no_error'] = $this->language->get('text_cc3d_no_error');
		$this->data['text_cc3d_exp_data_error'] = $this->language->get('text_cc3d_exp_data_error');
		$this->data['text_cc3d_exp_month_error'] = $this->language->get('text_cc3d_exp_month_error');
		$this->data['text_cc3d_cvc2_error'] = $this->language->get('text_cc3d_cvc2_error');		

		$this->data['continue'] = $this->shop_url. 'index.php?route=checkout/confirm';
		
		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/checkout';
		} else {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/guest_step_2';
		}
		
		$this->id = 'payment';

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/novalnet_cc3d.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/novalnet_cc3d.tpl';
		} else {
			$this->template = 'default/template/payment/novalnet_cc3d.tpl';
		}	
	
		$this->render();
	}
 	
	public function callback() {
	    global $session;
	    $newline ="<br>"; 
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$this->language->load('payment/novalnet_cc3d');
		if(isset($_POST['status'])){
			if($_POST['status']==100){
		     ### Passing through the Transaction ID from Novalnet's paygate into order-info ###
			 $this->load->model('checkout/order');
			 $novalnet_cc3d_comments = '';
			 $testmode  = html_entity_decode(trim($this->config->get('novalnet_cc3d_test')),ENT_QUOTES,'UTF-8');
		     $test_order_status = (((isset($_POST['test_mode']) && $_POST['test_mode'] == 1) || (isset($testmode) && $testmode == 1)) ? 1 : 0 );
			    if(isset($test_order_status)){
				  $novalnet_cc3d_comments .= $this->language->get('text_cc3d_testorder').$newline;
				  }
				  $novalnet_cc3d_comments .= $this->language->get('text_cc3d_transactionid').$_POST['tid'];
		
		          ### Send Postback Params to Server		
		          $_SESSION['nn_tid'] = $_POST['tid'];
		          $order_id = $this->session->data['order_id'];
		          $this->params();
	              if(isset($_POST['tid']) && $_POST['tid'] != '' )
		          {
	              $url = 'https://payport.novalnet.de/paygate.jsp';
	              $urlparam = array(
		                  'vendor'          =>  $this->cc3d_vendor,
		                  'product'         =>  $this->product_id,
		                  'tariff'          =>  $this->tariff_id,  
		                  'key'             =>  $this->key,  
		                  'auth_code'       =>  $this->cc3d_auth_code,
		                  'status'          =>  '100',
		                  'tid'             =>  $_SESSION['nn_tid'],
		                  'order_no'        =>  $order_id,
		                  '&vwz2'           =>  $order_id,
		                  'vwz3'            =>  date('Y-m-d H:i:s')
		                 );
                  
                  list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
	              unset($_SESSION['nn_tid']);	
                  }
	              $this->model_checkout_order->confirm($_POST['order_id'], $this->config->get('novalnet_cc3d_order_status_id'),$novalnet_cc3d_comments,'true');
		          $this->redirect($this->shop_url .'index.php/?route=checkout/success');	  
			   }else{
			      ### Passing through the Error Response from Novalnet's paygate into order-info ###
			      if($_POST['status_text'])  {
				  $error_status_desc = $_POST['status_text'];
			      } else {
			  	  $error_status_desc = $this->language->get('text_cc3d_status');
			      }
			      $error_status_desc = html_entity_decode( $error_status_desc);
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
				      $this->session->data['error'] = html_entity_decode($error_status_desc); 
			          $this->redirect($this->shop_url .'index.php/?route=checkout/cart');
				   }
					 	
			  }  
		 }
	}	
		
    public function confirm() {
	    global $session;
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
	    $order_info = $_SESSION['novalnet_cc3d_order_info'];

	    $this->params();
 	    $language = strtoupper($session->data['language']);
        $status_url = $this->url->link('payment/novalnet_cc3d/callback','','SSL');
	    if($order_info['customer_id'] == 0 ||  $order_info['customer_id'] == '') {
		    $order_info['customer_id'] = ($language == 'EN') ? "Guest" : "Gast";
		}
		
		### Process the payment to paygate ##  
        $url = 'https://payport.novalnet.de/global_pci_payport';
        
        $urlparam = array(    	  
				'vendor'                        => $this->cc3d_vendor,
				'product'                       => $this->product_id,
				'key'                           => $this->key,
				'tariff'                        => $this->tariff_id,
				'auth_code'                     => $this->cc3d_auth_code,
				'currency'                      => $order_info['currency_code'],
				'amount'                        => $this->amount,
				'first_name'                    => $order_info['payment_firstname'],
				'last_name'                     => $order_info['payment_lastname'],
				'gender'	                    => 'u',
				'email'                         => $order_info['email'],
				'street'                        => $order_info['payment_address_1'],
				'search_in_street' 		      	=> 1,
				'city'            			    => $order_info['payment_city'],
				'zip'             			    => $order_info['payment_postcode'],
				'lang'            			    => $language,
				'tel'                           => $order_info['telephone'],
				'language'	                    => $language,
				'lang'                          => $language,
				'country_code'                  => $order_info['payment_iso_code_2'],
				'country'	                    => $order_info['payment_iso_code_2'],
				'remote_ip'                     => $_SERVER['REMOTE_ADDR'],
				'tel'                           => $order_info['telephone'],
				'fax'                           => $order_info['fax'],
				'order_no'                      => $this->session->data['order_id'],
				'customer_no'                   => $order_info['customer_id'],
				'cc_holder'                     => $_POST['novalnet_cc3d_holder'],
				'cc_no'                         => $_POST['novalnet_cc3d_no'],
				'cc_exp_month'                  => $_POST['novalnet_cc3d_exp_month'],
				'cc_exp_year'                   => $_POST['novalnet_cc3d_exp_year'],
				'cc_cvc2'                       => $_POST['novalnet_cc3d_cvc2'],			  
				'return_url'                    => $status_url,
				'order_id'                      => $this->session->data['order_id'],
				'return_method'                 => 'POST',
				'error_return_url'              => $status_url,
				'error_return_method'           => 'POST',
				'use_utf8'                      => 1,
				'test_mode'                     => $this->cc3d_test_mode,
			    );
		
		$this->sendForm($url, $urlparam);
		
	    return;
    }
    public function params(){
		global $session,$product_id,$tariff_id,$amount;
		$this->cc3d_product_id = html_entity_decode(trim($this->config->get('novalnet_cc3d_productid')),ENT_QUOTES, 'UTF-8');
	    $this->cc3d_tariff_id = html_entity_decode(trim($this->config->get('novalnet_cc3d_tariffid')),ENT_QUOTES, 'UTF-8'); 
	    $this->cc3d_manual_check_limit = trim(html_entity_decode($this->config->get('novalnet_cc3d_manualamount'),ENT_QUOTES, 'UTF-8'));
	    $this->cc3d_product_id2  = html_entity_decode(trim($this->config->get('novalnet_cc3d_productid2')),ENT_QUOTES, 'UTF-8');
	    $this->cc3d_tariff_id2  = html_entity_decode(trim($this->config->get('novalnet_cc3d_tariffid2')),ENT_QUOTES, 'UTF-8'); 
	    $this->cc3d_vendor   = html_entity_decode(trim($this->config->get('novalnet_cc3d_merchant')),ENT_QUOTES,'UTF-8');
 	    $this->cc3d_auth_code = html_entity_decode(trim($this->config->get('novalnet_cc3d_authorisation')), ENT_QUOTES,'UTF-8');
	    $this->cc3d_test_mode = html_entity_decode(trim($this->config->get('novalnet_cc3d_test')),ENT_QUOTES,'UTF-8');
        $this->language->load('payment/novalnet_cc3d');
		$order_info = $_SESSION['novalnet_cc3d_order_info'];
		
		$this->amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], FALSE);
    
        $this->amount = sprintf('%0.2f', $this->amount);
        $this->amount = preg_replace('/^0+/', '', $this->amount);
        $this->amount = str_replace('.', '', $this->amount);
        $this->product_id = $this->cc3d_product_id;
	    $this->tariff_id  = $this->cc3d_tariff_id;
    
        $manual_check_limit = $this->cc3d_manual_check_limit;
        $manual_check_limit = str_replace(',', '', $manual_check_limit);
        $manual_check_limit = str_replace('.', '', $manual_check_limit);
    
        if($manual_check_limit && $this->amount>=$manual_check_limit) { 
	       $this->product_id = $this->cc3d_product_id2;
           $this->tariff_id  = $this->cc3d_tariff_id2;
       }
		
		}
	public function sendForm($url, $aParams) {
		if( $aParams ) {
			$this->language->load('payment/novalnet_cc3d');
				$frmData = '<form name="frmnovalnet" method="post" action="' . $url . '">';
				$frmEnd  = $this->language->get('text_cc3d_automaticredirection').'<br> <input type="submit" name="enter" value='.$this->language->get('text_cc3d_redirection').' /></form>';
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
	     if ($this->config->get('novalnet_cc3d_proxy')) { curl_setopt($ch, CURLOPT_PROXY, $this->config->get('novalnet_cc3d_proxy')); }

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
}
?>
