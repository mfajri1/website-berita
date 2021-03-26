<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		secLogin();
	}

	public function validation(){
		$this->form_validation->set_rules('emailUser', 'Email User', 'trim|required');	
		$this->form_validation->set_rules('saran', 'Saran', 'trim|required');	
	}

	public function tambahSaran($id){
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			echo "<script>alert('Saran Gagal Di tambahakan!!')</script>";
			redirect('user/user','refresh');
		} else {
			$data = [
				'emailUser' => htmlspecialchars($this->input->post('emailUser', true)),
				'saran' => htmlspecialchars($this->input->post('saran', true)),
				'idUser' => $id
			];

			$this->model_user->tambah_saran('t_saran', $data);
			echo "<script>alert('Saran berhasil Di Tambahkan!!')</script>";
			redirect('user/user','refresh');

		}
	}

}

/* End of file saran.php */
/* Location: ./application/controllers/user/saran.php */