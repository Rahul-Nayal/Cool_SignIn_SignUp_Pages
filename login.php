<?php
    include "db.php";
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $conn->prepare("SELECT * FROM customer where email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
            if(password_verify($password,$user['password'])){
                session_start();
                $_SESSION['customer_id'] = $user['customer_id'];
                $_SESSION['username'] = $user['username'];

                header("Location: index.php");
                exit();
            }else{
                echo"<script>alert('Invalid Password')</script>";
            }
        }
        else{
            echo"<script>alert('Invalid Email')</script>";
        }
        $stmt->close();
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        *{
            font-family: 'Poppins',sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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
          height: 450px;
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
            margin: 30px 0;
            border-bottom: 2px solid #fff;
        }
        .input-box label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }
        .input-box input:focus~label,
        .input-box input:valid~label{
            top: -5px;
        }
        
        .input-box input{
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #fff;
            padding: 0 30px 0 10px;
        }

        .input-box .icon{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            line-height: 57px;
        }

        .remember-forgot{
            margin: -15px 0 15px;
            justify-content: space-between;
            font-size: .9em;
            color: #fff;
            display: flex;
        }
        .remember-forgot label input{
            margin-right: 5px;
        }
        .remember-forgot a{
            color: #fff;
            text-decoration: none;
        }
        .remember-forgot a:hover{
            text-decoration: underline;
        }
        .login-btn{
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
        .new-registration{
            font-size: .9em;
            margin: 25px 0 15px;
            text-align: center;
            color: #fff;
        }
        .new-registration a{
            text-decoration: none;
            color: #fff;
            font-weight: 700;
        }
        .new-registration a:hover{
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
            <h2>Login</h2>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" id="email" name="email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-sharp"></ion-icon></span>
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Passowrd</a>
            </div>
            <button type="submit" class="login-btn" name="submit">Login</button>
            <div class="new-registration">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
            </div>
        </form>
    </div>
</section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>