<?php
$question = ""; $answer = "A"; $one = ""; $two = "";
$three = ""; $four = ""; $ref_user_id = ""; $has_user_id = "";
if(isset($_REQUEST['ref'])){
    $ref_user_id = $_REQUEST['ref'];
}
?>
<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">
            <?php
                if(isset($_REQUEST['action'])){
                    $has_user_id = $_REQUEST['action'];
                    $sql = "SELECT * FROM users WHERE id = $has_user_id";
                    $q_row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    $name = $q_row['name'];
                    $email = $q_row['email'];
                    $number = $q_row['number'];
                    $name = $q_row['name'];
                    $name = $q_row['name'];
                    $name = $q_row['name'];

                    $ref_user_id = $q_row['join_by'];
                    echo "Update";
                }
                else echo "Adding New";
            ?>  User
        </h1>
    </div>

    <div class="report-body">
        <div class="main_xx">
            <div class="container">
                <style>
                    label{
                        display: block;
                        margin-top: 20px;
                    }
                    .alert{
                        display: block;
                        margin: auto 30px;
                        font-size: 12px;
                    }
                    .red{
                        color: red;
                    }
                    .green{
                        color: green;
                    }
                </style>
                 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <form action="" method="">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter user name" class="input-fil" required>
                        <span class ="alert" id="username-status"></span>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter Full name" class="input-fil" required>
                    </div>
                    
                    <input type='hidden' name='add_users' value='add' required>
                    
                    <div class="form-group">
                        <label>Join By</label>
                        <select name="ref" class="input-fil" required>
                            <?php
                                $sql = "SELECT id, name, number FROM users WHERE nid_verify = '2'";
                                $user_query = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($user_query) > 0){
                                    while($row = mysqli_fetch_assoc($user_query)){
                                        $user_id = $row['id'];
                                        $user_name = $row['name'];
                                        $user_number = $row['number'];
                                        if($ref_user_id == $user_id){
                                            echo "<option value='$user_id' selected>$user_name-$user_number</option>";
                                        }else{
                                            echo "<option value='$user_id'>$user_name-$user_number</option>";
                                        }
                                    }
                                }else{
                                    echo "<script> window.location.href = '?q=category'; </script>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Join Leg</label>
                        <style>
                            .leg{
                                display: flex;
                            }
                            .leg input{
                                margin: 5px 10px;
                            }
                            .leg span{
                                margin-right: 30px;
                            }
                        </style>
                        <div class="input-fil leg">
                            <input type="radio" name="side" value="A" required>
                            <span>Left</span>
                            <input type="radio" name="side" value="B" required>
                            <span>Right</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ref">Number</label>
                        <input type="number" name="number" placeholder="Enter number" class="input-fil" required>
                    </div>
                    <div class="form-group">
                        <label for="ref">NID number</label>
                        <input type="number" id="nid" name="nid" placeholder="Enter nid number" class="input-fil" required>
                        <span class ="alert" id="nid-status"></span>
                    </div>
                    <div class="form-group">
                        <label for="ref">Email</label>
                        <input type="email" name="email" placeholder="Enter email" class="input-fil">
                    </div>
                    <div class="form-group">
                        <label for="ref">Password</label>
                        <input type="text" name="pass" placeholder="Enter password" class="input-fil" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submitButton" value="সাবমিট করুন">
                    </div>
                </form>
                <script>
                    $(document).ready(function() {
                        $('#username').on('input', function() {
                            const username = $(this).val();
                            if (username) {
                                $.ajax({
                                    url: 'sec/others/check_username.php',
                                    type: 'POST',
                                    data: { username: username },
                                    success: function(response) {
                                        const status = $('#username-status');
                                        if (response === 'available') {
                                            document.getElementById("submitButton").disabled = true;
                                            status.text('username already taken').removeClass('green').addClass('red');
                                        } else {
                                            document.getElementById("submitButton").disabled = false;
                                            status.text('you can use this username').removeClass('red').addClass('green');
                                        }
                                    }
                                });
                            } else {
                                $('#username-status').text('').removeClass('available not-available');
                            }
                        });
                        $('#nid').on('input', function() {
                            const nid = $(this).val();
                            if (nid) {
                                $.ajax({
                                    url: 'sec/others/check_nid.php',
                                    type: 'POST',
                                    data: { nid: nid },
                                    success: function(response) {
                                        const status = $('#nid-status');
                                        if (response === 'available') {
                                            document.getElementById("submitButton").disabled = true;
                                            status.text('nid already taken').removeClass('green').addClass('red');
                                        }else if (response === 'minimum') {
                                            document.getElementById("submitButton").disabled = true;
                                            status.text('nid minimum lenth is 10').removeClass('green').addClass('red');
                                        }else if (response === 'maximum') {
                                            document.getElementById("submitButton").disabled = true;
                                            status.text('nid maximum lenth is 20').removeClass('green').addClass('red');
                                        } else {
                                            document.getElementById("submitButton").disabled = false;
                                            status.text('you can use this nid').removeClass('red').addClass('green');
                                        }
                                    }
                                });
                            } else {
                                $('#username-status').text('').removeClass('available not-available');
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>