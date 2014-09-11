<?php 
class ControllerPaymentnovalnetprepayment extends Controller {
	private $error = array();
	public $shop_url;
	
	public function index() {
		$this->shop_url = ((($this->data == 'SSL') ? HTTP_SERVER : HTTPS_SERVER));
		$this->load->language('payment/novalnet_prepayment');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addStyle('view/stylesheet/novalnet.css');
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('novalnet_prepayment', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->shop_url . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}
		
		$this->data['heading_title'] = $this->language->get('admin_heading_title');
		
		$this->data['text_Enabled'] = $this->language->get('text_Enabled');
		$this->data['text_Disabled'] = $this->language->get('text_Disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		
		//Total
		$this->data['entry_total'] = $this->language->get('entry_total');
		
		$this->data['entry_test'] = $this->language->get('entry_test');
		$this->data['entry_merchantid'] = $this->language->get('entry_merchantid');
		$this->data['entry_authorisation'] = $this->language->get('entry_authorisation');
		$this->data['entry_productid'] = $this->language->get('entry_productid');
		$this->data['entry_tariffid'] = $this->language->get('entry_tariffid');
		$this->data['entry_InformationtotheCustomer'] = $this->language->get('entry_InformationtotheCustomer');
		$this->data['entry_proxy'] = $this->language->get('entry_proxy');
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');
		$this->data['entry_payment_zone'] = $this->language->get('entry_payment_zone');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
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
			'href'      => $this->shop_url . 'index.php?route=payment/novalnet_prepayment&token=' . $this->session->data['token'],
			'text'      => $this->language->get('heading_title'),
			'separator' => ' :: '
		);
		
		$this->data['action'] = $this->shop_url . 'index.php?route=payment/novalnet_prepayment&token=' . $this->session->data['token'];
		$this->data['cancel'] = $this->shop_url . 'index.php?route=extension/payment&token=' . $this->session->data['token'];	
		
		if (isset($this->request->post['novalnet_prepayment_test'])) {
			$this->data['novalnet_prepayment_test'] = $this->request->post['novalnet_prepayment_test'];
		} else {
			$this->data['novalnet_prepayment_test'] = $this->config->get('novalnet_prepayment_test'); 
		}
		
		//Total check of the novalnet payment method name 
		if (isset($this->request->post['novalnet_prepay_total'])) {
			$this->data['novalnet_prepay_total'] = $this->request->post['novalnet_prepay_total'];
		}
		else {
			$this->data['novalnet_prepay_total'] = $this->config->get('novalnet_prepay_total');
		}
		
		if (isset($this->request->post['novalnet_prepayment_merchantid'])) {
			$this->data['novalnet_prepayment_merchantid'] = $this->request->post['novalnet_prepayment_merchantid'];
		} else {
			$this->data['novalnet_prepayment_merchantid'] = $this->config->get('novalnet_prepayment_merchantid'); 
		}
		
		if (isset($this->request->post['novalnet_prepayment_authorisation'])) {
			$this->data['novalnet_prepayment_authorisation'] = $this->request->post['novalnet_prepayment_authorisation'];
		} else {
			$this->data['novalnet_prepayment_authorisation'] = $this->config->get('novalnet_prepayment_authorisation'); 
		}
		
		if (isset($this->request->post['novalnet_prepayment_productid'])) {
			$this->data['novalnet_prepayment_productid'] = $this->request->post['novalnet_prepayment_productid'];
		} else {
			$this->data['novalnet_prepayment_productid'] = $this->config->get('novalnet_prepayment_productid'); 
		}
		
		if (isset($this->request->post['novalnet_prepayment_tariffid'])) {
			$this->data['novalnet_prepayment_tariffid'] = $this->request->post['novalnet_prepayment_tariffid'];
		} else {
			$this->data['novalnet_prepayment_tariffid'] = $this->config->get('novalnet_prepayment_tariffid'); 
		}
		
		if (isset($this->request->post['novalnet_prepayment_InformationtotheCustomer'])) {
			$this->data['novalnet_prepayment_InformationtotheCustomer'] = $this->request->post['novalnet_prepayment_InformationtotheCustomer'];
		} else {
			$this->data['novalnet_prepayment_InformationtotheCustomer'] = $this->config->get('novalnet_prepayment_InformationtotheCustomer'); 
		}
		
		if (isset($this->request->post['novalnet_prepayment_sort_order'])) {
			$this->data['novalnet_prepayment_sort_order'] = $this->request->post['novalnet_prepayment_sort_order'];
		} else {
			$this->data['novalnet_prepayment_sort_order'] = $this->config->get('novalnet_prepayment_sort_order');
		}
		
		if (isset($this->request->post['novalnet_prepayment_order_status_id'])) {
			$this->data['novalnet_prepayment_order_status_id'] = $this->request->post['novalnet_prepayment_order_status_id'];
		} else {
			$this->data['novalnet_prepayment_order_status_id'] = $this->config->get('novalnet_prepayment_order_status_id'); 
		}
		
		$this->load->model('localisation/order_status');
		
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['novalnet_prepayment_payment_zone_id'])) {
			$this->data['novalnet_prepayment_payment_zone_id'] = $this->request->post['novalnet_prepayment_payment_zone_id'];
		} else {
			$this->data['novalnet_prepayment_payment_zone_id'] = $this->config->get('novalnet_prepayment_payment_zone_id'); 
		}
		
		$this->load->model('localisation/geo_zone');
		
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getgeoZones();
		
		if (isset($this->request->post['novalnet_prepayment_status'])) {
			$this->data['novalnet_prepayment_status'] = $this->request->post['novalnet_prepayment_status'];
		} else {
			$this->data['novalnet_prepayment_status'] = $this->config->get('novalnet_prepayment_status');
		}
		
		if (isset($this->request->post['novalnet_prepayment_proxy'])) {
			$this->data['novalnet_prepayment_proxy'] = $this->request->post['novalnet_prepayment_proxy'];
		} else {
			$this->data['novalnet_prepayment_proxy'] = $this->config->get('novalnet_prepayment_proxy');
		}
		
		$this->template = 'payment/novalnet_prepayment.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/novalnet_prepayment')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!trim($this->request->post['novalnet_prepayment_merchantid'])) {
			$this->error['merchant'] = $this->language->get('error_merchant');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		if (!trim($this->request->post['novalnet_prepayment_authorisation'])) {
			$this->error['authorisation'] = $this->language->get('error_authorisation');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		if (!trim($this->request->post['novalnet_prepayment_productid'])) {
			$this->error['productid'] = $this->language->get('error_productid');
			$this->error['warning'] = $this->language->get('error_warning');
		}
		if (!trim($this->request->post['novalnet_prepayment_tariffid'])) {
			$this->error['tariffid'] = $this->language->get('error_tariffid');
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
