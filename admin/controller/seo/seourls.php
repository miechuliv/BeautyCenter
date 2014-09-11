<?php
class ControllerSeoSeourls extends Controller {  
	private $error = array();
   
  	public function index() {
    	$this->load->language('seo/seourls');

    	$this->document->setTitle($this->language->get('heading_title'));
	
		$this->load->model('seo/seourls');
		
    	$this->getList();
  	}
   
  	public function insert() {
    	$this->load->language('seo/seourls');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('seo/seourls');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_seo_seourls->addUrl($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			$this->redirect($this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getForm();
  	}
	
	public function addcommons() {
    	$this->load->language('seo/seourls');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('seo/seourls');
		
    	if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->model_seo_seourls->addCommonsUrls($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			$this->redirect($this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	public function update() {
    	$this->load->language('seo/seourls');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('seo/seourls');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_seo_seourls->editUrl($this->request->get['url_alias_id'], $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$url = '';
					
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->redirect($this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getForm();
  	}
 
  	public function delete() { 
    	$this->load->language('seo/seourls');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('seo/seourls');
		
    	if (isset($this->request->post['selected']) && $this->validateDelete()) {
      		foreach ($this->request->post['selected'] as $url_alias_id) {
				$this->model_seo_seourls->deleteUrl($url_alias_id);	
			}

			$this->session->data['success'] = $this->language->get('text_success');
			
			$url = '';
					
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->redirect($this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	private function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'query';
		}
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}	
		$url = '';
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		//Caminos de migas de pan
  		$this->data['breadcrumbs'] = array();
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		//urls y actions
		$this->data['insert'] = $this->url->link('seo/seourls/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('seo/seourls/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');			
		$this->data['commons'] = $this->url->link('seo/seourls/addcommons', 'token=' . $this->session->data['token'] . $url, 'SSL');				
		
    	$this->data['urls'] = array();

		//obtenemos datos de BD
		$data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		$urls_total = $this->model_seo_seourls->getTotalUrls();
		
		$results = $this->model_seo_seourls->getUrls($data);
    	
		foreach ($results as $result) {
			$action = array();
			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('seo/seourls/update', 'token=' . $this->session->data['token'] . '&url_alias_id=' . $result['url_alias_id'] . $url, 'SSL')
			);
					
      		$this->data['urls'][] = array(
				'url_alias_id'    => $result['url_alias_id'],
				'query'   	 => $result['query'],
				'keyword'     => $result['keyword'],
				'selected'   => isset($this->request->post['selected']) && in_array($result['url_alias_id'], $this->request->post['selected']),
				'action'     => $action
			);
		}	
		
		//Textos
		$this->data['heading_title'] = $this->language->get('heading_title');		
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['column_query'] = $this->language->get('column_query');
		$this->data['column_keyword'] = $this->language->get('column_keyword');
		$this->data['column_action'] = $this->language->get('column_action');		
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		$this->data['button_addcomons'] = $this->language->get('button_addcomons');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
					
		$this->data['sort_query'] = $this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . '&sort=query' . $url, 'SSL');
		$this->data['sort_keyword'] = $this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . '&sort=keyword' . $url, 'SSL');
		
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
												
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
				
		$pagination = new Pagination();
		$pagination->total = $urls_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();
								
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'seo/seourl_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	}
	
	private function getForm() {
	
		//Textos idioma
    	$this->data['heading_title'] = $this->language->get('heading_title');
    	$this->data['text_enabled'] = $this->language->get('text_enabled');
    	$this->data['text_disabled'] = $this->language->get('text_disabled');
    	$this->data['entry_path'] = $this->language->get('entry_path');
    	$this->data['entry_keyword'] = $this->language->get('entry_keyword');

    	$this->data['button_save'] = $this->language->get('button_save');
    	$this->data['button_cancel'] = $this->language->get('button_cancel');
    
		//errores y avisos
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

 		if (isset($this->error['query'])) {
			$this->data['error_query'] = $this->error['query'];
		} else {
			$this->data['error_query'] = '';
		}

 		if (isset($this->error['keyword'])) {
			$this->data['error_keyword'] = $this->error['keyword'];
		} else {
			$this->data['error_keyword'] = '';
		}
		
		$url = '';
			
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		//caminito de migas de pan
  		$this->data['breadcrumbs'] = array();
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (!isset($this->request->get['url_alias_id'])) {
			$this->data['action'] = $this->url->link('seo/seourls/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('seo/seourls/update', 'token=' . $this->session->data['token'] . '&url_alias_id=' . $this->request->get['url_alias_id'] . $url, 'SSL');
		}
		  
    	$this->data['cancel'] = $this->url->link('seo/seourls', 'token=' . $this->session->data['token'] . $url, 'SSL');

    	if (isset($this->request->get['url_alias_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$seo_url = $this->model_seo_seourls->getUrl($this->request->get['url_alias_id']);
    	}

    	if (isset($this->request->post['query'])) {
      		$this->data['query'] = $this->request->post['query'];
    	} elseif (!empty($seo_url)) {
			$this->data['query'] = $seo_url['query'];
		} else {
      		$this->data['query'] = '';
    	}
  
    	if (isset($this->request->post['keyword'])) {
      		$this->data['keyword'] = $this->request->post['keyword'];
    	} elseif (!empty($seo_url)) {
			$this->data['keyword'] = $seo_url['keyword'];
		} else {
      		$this->data['keyword'] = '';
    	}
 		
		$this->template = 'seo/seourl_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());	
  	}
  	
  	private function validateForm() {
    	if (!$this->user->hasPermission('modify', 'seo/seourls')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
    
    	if ((utf8_strlen($this->request->post['query']) == 0)) {
      		$this->error['query'] = $this->language->get('error_query');
    	}
		
		if ((utf8_strlen($this->request->post['keyword']) == 0)) {
			$this->error['keyword'] = $this->language->get('error_keyword');
    	}
		
		$url = $this->model_seo_seourls->getUrlByQuery($this->request->post['query']);
		
		if (!isset($this->request->get['url_alias_id'])) {
			if ($url) {
				$this->error['warning'] = $this->language->get('error_exists');
			}
		} else {
			if ($url && ($this->request->get['url_alias_id'] != $url['url_alias_id'])) {
				$this->error['warning'] = $this->language->get('error_exists');
			}
		}

	
    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}
  	}

  	private function validateDelete() { 
    	if (!$this->user->hasPermission('modify', 'seo/seourls')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	} 
	  	  	 
		if (!$this->error) {
	  		return true;
		} else { 
	  		return false;
		}
  	}
}
?>