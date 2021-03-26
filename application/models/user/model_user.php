<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function tambah_saran($table, $data){
		$this->db->insert($table, $data);	
	}	


}

/* End of file model_user.php */
/* Location: ./application/models/user/model_user.php */