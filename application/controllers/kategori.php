<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function view($base, $data, $bool){
		$data['tMenu'] = $this->model_menu->tampil_menu($this->session->userdata('levelUser'))->result_array();
		$data['viewMenu'] = $this->model_menu->tampil_data_menu()->result_array();
		$data['viewSubmenu'] = $this->model_submenu->tampil_submenu('t_submenu_backend')->result_array();
		
		$load = $this->load;
		$load->view('admin/template/header', $data);
		$load->view('admin/template/sidebar', $data);
		$load->view($base, $data, $bool);
		$load->view('admin/template/footer', $data);
	}

	public function index()
	{
		$data['tkategori'] = $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array();
		$this->view('admin/kategori/kategori_berita', $data, FALSE);	
	}

	public function validation(){
		$this->form_validation->set_rules('namaKategoriBerita', 'Nama Kategori', 'trim|required', ['required' => 'Nama Kategori Tidak Boleh Kosong']);
	}

	public function tambahKategori(){
		// $data['faker'] = Faker\Factory::create('id_ID'); //data faker otomatis
		$data['title'] = "Tambah Berita";
		$data['tkategori'] = $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array();
		$this->view('admin/kategori/tambah_kategori', $data, FALSE);	
	}

	public function tambahKategoriAksi(){
		$this->validation();
		/*
		// cara 1
		$nomor = $this->input->post('nomor', true);
		$namaKategoriBerita = $this->input->post('namaKategoriBerita', true);
		$searchBerita = $this->input->post('searchBerita', true);
		// $searchBerita = $slugKategori;
		$status = $this->input->post('status', true);
		$data = [];
		$index = 0;
		foreach ($namaKategoriBerita as $nkb) {
			$slugKategori = url_title($nkb, 'dash', true);
			array_push($data, [
				'namaKategoriBerita' => $nkb,
				'searchBerita' => $slugKategori,
				'status' => $status[$index],
			]);				
			$index++;
		}

		// print_r($data);exit;

		$this->model_kategori->tambah_kategori('t_kategori_berita', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('kategori','refresh');

		//akhir cara 1
		*/
		

		
		// cara 2 dengan menambahkan inputan searchBerita
		$namaKategoriBerita = $this->input->post('namaKategoriBerita', true);
		$searchBerita = $this->input->post('searchBerita', true);
		$status = $this->input->post('status', true);

		$data = [];
		$index = 0;

		foreach ($namaKategoriBerita as $nkb) {
			array_push($data, [
				'namaKategoriBerita' => $nkb,
				'searchBerita' => $searchBerita[$index],
				'status' => $status[$index],
			]);				
			$index++;
		}

		// print_r($data);exit;

		$this->model_kategori->tambah_kategori_banyak('t_kategori_berita', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('kategori','refresh');
	}

	public function editKategori($id){
		$idKategoriBerita = ['idKategoriBerita' => $id];
		$data['title'] = 'Edit Kategori Berita';
		$data['editkategori'] = $this->model_kategori->edit_kategori('t_kategori_berita', $idKategoriBerita)->row_array();
		$this->view('admin/kategori/edit_kategori', $data, FALSE);		
	}

	public function editKategoriAksi($id){
		$this->validation();

		$idKategoriBerita = ['idKategoriBerita' => $id];

		$input = $this->input;

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('kategori/editKategori','refresh');
		} else {
			$data = [
				'namaKategoriBerita' => htmlspecialchars($input->post('namaKategoriBerita', true)),
				'searchBerita' => htmlspecialchars($input->post('searchBerita', true)),
				'status' => htmlspecialchars($input->post('status', true)),
			];

			$this->model_kategori->edit_kategori_aksi('t_kategori_berita', $data, $idKategoriBerita);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Ubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('kategori','refresh');
		}	
	}


	public function hapusKategori($id){
		$idKategoriBerita = ['idKategoriBerita' => $id];
		$this->model_kategori->hapus_kategori('t_kategori_berita', $idKategoriBerita);		
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('kategori','refresh');
	}

	public function deleteKategori(){
		$idKategoriBerita = $_POST['idKategoriBerita'];
		$this->model_kategori->delete($idKategoriBerita); // Panggil fungsi delete dari model
        
        redirect('kategori');		
	}
}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */