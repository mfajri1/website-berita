<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function view($base, $data, $boolean){
		$data['konfig'] = $this->model_konfig->tampil_konfig('t_konfigurasi_user')->row_array();

		$load = $this->load;
		$load->view('home/template_home/header', $data, $boolean);
		$load->view('home/template_home/navbar', $data, $boolean);
		$load->view($base, $data, $boolean);
		$load->view('home/template_home/sidebar', $data, $boolean);
		$load->view('home/template_home/footer', $data, $boolean);
	}

	public function tampilHome()
	{
		$data['title'] = 'Halaman Home';
		$data['tKategori'] = $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array();

		$this->view('home/tampil_home', $data, FALSE);	
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home/home.php */