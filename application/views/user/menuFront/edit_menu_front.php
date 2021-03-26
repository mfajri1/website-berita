<div class="alert alert-primary" role="alert">
  <i class="fas fa-fw fa-newspaper"></i> Edit Data Menu
</div>
<?= $this->session->flashdata('pesan'); ;?>

<form action="<?= base_url('user/manageMenuFront/EditMenuFrontAksi/') . $eMenuFront['idMenuFront'] ;?>" method="POST" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="form-group">
      <label for="urlMenuFront">Url Menu</label>
      <input type="text" name="urlMenuFront" class="form-control form-control-sm" id="urlMenuFront" value="<?= $eMenuFront['urlMenuFront'] ;?>">
      <?= form_error('urlMenuFront', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="namaMenuFront">Nama Menu</label>
      <input type="text" name="namaMenuFront" class="form-control form-control-sm" id="namaMenuFront" value="<?= $eMenuFront['namaMenuFront'] ;?>">
      <?= form_error('namaMenuFront', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <div class="form-group">
      <label for="statusMenuFront">Status Menu</label>
      <select class="form-control form-control-sm" name="statusMenuFront" id="statusMenuFront">
        <option>------Pilih Menu-------</option>
        <option value="aktif" <?= $eMenuFront['statusMenuFront'] == 'aktif' ? 'selected' : ''; ?> >Aktif</option>
        <option value="nonaktif" <?= $eMenuFront['statusMenuFront'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
        <?= form_error('statusMenuFront', '<div class="text-danger small ml-3">','</div>') ;?>
      </select>
    </div>
    <div class="form-group">
      <label for="memberLevel">Level Member</label>
      <select class="form-control form-control-sm" name="memberLevel" id="memberLevel">
        <option>------Pilih Member-------</option>
        <?php foreach ($viewMember as $vm): ?>
          <option value="<?= $vm['levelUser'] ;?>" <?= $eMenuFront['memberLevel'] == $vm['levelUser'] ? 'selected' : '' ;?>><?= ucfirst($vm['levelUser']) ;?></option>
          <?= form_error('memberLevel', '<div class="text-danger small ml-3">','</div>') ;?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="noUrutFront">No Urut Menu</label>
      <input type="text" name="noUrutFront" class="form-control form-control-sm" id="noUrutFront" value="<?= $eMenuFront['noUrutFront'] ;?>">
      <?= form_error('noUrutFront', '<div class="text-danger small ml-3">','</div>') ;?>
    </div>
    <button type="reset" name="reset" class="btn btn-danger tombol">Reset</button>
    <button type="submit" name="simpan" class="btn btn-primary tombol">Submit</button>
  </div>
</form>