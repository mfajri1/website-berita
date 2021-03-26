<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
	</div>
	<?= $this->session->flashdata('pesan') ;?>
	<div class="card-body">
		<a href="<?= base_url('managementMenu/tambahMenu') ;?>" class="btn btn-primary mb-3">Tambah Menu</a>
		<form action="<?= base_url('managementMenu/hapusMenuAll') ;?>" method="POST" id="form-delete">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th><input type="checkbox" id="check-semua"></th>
							<th>No</th>
							<th>Nama Menu</th>
							<th>Jumlah SubMenu</th>
							<th>Edit Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1 ?>
						<?php foreach ($viewMenu as $vm): ?>
							<tr>
								<td><input type="checkbox" class="check-item" name="idMenu[]" value="<?= $vm['idMenu'] ;?>"></td>
								<td><?= $i++ ;?></td>
								<td><?= $vm['namaMenu'] ;?></td>
								<td><?= $vm['totalMenu'] . ' Menu' ;?></td>
								<td class="text-center"><div class="custom-control custom-switch">
									<input type="checkbox" name="statusMenu" value="<?= $vm['statusMenu'] ;?>" class="custom-control-input checkStatusMenu" id="<?= $vm['idMenu'] ;?>" <?= $vm['statusMenu'] == 'aktif' ? 'checked' : '' ;?> <?= $vm['namaMenu'] == 'Management Menu' ? 'disabled' : '' ;?>>
									<label class="custom-control-label" for="<?= $vm['idMenu'] ;?>"><?= $vm['statusMenu'] ;?></label>
								</div></td>
								<td>
									<a href="" class="infoData" data-toggle="modal" data-target="#modalAddSubmenu"><i class="fas fa-fw fa-plus-circle text-success" data-toggle="tooltip" data-placement="top" title="Tambah Submenu"></i></a>
									<a href="" class="infoData" data-toggle="modal" data-target="#modalTampilMenu<?= $vm['idMenu'] ;?>"><i class="fas fa-fw fa-info-circle text-warning" data-toggle="tooltip" data-placement="top" title="Tampil Detail Menu"></i></a>
									<a href="<?= base_url('managementMenu/editMenu/'.$vm['idMenu']) ;?>"><i class="fas fa-fw fa-edit text-primary <?= $vm['namaMenu'] == 'Management Menu' ? 'd-none' : '' ;?>" data-toggle="tooltip" data-placement="top" title="Edit Menu"></i></a>
									<a href="<?= base_url('managementMenu/hapusMenu/'.$vm['idMenu']) ;?>"><i class="fas fa-fw fa-trash-alt text-danger <?= $vm['namaMenu'] == 'Management Menu' ? 'd-none' : '' ;?>" data-toggle="tooltip" data-placement="top" title="Hapus Menu"></i></a>
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


<!-- tambah Data Submenu -->
<div class="modal fade" id="modalAddSubmenu" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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