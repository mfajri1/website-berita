<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {

	public function tampil_menu($level){
		$this->db->select('
			tm.*,
			ta.*	
		');
		$this->db->from('t_menu_backend tm');
		$this->db->join('t_access ta', 'tm.memberLevel = ta.menuNama', 'left');
		$this->db->where(
			[
				'ta.roleAccess' => $level,
				'tm.statusMenu' => 'aktif'
			]
		);
		$this->db->order_by('ta.menuNama', 'desc');
		return $this->db->get();
	}

	public function tampil_data_menu(){
		$this->db->select('
			tmb.*,
			COUNT(tsb.idSubMenu) AS totalMenu
		');
		$this->db->from('t_menu_backend tmb');
		$this->db->join('t_submenu_backend tsb', 'tmb.idMenu = tsb.menuId', 'left');
		$this->db->group_by('tmb.idMenu');
		return $this->db->get();	
	}

	public function edit_status_menu($table, $dataMenu, $id){
		$this->db->set($dataMenu);
		$this->db->from($table);
		$this->db->where('idMenu', $id);
		$this->db->update();
	}

	public function edit_status_submenu($table, $dataSubmenu, $id){
		$this->db->set($dataSubmenu);
		$this->db->from('t_submenu_backend');
		$this->db->where('menuId', $id);
		$this->db->update();

	}

	public function tampil_member($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get();	
	}

	public function tambah_data_menu($table, $data){
		$this->db->insert($table, $data);	
	}

	public function edit_menu($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();
	}

	public function edit_menu_aksi($table, $data, $id){
		$this->db->set($data);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();	
	}

	public function hapus_menu($table, $id){
		$this->db->from($table);
		$this->db->where($id);
		$this->db->delete();	
	}

	public function delete_menu_all($id){
		$this->db->where_in('idMenu', $id);
    	$this->db->delete('t_menu_backend');
	}




}

/* End of file model_menu.php */
/* Location: ./application/models/model_menu.php */