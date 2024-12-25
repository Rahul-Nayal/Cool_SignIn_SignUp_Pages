<?php
include "db.php"; 

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"]; 

    $duplicate = mysqli_query($conn, "SELECT * FROM customer WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or email already exists');</script>";
    } else {
        if ($password == $repeat_password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO customer (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registered Successfully');</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            background:url(premium_photo-1673795753320-a9df2df4461e.avif);
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100vh;
            animation: animateBg 5s linear infinite;
        }
        @keyframes animateBg {
            100%{
                filter:  hue-rotate(360deg);
            }
        }
        .login-card{
          position: relative; 
          width: 400px;
          height: 500px;
          background:transparent;
          border-radius:20px;   
          display: flex;
          justify-content: center;
          align-items: center;
          border: 2px solid rgba(255, 255, 255, .5);
          backdrop-filter: blur(15px);
        }
        h2{
            color: #fff;
            font-size: 2em;
            text-align: center;
        }
        .input-box{
            position: relative;
            width: 310px;
            margin: 20px 0;
            border-bottom: 2px solid #fff;
        }
        .input-box label{
            position: absolute;
            top: 50%;
            left: 30px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #fff;
            pointer-events: none;
            transition: .5s;
            opacity: 1; 
        }
        .input-box input:focus~label,
        .input-box input:not(:placeholder-shown)~label{
            top: -5px;
            opacity: 0;
        }
        
        .input-box input{
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1.1em;
            color: #fff;
            padding: 0 10px 0 30px;
        }

        .input-box .icon{
            position: absolute;
            left: 0;
            color: #fff;
            font-size: 1.6em;
            /* line-height: px; */
            bottom:-0.2px;
            padding:0 0 6px 0;

        }
        #signup-btn{
            border-radius: 40px;
            width: 100%;
            height: 40px;
            background: #fff;
            outline: none;
            border: none;
            font-size: 1em;
            font-weight: 500;
            cursor: pointer;
            color: black;
        }
        .Already-account{
            font-size: .9em;
            margin: 25px 0 15px;
            text-align: center;
            color: #fff;
        }
        .Already-account a{
            text-decoration: none;
            color: #fff;
            font-weight: 700;
        }
        .Already-account a:hover{
            text-decoration: underline;
        }
        @media (max-width:360px){
            .login-box{
                width: 100%;
                height: 100vh;
                border: none;
                border-radius: 0;
            }
            .input-box{
                width: 290px;
            }
        }
    </style>
</head>
<body>
    <?php include "header.php"?>
    <section>
        <div class="login-card">
            <form action="" method="POST">
                <h2>Signup</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="username" name="username" required placeholder=" ">
                    <label for="username">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" id="email" name="email" required placeholder=" ">
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password" required placeholder=" ">
                    <label for="password">Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="repeat_password" name="repeat_password" required placeholder=" ">
                    <label for="repeat_password">Confirm Password</label>
                </div>
                <button type="submit" id="signup-btn" name="submit">Sign Up</button>
                <div class="Already-account">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </section>

    <!-- Ionicons Script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        const inputs = document.querySelectorAll('.input-box input');
        function handleLabelVisibility(input) {
            const label = input.nextElementSibling; 
            if (input.value.trim() !== '') {
                label.style.opacity = '0';
                label.style.top = '-5px';
            } else {
                label.style.opacity = '1';
                label.style.top = '50%';
            }
        }
        inputs.forEach(input => {
            handleLabelVisibility(input);

            input.addEventListener('focus', () => {
                const label = input.nextElementSibling;
                label.style.opacity = '0';
                label.style.top = '-5px';
            });

            input.addEventListener('blur', () => {
                handleLabelVisibility(input);
            });

            input.addEventListener('input', () => {
                handleLabelVisibility(input);
            });
        });
    </script>
</body>
</html>
