<?php
    require '../../../include/dbcon.php';
    if (isset($_POST['nid'])) {
        $input_nid = $conn->real_escape_string($_POST['nid']);
        $len = strlen($input_nid);
        if($len < 10){
            echo "minimum";
        }else if($len > 20){
            echo "maximum";
        }else{
            $sql = "SELECT id FROM users WHERE nid_number = '$input_nid'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                echo 'available';
            } else {
                echo 'not available';
            }
        }
    }
    
    $conn->close();
?>