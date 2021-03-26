<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Lupa Password</h1>
              </div>
              <?= $this->session->flashdata('pesan'); ;?>
              <form action="<?= site_url('forgotPassword/aksiEditPass') ;?>" method="POST" class="user">
                <input type="hidden" name="emailUser" value="<?= $emailUser ;?>">
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" name="password" class="form-control form-control-user email" id="password" aria-describedby="emailHelp" placeholder="Masukkan password...">
                    <?= form_error('password', '<div class="text-danger small ml-3">','</div>') ;?>
                    <div class="input-group-append">
                      <i class="far fa-eye input-group-text text-success viewPass1"></i>
                    </div>                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" name="password2" class="form-control form-control-user passwordRepeat" id="password2" aria-describedby="emailHelp" placeholder="Ulangi Password...">
                    <?= form_error('password2', '<div class="text-danger small ml-3">','</div>') ;?>
                    <div class="input-group-append">
                      <i class="far fa-eye input-group-text text-success viewPass2"></i>
                    </div>
                  </div>
                  <p class="text-danger txtPassword">Password Salah</p>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary btn-user btn-block">
                  Simpan Password
                </button>
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Login with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a> -->
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>


