<?php 
    if(isset($_COOKIE['dbv23563']) && $_REQUEST['password']){
        $pass = $_REQUEST['password'];
        $number = $_COOKIE['dbv23563'];
        require "../include/dbcon.php";
        
        $encPass = encryptSt($pass);
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
        $sql = "UPDATE users SET password = '$encPass' WHERE number = '$number'";
        echo $sql;
        if(mysqli_query($conn, $sql)){
            header("location: ../?q=dashboard");
        }
    }
?>