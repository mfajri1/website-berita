<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Submenu</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?> 
	<div class="card-body">
		<a href="" data-toggle="modal" data-target="#tambahSubmenu" class="btn btn-primary mb-3" data-whatever="@mdo">Tambah Submenu</a>
		<form action="<?= base_url('managementSubmenu/hapusSubmenuAll') ;?>" method="POST" id="form-delete">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th><input type="checkbox" id="check-semua"></th>
							<th>No</th>
							<th>Url Submenu</th>
							<th>Judul Submenu</th>
							<th>Menu Terhubung</th>
							<th>Status Submenu</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1 ?>
						<?php foreach ($viewSubmenu as $vs): ?>
							<tr>
								<td><input type="checkbox" class="check-item" name="idSubMenu[]" value="<?= $vs['idSubMenu'] ;?>"></td>
								<td><?= $i++ ;?></td>
								<td><?= $vs['urlSubMenu'] ;?></td>
								<td><?= $vs['judulSubMenu'] ;?></td>
								<td><?= $vs['namaMenu'] ;?></td>
								<td><div class="custom-control custom-switch">
									<input type="checkbox" name="statusSubmenu" value="<?= $vs['statusSubmenu'] ;?>" class="custom-control-input checkStatusSubmenu" id="<?= 'data' . $i ;?>" <?= $vs['statusSubmenu'] == 'aktif' ? 'checked' : '' ;?> data-subId="<?= $vs['idSubMenu'] ;?>">
									<label class="custom-control-label" for="<?= 'data' . $i ;?>"><?= $vs['statusSubmenu'] ;?></label>
								</div></td>
								<td>
									<a href="" data-toggle="modal" data-target="#modalEditSub<?= $vs['idSubMenu'] ;?>"><i class="fas fa-fw fa-edit text-primary" data-toggle="tooltip" data-placement="top" title="Edit Submenu"></i></a>
									<a href="<?= base_url('managementSubmenu/hapusSubmenu/'.$vs['idSubMenu']) ;?>"><i class="fas fa-fw fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" title="Hapus Menu"></i></a>
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


<!-- Modal Tambah Submenu -->
	
<div class="modal fade" id="tambahSubmenu" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Submenu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('managementSubmenu/tambahSubmenuAksi') ;?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="urlSubMenu">Url Submenu</label>
						<input type="text" name="urlSubMenu" class="form-control form-control-sm" id="urlSubMenu">
						<?= form_error('urlSubMenu', '<div class="text-danger small ml-3">','</div>') ;?>
					</div>
					<div class="form-group">
						<label for="judulSubMenu">Judul Submenu</label>
						<input type="text" name="judulSubMenu" class="form-control form-control-sm" id="judulSubMenu">
						<?= form_error('judulSubMenu', '<div class="text-danger small ml-3">','</div>') ;?>
					</div>
					<div class="form-group">
						<label for="memberLevel">Level Member</label>
						<select class="form-control form-control-sm" name="menuId" id="menuId">
							<option>------Pilih Menu-------</option>
							<?php foreach ($viewMenu as $vm): ?>
								<option value="<?= $vm['idMenu'] ;?>"><?= ucfirst($vm['namaMenu']) ;?></option>
								<?= form_error('menuId', '<div class="text-danger small ml-3">','</div>') ;?>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="statusMenu">Status Menu</label>
						<select class="form-control form-control-sm" name="statusSubmenu" id="statusMenu">
							<option>------Pilih Status Menu-------</option>
							<option value="aktif">Aktif</option>
							<option value="nonaktif">Nonaktif</option>
							<?= form_error('targetDropdown', '<div class="text-danger small ml-3">','</div>') ;?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="simpan" class="btn btn-primary tombol">Submit</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>