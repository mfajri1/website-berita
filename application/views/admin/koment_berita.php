<?php $j = 1; ?>
<?php foreach ($koment as $k): ?>
	<?php $j++ ?>
	<div class="card shadow mb-4">
		<!-- Card Header - Accordion -->
		<a href="#data<?= $j ?>" class="d-block card-header py-3 bg-secondary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
			<h6 class="m-0 font-weight-bold text-white"><?= $k['idUser'] ;?></h6>
		</a>
		<!-- Card Content - Collapse -->
		<div class="collapse show" id="data<?= $j; ?>">
			<div class="card-body">
				<h4><?= $k['judulBerita'] ;?></h4>
				<hr class="batas">
				<p class="text-justify"><?= $k['isiKomentar'] ;?></p>
			</div>
			<div class="row">
				<div class="col-lg-6 pl-4">
					<p class="subtxt">Tanggal Post</p>
					<p class="txt"><?= date('d-M-Y, H:i:s', $k['tanggalPost']) ;?></p>
				</div>
				<div class="col-lg-6 text-right pr-4">
					<p class="subtxt">Tanggal Update</p>
					<p class="txt"><?= date('d-M-Y, H:i:s', $k['tanggalUpdate']) ;?></p>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach ?>