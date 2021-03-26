 <footer id="footer" class="footer">
  <div class="container">
     <div class="footer-nav">
        <div class="row">
            <div class="col-sm-4">
                <ul class="footer-bio">
                   <li><a href="https://id-id.facebook.com/<?= $konfig['facebook'] ;?>"><i class="fa fa-facebook"></i>  <?= $konfig['facebook'] ;?></a></li>
                </ul>
                <ul class="footer-bio">
                    <li><a href="https://www.instagram.com/<?= $konfig['instagram'] ;?>" target="_blank"><i class="fa fa-instagram"></i>  <?= $konfig['instagram'] ;?></a></li>
                </ul>
                <ul class="footer-bio">
                   <li><a href="https://twitter.com/<?= $konfig['twiter'] ;?>/?lang=id" target="_blank"><i class="fa fa-twitter"></i>  <?= $konfig['twiter'] ;?></a></li> 
                </ul>
                <ul class="footer-bio">
                   <li><a href=""><i class="fa fa-blog"></i>  <?= $konfig['blog'] ;?></a></li> 
                </ul>
                <ul class="footer-bio">
                   <li><a href=""><i class="fa fa-phone"></i>  <?= $konfig['noHp'] ;?></a></li> 
                </ul>
            </div>
            <div class="col-sm-3">
                <?php foreach ($tKategori as $tk): ?>
                    <ul class="footer-bio">
                        <li>
                            <a href=""><?= $tk['namaKategoriBerita'] ;?></a>
                        </li>
                    </ul>
                <?php endforeach ?>
            </div>
            <div class="col-sm-5">
                <form action="<?= base_url('user/saran/tambahSaran/') . $this->session->userdata('idUser'); ;?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="text-white" for="emailUser">Email address</label>
                        <input type="text" name="emailUser" class="form-control" id="emailUser">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="exampleInputPassword1">Saran & komentar</label>
                        <textarea class="form-control" name="saran" id="saran" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
       <!-- <ul class="nav navbar-nav">
          <li class="active"><a href="<?= base_url('assets/news/') ;?>index.html">Home</a></li>
          <li><a href="#">Privacy & Policy</a></li>
          <li><a href="<?= base_url('assets/news/') ;?>archive.html">Archive</a></li>
          <li><a href="<?= base_url('assets/news/') ;?>about.html">About Me</a></li>
          <li><a href="<?= base_url('assets/news/') ;?>contact.html">Contact Me</a></li>
      </ul> -->
  </div> <!-- End .footer-nav -->
  <div class="copyright">
   <span>Copyright <?= date('Y', $konfig['tglPost']) ;?>, All Rights Reserved <?= strtoupper($konfig['sumber']) ;?></span>
</div> <!-- End .copyright -->
</div> <!-- End .container -->
</footer>
     <!--
        =======================
          End Footer
        =======================
    -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url('assets/news/') ;?>js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Main -->
    <script src="<?= base_url('assets/news/') ;?>js/bootstrap.min.js"></script>
    
    <!-- Masonry Cascading grid layout library -->
    <script src="<?= base_url('assets/news/') ;?>js/masonry.pkgd.min.js"></script>

    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="<?= base_url('assets/news/') ;?>js/jquery.smartmenus.min.js"></script>

    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="<?= base_url('assets/news/') ;?>js/jquery.smartmenus.bootstrap.min.js"></script>

    <!-- Instagram photos -->
    <script type="text/javascript" src="<?= base_url('assets/news/') ;?>js/instafeed.min.js"></script>
    
    <!-- Google Map --><!-- 
    <script src="<?= base_url('assets/news/') ;?>http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?= base_url('assets/news/') ;?>js/gmaps.js"></script> -->

    <!-- All custom jQuery -->
    <script src="<?= base_url('assets/news/') ;?>js/custom.js"></script>
</body>
</html>