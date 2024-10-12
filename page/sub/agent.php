<div class="container">

        <div class="row gy-5">
          <?php
            $sql = "SELECT * FROM agent";
            $team_query = mysqli_query($conn, $sql);
            while($team = mysqli_fetch_array($team_query)){
          ?>
          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/<?=$team['img']?>" class="img-fluid" alt=""></div>
            </div>
            <div class="member-info">
              
              <h4><span><?=$team['post']?></span><?=$team['name']?></h4>
              <span style="font-style: normal;"><?=$team['work']?></span>
              <!-- <div class="social">
                <a href="<=$team['x_link']?>"><i class="bi bi-twitter-x"></i></a>
                <a href="<=$team['fb_link']?>"><i class="bi bi-facebook"></i></a>
                <a href="<=$team['insta_link']?>"><i class="bi bi-instagram"></i></a>
                <a href="<=$team['linked']?>"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div><!-- End Team Member -->
          <?php } ?>
        </div>

      </div>