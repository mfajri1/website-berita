<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('model_about');
		secLogin();
	}

	public function view($base, $data, $boolean){
		$data['konfig'] = $this->model_konfig->tampil_konfig('t_konfigurasi_user')->row_array();
		$data['tKategori'] = $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array();

		$load = $this->load;
		$load->view('user/template_user/header', $data, $boolean);
		$load->view('user/template_user/navbar', $data, $boolean);
		$load->view($base, $data, $boolean);
		$load->view('user/template_user/sidebar', $data, $boolean);
		$load->view('user/template_user/footer', $data, $boolean);
	}

	public function tampilBerita()
	{
		$data['title'] = 'Halaman Home';
		$data['totalBerita'] = $this->model_berita->total_data('t_berita')->num_rows();

		$config['base_url'] = base_url('user/user/tampilBerita/');
		$config['total_rows'] = $data['totalBerita'];
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 5;
		$config['uri_segment'] 		= 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] 		= floor($choice);

		$config['full_tag_open'] = '<ul class="pagination" ><li>';
		$config['full_tag_close'] = '</li></ul>';
		// number pertama jika tab nya aktif
		$config['first_link'] 		= 'First';
		$config['cur_tag_open'] 	= '<a><b>';
		$config['cur_tag_close'] 	= '</b></a>';
		// tombol next
		$config['next_link']		= 'Next';
		$config['next_tag_open'] 	= '';
		$config['next_tag_close'] 	= '';
		// tombol previus
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '';

		// tambahan
		$config['first_tag_open'] = '<a>';
		$config['first_tag_close'] = '</a>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<a>';
		$config['last_tag_close'] = '</a>';
		$config['first_url']		= base_url('/user/user/tampilBerita/');

		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) * $config['per_page'] :0;
		$data['tampilBerita'] = $this->model_berita->tampil_data_berita('t_berita', $config["per_page"], $page)->result_array();
		$data['pagination']	= $this->pagination->create_links();
		

		$data['postBerita'] = $this->model_berita->post_berita('t_berita')->result_array();
		

		$this->view('user/home', $data, FALSE);	
	}

	public function detailBerita($id){
		$data['title'] = 'Detail Berita';
		$data['konfig'] = $this->model_konfig->tampil_konfig('t_konfigurasi_user')->row_array();
		$data['tKategori'] = $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array();
		$data['detailBerita'] = $this->model_berita->detail_berita('t_berita', $id)->row_array();
		$data['beritaId'] = $id;
		// var_dump($id);
		$data['postBerita'] = $this->model_berita->post_berita('t_berita')->result_array();
		$data['detailKoment'] = $this->model_komentar->detail_koment_front($id)->result_array();

		$load = $this->load;
		$load->view('user/template_user/header', $data, FALSE);
		$load->view('user/template_user/nav_singlePage', $data, FALSE);
		$load->view('user/detail_berita', $data, FALSE);
		$load->view('user/template_user/footer', $data, FALSE);	
	}

	public function tambahKomen(){
		$idBerita = $this->input->post('idBerita', true);
		$idUser = $this->input->post('idUser', true);

		$this->form_validation->set_rules('isiKomentar', 'Komentar', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$hasil = 'gagal';
			// echo '<script>alert("komentar Kosong")</script>';
			// redirect('user/user/tampilBerita','refresh');		
		} else {
			$data = [
				'judulKomentar' => 'berita',
				'isiKomentar' => htmlspecialchars($this->input->post('isiKomentar', true)),
				'tanggalPost' => time(),
				'tanggalUpdate' => time(),
				'idBerita'	=> $idBerita,
				'idUser' => $idUser
			];

			$this->model_komentar->tambah_komentar('t_komentar', $data);
			$hasil = 'berhasil';

			echo json_encode($hasil);
			// echo '<script>alert("Berhasil Menambhakan!!")</script>';
			// redirect('user/user/tampilBerita','refresh');
		}	
	}

	public function tampilBeritaPerKategori($idKategori){
		$data['title'] = 'Detail Berita';

		$id = intval($idKategori);
		
		$data['totalBeritaKategori'] = $this->model_berita->total_data_berita_kategori('t_berita', $id)->num_rows();
		// var_dump($data['totalBerita']);

		$config['base_url'] = base_url('user/user/tampilBeritaPerKategori/') . $idKategori;
		$config['total_rows'] = $data['totalBeritaKategori'];
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 5;
		$config['uri_segment'] 		= 5;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] 		= floor($choice);

		$config['full_tag_open'] = '<ul class="pagination" ><li>';
		$config['full_tag_close'] = '</li></ul>';
		// number pertama jika tab nya aktif
		$config['first_link'] 		= 'First';
		$config['cur_tag_open'] 	= '<a><b>';
		$config['cur_tag_close'] 	= '</b></a>';
		// tombol next
		$config['next_link']		= 'Next';
		$config['next_tag_open'] 	= '';
		$config['next_tag_close'] 	= '';
		// tombol previus
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '';

		// tambahan
		$config['first_tag_open'] = '<a>';
		$config['first_tag_close'] = '</a>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<a>';
		$config['last_tag_close'] = '</a>';
		$config['first_url']		= base_url('/user/user/tampilBeritaPerKategori/') . $idKategori;

		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page'] :0;

		$data['postBerita'] = $this->model_berita->post_berita('t_berita')->result_array();
		$data['tampilBeritaKategori'] = $this->model_berita->tampil_data_berita_kategori($config["per_page"], $page, $id)->result_array();

		$data['pagination']	= $this->pagination->create_links();

		$this->view('user/home_kategori', $data, FALSE);		
	}

	public function about(){
		$data['title'] = 'About';
		$data['konfig'] = $this->model_konfig->tampil_konfig('t_konfigurasi_user')->row_array();
		$data['tKategori'] = $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array();
		$data['tAbout'] = $this->model_about->tampil_about('t_about')->row_array();
		

		$load = $this->load;
		$load->view('user/template_user/header', $data, FALSE);
		$load->view('user/template_user/nav_singlePage', $data, FALSE);
		$load->view('user/about', $data, FALSE);
		$load->view('user/template_user/footer', $data, FALSE);		
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user/user.php */