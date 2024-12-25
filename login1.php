

<?php

    include "db.php";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            *{
                margin:0;
                padding: 0;
                font-family:"Poppins",sans-serif;
                box-sizing:border-box;
            }
            section{
                background:url("premium_photo-1673.jpg");
                display:flex;
                justify-content:center;
                align-items:center;
                background-position:center;
                background:cover;
                width:100%;
                height:100vh;

            }

            .login-card{
                width: 450px;
                height: 500px;
                background:transparent;
                position:relative;
                display:flex;
                justify-content:center;
                align-items:center;
                backdrop-fliter:blur(15px);
                border: 2px solid rgba(255,255,255,0.5);
                border-radius: 20px;
            }
            .login-card h2{
                text-align:center;
                font-size:2em;
                color:white;
            }
            .input-box{
                position:relative;
                width:350px;
                bottom_border: 2px solid white;
                margin:30px 0;

            }
            .input-box span{
                position: absolute;
                right: 8px;
                color: #fff;
                line-height: 57px;
                font-size: 1.2em;
            }
            .input-box label{
                position:absolute;
                top:50%;
                left:5px;
                transform: translateY(-50%);
                font-size:1em;
                color:#fff;
                transition: .5s;
            }
            .input-box valid: label,
            .input-box focus: label{
                top:-5px;
            }

            .input-box input{
                padding: 0 2px 0 3px;
                width: 100%;
                height: 20px;
                border:none;
                outline:none;
                background:transparent;
                font-size: 1em;
                color:#fff;
            }
        </style>
    </head>
    <body>
        <?php include "header.php" ?>
        <section>
            <div class="login-card">
                <form action="" method="POST">
                    <h2>Login</h2>
                    <div class="input-box">
                        <span></span>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input-box">
                        <span></span>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input-box">
                        <!-- <span></span> -->
                        <label><input type="checkbox">Remember Me </label>
                        <a href="#">Forget Password</a>
                    </div>
                    <button type="submit" name="submit" class="imp-btn" >Login</button>
                    <div class="input-box">
                        <label><span>Do not have account?</span><a href="#">Register Here</a></label>
                    </div>
                </form>
            </div>
        </section>
       
    </body>
    </html>