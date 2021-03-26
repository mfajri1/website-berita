</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('login/log_out') ;?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- hapus Berita -->
  <div class="modal fade" id="hapusBerita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Menghapus Data?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php foreach ($tampil as $t): ?>
          <?php endforeach ?>
            <a href="<?= base_url('admin/hapusBerita/'.$t['idBerita']) ;?>" class="btn btn-primary">YA</a>
        </div>
      </div>
    </div>
  </div>

  <!-- hapus Koment -->
  <div class="modal fade" id="hapusKoment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Menghapus Data?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php foreach ($koment as $k): ?>
          <?php endforeach ?>
            <a href="<?= base_url('komentar/hapusKoment/'.$k['idKomentar']) ;?>" class="btn btn-primary">YA</a>
        </div>
      </div>
    </div>
  </div>

  <!-- hapus kategori -->
  <div class="modal fade" id="hapusKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Menghapus Data?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php foreach ($tkategori as $t): ?>
          <?php endforeach ?>
            <a href="<?= base_url('kategori/hapusKategori/'.$t['idKategoriBerita']) ;?>" class="btn btn-primary">YA</a>
        </div>
      </div>
    </div>
  </div>
  

  <!-- modal Upload -->
  <div class="modal fade" id="modalUpload" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Upload Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('pengguna/uploadFoto/') . $this->session->userdata('idUser') ;?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" name="fotoUser" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- modal Tampil detail Menu -->
  <?php foreach ($viewMenu as $vm): ?>
    <div class="modal fade" id="modalTampilMenu<?= $vm['idMenu'] ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
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
                    <th>Nama Menu</th>
                    <th>Target Dropdown</th>
                    <th>Nama Head SubMenu</th>
                    <th>Icon Menu</th>
                    <th>Status Menu</th>
                    <th>No Urut</th>
                    <th>Level Member</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $idMenu2 = $vm['idMenu'];
                    $query = "SELECT * FROM `t_menu_backend` WHERE `idMenu` = $idMenu2";
                    $detailMenu = $this->db->query($query)->row_array();
                   ?>
                   <tr>
                     <td><?= $detailMenu['namaMenu'] ;?></td>
                     <td><?= $detailMenu['targetDropdown'] ;?></td>
                     <td><?= $detailMenu['nameHeadSubMenu'] ;?></td>
                     <td><?= $detailMenu['iconMenu'] ;?></td>
                     <td><?= $detailMenu['statusMenu'] ;?></td>
                     <td><?= $detailMenu['noUrut'] ;?></td>
                     <td><?= $detailMenu['memberLevel'] ;?></td>
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



  
  <!-- modal Edit data submenu -->
  <?php foreach ($viewSubmenu as $vsm): ?>
    <div class="modal fade" id="modalEditSub<?= $vsm['idSubMenu'] ;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Submenu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
            $idSubmenu = $vsm['idSubMenu'];  
            $querySubEdit = "
            SELECT * FROM `t_submenu_backend` WHERE `idSubMenu` = $idSubmenu
            ";
            $editSub = $this->db->query($querySubEdit)->row_array();
          ?>
          <form action="<?= base_url('managementSubmenu/EditSubmenuAksi/') . $editSub['idSubMenu'] ;?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="urlSubMenu<?= $editSub['idSubMenu'] ?>">Url Submenu</label>
                <input type="text" name="urlSubMenu" class="form-control form-control-sm" id="urlSubMenu<?= $editSub['idSubMenu'] ?>" value="<?= $editSub['urlSubMenu'] ;?>">
                <?= form_error('urlSubMenu', '<div class="text-danger small ml-3">','</div>') ;?>
              </div>
              <div class="form-group">
                <label for="judulSubMenu<?= $editSub['idSubMenu'] ?>">Judul Submenu</label>
                <input type="text" name="judulSubMenu" class="form-control form-control-sm" id="judulSubMenu<?= $editSub['idSubMenu'] ?>" value="<?= $editSub['judulSubMenu'] ;?>">
                <?= form_error('judulSubMenu', '<div class="text-danger small ml-3">','</div>') ;?>
              </div>
              <div class="form-group">
                <label for="memberLevel<?= $editSub['idSubMenu'] ?>">Level Member</label>
                <select class="form-control form-control-sm" name="menuId" id="menuId<?= $editSub['idSubMenu'] ?>">
                  <option>------Pilih Menu-------</option>
                  <?php foreach ($viewMenu as $vm): ?>
                    <option value="<?= $vm['idMenu'] ;?>" <?= $editSub['menuId'] == $vm['idMenu'] ? 'selected' : '' ;?> ><?= ucfirst($vm['namaMenu']) ;?></option>
                    <?= form_error('menuId', '<div class="text-danger small ml-3">','</div>') ;?>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="statusMenu<?= $editSub['idSubMenu'] ?>">Status Menu</label>
                <select class="form-control form-control-sm" name="statusSubmenu" id="statusMenu<?= $editSub['idSubMenu'] ?>">
                  <option>------Pilih Status Menu-------</option>
                  <option value="aktif" <?= $editSub['statusSubmenu'] == 'aktif' ? 'selected' : '' ;?> >Aktif</option>
                  <option value="nonaktif" <?= $editSub['statusSubmenu'] == 'nonaktif' ? 'selected' : '' ;?> >Nonaktif</option>
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
    
  <?php endforeach ?>


  
  <script src="<?= base_url('assets/admin/') ;?>jquery/jquery-3.3.1.min.js" ></script>
  <!-- script sendiri -->
  <script src="<?= base_url('assets/admin/') ;?>js/script.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/admin/') ;?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/admin/') ;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/admin/') ;?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/admin/') ;?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/admin/') ;?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/admin/') ;?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/admin/') ;?>js/demo/chart-pie-demo.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/admin/') ;?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/admin/') ;?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/admin/') ;?>js/demo/datatables-demo.js"></script>

  <!-- ck editor -->
  <script src="<?= base_url('assets/') ;?>ckeditor5-build-classic/ckeditor.js"></script>
  <script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
  </script>
  <script>
    ClassicEditor
    .create( document.querySelector( '#editor2' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
  </script>
  <script>
    ClassicEditor
    .create( document.querySelector( '#editor3' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
  </script>
  <script>
    ClassicEditor
    .create( document.querySelector( '#editor4' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
  </script>
</body>

</html>
