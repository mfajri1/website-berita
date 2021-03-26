<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
              </div>
              <?= $this->session->flashdata('pesan'); ;?>
              <form action="<?= site_url('login/checkLogin') ;?>" method="POST" class="user" id="loginForm">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username...">
                  <?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>

                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" name="password" class="form-control form-control-user password" id="password" placeholder="Password">
                    <?= form_error('password', '<div class="text-danger small ml-3">','</div>') ;?>
                    <div class="input-group-append">
                      <i class="far fa-eye input-group-text text-success viewPass1"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                <button type="submit" name="login" id="simpan" class="btn btn-primary btn-user btn-block">
                  Login <img src="<?= base_url('assets/img/ajax-loader.gif') ;?>" class="imgLoading d-none" alt="" width="100">
                </button>

                <div id="loading" class="text-center d-none">
                  <img src="<?= base_url('assets/img/ajax-loader.gif') ;?>" class="imgLoading " alt="" width="100">
                  <p>Harap Tunggu</p>
                </div>

                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Login with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('forgotPassword/forgot') ;?>">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('register') ;?>">Create an Account!</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>


