<?php
#########################################################
#                                                       #
#  Invoice payment method class                         #
#  This module is used for real time processing of      #
#  Invoice data of customers.                       	#
#                                                       #
#  Released under the GNU General Public License.       #
#  This free contribution made by request.              #
#  If you have found this script usefull a small        #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_invoice.php                        #
#                                                       #
######################################################### 
class ControllerPaymentnovalnetinvoice extends Controller {
    public $shop_url;
	
	protected function index() {
		$this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		unset($_SESSION['novalnet_invoice_order_info']);
		$this->language->load('payment/novalnet_invoice');
		$this->data['text_Invoice'] = $this->language->get('text_Invoice');
		$this->data['text_heading'] = $this->language->get('text_heading');
		$this->data['text_novalnet_testmode_desc'] = $this->language->get('text_novalnet_testmode_desc');
		$this->data['testmode_desc'] = html_entity_decode($this->config->get('novalnet_invoice_test'), ENT_QUOTES, 'UTF-8');
		$this->data['text_novalnet_redirection'] = $this->language->get('text_novalnet_redirection');
		$_SESSION['novalnet_invoice_order_info'] = 	 $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');
		
		$this->data['continue'] = $this->shop_url . 'index.php?route=checkout/success';
		
		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = $this->shop_url. 'index.php?route=checkout/checkout';
		} else {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/guest_step_2';
		}
		
		$this->id = 'payment';

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/novalnet_invoice.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/novalnet_invoice.tpl';
		} else {
			$this->template = 'default/template/payment/novalnet_invoice.tpl';
		}	
		
		$this->render();
	}
 
	
	public function confirm() {
		global $session;
		$shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$this->language->load('payment/novalnet_invoice');
	
		$order_info = $_SESSION['novalnet_invoice_order_info'];
		
		unset($_SESSION['novalnet_invoice_order_info']);
		$amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], FALSE);
		if (preg_match('/[^\d\.]/', $amount) or !$amount){
		  ### $amount contains some unallowed chars or empty ###
		  $err                      = '$amount ('.$amount.') is empty or has a wrong format';
		  $order->info['comments'] .= '. Novalnet Error Message : '.$err;
		  $payment_error_return     = 'payment_error='.$this->code.'&error='.$err;
		  
		}
		$amount = sprintf('%0.2f', $amount);
		$amount = preg_replace('/^0+/', '', $amount);
		$amount = str_replace('.', '', $amount);
        
        $product_id     = html_entity_decode(trim($this->config->get('novalnet_invoice_productid')), ENT_QUOTES, 'UTF-8');
		$tariff_id      = html_entity_decode(trim($this->config->get('novalnet_invoice_tariffid')), ENT_QUOTES, 'UTF-8');
	    $payment_duration = html_entity_decode(trim($this->config->get('novalnet_invoice_PaymentDuration')), ENT_QUOTES, 'UTF-8');
        
        if(!preg_match("/^[0-9]*$/", $payment_duration)){$payment_duration = '';}
        $due_date = '';
        $due_date_string = '';
        if($payment_duration)
        {
        $due_date = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+$payment_duration,date("Y")));
        $due_date_string = '&due_date='.date("Y-m-d",mktime(0,0,0,date("m"),date("d")+$payment_duration,date("Y")));
        } 
		
		$language = strtoupper($session->data['language']); 
	    if($order_info['customer_id'] == 0 ||  $order_info['customer_id'] == '') {
		   
		   $order_info['customer_id'] = ($language == 'EN') ? "Guest" : "Gast";
		}
       
       	### Process the payment to paygate ##
       	$url = 'https://payport.novalnet.de/paygate.jsp';
		$urlparam  = 'vendor='.html_entity_decode(trim($this->config->get('novalnet_invoice_merchantid')), ENT_QUOTES, 'UTF-8').'&product='.$product_id.'&key=27&tariff='.$tariff_id.'&auth_code='.html_entity_decode(trim($this->config->get('novalnet_invoice_authorisation')), ENT_QUOTES, 'UTF-8').'&currency='.$order_info['currency_code'];
		$test_mode = html_entity_decode($this->config->get('novalnet_invoice_test'), ENT_QUOTES, 'UTF-8');
		
		$urlparam .= '&test_mode='.$test_mode; 
		$urlparam .= '&amount='.$amount;
		$urlparam .= '&first_name='.$order_info['payment_firstname'].'&last_name='.$order_info['payment_lastname'];
		$urlparam .= '&street='.$order_info['payment_address_1'].'&city='.$order_info['payment_city'].'&zip='.$order_info['payment_postcode'];
		$urlparam .= '&country_code='.$order_info['payment_iso_code_2'].' &email='.$order_info['email'];
		$urlparam .= '&search_in_street=1&tel='.$order_info['telephone'].'&remote_ip='.$_SERVER['REMOTE_ADDR'];
		$urlparam .= '&gender=u&fax='.$order_info['fax'];
		$urlparam .= '&language='.$language;
		$urlparam .= '&lang='.$language;
		$urlparam .= '&order_no='.$this->session->data['order_id'].'&input1=order_id&inputval1='.$this->session->data['order_id'].'&invoice_type=Invoice';
		$urlparam .= '&customer_no='.$order_info['customer_id'];
		$urlparam .= '&invoice_ref=BNR-'.$product_id .'-'. $this->session->data['order_id'];
		$urlparam .= '&use_utf8=' . 1;
		$urlparam .= 'tel='.$order_info['telephone'];
        $urlparam .= $due_date_string;
		
		list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
		
		$aryResponse = array();
	   #capture the result and message and other parameters from response data '$data' in an array
		$aryPaygateResponse = explode('&', $data);
		
		foreach($aryPaygateResponse as $key => $value){
		   if($value!="") {
			  $aryKeyVal = explode("=",$value);
			  $aryResponse[$aryKeyVal[0]] = $aryKeyVal[1];
			
		   }
		}
		
		if($aryResponse['status']==100){
		   ### Passing through the Transaction ID from Novalnet's paygate into order-info ###
		   $this->load->model('checkout/order');
		   $novalnet_invoice_comments = '';
		   $payment_title = $session->data['language'] == 'en' ?'Novalnet Invoice' : 'Novalnet Kauf auf Rechnung';  
		   $novalnet_invoice_comments .= '<b>'.$payment_title.'</b><br/>';
		   	$testmode  = html_entity_decode($this->config->get('novalnet_invoice_test'), ENT_QUOTES, 'UTF-8');
		   $test_order_status = (((isset($aryResponse['test_mode']) && $aryResponse['test_mode'] == 1) || (isset($testmode) && $testmode == 1)) ? 1 : 0 );
		   	if(isset($test_order_status)){
				$novalnet_invoice_comments .= $this->language->get('text_invoice_testorder')."<br />";
			}
			
			
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_transactionid').$aryResponse['tid'].$this->language->get('text_invoice_transfer').'<br/>';
		  if($this->config->get('novalnet_invoice_PaymentDuration')){
			if($session->data['language'] == 'en')
			{
			$novalnet_invoice_comments .= $this->language->get('text_invoice_date')."<b>".date("d/m/Y",mktime(0,0,0,date("m"),date("d")+$this->config->get('novalnet_invoice_PaymentDuration'),date("Y")))."</b><br>";
			}
			else
			{
			$novalnet_invoice_comments .= $this->language->get('text_invoice_date')."<b>".date("d.m.Y",mktime(0,0,0,date("m"),date("d")+$this->config->get('novalnet_invoice_PaymentDuration'),date("Y")))."</b><br>";

			}
		  }
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_accountholder').'NOVALNET AG</b><br />';
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_accountno').$aryResponse['invoice_account'].'</b><br />';
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_bankcode'). $aryResponse['invoice_bankcode'].'</b><br/>';
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_bank').'<b>'.$aryResponse['invoice_bankname'].' '.trim($aryResponse['invoice_bankplace']).'</b><br>';
	      $novalnet_invoice_comments .= $this->language->get('text_invoice_amount').$this->currency->format($order_info['total'], $order_info['currency_code']).'</b><br />';
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_tid').$aryResponse['tid']."</b>".$this->language->get('text_invoice_ref')."<br>";
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_iban')."<b>".$aryResponse['invoice_iban']."</b><br>";
		  $novalnet_invoice_comments .= $this->language->get('text_invoice_swift').$aryResponse['invoice_bic'].'</b><br />';
		
		  ### Send Postback Params to Server 
		  $_SESSION['nn_tid'] = $aryResponse['tid'];
		  $order_id = $this->session->data['order_id'];
	      if(isset($aryResponse['tid']) && $aryResponse['tid'] != '' )
		  {
	       $url = 'https://payport.novalnet.de/paygate.jsp';
	
		   $urlparam = array(
		                  'vendor'          =>  html_entity_decode(trim($this->config->get('novalnet_invoice_merchantid')), ENT_QUOTES, 'UTF-8'),
		                  'product'         =>  $product_id,
		                  'tariff'          =>  $tariff_id,  
		                  'key'             =>  '27',  
		                  'auth_code'       =>  html_entity_decode(trim($this->config->get('novalnet_invoice_authorisation')),ENT_QUOTES, 'UTF-8'),
		                  'status'          =>  '100',
		                  'tid'             =>  $_SESSION['nn_tid'],
		                  'order_no'        =>  $order_id,
		                  '&vwz2'           =>  $order_id,
		                  'invoice_ref=BNR' =>  $product_id .'-'. $order_id,
		                  'vwz3'            =>  date('Y-m-d H:i:s')
		                 );

          
		  list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
	      unset($_SESSION['nn_tid']);	
          }
		
		  $this->model_checkout_order->confirm($this->session->data['order_id'], $this->config->get('novalnet_invoice_order_status_id'),$novalnet_invoice_comments,'true');
		  $this->redirect($this->shop_url .'index.php/?route=checkout/success');	
		   
		}else{
		  ### Passing through the Error Response from Novalnet's paygate into order-info ###
		  if($aryResponse['status_desc'])  {
					$error_status_desc = $aryResponse['status_desc'];
				  } else {
					$error_status_desc = $this->language->get('text_invoice_status');
				  }
                $error_status_desc = $this->ReplaceSpecialGermanChars($error_status_desc);
		        $this->data['oc_version'] = (int)str_replace('.', '', VERSION); 
                 if(version_compare(VERSION, '1.5.1.3', '>')){
				     $this->load->model('checkout/order');
				     $this->data['text_failure_wait'] = $this->language->get('text_novalnet_redirection');
				     //$this->data['heading_title'] = 'Novalnet AG';
				     $this->data['novalnet_title'] = 'Novalnet AG';
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
		return;
	}

    public function sendForm($url, $aParams) {
		if( $aParams ) {
		
		 $this->language->load('payment/novalnet_invoice');
				
				$frmData = '<form name="frmnovalnet" method="post" action="' . $url . '">';
				$frmEnd  = $this->language->get('text_invoice_automaticredirection').'<br> <input type="submit" name="enter" value='.$this->language->get('text_invoice_redirection').' /></form>';
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
 }
?>
