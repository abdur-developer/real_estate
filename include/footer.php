<footer id="footer" class="footer light-background">

<div class="container">
  <div class="row gy-3">
    <div class="col-lg-3 col-md-6 d-flex">
      <i class="bi bi-geo-alt icon"></i>
      <div class="address">
        <h4>ঠিকানা</h4>
        <p style="font-family: sans-serif;"><?=$contact['address']?></p>
        
      </div>

    </div>

    <div class="col-lg-3 col-md-6 d-flex">
      <i class="bi bi-telephone icon"></i>
      <div>
        <h4>যোগাযোগ</h4>
        <p>
          <strong>ফোন:</strong> <span style="font-family: sans-serif;"><?=$contact['number']?></span><br>
          <strong>ইমেইল:</strong> <span style="font-family: sans-serif;"><?=$contact['email']?></span><br>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 d-flex">
      <i class="bi bi-clock icon"></i>
      <div>
        <h4>শুরুর ঘণ্টা</h4>
        <p>
          <strong><?=$contact['open_day']?>:</strong> <span style="font-family: sans-serif;"><?=$contact['open_time']?></span><br>
          <strong><?=$contact['close_day']?></strong>: <span>বন্ধ</span>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <h4>আমরা এখানেও</h4>
      <div class="social-links d-flex">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>copyright</span> <strong class="px-1 sitename" style="font-family: sans-serif;"><?=$contact['name']?></strong> <span>All right reserve</span></p>
  <!-- <div class="credits">
    Made by <a href="https://wa.me/8801709409266?text=Hello+I+am+visit+from+right+city+website" target="_blank">Abdur Rahman</a>
  </div> -->
</div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>