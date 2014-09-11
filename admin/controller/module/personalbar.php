<?php
class ControllerModulepersonalbar extends Controller {
	
	private $error = array(); 

	public function install() {
	   $this->load->model('module/personalbar');
       $this->model_module_personalbar->createTable(); 
	}

	private function _registerBar($email, $storeurl) {
		$this->barData = $this->model_module_personalbar->getBar();
		if (empty($email) || empty($storeurl)) {
			return false;
		}

		if (!empty($this->barData->row["security_token"])) {
			return false;
		}
		// make sure store url has a slash at the end
		if (substr($storeurl, -1)!="/") {
			$storeurl = $storeurl . "/";
		}
		$this->model_module_personalbar->updateEmail($email);
		$url = $this->cs_url."registerOpencartPost";

		$post_data = array(
			"email" => $email,
			"platformVersion" => VERSION,
			"storeURL" => $storeurl,
			"cartURL" => $storeurl."index.php?route=checkout/cart",
			"guessedStoreURL" => $this->guessed_store_url
		);
		$curl_response = $this->_request($url, $post_data, true);
		$jsonResponse = json_decode($curl_response);
		if (!empty($jsonResponse)) {
			if ($jsonResponse->good=="true") {
				$this->model_module_personalbar->updateBar($jsonResponse->data);
			} else {
				$this->error['warning'] = "Error: ";
				foreach($jsonResponse->fieldErrors as $obj=>$val) {
					$this->error['warning'] = $this->error['warning'].$obj.": ".$val."\n";
				}
			}
		} else {
			$this->error['warning'] = "Unknown error. Please <a target='_blank' href='http://commercesciences.com/contact/?".$this->plugin_id."'>Contact the Support Team</a> for assistance.";
		}
		if (!empty($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		}
	}

	private function _getBarStatus() {
		$this->barData = $this->model_module_personalbar->getBar();
		$token = $this->barData->row["security_token"];
		if (empty($token)) {
			return -1;
		}
		$query_string = "?".$this->plugin_id."&userID=".$this->barData->row["user_id"]."&securityToken=".$token;
		$url = $this->cs_url."getBarStatus".$query_string;
		$curl_response = $this->_request($url, null, false);
		if (strrpos($curl_response,"Service Temporarily Unavailable")!==false) {
			return -2;
		}
		$jsonResponse = json_decode($curl_response);
		$this->data['first_time'] = false;
		$this->data['hidden'] = false;
		$this->data['config_url'] =$this->cs_url."configureInitial?".$this->plugin_id."&userID=".$this->barData->row["user_id"]."&securityToken=".$this->barData->row["security_token"];
		if ($jsonResponse->good=="true") {
			if ($jsonResponse->data=="NotConfigured") {
				$this->data['first_time'] = true;
				return 1;
			} else 
			if ($jsonResponse->data=="Hidden") {
				$this->data['hidden'] = true;
				return 2;
			} else {
				return 3;
			}
		}
		return 0;
	}

	private function _request($url, $params, $isPost) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_POST, $isPost);
		if ($isPost) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		$curl_response = curl_exec($curl);
		curl_close($curl);
		return $curl_response;
	}

	private function _getSettingValue($key) {
		$result = "";
		$configQuery = $this->db->query("SELECT * FROM ".DB_PREFIX."setting WHERE `key`='".$key."'");
		if ($configQuery->num_rows>0) {
			$result = $configQuery->row["value"];
		}
		return $result;
	}
	
	public function index() {   
		$this->load->language('module/personalbar');

		$this->load->model('module/personalbar');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');

		

		$this->plugin_id = "a=opc";

		$this->guessed_store_url = HTTP_CATALOG;
		if (strpos($this->guessed_store_url, "http://localhost")!==false) {
			$this->guessed_store_url = "";
		}

		$email_value = "";
		$cs_url = "";

		$this->barData = $this->model_module_personalbar->getBar();
		if ($this->barData->num_rows>0) {
			$email_value = $this->barData->row['email'];
			if (empty($email_value)) {
				$email_value = $this->_getSettingValue("config_email");
			}
		} else {
			// Can't be that our information is missing, unless someone tampered with the db.
			$this->install();
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
			
		$this->cs_url = $this->barData->row["cs_url"];
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->session->data['success'] = $this->language->get('text_success');
			if (isset($_POST["cs_email_field"]) && isset($_POST["cs_storeurl_field"])) {
				$this->_registerBar(trim($_POST["cs_email_field"]), trim($_POST["cs_storeurl_field"]));
			}
		}
		$barStatus = $this->_getBarStatus();
		if ($barStatus<=0) {
			$this->template = 'module/personalbar.tpl';
		} else {
			$this->template = 'module/personalbar_ready.tpl';
		}
		$this->load->model('design/layout');
		$layouts = $this->model_design_layout->getLayouts();
		foreach($layouts as $layout) {
			$settings['personalbar_module'][] = Array (
				'layout_id' => $layout['layout_id'],
				'position' => 'content_bottom',
				'status' => 1,
				'sort_order' => ''
			);	
		}
		$this->model_setting_setting->editSetting('personalbar', $settings);
		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();


		$this->data['email_value'] = $email_value;
		$this->data['storeurl_value'] = $this->guessed_store_url;
		
		$text_strings = array(
				'heading_title',
				'about_title',
				'button_save',
				'button_cancel',
				'email' 
		);
		
		foreach ($text_strings as $text) {
			$this->data[$text] = $this->language->get($text);
		}
		


	
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/personalbar', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/personalbar', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

	
		$this->data['cs_url'] = $this->cs_url;

		$this->data['plugin_id'] = $this->plugin_id;
		

		

		$this->children = array(
			'common/header',
			'common/footer',
		);

		//Send the output.
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/personalbar')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}


}
?>