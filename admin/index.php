<?php
    require "admin.php";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible"
            content="IE=edge">
        <meta name="viewport"
            content="width=device-width, 
                   initial-scale=1.0">
        <title>Right City Admin</title>
        <link rel="stylesheet" href="style.css">
        <!-- Favicons -->
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <?php
            if(isset($_REQUEST['error'])){
                $error = $_REQUEST['error'];
                echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '$error'
                        });
                </script>
                ";
            }
            if(isset($_REQUEST['success'])){
                $success = $_REQUEST['success'];
                echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'WOW...',
                        text: '$success'
                        });
                </script>
                ";
            }
        ?>
        <!-- for header part -->
        <header>

            <div class="logosec">
                <div class="logo">Right City</div>
                <img src="img/menu.png" class="icn menuicn" id="menuicn" alt="menu-icon">
            </div>


            <div class="message">
                <div class="dp">
                    <img src="img/logo.png" class="dpicn" alt="dp">
                </div>
            </div>

        </header>

        <div class="main-container">
            <div class="navcontainer">
                <nav class="nav">
                    <div class="nav-upper-options">
                        <a href="index.php" class="nav_a">
                            <div class="nav-option logout">
                                <img src="img/slider.png" class="nav-img" alt="logout">
                                <h3>Service</h3>
                            </div>
                        </a>
                        <a href="?q=project" class="nav_a">
                            <div class="nav-option logout">
                                <img src="img/slider.png" class="nav-img" alt="logout">
                                <h3>Project</h3>
                            </div>
                        </a>
                        <a href="?q=users" class="nav_a">
                            <div class="nav-option option5">
                                <img src="img/category.png" class="nav-img" alt="blog">
                                <h3> Users</h3>
                            </div>
                        </a>
                        <a href="?q=request" class="nav_a">
                            <div class="nav-option option5">
                                <img src="img/category.png" class="nav-img" alt="blog">
                                <h3> NID Request</h3>
                            </div>
                        </a>
                        <a href="?q=footer" class="nav_a">
                            <div class="nav-option option5">
                                <img src="img/question.png" class="nav-img" alt="blog">
                                <h3> Footer</h3>
                            </div>
                        </a>
                        <a href="?q=setting" class="nav_a">
                            <div class="nav-option option6">
                                <img src="img/setting.png" class="nav-img" alt="settings">
                                <h3> Settings</h3>
                            </div>
                        </a>
                        <a href="logout.php" class="nav_a">
                            <div class="nav-option logout">
                                <img src="img/logout.png" class="nav-img" alt="logout">
                                <h3>Logout</h3>
                            </div>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="main">
                <?php
                    if(isset($_REQUEST['q'])){
                        $q = $_REQUEST['q'];
                        if($q == "service"){
                            include "sec/service.php";

                        }elseif($q == "setting"){
                            include "sec/setting.php";

                        }elseif($q == "project"){                            
                            include "sec/project.php";

                        }elseif($q == "view-project"){                            
                            include "sec/view-project.php";

                        }elseif($q == "users"){                            
                            include "sec/users.php";

                        }elseif($q == "view-user"){                            
                            include "sec/view-user.php";

                        }elseif($q == "view-service"){                            
                            include "sec/view-service.php";

                        }elseif($q == "footer"){                            
                            include "sec/footer.php";

                        }elseif($q == "view-request"){                            
                            include "sec/view-request.php";

                        }elseif($q == "request"){                            
                            include "sec/request.php";

                        }else{
                            include "sec/service.php";
                        }
                    }else{
                        include "sec/service.php";
                    }
                ?>
            </div>
        </div>

        <script>
        let menuicn = document.querySelector(".menuicn");
        let nav = document.querySelector(".navcontainer");

        menuicn.addEventListener("click", () => {
            nav.classList.toggle("navclose");
        })

    </script>
    </body>
</html>
