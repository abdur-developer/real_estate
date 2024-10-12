<div class="container">

        <div class="row gy-4">
          <?php
            $sql = "SELECT id, name, title, icon FROM services WHERE status = 1";
            $service_query = mysqli_query($conn, $sql);
            while($service = mysqli_fetch_array($service_query)){
          ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="<?=$service['icon']?>"></i>
              </div>
              <a href="?q=view-service&id=<?=encryptSt($service['id'])?>" class="stretched-link">
                <h3><?=$service['name']?></h3>
              </a>
              <p><?=$service['title']?></p>
            </div>
          </div><!-- End Service Item -->
          <?php } ?>

        </div>

      </div>