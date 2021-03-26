<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	public function tampil_kategori($table){
		return $this->db->get($table);
	}

	public function tambah_kategori_banyak($table, $data){
		return $this->db->insert_batch($table, $data);
	}

	public function edit_kategori($table, $id){
		$this->db->where($id);
		return $this->db->get($table);	
	}

	public function edit_kategori_aksi($table, $data, $id){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function hapus_kategori($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function delete($id){
		$this->db->where_in('idKategoriBerita', $id);
    	$this->db->delete('t_kategori_berita');
	}



}

/* End of file model_kategori.php */
/* Location: ./application/models/model_kategori.php */