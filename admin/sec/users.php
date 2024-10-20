<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">All users</h1>
        <a href="?q=add-user" class="view">Add</a>
    </div>

    <div class="report-body">
        <?php
            $sql = "SELECT * FROM users";
            $ques_query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($ques_query) > 0){ ?>
                <table class="package">
                    <thead class="">
                        <tr>
                            <th><h3 class="t-op">Name</h3></th>
                            <th><h3 class="t-op">Username</h3></th>
                            <th><h3 class="t-op">Number</h3></th>
                            <th><h3 class="t-op">Invest</h3></th>
                            <th><h3 class="t-op">Balance</h3></th>
                            <th><h3 class="t-op">Action</h3></th>
                        </tr>
                    </thead>
        
                    <tbody class="items">
                        <?php while($row = mysqli_fetch_assoc($ques_query)){ 
                            $ques_id = $row['id']; ?>
                        <tr>
                            <td><h3 class="t-op-nextlvl"><?= $row['name'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl"><?= $row['username'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl"><?= $row['number'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl"><?= $row['balance_invest'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl"><?= $row['balance'] ?></h3></td>
                            <td>
                                <h3 class='t-op-nextlvl'>
                                    <a href='?q=view-user&id=<?= $ques_id ?>' class='view'>View</a>
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