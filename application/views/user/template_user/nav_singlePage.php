<header id="header" class="header navbar-fixed-top">
  <div class="container">
    <!-- Static navbar -->
    <div class="navbar" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="<?= base_url('assets/news/') ;?>index.html"><img src="<?= base_url('assets/uploads/konfig/') . $konfig['imgLogo'] ;?>" alt="" width="40"></a> -->
        <div class="logo">
          <a href="">
            <img src="<?= base_url('assets/uploads/konfig/') . $konfig['imgLogo'] ;?>" alt="sdf" class="logo-brand-web"><span class="text-logo"><?= $konfig['namaWeb'] ;?></span>
          </a>
        </div>
      </div>
      <div class="navbar-collapse collapse">
        <!-- Right nav -->
        <ul class="nav navbar-nav right">
          <!-- <li>
            <a href="index.html">Home<i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="index-full-width.html">Full Width Blog</a></li>
              <li><a href="#">Masonry Blog<i class="fa fa-angle-right"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="3column.html">3 Column Full</a></li>
                  <li><a href="2column-sidebar.html">2 Column with Sidebar</a></li>
                </ul>
              </li> 
              <li><a href="index2.html">Style 2</a></li>
            </ul>
          </li>
          <li><a href="#">Page<i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="single.html">Single Page</a></li>
              <li><a href="gallery.html">Gallery Post</a></li>
              <li><a href="image-post.html">Image Post</a></li>
              <li><a href="audio.html">Audio</a></li>
              <li><a href="video.html">Video</a></li>
              <li><a href="404.html">404 Page</a></li>
            </ul>
          </li> -->
          <?php $level = $this->session->userdata('levelUser'); ?>
          <?php if ($level == 'admin'): ?>
            <li><a href="<?= base_url('admin') ;?>">Admin</a></li>
          <?php elseif ($level == 'operator'): ?>
            <li><a href="<?= base_url('operator/operator') ;?>">Admin</a></li>
          <?php else: ?>
            <li></li>
          <?php endif ?>
          <li><a href="<?= base_url('user/user/tampilBerita') ;?>">Home</a></li>
          <li><a href="<?= base_url('user/user/about') ;?>">Tentang Kami</a></li>
          <li>
            <a href=""><?= $this->session->userdata('namaUser'); ;?><i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="<?= base_url('user/user/profile') ;?>">Profile</a></li>
              <li><a href="<?= base_url('login/log_out') ;?>">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div> <!-- End .container -->
</header> 
<!--
    =====================
          End Header
    =====================
  -->