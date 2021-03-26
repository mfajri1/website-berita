<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Table Berita</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<a href="<?= base_url('admin/tambahBerita') ;?>" class="btn btn-primary mb-3">Tambah Data Berita</a>
		<form action="<?= base_url('admin/deleteBeritaAll') ;?>" method="POST" id="form-delete">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td><input type="checkbox" id="check-semua"></td>
							<th>ID</th>
							<th>Nama Pengarang</th>
							<th>Judul Berita</th>
							<th>Kategori</th>
							<!-- <th>Tanggal Post</th> -->
							<th>Rating</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i= 1;?>
						<?php foreach ($tampil as $t) : ?>
							<tr>
								<td><input type="checkbox" class="check-item" name="idBerita[]" value="<?= $t['idBerita'] ;?>"></td>
								<td><?= $i++ ;?></td>
								<td><?= $t['namaPengarang'] ;?></td>
								<td><?= $t['judulBerita'] ;?></td>
								<td><?= $t['namaKategoriBerita'] ;?></td>
								<!-- <td><?= date('d-M-Y, H:i:s', $t['tanggalPost']) ;?></td> -->
								<td><?= $t['ratingBerita'] ;?></td>
								<td><a href="<?= base_url('admin/detailBerita/'.$t['idBerita']) ;?>"><i class="fas fa-fw fa-info text-success"></i></a><a href="<?= base_url('admin/editBerita/'.$t['idBerita']) ;?>"><i class="fas fa-fw fa-edit text-primary"></i></a><a href="#" data-toggle="modal" data-target="#hapusBerita"><i class="fas fa-fw fa-trash-alt text-danger"></i></a><a href="<?= base_url('admin/komentBerita/'.$t['idBerita']) ;?>"><i class="fas fa-fw fa-comments text-warning"></i></a><a href="<?= base_url('admin/lihatGambarBerita/'.$t['idBerita']) ;?>"><i class="fas fa-fw fa-images text-info"></i></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<button type="submit" id="del" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
</div>