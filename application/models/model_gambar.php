<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gambar extends CI_Model {

	public function upload_gambar($table, $data){
		return $this->db->insert($table, $data);	
	}	

	public function tampil_gambar($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();	
	}

	public function hapus_gambar($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function delete($id){
		$this->db->where_in('idGambar', $id);
    	$this->db->delete('t_gambar');	
	}

	public function hapus($table, $id){
		$this->db->where($id);
    	$this->db->delete('t_gambar');	
	}


}

/* End of file model_gambar.php */
/* Location: ./application/models/model_gambar.php */