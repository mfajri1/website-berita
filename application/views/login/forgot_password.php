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
              <form action="<?= site_url('forgotPassword/checkEmail') ;?>" method="POST" class="user">
                <div class="form-group">
                  <input type="email" name="emailUser" class="form-control form-control-user email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email...">
                  <?= form_error('emailUser', '<div class="text-danger small ml-3">','</div>') ;?>

                </div>
                <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                  Kirim Email
                </button>
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
                <a class="small" href="<?= base_url('register') ;?>">Create an Account!</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>


