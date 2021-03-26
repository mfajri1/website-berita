<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_berita extends CI_Model {

	public function tampil_data($table){
		$this->db->select('
			t_berita.*,
			t_kategori_berita.*,
			COUNT(t_komentar.idKomentar) AS totalKomentar
		');
		$this->db->from($table);
		$this->db->join('t_kategori_berita', 't_kategori_berita.idKategoriBerita = t_berita.idKategori', 'left');
		$this->db->join('t_komentar', 't_komentar.idBerita = t_berita.idBerita', 'left');
		$this->db->group_by('t_berita.idBerita');
		return $this->db->get();

	}

	public function total_data($table){
		$this->db->select('*');
		return $this->db->get($table);	
	}

	public function total_data_berita_kategori($table, $id){
		$this->db->select('*');
		$this->db->where('idKategori', $id);
		return $this->db->get($table);	
	}

	public function tampil_data_berita($table, $limit, $start){
		$this->db->select('
			t_berita.*,
			t_kategori_berita.*,
			COUNT(t_komentar.idKomentar) AS totalKomentar
		');
		$this->db->from('t_berita');
		$this->db->join('t_kategori_berita', 't_kategori_berita.idKategoriBerita = t_berita.idKategori', 'left');
		$this->db->join('t_komentar', 't_komentar.idBerita = t_berita.idBerita', 'left');
		$this->db->group_by('t_berita.idBerita');
		$this->db->order_by('t_berita.idBerita', 'asc');
		$this->db->limit($limit, $start);
		return $this->db->get();	
	}

	public function tampil_data_berita_kategori($limit, $start, $id){
		$this->db->select('
			t_berita.*,
			t_kategori_berita.*,
			COUNT(t_komentar.idKomentar) AS totalKomentar
		');
		$this->db->from('t_berita');
		$this->db->join('t_kategori_berita', 't_kategori_berita.idKategoriBerita = t_berita.idKategori', 'left');
		$this->db->join('t_komentar', 't_komentar.idBerita = t_berita.idBerita', 'left');
		$this->db->where('t_berita.idKategori', $id);
		$this->db->group_by('t_berita.idBerita');
		$this->db->order_by('t_berita.idBerita', 'asc');
		$this->db->limit($limit, $start);
		return $this->db->get();	
	}

	public function post_berita($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('tanggalPost', 'desc');
		$this->db->limit(5);
		return $this->db->get();	
	}

	public function tambah_berita($table, $data){
		$this->db->insert($table, $data);	
	}

	public function detail($table, $id){
		$this->db->where($id);
		$this->db->from($table);
		return $this->db->get();	
	}

	public function detail_berita($table, $id){
		$this->db->select('
			t_berita.*,
			t_kategori_berita.*,
			t_komentar.*,
			COUNT(t_komentar.idKomentar) AS totalKomentar
		');
		$this->db->from($table);
		$this->db->join('t_kategori_berita', 't_kategori_berita.idKategoriBerita = t_berita.idKategori', 'left');
		$this->db->join('t_komentar', 't_komentar.idBerita = t_berita.idBerita', 'left');
		$this->db->where('t_berita.idBerita', $id);
		$this->db->group_by('t_berita.idBerita');
		return $this->db->get();;	
	}

	public function edit_berita($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();
	}

	public function edit_berita_aksi($table, $data, $id){
		$this->db->set($data);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();	
	}

	public function hapus_berita($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function koment_berita($id){
		$this->db->select('
				t_komentar.*,
				t_berita.judulBerita
			');
		$this->db->from('t_komentar');
		$this->db->join('t_berita', 't_komentar.idBerita = t_berita.idBerita', 'left');
		$this->db->where('t_berita.idBerita',$id);
		$this->db->group_by('t_komentar.idKomentar');
		return $this->db->get();	
	}

	public function delete($id){
		$this->db->where_in('idBerita', $id);
    	$this->db->delete('t_berita');	
	}

	public function tampil_gambar($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();	
	}


	public function detail_gambar($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('idBerita', $id);
		return $this->db->get();;	
	}

	public function detail_gambar_hapus($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where_in('idGambar', $id);
		return $this->db->get();	
	}

	public function hapus_gambar_all($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();	
	}
}

/* End of file model_berita.php */
/* Location: ./application/models/model_berita.php */