<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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

	public function profile($error = null)
	{
		$username = $this->session->userdata('username');
		$data['title'] = 'Halaman Profile';
		$data['dataUser'] = $this->model_pengguna->tampil_pengguna('t_login', $username)->row_array();
		$data['error'] = $error;
		$this->view('admin/pengguna/tampil_profile' , $data, FALSE);
	}

	// public function editPengguna(){
	// 	$session = $this->session;

	// 	$idUser = ['idUser' => $session->userdata('idUser')];
	// 	$namaUser = $this->input->post('namaUser', true);

	// 	$data = [
	// 		'namaUser' => $namaUser,
	// 		'username' => $session->userdata('username'),
	// 		'emailUser' => $session->userdata('emailUser')
	// 	];

	// 	$update = $this->model_pengguna->update_pengguna('t_login', $idUser, $data);
	// 	if($update == ""){
	// 		$hasilUpdate = false;
	// 	}else{
	// 		$hasilUpdate = true;
	// 	}


	// 	$hasil = [
	// 		'hasilUpdate' => $namaUser
	// 	];

	// 	echo json_encode($hasil);
		

	// }

	public function editDataPengguna($id){
		$idUser = ['idUser' => $id];

		$validation = $this->form_validation;

		$validation->set_rules('namaUser', 'Nama User', 'trim|required');
		$validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'trim|required');	
		$validation->set_rules('noTelp', 'No Telephone', 'trim|required');
		$validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($validation->run() == FALSE) {
			$hasilUpdate = false;
		} else {
			$input = $this->input;
			$session = $this->session;
			$data = [
				'namaUser' => $input->post('namaUser', true),
				'username' => $session->userdata('username'),
				'emailUser' => $session->userdata('emailUser'),
				'jenisKelamin' => $input->post('jenisKelamin', true),
				'noTelp' => $input->post('noTelp', true),
				'alamat' => $input->post('alamat', true),
				'tanggalUpdate' => time()
			];

			$this->model_pengguna->edit_data_pengguna('t_login', $data, $idUser);
			$hasilUpdate = true; 
		}

		$hasil = [
			'hasilUpdate' => $hasilUpdate
		];

		echo json_encode($hasil);
	}
	

	public function uploadFoto($id){
		$idUser = ['idUser' => $id];

		$config['upload_path'] = './assets/uploads/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2048';
		$config['encrypt_name'] = TRUE;
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('fotoUser')){
			$error = array('error' => $this->upload->display_errors());
			redirect('pengguna/profile','refresh');
		}
		else{
			$uploadFotoUser = $this->upload->data();

			//thumbnail
			$config['image_library'] = 'gd2';
			$config['source_image']	= './assets/uploads/users/'.$uploadFotoUser['file_name'];
			$config['new_image'] 		= './assets/uploads/thumbs/';
			$config['encrypt_name'] 	= TRUE; //enkripsi nama file
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			$config['width']         = 75;
			$config['height']       = 50;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			// medium
			$medium['image_library'] = 'gd2';
			$medium['source_image']	= './assets/uploads/users/'.$uploadFotoUser['file_name'];
			$medium['new_image'] 		= './assets/uploads/medium/users/';
			$medium['encrypt_name'] 	= TRUE; //enkripsi nama file
			$medium['create_thumb'] = FALSE;
			$medium['maintain_ratio'] = FALSE;
			$medium['width']         = 100;
			$medium['height']       = 100;

			$this->load->library('image_lib', $medium);
			$this->image_lib->initialize($medium);
			$this->image_lib->resize();

			// akhir thumbnail

			$session = $this->session;

			$data = [
				'username' => $session->userdata('username'),
				'emailUser' => $session->userdata('emailUser'),
				'tanggalUpdate' => time(),
				'fotoUser' => $uploadFotoUser['file_name']
			];

			$resultUpload = $this->model_pengguna->upload_foto_user('t_login', $idUser, $data);

			if ($resultUpload == '') {
				echo '<script>alert("berhasil Update");</script>';
				redirect('pengguna/profile','refresh');
			}else{
				echo '<script>alert("gagal Update");</script>';
				redirect('pengguna/profile','refresh');
			}


		}	
	}



	public function pengaturan(){
		$id 	= $this->session->userdata('idUser');
		$idUser = ['idUser' => $id];
		$data['title'] = 'Pengaturan';

		$this->view('admin/pengguna/tampil_pengaturan', $data, FALSE);
	}

	public function validation(){
		$validation = $this->form_validation;

		$validation->set_rules('password','Password','trim|required|min_length[3]|matches[password2]',[
				'matches' => 'Password Dont match!','min_length'=>'Password Kurang panjang'
			]);
		$validation->set_rules('password2','Password','trim|required|matches[password]');	
	}

	public function editPassPengguna($id){
		$this->validation();
		$idUser = ['idUser' => $id];

		if ($this->form_validation->run() == FALSE) {
			echo"<script>alert('gagal update');</script>";
			redirect('pengguna/pengaturan/' . $this->session->userdata('idUser'),'refresh');
		} else {
			$input = $this->input;
			$password = htmlspecialchars($input->post('password', TRUE));
			$passEncrypt = hash('sha512', $password. config_item('encryption_key'));

			$session = $this->session;
			$data = [
				'username' => $session->userdata('username'),
				'emailUser' => $session->userdata('emailUser'),
				'password' => $passEncrypt,
				'tanggalUpdate' => time()
			];

			$this->model_pengguna->update_pengguna('t_login', $idUser, $data);
			redirect('admin','refresh');
		}	
	}

	

}

/* End of file pengguna.php */
/* Location: ./application/controllers/pengguna.php */