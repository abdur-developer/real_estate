<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">
            Footer Section
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
            .form-group input {
                flex: 1;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-left: 10px;
            }
            
        </style>
        <div class="main_xx">
            <div class="container">
                <?php
                $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contact WHERE id = 1"));
                ?>
                <form method="get">
                    <div class="form-group">
                        <input type="text" name="footer_web_name" placeholder="Enter Website name" value="<?= $admin['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter email" value="<?=$admin['email']?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="number" placeholder="Enter number" value="<?= $admin['number'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" placeholder="Enter address" value="<?= $admin['address'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="open_day" placeholder="Enter opaning day" value="<?= $admin['open_day'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="open_time" placeholder="Enter opaning time" value="<?= $admin['open_time'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="close_day" placeholder="Enter closing day" value="<?=$admin['close_day']?>" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="সাবমিট করুন">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>