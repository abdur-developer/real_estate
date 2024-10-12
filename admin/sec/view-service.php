<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">
            Service Details
        </h1>
    </div>
    <?php
    $id = $_REQUEST['service'] ;
    $sql = "SELECT * FROM services WHERE id = $id";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    ?>
    <style>
        .img img{
            width: 200px;
            height: 200px;
            border-radius: 50%;
            display: block;
            margin: auto;
        }
        input{
            font-size: 15px;
            padding: 3px 10px;
            width: 100%;
            font-weight: 500;
        }
    </style>
    <div class="report-body">
        <!-- <form action="" method="post" enctype="multipart/form-data"  style="margin: 10px auto; max-width: 200px;">
            <style>
                .form-group {
                    display: flex;
                    align-items: center;
                    margin-bottom: 15px;
                }
                .form-group input[type="submit"] {
                    width: 100%;
                    padding: 10px;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                .form-group input[type="submit"]:hover {
                    background-color: #0056b3;
                }

            </style>
            <div class="form-group">
                <style>
                    .product-img{
                        width: 100%;
                        margin: 0 auto;
                    }
                </style>
                <img src="<?= $row['icon'] ?>" class="product-img">
            </div>
            <div class="form-group">
                <input type='hidden' name='image_job_2' value="">
                <input type='hidden' name='id' value="<?= $job_id ?>">
                <input type="file" name="icon" required/>
            </div>
            <div class="form-group">
                <input type="submit" value="সাবমিট করুন">
            </div>
        </form> -->
        <form class="first" method="post">
            <table class="package">
                <tbody class="items">
                    <tr>
                        <td><h3 class="t-op-nextlvl">Name : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input type="text" class="input-fil" name="name" value="<?=$row['name']?>"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Title : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <textarea class="input-fil" name="title" rows="3"><?=$row['title']?></textarea>
                        </h3></td>                 
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Description : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <textarea class="input-fil" name="desc" rows="7"><?=$row['description']?></textarea>
                        </h3></td>                 
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Contact Number : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input type="text" class="input-fil" name="number" value="<?=$row['contact_num']?>"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Contact Email : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input type="email" class="input-fil" name="email" value="<?=$row['contact_email']?>"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                Action
                            </h3>
                        </td>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <input type="hidden" name="service_edit" value="<?= $id ?>">
                                <button type="submit" class='view'>Update</a>
                            </h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>