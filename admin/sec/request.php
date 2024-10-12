<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Plan Request</h1>
    </div>

    <div class="report-body">
        <?php
            $sql = "SELECT nid.id, users.name, users.number FROM nid INNER JOIN users ON nid.user_id = users.id WHERE nid.status = 0";
            $ques_query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($ques_query) > 0){ ?>
                <table class="package">
                    <thead class="">
                        <tr>
                            <th><h3 class="t-op">Name</h3></th>
                            <th><h3 class="t-op">Number</h3></th>
                            <th><h3 class="t-op">Action</h3></th>
                        </tr>
                    </thead>
        
                    <tbody class="items">
                        <?php while($row = mysqli_fetch_assoc($ques_query)){ ?>
                        <tr>
                            <td><h3 class="t-op-nextlvl"><?= $row['name'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl"><?= $row['number'] ?></h3></td>
                            <td>
                                <h3 class='t-op-nextlvl'>
                                    <a href='?q=view-request&id=<?= $row['id'] ?>' class='view'>View</a>
                                </h3>
                            </td>
                            
                        </tr>
                        <?php }
                    echo "</tbody></table>";
                    }else{ ?>
                        <style>
                            .ptc-card {
                                border: 1px solid #6f125480;
                                padding: 10px 20px;
                                border-radius: 10px;
                                margin-top: 25px;
                                background: linear-gradient(to bottom, #6f125440, #fff) !important;
                            }
                            .ptc-card {
                                text-align: center;
                            }
                        </style>
                        <div class="ptc-card">
                            <h2>Data not found</h2>
                        </div>
                        <?php
                    }
                 ?>
    </div>
</div>