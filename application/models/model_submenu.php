<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_submenu extends CI_Model {

	public function tampil_submenu($table){
		$this->db->select('
			tsb.*,
			tmb.namaMenu,
		');
		$this->db->from('t_submenu_backend tsb');
		$this->db->join('t_menu_backend tmb', 'tsb.menuId = tmb.idMenu', 'left');
		return $this->db->get();	
	}

	public function edit_status_submenu($data, $id){
		$this->db->set($data);
		$this->db->from('t_submenu_backend');
		$this->db->where('idSubMenu', $id);
		$this->db->update();	
	}

	public function tambah_submenu($table, $data){
		$this->db->insert($table, $data);	
	}

	public function edit_submenu_aksi($table, $data, $id){
		$this->db->set($data);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();	
	}

	public function hapus_submenu_all($table, $id){
		$this->db->where_in('idSubMenu', $id);
		$this->db->delete($table);	
	}

	public function hapus_menu($table, $id){
		$this->db->where($id);
		$this->db->from($table);
		$this->db->delete();	
	}

}

/* End of file model_submenu.php */
/* Location: ./application/models/model_submenu.php */