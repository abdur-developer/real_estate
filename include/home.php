<?php
    require 'include/dbcon.php';
    
    $sql = "SELECT * FROM contact WHERE id = 1";
    $contact = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    
?>