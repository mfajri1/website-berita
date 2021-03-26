<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengguna extends CI_Model {

	public function tampil_pengguna($table, $username){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('username', $username);
		return $this->db->get();	
	}

	public function update_pengguna($table, $id, $data){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function edit_data_pengguna($table, $data, $id){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function upload_foto_user($table, $id, $data){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}


}

/* End of file model_pengguna.php */
/* Location: ./application/models/model_pengguna.php */

