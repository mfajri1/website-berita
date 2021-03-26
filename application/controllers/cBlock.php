<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CBlock extends CI_Controller {

	public function index()
	{
		$this->load->view('vBlock',FALSE);		
	}

}

/* End of file cBlock.php */
/* Location: ./application/controllers/cBlock.php */