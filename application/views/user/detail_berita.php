<section id="page-title" class="page-title">
  <div class="bg-title">
    <div class="container">
      <div class="title">
        <h1><?= $detailBerita['judulBerita'] ;?></h1>
      </div><!-- End .title -->
      <div class="breadcrumb">
        <ul>
          <li><a href="<?= base_url('user/user/tampilBerita') ;?>">TampilBerita</a></li>
          <li><?= $this->uri->segment(3) ;?></li>
        </ul>
      </div>
    </div> <!-- End .conatainer -->
  </div>
</section>
<!--
=====================
  End Page Title
=====================
-->

<section id="content">
 <div class="container">
   <div class="row">
     <div class="col-md-8">
       <div class="primary">
         <div class="blog-post">
           <div class="thum-item">
             <img src="<?= base_url('assets/uploads/medium/') . $detailBerita['gambarBerita'] ;?>" alt="Post Thumnail Image">
           </div> <!-- End .thum-item -->
           <div class="post">
             <div class="blog-title">
               <h2><a href="#"><?= $detailBerita['judulBerita'] ;?></a></h2>
             </div>
             <div class="meta">
                  <ul>
                    <li class="category"><a href="<?= base_url('user/user/tampilBeritaKategori/') . $detailBerita['idKategori'] ;?>"><?= $detailBerita['namaKategoriBerita'] ;?></a></li>
                    <li class="author"><?= $detailBerita['namaPengarang'] ;?></li>
                    <li class="date"><?= date('d-M-y', $detailBerita['tanggalPost']) ;?></li>
                    <li class="comment"><?= $detailBerita['totalKomentar'] ;?></li>
                  </ul>
               </div> <!-- End .meta -->
             <div class="content">
                <?= htmlspecialchars_decode(htmlspecialchars_decode($detailBerita['isiBerita'])) ;?>
             </div> <!-- End .content -->
              <div class="line"></div>
             <div class="share">
              <div class="post-bottom">
               <div class="tag">
                 <span>Tag:</span>
                 <a href="#">lifestyle</a>
                 <a href="#">music</a>
                 <a href="#">rock</a>
               </div> <!-- End .continue -->
               <div class="share-iocn">
                 <span class="share">Share:</span>
                 <span class="icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
                 <span class="icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
                 <span class="icon"><a href="#"><i class="fa fa-google-plus"></i></a></span>
                 <span class="icon"><a href="#"><i class="fa fa-pinterest"></i></a></span>
                </div> <!-- End .share-iocn -->
               </div> <!-- End .post-bottom -->
             </div> <!-- End .share -->
           </div> <!--  End .post -->
         </div> <!-- End .blog-post -->
         <div class="author-box">
            
            <div class="photo">
              <a href="#"><img src="images/author.jpg" alt="S M Mishkatul Islam"></a>
           </div> <!-- End .photo -->
           <div class="bio">
             <h5><a href=""><?= $detailBerita['namaPengarang'] ;?></a></h5>
             <h6>web designer and developer</h6>
             <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit aperiam.</p>
             <div class="share-iocn">
                 <span class="icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
                 <span class="icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
                 <span class="icon"><a href="#"><i class="fa fa-google-plus"></i></a></span>
                 <span class="icon"><a href="#"><i class="fa fa-pinterest"></i></a></span>
              </div> <!-- End .share-iocn -->
           </div> <!-- End .bio -->
         </div> <!-- End .author-box -->
        <div class="related-post">
          <span class="title">Realted Post</span>
          <div class="row">
            <?php foreach ($postBerita as $pb): ?>
              <div class="col-md-4">
                <div class="item">
                  <a href="<?= base_url('user/user/detailBerita/') . $pb['idBerita'] ;?>">
                    <img src="<?= base_url('assets/uploads/medium/') . $pb['gambarBerita'] ;?>" alt="Post">
                    <h4><?= $pb['judulBerita'] ;?></h4>
                  </a>
                  <span><?= date('d-M-y', $pb['tanggalPost']) ;?></span>
                </div> <!-- End .item -->
              </div> <!-- End .col-md-4 -->  
            <?php endforeach ?>
          </div> <!-- End .row -->
        </div> <!-- End .related-post -->
        <div class="blog-comment">
          <span class="title">Komentar ( <?= $detailBerita['totalKomentar'] ;?> )</span>
          <?php foreach ($detailKoment as $dk): ?>
            <div class="comment-wrap">
                <div class="photo">
                  <a href="#"><img src="<?= base_url('assets/uploads/users/') . $dk['fotoUser'] ;?>" alt="<?= $dk['namaUser'] ;?>"></a>
                </div> <!-- End .photo -->
                <div class="full-comment">
                  <h5><a href=""><?= $dk['namaUser'] ;?></a></h5>
                  <span class="date"><?= date('d-M-y, h:i:s', $dk['tanggalUpdate']) ;?></span>
                  <p><?= $dk['isiKomentar'] ;?></p>   
                  <div class="reply">
                    <a class="btn-white-sm" href="#">Edit</a>
                  </div>
                </div> <!-- End .full-comment -->                   
            </div> <!-- End .comment-wrap -->
          <?php endforeach ?>
        </div>
          <!-- <?= $detailBerita['idBerita'] ;?> -->
          <div class="leave-a-reply">
            <span class="title">Komentar</span>
            <div class="row">
              <form action="<?= base_url('user/user/tambahKomen/') ;?>" method="POST" class="tambahKomentar">
                <input type="hidden" name="idBerita" value="<?= $beritaId ;?>">
                <input type="hidden" name="idUser" value="<?= $this->session->userdata('idUser') ;?>">
                <!-- <div class="col-md-8">
                  <input type="text" name="website" class="form-control"  id="website" placeholder="Website">
                </div> -->
                <div class="col-md-12">
                  <textarea name="isiKomentar" id="isiKomentar" class="form-control" rows="8" placeholder="Message"></textarea>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn-black">Send Message</button>
                </div>
              </form>
            </div>
          </div> <!-- End .leave-a-reply -->
       </div> 
        <!--
            ===============
              End .primary 
            ===============
        -->
     </div> <!-- End .col-md-8 -->
     <div class="col-md-4">
       <div class="sidebar">
         <div class="widget-box">
           <div class="widget-title">
             <span>About Me</span>
             <div class="line"></div>
           </div> <!-- End .widget-title -->
           <div class="widget-item">
             <img src="images/about-me.jpg" alt="About Me Image">
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
             <span class="social"><a href="https://www.instagram.com/<?= $konfig['instagram'] ;?>" target="_blank"><i class="fa fa-youtube-play"></i></a></span>
           </div> <!-- End .widget-item -->
         </div> <!-- End .widget-box -->

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
                    <h4><a href="<?= base_url('user/user/detailBerita/') . $pb['idBerita'] ;?>"><?= $pb['judulBerita'] ;?></a></h4>
                    <p><?= date('d-M-y, h:i:s', $pb['tanggalPost']) ;?></p>
                  </div> <!-- End .post-meta -->
                </li> <!-- End .item -->               
              <?php endforeach ?>
             </ul> <!-- End .sidebar-post -->
           </div> <!-- End .widget-item -->
         </div> <!-- End .widget-box -->
      
          <div class="widget-box">
           <div class="widget-title">
             <span>Tag Cloud</span>
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

         <div class="widget-box">
           <div class="widget-title">
             <span>Category</span>
             <div class="line"></div>
           </div> <!-- End .widget-title -->
           <div class="widget-item">
             <ul class="category-list">
                <?php foreach ($tKategori as $tk): ?>
                  <?php 
                    $query = $this->db->select('tkb.*, tb.*, COUNT(tb.idBerita) AS totalBerita')->from('t_berita tb')->join('t_kategori_berita tkb', 'tkb.idKategoriBerita = tb.idKategori', 'left')->where('tb.idKategori', $tk['idKategoriBerita']);
                    $berita = $query->get()->row_array();
                  ;?>
                  <li class="cat-item"><a href="<?= base_url('user/user/tampilBeritaPerKategori/') . $tk['idKategoriBerita'] ;?>"><?= $tk['namaKategoriBerita'] ;?> <span>(<?= $berita['totalBerita'] ;?>)</span></a></li>
                 <?php endforeach ?>
             </ul> <!-- End .category-list -->
           </div> <!-- End .widget-item -->
         </div> <!-- End .widget-box -->

         

       </div>
       <!--
          =================
            End .sidebar
          =================
       -->
     </div> <!-- End .col-md-4 -->
   </div> <!-- End .row -->
 </div> <!-- End .container -->
</section>
<!--
  =======================
    End Section Content
  =======================
-->