    <div class="container-fluid pt70 pb70">
      <div class="fh5co-projects-feed row">
        <?php foreach ($alumni as $valueAlumni) { ?>
          <div class="fh5co-project col-12 col-md-6 col-lg-4 p-3">
            <div class="fh5co-person text-center">
              <figure><img src="<?= BASEURL; ?>/images/img_20.jpg" alt="Image"></figure>
              <h3><?= $valueAlumni['nama']; ?></h3>
              <span class="fh5co-position">Web Designer</span>
              <p>Asal  :  <?= $valueAlumni['kota_asal']; ?></p>
              <p>Cabang  :  <?= ucfirst($valueAlumni['cabang_sekarang']); ?></p>
              <p>Umur  :  19 Tahun</p>
              <p>Skills  :  PHP, Laravel, HTML</p>
              <p>Status : </p>
              <p class="btn-status"><?= $valueAlumni['status_santri']; ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <!--END .fh5co-projects-feed-->
    </div>
    <!-- END .container-fluid -->
