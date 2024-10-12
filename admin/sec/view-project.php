<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">
            Project Details
        </h1>
    </div>
    <?php
        $id = "";
        $type = ""; 
        $title = ""; 
        $location = ""; 
        $price = ""; 
        $area = ""; 
        $bed = ""; 
        $bath = ""; 
        $baranda = ""; 
        $geo_location = ""; 
        $video = "";
        $description = "";
        if(isset($_REQUEST['project'])){
            $id = $_REQUEST['project'] ;
            $sql = "SELECT * FROM projects WHERE id = $id";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

            $type = $row['type']; 
            $title = $row['title']; 
            $location = $row['location']; 
            $price = $row['price']; 
            $area = $row['area']; 
            $bed = $row['bed']; 
            $bath = $row['bath']; 
            $baranda = $row['baranda']; 
            $geo_location = $row['geo_location']; 
            $video = $row['video'];
            $description = $row['description'];
        }
    
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
        <!-- ================================================ -->
        <?php if(isset($_REQUEST['project'])){ ?>
            <table class="package">
                <tbody class="items">
                    <tr>
                        <style>
                            .cng_img{
                                display: flex;
                                margin: 5px;
                            }
                            .cng_img img{
                                height: 110px;
                                width: 50%;
                            }
                            .cng_img form{
                                width: 50%;
                            }
                            .img-btn{
                                margin-top: 10px;
                                background-color: lightcoral;
                                color: #000;
                                font-weight: 700;
                            }
                        </style>
                        <td>
                            <div class="cng_img">
                                <img src="../<?=$row['slider_1']?>" alt="">
                                <form method="post" enctype="multipart/form-data">                                    
                                    <input required type="file" name="file" class="input-fil">                                    
                                    <input required type="hidden" name="project_slide_1" value="<?=$id?>">
                                    <button type="submit" class="input-fil img-btn">Update</a>                                    
                                </form>
                            </div>
                            <div class="cng_img">
                                <img src="../<?=$row['slider_2']?>" alt="">
                                <form method="post" enctype="multipart/form-data">                                    
                                    <input required type="file" name="file" class="input-fil">                                    
                                    <input required type="hidden" name="project_slide_2" value="<?=$id?>">
                                    <button type="submit" class="input-fil img-btn">Update</a>                                    
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="cng_img">
                                <img src="../<?=$row['slider_3']?>" alt="">
                                <form method="post" enctype="multipart/form-data">                                    
                                    <input required type="file" name="file" class="input-fil">                                    
                                    <input required type="hidden" name="project_slide_3" value="<?=$id?>">
                                    <button type="submit" class="input-fil img-btn">Update</a>                                    
                                </form>
                            </div>
                            <div class="cng_img">
                                <img src="../<?=$row['model']?>" alt="">
                                <form method="post" enctype="multipart/form-data">                                    
                                    <input required type="file" name="file" class="input-fil">                                    
                                    <input required type="hidden" name="project_model" value="<?=$id?>">
                                    <button type="submit" class="input-fil img-btn">Update</a>                                    
                                </form>
                            </div>
                        </td>
                    </tr>         
                </tbody>
            </table>
        <?php } ?>
        <!-- ================================================ -->
        <form class="first" method="post" enctype="multipart/form-data">
            <table class="package">
                <tbody class="items">
                    <tr>
                        <td><h3 class="t-op-nextlvl">Type : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input required type="text" class="input-fil" name="type" value="<?=$type?>" placeholder="Enter project type (exp: Home)"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Title : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <textarea required class="input-fil" name="title" rows="3" placeholder="Enter project title"><?=$title?></textarea>
                        </h3></td>                 
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Address : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input required type="text" class="input-fil" name="location" value="<?=$location?>" placeholder="Enter Project Address"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Price : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input required type="text" class="input-fil" name="price" value="<?=$price?>" placeholder="Enter project price"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Area : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input required type="text" class="input-fil" name="area" value="<?=$area?>" placeholder="Enter Project Area"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Bedrooms : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input required type="number" class="input-fil" name="bed" value="<?=$bed?>" placeholder="Enter total bedrooms"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Bathroom : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input required type="number" class="input-fil" name="bath" value="<?=$bath?>" placeholder="Enter total bathrooms"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Verandah : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <input required type="text" class="input-fil" name="baranda" value="<?=$baranda?>" placeholder="Enter total verandah"/>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Map iframe : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <textarea required class="input-fil" name="geo" rows="5" placeholder="Enter google map iframe"><?=$geo_location?></textarea>
                        </h3></td>                 
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Youtube embed: </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <textarea required class="input-fil" name="video" rows="4" placeholder="Enter youtube video embed"><?=$video?></textarea>
                        </h3></td>                 
                    </tr>
                    <tr>
                        <td><h3 class="t-op-nextlvl">Description : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <textarea required class="input-fil" name="desc" rows="10"  placeholder="Enter About project"><?=$description?></textarea>
                        </h3></td>                 
                    </tr>
                    <?php if(!isset($_REQUEST['project'])){ ?>
                    <tr>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                Slider One (1280x720)
                            </h3>
                        </td>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <input required type="file" name="slider_1" class="input-fil">
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                Slider Two (1280x720)
                            </h3>
                        </td>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <input required type="file" name="slider_2" class="input-fil">
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                Slider Three (1280x720)
                            </h3>
                        </td>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <input required type="file" name="slider_3" class="input-fil">
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                Project Stracture (1280x720)
                            </h3>
                        </td>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <input required type="file" name="model" class="input-fil">
                            </h3>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                Action
                            </h3>
                        </td>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <input required type="hidden" name="project_update" value="<?php
                                 if(isset($_REQUEST['project'])) echo $id ;
                                 else echo "Add";
                                ?>">
                                <button type="submit" class='view'>Update</a>
                            </h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>