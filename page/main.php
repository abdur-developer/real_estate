
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>আমাদের সেবা সমূহ</h2>
        <p>আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</p>
      </div><!-- End Section Title -->

      <?php require 'page/sub/service.php'; ?>

    </section><!-- /Services Section -->

    <!-- Agents Section -->
    <section id="agents" class="agents section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>আমাদের এজেন্ট</h2>
        <p>আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</p>
      </div><!-- End Section Title -->

      <?php require 'page/sub/agent.php'; ?>

    </section><!-- /Agents Section -->

    <?php include('page/sub/testimonial.php'); ?>
    

  </main>
