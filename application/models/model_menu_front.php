<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu_front extends CI_Model {

	public function tampil_menu($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get();	
	}

	public function tampil_member($table){
		$this->db->select('*');	
		$this->db->from($table);
		return $this->db->get();
	}

	public function tambah_menu($table, $data){
		$this->db->insert($table, $data);	
	}

	public function delete($table, $id){
		$this->db->from($table);
		$this->db->where_in('idMenuFront', $id);
		$this->db->delete();	
	}

	public function hapus($table, $id){
		$this->db->from($table);
		$this->db->where($id);
		$this->db->delete();	
	}

	public function edit($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();	
	}

	public function edit_menu($table, $data, $id){
		$this->db->set($data);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();	
	}

	public function edit_status_menu($table, $status, $id){
		$this->db->set($status);
		$this->db->from($table);
		$this->db->where('idMenuFront', $id);
		$this->db->update();	
	}

}

/* End of file model_menu_front.php */
/* Location: ./application/models/model_menu_front.php */