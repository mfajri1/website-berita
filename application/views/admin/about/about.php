<a href="<?= base_url('admin/tampilBerita') ;?>" class="btn btn-success mb-4">Kembali</a>
<div class="card shadow mb-4">
	<!-- Card Header - Accordion -->
	<a href="#dataTabelBerita" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="dataTabelBerita">
		<h6 class="m-0 font-weight-bold text-primary">Detail Data Berita</h6>
	</a>
	<!-- Card Content - Collapse -->
	<div class="collapse show" id="dataTabelBerita">
		<div class="card-body">
			<table class="table table-hover table-active table-dark text-white">
				<tbody>
					<tr>
						<td>Foto About</td>
						<td>:</td>
						<td><img src="<?= base_url('assets/uploads/large/') . $tAbout['fotoAbout'] ;?>" alt="error" width="100px"></td>
					</tr>
					<tr>
						<td>Judul About</td>
						<td>:</td>
						<td><?= $tAbout['judulAbout'] ;?></td>
					</tr>
					<tr>
						<td>Isi About</td>
						<td>:</td>
						<td><?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiAbout'])) ;?></td>
					</tr>
					<tr>
						<td>Judul Visi</td>
						<td>:</td>
						<td><?= $tAbout['judulVisi'] ;?></td>
					</tr>
					<tr>
						<td>Isi Visi</td>
						<td>:</td>
						<td><?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiVisi'])) ;?></td>
					</tr>
					<tr>
						<td>Judul Misi</td>
						<td>:</td>
						<td><?= $tAbout['judulMisi'] ;?></td>
					</tr>
					<tr>
						<td>Isi Misi</td>
						<td>:</td>
						<td><?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiMisi'])) ;?></td>
					</tr>
					<tr>
						<td>Judul Tujuan</td>
						<td>:</td>
						<td><?= $tAbout['judulTujuan'] ;?></td>
					</tr>
					<tr>
						<td>Isi Tujuan</td>
						<td>:</td>
						<td><?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiTujuan'])) ;?></td>
					</tr>
					<tr>
						<td>Tanggal Post</td>
						<td>:</td>
						<td><?= date('d-M-Y, H:i:s', $tAbout['tanggalPost']);?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="float-right"><a href="<?= base_url('about/editData/') . $tAbout['idAbout'] ?>" class="btn btn-success">Edit Data</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>