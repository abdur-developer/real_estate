<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Project</h1>
        <a href="?q=view-service" class="view">Add</a>
    </div>

    <div class="report-body">
        <?php
            $sql = "SELECT id, title, price, type FROM projects";
            $ques_query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($ques_query) > 0){ ?>
                <table class="package">
                    <thead class="">
                        <tr>
                            <th><h3 class="t-op">Type</h3></th>
                            <th><h3 class="t-op">Title</h3></th>
                            <th><h3 class="t-op">Price</h3></th>
                            <th><h3 class="t-op">Action</h3></th>
                        </tr>
                    </thead>
        
                    <tbody class="items">
                        <?php while($row = mysqli_fetch_assoc($ques_query)){ 
                            $id = $row['id']; ?>
                        <tr>
                            <td><h3 class="t-op-nextlvl"><?= $row['type'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl h3-max"><?= $row['title'] ?></h3></td>
                            <td><h3 class="t-op-nextlvl h3-max"><?= $row['price'] ?></h3></td>
                            <td>
                                <h3 class='t-op-nextlvl'>
                                <script>
                                    function confirmDelete(id) {
                                        const userConfirmed = confirm(`আপনি কি নিশ্চিত যে এই আইডিটি মুছে ফেলতে চান?`);
                                        if (userConfirmed) {
                                            window.location.href = `?project_del=${id}`;
                                        }
                                    }
                                </script>
                                    <a href='?q=view-project&project=<?= $id ?>' class='btn-true'>View</a>
                                    <button onclick="confirmDelete(<?= $id ?>)" class='btn-false'>Del</button>
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