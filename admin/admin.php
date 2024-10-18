<?php
    require "../include/dbcon.php";
    session_start();
    if(!isset($_SESSION["admin"])){
        header("location: login.php");
        exit();
    }

    // =====================================================Upload Image Function
    function uploadImage($terget_dir, $img_file){
        $terget_file = $terget_dir . rand(10000,99999) .basename($img_file['name']);
        $upload_ok = true;
        $imgFileType = strtolower(pathinfo("../".$terget_file, PATHINFO_EXTENSION));
        $check = getimagesize($img_file['tmp_name']);
        $massage = "";
        if($check !== false){
            $massage = "File is an image - . ";
            $upload_ok = true;
        }else{
            $massage = "File is not an image. ";
            $upload_ok = false;
        }
        if(file_exists("../".$terget_file)){
            unlink("../".$terget_file);
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
            if(move_uploaded_file($img_file['tmp_name'], "../".$terget_file)){
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

    // ============================================================admin details
    if(isset($_REQUEST['set_username'])){
        $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id = 1"));
        $name = $_REQUEST['set_username'];
        $pass = $_REQUEST['set_password'];
        if(password_verify($pass, $admin['password'])){
            $sql = "UPDATE admin SET username = '$name' WHERE id = 1";
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully updated name and number&q=setting");
            }
        }else{
            header("location: ?error=invalid password&q=setting");
        }
        exit();
    }
    //password
    if(isset($_REQUEST['con_password'])){
        $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id = 1"));
        $password = $_REQUEST['set_password'];
        $new = $_REQUEST['new_password'];
        $confirm = $_REQUEST['con_password'];
        if(password_verify($password, $admin['password'])){
            if($new === $confirm){
                if(strlen($new) >= 6){
                    $has_pass = password_hash($new, PASSWORD_DEFAULT);
                    $sql = "UPDATE admin SET password = '$has_pass' WHERE id = 1";
                    if(mysqli_query($conn, $sql)){
                        header("location: ?success=Successfully updated password&q=setting");
                    }
                }else{
                    header("location: ?error=New password must be minimum 6 characters long&q=setting");
                }
            }else{
                header("location: ?error=not match confirm password&q=setting");
            }
        }else{
            header("location: ?error=invalid password&q=setting");
        }
        exit();
    }
    // ============================================================ admin details
    // ============================================================ slider details
    //slider_file, slider_id
    
    if(isset($_FILES['slider_file'])){

        $terget_dir = "upload/slider/";
        $terget_file = $terget_dir . basename($_FILES['slider_file']['name']);
        $upload_ok = true;
        $imgFileType = strtolower(pathinfo($terget_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['slider_file']['tmp_name']);
        $massage = "";
        if($check !== false){
            $massage = "File is an image - . ";
            $upload_ok = true;
        }else{
            $massage = "File is not an image. ";
            $upload_ok = false;
        }
        if(file_exists($terget_file)){
            $massage = "File is already exists. ";
            unlink($terget_file);
        }
        if($_FILES['slider_file']['size'] > 5000000){
            $massage = "File is too large. ";
            $upload_ok = false;
        }
        if($imgFileType != 'jpg' && $imgFileType != 'png' && $imgFileType != 'jpeg' && $imgFileType != 'gif' && $imgFileType != 'svg'){
            $massage = "Only JPG, JPEG, SVG PNG and GIF files are allowd.";
            $upload_ok = false;
        }
        if($upload_ok){
            if(move_uploaded_file($_FILES['slider_file']['tmp_name'], $terget_file)){
                $massage = "The file ". htmlspecialchars(basename($_FILES['slider_file']['name']))." has been uploaded.";
            }else{
                $massage = "there was an error uploading your image.";
                $upload_ok = false;
            }
        }
        $sql = "";
        if(isset($_REQUEST['slider_id'])){
            $slider_id = $_REQUEST['slider_id'];
            
            $slider = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM slider WHERE id = $slider_id"));
            unlink($slider['link']);

            $sql = "UPDATE slider SET link = '$terget_file' WHERE id = $slider_id";
        }else{
            $sql = "INSERT INTO slider (link) VALUES ('$terget_file')";
        }

        if($upload_ok){
            mysqli_query($conn, $sql);
            header("location: ?q=slider&success=$massage");
        }else{
            header("location: ?q=slider&error=$massage");
        }
        exit();
    }
    // ============================================================ slider details
    // ============================================================ service action
    if(isset($_REQUEST['service_action'])){
        $id = $_REQUEST['service_action'];
        $sql = "";
        if(isset($_REQUEST['on'])){
            $sql = "UPDATE services SET status = '1' WHERE id = '$id'";
        }else{
            $sql = "UPDATE services SET status = '0' WHERE id = '$id'";        
        }
        if(mysqli_query($conn, $sql)) header("location: ?index.php");
        exit();
    }
    //==========
    if(isset($_REQUEST['service_edit'])){ 
        $id = $_REQUEST['service_edit'];
        $name = $_REQUEST['name'];
        $title = $_REQUEST['title'];
        $desc = $_REQUEST['desc'];
        $number = $_REQUEST['number'];
        $email = $_REQUEST['email'];
        $desc = mysqli_real_escape_string($conn, $desc);
        $title = mysqli_real_escape_string($conn, $title);

        $sql = "UPDATE services SET name = '$name', title = '$title', description = '$desc', contact_num = '$number', contact_email = '$email' WHERE id = '$id'";
        if(mysqli_query($conn, $sql)) header("location: ?q=view-service&service=$id&success=updated successfully");
        exit();
    }
    // ============================================================ service action
    // ============================================================ service action

    // ============================================================ project action
    if(isset($_REQUEST['project_del'])){
        $id = $_REQUEST['project_del'];

        $sql = "DELETE FROM projects WHERE id = $id";
        if(mysqli_query($conn, $sql)) header("location: ?q=project");
        exit();
    }
    if(isset($_REQUEST['project_update'])){
        $id = $_REQUEST['project_update'];
        
        $type = $_REQUEST['type'];
        $title = htmlspecialchars($_REQUEST['title'], ENT_QUOTES, 'UTF-8');
        $location = $_REQUEST['location'];
        $price = $_REQUEST['price'];
        $area = $_REQUEST['area'];
        $bed = $_REQUEST['bed'];
        $bath = $_REQUEST['bath'];
        $baranda = $_REQUEST['baranda'];
        
        $desc = mysqli_real_escape_string($conn, $_REQUEST['desc']);
        $geo = mysqli_real_escape_string($conn, $_REQUEST['geo']);
        $video = mysqli_real_escape_string($conn, $_REQUEST['video']);

        if($id == "Add"){
            $terget_dir = "assets/img/projects/";

            $temp_sl_1 = uploadImage($terget_dir, $_FILES['slider_1']);
            $temp_sl_2 = uploadImage($terget_dir, $_FILES['slider_2']);
            $temp_sl_3 = uploadImage($terget_dir, $_FILES['slider_3']);
            $temp_model = uploadImage("assets/img/model/", $_FILES['model']);

            
            if($temp_sl_1['upload_ok'] && $temp_sl_2['upload_ok'] && $temp_sl_3['upload_ok'] && $temp_model['upload_ok']) {
                $sql = "INSERT INTO projects (title, description, type, location, price, area, bed, bath, baranda, slider_1, slider_2, slider_3, video, model, geo_location) VALUES ('$title', '$desc', '$type', '$location', '$price', '$area', '$bed', '$bath', '$baranda', '".$temp_sl_1['terget_file']."', '".$temp_sl_2['terget_file']."', '".$temp_sl_3['terget_file']."', '$video', '".$temp_model['terget_file']."', '$geo')";
                
                if(mysqli_query($conn, $sql)) header("location: ?q=view-&project=".mysqli_insert_id($conn)."&success=update+Successfully+Complete");
            }else{
                header("location: ?q=view-project&error=image+not+uploaded");
            }
            exit();

        }else{
            $sql = "UPDATE projects SET title = '$title', description = '$desc', type = '$type', location = '$location', price = '$price', area = '$area', bed = '$bed', bath = '$bath', baranda = '$baranda', video = '$video', geo_location = '$geo' WHERE id = '$id'";
            if(mysqli_query($conn, $sql)) header("location: ?q=view-project&project=$id&success=update+Successfully+Complete");
            exit();
        }

    }
    //update image
    function updateProjectImg($id, $sql){
        GLOBAL $conn;
        if(mysqli_query($conn, $sql)) header("location: ?q=view-project&project=$id&success=successfully+update");
        else header("location: ?q=view-project&project=$id&error=something+wet+wrong");
        exit();
    }
    //===================
    if(isset($_REQUEST['project_slide_1'])){
        $id = $_REQUEST['project_slide_1'];
        $temp = uploadImage("assets/img/projects/", $_FILES['file']);
        if($temp['upload_ok']){
            $sql = "UPDATE projects SET slider_1 = '".$temp['terget_file']."' WHERE id = $id";
            updateProjectImg($id, $sql);
        }else header("location: ?q=view-project&project=$id&error=something+wet+wrong");
        exit();
    }
    //===================
    if(isset($_REQUEST['project_slide_2'])){
        $id = $_REQUEST['project_slide_2'];
        $temp = uploadImage("assets/img/projects/", $_FILES['file']);
        if($temp['upload_ok']){
            $sql = "UPDATE projects SET slider_2 = '".$temp['terget_file']."' WHERE id = $id";
            updateProjectImg($id, $sql);
        }else header("location: ?q=view-project&project=$id&error=something+wet+wrong");
        exit();
    }
    //===================
    if(isset($_REQUEST['project_slide_3'])){
        $id = $_REQUEST['project_slide_3'];
        $temp = uploadImage("assets/img/projects/", $_FILES['file']);
        if($temp['upload_ok']){
            $sql = "UPDATE projects SET slider_3 = '".$temp['terget_file']."' WHERE id = $id";
            updateProjectImg($id, $sql);
        }else header("location: ?q=view-project&project=$id&error=something+wet+wrong");
        exit();
    }
    //===================
    if(isset($_REQUEST['project_model'])){
        $id = $_REQUEST['project_model'];
        $temp = uploadImage("assets/img/model/", $_FILES['file']);
        if($temp['upload_ok']){
            $sql = "UPDATE projects SET model = '".$temp['terget_file']."' WHERE id = $id";
            updateProjectImg($id, $sql);
        }else header("location: ?q=view-project&project=$id&error=something+wet+wrong");
        exit();
    }
    // ============================================================ project action
    // ============================================================ Invest action
    if(isset($_REQUEST['add_invest'])){
        $id = $_REQUEST['id'];
        $amount = $_REQUEST['add_invest'];

        $sql = "SELECT name, join_by, ref_side FROM users WHERE id = '$id'";
        $user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $join_by = $user['join_by'];
        $name = $user['name'];
        
        $sql = "UPDATE users SET balance = 'balance' + $amount, balance_invest = 'balance_invest' + $amount WHERE id = $id";
        mysqli_query($conn, $sql);//update balance
        
        $sql = "INSERT INTO transection (user_id, message, amount, is_add) VALUES ('$id', 'Invest balance', '$amount', '1')";
        mysqli_query($conn, $sql);//add trx history
        

        
        //give refer bonus==============================================        
        $bonus = floor(($amount * 8) / 100); // 8% percentage bonus
        
        $sql = "UPDATE users SET balance = '' + $bonus WHERE id = $join_by";
        mysqli_query($conn, $sql); //update balance
        
        $sql = "INSERT INTO transection (user_id, message, amount, is_add) VALUES ('$join_by', 'refer bonus from $name', '$bonus', '1')";
        mysqli_query($conn, $sql); //add trx history
        //give refer bonus ==============================================
        $side = $user['ref_side'];

        //adding side point ================================================
        addPoint($side, $join_by); //call
        //function
        function addPoint($side, $join_by){
            GLOBAL $conn, $amount;
            if($side == 'A')
                $sql = "UPDATE users SET left_point = 'left_point' + $amount WHERE id = '$join_by'";
            else 
                $sql = "UPDATE users SET right_point = 'right_point' + $amount WHERE id = '$join_by'";
            
            mysqli_query($conn, $sql); //update point

            if($join_by != 0){
                $sql = "SELECT side, join_by FROM users WHERE id = '$join_by'";
                $ref_user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                addPoint($ref_user['side'], $ref_user['join_by']); 
            }

        }
        
        
        //adding side point ================================================
        

        header("location: ?q=view-user&id=$id&success=Invest+successfull");
        exit();

    }
    // ============================================================ Invest action
    // ============================================================ withdraw action
    if(isset($_REQUEST['add_withdraw'])){
        $id = $_REQUEST['id'];
        $amount = $_REQUEST['add_withdraw'];
        $balance = $_REQUEST['balance'];
        $withdraw = $_REQUEST['withdraw'];

        if($balance >= $amount){
            $balance -= $amount;
            $withdraw += $amount;
            $sql = "UPDATE users SET balance = '$balance', balance_withdraw = '$withdraw' WHERE id = $id";
            mysqli_query($conn, $sql);//update balance

            $sql = "INSERT INTO transection (user_id, message, amount, is_add) VALUES ('$id', 'Withdraw balance', '$amount', '0')";
            mysqli_query($conn, $sql);//add trx history
            header("location: ?q=view-user&id=$id&success=Withdraw+successfull");
            exit();

        }else{
            header("location: ?q=view-user&id=$id&error=Don't+have+enough+money+in+this+account");
            exit();
        }

    }
    // ============================================================ withdraw action
    // ============================================================ login action
    if(isset($_REQUEST['user-login'])){
        $username = $_REQUEST['user-login'];
        //==============================================================
        $expire_time = time() + (1800); // half hour expiration
        $path = "/"; // Available throughout the domain
        $secure = true; // Only send over HTTPS
        $httponly = true; // Not accessible via JavaScript
        $samesite = 'Strict'; // Can be 'Strict' or 'Lax'

        // Set the cookie
        setcookie("user_is_login", encryptSt($username), [
            'expires' => $expire_time,
            'path' => $path,
            'domain' => $domain,
            'secure' => $secure,
            'httponly' => $httponly,
            'samesite' => $samesite,
        ]); 
        header("location: ../?q=dashboard");
        exit();
    }
    // ============================================================ login action
    if(isset($_REQUEST['footer_web_name'])){
        
        $name = $_REQUEST['footer_web_name'];
        $email = $_REQUEST['email'];
        $number = $_REQUEST['number'];
        $address = $_REQUEST['address'];
        $open = $_REQUEST['open_day'];
        $open_time = $_REQUEST['open_time'];
        $close = $_REQUEST['close_day'];
        $sql = "UPDATE contact SET name = '$name', email = '$email', number = '$number', open_day = '$open', open_time = '$open_time', close_day = '$close', address = '$address' WHERE id = 1";

        if(mysqli_query($conn, $sql)) header("location: ?q=footer&success=Successfully+updated");
        exit();
    }
    // ============================================================ login action
    // ============================================================ request action
    if(isset($_REQUEST['request_action'])){
        $id = $_REQUEST['request_action'];
        $user_id = $_REQUEST['user_id'];
        $action = $_REQUEST['action'];
        if($action == 'accept'){
            $sql = "UPDATE nid SET status = '1' WHERE nid.id = '$id'";
            mysqli_query($conn, $sql);
            $sql = "UPDATE users SET nid_verify = '2' WHERE id = '$user_id'";
            if(mysqli_query($conn, $sql)) header("location: ?q=request&success=successfully+updated");
            exit();
        }else{
            $sql = "SELECT * FROM nid WHERE id = '$id'";
            $r_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

            unlink("../".$r_row['front']);
            unlink("../".$r_row['back']);

            $sql = "DELETE FROM nid WHERE id = $id";
            mysqli_query($conn, $sql);
            $sql = "UPDATE users SET nid_verify = '0' WHERE id = '$user_id'";
            if(mysqli_query($conn, $sql)) header("location: ?q=request&success=successfully+reject");
            exit();
        }
    }
    // ============================================================ request action
    // ============================================================ users action
    if(isset($_REQUEST['add_users'])){
        $username = $_REQUEST['username'];
        $name = $_REQUEST['name'];
        $ref = $_REQUEST['ref'];
        $side = $_REQUEST['side'];
        $number = $_REQUEST['number'];
        $pass = $_REQUEST['pass'];
        $nid = $_REQUEST['nid'];
        
        $email = (isset($_REQUEST['email'])) ? $_REQUEST['email'] : "";

        $pass = encryptSt($pass);
        
        $sql = "INSERT INTO users (username, name, number, email, ref_side, join_by, password, nid_number) VALUES ('$username', '$name', '$number', '$email', '$side', '$ref', '$pass', '$nid')";
        
        if(mysqli_query($conn, $sql)) header("location: ?q=users&success=Successfully+user+added");
        exit();
    }
    // ============================================================ users action
    // ============================================================ nid action
    if(isset($_REQUEST['upload_nid'])){
        $id = $_POST['upload_nid'];
        $temp_front = uploadImage("assets/img/nid/front/", $_FILES['front']);
        $temp_back = uploadImage("assets/img/nid/back/", $_FILES['back']);

        if($temp_front['upload_ok'] && $temp_back['upload_ok']){
            $sql = "INSERT INTO nid (front, back, user_id, status) VALUES ('".$temp_front['terget_file']."', '".$temp_back['terget_file']."', '$id', '1')";
            mysqli_query($conn, $sql);
            $sql = "UPDATE users SET nid_verify = '1' WHERE id = $id";
            if(mysqli_query($conn, $sql)) header("location: ?q=users&success=successfully+upload+nid");
        }
        
    }
    // ============================================================ nid action
    
?>
