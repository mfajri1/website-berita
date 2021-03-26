<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Table Berita</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<form action="<?= base_url('komentar/deleteKomentar') ;?>" method="POST">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td><input type="checkbox" id="check-semua"></td>
							<th>ID</th>
							<th>Judul Komentar</th>
							<th>Tanggal Post</th>
							<th>Tanggal Update</th>
							<th>ID User</th>
							<th>ID Berita</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($koment as $t): ?>
							<tr>
								<td><input type="checkbox" class="check-item" name="idKomentar[]" value="<?= $t['idKomentar'] ;?>"></td>
								<td><?= $i++ ;?></td>
								<td><?= $t['judulKomentar'] ;?></td>
								<td><?= date('d-M-Y, H:i:s', $t['tanggalPost']) ;?></td>
								<td><?= date('d-M-Y, H:i:s', $t['tanggalUpdate']) ;?></td>
								<td><?= $t['idUser'] ;?></td>
								<td><?= $t['idBerita'] ;?></td>
								<td><a href="<?= base_url('komentar/detailKoment/'.$t['idKomentar']) ;?>"><i class="fas fa-fw fa-info text-success"></i></a><a href="#" data-toggle="modal" data-target="#hapusKoment"><i class="fas fa-fw fa-trash-alt text-danger"></i></a></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<button type="submit" id="del" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
</div>