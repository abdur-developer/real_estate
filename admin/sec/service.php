<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Services</h1>
        <!-- <a href="?q=view-service" class="view">Add</a> -->
    </div>

    <div class="report-body">
        <?php
            $sql = "SELECT id, name, title, status FROM services";
            $ques_query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($ques_query) > 0){ ?>
                <table class="package">
                    <thead class="">
                        <tr>
                            <th><h3 class="t-op">Name</h3></th>
                            <th><h3 class="t-op">Title</h3></th>
                            <th><h3 class="t-op">Status</h3></th>
                            <th><h3 class="t-op">Action</h3></th>
                        </tr>
                    </thead>
        
                    <tbody class="items">
                        <?php while($row = mysqli_fetch_assoc($ques_query)){ 
                            $id = $row['id']; ?>
                        <tr>
                            <td><h3 class="t-op-nextlvl"><?= $row['name'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl h3-max"><?= $row['title'] ?></h3></td>
                            
                            <td>
                                <h3 class='t-op-nextlvl'>
                                    <?php
                                        if($row['status'] == '0'){
                                            echo "<a href='?service_action=$id&on' class='btn-false'>Off</a>";
                                        }else{
                                            echo "<a href='?service_action=$id&off' class='btn-true'>On</a>";
                                        }
                                    ?>
                                </h3>
                            </td>
                            
                            <td>
                                <h3 class='t-op-nextlvl'>
                                    <a href='?q=view-service&service=<?= $id ?>' class='view'>View</a>
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