<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function view($base, $data, $boolean){
		$data['tMenu'] = $this->model_menu->tampil_menu($this->session->userdata('levelUser'))->result_array();
		$data['viewMenu'] = $this->model_menu->tampil_data_menu()->result_array();
		$data['viewSubmenu'] = $this->model_submenu->tampil_submenu('t_submenu_backend')->result_array();
		
		$load = $this->load;
		$load->view('admin/template/header', $data, FALSE);
		$load->view('admin/template/sidebar', $data, FALSE);
		$load->view($base, $data, $boolean);
		$load->view('admin/template/footer', $data, FALSE);
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['koment'] = $this->model_komentar->tampil_koment('t_komentar')->result_array();
		$this->view('admin/komentar/komentar', $data, FALSE);
	}

	public function hapusKoment($id){
		$idKomentar = ["idKomentar" => $id];
		$this->model_komentar->hapus_komentar('t_komentar', $idKomentar);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/tampilBerita','refresh');
	}

	public function detailKoment($id){
		$idKomentar	= ['idKomentar' => $id];
		$data['koments'] = $this->model_komentar->detail_koment($id)->result_array();
		$this->view('admin/komentar/tampil_komentar', $data, FALSE);
	}

	public function deleteKomentar(){
		$idKomentar = $_POST['idKomentar'];
		$this->model_komentar->delete_komentar($idKomentar);
		redirect('komentar');	
	}

}

/* End of file komentar.php */
/* Location: ./application/controllers/komentar.php */