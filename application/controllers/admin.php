<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('model_berita');
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

	public function index()
	{
		$data['title'] = "Dashboard";


		$this->view('admin/dashboard', $data, FALSE);
	}

	public function tampilBerita(){
		$data['title'] = "Tampil Data Berita";
		$data['tampil'] = $this->model_berita->tampil_data('t_berita')->result_array();
		$this->view('admin/tampil_berita', $data, FALSE);	

	}

	public function tambahBerita(){
		$data['title'] = "Tambah Berita";
		$data['tKategori'] = $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array(); 

		$this->view('admin/tambah_berita', $data, FALSE);	
	}

	public function validation(){
		$validation = $this->form_validation;
		$validation->set_rules('namaPengarang', 'Nama Pengarang', 'trim|required', ['required' => 'Nama Pengarang Tidak Boleh Kosong']);
		$validation->set_rules('judulBerita', 'Judul Berita', 'trim|required', ['required' => 'Judul Berita Tidak Boleh Kosong']);
		$validation->set_rules('isiBerita', 'Isi Berita', 'trim|required', ['required' => 'Isi Berita Tidak Boleh Kosong']);
		$validation->set_rules('idKategori', 'id Kategori', 'trim|required', ['required' => 'id Kategori Tidak Boleh Kosong']);
	}

	public function tambahAksi(){
		$this->validation();

		$slugBerita = url_title($this->input->post('judulBerita'), '-');

		if ($this->form_validation->run()) {
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size']  = '2048';
			$config['max_width']  = '2048';
			$config['max_height']  = '2048';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambarBerita')){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gambar Gagal Di Upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
		 		</button></div>');
		 		redirect('admin/tambahBerita','refresh');
			}
			else{
				$uploadGambarBerita = $this->upload->data();
				/*
				ini digunakan untuk mengambil nama value ketika di upload
				$valueGambar = file_get_contents($gambarBerita['full_path']); //digunakan untuk mengambil nama dari file yang telah tersimpan
				$fileGambarEncode = base64_encode($valueGambar); // mengubah nama file menjadi encode
				*/

				// $valueGambar = file_get_contents($uploadGambarBerita['file_name']);

				//membuat thumbnail
				$this->create_thumb($uploadGambarBerita);

                // akhir thumbnail

                $input = $this->input;

				$data = [
					"namaPengarang" => htmlspecialchars($input->post('namaPengarang', true)),
					"judulBerita" => htmlspecialchars($input->post('judulBerita', true)),
					"headlineBerita" => $slugBerita,
					"isiBerita" => htmlspecialchars($input->post('isiBerita', true)),
					"gambarBerita" => $uploadGambarBerita['file_name'],
					"tanggalPost" => time(),
					"ratingBerita" => htmlspecialchars($input->post('ratingBerita', true)),
					"tanggalUpdate" => time(),
					"idKategori" => htmlspecialchars($input->post('idKategori', true)),
					"idUser" => $this->session->userdata('idUser')
				];

				$this->model_berita->tambah_berita('t_berita', $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button></div>');
				redirect('admin/tampilBerita','refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('admin/tampilBerita','refresh');
		}
	}

	public function create_thumb($uploadGambarBerita){
		$load = $this->load;
		//thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image']	= './assets/uploads/'. $uploadGambarBerita['file_name'];
		$config['new_image'] 		= './assets/uploads/thumbs/';
		$config['encrypt_name'] 	= TRUE; //enkripsi nama file
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = FALSE;
		$config['width']         = 75;
		$config['height']       = 50;

		$load->library('image_lib', $config);
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

		$load->library('image_lib', $small);
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

		$load->library('image_lib', $medium);
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

		$load->library('image_lib', $large);
		$this->image_lib->initialize($large);
		$this->image_lib->resize();
	}

	public function detailBerita($id){
		$data['title'] = "Detail Data Berita";
		$data['detail'] =$this->model_berita->detail_berita('t_berita', $id)->row_array();

		//digunakan untuk mengambil value dari thumbnail foto yang di upload
		$namaFile = base_url('assets/uploads/thumbs/').$data['detail']['gambarBerita'];
		$nama = explode(".", $namaFile);
		$data['namaGambar'] = $nama[0]."_thumb.".$nama[1];
		// end thumb

		$this->view('admin/detail_berita', $data, FALSE);
	}

	public function editBerita($id){
		$idBerita			= ['idBerita' => $id];
		$data['title'] 		= "Edit Data Berita";
		$data['edit']		= $this->model_berita->edit_berita('t_berita', $idBerita)->row_array();
		$data['tKategori'] 	= $this->model_kategori->tampil_kategori('t_kategori_berita')->result_array(); 

		$this->view('admin/edit_berita', $data, FALSE);
	}

	public function editAksi($id){
		$this->validation();
		$idBerita = ["idBerita" => $id];

		$data['detail'] =$this->model_berita->detail('t_berita', $idBerita)->row_array();

		// print_r($data['detail']);exit;

		$slugBerita = url_title($this->input->post('judulBerita'), '-');

		$input = $this->input;

		if ($this->form_validation->run()) {
			if (!empty($_FILES['gambarBerita']['name'])) {
				$config['upload_path'] = './assets/uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$config['max_size']  = '2048';
				$config['max_width']  = '2048';
				$config['max_height']  = '2048';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambarBerita')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gambar Gagal Di Upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>');
					redirect('admin/editBerita' . $id ,'refresh');
				}else{
					$uploadGambarBerita = $this->upload->data();
					/*
					ini digunakan untuk mengambil nama value ketika di upload
					$valueGambar = file_get_contents($gambarBerita['full_path']); //digunakan untuk mengambil nama dari file yang telah tersimpan
					$fileGambarEncode = base64_encode($valueGambar); // mengubah nama file menjadi encode
					*/

					// $valueGambar = file_get_contents($uploadGambarBerita['file_name']);

					$this->create_thumb($uploadGambarBerita);

					$data = [
						"namaPengarang" => htmlspecialchars($input->post('namaPengarang', true)),
						"judulBerita" => htmlspecialchars($input->post('judulBerita', true)),
						"headlineBerita" => $slugBerita,
						"isiBerita" => htmlspecialchars($input->post('isiBerita', true)),
						"gambarBerita" => $uploadGambarBerita['file_name'],
						"tanggalPost" => $data['detail']['tanggalPost'],
						"ratingBerita" => htmlspecialchars($input->post('ratingBerita', true)),
						"tanggalUpdate" => time(),
						"idKategori" => htmlspecialchars($input->post('idKategori', true)),
						"idUser" => $this->session->userdata('idUser')
					];

					$this->model_berita->edit_berita_aksi('t_berita', $data, $idBerita);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>');
					redirect('admin/tampilBerita','refresh');
				}

			}else{
				// edit tidak ganti gambar
				$data = [
					"namaPengarang" => htmlspecialchars($input->post('namaPengarang', true)),
					"judulBerita" => htmlspecialchars($input->post('judulBerita', true)),
					"headlineBerita" => $slugBerita,
					"isiBerita" => htmlspecialchars($input->post('isiBerita', true)),
					"tanggalPost" => $data['detail']['tanggalPost'],
					"ratingBerita" => htmlspecialchars($input->post('ratingBerita', true)),
					"tanggalUpdate" => time(),
					"idKategori" => htmlspecialchars($input->post('idKategori', true)),
					"idUser" => 1
				];
				// print_r($data);exit;

				$this->model_berita->edit_berita_aksi('t_berita', $data, $idBerita);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('admin/tampilBerita','refresh');
			}

		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Di Tambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('admin/tampilBerita' . $id,'refresh');
		}
		
	}

	public function hapusBerita($id){
		$idBerita = ["idBerita" => $id];

		// menghapus foto asli dari table t_gambar ketika menekan tombol hapus dari tampil berita
		$data['detailGambar'] =$this->model_berita->hapus_gambar_all('t_gambar', $idBerita)->result_array();

		$dataDetailGambar = $data['detailGambar'];
		foreach ($dataDetailGambar as $dg) {
			// var_dump($dg['namaGambar']);exit;
			unlink('./assets/uploads/' . $dg['namaGambar']);
			unlink('./assets/uploads/small/' . $dg['namaGambar']);
			unlink('./assets/uploads/medium/' . $dg['namaGambar']);
			unlink('./assets/uploads/large/' . $dg['namaGambar']);
		}

		// menghapus foto asli dari table t_berita ketika menekan tombol hapus
		$data['detail'] =$this->model_berita->detail_berita('t_berita', $id)->row_array();
		// digunakan untuk menghapus foto asli
		unlink('./assets/uploads/' . $data['detail']['gambarBerita']);
		unlink('./assets/uploads/small/' . $data['detail']['gambarBerita']);
		unlink('./assets/uploads/medium/' . $data['detail']['gambarBerita']);
		unlink('./assets/uploads/large/' . $data['detail']['gambarBerita']);
		/*
		//digunakan untuk mengambil value dari thumbnail foto yang di upload
		$namaFile = $data['detail']['gambarBerita'];
		$nama = explode(".", $namaFile);
		$data['namaGambar'] = $nama[0]."_thumb.".$nama[1];
		// end thumb

		//digunakan untuk menghapus thumbnail
		unlink('./assets/uploads/thumbs/' . $data['namaGambar']);
		*/
		$this->model_gambar->hapus_gambar('t_gambar', $idBerita);
		$this->model_berita->hapus_berita('t_berita', $idBerita);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/tampilBerita');	
	}


	public function komentBerita($id){
		$idBerita = ['idBerita' => $id];	
		$data['title'] = "Data Komentar";
		$data['koment'] = $this->model_berita->koment_berita($id)->result_array();
		

		$this->view('admin/koment_berita', $data, FALSE);
	}

	public function deleteBeritaAll(){
		$idBerita = $_POST['idBerita']; // Ambil data idBerita yang dikirim oleh view.php melalui form submit
		if($idBerita == NULL){
			echo '<script>
					alert("Pilih terlebih dahulu tabel yang mau di hapus!");
				</script>'; 
			redirect("admin/tampilBerita");

		}else{
			$this->model_berita->delete($idBerita); // Panggil fungsi delete dari model
        
        	redirect('admin/tampilBerita');	
		}		
        	
	}

	public function lihatGambarBerita($id){
		$data['title'] = "Gambar Berita";
		$idBerita = ["idBerita" => $id];
		/*
		// menampilkan gambar sesuai dengan thumbs
		// ambil nama file sesuai idBerita
		$data['detail'] =$this->model_berita->detail_berita('t_berita', $id)->row_array();
		
		//digunakan untuk mengambil value dari thumbnail foto yang di upload
		$namaFile = $data['detail']['gambarBerita'];
		$nama = explode(".", $namaFile);
		$data['namaGambar'] = $nama[0]."_thumb.".$nama[1];
		// end thumb


		// detail gambar untuk tampil dari tabel t_gambar sesuai dengan idBerita
		$data['detailGambar'] =$this->model_berita->detail_gambar('t_gambar', $id)->result_array();

		$dataDetailGambar = $data['detailGambar'];

		// menambahkan variable $dataFile untuk penambahan pemanggilan data thumbs agar di masukkan ke dalam array
		$dataFile = [];

		// melakukan perulangn untuk mengambil nama gambar yang di upload untuk di tambahkan string _thumb, agar dapat menampilkan data dari file thumbs
		foreach ($dataDetailGambar as $d) {
			// mengambil nama gambar dari t_gambar sesuai idBerita
			$namaFileGambar = $d['namaGambar'];
			// selanjutnya melakukan manipulasi string sesuai dengan separator nya yaitu titik
			$nama = explode(".", $namaFileGambar);

			// lalu data yang udah di manipulasi tadi di masukkan ke dalam array $dataFile
			array_push($dataFile,
				$nama[0]."_thumb.".$nama[1]
			);

			// lalu hasil array tersebut di masukkan ke dalam variable data
			$data['gambarDetail'] = $dataFile;
			// end thumbs
		}
		*/

		//tampil gambar dari table t_berita
		$data['tampilGambar'] = $this->model_berita->tampil_gambar('t_berita', $idBerita)->row_array();

		// tampil gambar dari table t_gambar
		$data['gambar'] = $this->model_gambar->tampil_gambar('t_gambar', $idBerita)->result_array();

		$this->view('admin/tampil_gambar', $data, FALSE);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */