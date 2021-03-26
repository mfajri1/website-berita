<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_komentar extends CI_Model {

	public function tampil_koment($table){
		return $this->db->get($table);	
	}

	public function hapus_komentar($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function detail_koment($id){
		$this->db->select('
			t_komentar.*,
			t_berita.judulBerita,
			t_login.*
		');
		$this->db->from('t_komentar');
		$this->db->join('t_login', 't_login.idUser = t_komentar.idUser', 'left');
		$this->db->join('t_berita', 't_komentar.idBerita = t_berita.idBerita', 'left');
		$this->db->where('t_komentar.idKomentar', $id);
		$this->db->group_by('t_komentar.idUser');
		return $this->db->get();
	}

	public function detail_koment_front($id){
		$this->db->select('
			t_komentar.*,
			t_berita.*,
			t_login.*
		');
		$this->db->from('t_komentar');
		$this->db->join('t_login', 't_login.idUser = t_komentar.idUser', 'left');
		$this->db->join('t_berita', 't_komentar.idBerita = t_berita.idBerita', 'left');
		$this->db->where('t_berita.idBerita', $id);
		$this->db->group_by('t_komentar.idKomentar');
		return $this->db->get();
	}

	public function delete_komentar($id){
		$this->db->where_in('idKomentar', $id);
		$this->db->delete('t_komentar');	
	}

	public function tambah_komentar($table, $data){
		$this->db->insert($table, $data);	
	}
	

}

/* End of file model_komentar.php */
/* Location: ./application/models/model_komentar.php */