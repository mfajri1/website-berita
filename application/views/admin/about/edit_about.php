<div class="alert alert-primary" role="alert">
	<i class="fas fa-fw fa-newspaper"></i> Edit Data About
</div>
<?= $this->session->flashdata('pesan'); ;?>
<form action="<?= base_url('about/editDataAksi/'. $editAbout['idAbout']) ;?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="judulAbout">Judul About</label>
		<input type="hidden" name="idAbout" class="form-control" value="<?= $editAbout['idAbout'] ;?>">
		<input type="text" name="judulAbout" class="form-control" id="judulAbout" placeholder="Judul About" value="<?= $editAbout['judulAbout'] ;?>" required autocomplete>
		<?= form_error('judulAbout', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="isiAbout">Isi About</label>
		<textarea name="isiAbout" id="editor" class="form-control" rows="10"><?= $editAbout['isiAbout'] ;?></textarea>
		<?= form_error('isiAbout', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<!-- <div class="form-group">
		<label for="judulVisi">Judul Visi</label>
		<input type="text" name="judulVisi" class="form-control" id="judulVisi" placeholder="Judul Visi" value="<?= $editAbout['judulVisi'] ;?>" required autocomplete>
		<?= form_error('judulVisi', '<div class="text-danger small ml-3">','</div>') ;?>
	</div> -->
	<div class="form-group">
		<label for="isiVisi">Isi Visi</label>
		<textarea name="isiVisi" id="editor2" class="form-control" rows="10"><?= $editAbout['isiVisi'] ;?></textarea>
		<?= form_error('isiVisi', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<!-- <div class="form-group">
		<label for="judulMisi">Judul Misi</label>
		<input type="text" name="judulMisi" class="form-control" id="judulMisi" placeholder="Judul Misi" value="<?= $editAbout['judulMisi'] ;?>" required autocomplete>
		<?= form_error('judulMisi', '<div class="text-danger small ml-3">','</div>') ;?>
	</div> -->
	<div class="form-group">
		<label for="isiMisi">Isi Misi</label>
		<textarea name="isiMisi" id="editor3" class="form-control" rows="10"><?= $editAbout['isiMisi'] ;?></textarea>
		<?= form_error('isiMisi', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<!-- <div class="form-group">
		<label for="judulTujuan">Judul Tujuan</label>
		<input type="text" name="judulTujuan" class="form-control" id="judulTujuan" placeholder="Judul Tujuan" value="<?= $editAbout['judulTujuan'] ;?>" required autocomplete>
		<?= form_error('judulTujuan', '<div class="text-danger small ml-3">','</div>') ;?>
	</div> -->
	<div class="form-group">
		<label for="isiTujuan">Isi Tujuan</label>
		<textarea name="isiTujuan" id="editor4" class="form-control" rows="10"><?= $editAbout['isiTujuan'] ;?></textarea>
		<?= form_error('isiTujuan', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<label for="fotoAbout">Foto About </label>
		<div class="custom-file">
			<input type="file" name="fotoAbout" class="custom-file-input" id="fotoAbout">
			<label class="custom-file-label" for="fotoAbout">Pilih Foto About</label>
		</div>
	</div>
	
	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
	<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
</form>