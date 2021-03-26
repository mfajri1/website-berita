<a href="<?= base_url('konfigurasi/tampil_konfigurasi') ;?>" class="btn btn-success mb-4">Kembali</a>
<div class="card shadow mb-4">
	<!-- Card Header - Accordion -->
	<a href="#dataTabelBerita" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="dataTabelBerita">
		<h6 class="m-0 font-weight-bold text-primary">Detail Data Konfigurasi</h6>
	</a>
	<!-- Card Content - Collapse -->
	<div class="collapse show" id="dataTabelBerita">
		<div class="card-body">
			<table class="table table-hover table-active table-dark text-white">
				<tbody>
					<tr>
						<td>Nama Web</td>
						<td>:</td>
						<td><?= $tKonfig['namaWeb'] ;?></td>
					</tr>
					<tr>
						<td>Gambar Logo</td>
						<td>:</td>
						<td><img src="<?= base_url('assets/uploads/konfig/') . $tKonfig['imgLogo'] ;?>" alt="" width="100"></td>
					</tr>
					<tr>
						<td>Gambar Icon</td>
						<td>:</td>
						<td><img src="<?= base_url('assets/uploads/konfig/') . $tKonfig['imgIcon'] ;?>" alt="" width="50"></td>
					</tr>
					<tr>
						<td>Gambar Jumbotron</td>
						<td>:</td>
						<td><img src="<?= base_url('assets/uploads/konfig/') . $tKonfig['imgJumbo'] ;?>" alt="" width="100"></td>
					</tr>
					<tr>
						<td>Meta Text</td>
						<td>:</td>
						<td><?= $tKonfig['metaText'] ;?></td>
					</tr>
					<tr>
						<td>Keywords</td>
						<td>:</td>
						<td><?= $tKonfig['keyword'];?></td>
					</tr>
					<tr>
						<td>Description</td>
						<td>:</td>
						<td><?= $tKonfig['description'];?></td>
					</tr>
					<tr>
						<td>Instagram</td>
						<td>:</td>
						<td><?= $tKonfig['instagram'] ;?></td>
					</tr>
					<tr>
						<td>Facebook</td>
						<td>:</td>
						<td><?= $tKonfig['facebook'] ;?></td>
					</tr>
					<tr>
						<td>No Handphone</td>
						<td>:</td>
						<td><?= $tKonfig['noHp'] ;?></td>
					</tr>
					<tr>
						<td>Blog Pribadi</td>
						<td>:</td>
						<td><?= $tKonfig['blog'] ;?></td>
					</tr>
					<tr>
						<td>Twitter</td>
						<td>:</td>
						<td><?= $tKonfig['twiter'] ;?></td>
					</tr>
					<tr>
						<td>Alamat Blog</td>
						<td>:</td>
						<td><?= $tKonfig['alamat'] ;?></td>
					</tr>
					<tr>
						<td>Sumber Web</td>
						<td>:</td>
						<td><?= $tKonfig['sumber'] ;?></td>
					</tr>
					<tr>
						<td>Nama User Edit</td>
						<td>:</td>
						<td><?= $tKonfig['namaUser'] ;?></td>
					</tr>
					<tr>
						<td>Tanggal Update</td>
						<td>:</td>
						<td><?= date('H:i:s / d-m-y', $tKonfig['tglUpdate']) ;?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>