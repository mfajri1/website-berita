<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Konfigurasi Halaman</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Web</th>
						<th>Meta Text</th>
						<th>Description</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i= 1;?>
					<tr>
						<td><?= $i++ ;?></td>
						<td><?= $tKonfig['namaWeb'] ;?></td>
						<td><?= $tKonfig['metaText'] ;?></td>
						<td><?= $tKonfig['description'] ;?></td>
						<td>
							<a href="<?= base_url('konfigurasi/lihatKonfig/') ;?>"><i class="fas fa-fw fa-info-circle text-warning"></i></a>
							<a href="<?= base_url('konfigurasi/editKonfig/') ;?>"><i class="fas fa-fw fa-edit text-primary"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>