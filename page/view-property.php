  <main class="main">
    <?php
      $enc_id = $_REQUEST['id'];
      $id = decryptSt($enc_id);
      $sql = "SELECT * FROM projects WHERE id = $id";
      $project = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    ?>
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading d-none">
        <!-- <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>প্রকল্পের বর্ণনা</h1>
              <p class="mb-0">প্রোজেক্ট সম্পর দুই লাইন। প্রোজেক্ট সম্পর দুই লাইন। প্রোজেক্ট সম্পর দুই লাইন। প্রোজেক্ট সম্পর দুই লাইন। প্রোজেক্ট সম্পর দুই লাইন। প্রোজেক্ট সম্পর দুই লাইন। </p>
            </div>
          </div>
        </div> -->
      </div>
      <nav class="breadcrumbs" style = "padding: 100px 0 20px 0;">
        <div class="container">
          <ol>
            <li><a href="index.php">হোম</a></li>
            <li class="current">প্রকল্পের বর্ণনা</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Real Abdur 2 Section -->
    <section id="project-sec-2" class="project-sec-2 section">

      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide">
              <img src="<?=$project['slider_1']?>" alt="">
            </div>

            <div class="swiper-slide">
              <img src="<?=$project['slider_2']?>" alt="">
            </div>

            <div class="swiper-slide">
              <img src="<?=$project['slider_3']?>" alt="">
            </div>

          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8" data-aos="fade-up">

            <div class="portfolio-description">
              <h2><?=$project['title']?></h2>
              <p><?=$project['description']?></p>

              <!-- <div class="testimonial-item">
                <p>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                </p>
                <div>
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Agent</h4>
                </div>
              </div> -->
            </div><!-- End Portfolio Description -->

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#project-sec-2-tab1">Video</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#project-sec-2-tab2">Floor Plans</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#project-sec-2-tab3">Location</a></li>
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="project-sec-2-tab1">
                <?=$project['video']?>
              </div><!-- End Tab 1 Content -->

              <div class="tab-pane fade" id="project-sec-2-tab2">
                <img src="<?=$project['model']?>" alt="" class="img-fluid">
              </div><!-- End Tab 2 Content -->

              <div class="tab-pane fade" id="project-sec-2-tab3">
                <?=$project['geo_location']?>
              </div><!-- End Tab 3 Content -->

            </div><!-- End Tab Content -->

          </div>

          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
              <h3>Quick Summary</h3>
              <ul>
                <!-- <li><strong>Property ID:</strong> 1134n</li> -->
                <li><strong>ঠিকানাঃ</strong> <?=$project['location']?></li>
                <li><strong>প্রকল্পের ধরনঃ</strong> <?=$project['type']?></li>
                <!-- <li><strong>Status:</strong> Sale</li> -->
                <li><strong>ক্ষেত্রফলঃ</strong> <span><?=$project['area']?></span></li>
                <li><strong>বেডরুমঃ</strong> <?=$project['bed']?></li>
                <li><strong>বাথরুমঃ</strong> <?=$project['bath']?></li>
                <li><strong>বারান্দাঃ</strong> <?=$project['baranda']?></li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Real Abdur 2 Section -->

  </main>