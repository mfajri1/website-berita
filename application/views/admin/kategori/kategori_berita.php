<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Kategori Berita</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<a href="<?= base_url('kategori/tambahKategori') ;?>" class="btn btn-primary mb-3">Tambah Kategori Berita</a>
		<form action="<?= base_url('kategori/deleteKategori') ;?>" method="POST" id="form-delete">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th><input type="checkbox" id="check-semua"></th>
							<th>ID</th>
							<th>Nama Kategori</th>
							<th>Search Berita</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i= 1;?>
						<?php foreach ($tkategori as $t) : ?>
							<tr>
								<td><input type="checkbox" class="check-item" name="idKategoriBerita[]" value="<?= $t['idKategoriBerita'] ;?>"></td>
								<td><?= $i++ ;?></td>
								<td><?= $t['namaKategoriBerita'] ;?></td>
								<td><?= $t['searchBerita'] ;?></td>
								<td><?= $t['status'] ;?></td>
								<td><a href="<?= base_url('kategori/editKategori/'.$t['idKategoriBerita']) ;?>"><i class="fas fa-fw fa-edit text-primary"></i></a><a href="#" data-toggle="modal" data-target="#hapusKategori"><i class="fas fa-fw fa-trash-alt text-danger"></i></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<button type="submit" id="del" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
</div>