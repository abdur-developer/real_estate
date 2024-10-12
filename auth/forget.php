<?php

    if($_REQUEST['number']){
        $number = $_REQUEST['number'];
        if(strlen($number) == 11){
            require "../include/dbcon.php";
            //==============================================
            $sql = "SELECT COUNT(*) as count FROM users WHERE number = '$number'";
            $number_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $count = $number_row['count'];
            if ($count > 0) {
                header("location: sent.php?number=$number&type=forget");
            }else header("location: ../account.php?forget&error=number+not+found+on+database");
        }else header("location: ../account.php?forget&error=number+need+maxmium+11+cheracter");
    }

?>