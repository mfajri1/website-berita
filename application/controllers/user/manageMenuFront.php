<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageMenuFront extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		secLogin();
	}

	public function view($base, $data, $boolean){
		$data['tMenu'] = $this->model_menu->tampil_menu($this->session->userdata('levelUser'))->result_array();
		$data['viewMenu'] = $this->model_menu->tampil_data_menu()->result_array();
		$data['viewSubmenu'] = $this->model_submenu->tampil_submenu('t_submenu_backend')->result_array();

		$load = $this->load;
		$load->view('admin/template/header', $data, $boolean);
		$load->view('admin/template/sidebar', $data, $boolean);
		$load->view($base, $data, $boolean);
		$load->view('admin/template/footer', $data, $boolean);
	}

	public function index()
	{
		$data['title'] = 'Halaman Management Menu FrontEnd';
		$data['menuFront'] = $this->model_menu_front->tampil_menu('t_menu_front')->result_array();
		$this->view('user/menuFront/manage_menu_front', $data, FALSE);
	}

	public function tambahMenu(){
		$data['title'] = 'Tambah Menu Frontend';
		$data['viewMember'] = $this->model_menu_front->tampil_member('t_member')->result_array();
		$this->view('user/menuFront/tambah_menu_front', $data, FALSE);	
	}

	public function validation(){
		$this->form_validation->set_rules('urlMenuFront', 'Url Menu', 'trim|required');	
		$this->form_validation->set_rules('namaMenuFront', 'Nama Menu', 'trim|required');	
		$this->form_validation->set_rules('statusMenuFront', 'Status Menu', 'trim|required');	
		$this->form_validation->set_rules('noUrutFront', 'No Urut', 'trim|required');	
		$this->form_validation->set_rules('memberLevel', 'Level Member', 'trim|required');	
	}

	public function tambahMenuFrontAksi(){
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Gagal Menambahkan Data!!!")</script>';
			redirect('user/manageMenuFront/tambahMenu','refresh');
		} else {
			$input = $this->input;
			$data = [
				'urlMenuFront' => htmlspecialchars($input->post('urlMenuFront', true)),
				'namaMenuFront' => htmlspecialchars($input->post('namaMenuFront', true)),
				'statusMenuFront' => htmlspecialchars($input->post('statusMenuFront', true)),
				'noUrutFront' => htmlspecialchars($input->post('noUrutFront', true)),
				'memberLevel' => htmlspecialchars($input->post('memberLevel', true))
			];

			$this->model_menu_front->tambah_menu('t_menu_front', $data);
			echo '<script>alert("Berhasil Menambahkan Data!!!")</script>';
			redirect('user/manageMenuFront','refresh');
		}
	}

	public function hapusMenuAll(){
		$idMenuFront = $_POST['idMenuFront'];
		$this->model_menu_front->delete('t_menu_front', $idMenuFront); // Panggil fungsi delete dari model
        
        redirect('user/manageMenuFront','refresh');		
	}

	public function hapusMenuFront($id){
		$idMenuFront = ['idMenuFront' => $id];
		$this->model_menu_front->hapus('t_menu_front', $idMenuFront);

		redirect('user/manageMenuFront','refresh');	
	}

	public function editMenuFront($id){
		$idMenuFront = ['idMenuFront' => $id];
		$data['title'] = 'Edit Data Menu Frontend';
		$data['eMenuFront'] = $this->model_menu_front->edit('t_menu_front', $idMenuFront)->row_array();
		$data['viewMember'] = $this->model_menu_front->tampil_member('t_member')->result_array();

		$this->view('user/menuFront/edit_menu_front', $data, FALSE);


	}

	public function EditMenuFrontAksi($id){
		$idMenuFront = ['idMenuFront' => $id];
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Gagal Menambahkan Data!!!")</script>';
			redirect('user/manageMenuFront/editMenuFront/' . $id,'refresh');
		} else {
			$input = $this->input;
			$data = [
				'urlMenuFront' => htmlspecialchars($input->post('urlMenuFront', true)),
				'namaMenuFront' => htmlspecialchars($input->post('namaMenuFront', true)),
				'statusMenuFront' => htmlspecialchars($input->post('statusMenuFront', true)),
				'noUrutFront' => htmlspecialchars($input->post('noUrutFront', true)),
				'memberLevel' => htmlspecialchars($input->post('memberLevel', true))
			];

			$this->model_menu_front->edit_menu('t_menu_front', $data, $idMenuFront);
			echo '<script>alert("Berhasil Mengedit Data!!!")</script>';
			redirect('user/manageMenuFront','refresh');
		}	
	}

	public function editStatusMenuFront(){
		$idMenuFront = $this->input->post('idMenuFront', true);
		$statusMenuFront = $this->input->post('statusMenuFront', true);

		if ($statusMenuFront == 'nonaktif') {
			$dataMenu = [
				'statusMenuFront' => 'aktif'
			];
		}else{
			$dataMenu = [
				'statusMenuFront' => 'nonaktif'
			];
		}


		$menu = $this->model_menu_front->edit_status_menu('t_menu_front', $dataMenu, $idMenuFront);

		$hasil = [
			'menu' => $statusMenuFront
		];

		echo json_encode($hasil);	
	}

}

/* End of file manageMenuFront.php */
/* Location: ./application/controllers/user/manageMenuFront.php */