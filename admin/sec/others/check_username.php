<?php
    require '../../../include/dbcon.php';
    if (isset($_POST['username'])) {
        $input_username = $conn->real_escape_string($_POST['username']);
        $sql = "SELECT id FROM users WHERE username = '$input_username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            echo 'available';
        } else {
            echo 'not available';
        }
    }
    
    $conn->close();
?>