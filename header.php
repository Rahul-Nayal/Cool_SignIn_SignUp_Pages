<?php
    if (session_start()==PHP_SESSION_NONE){
        session_start();
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 header">
            <div class="logo">
                <button class="btn" id="logo-btn">BOOKSTORE</button>
            </div>
            <div class="menu-items">
                <div class="menu-item">
                    <a href="index.php">Home</a>
                    <a href="#">About Us</a>
                    <a href="checkout.php">Cart</a>
                    <a href="#">Contact Us</a>
                    <?php if (isset($_SESSION['username'])):?>
                        <a  href = '#' ><span>WELCOME,<?php echo htmlspecialchars($_SESSION['username']);?></span></a>
                        <button><a href="logout.php">Logout</a></button>
                    <?php else: ?>
                    <button><a href="signup.php">SignUp</a></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- <div class="background">
        <div class="circle circle1"></div>
        <div class="circle circle2"></div>
    </div> -->