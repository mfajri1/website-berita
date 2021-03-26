<section id="page-title" class="page-title">
  <div class="bg-title">
    <div class="container">
      <div class="title">
        <h1>Tentang Kami</h1>
      </div><!-- End .title -->
      <div class="breadcrumb">
        <ul>
          <li><a href="index.html"><?= $this->uri->segment(2) ;?></a></li>
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
        <div class="about-me">
          <img src="<?= base_url('assets/uploads/large/') . $tAbout['fotoAbout'] ;?>" alt="About Me" style="height: 400px; width: 100%">
          <h2><?= $tAbout['judulAbout'] ;?></h2>
          <?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiAbout'])) ;?>
          <div class="row">
            <div class="col-md-4">
              <h2><?= $tAbout['judulVisi'] ;?></h2>
              <?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiVisi'])) ;?>
            </div> <!-- End .col-md-4 -->
            <div class="col-md-4">
              <h2><?= $tAbout['judulMisi'] ;?></h2>
              <?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiMisi'])) ;?>
            </div> <!-- End .col-md-4 -->
            <div class="col-md-4">
              <h2><?= $tAbout['judulTujuan'] ;?></h2>
              <?= htmlspecialchars_decode(htmlspecialchars_decode($tAbout['isiTujuan'])) ;?>
            </div> <!-- End .col-md-4 -->
          </div> <!-- End . row -->
        </div> <!-- End .about-me -->
      </div> <!-- End .container -->
    </section>
     <!--
        =======================
          End Section Content
        =======================
     -->