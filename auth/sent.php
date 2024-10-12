<?php
require "../include/dbcon.php";
// =========================================================
$expire_time = time() + (300); // 5 minutes expiration
$path = "/"; // Available throughout the domain
$secure = true; // Only send over HTTPS
$httponly = true; // Not accessible via JavaScript
$samesite = 'Strict'; // Can be 'Strict' or 'Lax'
// Set the cookie
setcookie('dbv23563', '01709409266', [
    'expires' => $expire_time+8888800,
    'path' => $path,
    'domain' => $domain,
    'secure' => $secure,
    'httponly' => $httponly,
    'samesite' => $samesite,
]);
//==================================================================================================
if(isset($_REQUEST['number'])){
    $number = $_REQUEST['number'];
    $ac_type = $_REQUEST['type'];
    
    $otp = random_int(1001, 9999);
    $api_key = 'FINOfnWTiXsGphrghAWI';
    $type = 'text';
    $senderid = '8809617617903';
    $message = "Your Real State OTP is $otp . This otp expires after 5 minutes.";

    // URL তৈরি করা
    $url = "http://bulksmsbd.net/api/smsapi?api_key=" . urlencode($api_key) .
        "&type=" . urlencode($type) .
        "&number=" . urlencode($number) .
        "&senderid=" . urlencode($senderid) .
        "&message=" . urlencode($message);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if($response) {
        
        // =========================================================
        $expire_time = time() + (300); // 5 minutes expiration
        $path = "/"; // Available throughout the domain
        $secure = true; // Only send over HTTPS
        $httponly = true; // Not accessible via JavaScript
        $samesite = 'Strict'; // Can be 'Strict' or 'Lax'

        // Set the cookie
        setcookie('dbvdigv', $number, [
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
