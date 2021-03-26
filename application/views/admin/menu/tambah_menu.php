<div class="alert alert-primary" role="alert">
  <i class="fas fa-fw fa-newspaper"></i> Tambah Data Kategori
</div>
<?= $this->session->flashdata('pesan'); ;?>

<form action="<?= base_url('managementMenu/tambahMenuAksi') ;?>" method="POST" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="form-group">
      <label for="namaMenu">Nama Menu</label>
      <input type="text" name="namaMenu" class="form-control form-control-sm" id="namaMenu">
      <?= form_error('namaMenu', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="targetDropdown">Target Dropdown</label>
      <input type="text" name="targetDropdown" class="form-control form-control-sm" id="targetDropdown">
      <?= form_error('targetDropdown', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="nameHeadSubMenu">Nama Head Submenu</label>
      <input type="text" name="nameHeadSubMenu" class="form-control form-control-sm" id="nameHeadSubMenu">
      <?= form_error('nameHeadSubMenu', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="iconMenu">Icon Menu</label>
      <input type="text" name="iconMenu" class="form-control form-control-sm" id="iconMenu">
      <?= form_error('iconMenu', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="statusMenu">Status Menu</label>
      <select class="form-control form-control-sm" name="statusMenu" id="statusMenu">
        <option>------Pilih Menu-------</option>
        <option value="aktif">Aktif</option>
        <option value="nonaktif">Nonaktif</option>
        <?= form_error('targetDropdown', '<div class="text-danger small ml-3">','</div>') ;?>
      </select>
    </div>
    <div class="form-group">
      <label for="memberLevel">Level Member</label>
      <select class="form-control form-control-sm" name="memberLevel" id="memberLevel">
        <option>------Pilih Member-------</option>
        <?php foreach ($vMember as $vm): ?>
          <option value="<?= $vm['levelUser'] ;?>"><?= ucfirst($vm['levelUser']) ;?></option>
          <?= form_error('memberLevel', '<div class="text-danger small ml-3">','</div>') ;?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="noUrut">No Urut Menu</label>
      <input type="text" name="noUrut" class="form-control form-control-sm" id="noUrut">
      <?= form_error('noUrut', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <button type="reset" name="reset" class="btn btn-danger tombol">Reset</button>
    <button type="submit" name="simpan" class="btn btn-primary tombol">Submit</button>
  </div>
</form>