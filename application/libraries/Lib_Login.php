<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        $this->CI->load->model('model_login');
	}

	public function prosesLogin($username, $passEncrypt){
		$cek = $this->CI->model_login->check_login($username, $passEncrypt)->row_array();

		if(empty($cek)){
			$hasilCek = 'gagal';
			$cekUsername = $this->CI->model_login->cek_username('t_login', $username)->row_array();
			$hasilCekPass = $cekUsername['passSalah'] + 1;
			$updatePassSalah = $this->CI->model_login->update_pass_salah('t_login', $username, $hasilCekPass);

			if ($cekUsername['passSalah'] >= 3) {
				$updateBlokir = $this->CI->model_login->update_blokir('t_login', $username);
				$cekAkun = $this->CI->model_login->cek_username('t_login', $username)->row_array();
				$jmlPassSalah = $cekAkun['passSalah'];
				$hasilBlokir = $cekAkun['blokirAkun'];
				$hasilCek = 'gagal';
				$aktivasi = $cekAkun['statusUser'];
				$levelUser = $cekAkun['levelUser'];

			}else{
				$jmlPassSalah = $cekUsername['passSalah'];
				$hasilBlokir = $cekUsername['blokirAkun'];
				$hasilCek = 'gagal';
				$aktivasi = $cekUsername['statusUser'];
				$levelUser = $cekUsername['levelUser'];
			}

		}else{
			$hasilCek = 'berhasil';
			$hasilCekPass = 0;
			$updatePassSalah = $this->CI->model_login->update_pass_salah('t_login', $username, $hasilCekPass);
			$cekAkun = $this->CI->model_login->cek_username('t_login', $username)->row_array();

			if ($cek['blokirAkun'] == 'tidak') {
				$hasilBlokir = $cek['blokirAkun'];
				$jmlPassSalah = "";

				if($cek['statusUser'] == 'nonaktif'){
					$jmlPassSalah = "";
					$hasilBlokir = $cek['blokirAkun'];
					$hasilCek = 'berhasil';
					$aktivasi = $cek['statusUser'];
					$levelUser = $cek['levelUser'];

				}else{
					$aktivasi = $cek['statusUser'];
					$sessionData = [
						'idUser' => $cek['idUser'],
						'namaUser' => $cek['namaUser'],
						'username' => $cek['username'],
						'emailUser' => $cek['emailUser'],
						'levelUser' => $cek['levelUser'],
						'fotoUser' => $cek['fotoUser']
					];


					$this->CI->session->set_userdata($sessionData);

					if($this->CI->session->userdata('levelUser') == 'admin'){
						$levelUser = $cek['levelUser'];
					}else if($this->CI->session->userdata('levelUser') == 'operator'){
						$levelUser = $cek['levelUser'];
					}else{
						$levelUser = $cek['levelUser'];
					}

					$data = [
						'lastLogin' => time(),
					];

					$this->CI->model_login->update_lastLogin('t_login', $data, $username);
				}
			}else{
				$jmlPassSalah = "";
				$hasilBlokir = 'ya';
				$hasilCek = 'berhasil';
				$aktivasi = $cek['statusUser'];
				$levelUser = $cek['levelUser'];	
			}
		}

		$hasil = [
			'jmlPassSalah' => $jmlPassSalah,
			'hasilBlokir' => $hasilBlokir,
			'hasilCek' => $hasilCek,
			'aktivasi' => $aktivasi,
			'levelUser' => $levelUser,
		];

		return $hasil;	
	}

	

}

/* End of file libLogin.php */
/* Location: ./application/libraries/libLogin.php */
