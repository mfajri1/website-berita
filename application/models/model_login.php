<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function check_login($username, $password){
		$this->db->select('*');
		$this->db->from('t_login');
		$this->db->where([
			'username' => $username,
			'password' => $password
		]);	
		return $this->db->get();
	}

	public function cek_username($table, $username){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('username', $username);
		return $this->db->get();	
	}

	public function update_pass_salah($table, $username, $passSalah){
		$pass_salah = ['passSalah' => $passSalah];
		$this->db->where('username', $username);
		$this->db->update($table, $pass_salah);	
	}

	public function update_blokir($table, $username){
		$data = [
			'blokirAkun' => 'ya'
		];	
		$this->db->where('username', $username);
		$this->db->update($table, $data);
	}

	public function update_lastLogin($table, $data, $id){
		$this->db->where('username', $id);
		$this->db->update($table, $data);
	}




	public function check_email($table, $email){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('emailUser', $email);
		return $this->db->get();	
	}

	public function change_pass($table, $data, $email){
		$this->db->where('emailUser', $email);
		$this->db->update($table, $data);
	}

}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */