<div class="alert alert-primary" role="alert">
	<i class="fas fa-fw fa-newspaper"></i> Edit Data Konfigurasi
</div>
<?= $this->session->flashdata('pesan'); ;?>
<form action="<?= base_url('konfigurasi/editKonfigAksi/') . $tKonfig['id_konfigurasi'] ;?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="namaWeb">Nama Web</label>
		<!-- <input type="hidden" name="id_konfigurasi" class="form-control form-control-sm" id="id_konfigurasi" value="<?= $tKonfig['id_konfigurasi'] ;?>" required autocomplete> -->
		<input type="text" name="namaWeb" class="form-control form-control-sm" id="namaWeb" value="<?= $tKonfig['namaWeb'] ;?>" required autocomplete>
		<?= form_error('namaWeb', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="metaText">Meta Text</label>
		<input type="text" name="metaText" class="form-control form-control-sm" id="metaText" value="<?= $tKonfig['metaText'] ;?>" required autocomplete>
		<?= form_error('metaText', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="keyword">Keywords</label>
		<input type="text" name="keyword" class="form-control form-control-sm" id="keyword" value="<?= $tKonfig['keyword'] ;?>" required autocomplete>
		<?= form_error('keyword', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<input type="text" name="description" class="form-control form-control-sm" id="description" value="<?= $tKonfig['description'] ;?>" required autocomplete>
		<?= form_error('description', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="instagram">Instagram</label>
		<input type="text" name="instagram" class="form-control form-control-sm" id="instagram" value="<?= $tKonfig['instagram'] ;?>" required autocomplete>
		<?= form_error('instagram', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="facebook">Facebook</label>
		<input type="text" name="facebook" class="form-control form-control-sm" id="facebook" value="<?= $tKonfig['facebook'] ;?>" required autocomplete>
		<?= form_error('facebook', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="twiter">Twitter</label>
		<input type="text" name="twiter" class="form-control form-control-sm" id="twiter" value="<?= $tKonfig['twiter'] ;?>" required autocomplete>
		<?= form_error('twiter', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="blog">Blog</label>
		<input type="text" name="blog" class="form-control form-control-sm" id="blog" value="<?= $tKonfig['blog'] ;?>" required autocomplete>
		<?= form_error('blog', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="noHp">Nomor Handphone</label>
		<input type="text" name="noHp" class="form-control form-control-sm" id="noHp" value="<?= $tKonfig['noHp'] ;?>" required autocomplete>
		<?= form_error('noHp', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<textarea name="alamat" id="alamat" class="form-control form-control-sm"  required autocomplete><?= $tKonfig['alamat'] ?></textarea>
	</div>
	<div class="form-group">
		<label for="sumber">Sumber Web</label>
		<input type="text" name="sumber" class="form-control form-control-sm" id="sumber" value="<?= $tKonfig['sumber'] ;?>" required autocomplete>
		<?= form_error('sumber', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="imgLogo">Gambar Logo</label>
		<div class="custom-file">
			<input type="file" name="imgLogo" class="custom-file-input" id="imgLogo">
			<label class="custom-file-label" for="imgLogo">Pilih Gambar Logo</label>
		</div>
	</div>
	<div class="form-group">
		<label for="imgIcon">Gambar Icon</label>
		<div class="custom-file">
			<input type="file" name="imgIcon" class="custom-file-input" id="imgIcon">
			<label class="custom-file-label" for="imgIcon">Pilih Gambar Icon</label>
		</div>
	</div>
	<div class="form-group">
		<label for="imgJumbo">Gambar Jumbotron</label>
		<div class="custom-file">
			<input type="file" name="imgJumbo" class="custom-file-input" id="imgJumbo">
			<label class="custom-file-label" for="imgJumbo">Pilih Gambar Jumbotron </label>
		</div>
	</div>
	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
	<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
</form>