<?php
    require 'include/dbcon.php';
    
    $sql = "SELECT * FROM contact WHERE id = 1";
    $contact = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if(isset($_FILES['front'])){
        $id = $_POST['id'];
        $temp_front = uploadImage("assets/img/nid/front/", $_FILES['front']);
        $temp_back = uploadImage("assets/img/nid/back/", $_FILES['back']);

        if($temp_front['upload_ok'] && $temp_back['upload_ok']){
            $sql = "INSERT INTO nid (front, back, user_id) VALUES ('".$temp_front['terget_file']."', '".$temp_back['terget_file']."', '$id')";
            mysqli_query($conn, $sql);
            $sql = "UPDATE users SET nid_verify = '1' WHERE id = $id";
            if(mysqli_query($conn, $sql)) header("location: ?q=dashboard&success=successfully+upload+please+wait+for+varification");
        }
    }
    // =====================================================Upload Image Function
        function uploadImage($terget_dir, $img_file){
            $terget_file = $terget_dir . rand(10000,99999) .basename($img_file['name']);
            $upload_ok = true;
            $imgFileType = strtolower(pathinfo($terget_file, PATHINFO_EXTENSION));
            $check = getimagesize($img_file['tmp_name']);
            $massage = "";
            if($check !== false){
                $massage = "File is an image - . ";
                $upload_ok = true;
            }else{
                $massage = "File is not an image. ";
                $upload_ok = false;
            }
            if(file_exists($terget_file)){
                unlink($terget_file);
            }
            if($img_file['size'] > 5000000){
                $massage = "File is too large. ";
                $upload_ok = false;
            }
            if($imgFileType != 'jpg' && $imgFileType != 'png' && $imgFileType != 'jpeg' && $imgFileType != 'gif' && $imgFileType != 'svg'){
                $massage = "Only JPG, JPEG, SVG PNG and GIF files are allowd.";
                $upload_ok = false;
            }
            if($upload_ok){
                if(move_uploaded_file($img_file['tmp_name'], $terget_file)){
                    $massage = "The file ". htmlspecialchars(basename($img_file['name']))." has been uploaded.";
                }else{
                    $massage = "there was an error uploading your image.";
                    $upload_ok = false;
                }
            }
            $temp = array();
            $temp['terget_file'] = $terget_file;
            $temp['upload_ok'] = $upload_ok;
            $temp['massage'] = $massage;
            return $temp;
        }
    // =====================================================Upload Image Function
?>