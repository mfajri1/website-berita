<div class="card shadow">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Password</h6>
	</div>
	<div class="card-body">
		<form class="form" action="<?= base_url('pengguna/editPassPengguna/') . $this->session->userdata('idUser'); ;?>" method="POST" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="password">Password</label>
					<div class="input-group">
						<input type="password" name="password" class="form-control password" id="password">
						<div class="input-group-append">
							<i class="far fa-eye input-group-text text-success viewPass1"></i>
						</div>
					</div>
					<p class="text-danger text-sm txtPassword">Password Tidak Sama!</p>
				</div>
				<div class="form-group col-md-4">
					<label for="password2">Repeat Password</label>
					<div class="input-group">
						<input type="password" name="password2" class="form-control passwordRepeat" id="password2">
						<div class="input-group-append">
							<i class="far fa-eye input-group-text text-success viewPass2"></i>
						</div>
					</div>
				</div>
				<div class="form-group col-md-2">
					<label></label>
					<button type="submit" name="simpan" class="form-control btn btn-primary mt-2">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>