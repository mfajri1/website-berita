<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('model_saran');
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

	public function tampilSaran()
	{
		$data['title'] = 'Data Saran';
		$data['tSaran'] = $this->model_saran->tampil_saran('t_saran')->result_array();

		$this->view('admin/tampil_saran', $data, FALSE);
	}

}

/* End of file saran.php */
/* Location: ./application/controllers/saran.php */