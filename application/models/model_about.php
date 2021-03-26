<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_about extends CI_Model {

	public function tampil_about($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('idAbout', 1);
		return $this->db->get();	
	}

	public function edit_about($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();	
	}

	public function edit_about_aksi($table, $data, $id){
		$this->db->set($data);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();
	}

}

/* End of file model_about.php */
/* Location: ./application/models/model_about.php */