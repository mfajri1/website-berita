<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Profile Pengguna</h6>
		<?= $error['error'] ;?>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 mb-1">
				<img src="<?= base_url('assets/uploads/medium/users/') . $dataUser['fotoUser'] ;?>" class="rounded-circle mx-auto d-block" width="100" height="100" alt="error">
			</div>
			<div class="col-sm-12 mt-1">
				<h2 class="h4 font-weight-bold text-capitalize text-center"><?= $dataUser['namaUser'] ;?></h2>
			</div>
			<div class="col-sm-12 text-center">
				<a href="" class="text-primary" data-toggle="modal" data-target="#modalUpload">Edit Foto</a>
			</div>
			<form action="" class="form col-sm-12" id="formEdit" method="post" enctype="multipart/form-data">
				<div class="card col-sm-12 bg-gray-600 mt-3">
					<div class="card-header py-3 bg-gray-600 d-flex justify-content-between">
						<h6 class="m-0 font-weight-bold text-white">Data Profile</h6>
						<div class="editDataSemua text-white">
							<span>Edit</span>
							<i class="fa fa-1x fa-fw fa-edit ml-1 my-auto editData"></i>
						</div>
					</div>
					<div class="card-body text-white">
						<fieldset class="field" disabled='true'>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="mb-0 font-weight-bold" for="namaUser">Nama Pengguna :</label>
										<div class="d-flex justify-content-between">
											<input type="text" name="namaUser" id="namaUser" class="form-control form-control-sm rounded-pill" value="<?= ucfirst($dataUser['namaUser']) ;?>">
											<?= form_error('namaUser', '<div class="text-danger small ml-3">','</div>') ;?>
											<!-- <i class="fa fa-1x fa-fw fa-edit text-info ml-1 my-auto editData1"></i> -->
										</div>
									</div>
									<div class="form-group">
										<label class="mb-0 font-weight-bold" for="username">Username :</label>
										<div class="d-flex justify-content-between">
											<input type="hidden" name="idUser" id="idUser" class="form-control form-control-sm rounded-pill" value="<?= $dataUser['idUser'] ;?>">
											<input type="text" name="username" id="username" class="form-control form-control-sm rounded-pill" value="<?= ucfirst($dataUser['username']) ;?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="mb-0 font-weight-bold" for="emailUser">Email Pengguna :</label>
										<div class="d-flex justify-content-between">
											<input type="email" name="emailUser" id="emailUser" class="form-control form-control-sm rounded-pill inputData" value="<?= $dataUser['emailUser'] ;?>" readonly>								
										</div>
									</div>
									<div class="form-group">
										<label class="mb-0 font-weight-bold" for="tanggalDaftar">Tanggal Daftar :</label>
										<div class="d-flex justify-content-between">
											<input type="text" id="tanggalDaftar" class="form-control form-control-sm rounded-pill inputData" value="<?= date('d-m-Y', $dataUser['tanggalDaftar']) ;?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="mb-0 font-weight-bold" for="jenisKelamin">Jenis Kelamin :</label>
										<div class="d-flex justify-content-between">
											<select class="form-control form-control-sm rounded-pill" name="jenisKelamin" id="jenisKelamin">
												<option>Pilih Jenis Kelamin</option>
												<option value="pria" <?= $dataUser['jenisKelamin'] == 'pria' ? 'selected' : 'Pilih Jenis Kelamin!' ?>>Pria</option>
												<option value="wanita" <?= $dataUser['jenisKelamin'] == 'wanita' ? 'selected ' : '' ?>>Wanita</option>
											</select>
											<?= form_error('jenisKelamin', '<div class="text-danger small ml-3">','</div>') ;?>
											<!-- <i class="fa fa-1x fa-fw fa-edit text-info ml-1 my-auto editData2"></i> -->
										</div>
									</div>
									<div class="form-group">
										<label class="mb-0 font-weight-bold" for="username">Nomor Telephone :</label>
										<div class="d-flex justify-content-between">
											<input type="text" name="noTelp" id="noTelp" class="form-control form-control-sm rounded-pill" value="<?= $dataUser['noTelp'];?>" placeholder="Masukkan No Telephone">
											<?= form_error('noTelp', '<div class="text-danger small ml-3">','</div>') ;?>
										</div>
									</div>
									<div class="form-group">
										<label class="mb-0 font-weight-bold" for="alamat">Alamat Pengguna :</label>
										<textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="Masukkan Alamat Anda"><?= $dataUser['alamat'] ;?></textarea>
										<?= form_error('alamat', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<button type="submit" name="simpan" class="btn btn-primary mt-2 d-none simpanData">Simpan</button>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

