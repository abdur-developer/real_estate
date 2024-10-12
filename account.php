<?php
    //header("location: index.php?q=home");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account | Right City</title>
        <link rel="stylesheet" href="assets/css/account.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
    <?php
            if(isset($_REQUEST['error'])){
                $error = $_REQUEST['error'];
                echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '$error'
                        });
                </script>
                ";
            }
            if(isset($_REQUEST['success'])){
                $success = $_REQUEST['success'];
                echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'WOW...',
                        text: '$success'
                        });
                </script>
                ";
            }
        ?>
        <div class="wrapper">
            <?php
                if(isset($_REQUEST['register'])){
            ?>
            <!-- below register page page ========================================================================================================-->
            <form action="auth/register.php" id="registerForm" method="post">
                <h2>রেজিস্টার</h2>
                <div class="input-field">
                    <input type="text" name="name" required>
                    <label>নাম প্রবেশ করুন</label>
                </div>
                <div class="input-field">
                    <input type="number" name="number" required>
                    <label>নম্বর প্রবেশ করুন</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" required>
                    <label>ইমেইল প্রবেশ করুন</label>
                </div>
                <?php
                    if(isset($_REQUEST['ref'])){
                        $ref = $_REQUEST['ref'];
                        echo "<input type='hidden' name='ref' value='$ref'>";
                    }else{
                ?>
                <div class="input-field">
                    <input type="text" name="ref" required>
                    <label>রেফারেন্স কোড প্রবেশ করুন</label>
                </div>
                <?php } ?>
                <div class="input-field">
                    <input type="password" name="password" id="password" minlength="6" required>
                    <label>পাসওয়ার্ড প্রবেশ করুন</label>
                </div>
                <div class="input-field">
                    <input type="password" id="confirmPassword" required>
                    <label>আবার পাসওয়ার্ড প্রবেশ করুন</label>
                </div>
                <div id="message" class="message"></div>
                <button type="submit" class="btn-login">রেজিস্টার</button>
                <div class="register">
                    <p>আপনি ইতিমধ্যে একটি অ্যাকাউন্ট আছে? <a href="?">লগইন</a></p>
                </div>
            </form>
            <script>
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('confirmPassword');
                const messageDiv = document.getElementById('message');

                confirmPasswordInput.addEventListener('input', () => {
                    if (confirmPasswordInput.value === passwordInput.value) {
                        confirmPasswordInput.classList.add('match');
                        confirmPasswordInput.classList.remove('no-match');
                        messageDiv.textContent = 'Passwords match!';
                        messageDiv.classList.add('visible');
                    } else {
                        confirmPasswordInput.classList.add('no-match');
                        confirmPasswordInput.classList.remove('match');
                        messageDiv.textContent = 'Passwords do not match!';
                        messageDiv.classList.add('visible');
                    }
                });

                passwordInput.addEventListener('input', () => {
                    // Clear the message when user types in the password field
                    messageDiv.classList.remove('visible');
                    confirmPasswordInput.classList.remove('match', 'no-match');
                });

                document.getElementById('registerForm').addEventListener('submit', (e) => {
                    if (passwordInput.value !== confirmPasswordInput.value) {
                        e.preventDefault();
                        alert('পাসওয়ার্ড মিলছে না! জমা দেওয়ার আগে দয়া করে ত্রুটিগুলি ঠিক করুন৷');
                    }
                });
            </script>
            <?php
                }elseif(isset($_REQUEST['change']) && isset($_COOKIE['dbv23563'])){ //dbv23563 = coockie variable
            ?>
            <!-- below register page page =================================================================================================-->=======-->
            <form action="auth/change.php" id="registerForm" method="get">
                <h2>পাসওয়ার্ড পরিবর্তন করুন</h2>
                
                <div class="input-field">
                    <input type="password" name="password" id="password" minlength="6" required>
                    <label>পাসওয়ার্ড প্রবেশ করুন</label>
                </div>
                <div class="input-field">
                    <input type="password" id="confirmPassword" required>
                    <label>আবার পাসওয়ার্ড প্রবেশ করুন</label>
                </div>
                <div id="message" class="message"></div>
                <button type="submit" class="btn-login">পরিবর্তন করুন</button>
                <div class="register">
                    <p>আপনি ইতিমধ্যে একটি অ্যাকাউন্ট আছে? <a href="?">লগইন</a></p>
                </div>
            </form>
            <script>
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('confirmPassword');
                const messageDiv = document.getElementById('message');

                confirmPasswordInput.addEventListener('input', () => {
                    if (confirmPasswordInput.value === passwordInput.value) {
                        confirmPasswordInput.classList.add('match');
                        confirmPasswordInput.classList.remove('no-match');
                        messageDiv.textContent = 'Passwords match!';
                        messageDiv.classList.add('visible');
                    } else {
                        confirmPasswordInput.classList.add('no-match');
                        confirmPasswordInput.classList.remove('match');
                        messageDiv.textContent = 'Passwords do not match!';
                        messageDiv.classList.add('visible');
                    }
                });

                passwordInput.addEventListener('input', () => {
                    // Clear the message when user types in the password field
                    messageDiv.classList.remove('visible');
                    confirmPasswordInput.classList.remove('match', 'no-match');
                });

                document.getElementById('registerForm').addEventListener('submit', (e) => {
                    if (passwordInput.value !== confirmPasswordInput.value) {
                        e.preventDefault();
                        alert('Passwords do not match! Please fix the errors before submitting.');
                    }
                });
            </script>
            <?php
                }elseif(isset($_REQUEST['forget'])){
            ?>
            <!-- below forget page page =================================================================================================-->=======-->
            <form action="auth/forget.php" method="post">
                <h2>পাসওয়ার্ড ভুলে গেছেন</h2>
                <div class="input-field">
                    <input type="number" name="number"  minlength="11" required>
                    <label>নম্বর প্রবেশ করুন</label>
                </div>
                <div class="register" style="margin: -5px auto 25px">
                    <p>পাসওয়ার্ড মনে আছে? <a href="?">লগইন করুন</a></p>
                </div>
                <button type="submit" class="btn-login">ওটিপি পাঠান</button>
            </form>
            <?php
                }elseif(isset($_REQUEST['verify']) && isset($_REQUEST['type'])){
                    if (isset($_COOKIE['dbvdigv'])) { //dbvdigv = coockie variable
            ?>
            <!-- below otp section -->
            <form action="auth/verify.php" method="post">
                <h2>ওটিপি</h2>
                <div class="input-otp">
                    <input type="hidden" name="type" value="<?=$_REQUEST['type']?>"/>
                    <input class="in-otp" type="number" name="one"/>
                    <input class="in-otp" type="number" name="two" disabled />
                    <input class="in-otp" type="number" name="three" disabled />
                    <input class="in-otp" type="number" name="four" disabled />
                </div>
                <div class="forget">
                    <a href="auth/sent.php?number=<?=$_COOKIE['dbvdigv']?>&type=<?=$_REQUEST['type']?>" id="resend" class="hidden">রিসেন্ট ওটিপি</a>
                    <label for="remember" id="timer">
                        <p><span id="time"></span> সেকেন্ড বাকি আছে</p>
                    </label>
                </div>
                <button type="submit" class="verify">ওটিপি যাচাই করুন</button>
            </form>
            
            <script>
                const inputs = document.getElementsByClassName("in-otp"),
                button = document.getElementsByClassName("verify")[0];

                // convert HTMLCollection to Array
                Array.from(inputs).forEach((input, index1) => {
                    input.addEventListener("keyup", (e) => {
                        const currentInput = input,
                            nextInput = input.nextElementSibling,
                            prevInput = input.previousElementSibling;

                        // if the value has more than one character then clear it
                        if (currentInput.value.length > 1) {
                            currentInput.value = "";
                            return;
                        }

                        // enable the next input if current input is not empty
                        if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                            nextInput.removeAttribute("disabled");
                            nextInput.focus();
                        }

                        // if backspace is pressed
                        if (e.key === "Backspace") {
                            Array.from(inputs).forEach((input, index2) => {
                                if (index1 <= index2 && prevInput) {
                                    input.setAttribute("disabled", true);
                                    input.value = "";
                                    prevInput.focus();
                                }
                            });
                        }

                        // check if the last input is filled
                        if (!inputs[3].disabled && inputs[3].value !== "") {
                            button.classList.add("active");
                            return;
                        }
                        button.classList.remove("active");
                    });
                });

                // focus the first input on window load
                window.addEventListener("load", () => inputs[0].focus());

            </script>
            <?php
                }else header("location: ?forget&error=otp+expire");
            }else{
            ?>
            <!-- below login page page =================================================================================================-->=======-->
            <form action="auth/login.php" method="post">
                <h2>লগইন</h2>
                <div class="input-field">
                    <input type="number" name="number" required>
                    <label>নম্বর প্রবেশ করুন</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>পাসওয়ার্ড প্রবেশ করুন</label>
                </div>
                <div class="forget">
                    <!-- <label for="remember">
                        <input type="checkbox" id="remember">
                        <p>মনে রাখুন</p>
                    </label> -->
                    <a href="?forget">পাসওয়ার্ড ভুলে গেছেন...?</a>
                </div>
                <button type="submit" class="btn-login">লগইন করুন</button>
                <div class="register">
                    <p>আপনার কোন অ্যাকাউন্ট নেই? <a href="?register">রেজিস্টার</a></p>
                </div>
            </form>
            <?php } ?>
        </div>
        <?php
            if(isset($_COOKIE['wsygusyg'])){
                ?>
                <script>

                    window.onload = function() {
                        const startTime = parseInt(<?=$_COOKIE['wsygusyg']?>);
                        const countdownTime = startTime;

                        const countdown = setInterval(() => {
                            const now = Math.floor(Date.now() / 1000);
                            const remainingTime = countdownTime - now;

                            if (remainingTime <= 0) {
                                clearInterval(countdown);
                                document.getElementById("timer").classList.add('hidden');
                                document.getElementById("resend").classList.remove('hidden');
                            } else {
                                // const minutes = Math.floor(remainingTime / 60);
                                // const seconds = remainingTime % 60;
                                document.getElementById("time").innerHTML = remainingTime;
                            }
                        }, 1000);
                    };
                </script>
                <?php
            }
        ?>
    </body>
</html>