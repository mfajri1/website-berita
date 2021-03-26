<div class="alert alert-primary" role="alert">
	<i class="fas fa-fw fa-newspaper"></i> Tambah Data Kategori
</div>
<?= $this->session->flashdata('pesan'); ;?>
<form action="<?= base_url('kategori/editKategoriAksi/'. $editkategori['idKategoriBerita']) ;?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="namaKategoriBerita">Nama Kategori</label>
		<input type="text" name="idKategoriBerita" class="form-control" id="namaKategoriBerita" value="<?= $editkategori['idKategoriBerita'] ;?>" required autocomplete>
		<input type="text" name="namaKategoriBerita" class="form-control" id="namaKategoriBerita" value="<?= $editkategori['namaKategoriBerita'] ;?>" required autocomplete>
		<?= form_error('namaKategoriBerita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="searchBerita">Search Berita</label>
		<input type="text" name="searchBerita" class="form-control" id="searchBerita" value="<?= $editkategori['searchBerita'] ;?>" required autocomplete>
		<?= form_error('searchBerita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="status">Status Berita</label>
		<select class="form-control" name="status" id="status">
			<option value="">Pilih Menu</option>
			<option value="aktif" <?php if ($editkategori['status'] == 'aktif'): ?>
				selected
			<?php endif ?>>Aktif</option>
			<option value="tidak" <?php if ($editkategori['status'] == 'tidak'): ?>
				selected
			<?php endif ?>>NonAktif</option>
		</select>
	</div>
	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
	<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
</form>