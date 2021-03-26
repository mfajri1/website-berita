<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends CI_Controller {
	/*

	// multiupload
	public function gambarAksi($id){

		$nogambar = $this->input->post('no', true);

		$namass = $this->input->post('namaGambar', true);


		$data = [];
		$dataThumb = [];
		$index = 0;

		$jumlah_berkas = count($_FILES['namaGambar']['name']);

		foreach ($nogambar as $i) {

				//mengambil file input 
				$_FILES['file']['name'] = $_FILES['namaGambar']['name'][$index];
				$_FILES['file']['type'] = $_FILES['namaGambar']['type'][$index];
			 	$_FILES['file']['tmp_name'] = $_FILES['namaGambar']['tmp_name'][$index];
			 	$_FILES['file']['error'] = $_FILES['namaGambar']['error'][$index];
			 	$_FILES['file']['size'] = $_FILES['namaGambar']['size'][$index];
			 	

			 	// set preference
			 	$config['upload_path'] = './assets/uploads/';
			 	$config['allowed_types'] = 'gif|jpg|png';
			 	$config['encrypt_name'] = TRUE;
			 	$config['max_size']  = '2048';
			 	$config['max_width']  = '2048';
			 	$config['max_height']  = '2048';

			 	// memasukkan ke library
			 	$this->load->library('upload', $config);


			 	// var_dump($_FILES['file']['name']);exit;
			 	if ($this->upload->do_upload('file')) {
			 		$uploadGambar =  $this->upload->data();
			 		$filename = $uploadGambar['file_name'];

					array_push($data, [
						'namaGambar' => $filename,
						'idBerita' => $id

					]);

					array_push($dataThumb, $filename);

			 	}else{
			 		$error = array('error' => $this->upload->display_errors());
			 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gambar Gagal Di Upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 			<span aria-hidden="true">&times;</span>
			 			</button></div>');
				redirect('admin/lihatGambarBerita/' . $id,'refresh');
			 	}

			 	$index++;
			
		}

		$jumlah = count($_FILES['namaGambar']['name']);
		// var_dump($index);exit;

		for ($j = 0; $j < $jumlah ; $j++) {
		 	
			$config['image_library'] = 'gd2';
	 		$config['source_image']	= './assets/uploads/' . $dataThumb[$j];
	 		$config['new_image'] 	= './assets/uploads/thumbs/';
			$config['encrypt_name'] 	= TRUE; //enkripsi nama file
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 75;
			$config['height']       = 50;

			// var_dump($config);exit;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

		}

		$this->model_gambar->upload_gambar('t_gambar', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
					// echo 'sukses';

		redirect('admin/lihatGambarBerita/' . $id,'refresh');

		// exit;

		

	}
	*/

	public function gambarAksi($id){
		$idBerita = ['idBerita' => $id];
		// var_dump($idBerita);exit;

		// if ($this->form_validation->run()) {

		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size']  = '2048';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';

		 // $this->upload->initialize($config);
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('namaGambar')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gambar Gagal Di Upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('admin/lihatGambarBerita/' . $id,'refresh');
		}else{
			$uploadGambarBerita = $this->upload->data();
			// var_dump($uploadGambarBerita);exit;

			$this->create_thumb($uploadGambarBerita);

            $data = [
            	"namaGambar" => $uploadGambarBerita['file_name'],
            	"idBerita"	=> $id
            ];

            $this->model_gambar->upload_gambar('t_gambar', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
						// echo 'sukses';

			redirect('admin/lihatGambarBerita/' . $id,'refresh');
		}
	}

	public function create_thumb($uploadGambarBerita){
		//thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image']	= './assets/uploads/'. $uploadGambarBerita['file_name'];
		$config['new_image'] 		= './assets/uploads/thumbs/';
		$config['encrypt_name'] 	= TRUE; //enkripsi nama file
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = FALSE;
		$config['width']         = 75;
		$config['height']       = 50;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();

		// gambar small
		$small['image_library'] = 'gd2';
		$small['source_image']	= './assets/uploads/'. $uploadGambarBerita['file_name'];
		$small['new_image'] 		= './assets/uploads/small/';
		$small['encrypt_name'] 	= TRUE; //enkripsi nama file
		$small['create_thumb'] = FALSE;
		$small['maintain_ratio'] = FALSE;
		$small['width']         = 75;
		$small['height']       = 50;

		$this->load->library('image_lib', $small);
		$this->image_lib->initialize($small);
		$this->image_lib->resize();

		// gambar medium
		$medium['image_library'] = 'gd2';
		$medium['source_image']	= './assets/uploads/'. $uploadGambarBerita['file_name'];
		$medium['new_image'] 		= './assets/uploads/medium/';
		$medium['encrypt_name'] 	= TRUE; //enkripsi nama file
		$medium['create_thumb'] = FALSE;
		$medium['maintain_ratio'] = FALSE;
		$medium['width']         = 600;
		$medium['height']       = 400;

		$this->load->library('image_lib', $medium);
		$this->image_lib->initialize($medium);
		$this->image_lib->resize();

		// gambar large
		$large['image_library'] = 'gd2';
		$large['source_image']	= './assets/uploads/'. $uploadGambarBerita['file_name'];
		$large['new_image'] 		= './assets/uploads/large/';
		$large['encrypt_name'] 	= TRUE; //enkripsi nama file
		$large['create_thumb'] = FALSE;
		$large['maintain_ratio'] = FALSE;
		$large['width']         = 700;
		$large['height']       = 467;

		$this->load->library('image_lib', $large);
		$this->image_lib->initialize($large);
		$this->image_lib->resize();
	}

	public function deleteGambarAll($id){
		$idBerita = $id;
		$idGambar = $_POST['idGambar']; // Ambil data idBerita yang dikirim oleh view.php melalui form submit

		

		if($idGambar == NULL){
			echo '<script>
					alert("Pilih terlebih dahulu tabel yang mau di hapus!");
				</script>'; 
			redirect("admin/lihatGambarBerita/" . $id);

		}else{

			$data['detailGambar'] =$this->model_berita->detail_gambar_hapus('t_gambar', $idGambar)->result_array();

			$dataDetailGambar = $data['detailGambar'];
			// var_dump($dataDetailGambar);exit;
			foreach ($dataDetailGambar as $ddg) {

				unlink('./assets/uploads/' . $ddg['namaGambar']);
				unlink('./assets/uploads/small/' . $ddg['namaGambar']);
				unlink('./assets/uploads/medium/' . $ddg['namaGambar']);
				unlink('./assets/uploads/large/' . $ddg['namaGambar']);
			}
			/*
			foreach ($dataDetailGambar as $d) {

				//digunakan untuk mengambil value dari thumbnail foto yang di upload
				$namaFile = $d['namaGambar'];
				$nama = explode(".", $namaFile);
				$data['namaGambar'] = $nama[0]."_thumb.".$nama[1];
				// end thumb

				//digunakan untuk menghapus thumbnail
				unlink('./assets/uploads/thumbs/' . $data['namaGambar']);

			}
			*/
        
			$this->model_gambar->delete($idGambar); // Panggil fungsi delete dari model
        	redirect('admin/lihatGambarBerita/' . $id);	
		}	
	}

	public function hapusGambar($idGam, $idBer){
		// var_dump($idBer);exit;
		$idGambar = ["idGambar" => $idGam];

		$data['detailGambar'] =$this->model_berita->detail_gambar_hapus('t_gambar', $idGambar)->result_array();
		$dataDetailGambar = $data['detailGambar'];

		foreach ($dataDetailGambar as $ddg) {
			unlink('./assets/uploads/' . $ddg['namaGambar']);
			unlink('./assets/uploads/small/' . $ddg['namaGambar']);
			unlink('./assets/uploads/medium/' . $ddg['namaGambar']);
			unlink('./assets/uploads/large/' . $ddg['namaGambar']);
		}

		$this->model_gambar->hapus('t_gambar', $idGambar); // Panggil fungsi delete dari model
		redirect('admin/lihatGambarBerita/' . $idBer);	



	}

}

/* End of file gambar.php */
/* Location: ./application/controllers/gambar.php */