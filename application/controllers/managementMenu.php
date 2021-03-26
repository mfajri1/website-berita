<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementMenu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		secLogin();
	}

	public function view($base, $data, $boolean){
		$data['tMenu'] = $this->model_menu->tampil_menu($this->session->userdata('levelUser'))->result_array();
		$data['viewMenu'] = $this->model_menu->tampil_data_menu()->result_array();
		$data['vMember'] = $this->model_menu->tampil_member('t_member')->result_array();
		$data['viewSubmenu'] = $this->model_submenu->tampil_submenu('t_submenu_backend')->result_array();

		$load = $this->load;
		$load->view('admin/template/header', $data, FALSE);
		$load->view('admin/template/sidebar', $data, FALSE);
		$load->view($base, $data, $boolean);
		$load->view('admin/template/footer', $data, FALSE);
	}

	public function tampil_menu(){
		$data['title'] = 'Management Menu';

		$this->view('admin/menu/tampil_menu', $data, FALSE);	
	}	

	public function editStatusMenu(){
		$idMenu = $this->input->post('idMenu', true);
		$statusMenu = $this->input->post('statusMenu', true);

		if ($statusMenu == 'nonaktif') {
			$dataMenu = [
				'statusMenu' => 'aktif'
			];
			$dataSubmenu = [
				'statusSubmenu' => 'aktif'
			];
		}else{
			$dataMenu = [
				'statusMenu' => 'nonaktif'
			];
			$dataSubmenu = [
				'statusSubmenu' => 'nonaktif'
			];
		}


		$menu = $this->model_menu->edit_status_menu('t_menu_backend', $dataMenu, $idMenu);	
		$sub = $this->model_menu->edit_status_submenu('t_submenu_backend', $dataSubmenu, $idMenu);

		$hasil = [
			'menu' => $menu,
			'sub' => $sub
		];

		echo json_encode($hasil);
	}

	public function tambahMenu(){
		$data['title'] = 'Tambah Data Menu';

		$this->view('admin/menu/tambah_menu', $data, FALSE); 	
	}

	public function validation(){
		$validation = $this->form_validation; 
		$validation->set_rules('namaMenu', 'NamaMenu', 'trim|required');	
		$validation->set_rules('targetDropdown', 'Target Dropdown', 'trim|required');
		$validation->set_rules('nameHeadSubMenu', 'Nama Head Submenu', 'trim|required');	
		$validation->set_rules('iconMenu', 'Icon Menu', 'trim|required');	
		$validation->set_rules('statusMenu', 'Status Menu', 'trim|required');	
		$validation->set_rules('noUrut', 'No Urut', 'trim|required|is_unique[t_menu_backend.noUrut]');	
		$validation->set_rules('memberLevel', 'Level Member', 'trim|required');	
	}

	public function tambahMenuAksi(){
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			$this->tambahMenu();
		} else {
			$data = [
				'namaMenu' => htmlspecialchars($this->input->post('namaMenu', true)),
				'targetDropdown' => htmlspecialchars($this->input->post('targetDropdown', true)),
				'nameHeadSubMenu' => htmlspecialchars($this->input->post('nameHeadSubMenu', true)),
				'iconMenu' => htmlspecialchars($this->input->post('iconMenu', true)),
				'statusMenu' => htmlspecialchars($this->input->post('statusMenu', true)),
				'noUrut' => htmlspecialchars($this->input->post('noUrut', true)),
				'memberLevel' => htmlspecialchars($this->input->post('memberLevel', true)),
			];

			$this->model_menu->tambah_data_menu('t_menu_backend', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('managementMenu/tampil_menu','refresh');
		}
	}

	public function editMenu($id){
		$idMenu = ['idMenu' => $id];
		$data['editMenu'] = $this->model_menu->edit_menu('t_menu_backend', $idMenu)->row_array();

		$this->view('admin/menu/edit_menu', $data, FALSE);	
	}


	public function validationEdit(){
		$validation = $this->form_validation; 
		$validation->set_rules('namaMenu', 'NamaMenu', 'trim|required');	
		$validation->set_rules('targetDropdown', 'Target Dropdown', 'trim|required');
		$validation->set_rules('nameHeadSubMenu', 'Nama Head Submenu', 'trim|required');	
		$validation->set_rules('iconMenu', 'Icon Menu', 'trim|required');	
		$validation->set_rules('statusMenu', 'Status Menu', 'trim|required');	
		$validation->set_rules('noUrut', 'No Urut', 'trim|required');	
		$validation->set_rules('memberLevel', 'Level Member', 'trim|required');	
	}

	public function editMenuAksi($id){
		$idMenu = ['idMenu' => $id];

		$this->validationEdit();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Gagal Mengedit Data")</script>';
			$this->editMenu($id);
		} else {
			$data = [
				'namaMenu' => htmlspecialchars($this->input->post('namaMenu', true)),
				'targetDropdown' => htmlspecialchars($this->input->post('targetDropdown', true)),
				'nameHeadSubMenu' => htmlspecialchars($this->input->post('nameHeadSubMenu', true)),
				'iconMenu' => htmlspecialchars($this->input->post('iconMenu', true)),
				'statusMenu' => htmlspecialchars($this->input->post('statusMenu', true)),
				'noUrut' => htmlspecialchars($this->input->post('noUrut', true)),
				'memberLevel' => htmlspecialchars($this->input->post('memberLevel', true)),
			];

			$this->model_menu->edit_menu_aksi('t_menu_backend', $data, $idMenu);
			echo '<script>alert("berhasil Merubah Data");</script>';
			redirect('managementMenu/tampil_menu','refresh');
		}
	}

	public function hapusMenu($id){
		$idMenu = ['idMenu' => $id];

		$this->model_menu->hapus_menu('t_menu_backend', $idMenu);
		echo '<script>alert("berhasil Menhapus Data");</script>';
		redirect('managementMenu/tampil_menu','refresh');	
	}

	public function hapusMenuAll(){
		$idMenu = $this->input->post('idMenu', true);	
		$this->model_menu->delete_menu_all($idMenu);

		redirect('managementMenu/tampil_menu', 'reffresh');	
	}


}

/* End of file managementMenu.php */
/* Location: ./application/controllers/managementMenu.php */