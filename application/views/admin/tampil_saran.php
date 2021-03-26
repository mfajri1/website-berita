<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Table Saran</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Email User</th>
						<th>Isi Saran</th>
						<th>Nama Pengguna</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i= 1;?>
					<?php foreach ($tSaran as $ts) : ?>
						<tr>
							<td><?= $i++ ;?></td>
							<td><?= $ts['emailUser'] ;?></td>
							<td><?= $ts['saran'] ;?></td>
							<td>
								<?=
									$ts['idUser'] == 0 ? 'Kosong' : $ts['namaUser'];
								 ?>
							</td>
							<td>
								<a href="<?= base_url('admin/detailBerita/'.$ts['idSaran']) ;?>" data-toggle="modal" data-target="#infoSaran<?= $ts['idSaran'] ;?>"><i class="fas fa-fw fa-info text-success"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- modal Tampil detail Menu -->
<?php foreach ($tSaran as $ts): ?>
	<div class="modal fade" id="infoSaran<?= $ts['idSaran'] ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Saran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Email User</th>
								<th>Isi Saran</th>
								<th>Nama Pengguna</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$idSaran2 = $ts['idSaran'];							
							$query = "SELECT *, `t_login`.`namaUser`
									  FROM `t_saran`
									  INNER JOIN `t_login`
									  ON `t_login`.`idUser` = `t_saran`.`idUser` 
									  WHERE `t_saran`.`idSaran` = $idSaran2 
									  ";
							$detailSaran = $this->db->query($query)->row_array();
							?>
							<tr>
								<td><?= $detailSaran['emailUser'] ;?></td>
								<td><?= $detailSaran['saran'] ;?></td>
								<td>
									<?=
									$ts['idUser'] == 0 ? 'Kosong' : $detailSaran['namaUser'];
								 ?>		
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>