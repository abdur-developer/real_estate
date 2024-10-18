<?php
//?username=3543&password=dg
if(isset($_REQUEST['username'])){
    $username = $_REQUEST['username'];
    $pass_input = $_REQUEST['password'];
    
    require "../include/dbcon.php";
    $sql = "SELECT COUNT(*) as count FROM users WHERE username = '$username'";
    $username_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $count = $username_row['count'];
    if ($count > 0) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $password_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $id = $password_row['id'];
        $has_pass = $password_row['password'];
        $decrypt = decryptSt($has_pass);
        
        if($decrypt == $pass_input){
            //==============================================================
            $expire_time = time() + (86400 * 3); // 3 days expiration
            $path = "/"; // Available throughout the domain
            $secure = true; // Only send over HTTPS
            $httponly = true; // Not accessible via JavaScript
            $samesite = 'Strict'; // Can be 'Strict' or 'Lax'

            // Set the cookie
            setcookie("user_is_login", encryptSt($username), [
                'expires' => $expire_time,
                'path' => $path,
                'domain' => $domain,
                'secure' => $secure,
                'httponly' => $httponly,
                'samesite' => $samesite,
            ]);

            //========================================================
            header("location: ../?q=dashboard");
        }else{
            header("location: ../account.php?error=password+wrong..try+again/forget+password ..!");
        }
    }else{
        header("location: ../account.php?error=username+not+found+on+our+database..!");
    }
}
?>