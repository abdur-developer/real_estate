<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">
            User Authentication
        </h1>
    </div>

    <div class="report-body">
        <style>
            .main_xx{
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 80vh;
            }
            .container {
                font-family: Arial, sans-serif;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
            }
            .form-group {
                display: flex;
                align-items: center;
                margin-bottom: 15px;
            }
            .form-group input[type="text"], .form-group input[type="password"] {
                flex: 1;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-left: 10px;
            }
            .form-group input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .form-group input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
        <div class="main_xx">
            <div class="container">
                <?php
                $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id = 1"));
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" name="set_username" placeholder="Enter your username" value="<?= $admin['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="set_password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="সাবমিট করুন">
                    </div>
                </form>
                <form action="" method="post" style="margin-top: 40px;">
                    <div class="form-group">
                        <input type="password" name="set_password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="new_password" placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="con_password" placeholder="Enter confirm password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="সাবমিট করুন">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>