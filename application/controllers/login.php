<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	

	public function view($base, $data, $bolean){
		$load = $this->load;
		$load->view('login/templateLogin/header.php', $data, $bolean);
		$load->view($base, $data, $bolean);
		$load->view('login/templateLogin/footer.php', $data, $bolean);
	}

	public function index()
	{
		$data['title']	= 'Halaman Login';
		$this->view('login/tampil_login.php', $data, FALSE);
		
	}

	public function validation(){
		$validation = $this->form_validation;
		// $data['userLogin'] = $this->model_register->tampil_user($this->_tableLogin)->result_array();
		$validation->set_rules('username', 'username', 'trim|required',[
			'required' => 'Data Tidak Boleh Kosong'
		]);
		$validation->set_rules('password','Password','trim|required|min_length[3]');
	}

	public function checkLogin(){
		$this->validation();


		if ($this->form_validation->run()) {
			$username = htmlspecialchars($this->input->post('username', true));	
			$password = htmlspecialchars($this->input->post('password', true));
			$passEncrypt = hash('sha512',$password . config_item('encryption_key'));

			$hasil = $this->lib_login->prosesLogin($username, $passEncrypt);

			echo json_encode($hasil);

			
		} else {
			redirect('login','refresh');
		} 
		
		/*

		// cara login 1	
		if ($cek == NULL) {
			echo "<script>alert('Username Atau Password Anda Salah!')</script>";
			redirect('login','refresh');
		}else{
			if($cek['statusUser'] == 1){
				$sessionData = [
					'idUser' => $cek['idUser'],
					'namaUser' => $cek['namaUser'],
					'username' => $cek['username'],
					'emailUser' => $cek['emailUser'],
					'levelUser' => $cek['levelUser'],
				];
				
				$this->session->set_userdata($sessionData);

				if($this->session->userdata('levelUser') == 1){
					redirect('admin','refresh');
				}else{
					redirect('home','refresh');
				}

			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning" >Anda Belum Melakukan Activasi! </div>');
				redirect('login');
			}
		}
		*/


		/*

		// cara login 2
		if (empty($cek)) {
			$hasilCek = 'gagal';
			$aktivasi = NULL;
			$levelUser = NULL;
		}else{
			$hasilCek = 'berhasil';
			if($cek['statusUser'] == 0){
				$hasilCek = NULL;
				$aktivasi = 'nonaktif';
				$levelUser = 0;
			}else{
				$aktivasi = 'aktif';
				$sessionData = [
					'idUser' => $cek['idUser'],
					'namaUser' => $cek['namaUser'],
					'username' => $cek['username'],
					'emailUser' => $cek['emailUser'],
					'levelUser' => $cek['levelUser'],
					'fotoUser' => $cek['fotoUser']
				];
				
				$this->session->set_userdata($sessionData);

				if($this->session->userdata('levelUser') == 1){
					$levelUser = 1;
				}else{
					$levelUser = 2;
				}
			}
		}

		$hasil = [
			'hasilCek' => $hasilCek,
			'aktivasi' => $aktivasi,
			'levelUser' => $levelUser,
		];

		echo json_encode($hasil);
		*/
	}

	public function log_out(){
		$this->session->sess_destroy();
		redirect('home','refresh');	
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */