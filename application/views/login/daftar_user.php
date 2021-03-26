<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Daftar Akun Anda!</h1>
          </div>
          <form action="<?= base_url('register/registerAksi') ;?>" method="POST" enctype="miltipart/form-data" class="user">
            <div class="form-group">
                <input type="text" name="namaUser" class="form-control form-control-user" id="namaUser" value="<?= set_value('namaUser'); ?>" placeholder="Nama Lengkap">
                <?= form_error('namaUser', '<div class="text-danger small ml-3">','</div>') ;?>
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" id="username" value="<?= set_value('username'); ?>" placeholder="username">
                <?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>
            </div>
            <div class="form-group">
              <input type="email" name="emailUser" class="form-control form-control-user" id="exampleInputEmail" value="<?= set_value('emailUser'); ?>" placeholder="Email Address">
              <?= form_error('emailUser', '<div class="text-danger small ml-3">','</div>') ;?>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="input-group">
                  <input type="password" name="password" class="form-control form-control-user password" id="password" placeholder="Password">
                  <?= form_error('password', '<div class="text-danger small ml-3">','</div>') ;?>
                  <div class="input-group-append">
                    <i class="far fa-eye input-group-text text-success viewPass1"></i>
                  </div>
                </div>
                <p class="text-danger small ml-1 txtPassword">Password Tidak sama</p>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <input type="password" name="password2" id="password2" class="form-control form-control-user passwordRepeat" id="passwordRepeat" placeholder="Repeat Password">
                  <div class="input-group-append">
                    <i class="far fa-eye input-group-text text-success viewPass2"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
              Register Account
            </a>
            <hr>
            <a href="index.html" class="btn btn-google btn-user btn-block">
              <i class="fab fa-google fa-fw"></i> Register with Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
              <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
            </a> -->
            <div class="row">
              <div class="col-sm-12">
                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
              </div>
            </div>
          </form>
          <hr>
          <div class="text-center">
            <a class="small" href="<?= base_url('forgotPassword') ;?>">Forgot Password?</a>
          </div>
          <div class="text-center">
            <a class="small" href="<?= base_url('login') ;?>">Already have an account? Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

