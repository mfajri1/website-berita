<?php 
	function __construct()
	{	
		$CI = get_instance();
        // load user_model ke dalam simple_library
		$CI->load->model('model_login');
	}

	function secLogin(){
		$CI = get_instance();

		$username = $CI->session->userdata('username');
		$level = $CI->session->userdata('levelUser');
		$cekSession = $CI->model_login->cek_username('t_login', $username)->row_array();
		// var_dump($CI->uri->segment(1) == 'login' && $username == $cekSession['username']);exit;

		if( $username == ""){
			echo '<script>alert("Anda Belum Login!!")</script>';
			redirect('home','refresh');
		}else if($username != 'admin' && $username != 'operator' && $username != 'operator' && $CI->uri->segment(1) != $level){
			redirect('cBlock','refresh');
		}
	
		// if ($CI->session->userdata('username') == "" && $CI->uri->segment(1) == 'admin') {
		// 	echo '<script>alert("anda Belum Login")</script>';
		// 	redirect('login','refresh');
		// }
		// else if($CI->session->userdata('username') == 'operator' && $CI->uri->segment(1) == 'login'){
		// 	echo '<script>alert("balik")</script>';
		// 	redirect('login','refresh');
		// }
		// else if($CI->session->userdata('username') == 'admin' && $CI->uri->segment(1) == "login"){
		// 	redirect('admin','refresh');
		// }
	}

 ?>