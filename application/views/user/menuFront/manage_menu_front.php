<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Menu Frontend</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<a href="<?= base_url('user/manageMenuFront/tambahMenu') ;?>" class="btn btn-primary mb-3">Tambah Menu</a>
		<form action="<?= base_url('user/manageMenuFront/hapusMenuAll') ;?>" method="POST" id="form-delete">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th><input type="checkbox" id="check-semua"></th>
							<th>No</th>
							<th>Url Menu</th>
							<th>Nama Menu</th>
							<th>Status Menu</th>
							<th>No Urut</th>
							<th>Member Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1 ?>
						<?php foreach ($menuFront as $mf): ?>
							<tr>
								<td><input type="checkbox" class="check-item" name="idMenuFront[]" value="<?= $mf['idMenuFront'] ;?>"></td>
								<td><?= $i++ ;?></td>
								<td><?= $mf['urlMenuFront'] ;?></td>
								<td><?= $mf['namaMenuFront'] ;?></td>
								<td><?= $mf['noUrutFront'] ;?></td>
								<td><?= $mf['memberLevel'] ;?></td>
								<td class="text-center">
									<div class="custom-control custom-switch">
										<input type="checkbox" name="statusMenuFront" value="<?= $mf['statusMenuFront'] ;?>" class="custom-control-input checkStatusMenuFront" id="<?= $mf['idMenuFront'] ;?>" <?= $mf['statusMenuFront'] == 'aktif' ? 'checked' : '' ;?>>
										<label class="custom-control-label" for="<?= $mf['idMenuFront'] ;?>"><?= $mf['statusMenuFront'] ;?></label>
									</div>
								</td>
								<td>
									<a href="<?= base_url('user/manageMenuFront/editMenuFront/'.$mf['idMenuFront']) ;?>"><i class="fas fa-fw fa-edit text-primary" data-toggle="tooltip" data-placement="top" title="Edit Menu Front"></i></a>
									<a href="<?= base_url('user/manageMenuFront/hapusMenuFront/'.$mf['idMenuFront']) ;?>"><i class="fas fa-fw fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" title="Hapus Menu"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<button type="submit" id="del" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
</div>
