<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	private $_tableLogin = 't_login';

	public function view($base, $data, $boolean){
		$load = $this->load; 
		$load->view('login/templateLogin/header.php', $data, $boolean);
		$load->view($base, $data, $boolean);	
		$load->view('login/templateLogin/footer.php', $data, $boolean);	
	}

	public function index()
	{
		$data['title'] = "Halaman Daftar";
		$data['userLogin'] = $this->model_register->tampil_user($this->_tableLogin)->result_array();


		$this->view('login/daftar_user.php', $data, FALSE);
	}

	public function validation(){
		$validation = $this->form_validation;
		$data['userLogin'] = $this->model_register->tampil_user($this->_tableLogin)->result_array();

		$validation->set_rules('namaUser', 'Nama User', 'trim|required', [
			'required' => 'Data Tidak Boleh Kosong'
		]);
		$validation->set_rules('username', 'username', 'trim|required|is_unique[t_login.username]',[
			'is_unique' => 'Data Sudah Ada!',
			'required' => 'Data Tidak Boleh Kosong'
		]);
		$validation->set_rules('emailUser', 'Email User', 'trim|required|is_unique[t_login.emailUser]', [
			'is_unique' => 'Data Sudah Ada!',
			'required' => 'Data Tidak Boleh Kosong'
		]);
		$validation->set_rules('password','Password','trim|required|min_length[3]|matches[password2]',[
				'matches' => 'Password Dont match!','min_length'=>'Password Kurang panjang'
			]);
		$validation->set_rules('password2','Password','trim|required|matches[password]');

	}

	public function registerAksi(){
		$this->validation();
		
		/*
		// methode yang di gunakan untuk mengaman kan password
		// 1. hashing
		$password = $this->input->post('password', true);
		foreach (hash_algos() as $v) {
			$r = hash($v, $password, false);
			var_dump("%-12s %3d %s\n", $v, strlen($r), $r);
			var_dump('<br/>');
		}
		var_dump($this->form_validation->run());exit;
		*/
		
		if ($this->form_validation->run() == FALSE) {
			echo "<script>alert('data gagal di tambahkan!')</script>";
			$this->index();
		}
		else{
			$input = $this->input;
			$emailUser = htmlspecialchars($input->post('emailUser', true));
			$password = $input->post('password', TRUE);
			$passEncrypt = hash('sha512',$password . config_item('encryption_key'));

			// verifikasi Email
		    $config['mailtype']  = 'html';  
		    $config['charset'] 	 = 'utf-8';  
			$config['protocol']  = 'smtp'; 
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
		    $config['smtp_user'] = 'farhanfitriadi60@gmail.com';  
		    $config['smtp_pass'] = 'nehcsptho070'; //$from_email password  
		    $config['smtp_port'] = 465; //smtp port number  
		    $config['wordwrap']  = TRUE;  
		    $config['newline']   = "\r\n"; //use double quotes
		    $config['crlf']		 = "\r\n";

			// Load library email dan konfigurasinya
		    $this->email->initialize($config);

		    // halaman base Tujuan
		    $url = base_url('register/verifikasiRegis/') . base64_encode($emailUser);

		    // Load library email dan konfigurasinya
		    $this->load->library('email', $config);
			
	        // Email dan nama pengirim
	        $this->email->from('farhanfitriadi60@gmail.com', 'BatCos');

	        // Email penerima
	        $this->email->to($emailUser); // Ganti dengan email tujuan

	        // Subject email
	        $this->email->subject('Kirim Email Verifikasi Email Verifikasi');
	        
	        // Isi email
	        $message = "<html><head><title>Halaman Verifikasi Email</title></head><body><p>Hi,</p><p>Trimakasih Sudah Melakukan Konfirmasi Untuk Melakukan Verifikasi Email.</p><p>Tolong Tekan Tombol Ini Untuk Melakukan Verifikasi Email.</p><a href='".$url."' target='_blank'>Link Ini</a><br/><p>Batra Cosmetick Team</p></body></html>";

	        $this->email->message($message);

	        // Tampilkan pesan sukses atau error
	        if ($this->email->send()) {
	        	$data = [
	        		"namaUser" => htmlspecialchars($input->post('namaUser', true)),
	        		"username" => htmlspecialchars($input->post('username', true)),
	        		"emailUser" => $emailUser,
	        		"password" => $passEncrypt,
	        		"tanggalDaftar" => time(),
	        		"tanggalUpdate" => time(),
	        		"fotoUser" => "default.jpg",
	        		"levelUser" => 'user',
	        		"statusUser" => 'nonaktif',
	        		'passSalah' => 0,
	        		'lastLogin' => 0,
	        		'blokirAkun' => 'tidak'
	        	];

	        	$this->model_register->tambah_user('t_login', $data);
	        	echo "<script>alert('Data Berhasil Di Tambahkan!')</script>";
	        	redirect('login','refresh');
	        } else {
        	// redirect('forgotPassword/forgot', 'refresh');
	        	echo 'gagal';
	        }

			
		}
		
	}

	public function verifikasiRegis($email){
		$emailDes = base64_decode($email);
		$emailUser = ['emailUser' => $emailDes];

		$data = [
			'statusUser' => 'aktif'
		];

		$updateActiv = $this->model_register->activasi('t_login', $data, $emailUser);

		if ($updateActiv = '') {
			echo '<script>alert("gagal aktifasi");</script>';
			redirect('login','refresh');
		}else{
			echo '<script>alert("Berhasil Aktivasi");</script>';
			redirect('login','refresh');
		}	
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */