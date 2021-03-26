<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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

	public function tampil_konfigurasi()
	{
		$data['title'] 	= 'Halaman Konfigurasi';
		$data['tKonfig']= $this->model_konfig->tampil_konfig('t_konfigurasi_user')->row_array();
		$this->view('admin/konfigurasi/tampil_konfigurasi', $data, FALSE);
	}

	public function lihatKonfig(){
		$data['title'] 	= 'Halaman Detail Konfigurasi';
		$data['tKonfig']= $this->model_konfig->tampil_konfig('t_konfigurasi_user')->row_array();
		$this->view('admin/konfigurasi/detail_konfigurasi', $data, FALSE);	
	}

	public function editKonfig(){
		$data['title'] 	= 'Halaman Edit Konfigurasi';
		$data['tKonfig']= $this->model_konfig->tampil_konfig('t_konfigurasi_user')->row_array();
		$this->view('admin/konfigurasi/edit_konfigurasi', $data, FALSE);		
	}

	public function validation(){
		$validation = $this->form_validation;
		$validation->set_rules('namaWeb', 'Nama Web', 'trim|required');	
		$validation->set_rules('metaText', 'Meta Text', 'trim|required');	
		$validation->set_rules('keyword', 'Keyword', 'trim|required');	
		$validation->set_rules('description', 'Description', 'trim|required');
		$validation->set_rules('instagram', 'Instagram', 'trim|required');	
		$validation->set_rules('facebook', 'Facebook', 'trim|required');	
		$validation->set_rules('noHp', 'Nomor Handphone', 'trim|required');	
		$validation->set_rules('blog', 'Blog', 'trim|required');	
		$validation->set_rules('twiter', 'Twitter', 'trim|required');	
		$validation->set_rules('alamat', 'Alamat', 'trim|required');	
		$validation->set_rules('sumber', 'Sumber Web', 'trim|required');	
	}

	public function upload(){
		$config['upload_path'] = './assets/uploads/konfig/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['max_size']  = '2048';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);	
	}

	public function editKonfigAksi($id){
		$idKonfig = ['id_konfigurasi' => $id];
		$this->validation();

		$input = $this->input;

		if ($this->form_validation->run()) {
			if (!empty($_FILES['imgLogo']['name']) && !empty($_FILES['imgIcon']['name']) && !empty($_FILES['imgJumbo']['name']) ) {

				$this->upload();

				$this->upload->do_upload('imgLogo');
				$gambarLogo = $this->upload->data();

				$this->upload->do_upload('imgIcon');
				$gambarIcon = $this->upload->data();

				$this->upload->do_upload('imgJumbo');
				$gambarJumbo = $this->upload->data();

				$result = array('imgLogo' => $gambarLogo, 'imgIcon' => $gambarIcon, 'imgJumbo' => $gambarJumbo);

				$data = [
					'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
					'imgLogo' => $result['imgLogo']['file_name'],
					'imgIcon' => $result['imgIcon']['file_name'],
					'imgJumbo' => $result['imgJumbo']['file_name'],
					'metaText' => htmlspecialchars($input->post('metaText', true)),
					'keyword' => htmlspecialchars($input->post('keyword', true)),
					'description' => htmlspecialchars($input->post('description', true)),
					'instagram' => htmlspecialchars($input->post('instagram', true)),
					'facebook' => htmlspecialchars($input->post('facebook', true)),
					'noHp' => htmlspecialchars($input->post('noHp', true)),
					'blog' => htmlspecialchars($input->post('blog', true)),
					'twiter' => htmlspecialchars($input->post('twiter', true)),
					'alamat' => htmlspecialchars($input->post('alamat', true)),
					'sumber' => htmlspecialchars($input->post('sumber', true)),
					'idUser' => $this->session->userdata('idUser'),
					'tglUpdate' => time(),
				];

				$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
				$this->pesan_flashdata('Data Berhasil Di Tambahkan!!', 'konfigurasi/tampil_konfigurasi');

			}else if (empty($_FILES['imgLogo']['name']) && !empty($_FILES['imgIcon']['name']) && !empty($_FILES['imgJumbo']['name']) ) {
				$this->upload();

				$this->upload->do_upload('imgIcon');
				$gambarIcon = $this->upload->data();

				$this->upload->do_upload('imgJumbo');
				$gambarJumbo = $this->upload->data();

				$result = array('imgIcon' => $gambarIcon,'imgJumbo' => $gambarJumbo);

				$data = [
					'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
					'imgIcon' => $result['imgIcon']['file_name'],
					'imgJumbo' => $result['imgJumbo']['file_name'],
					'metaText' => htmlspecialchars($input->post('metaText', true)),
					'keyword' => htmlspecialchars($input->post('keyword', true)),
					'description' => htmlspecialchars($input->post('description', true)),
					'instagram' => htmlspecialchars($input->post('instagram', true)),
					'facebook' => htmlspecialchars($input->post('facebook', true)),
					'noHp' => htmlspecialchars($input->post('noHp', true)),
					'blog' => htmlspecialchars($input->post('blog', true)),
					'twiter' => htmlspecialchars($input->post('twiter', true)),
					'alamat' => htmlspecialchars($input->post('alamat', true)),
					'sumber' => htmlspecialchars($input->post('sumber', true)),
					'idUser' => $this->session->userdata('idUser'),
					'tglUpdate' => time(),
				];

				$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
				$this->pesan_flashdata('Data Berhasil Di Tambahkan!!', 'konfigurasi/tampil_konfigurasi');

			}else if (empty($_FILES['imgLogo']['name']) && empty($_FILES['imgIcon']['name']) && !empty($_FILES['imgJumbo']['name']) ) {

				$config['upload_path'] = './assets/uploads/konfig/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = TRUE;
				$config['max_size']  = '2048';
				$config['max_width']  = '2048';
				$config['max_height']  = '2048';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$this->upload->do_upload('imgJumbo');
				$gambarJumbo = $this->upload->data();

				$result = array('imgJumbo' => $gambarJumbo);

				$data = [
					'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
					'imgJumbo' => $result['imgJumbo']['file_name'],
					'metaText' => htmlspecialchars($input->post('metaText', true)),
					'keyword' => htmlspecialchars($input->post('keyword', true)),
					'description' => htmlspecialchars($input->post('description', true)),
					'instagram' => htmlspecialchars($input->post('instagram', true)),
					'facebook' => htmlspecialchars($input->post('facebook', true)),
					'noHp' => htmlspecialchars($input->post('noHp', true)),
					'blog' => htmlspecialchars($input->post('blog', true)),
					'twiter' => htmlspecialchars($input->post('twiter', true)),
					'alamat' => htmlspecialchars($input->post('alamat', true)),
					'sumber' => htmlspecialchars($input->post('sumber', true)),
					'idUser' => $this->session->userdata('idUser'),
					'tglUpdate' => time(),
				];

				$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
				$this->pesan_flashdata('Data Berhasil Di Tambahkan!!', 'konfigurasi/tampil_konfigurasi');

			}else if (!empty($_FILES['imgLogo']['name']) && empty($_FILES['imgIcon']['name']) && empty($_FILES['imgJumbo']['name']) ) {

				$config['upload_path'] = './assets/uploads/konfig/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = TRUE;
				$config['max_size']  = '2048';
				$config['max_width']  = '2048';
				$config['max_height']  = '2048';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$this->upload->do_upload('imgLogo');
				$gambarLogo = $this->upload->data();

				$result = array('imgLogo' => $gambarLogo);

				$data = [
					'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
					'imgLogo' => $result['imgLogo']['file_name'],
					'metaText' => htmlspecialchars($input->post('metaText', true)),
					'keyword' => htmlspecialchars($input->post('keyword', true)),
					'description' => htmlspecialchars($input->post('description', true)),
					'instagram' => htmlspecialchars($input->post('instagram', true)),
					'facebook' => htmlspecialchars($input->post('facebook', true)),
					'noHp' => htmlspecialchars($input->post('noHp', true)),
					'blog' => htmlspecialchars($input->post('blog', true)),
					'twiter' => htmlspecialchars($input->post('twiter', true)),
					'alamat' => htmlspecialchars($input->post('alamat', true)),
					'sumber' => htmlspecialchars($input->post('sumber', true)),
					'idUser' => $this->session->userdata('idUser'),
					'tglUpdate' => time(),
				];

				$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
				$this->pesan_flashdata('Data Berhasil Di Tambahkan!!', 'konfigurasi/tampil_konfigurasi');

			}else if (empty($_FILES['imgLogo']['name']) && !empty($_FILES['imgIcon']['name']) && empty($_FILES['imgJumbo']['name']) ) {

				$config['upload_path'] = './assets/uploads/konfig/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = TRUE;
				$config['max_size']  = '2048';
				$config['max_width']  = '2048';
				$config['max_height']  = '2048';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$this->upload->do_upload('imgIcon');
				$gambarIcon = $this->upload->data();

				$result = array('imgIcon' => $gambarIcon);

				$data = [
					'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
					'imgIcon' => $result['imgIcon']['file_name'],
					'metaText' => htmlspecialchars($input->post('metaText', true)),
					'keyword' => htmlspecialchars($input->post('keyword', true)),
					'description' => htmlspecialchars($input->post('description', true)),
					'instagram' => htmlspecialchars($input->post('instagram', true)),
					'facebook' => htmlspecialchars($input->post('facebook', true)),
					'noHp' => htmlspecialchars($input->post('noHp', true)),
					'blog' => htmlspecialchars($input->post('blog', true)),
					'twiter' => htmlspecialchars($input->post('twiter', true)),
					'alamat' => htmlspecialchars($input->post('alamat', true)),
					'sumber' => htmlspecialchars($input->post('sumber', true)),
					'idUser' => $this->session->userdata('idUser'),
					'tglUpdate' => time(),
				];

				$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
				$this->pesan_flashdata('Data Berhasil Di Tambahkan!!', 'konfigurasi/tampil_konfigurasi');

			}else {
				$data = [
					'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
					'metaText' => htmlspecialchars($input->post('metaText', true)),
					'keyword' => htmlspecialchars($input->post('keyword', true)),
					'description' => htmlspecialchars($input->post('description', true)),
					'instagram' => htmlspecialchars($input->post('instagram', true)),
					'facebook' => htmlspecialchars($input->post('facebook', true)),
					'noHp' => htmlspecialchars($input->post('noHp', true)),
					'blog' => htmlspecialchars($input->post('blog', true)),
					'twiter' => htmlspecialchars($input->post('twiter', true)),
					'alamat' => htmlspecialchars($input->post('alamat', true)),
					'sumber' => htmlspecialchars($input->post('sumber', true)),
					'idUser' => $this->session->userdata('idUser'),
					'tglUpdate' => time(),
				];

				$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
				$this->pesan_flashdata('Data Berhasil Di tambahkan!!', 'konfigurasi/tampil_konfigurasi');
			}
		}else {
			$this->pesan_flashdata('Data Gagal Di tambahkan!!', 'konfigurasi/tampil_konfigurasi');
		}

		// if ($this->form_validation->run()) {
		// 	if (!empty($_FILES['imgLogo']['name']) || !empty($_FILES['imgIcon']['name']) || !empty($_FILES['imgLogo']['name']) ) {
		// 		$config['upload_path'] = './assets/uploads/konfig/';
		// 		$config['allowed_types'] = 'gif|jpg|png';
		// 		$config['encrypt_name'] = TRUE;
		// 		$config['overwrite'] = TRUE;
		// 		$config['max_size']  = '2048';
		// 		$config['max_width']  = '2048';
		// 		$config['max_height']  = '2048';

		// 		$this->load->library('upload', $config);
		// 		$this->upload->initialize($config);

		// 		if ( $this->upload->do_upload('imgLogo') || $this->upload->do_upload('imgIcon') || $this->upload->do_upload('imgJumbo') ){

		// 			// $this->upload->do_upload('imgLogo');
		// 			$gambarLogo = $this->upload->data();

		// 			$this->upload->do_upload('imgIcon');
		// 			$gambarIcon = $this->upload->data();
					
		// 			$this->upload->do_upload('imgJumbo');
		// 			$gambarJumbo = $this->upload->data();

		// 			$result = array('imgLogo' => $gambarLogo,'imgIcon' => $gambarIcon,'imgJumbo' => $gambarJumbo);
					
		// 			$data = [
		// 				'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
		// 				'imgLogo' => $result['imgLogo']['file_name'],
		// 				'imgIcon' => $result['imgIcon']['file_name'],
		// 				'imgJumbo' => $result['imgJumbo']['file_name'],
		// 				'metaText' => htmlspecialchars($input->post('metaText', true)),
		// 				'keyword' => htmlspecialchars($input->post('keyword', true)),
		// 				'description' => htmlspecialchars($input->post('description', true)),
		// 				'instagram' => htmlspecialchars($input->post('instagram', true)),
		// 				'facebook' => htmlspecialchars($input->post('facebook', true)),
		// 				'noHp' => htmlspecialchars($input->post('noHp', true)),
		// 				'blog' => htmlspecialchars($input->post('blog', true)),
		// 				'twiter' => htmlspecialchars($input->post('twiter', true)),
		// 				'alamat' => htmlspecialchars($input->post('alamat', true)),
		// 				'sumber' => htmlspecialchars($input->post('sumber', true)),
		// 				'idUser' => $this->session->userdata('idUser'),
		// 				'tglUpdate' => time(),
		// 			];

		// 			$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
		// 			$this->pesan_flashdata('Data Berhasil Di Tambahkan!!', 'konfigurasi/tampil_konfigurasi');
		// 		}else{
		// 			$error = array('error' => $this->upload->display_errors());
		// 			$this->pesan_flashdata('Data Berhasil Gagal Di Upload!!' .$error['error'], 'konfigurasi/editKonfig');
		// 		}
		// 	}else {
		// 		$data = [
		// 			'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
		// 			'metaText' => htmlspecialchars($input->post('metaText', true)),
		// 			'keyword' => htmlspecialchars($input->post('keyword', true)),
		// 			'description' => htmlspecialchars($input->post('description', true)),
		// 			'instagram' => htmlspecialchars($input->post('instagram', true)),
		// 			'facebook' => htmlspecialchars($input->post('facebook', true)),
		// 			'noHp' => htmlspecialchars($input->post('noHp', true)),
		// 			'blog' => htmlspecialchars($input->post('blog', true)),
		// 			'twiter' => htmlspecialchars($input->post('twiter', true)),
		// 			'alamat' => htmlspecialchars($input->post('alamat', true)),
		// 			'sumber' => htmlspecialchars($input->post('sumber', true)),
		// 			'idUser' => $this->session->userdata('idUser'),
		// 			'tglUpdate' => time(),
		// 		];

		// 		$this->model_konfig->edit_konfig_aksi('t_konfigurasi_user', $data);
		// 		$this->pesan_flashdata('Data Berhasil Di tambahkan!!', 'konfigurasi/tampil_konfigurasi');
		// 	}
		// } else {
		// 	$this->pesan_flashdata('Data Gagal Di tambahkan!!', 'konfigurasi/tampil_konfigurasi');
		// }

	}

	public function pesan_flashdata($namaPesan, $link){
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$namaPesan.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect($link,'refresh');	
	}

}

/* End of file konfigurasi.php */
/* Location: ./application/controllers/konfigurasi.php */