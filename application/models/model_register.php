<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_register extends CI_Model {

	public function tambah_user($table, $data){
		$this->db->insert($table, $data);	
	}

	public function tampil_user($table){
		return $this->db->get($table);	
	}

	public function activasi($table, $data, $email){
		$this->db->where($email);
		$this->db->update($table, $data);	
	}


}

/* End of file model_register.php */
/* Location: ./application/models/model_register.php */