<?php
class ModelCatalogDownload extends Model {
	public function addDownload($data) {
      	$this->db->query("INSERT INTO " . DB_PREFIX . "download SET filename = '" . $this->db->escape($data['filename']) . "', mask = '" . $this->db->escape($data['mask']) . "', remaining = '" . (int)$data['remaining'] . "', date_end = '" . $this->db->escape($data['date_end']) . "' ,date_added = NOW()");

      	$download_id = $this->db->getLastId(); 

      	foreach ($data['download_description'] as $language_id => $value) {
        	$this->db->query("INSERT INTO " . DB_PREFIX . "download_description SET download_id = '" . (int)$download_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "' ");
      	}	
	}
	
	public function editDownload($download_id, $data) {
		if (!empty($data['update'])) {
			$download_info = $this->getDownload($download_id);
        	
			if ($download_info) {
      			$this->db->query("UPDATE " . DB_PREFIX . "order_download SET `filename` = '" . $this->db->escape($data['filename']) . "', mask = '" . $this->db->escape($data['mask']) . "', remaining = '" . (int)$data['remaining'] . "'  , date_end = '" . $this->db->escape($data['date_end']) . "' WHERE `filename` = '" . $this->db->escape($download_info['filename']) . "'");
			}
		}		
		
        $this->db->query("UPDATE " . DB_PREFIX . "download SET filename = '" . $this->db->escape($data['filename']) . "', mask = '" . $this->db->escape($data['mask']) . "', remaining = '" . (int)$data['remaining'] . "' , date_end = '" . $this->db->escape($data['date_end']) . "' WHERE download_id = '" . (int)$download_id . "'");

      	$this->db->query("DELETE FROM " . DB_PREFIX . "download_description WHERE download_id = '" . (int)$download_id . "'");

      	foreach ($data['download_description'] as $language_id => $value) {
        	$this->db->query("INSERT INTO " . DB_PREFIX . "download_description SET download_id = '" . (int)$download_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "' , description = '" . $this->db->escape($value['description']) . "' ");
      	}
	}
	
	public function deleteDownload($download_id) {
      	$this->db->query("DELETE FROM " . DB_PREFIX . "download WHERE download_id = '" . (int)$download_id . "'");
	  	$this->db->query("DELETE FROM " . DB_PREFIX . "download_description WHERE download_id = '" . (int)$download_id . "'");	
	}	

	public function getDownload($download_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "download d LEFT JOIN " . DB_PREFIX . "download_description dd ON (d.download_id = dd.download_id) WHERE d.download_id = '" . (int)$download_id . "' AND dd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		return $query->row;
	}

	public function getDownloads($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "download d LEFT JOIN " . DB_PREFIX . "download_description dd ON (d.download_id = dd.download_id) WHERE dd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_name'])) {
			$sql .= " AND dd.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}
		
		$sort_data = array(
			'dd.name',
			'd.remaining'
		);
	
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY dd.name";	
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
	
	public function getDownloadDescriptions($download_id) {
		$download_description_data = array();
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "download_description WHERE download_id = '" . (int)$download_id . "'");
		
		foreach ($query->rows as $result) {
			$download_description_data[$result['language_id']] = array('name' => $result['name'] , 'description' => $result['description']);
		}
		
		return $download_description_data;
	}
	
	public function getTotalDownloads() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "download");
		
		return $query->row['total'];
	}


    /*
     * Blitz code
     */
    public function getDownloadFrontend($order_download_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_download od LEFT JOIN `" . DB_PREFIX . "order` o ON (od.order_id = o.order_id) WHERE  o.order_status_id > '0' AND o.order_status_id = '" . (int)$this->config->get('config_complete_status_id') . "' AND od.order_download_id = '" . (int)$order_download_id . "' AND od.remaining > 0");

        return $query->row;
    }


    public function prepareDownloadImage($filename,$newfilename,$firstname,$lastname,$title,$description,$code)
    {
        $this->load->model('tool/image');

        $this->model_tool_image->addTextToImage($firstname,'2','2','10','FFFFFF',$filename,$newfilename);
    }
}
?>