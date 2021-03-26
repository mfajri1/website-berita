<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Table Gambar</h6>
	</div>
	<div class="tombolGambar">
		<button class="btn btn-primary my-3 mx-3 text-right" id="tambahGambarBerita">Tambah Gambar Berita</button>
	</div>
	<div class="gambar">
		<form action="<?= base_url('gambar/gambarAksi/') . $tampilGambar['idBerita'] ?>" method="POST" enctype="multipart/form-data" class="mb-2 baris">
			<div class="formGambar"></div>
			<button type="submit" class="btn btn-primary ml-3 d-none tombol">Simpan</button>
		</form>


		<!-- <form action="<?= base_url('gambar/gambarAksi/') . $tampilGambar['idBerita'] ?>" method="POST" enctype="multipart/form-data">
			<div class="formGambar"></div>
			<button type="submit" class="btn btn-primary tombol d-none">Simpan</button>
		</form> -->
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<form action="<?= base_url('gambar/deleteGambarAll/' . $tampilGambar['idBerita']) ;?>" method="POST" id="form-delete">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td><input type="checkbox" id="check-semua"></td>
							<th>ID</th>
							<th>Gambar</th>
							<th>Judul Gambar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i= 1;?>
						<?php $j = 0 ?>
						<tr>
							<td></td>
							<td><?= $i++ ;?></td>
							<td><img src="<?= base_url('assets/uploads/small/'). $tampilGambar['gambarBerita'] ;?>" alt="error"></td>
							<td><?= $tampilGambar['gambarBerita'] ;?></td>
						</tr>
						<?php foreach ($gambar as $g): ?>
							<tr class="looping">
								<td><input type="checkbox" class="check-item" name="idGambar[]" value="<?= $g['idGambar'] ;?>"></td>
								<td><?= $i++ ;?></td>
								<td><img src="<?= base_url('assets/uploads/small/'). $g['namaGambar'] ;?>" alt="error"></td>
								<td><?= $g['namaGambar'] ;?></td>
								<td><a href="<?= base_url('gambar/hapusGambar/') . $g['idGambar']. '/' . $tampilGambar['idBerita'] ;?>" id="del"><i class="fas fa-fw fa-trash-alt text-danger"></i></a></td>
							</tr>
							<?php $j++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
				<button type="submit" id="del" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
	<!-- <?= var_dump($tampilGambar['idBerita']) ;?> -->
</div>


