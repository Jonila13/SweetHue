<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header(header: "Location: Login.php");
    exit;
}
echo "Welcome, ". $_SESSION['Email'] . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
 <title>SweetHue</title>
    <link rel="stylesheet"href="home.css">
    
</head>
<body>
<?php include "header.php"; ?>
 <section class="home">
        <div class="home-hero">
            <div class="home-text">
                <h1>Happiness<br>Starts With Cake</h1>
                <p>Sweet moments baked with love</p>
                <a href="Login.html" class="btn">Login</a>
            </div>

            <div class="hero-image">
                <img src="CAKE.jpg" alt="Cake">
            </div>
        </div>
    </section>
   <section class="services">
    <h2 class="services-title">Best Services</h2>
    <div class="circles-wrapper">
        <div class="circle text-circle">
            <h3>Fresh and Natural</h3>
            <p>Only the best quality ingredients are used.</p>
        </div>
        <div class="circle image-circle">
            <img src="chocolate.jpg" alt="Chocolate Cake">
        </div>
        <div class="circle text-circle">
            <h3>Fast and Reliable</h3>
            <p>We deliver quickly and safely to you.</p>
        </div>
        <div class="circle image-circle">
            <img src="churros.jpg" alt="Churros">
        </div>
    <div class="circle text-circle">
            <h3>Handmade with Love</h3>
            <p>Every item is crafted with care and passion.</p>
        </div>
    </div>
</section>
<footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 SweetHue. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>