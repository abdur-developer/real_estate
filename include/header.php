<?php

function isActive($tab){
  if(isset($_REQUEST['q'])){
    $q = $_REQUEST['q'];
    if($q == $tab) return "class='active'";
  }else{
    if($tab == 'x') return "class='active'";
  }
  return "";
}
?>
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="index.php" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="assets/img/logo.png" alt="">
      <h1 class="sitename">Right<span>City</span></h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php" <?=isActive("x")?>>হোম</a></li>
        <li><a href="?q=services" <?=isActive("services")?>>সেবা</a></li>
        <li><a href="?q=projects" <?=isActive("projects")?>>প্রকল্প</a></li>
        <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li> -->
        <li><a href="?q=document" <?=isActive("document")?>>কাগজপত্র</a></li>
        <li><a href="?q=contact" <?=isActive("contact")?>>যোগাযোগ</a></li>
        <li><a href="?q=about" <?=isActive("about")?>>পরিচালনা পর্ষদ</a></li>
        <?php
        if (isset($_COOKIE["user_is_login"])) {
          echo "<li><a href='?q=dashboard'". isActive("dashboard").">ড্যাশবোর্ড</a></li>";
          echo "<li><a href='logout.php'>লগ আউট</a></li>";
        }else{
        ?>
        <li><a href="account.php">লগইন</a></li>
        <?php } ?>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>
