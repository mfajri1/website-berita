<div class="alert alert-primary" role="alert">
	<i class="fas fa-fw fa-newspaper"></i> Tambah Data Kategori
</div>
<?= $this->session->flashdata('pesan'); ;?>
<div class="d-flex justify-content-end mb-3">
	<button class="btn btn-success btn-sm tambahLagi" >Tambah Kategori</button>
</div>
<form action="<?= base_url('kategori/tambahKategoriAksi') ;?>" method="POST" enctype="multipart/form-data">
	<div class="formTambah">
		<!-- <div class="d-flex justify-content-start">
			<div class="form-group flex-grow-1">
				<label for="namaKategoriBerita">Nama Kategori</label>
				<input type="text" name="namaKategoriBerita" class="form-control" id="namaKategoriBerita" placeholder="Nama Kategori" required autocomplete>
				<?= form_error('namaKategoriBerita', '<div class="text-danger small ml-3">','</div>') ;?>
			</div>
			<div class="form-group">
				<label for="status">Status Berita</label>
				<select class="form-control" name="status" id="status">
					<option value="aktif">Aktif</option>
					<option value="tidak">NonAktif</option>
				</select>
			</div>
		</div> -->
	</div>
	<button type="reset" name="reset" class="btn btn-danger tombol d-none">Reset</button>
	<button type="submit" name="simpan" class="btn btn-primary tombol d-none">Submit</button>
</form>

