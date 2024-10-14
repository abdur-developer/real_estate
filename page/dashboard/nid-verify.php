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
    <?php include('page/dashboard/history.php'); ?>
</div>