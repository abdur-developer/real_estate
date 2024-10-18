<?php
    require "include/dbcon.php";

    $sql = "SELECT id, right_point, left_point FROM users";
    $query = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($query)){
        $l = $row['left_point'];
        $r = $row['right_point'];
        if($l >= 1000000 && $r >= 1000000){
            //1M maching
        }elseif($l >= 500000 && $r >= 500000){
            //500k maching
        }elseif($l >= 300000 && $r >= 300000){
            //300k maching
        }elseif($l >= 200000 && $r >= 200000){
            //200k maching
        }elseif($l >= 100000 && $r >= 100000){
            //100k maching
        }
    }

?>