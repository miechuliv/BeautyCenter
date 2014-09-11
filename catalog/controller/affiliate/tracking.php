<?php 
class ControllerAffiliateTracking extends Controller { 
	public function index() {
		if (!$this->affiliate->isLogged()) {
	  		$this->session->data['redirect'] = $this->url->link('affiliate/tracking', '', 'SSL');
	  
	  		$this->redirect($this->url->link('affiliate/login', '', 'SSL'));
    	} 
	    if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
        $this->data['base'] = $this->config->get('config_ssl');
        } else {
        $this->data['base'] = $this->config->get('config_url');
        }
		$this->language->load('affiliate/tracking');

		$this->document->setTitle($this->language->get('heading_title'));

      	$this->data['breadcrumbs'] = array();

      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
        	'separator' => false
      	); 

      	$this->data['breadcrumbs'][] = array(       	
        	'text'      => $this->language->get('text_account'),
			'href'      => $this->url->link('affiliate/account', '', 'SSL'),
        	'separator' => $this->language->get('text_separator')
      	);

      	$this->data['breadcrumbs'][] = array(       	
        	'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('affiliate/tracking', '', 'SSL'),
        	'separator' => $this->language->get('text_separator')
      	);
		
    	$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_description'] = sprintf($this->language->get('text_description'), $this->config->get('config_name'));
		$this->data['text_code'] = $this->language->get('text_code');
		$this->data['text_generator'] = $this->language->get('text_generator');
		$this->data['text_link'] = $this->language->get('text_link');
		
		$this->data['button_continue'] = $this->language->get('button_continue');

    	$this->data['code'] = $this->affiliate->getCode();
		
		$this->data['continue'] = $this->url->link('affiliate/account', '', 'SSL');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/affiliate/tracking.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/affiliate/tracking.tpl';
		} else {
			$this->template = 'default/template/affiliate/tracking.tpl';
		}
		
		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'	
		);
				
		$this->response->setOutput($this->render());		
  	}
	
	public function autocomplete() {
		$json = array();
		$a = "<a target=\"_blank\" href=\"";
		$base = "\"><img src=\"";
		$img1 = "admin/uploader/server/php/files/banner468_60.gif\"></a>";
		$img2 = "admin/uploader/server/php/files/banner300_250.gif\"></a>";
		$img3 = "admin/uploader/server/php/files/banner728_90.gif\"></a>";
		$img4 = "admin/uploader/server/php/files/banner120_600.gif\"></a>";
		$img5 = "admin/uploader/server/php/files/banner120_240.gif\"></a>";
		$img6 = "admin/uploader/server/php/files/banner120_90.gif\"></a>";
		$img7 = "admin/uploader/server/php/files/banner125_125.gif\"></a>";
		$img8 = "admin/uploader/server/php/files/banner250_250.gif\"></a>";
		$img9 = "admin/uploader/server/php/files/banner110_80.gif\"></a>";

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('catalog/product');
			 
			$data = array(
				'filter_name' => $this->request->get['filter_name'],
				'start'       => 0,
				'limit'       => 20
			);
			
			$results = $this->model_catalog_product->getProducts($data);
			
			foreach ($results as $result) {
				$json[] = array(
					'name' => html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'),
					'link' => str_replace('&amp;', '&', $this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode())),
					'link1' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img1),
                    'link2' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img2),
          			'link3' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img3),
					'link4' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img4),
					'link5' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img5),
					'link6' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img6),
					'link7' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img7),
					'link8' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img8),
					'link9' => str_replace('&amp;', '&', $a .$this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $this->affiliate->getCode()) .$base . $this->config->get('config_url') . $img9),					
				);	
			}
		}

		$this->response->setOutput(json_encode($json));
	}
}
?>