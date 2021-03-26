<div class="alert alert-primary" role="alert">
  <i class="fas fa-fw fa-newspaper"></i> Tambah Data Kategori
</div>
<?= $this->session->flashdata('pesan'); ;?>

<form action="<?= base_url('user/manageMenuFront/tambahMenuFrontAksi') ;?>" method="POST" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="form-group">
      <label for="urlMenuFront">Url Menu</label>
      <input type="text" name="urlMenuFront" class="form-control form-control-sm" id="urlMenuFront">
      <?= form_error('urlMenuFront', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="namaMenuFront">Nama Menu</label>
      <input type="text" name="namaMenuFront" class="form-control form-control-sm" id="namaMenuFront">
      <?= form_error('namaMenuFront', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="statusMenuFront">Status Menu</label>
      <select class="form-control form-control-sm" name="statusMenuFront" id="statusMenuFront">
        <option>------Pilih Status Menu-------</option>
        <option value="aktif">Aktif</option>
        <option value="nonaktif">Nonaktif</option>
        <?= form_error('statusMenuFront', '<div class="text-danger small ml-3">','</div>') ;?>
      </select>
    </div>
    <div class="form-group">
      <label for="memberLevel">Level Member</label>
      <select class="form-control form-control-sm" name="memberLevel" id="memberLevel">
        <option>------Pilih Level Member-------</option>
        <?php foreach ($viewMember as $vme): ?>
          <option value="<?= $vme['levelUser'] ;?>"><?= ucfirst($vme['levelUser']) ;?></option>
        <?php endforeach ?>
        <?= form_error('targetDropdown', '<div class="text-danger small ml-3">','</div>') ;?>
      </select>
    </div>
    <div class="form-group">
      <label for="noUrutFront">No Urut Menu</label>
      <input type="text" name="noUrutFront" class="form-control form-control-sm" id="noUrutFront">
      <?= form_error('noUrutFront', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    
    <button type="reset" name="reset" class="btn btn-danger tombol">Reset</button>
    <button type="submit" name="simpan" class="btn btn-primary tombol">Submit</button>
  </div>
</form>