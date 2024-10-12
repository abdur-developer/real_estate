<?php
//?number=3543&password=dg
if(isset($_REQUEST['number'])){
    $number = $_REQUEST['number'];
    $pass_input = $_REQUEST['password'];
    
    require "../include/dbcon.php";
    $sql = "SELECT COUNT(*) as count FROM users WHERE number = '$number'";
    $number_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $count = $number_row['count'];
    if ($count > 0) {
        $sql = "SELECT * FROM users WHERE number = '$number'";
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
            setcookie("user_is_login", encryptSt($number), [
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
        header("location: ../account.php?error=number+not+found+on+our+database..!");
    }
}
?>