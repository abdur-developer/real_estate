<main class="main">
  <?php
    $enc_id = $_REQUEST['id'];
    $id = decryptSt($enc_id);
    $sql = "SELECT * FROM services WHERE id = $id";
    $service = mysqli_fetch_assoc(mysqli_query($conn, $sql));
  ?>
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading d-none">
      <!-- <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Service Details</h1>
            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div> -->
    </div>
    <nav class="breadcrumbs" style = "padding: 100px 0 20px 0;">
      <div class="container">
        <ol>
          <li><a href="index.php">হোম</a></li>
          <li class="current">সেবার বর্ণনা</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Service Details Section -->
  <section id="service-details" class="service-details section">

    <div class="container">

      <div class="row gy-5">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

          <div class="service-box">
            <h4>সেবার তালিকা</h4>
            <div class="services-list">
            <?php
              function isActiveItem($local_id){
                GLOBAL $id;
                if($local_id == $id) return "class='active'";
                else return "";
              }
              $sql = "SELECT id, name FROM services WHERE status = 1";
              $service_query = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($service_query)){
                $isActive = isActiveItem($row['id']);
                $name = $row['name'];
                $item_id = encryptSt($row['id']);
                echo "<a href='?q=view-service&id=$item_id' $isActive><i class='bi bi-arrow-right-circle'></i><span>$name</span></a>";
              }
            ?>
            </div>
          </div><!-- End Services List -->

          <!--<div class="service-box">
            <h4>Download Catalog</h4>
            <div class="download-catalog">
              <a href="#"><i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span></a>
              <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a>
            </div>
          </div> End Services List -->

          <div class="help-box d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-headset help-icon"></i>
            <h4>কোন প্রশ্ন আছে?</h4>
            <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span><?=$service['contact_num']?></span></p>
            <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:<?=$service['contact_email']?>"><?=$service['contact_email']?></a></p>
          </div>

        </div>

        <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
          <img src="assets/img/service/<?=$service['img']?>" alt="" class="img-fluid services-img">
          <h3><?=$service['title']?></h3>
          <p><?=$service['description']?></p>
          <!-- <ul>
            <li><i class="bi bi-check-circle"></i> <span>Aut eum totam accusantium voluptatem.</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
          </ul>
          <p>
            Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.
          <br>
            Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam aut consequuntur recusandae mollitia doloremque est architecto cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex repellendus eveniet velit sint quia sapiente cumque. Et ipsa perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum. Eaque iusto cupiditate et totam et quia dolorum in. Sunt molestiae ipsum at consequatur vero. Architecto ut pariatur autem ad non cumque nesciunt qui maxime. Sunt eum quia impedit dolore alias explicabo ea.
          </p> -->
        </div>

      </div>

    </div>

  </section><!-- /Service Details Section -->

</main>