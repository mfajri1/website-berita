<?php foreach ($tampilBerita as $tb): ?>
  <div class="blog-post">
    <div class="thum-item">
      <img src="<?= base_url('assets/uploads/large/') . $tb['gambarBerita'] ;?>" alt="Post Thumnail Image" style="background-size: contain; height: 250px; width: 100%; background-size: cover;">
    </div> <!-- End .thum-item -->
    <div class="post">
      <div class="blog-title">
        <h2><a href="<?= base_url('user/user/detailBerita/') .$tb['idBerita'] ;?>"><?= $tb['judulBerita'] ;?></a></h2>
      </div>
      <div class="meta">
        <ul>
          <li class="category"><a href="<?= base_url('user/user/detailBerita/') .$tb['idBerita'] ;?>"><?= $tb['namaKategoriBerita'] ;?></a></li>
          <li class="author"><?= $tb['namaPengarang'] ;?></li>
          <li class="date"><?= date('d-M-Y', $tb['tanggalPost']) ;?></li>
          <li class="comment"><?= $tb['totalKomentar'] ;?> Comments</li>
        </ul>
      </div> <!-- End .meta -->
      <div class="content" style="max-height: 100px; overflow: hidden;">
        <?= htmlspecialchars_decode(htmlspecialchars_decode($tb['isiBerita'])) ;?>
      </div> <!-- End .content -->
      <div class="line"></div>
      <div class="share">
        <div class="post-bottom">
          <div class="continue">
            <a href="<?= base_url('user/user/detailBerita/') .$tb['idBerita'] ;?>">Lanjut Membaca... <span><i class="fa fa-long-arrow-right"></i></span></a>
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
<?php endforeach ?>


<nav>
  <!-- <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
  </ul> -->
    <?php echo $pagination; ?>
</nav>