<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('model_berita');
		$this->load->model('model_about');
		secLogin();
	}

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

	public function tampilAbout()
	{
		$data['title'] = 'Data About';
		$data['tAbout'] = $this->model_about->tampil_about('t_about')->row_array();

		$this->view('admin/about/about', $data, FALSE);
	}

	public function create_thumb($uploadGambarBerita){
		$load = $this->load;
		//thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image']	= './assets/uploads/large/'. $uploadGambarBerita['file_name'];
		$config['new_image'] 		= './assets/uploads/thumbs/';
		$config['encrypt_name'] 	= TRUE; //enkripsi nama file
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = FALSE;
		$config['width']         = 75;
		$config['height']       = 50;

		$load->library('image_lib', $config);
		$this->image_lib->resize();

	}

	public function editData($id){
		$idAbout = ["idAbout" => $id];

		$data['title'] 		= "Edit Data About";
		$data['editAbout']		= $this->model_about->edit_about('t_about', $idAbout)->row_array();

		$this->view('admin/about/edit_about', $data, FALSE);

	}

	public function editDataAksi($id){
		$this->form_validation->set_rules('judulAbout', 'judulAbout', 'trim|required');
		$this->form_validation->set_rules('judulVisi', 'judulVisi', 'trim|required');
		$this->form_validation->set_rules('judulMisi', 'judulMisi', 'trim|required');
		$this->form_validation->set_rules('judulTujuan', 'judulTujuan', 'trim|required');
		
		$idAbout = ["idAbout" => $id];

		$input = $this->input;

		if ($this->form_validation->run()) {
			if (!empty($_FILES['fotoAbout']['name'])) {
				$config['upload_path'] = './assets/uploads/large/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$config['max_size']  = '2048';
				$config['max_width']  = '2048';
				$config['max_height']  = '2048';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fotoAbout')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gambar Gagal Di Upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>');
					redirect('about/editData/' . $id ,'refresh');
				}else{
					$uploadFotoAbout = $this->upload->data();
					/*
					ini digunakan untuk mengambil nama value ketika di upload
					$valueGambar = file_get_contents($gambarBerita['full_path']); //digunakan untuk mengambil nama dari file yang telah tersimpan
					$fileGambarEncode = base64_encode($valueGambar); // mengubah nama file menjadi encode
					*/

					// $valueGambar = file_get_contents($uploadFotoAbout['file_name']);

					$this->create_thumb($uploadFotoAbout);

					$data = [
						"fotoAbout" => $uploadFotoAbout['file_name'],
						"judulAbout" => htmlspecialchars($input->post('judulAbout', true)),
						"isiAbout" => htmlspecialchars($input->post('isiAbout', true)),
						"judulVisi" => 'Judul Visi',
						"isiVisi" => htmlspecialchars($input->post('isiVisi', true)),
						"judulMisi" => 'Judul Misi',
						"isiMisi" => htmlspecialchars($input->post('isiMisi', true)),
						"judulTujuan" => 'Judul Tujuan',
						"isiTujuan" => htmlspecialchars($input->post('isiTujuan', true)),
						"tanggalPost" => time(),
					];

					$this->model_about->edit_about_aksi('t_about', $data, $idAbout);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>');
					redirect('about/tampilAbout','refresh');
				}

			}else{
				// edit tidak ganti gambar
				$data = [
					"judulAbout" => htmlspecialchars($input->post('judulAbout', true)),
					"isiAbout" => htmlspecialchars($input->post('isiAbout', true)),
					"judulVisi" => 'Judul Visi',
					"isiVisi" => htmlspecialchars($input->post('isiVisi', true)),
					"judulMisi" => 'Judul Misi',
					"isiMisi" => htmlspecialchars($input->post('isiMisi', true)),
					"judulTujuan" => 'Judul Tujuan',
					"isiTujuan" => htmlspecialchars($input->post('isiTujuan', true)),
					"tanggalPost" => time(),
				];
				// print_r($data);exit;

				$this->model_about->edit_about_aksi('t_about', $data, $idAbout);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>');
					redirect('about/editData/' . $id,'refresh');
			}

		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('about/tampilAbout','refresh');
		}	
	}

}

/* End of file about.php */
/* Location: ./application/controllers/about.php */