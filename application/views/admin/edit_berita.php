<div class="alert alert-primary" role="alert">
	<i class="fas fa-fw fa-newspaper"></i> Tambah Data Berita
</div>
<?= $this->session->flashdata('pesan'); ;?>
<form action="<?= base_url('admin/editAksi/'. $edit['idBerita']) ;?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="judulBerita">Judul Berita</label>
		<input type="hidden" name="idBerita" class="form-control" value="<?= $edit['idBerita'] ;?>">
		<input type="text" name="judulBerita" class="form-control" id="judulBerita" placeholder="Judul Berita" value="<?= $edit['judulBerita'] ;?>" required autocomplete>
		<?= form_error('judulBerita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="namaPengarang">Nama Pengarang</label>
		<input type="text" name="namaPengarang" class="form-control" id="namaPengarang" placeholder="Nama Pengarang" value="<?= $edit['namaPengarang'] ;?>" required autocomplete>
		<?= form_error('namaPengarang', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<!-- <div class="form-group">
		<label for="headlineBerita">Headline Berita</label>
		<input type="text" name="headlineBerita" class="form-control" id="headlineBerita" placeholder="Headline Berita" value="<?= $edit['headlineBerita'] ;?>" required autocomplete>
		<?= form_error('headlineBerita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div> -->
	<div class="form-group">
		<label for="kategoriBerita">Kategori Berita</label>
		<select class="form-control" name="idKategori" id="kategoriBerita">
			<?php foreach ($tKategori as $tk): ?>
				<option value="<?= $tk['idKategoriBerita'] ;?>" <?php if($edit['idKategori'] == $tk['idKategoriBerita']):?>
					selected
				<?php endif; ?> ><?= $tk['namaKategoriBerita'] ;?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label for="isiBerita">Description Berita</label>
		<textarea name="isiBerita" id="editor" class="form-control" rows="10"><?= $edit['isiBerita'] ;?></textarea>
		<?= form_error('isiBerita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="gambar">Gambar Berita</label>
		<div class="custom-file">
			<input type="file" name="gambarBerita" class="custom-file-input" id="gambar">
			<label class="custom-file-label" for="gambar">Pilih gambar</label>
		</div>
	</div>
	<div class="form-group">
		<label for="ratingBerita">Rating Berita</label>
		<input type="text" name="ratingBerita" class="form-control" id="ratingBerita" placeholder="Rating Berita" value="<?= $edit['ratingBerita'] ;?>"  autocomplete>
		<?= form_error('ratingBerita', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
	<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
</form>