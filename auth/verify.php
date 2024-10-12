<?php
    if (isset($_COOKIE['dbvdigv'])) { //dbvdigv = coockie variable
        $number = $_COOKIE['dbvdigv'];

        if(isset($_REQUEST['four'])){
            require "../include/dbcon.php";

            $one = $_REQUEST['one'];
            $two = $_REQUEST['two'];
            $three = $_REQUEST['three'];
            $four = $_REQUEST['four'];
            $type = $_REQUEST['type'];

            $otp = $one.$two.$three.$four;
            
            $sql = "SELECT otp FROM users WHERE number = '$number'";
            $otp_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            if($otp == $otp_row['otp']){
                if($type == "forget"){

                    // =========================================================
                    $expire_time = time() + (300); // 5 minutes expiration
                    $path = "/"; // Available throughout the domain
                    $secure = true; // Only send over HTTPS
                    $httponly = true; // Not accessible via JavaScript
                    $samesite = 'Strict'; // Can be 'Strict' or 'Lax'
            
                    // Set the cookie
                    setcookie('dbv23563', $number, [ // dbv23563 = coockie variable
                        'expires' => $expire_time,
                        'path' => $path,
                        'domain' => $domain,
                        'secure' => $secure,
                        'httponly' => $httponly,
                        'samesite' => $samesite,
                    ]);
                    //=================================

                    header("location: ../account.php?change"); 
                }else{
                    $sql = "UPDATE users SET num_verify = '1' WHERE number = $number";
                    if(mysqli_query($conn, $sql)){
                        header("location: ../?q=dashboard");
                    }
                }
            }else echo "not match";
        }else echo "nai post";
    }else echo "nai";
?>