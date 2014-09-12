<?php
class ModelAccountDownload extends Model {
	public function getDownload($order_download_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_download od LEFT JOIN `" . DB_PREFIX . "order` o ON (od.order_id = o.order_id) WHERE o.customer_id = '" . (int)$this->customer->getId(). "' AND o.order_status_id > '0' AND o.order_status_id = '" . (int)$this->config->get('config_complete_status_id') . "' AND od.order_download_id = '" . (int)$order_download_id . "' AND od.remaining > 0");
		 
		return $query->row;
	}

    public function getDownloadBefore($order_download_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_download od LEFT JOIN `" . DB_PREFIX . "order` o ON (od.order_id = o.order_id) WHERE o.customer_id = '" . (int)$this->customer->getId(). "'   AND od.order_download_id = '" . (int)$order_download_id . "' AND od.remaining > 0");

        return $query->row;
    }
	
	public function getDownloads($start = 0, $limit = 20) {
		if ($start < 0) {
			$start = 0;
		}
		
		if ($limit < 1) {
			$limit = 20;
		}	
		
		$query = $this->db->query("SELECT o.order_id, o.date_added, od.order_download_id, od.name, od.description, od.date_end, od.filename, od.remaining FROM " . DB_PREFIX . "order_download od LEFT JOIN `" . DB_PREFIX . "order` o ON (od.order_id = o.order_id) WHERE o.customer_id = '" . (int)$this->customer->getId() . "' AND o.order_status_id > '0' AND o.order_status_id = '" . (int)$this->config->get('config_complete_status_id') . "' AND od.remaining > 0 ORDER BY o.date_added DESC LIMIT " . (int)$start . "," . (int)$limit);
	
		return $query->rows;
	}
	
	public function updateRemaining($order_download_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "order_download SET remaining = (remaining - 1) WHERE order_download_id = '" . (int)$order_download_id . "'");
	}
	
	public function getTotalDownloads() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "order_download od LEFT JOIN `" . DB_PREFIX . "order` o ON (od.order_id = o.order_id) WHERE o.customer_id = '" . (int)$this->customer->getId() . "' AND o.order_status_id > '0' AND o.order_status_id = '" . (int)$this->config->get('config_complete_status_id') . "' AND od.remaining > 0");
		
		return $query->row['total'];
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


    public function prepareDownloadImagePdf($filename,$newfilename,$firstname,$lastname,$title,$description,$code)
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

        $pdf->Write(0,$description);

        $pdf->setCellPaddings(70);

        $pdf->Ln(10);
        $pdf->Ln(10);
        $pdf->Ln(10);
        $pdf->Ln(10);
        $pdf->Ln(10);

        $pdf->Write(0,$code);


        $pdf->Output(DIR_IMAGE.$newfilename,'F');
    }
}
?>
