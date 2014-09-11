<?php 
class ModelPaymentnovalnetpaypal extends Model {
  	public function getMethod($address,$total) {
	  $this->load->language('payment/novalnet_paypal');
	  if ($this->config->get('novalnet_paypal_status')) {
		 $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('novalnet_paypal_payment_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		 if ($this->config->get('novalnet_paypal_total') > 0 && $this->config->get('novalnet_paypal_total') > $total) {
			$status = FALSE;
			}elseif (!$this->config->get('novalnet_paypal_payment_zone_id')) {
          $status = TRUE;
      } elseif ($query->num_rows) {
         $status = TRUE;
      		} else {
        		$status = FALSE;
      		}
		} else {
			$status = FALSE;
		}
	$method_data = array();
	if ($status) {  
      $method_data = array( 
      'code'         => 'novalnet_paypal',
      'title'      => $this->language->get('text_img'),
	  'sort_order' => $this->config->get('novalnet_paypal_sort_order')
     );
   }
    return $method_data;
  	}
  }
