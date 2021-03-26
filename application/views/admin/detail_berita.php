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
						<td>Nama Pengarang</td>
						<td>:</td>
						<td><?= $detail['namaPengarang'] ;?></td>
					</tr>
					<tr>
						<td>Judul Berita</td>
						<td>:</td>
						<td><?= $detail['judulBerita'] ;?></td>
					</tr>
					<tr>
						<td>Headline Berita</td>
						<td>:</td>
						<td><?= $detail['headlineBerita'] ;?></td>
					</tr>
					<tr>
						<td>Kategori Berita</td>
						<td>:</td>
						<td><?= $detail['namaKategoriBerita'] ;?></td>
					</tr>
					<tr>
						<td>Isi Berita</td>
						<td>:</td>
						<td><?= $detail['isiBerita'] ;?></td>
					</tr>
					<tr>
						<td>Tanggal Post</td>
						<td>:</td>
						<td><?= date('d-M-Y, H:i:s', $detail['tanggalPost']);?></td>
					</tr>
					<tr>
						<td>Tanggal Update</td>
						<td>:</td>
						<td><?= date('d-M-Y, H:i:s', $detail['tanggalUpdate']);?></td>
					</tr>
					<tr>
						<td>Rating Berita</td>
						<td>:</td>
						<td><?= $detail['ratingBerita'] ;?></td>
					</tr>
					<tr>
						<td>Jumlah Komentar</td>
						<td>:</td>
						<td><?= $detail['totalKomentar'] ;?></td>
					</tr>
					<tr>
						<td>Id User</td>
						<td>:</td>
						<td><?= $detail['idUser'] ;?></td>
					</tr>

<!-- 
					<?php 
						// $namaFile = base_url('assets/uploads/thumbs/').$detail['gambarBerita'];
						// $nama = explode(".", $namaFile);
						// $namaGambar = $nama[0]."_thumb.".$nama[1];
						// var_dump($namaGambar);
					 ?> -->

					<tr>
						<td>Gambar</td>
						<td></td>
						<td><img src="<?= $namaGambar ;?>" alt="error" width="60">
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>