<main class="main">
    <?php
        if (!isset($_COOKIE["user_is_login"])) header("location: ?error+=please+login!");
        $user_cookie = $_COOKIE['user_is_login'];
        
        $sql = "SELECT * FROM users WHERE username = '".decryptSt($user_cookie)."'";
        $query = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($query);
        
    ?>
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading d-none">
      <!-- <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Documents</h1>
            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div> -->
    </div>
    <nav class="breadcrumbs" style = "padding: 100px 0 20px 0;">
      <div class="container">
        <ol>
          <li><a href="index.php">হোম</a></li>
          <li class="current">ড্যাশবোর্ড</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Starter Section Section -->
  <section id="starter-section" class="starter-section section">
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-family: serif;
            font-weight: 700;
        }
        .table th, .table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            width: 50%; /* Set both columns to 50% width */
        }
        .table th {
            background-color: #4CAF50;
            color: white;
        }
        .table tr:hover {
            background-color: #f1f1f1;
        }

    </style>
    <!-- ================================================================================= -->
    <?php 
    if($user['ban'] == '1'){ 
        include('page/dashboard/ban.php');

    }elseif($user['nid_verify'] == '1'){
        include('page/dashboard/nid-verify.php');

    // }elseif($user['nid_verify'] == ''){
    //     include('page/dashboard/nid-pending.php');
        
    }else{
        include('page/dashboard/nid-upload.php');        
    } 
    ?>

  </section><!-- Starter Section Section -->
</main>