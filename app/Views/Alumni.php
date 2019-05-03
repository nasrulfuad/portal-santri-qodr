    <div class="container-fluid pt70 pb70">
      <div id="fh5co-projects-feed" class="fh5co-projects-feed clearfix masonry">
        <?php foreach ($datas['alumni'] as $alumni) { ?>
          <div class="fh5co-project masonry-brick">
            <a href="#">
              <img src="<?= BASEURL; ?>/images/img_20.jpg" alt="Free HTML5 by FreeHTML5.co">
              <h2><?= $alumni['nama_depan'] . ' ' . $alumni['nama_belakang']; ?></h2>
            </a>
          </div>
        <?php } ?>
      </div>
      <!--END .fh5co-projects-feed-->
    </div>
    <!-- END .container-fluid -->
