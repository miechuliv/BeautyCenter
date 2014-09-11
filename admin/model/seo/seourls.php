<?php
class ModelSeoSeourls extends Model {
	public function addUrl($data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "url_alias` SET query = '" . $this->db->escape($data['query']) . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
	}
	
	public function editUrl($url_alias_id, $data) {
		$this->db->query("UPDATE `" . DB_PREFIX . "url_alias` SET query = '" . $this->db->escape($data['query']) . "', keyword = '" . $this->db->escape($data['keyword']) . "' WHERE url_alias_id = '" . (int)$url_alias_id . "'");

	}
			
	public function deleteUrl($url_alias_id) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "url_alias` WHERE url_alias_id = '" . (int)$url_alias_id . "'");
	}
	
	public function getUrl($url_alias_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE url_alias_id = '" . (int)$url_alias_id . "'");
	
		return $query->row;
	}
	
	public function getUrlByQuery($query) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE query = '" . $this->db->escape($query) . "'");
	
		return $query->row;
	}
		
		
	public function getUrls($data = array()) {
		$sql = "SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE query not like 'category_id=%' AND query not like 'manufacturer_id=%' AND query not like 'product_id=%' AND query not like 'information_id=%' ";
						
		$sort_data = array(
			'query',
			'keyword'
		);	
			
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY query";	
		}
			
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}
		
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}			
			
			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}	
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
			
		$query = $this->db->query($sql);
	
		return $query->rows;
	}

	public function getTotalUrls() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "url_alias` WHERE query not like 'category_id=%' AND query not like 'manufacturer_id=%' AND query not like 'product_id=%' AND query not like 'information_id=%' ");
		
		return $query->row['total'];
	}

	public function addCommonsUrls() {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "url_alias` WHERE query in 
		    ('checkout/cart', 'checkout/checkout', 'common/home', 'account/wishlist', 'account/account', 'account/download', 'account/register', 
			'account/login', 'account/forgotten', 'account/edit', 'account/address', 'account/address/update', 'product/special', 
			'account/return/insert', 'information/contact', 'account/logout', 'account/newsletter', 'product/manufacturer','account/voucher')");
			
		$this->db->query("INSERT INTO `" . DB_PREFIX . "url_alias` (`query`, `keyword`) VALUES
		('checkout/cart', 'cart'),
		('checkout/checkout', 'checkout'),
		('common/home', 'home'),
		('account/wishlist', 'wishlist'),
		('account/account', 'account'),
		('account/download', 'my-downloads'),
		('account/register', 'register'),
		('account/login', 'logon'),
		('account/forgotten', 'forgot-password'),
		('account/edit', 'edit-your-account'),
		('account/address', 'addres-book'),
		('account/address/update', 'modify-addres'),
		('account/return/insert', 'product-returns'),
		('information/contact', 'contact-us'),
		('account/logout', 'logout'),
		('account/newsletter', 'newsletter-subscription'),
		('product/manufacturer', 'find-your-brand'),
		('account/voucher', 'purchase-a-gift'),
		('product/special', 'specials')");
	}

	
}   
?>