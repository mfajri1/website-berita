    </div> 
    <!--
      ===============
        End .primary 
      ===============
    -->
  </div> <!-- End .container -->
</section>

<section id="footer-widget">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="widget-box">
           <div class="widget-title">
             <span>About Me</span>
             <div class="line"></div>
           </div> <!-- End .widget-title -->
           <div class="widget-item">
             <img src="<?= base_url('assets/uploads/konfig/') . $konfig['imgLogo'];?>" style="height: 200px; margin: auto;" alt="About Me Image">
             <div class="sidebar-text">
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
             </div> <!-- End .sidebar-text -->
           </div> <!-- End .widget-item -->
         </div> <!-- End .widget-box -->
         <div class="widget-box">
            <div class="widget-title">
              <span>SUBSCRIBE & FOLLOW</span>
              <div class="line"></div>
            </div> <!-- End .widget-title -->
            <div class="widget-item">
              <span class="social"><a href="https://id-id.facebook.com/<?= $konfig['facebook'] ;?>" target="_blank"><i class="fa fa-facebook"></i></a></span>
              <span class="social"><a href="https://twitter.com/<?= $konfig['twiter'] ;?>/?lang=id" target="_blank"><i class="fa fa-twitter"></i></a></span>
              <span class="social"><a href="https://www.instagram.com/<?= $konfig['instagram'] ;?>" target="_blank"><i class="fa fa-instagram"></i></a></span>
              <span class="social"><a href="https://www.facebook.com/<?= $konfig['blog'] ;?>" target="_blank"><i class="fa fa-rss"></i>  </a></span>
            </div> <!-- End .widget-item -->
          </div> <!-- End .widget-box -->
          <!-- <div class="widget-box">
            <div class="widget-title">
              <span>Search</span>
              <div class="line"></div>
            </div> 
            <div class="widget-item">
              <div class="sidebar-text">
                <div class="search-input">
                  <input type="text" class="form-control" id="search" name="search" placeholder="Search Here">                  
                </div>
                <div class="search-btn">
                  <button type="submit" class="btn-black">Search</button>
                </div>
              </div> 
            </div> 
          </div> --> <!-- End .widget-box -->
      </div> <!-- End .col-md-4 -->
      <div class="col-md-4">
        <div class="widget-box">
            <div class="widget-title">
              <span>Recent Post</span>
            <div class="line"></div>
          </div> <!-- End .widget-title -->
          <div class="widget-item">
            <ul class="sidebar-post">
              <?php foreach ($postBerita as $pb): ?>
                <li class="item">
                  <div class="thum-img">
                    <img src="<?= base_url('assets/uploads/medium/') . $pb['gambarBerita'] ;?>" alt="Small Thumbnail Image">
                  </div> <!-- End .thum-img -->
                  <div class="post-meta">
                    <h4><a href="#"><?= $pb['judulBerita'] ;?></a></h4>
                    <p><?= date('d-M-Y', $pb['tanggalUpdate']) ;?></p>
                  </div> <!-- End .post-meta -->
                </li> <!-- End .item -->
              <?php endforeach ?>

                
            </ul> <!-- End .sidebar-post -->
          </div> <!-- End .widget-item -->
        </div> <!-- End .widget-box -->
      </div> <!-- End .col-md-4 -->
      <div class="col-md-4">
        <!-- <div class="widget-box">
             <div class="widget-title">
               <span>Instagram</span>
               <div class="line"></div>
             </div> 
             <div class="widget-item">
               <div id="instafeed"></div>
              </div> 
           </div> --> <!-- End .widget-box -->
        
            <div class="widget-box">
             <div class="widget-title">
               <span>Kategori</span>
               <div class="line"></div>
             </div> <!-- End .widget-title -->
             <div class="widget-item">
               <div class="tagcloud">
                <?php foreach ($tKategori as $tk): ?>
                  <a class="btn-white-sm" href="<?= base_url('user/user/tampilBeritaPerKategori/') . $tk['idKategoriBerita'] ;?>"><?= $tk['namaKategoriBerita'] ;?></a>
                <?php endforeach ?>
               </div>
             </div> <!-- End .widget-item -->
           </div> <!-- End .widget-box -->
      </div><!-- End .col-md-4 -->
    </div> <!-- End .row -->
  </div> <!-- End .container -->
</section>
  <!--
    =======================
      End Footer Widget
    =======================
 -->