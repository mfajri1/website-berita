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
             <img src="<?= base_url('assets/news/') ;?>images/about-me.jpg" alt="About Me Image">
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
             <span class="social"><a href="https://www.facebook.com/<?= $konfig['blog'] ;?>" target="_blank"><i class="fa fa-rss"></i></a></span>
           </div> <!-- End .widget-item -->
         </div> <!-- End .widget-box -->
         <div class="widget-box">
             <div class="widget-title">
               <span>Search</span>
               <div class="line"></div>
             </div> <!-- End .widget-title -->
             <div class="widget-item">
               <div class="sidebar-text">
                 <div class="search-input">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search Here">                  
                  </div>
                  <div class="search-btn">
                      <button type="submit" class="btn-black">Search</button>
                  </div>
               </div> <!-- End .sidebar-text -->
             </div> <!-- End .widget-item -->
           </div> <!-- End .widget-box -->
      </div> <!-- End .col-md-4 -->
      <div class="col-md-4">
        <div class="widget-box">
             <div class="widget-title">
               <span>Recent Post</span>
               <div class="line"></div>
             </div> <!-- End .widget-title -->
             <div class="widget-item">
               <ul class="sidebar-post">
                 <li class="item">
                   <div class="thum-img">
                     <img src="<?= base_url('assets/news/') ;?>images/placeholder-post-thum.jpg" alt="Small Thumbnail Image">
                   </div> <!-- End .thum-img -->
                   <div class="post-meta">
                     <h4><a href="#">Sophisticated Kiev Home Makes Kiev Home Makes</a></h4>
                     <p>June 14, 2015</p>
                   </div> <!-- End .post-meta -->
                 </li> <!-- End .item -->

                 <li class="item">
                   <div class="thum-img">
                     <img src="<?= base_url('assets/news/') ;?>images/placeholder-post-thum.jpg" alt="Small Thumbnail Image">
                   </div> <!-- End .thum-img -->
                   <div class="post-meta">
                     <h4><a href="#">Sophisticated Kiev Home Makes</a></h4>
                     <p>June 14, 2015</p>
                   </div> <!-- End .post-meta -->
                 </li> <!-- End .item -->

                 <li class="item">
                   <div class="thum-img">
                     <img src="<?= base_url('assets/news/') ;?>images/placeholder-post-thum.jpg" alt="Small Thumbnail Image">
                   </div> <!-- End .thum-img -->
                   <div class="post-meta">
                     <h4><a href="#">Sophisticated Kiev Home Makes</a></h4>
                     <p>June 14, 2015</p>
                   </div> <!-- End .post-meta -->
                 </li> <!-- End .item -->

                 <li class="item">
                   <div class="thum-img">
                     <img src="<?= base_url('assets/news/') ;?>images/placeholder-post-thum.jpg" alt="Small Thumbnail Image">
                   </div> <!-- End .thum-img -->
                   <div class="post-meta">
                     <h4><a href="#">Sophisticated Kiev Home Makes</a></h4>
                     <p>June 14, 2015</p>
                   </div> <!-- End .post-meta -->
                 </li> <!-- End .item -->

                 <li class="item">
                   <div class="thum-img">
                     <img src="<?= base_url('assets/news/') ;?>images/placeholder-post-thum.jpg" alt="Small Thumbnail Image">
                   </div> <!-- End .thum-img -->
                   <div class="post-meta">
                     <h4><a href="#">Sophisticated Kiev Home Makes</a></h4>
                     <p>June 14, 2015</p>
                   </div> <!-- End .post-meta -->
                 </li> <!-- End .item -->
               </ul> <!-- End .sidebar-post -->
             </div> <!-- End .widget-item -->
           </div> <!-- End .widget-box -->
      </div> <!-- End .col-md-4 -->
      <div class="col-md-4">
        <div class="widget-box">
             <div class="widget-title">
               <span>Instagram</span>
               <div class="line"></div>
             </div> <!-- End .widget-title -->
             <div class="widget-item">
               <div id="instafeed"></div>
              </div> <!-- End .widget-item -->
           </div> <!-- End .widget-box -->
        
            <div class="widget-box">
             <div class="widget-title">
               <span>Kategori</span>
               <div class="line"></div>
             </div> <!-- End .widget-title -->
             <div class="widget-item">
               <div class="tagcloud">
                <?php foreach ($tKategori as $tk): ?>
                  <a class="btn-white-sm" href="#"><?= $tk['namaKategoriBerita'] ;?></a>
                <?php endforeach ?>
                 <!-- <a class="btn-white-sm" href="#">lifestyle</a>
                 <a class="btn-white-sm" href="#">music</a>
                 <a class="btn-white-sm" href="#">Sundarban</a>
                 <a class="btn-white-sm" href="#">rock</a>
                 <a class="btn-white-sm" href="#">video</a>
                 <a class="btn-white-sm" href="#">superstar</a>
                 <a class="btn-white-sm" href="#">travel</a>
                 <a class="btn-white-sm" href="#">lifestyle</a>
                 <a class="btn-white-sm" href="#">music</a>
                 <a class="btn-white-sm" href="#">Sundarban</a>
                 <a class="btn-white-sm" href="#">rock</a>
                 <a class="btn-white-sm" href="#">video</a>
                 <a class="btn-white-sm" href="#">rock</a>
                 <a class="btn-white-sm" href="#">video</a>
                 <a class="btn-white-sm" href="#">superstar</a>
                 <a class="btn-white-sm" href="#">travel</a>
                 <a class="btn-white-sm" href="#">lifestyle</a>
                 <a class="btn-white-sm" href="#">travel</a> -->
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