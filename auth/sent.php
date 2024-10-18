<?php
require "../include/dbcon.php";
// =========================================================
// $expire_time = time() + (300); // 5 minutes expiration
// $path = "/"; // Available throughout the domain
// $secure = true; // Only send over HTTPS
// $httponly = true; // Not accessible via JavaScript
// $samesite = 'Strict'; // Can be 'Strict' or 'Lax'
// // Set the cookie
// setcookie('dbv23563', '01709409266', [
//     'expires' => $expire_time+8888800,
//     'path' => $path,
//     'domain' => $domain,
//     'secure' => $secure,
//     'httponly' => $httponly,
//     'samesite' => $samesite,
// ]);
//==================================================================================================
if(isset($_REQUEST['number'])){
    $number = $_REQUEST['number'];
    $ac_type = $_REQUEST['type'];
    
    require '../sms/otp.php';

    if($response) {
        
        // =========================================================
        $expire_time = time() + (300); // 5 minutes expiration
        $path = "/"; // Available throughout the domain
        $secure = true; // Only send over HTTPS
        $httponly = true; // Not accessible via JavaScript
        $samesite = 'Strict'; // Can be 'Strict' or 'Lax'

        $sql = "SELECT username FROM users WHERE number = '$number'";
        $username_query = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        // Set the cookie
        setcookie('dbvdigv', $username_query['username'], [
            'expires' => $expire_time,
            'path' => $path,
            'domain' => $domain,
            'secure' => $secure,
            'httponly' => $httponly,
            'samesite' => $samesite,
        ]);
        // Set the cookie
        setcookie('wsygusyg', $expire_time, [
            'expires' => $expire_time,
            'path' => $path,
            'domain' => $domain,
            'secure' => $secure,
            'httponly' => $httponly,
            'samesite' => $samesite,
        ]);
        $sql = "UPDATE users SET otp = '$otp' WHERE number = '$number'";
        if(mysqli_query($conn, $sql)){
            header("location: ../account.php?verify&success=Successfully+sent+OTP&type=$ac_type");
        }
        // =========================================================
    }else header("location: ../account.php?error=something+wet+wrong+for+sending+OTP");
}
?>
