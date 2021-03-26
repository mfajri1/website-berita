<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementSubmenu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		secLogin();
	}

	public function view($base, $data, $boolean){
		$data['tMenu'] = $this->model_menu->tampil_menu($this->session->userdata('levelUser'))->result_array();
		$data['vMember'] = $this->model_menu->tampil_member('t_member')->result_array();
		$data['viewMenu'] = $this->model_menu->tampil_data_menu()->result_array();
		$data['viewSubmenu'] = $this->model_submenu->tampil_submenu('t_submenu_backend')->result_array();

		$load = $this->load;
		$load->view('admin/template/header', $data, FALSE);
		$load->view('admin/template/sidebar', $data, FALSE);
		$load->view($base, $data, $boolean);
		$load->view('admin/template/footer', $data, FALSE);
	}

	public function tampilSubmenu(){
		$data['title'] = "Tampil Data Submenu";
		

		$this->view('admin/submenu/tampil_submenu', $data, FALSE);	
	}

	public function editStatusSubmenu(){
		$idSubmenu = $this->input->post('idSubMenu', true);
		$statusSubmenu = $this->input->post('statusSubmenu', true);
		if($statusSubmenu == 'nonaktif'){
			$data = [
				'statusSubmenu' => 'aktif'
			];
		}else{
			$data = [
				'statusSubmenu' => 'nonaktif'
			];
		}

		$hasil = $this->model_submenu->edit_status_submenu($data, $idSubmenu);

		echo json_encode($hasil);	
	}

	public function validation(){
		$validation = $this->form_validation;
		$validation->set_rules('urlSubMenu', 'Url Submenu', 'trim|required');	
		$validation->set_rules('judulSubMenu', 'Judul Submenu', 'trim|required');	
		$validation->set_rules('menuId', 'Nama Menu', 'trim|required');	
		$validation->set_rules('statusSubmenu', 'status Submenu', 'trim|required');	
	}


	public function tambahSubmenuAksi(){
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Gagal Menambahkan Data")</script>';
			$this->tampilSubmenu();
		} else {
			$input = $this->input;

			$data = [
				'urlSubMenu' => htmlspecialchars($input->post('urlSubMenu', true)),
				'judulSubMenu' => htmlspecialchars($input->post('judulSubMenu', true)),
				'menuId' => htmlspecialchars($input->post('menuId', true)),
				'statusSubmenu' => htmlspecialchars($input->post('statusSubmenu', true)),
			];

			$this->model_submenu->tambah_submenu('t_submenu_backend', $data);
			echo '<script>alert("Berhasil Tambah Data")</script>';
			redirect('managementSubmenu/tampilSubmenu','refresh');
		}			
	}


	public function editSubmenuAksi($id){
		$idSubMenu = ['idSubMenu' => $id];
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("gagal edit submenu")</script>';
			redirect('managementSubmenu/tampilSubmenu','refresh');
		} else {
			$data = [
				'urlSubMenu' => $this->input->post('urlSubMenu', true),
				'judulSubMenu' => $this->input->post('judulSubMenu', true),
				'menuId' => $this->input->post('menuId', true),
				'statusSubmenu' => $this->input->post('statusSubmenu', true),
			];

			$this->model_submenu->edit_submenu_aksi('t_submenu_backend', $data, $idSubMenu);
			echo '<script>alert("Berhasil edit submenu")</script>';
			redirect('managementSubmenu/tampilSubmenu','refresh');
		}	
	}


	public function hapusSubmenuAll(){
		$idSubmenu = $this->input->post('idSubMenu', true);
		$this->model_submenu->hapus_submenu_all('t_submenu_backend', $idSubmenu);
		redirect('managementSubmenu/tampilSubmenu', 'reffresh');
	}

	public function hapusSubmenu($id){
		$idSubmenu = ['idSubMenu' => $id];

		$this->model_submenu->hapus_menu('t_submenu_backend', $idSubmenu);
		echo '<script>alert("Berhasil Hapus Data")</script>';
		redirect('managementSubmenu/tampilSubmenu','refresh');
	}



}

/* End of file managementSubmenu.php */
/* Location: ./application/controllers/managementSubmenu.php */