<main class="main">
    <?php
        if (!isset($_COOKIE["user_is_login"])) header("location: ?error+=please+login!");
        $user_cookie = $_COOKIE['user_is_login'];
        
        $sql = "SELECT * FROM users WHERE number = '".decryptSt($user_cookie)."'";
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
    <!-- Section Title -->
     <?php if($user['nid_verify'] == '2'){ ?>
    <div class="container section-title" data-aos="fade-up">
        <!-- ==================================================================== -->
        <style>
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .dashboard .box {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .dashboard .box:hover {
            transform: scale(1.05);
        }

        .dashboard .box1 {
            background-color: #e7f9e7; /* হালকা সবুজ */
        }

        .dashboard .box2 {
            background-color: #e7f0f9; /* হালকা নীল */
        }

        .dashboard .box3 {
            background-color: #f9e7e7; /* হালকা লাল */
        }

        .dashboard .box4 {
            background-color: #f9f7e7; /* হালকা হলুদ */
        }

        .dashboard h3 {
            margin: 10px 0 5px;
        }

        .dashboard p {
            font-size: 1.2em;
            font-weight: bold;
        }

        .dashboard i {
            font-size: 2em;
            margin-bottom: 10px;
            display: block;
        }

        </style>
        <div class="dashboard">
            <div class="box box1">
                <i class="fas fa-chart-line"></i>
                <h3>রেফার</h3>
                <p>৳ <?=$user['balance_refer']?></p>
            </div>
            <div class="box box2">
                <i class="fas fa-chart-pie"></i>
                <h3>কমিশন</h3>
                <p>৳ <?=$user['balance_comm']?></p>
            </div>
            <div class="box box3">
                <i class="fas fa-wallet"></i>
                <h3>ইনভেস্ট</h3>
                <p>৳ <?=$user['balance_invest']?></p>
            </div>
            <div class="box box4">
                <i class="fas fa-dollar-sign"></i>
                <h3>ব্যালেন্স</h3>
                <p>৳ <?=$user['balance']?></p>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <!-- ==================================================================== -->

        <table class="table">
            <tr>
                <style>
                    .inv-btn{
                        display: inline-block;
                        text-align: center;
                        text-decoration: none;
                        padding: 5px 15px;
                        border: none;
                        border: 2px solid #ff2200;
                        cursor: pointer;
                        font-size: 14px;
                        border-radius: 10px;
                        background-color: #fff;
                        color: #ff2200;
                    }
                    .inv-btn:hover{
                        color: white;
                        background-color: #ff2200;
                    }
                </style>
                <td><button class="inv-btn" id="open_A">ইনভেস্টর অ্যাড করুন - A</button></td>
                <td><button class="inv-btn" id="open_B">ইনভেস্টর অ্যাড করুন - B</button></td>
                <!-- ========================= -->
                 <style>
                    .popup {
                        display: none;
                        position: fixed;
                        z-index: 999999;
                        width: 100%;
                        height: 100%;
                        top: 0;
                        left: 0;
                        margin: 0 auto;
                    }
                    .popup .main{
                        width: 100%;
                        height: 100%;
                        display: flex;
                        justify-content: center;
                        background-color: rgba(0, 0, 0, 0.6);
                        align-items: center;
                        animation: fadeIn 0.5s;
                        
                    }

                    .popup-content {
                        background-color: white;
                        padding: 10px 10px 25px 10px;
                        border-radius: 10px;
                        width: 400px;
                        max-width: 80%;
                        text-align: center;
                        animation: popupShow 0.5s ease;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                    }

                    

                    @keyframes fadeIn {
                        from {opacity: 0;}
                        to {opacity: 1;}
                    }

                    @keyframes popupShow {
                        0% {
                            transform: scale(0.5);
                            opacity: 0;
                        }
                        100% {
                            transform: scale(1);
                            opacity: 1;
                        }
                    }
                    .btn-container{
                        display: flex;
                        justify-content: end;
                    }
                    .close-btn {
                        font-size: 24px;
                        cursor: pointer;
                    }
                    .popup input{
                        max-width: 200px;
                        margin: auto;
                        font-size: 13px;
                        font-family: monospace;
                    }
                 </style>
                <div id="popup" class="popup">
                    <div class="main">
                        <div class="popup-content">
                            <div class="btn-container">
                                <span id="closePopupBtn" class="close-btn">&times;</span>
                            </div>
                            <h2>ইনভেস্টর অ্যাড করুন</h2>
                            <div class="text-copy d-flex justify-content-center">
                                <label class="m-auto" for="link">Refer Link : </label>
                                <input type="text" disabled id="link">
                                <button class="btn btn-warning m-auto" id="copy-link">Copy</button>
                            </div>
                            <div class="text-copy d-flex justify-content-center mt-3">
                                <label class="m-auto" for="code">Refer Code : </label>
                                <input type="text" disabled id="code">
                                <button class="btn btn-primary m-auto" id="copy-code">Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    const open_A = document.getElementById('open_A');
                    const open_B = document.getElementById('open_B');
                    const closePopupBtn = document.getElementById('closePopupBtn');
                    const popup = document.getElementById('popup');
                    const code = document.getElementById('code');
                    const link = document.getElementById('link');

                    document.getElementById('copy-link').addEventListener('click', () => {
                        popup.style.display = 'none';
                        navigator.clipboard.writeText(link.value).then(() => {
                            Swal.fire({
                                icon: 'success',
                                title: 'WOW...',
                                text: 'successfully copy'
                            });
                        }).catch(err => {
                            Swal.fire({
                                icon: 'error',
                                title: 'OPS...',
                                text: 'Something wrong'
                            });
                        });
                    });
                    document.getElementById('copy-code').addEventListener('click', () => {
                        popup.style.display = 'none';
                        navigator.clipboard.writeText(code.value).then(() => {
                            Swal.fire({
                                icon: 'success',
                                title: 'WOW...',
                                text: 'successfully copy'
                            });
                        }).catch(err => {
                            Swal.fire({
                                icon: 'error',
                                title: 'OPS...',
                                text: 'Something wrong'
                            });
                        });
                    });

                    open_A.addEventListener('click', () => {
                        code.value = "<?=$user['my_ref']?>-A";
                        link.value = "https://www.rcrel.com/account.php?register&ref=<?=$user['my_ref']?>-A";
                        popup.style.display = 'flex';
                    });
                    open_B.addEventListener('click', () => {
                        code.value = "<?=$user['my_ref']?>-B";
                        link.value = "https://www.rcrel.com/account.php?register&ref=<?=$user['my_ref']?>-B";
                        popup.style.display = 'flex';
                    });

                    closePopupBtn.addEventListener('click', () => {
                        popup.style.display = 'none';
                    });

                    window.addEventListener('click', (e) => {
                        if (e.target == popup) {
                            popup.style.display = 'none';
                        }
                    });

                </script>
                <!-- ========================= -->
            </tr>
            <tr>
                <th>টিম এ</th>
                <th>টিম বি</th>
            </tr>
            <?php

                $sql_a = "SELECT name FROM users WHERE ref_side = '1' AND ot_ref = '".$user['my_ref']."' AND ref_side != '0'";
                $query_a = mysqli_query($conn, $sql_a);

                $sql_b = "SELECT name FROM users WHERE ref_side = '2' AND ot_ref = '".$user['my_ref']."' AND ref_side != '0'";
                $query_b = mysqli_query($conn, $sql_b);

                // Initialize arrays to store results
                $names_a = [];
                $names_b = [];

                // Fetch data from query A
                while($row_a = mysqli_fetch_assoc($query_a)) {
                    $names_a[] = $row_a['name'];
                }

                // Fetch data from query B
                while($row_b = mysqli_fetch_assoc($query_b)) {
                    $names_b[] = $row_b['name'];
                }

                // Get the maximum length of both arrays to loop through them
                $max_length = max(count($names_a), count($names_b));

                // Loop through both arrays and output results
                for ($i = 0; $i < $max_length; $i++) {
                    echo "<tr>";
                    
                    // Output name from array A if it exists
                    if (isset($names_a[$i])) {
                        echo "<td>".$names_a[$i]."</td>";
                    } else {
                        echo "<td></td>";
                    }
                    
                    // Output name from array B if it exists
                    if (isset($names_b[$i])) {
                        echo "<td>".$names_b[$i]."</td>";
                    } else {
                        echo "<td></td>";
                    }
                    
                    echo "</tr>";
                }
            ?>
        </table>
    </div><!-- End Section Title -->
    <?php }elseif($user['nid_verify'] == '1'){ ?>
        <div class="container" data-aos="fade-up">
            <h5 class="text-center">আপনার NID কন্ট্রোল প্যানেল থেকে ম্যানুয়ালি ভেরিফিকেশন করা হচ্ছে...</h5>
            <h6 class="text-center">দয়া করে! কিছু সময় দিবেন।</h6>
            <div style="max-width: 400px; margin: 0 auto;">
                <img src="assets/img/pending.jpg" class="img-fluid">
            </div>

        </div>
    <?php }else{ ?>
        <div class="container" data-aos="fade-up">
            <!-- ============================================================= -->
             <style>
                .nid_upload {
                    background: white;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                .nid_upload h2 {
                    text-align: center;
                }

                .nid_upload label {
                    display: block;
                    margin: 15px 0 5px;
                }

                .nid_upload input[type="file"] {
                    width: 100%;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                .nid_upload button {
                    width: 100%;
                    padding: 10px;
                    background-color: #28a745;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                .nid_upload button:hover {
                    background-color: #218838;
                }
                .verify-img{
                    display: block;
                    margin: 0 auto;
                    height: auto;
                    max-width: 70%;
                }
                @media screen and (max-width: 768px){
                    .verify-img{
                        max-width: 100%;
                    }
                }
             </style>
            <!-- ============================================================= -->
            <img src="assets/img/verify.png" class="verify-img">
            <div class="nid_upload">
                <h2>NID আপলোড করুন</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="front_image">ফ্রন্ট ইমেজ:</label>
                    <input type="file" name="front" id="front_image" required>

                    <input type="hidden" name="id" value="<?=$user['id']?>">

                    <label for="back_image">ব্যাক ইমেজ:</label>
                    <input type="file" name="back" id="back_image" required>

                    <button type="submit">আপলোড করুন</button>
                </form>
            </div>
        </div>
    <?php } ?>

  </section><!-- /Starter Section Section -->

</main>