<?php
require "../include/dbcon.php";
if(isset($_REQUEST['username'])){//?username=5645&password=5467
    $user = $_REQUEST['username'];
    $pass =$_REQUEST['password'];

    $sql = "SELECT COUNT(*) as count FROM admin WHERE username = '$user'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    
    $count = $row['count'];
    if ($count > 0) {
        $sql = "SELECT * FROM admin WHERE username = '$user'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $id = $row['id'];
        $has_pass = $row['password'];

        if(password_verify($pass, $has_pass)){
            session_start();
            $_SESSION["admin"] = $id + 155;
            session_write_close();
            header("location: index.php");
        }else{
            header("location: login.php?error=password wrong..try again/forget password ..!");
        }
    }else{
        header("location: login.php?error=username not found on our database..!");
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .login{
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            max-width: 100%;
        }
        .l_form{
            display: block;
            margin: auto
        }
    </style>
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
    ?>
    <div class="report-body login">
        <div class="form_div l_form">
            <div class="responsive-form"> 
                <h3> 
                   Admin Login
                </h3> 
                <form class="form-container"> 
                    <label for="username" class="form-container-label"> 
                        Username : 
                    </label> 
                    <input type="text" id="username" name="username" placeholder="username" class="form-container-input" required> 

                    <label for="password" class="form-container-label"> 
                        Password : 
                    </label> 
                    <input type="password" id="password" name="password" placeholder="password" class="form-container-input" required> 
                    
                    <button type="submit" class="form-container-button"> 
                        Login 
                    </button> 
                </form> 
            </div>
        </div>
    </div>
</body>
</html>