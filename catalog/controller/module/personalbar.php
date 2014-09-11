<?php

class ControllerModulepersonalbar extends Controller {
	public function index() {

		 $this->query = $this->db->query("select * from " . DB_PREFIX . "commercesciences");
		 if ($this->query->num_rows>0) {
		 	$tag = $this->query->row['tag'];
		 	if ($tag!="") {
		 		$this->data['cs_tag'] = $tag;
		 	}
		 }

		$this->template = 'default/template/module/personalbar.tpl';

		//Render the page with the chosen template
		$this->response->setOutput($this->render());
	}
}
?>