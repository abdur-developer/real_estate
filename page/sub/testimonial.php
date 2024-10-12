<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>প্রশংসাপত্র</h2>
  <p>নিচে আমাদের কিছু ক্লাইন্টের রিভিউ দেওয়া হল</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 1,
            "spaceBetween": 40
          },
          "1200": {
            "slidesPerView": 3,
            "spaceBetween": 1
          }
        }
      }
    </script>
    <div class="swiper-wrapper">
        <?php
            $sql = "SELECT * FROM testimonial";
            $testimonial_query = mysqli_query($conn, $sql);
            while($testimonial = mysqli_fetch_array($testimonial_query)){
          ?>
      <div class="swiper-slide">
        <div class="testimonial-item">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p><?=$testimonial['txt']?></p>
          <div class="profile mt-auto">
            <img src="assets/img/testimonials/<?=$testimonial['img']?>" class="testimonial-img" alt="">
            <h3><?=$testimonial['name']?></h3>
            <h4><?=$testimonial['post']?></h4>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>

</div>

</section><!-- /Testimonials Section -->