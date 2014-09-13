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

        $this->model_tool_image->resizeNoCache($filename,800,1165);

        $this->model_tool_image->addTextToImage($firstname,'20','20',5,'000000',$filename,$newfilename);
        $this->model_tool_image->addTextToImage($lastname,'20','120',5,'000000',$newfilename,$newfilename);
        $this->model_tool_image->addTextToImage($title,'20','220',5,'000000',$newfilename,$newfilename);
        $this->model_tool_image->addTextToImage($description,'20','320',5,'000000',$newfilename,$newfilename);
        $this->model_tool_image->addTextToImage($code,'20','420',5,'000000',$newfilename,$newfilename);
    }


    public function prepareDownloadImagePdf($filename,$newfilename,$firstname,$lastname,$title,$description,$code,$date_end)
    {
        $this->load->model('tool/image');
        require_once(DIR_SYSTEM.'library/tcpdf/tcpdf.php');

        $pdf = new TCPDF();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);

// set image 1
        $pdf->AddPage();
        $pdf->Image(DIR_IMAGE.$filename, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $pdf->setPageMark();

        /*if(stripos('.pdf',$newfilename)===false)
        {
            $t = explode('.',$newfilename);
            array_pop($t);
            $newfilename = implode('.',$t).'.pdf';
        }*/

        $pdf->SetFont('times', '', 13);
        $pdf->SetTextColor(50, 50, 50);

        for($i=0;$i<=16;$i++)
        {
            $pdf->Ln(10);
        }

        $pdf->setCellPaddings(90);
        $pdf->Ln(10);




        $pdf->Write(0,$firstname.' '.$lastname);


        $pdf->Ln(10);
        $pdf->Ln(10);


        $pdf->Write(0,$title);



        $pdf->Ln(10);

        $pdf->SetFont('times', '', 11);

        $pdf->Write(0,$description);

        $pdf->setCellPaddings(70);

        $pdf->Ln(10);
        $pdf->Ln(10);
        $pdf->Ln(10);
        $pdf->Ln(10);
        $pdf->Ln(10);

        $pdf->SetFont('times', '', 7);
        $pdf->Write(0,'Beauty Center Billstedt');
        $pdf->Ln(4);

        $pdf->SetFont('times', 'B', 9);
        $pdf->Write(0,'#'.$code);

        $pdf->Ln(4);

        $pdf->SetFont('times', '', 9);
        $pdf->Write(0,'gültig bis: '.$date_end);


        $pdf->Output(DIR_IMAGE.$newfilename,'F');
    }
}
?>