<main class="main">

<!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="heading d-none">
        <!-- <div class="container">
            <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
                <h1>প্রকল্প</h1>
                <p class="mb-0">আমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসিআমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসিআমার সোনার বাংলা আমি তোমায় ভালবাসি, আমার সোনার বাংলা আমি তোমায় ভালবাসি</p>
            </div>
            </div>
        </div> -->
    </div>
    <nav class="breadcrumbs" style = "padding: 100px 0 20px 0;">
    <div class="container">
        <ol>
        <li><a href="index.php">হোম</a></li>
        <li class="current">প্রকল্প</li>
        </ol>
    </div>
    </nav>
</div><!-- End Page Title -->

<!-- Real Abdur Section -->
<section id="project-sec" class="project-sec section">

    <div class="container">

    <div class="row gy-4">
        <?php
        $sql = "SELECT * FROM projects";
        $project_query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($project_query)){ 
            
            ?>
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <a href="?q=view-property&id=<?= encryptSt($row['id']) ?>">
                    <div class="card">
                        <div class="card-header">
                            <img src="<?=$row['slider_1']?>" alt="<?=$row['name']?>" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <span class="sale-rent" style="font-family: sans-serif;">
                                Sale | <b class="h6">৳ </b><?=$row['price']?>
                            </span>
                            <h3 class="text-white"><?=$row['location']?></h3>
                            <div class="card-content d-flex flex-column justify-content-center text-center">
                                <div class="row propery-info">
                                <div class="col">ক্ষেত্রফল(ft)</div>
                                <div class="col">বেডরুম</div>
                                <div class="col">বাথরুম</div>
                                <div class="col">বারান্দা</div>
                                </div>
                                <div class="row">
                                <div class="col"><?=$row['area']?></div>
                                <div class="col"><?=$row['bed']?></div>
                                <div class="col"><?=$row['bath']?></div>
                                <div class="col"><?=$row['baranda']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- End Property Item -->
        <?php } ?>
    </div>

    </div>

</section><!-- /Real Abdur Section -->

</main>