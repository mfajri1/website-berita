<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_konfig extends CI_Model {

	public function tampil_konfig($table){
		$this->db->select('
			t_login.namaUser,
			t_konfigurasi_user.*

		');
		$this->db->from('t_konfigurasi_user');
		$this->db->join('t_login', 't_login.idUser = t_konfigurasi_user.idUser', 'left');
		$this->db->where('id_konfigurasi', 1);
		return $this->db->get();	
	}

	public function edit_konfig_aksi($table, $data){
		$this->db->set($data);
		$this->db->from($table);
		$this->db->where('id_konfigurasi', 1);
		$this->db->update();	
	}

}

/* End of file model_konfig.php */
/* Location: ./application/models/model_konfig.php */