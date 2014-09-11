<?php
class ModelModulepersonalbar extends Model {
	
	public function createTable() {
		$this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "commercesciences (id INT(11) AUTO_INCREMENT, email VARCHAR(255), user_id VARCHAR(20), security_token VARCHAR(1024), tag VARCHAR(2048), cs_url VARCHAR(200), PRIMARY KEY (id))");
		$this->db->query("INSERT INTO " . DB_PREFIX . "commercesciences (cs_url) VALUES('http://commercesciences.com/opencart/')");
		$this->getBar();
	}	

	public function updateBar($data)  {
		$this->getBar();
		return $this->db->query("UPDATE " . DB_PREFIX . "commercesciences SET `tag`='".mysql_escape_string($data->tag)."', `security_token`='".$data->securityToken."', `user_id`='".$data->userID."' WHERE `id`='".$this->id."'");
	}

	public function updateEmail($email) {
		$this->getBar();
		return $this->db->query("UPDATE " . DB_PREFIX . "commercesciences SET `email`='".$email."' WHERE `id`='".$this->id."'");
	}

	public function getBar() {
		$result = $this->db->query("select * from " . DB_PREFIX . "commercesciences");
		if ($result->num_rows>0) {
			$this->id = $result->row["id"];
		}
		return $result;
	}

	public function initializeBar() {

	}


}
?>