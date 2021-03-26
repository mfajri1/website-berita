<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller {

	public function view($base, $data = null, $boolean){
		$data['tMenu'] = $this->model_menu->tampil_menu($this->session->userdata('levelUser'))->result_array();
		$load = $this->load;
		$load->view('login/templateLogin/header', $data, $boolean);
		$load->view($base, $data, $boolean);
		$load->view('login/templateLogin/footer', $data, $boolean);
	}
	public function forgot(){
		$data['title'] = 'Lupa Password';

		$this->view('login/forgot_password', $data, FALSE);	
	}

	public function checkEmail(){
		$emailUser = $this->input->post('emailUser', true);

		// $email = $this->model_login->check_email('t_login', $emailUser)->row_array();

	    $config['mailtype']  = 'html';  
	    $config['charset'] 	 = 'utf-8';  
		$config['protocol']  = 'smtp'; 
		$config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
	    $config['smtp_user'] = 'farhanfitriadi60@gmail.com';  
	    $config['smtp_pass'] = 'makansamba1234'; //$from_email password  
	    $config['smtp_port'] = '465'; //smtp port number  
	    $config['wordwrap']  = TRUE;  
	    $config['newline']   = "\r\n"; //use double quotes
	    $config['crlf']		 = "\r\n";
		
		$this->email->initialize($config);
		
        $url = base_url('forgotPassword/verifikasiPass/') . base64_encode($emailUser);
        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('farhanfitriadi60@gmail.com', 'BatCos');

        // Email penerima
        $this->email->to($emailUser); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('Kirim Email Verifikasi Reset Password');
        
        // Isi email
        $message = "<html><head><title>Halaman Verifikasi</title></head><body><p>Hi,</p><p>Trimakasih Sudah Melakukan Konfirmasi Untuk Melakukan Reset Password.</p><p>Tolong Tekan Tombol Ini Untuk Melakukan Pergantian Password.</p><a href='".$url."' target='_blank'>Link Ini</a><br/><p>Batra Cosmetick Team</p></body></html>";

        $this->email->message($message);

        // $this->email->message("<a href='http://localhost/ci/berita2/login' target='_blank'>selamat datang</a>");
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
        // var_dump($this->email->send());
        // exit;

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        	redirect('login','refresh');
        } else {
        	// redirect('forgotPassword/forgot', 'refresh');
        	echo 'gagal';
        }
	}

	public function verifikasiPass($email){
		$emailDes = base64_decode($email);
		$data['emailUser'] = $emailDes;
		$data['title'] = 'Edit Password';
		
		$this->view('login/edit_pass', $data, FALSE);	
	}

	public function validation(){
		$validation = $this->form_validation;
		$validation->set_rules('password','Password','trim|required|min_length[3]|matches[password2]',[
				'matches' => 'Password Dont match!','min_length'=>'Password Kurang panjang'
			]);
		$validation->set_rules('password2','Password','trim|required|matches[password]');

	}

	public function aksiEditPass(){
		$this->validation();
		$emailUser = $this->input->post('emailUser', true);
		$emailEnc = base64_encode($emailUser);
		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("gagal");</script>';
			redirect('forgotPassword/verifikasiPass/' . $emailEnc ,'refresh');
		} else {
			$password = $this->input->post('password', true);
			$passEncrypt = hash('sha512',$password . config_item('encryption_key'));
			$data = [
				'password' => $passEncrypt
			];

			$this->model_login->change_pass('t_login', $data, $emailUser);

			redirect('login','refresh');
		}	
	}

}

/* End of file forgotPassword.php */
/* Location: ./application/controllers/forgotPassword.php */