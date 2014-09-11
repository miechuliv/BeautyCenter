<?php
#########################################################
#                                                       #
#  Telephone payment method class                       #
#  This module is used for real time processing of      #
#  Telephone payment of customers.                      #
#                                                       #
#  Released under the GNU General Public License.       #
#  This free contribution made by request.              #
#  If you have found this script usefull a small        #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_tel.php                            #
#                                                       #
#########################################################
class ControllerPaymentnovalnettel extends Controller {
     protected $key = 18;
	 public $tel_product_id;
	 public $tel_tariff_id;
	 public $tel_auth_code;
	 public $tel_test_mode;
	 public $tel_vendor;
	 public $shop_url;
	
	protected function index() {
	    $this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
	    $this->language->load('payment/novalnet_tel');
	    $this->data['text_tel'] = $this->language->get('text_tel');
		$this->data['text_heading'] = $this->language->get('text_heading');
        $this->data['text_novalnet_redirection'] = $this->language->get('text_novalnet_redirection');
         $this->data['text_novalnet_testmode_desc'] = $this->language->get('text_novalnet_testmode_desc');
	  $this->data['testmode_desc'] = html_entity_decode($this->config->get('novalnet_tel_test'), ENT_QUOTES, 'UTF-8');
        $_SESSION['novalnet_tel_order_info'] = $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
 
    	$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');
		$this->data['text_wait'] = $this->language->get('text_wait');
		$this->data['text_empty'] = $this->language->get('text_empty');
		$this->data['continue'] = $this->shop_url . 'index.php?route=checkout/confirm';
		
		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/checkout';
		} else {
			$this->data['back'] = $this->shop_url . 'index.php?route=checkout/guest_step_2';
		}
		$this->id = 'payment';
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/novalnet_tel.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/novalnet_tel.tpl';
		} else {
			$this->template = 'default/template/payment/novalnet_tel.tpl';
		}
		$this->render();
	}
	
	
	public function confirm() {
	    $newline = "<br>";
		global $session;
		$this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$this->tel_product_id  = html_entity_decode(trim($this->config->get('novalnet_tel_productid')), ENT_QUOTES, 'UTF-8');
		$this->tel_tariff_id  = html_entity_decode(trim($this->config->get('novalnet_tel_tariffid')), ENT_QUOTES, 'UTF-8');
		$this->tel_vendor = html_entity_decode(trim($this->config->get('novalnet_tel_merchantid')), ENT_QUOTES, 'UTF-8');
		$this->tel_auth_code = html_entity_decode(trim($this->config->get('novalnet_tel_authorisation')), ENT_QUOTES, 'UTF-8');
		$this->tel_test_mode = (strtolower($this->config->get('novalnet_tel_test')) == 'true' or $this->config->get('novalnet_tel_test') == '1' or strtolower($this->config->get('novalnet_tel_test'))== 'yes')? 1: 0;
		$this->language->load('payment/novalnet_tel');
		
		$order_info = $_SESSION['novalnet_tel_order_info'];
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
		
		if($amount<99 || $amount>1000)//14.98<10.00 
			{
				        $json = array();
						$error_amt_great =$this->language->get('text_novalnet_amt_greater');
						$error_warning = $error_amt_great;
						$error_warning = utf8_encode($error_warning);
						$_SESSION['novalnet_error'] = $error_warning;
						$json['error'] = $error_warning;
						$this->response->setOutput(json_encode($json));
						return false; 
			}
	    else if(empty($_SESSION['tid'])){
		
		$product_id    = $this->tel_product_id;
		$tariff_id     = $this->tel_tariff_id ;
		
		$language =	strtoupper($session->data['language']);
		if($order_info['customer_id'] == 0 ||  $order_info['customer_id'] == '') {
		   /*$order_info['customer_id'] = "Guest";*/
		   $order_info['customer_id'] = ($language == 'EN') ? "Guest" : "Gast";
		}
		$_SESSION['shipping_method'] = $order_info['shipping_method'];
		
		### Process the payment to paygate ##
		$url = 'https://payport.novalnet.de/paygate.jsp';
		$urlparam  = 'vendor='.$this->tel_vendor.'&product='.$product_id.'&key='. $this->key .'&tariff='.$tariff_id.'&auth_code='.$this->tel_auth_code .'&currency='.$order_info['currency_code'];
		$testmode  = $this->tel_test_mode;
		$urlparam .='&test_mode='.$testmode; 
		$urlparam .= '&amount='.$amount;
		$urlparam .= '&first_name='.$order_info['payment_firstname'].'&last_name='.$order_info['payment_lastname'];
		$urlparam .= '&street='.$order_info['payment_address_1'].'&city='.$order_info['payment_city'].'&zip='.$order_info['payment_postcode'];
		$urlparam .= '&country_code='.$order_info['payment_iso_code_2'].'&country='.$order_info['payment_iso_code_2'].' &email='.$order_info['email'];
		$urlparam .= '&search_in_street=1&tel='.$order_info['telephone'].'&remote_ip='.$_SERVER['REMOTE_ADDR'];
		$urlparam .= '&gender=u&fax='.$order_info['fax'];
		$urlparam .= '&language='.$language;
		$urlparam .= '&lang='.$language;
		$urlparam .= '&order_no='.$this->session->data['order_id'].'&input1=order_id&inputval1='.$this->session->data['order_id'];
		$urlparam .= '&customer_no='.$order_info['customer_id'];
		$urlparam .='&use_utf8='. 1;
		$urlparam .= 'tel='.$order_info['telephone'];
		
	   list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
		
		//Manual Testing
				//$data = 'status=100&status_desc=successfull&test_mode=1&tid=12585800000916931&novaltel_number=0049899230683141';
		$aryResponse = array();
		
		#capture the result and message and other parameters from response data '$data' in an array
          $aryPaygateResponse = explode('&', $data);
	             foreach ($aryPaygateResponse as $key => $value) {
				  if ($value != "") {
						$aryKeyVal = explode("=", $value);
						$aryResponse[$aryKeyVal[0]] = $aryKeyVal[1];
						}
					}
					
					if ($aryResponse['status'] == 100 && $aryResponse['tid']) {
						$_SESSION['tid'] = $aryResponse['tid'];
						$_SESSION['amount'] = $aryResponse['amount'];
						$_SESSION['nn_tid_testmode'] = $aryResponse['test_mode'];
						$_SESSION['novaltel_no'] = $aryResponse['novaltel_number'];
						$aryResponse['status_desc']='';
					if(!isset($_SESSION['tid']))
					{
						$_SESSION['tid'] = $aryResponse['tid'];
						$_SESSION['novaltel_no'] = $aryResponse['novaltel_number'];
					}
					}
					elseif($aryResponse['status']==18){}
					elseif($aryResponse['status']==19)
					{
					$_SESSION['tid'] = '';
					$_SESSION['novaltel_no'] = '';
					}
					else $status = $aryResponse['status'];
					if($aryResponse['status']==100)
					{
										
						### SECOND CALL ###

						$sess_tel = trim($_SESSION['novaltel_no']);
						if($sess_tel)
						{
						$aryTelDigits = str_split($sess_tel, 4);
						$count = 0;
						$str_sess_tel = '';
						foreach ($aryTelDigits as $ind=>$digits)
						{
						$count++;
						$str_sess_tel .= $digits;
						if($count==1) $str_sess_tel .= '-';
						else $str_sess_tel .= ' ';
						}
						$str_sess_tel=trim($str_sess_tel);
						if($str_sess_tel) $sess_tel=$str_sess_tel;
						}
						$newline = "<br>";
						$nn_currency_amount = $this->currency->format($order_info['total'], $order_info['currency_code']);
						$error  = $this->language->get('text_novalnet_follow_step').$newline.$newline;
						$error .= $this->language->get('text_novalnet_follow_step1');
						$error .= "<b>".$sess_tel."</b>".$newline;
						$error .= $this->language->get('text_novalnet_follow_steps');
						$error .= "<b>".$nn_currency_amount."</b>";
						$error .= $this->language->get('text_novalnet_follow_stepss').$newline.$newline;
						$error .= $this->language->get('text_novalnet_follow_step2').$newline;
						$error .= $this->language->get('text_novalnet_follow_stepsss').$newline;	
						
						$json = array();
						$json['error'] = '';
						$error_warning = $error;
						$error_warning = str_replace('€','&euro;',$error_warning);
						$error_warning = utf8_encode($error_warning);
						
						$_SESSION['novalnet_error'] = $error_warning;
						$json['error'] = $error_warning;
						$this->response->setOutput(json_encode($json));
						return; 
				  }
					else
					{
					    if($aryResponse['status_desc'])  {
						$error_status_desc = $aryResponse['status_desc'];
						} else {
						$error_status_desc = "There was an error and your <br>payment could not be completed";
						}
						$error_warning = $error_status_desc;
						$error_warning = $error_warning;
						$_SESSION['novalnet_error'] = $error_warning;
						$json['error'] =$error_warning;
						$this->response->setOutput(json_encode($json));
					 }
				}
                  
                  
				else
				{   
					$nn_amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], FALSE);
					if(isset($_SESSION['tid']) && ($_SESSION['amount'] != $nn_amount) || ($_SESSION['shipping_method'] != $order_info['shipping_method'])) {
                        unset($_SESSION['tid']); 
                        unset($_SESSION['amount']);
				        unset($_SESSION['shipping_method']);
				        $json = array();
				        $error_amt_variation =$this->language->get('text_novalnet_amt_variation');
						$error_warning = $error_amt_variation;
						$error_warning = $error_warning;
						$_SESSION['novalnet_error'] = $error_warning;
						$json['error'] = $error_warning;
						$this->response->setOutput(json_encode($json));
						return false;
						}
					
					
					else
					{
					$language =	strtoupper($session->data['language']);
					### Process the payment to payport ###
					$url = 'https://payport.novalnet.de/nn_infoport.xml';
					$urlparam = '<nnxml><info_request><vendor_id>'.$this->tel_vendor.'</vendor_id>';
					$urlparam .= '<vendor_authcode>'.$this->tel_auth_code.'</vendor_authcode>';
					$urlparam .= '<request_type>NOVALTEL_STATUS</request_type><tid>'.$_SESSION['tid'].'</tid>';
					$urlparam .= '<lang>'.$language.'</lang></info_request></nnxml>';
					list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
					if(strstr($data, '<novaltel_status>'))
					{
						preg_match('/novaltel_status>?([^<]+)/i', $data, $matches);
						$aryResponse['status'] = $matches[1];
						preg_match('/novaltel_status_message>?([^<]+)/i', $data, $matches);
						$aryResponse['status_desc'] = $matches[1];
					}
					
					//Manual Testing
					$aryResponse['status_desc'] = 'successfull';
					$aryResponse['status'] = 100;
					
					if($_SESSION['tid'] && $aryResponse['status']==100) #### On successful payment ####
					{
						### Passing through the Transaction ID from Novalnet's paygate into order-info ###
						$this->load->model('checkout/order');
			            $novalnet_tel_comments = '';
			            $testmode  = $this->tel_test_mode;
		                $test_order_status = (((isset($aryResponse['test_mode']) && $aryResponse['test_mode'] == 1) || (isset($testmode) && $testmode == 1)) ? 1 : 0 );
			            //$payment_title = ($session->data['language'] == 'en') ? 'Novalnet Telephone Payment ' : 'Novalnet Telefonpayment';
		                //$novalnet_tel_comments .= '<b>'.$payment_title.'</b><br/>';
						if(isset($test_order_status)){
						$novalnet_tel_comments .= $this->language->get('text_tel_testorder').$newline;
						}
						$novalnet_tel_comments .= $this->language->get('text_tel_transactionid').$_SESSION['tid'];
						
				        ### Send Postback Params to Server 
		               $order_id = $this->session->data['order_id'];
	                   if(isset($aryResponse['tid']) && $aryResponse['tid'] != '' )
		               {
	                     $url = 'https://payport.novalnet.de/paygate.jsp';
	
		                 $urlparam = array(
		                  'vendor'          =>  html_entity_decode(trim($this->config->get('novalnet_tel_merchantid')), ENT_QUOTES, 'UTF-8'),
		                  'product'         =>  $product_id,
		                  'tariff'          =>  $tariff_id,  
		                  'key'             =>  '18',  
		                  'auth_code'       =>  html_entity_decode(trim($this->config->get('novalnet_tel_authorisation')),ENT_QUOTES, 'UTF-8'),
		                  'status'          =>  '100',
		                  'tid'             =>  $_SESSION['tid'],
		                  'order_no'        =>  $order_id,
		                  '&vwz2'           =>  $order_id,
		                  'vwz3'            =>  date('Y-m-d H:i:s')
		                    );

          
		               list($errno, $errmsg, $data) = $this->perform_https_request($url, $urlparam);
	                   }
				$this->model_checkout_order->confirm($this->session->data['order_id'], $this->config->get('novalnet_tel_order_status_id'),$novalnet_tel_comments,'true');
			    $json['success'] = $this->url->link('checkout/success', '', 'SSL');
				$this->response->setOutput(json_encode($json));
							
						unset($_SESSION['tid']);
						unset($_SESSION['nn_tid_testmode']);	
						unset($_SESSION['novaltel_no']);	
						
						$_SESSION['tid'] = '';
						$_SESSION['novaltel_no'] = '';
					}
					else {
						$status = '';
						$amt_error = $this->language->get('text_novalnet_amt_greater');
						$wrong_amount = 1;
						if($wrong_amount==1){$status = '1';$aryResponse['status_desc'] = $amt_error;}
						elseif($aryResponse['status']==18){}
						elseif($aryResponse['status']==19)
						{
							$_SESSION['tid'] = '';
							$_SESSION['novaltel_no'] = '';
						}
						
						if($aryResponse['status_desc'])  {
						$error_status_desc = $aryResponse['status_desc'];
						} else {
						$error_status_desc = "There was an error and your <br>payment could not be completed";
						}
						$error_warning = $error_status_desc;
						$error_warning = utf8_encode($error_warning);
						$_SESSION['novalnet_error'] = $error_warning;
						$json['error'] =$error_warning;
						$this->response->setOutput(json_encode($json));
					     }
			    }
			}
		}

    public function sendForm($url, $aParams) {
		if( $aParams ) {
		   $this->language->load('payment/novalnet_tel');
			$frmData = '<form name="frmnovalnet" method="post" action="' . $url . '">';
			$frmEnd  = $this->language->get('text_tel_automaticredirection').'<br> <input type="submit" name="enter" value='.$this->language->get('text_tel_redirection').' /></form>';
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
