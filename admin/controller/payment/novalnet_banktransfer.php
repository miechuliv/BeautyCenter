<?php 
class ControllerPaymentnovalnetbanktransfer extends Controller {
	private $error = array();
	public $shop_url;
	
	public function index() {
		$this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$this->load->language('payment/novalnet_banktransfer');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addStyle('view/stylesheet/novalnet.css');
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('novalnet_banktransfer', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->shop_url . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}
		
		$this->data['heading_title'] = $this->language->get('admin_heading_title');
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		
		//Total
		$this->data['entry_total'] = $this->language->get('entry_total');
		
		$this->data['entry_novalnet_banktransfer_testmode'] = $this->language->get('entry_novalnet_banktransfer_testmode');
		$this->data['entry_novalnet_banktransfer_merchantid'] = $this->language->get('entry_novalnet_banktransfer_merchantid');
		$this->data['entry_novalnet_banktransfer_auth_code'] = $this->language->get('entry_novalnet_banktransfer_auth_code');
		$this->data['entry_novalnet_banktransfer_productid'] = $this->language->get('entry_novalnet_banktransfer_productid');
		$this->data['entry_novalnet_banktransfer_tariffid'] = $this->language->get('entry_novalnet_banktransfer_tariffid');
		$this->data['entry_novalnet_banktransfer_info'] = $this->language->get('entry_novalnet_banktransfer_info');
		$this->data['entry_novalnet_banktransfer_sort_order'] = $this->language->get('entry_novalnet_banktransfer_sort_order');
		$this->data['entry_novalnet_banktransfer_password'] = $this->language->get('entry_novalnet_banktransfer_password');		
		$this->data['entry_novalnet_banktransfer_status'] = $this->language->get('entry_novalnet_banktransfer_status');		
		$this->data['entry_novalnet_banktransfer_payment_zone'] = $this->language->get('entry_novalnet_banktransfer_payment_zone');
		$this->data['entry_novalnet_banktransfer_proxy'] = $this->language->get('entry_novalnet_banktransfer_proxy');
		$this->data['entry_novalnet_banktransfer_order_status'] = $this->language->get('entry_novalnet_banktransfer_order_status');
		$this->data['novalnet_contact_info'] = $this->language->get('novalnet_contact_info');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
		$this->data['tab_general'] = $this->language->get('tab_general');
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->error['merchant'])) {
			$this->data['error_merchant'] = $this->error['merchant'];
		} else {
			$this->data['error_merchant'] = '';
		}
		
		if (isset($this->error['authorisation'])) {
			$this->data['error_authorisation'] = $this->error['authorisation'];
		} else {
			$this->data['error_authorisation'] = '';
		}
		
		if (isset($this->error['productid'])) {
			$this->data['error_productid'] = $this->error['productid'];
		} else {
			$this->data['error_productid'] = '';
		}
		
		
		if (isset($this->error['tariffid'])) {
			$this->data['error_tariffid'] = $this->error['tariffid'];
		} else {
			$this->data['error_tariffid'] = '';
		}
		
		if (isset($this->error['password'])) {
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}
		
		$this->data['breadcrumbs'] = array();
		
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->shop_url . 'index.php?route=common/home&token=' . $this->session->data['token'],
			'text'      => $this->language->get('text_home'),
			'separator' => FALSE
		);
		
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->shop_url . 'index.php?route=extension/payment&token=' . $this->session->data['token'],
			'text'      => $this->language->get('text_payment'),
			'separator' => ' :: '
		);
		
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->shop_url . 'index.php?route=payment/novalnet_banktransfer&token=' . $this->session->data['token'],
			'text'      => $this->language->get('heading_title'),
			'separator' => ' :: '
		);
		
		$this->data['action'] = $this->shop_url . 'index.php?route=payment/novalnet_banktransfer&token=' . $this->session->data['token'];
		$this->data['cancel'] = $this->shop_url . 'index.php?route=extension/payment&token=' . $this->session->data['token'];	
		
		if (isset($this->request->post['novalnet_banktransfer_testmode'])) {
			$this->data['novalnet_banktransfer_testmode'] = $this->request->post['novalnet_banktransfer_testmode'];
		} else {
			$this->data['novalnet_banktransfer_testmode'] = $this->config->get('novalnet_banktransfer_testmode'); 
		}
		
		//Total check of the novalnet payment method name 
		if (isset($this->request->post['novalnet_inst_total'])) {
			$this->data['novalnet_inst_total'] = $this->request->post['novalnet_inst_total'];
		}
		else {
			$this->data['novalnet_inst_total'] = $this->config->get('novalnet_inst_total');
		}
		
		if (isset($this->request->post['novalnet_banktransfer_merchantid'])) {
			$this->data['novalnet_banktransfer_merchantid'] = $this->request->post['novalnet_banktransfer_merchantid'];
		} else {
			$this->data['novalnet_banktransfer_merchantid'] = $this->config->get('novalnet_banktransfer_merchantid'); 
		}
		
		if (isset($this->request->post['novalnet_banktransfer_auth_code'])) {
			$this->data['novalnet_banktransfer_auth_code'] = $this->request->post['novalnet_banktransfer_auth_code'];
		} else {
			$this->data['novalnet_banktransfer_auth_code'] = $this->config->get('novalnet_banktransfer_auth_code'); 
		}
		
		if (isset($this->request->post['novalnet_banktransfer_productid'])) {
			$this->data['novalnet_banktransfer_productid'] = $this->request->post['novalnet_banktransfer_productid'];
		} else {
			$this->data['novalnet_banktransfer_productid'] = $this->config->get('novalnet_banktransfer_productid'); 
		}
		
		if (isset($this->request->post['novalnet_banktransfer_tariffid'])) {
			$this->data['novalnet_banktransfer_tariffid'] = $this->request->post['novalnet_banktransfer_tariffid'];
		} else {
			$this->data['novalnet_banktransfer_tariffid'] = $this->config->get('novalnet_banktransfer_tariffid'); 
		}
		
		if (isset($this->request->post['novalnet_banktransfer_info'])) {
			$this->data['novalnet_banktransfer_info'] = $this->request->post['novalnet_banktransfer_info'];
		} else {
			$this->data['novalnet_banktransfer_info'] = $this->config->get('novalnet_banktransfer_info'); 
		}
		
		if (isset($this->request->post['novalnet_banktransfer_sort_order'])) {
			$this->data['novalnet_banktransfer_sort_order'] = $this->request->post['novalnet_banktransfer_sort_order'];
		} else {
			$this->data['novalnet_banktransfer_sort_order'] = $this->config->get('novalnet_banktransfer_sort_order');
		}
		
		if (isset($this->request->post['novalnet_banktransfer_order_status_id'])) {
			$this->data['novalnet_banktransfer_order_status_id'] = $this->request->post['novalnet_banktransfer_order_status_id'];
		} else {
			$this->data['novalnet_banktransfer_order_status_id'] = $this->config->get('novalnet_banktransfer_order_status_id');
		}
		
		$this->load->model('localisation/order_status');
		
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['novalnet_banktransfer_payment_zone_id'])) {
			$this->data['novalnet_banktransfer_payment_zone_id'] = $this->request->post['novalnet_banktransfer_payment_zone_id'];
		} else {
			$this->data['novalnet_banktransfer_payment_zone_id'] = $this->config->get('novalnet_banktransfer_payment_zone_id'); 
		}
		
		$this->load->model('localisation/geo_zone');
		
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['novalnet_banktransfer_proxy'])) {
			$this->data['novalnet_banktransfer_proxy'] = $this->request->post['novalnet_banktransfer_proxy'];
		} else {
			$this->data['novalnet_banktransfer_proxy'] = $this->config->get('novalnet_banktransfer_proxy');
		}
		
		if (isset($this->request->post['novalnet_banktransfer_password'])) {
			$this->data['novalnet_banktransfer_password'] = $this->request->post['novalnet_banktransfer_password'];
		} else {
			$this->data['novalnet_banktransfer_password'] = $this->config->get('novalnet_banktransfer_password'); 
		}
		
		if (isset($this->request->post['novalnet_banktransfer_status'])) {
			$this->data['novalnet_banktransfer_status'] = $this->request->post['novalnet_banktransfer_status'];
		} else {
			$this->data['novalnet_banktransfer_status'] = $this->config->get('novalnet_banktransfer_status'); 
		}
		
		$this->template = 'payment/novalnet_banktransfer.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/novalnet_banktransfer')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!trim($this->request->post['novalnet_banktransfer_merchantid'])) {
			$this->error['merchant'] = $this->language->get('error_merchant');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		if (!trim($this->request->post['novalnet_banktransfer_auth_code'])) {
			$this->error['authorisation'] = $this->language->get('error_authorisation');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		if (!trim($this->request->post['novalnet_banktransfer_productid'])) {
			$this->error['productid'] = $this->language->get('error_productid');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		if (!trim($this->request->post['novalnet_banktransfer_tariffid'])) {
			$this->error['tariffid'] = $this->language->get('error_tariffid');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
		if (!trim($this->request->post['novalnet_banktransfer_password'])) {
			$this->error['password'] = $this->language->get('error_password');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
		if (!$this->error) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
}
?>
