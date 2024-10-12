<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading d-none">
        <!-- <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>About</h1>
              <p class="mb-0">সুন্দর ও মনোরম পরিবেশে  আপনার স্বপ্নের বাসস্থান গড়তে বুকিং দিন রাইট সিটি রিয়েল স্টেট লিমিটেড - এ</p>
            </div>
          </div>
        </div> -->
      </div>
      <nav class="breadcrumbs" style = "padding: 100px 0 20px 0;">
        <div class="container">
          <ol>
            <li><a href="index.php">হোম</a></li>
            <li class="current">পরিচালনা পর্ষদ</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <?php require 'page/agents.php'; ?>

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">কেন আমরাই</p>
            <h3>সুন্দর ও মনোরম পরিবেশে আপনার স্বপ্নের বাসস্থান গড়তে</h3>
            <p class="fst-italic">
            “রাইট সিটি রিয়েল ষ্টেট লিমিটেড” বিস্তৃত পরিসরে বসতবাড়ি নির্মাণ সুবিধা প্রদান করে এবং সম্পূর্ণ প্রকল্প হস্তান্তরের পরেও প্রজেক্টের নিরাপত্তা, রক্ষণাবেক্ষণ সম্পর্কিত পরিসেবা প্রদান করে।
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>নিজেদের সম্পর্কে কিছু কথা, সংক্ষিপ্ত আকারে</span></li>
              <li><i class="bi bi-check-circle"></i> <span>নিজেদের সম্পর্কে কিছু কথা, সংক্ষিপ্ত আকারে নিজেদের সম্পর্কে কিছু কথা,</span></li>
              <li><i class="bi bi-check-circle"></i> <span>নিজেদের সম্পর্কে কিছু কথা, সংক্ষিপ্ত আকারে নিজেদের সম্পর্কে কিছু কথা,নিজেদের সম্পর্কে কিছু কথা, সংক্ষিপ্ত আকারে নিজেদের সম্পর্কে কিছু কথা,</span></li>
            </ul>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets/img/about-company-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-3.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->
    <?php
    $sql = "SELECT * FROM counter WHERE id = 1";
    $counter = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    ?>
    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=$counter['client']?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>খুশি ক্লাইন্ট</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=$counter['project']?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>প্রকল্প</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=$counter['support']?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>সাপোর্টের ঘন্টা</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=$counter['worker']?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>পরিশ্রমী</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="row justify-content-around gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img src="assets/img/features-bg.jpg" alt=""></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <h3>আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</h3>
            <p>আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসিআমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-easel flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">আইটেম এক</a></h4>
                <p>আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি । সুন্দর ও মনোরম পরিবেশে  আপনার</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-patch-check flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">আইটেম দুই</a></h4>
                <p>আমার সোনার বাংলা আমি তোমায় ভালবাসি,আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">আইটেম তিন</a></h4>
                <p>আমার সোনার বাংলা আমি তোমায় ভালবাসি,আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">আইটেম চার</a></h4>
                <p>আমার সোনার বাংলা আমি তোমায় ভালবাসি,আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>

    </section><!-- /Features Section -->

  </main>