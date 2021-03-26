<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_saran extends CI_Model {

	public function tampil_saran($table){
		$this->db->select('
			t_saran.*, t_login.namaUser
		');
		$this->db->from($table);
		$this->db->join('t_login', 't_login.idUser = t_saran.idUser', 'left');
		return $this->db->get();	
	}	

}

/* End of file model_saran.php */
/* Location: ./application/models/model_saran.php */