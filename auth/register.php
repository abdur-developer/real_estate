<?php
    function getRef(){
        GLOBAL $conn;
        $x = rand(101, 999)."".rand(101, 999);
        $sql = "SELECT COUNT(*) as c FROM users WHERE my_ref = '$x'";
        $fetch = mysqli_fetch_assoc(mysqli_query($conn, $sql));

        if($fetch['c'] == 0) return $x;
        else return getRef();
    }
    if(isset($_REQUEST['password'])){
        $name = $_REQUEST['name'];
        $number = $_REQUEST['number'];
        $email = $_REQUEST['email'];
        $ref = $_REQUEST['ref'];

        preg_match('/(\d+)-([A-Za-z]+)/', $ref, $matches);

        $password = $_REQUEST['password'];
        require "../include/dbcon.php";
        $sql = "SELECT COUNT(*) as count FROM users WHERE number = '$number'";
        $number_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $count = $number_row['count'];
        if ($count == 0) {
            $sql = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
            $number_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $count = $number_row['count'];
            if ($count == 0) {
                $encPass = encryptSt($password);
                $my_ref = getRef();
                $ot_ref = $matches['1'];
                $side = $matches['2'];
                $side_num = ($side == 'A') ? 1 : 2;

                $sql = "INSERT INTO users (name, number, email, password, my_ref, ref_side, ot_ref) VALUES ('$name', '$number', '$email', '$encPass', '$side_num', '$ot_ref')";
                if(mysqli_query($conn, $sql)){
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
                    header("location: sent.php?number=$number&type=verify");

                }else header("location: ../account.php?register&error=faild+registration");
            }else header("location: ../account.php?register&error=email+already+exists");
        }else header("location: ../account.php?register&error=number+already+exists");
    }else header("location: ../account.php?register&error=not+found");
    
?>