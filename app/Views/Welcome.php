    <div class="container-fluid pt70 pb70">
      <div id="fh5co-projects-feed" class="fh5co-projects-feed clearfix masonry">
        <?php foreach ($santri as $valueSantri) { ?>
          <div class="fh5co-project masonry-brick">
            <div class="fh5co-person text-center to-animate">
              <figure><img src="<?= BASEURL; ?>/images/img_20.jpg" alt="Image"></figure>
              <h3><?= $valueSantri['nama_depan'] . ' ' . $valueSantri['nama_belakang']; ?></h3>
              <span class="fh5co-position">Web Designer</span>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
              <ul class="social social-circle">
                <li>One</li>
                <li>One</li>
                <li>One</li>
                <li>One</li>
              </ul>
            </div>
          </div>
        <?php } ?>
      </div>
      <!--END .fh5co-projects-feed-->
    </div>
    <!-- END .container-fluid -->
