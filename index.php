<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetHue</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet"href="slider.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!-- Home page -->
     <section class="home">
        <div class="home-hero">
            <div class="home-text">
                <h1>Happiness<br>Starts With Cake</h1>
                <p>Sweet moments baked with love</p>
                <a href="Login.php" class="btn">Login</a>
            </div>

            <div class="hero-image">
                <img src="CAKE.jpg" alt="Cake">
            </div>
        </div>
    <!-- Services Section -->
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
<!-- CSS ONLY SLIDER -->
<section class="css-slider">
    <div class="slider-track">
        <img src="sale.png" alt="Sale">
        <img src="logo.png" alt="Logo">
        <img src="flashsale.png"alt="flashsale">
        <img src="donuts.jpeg"alt="donuts">
        <img src="sale.png"alt="sale">
        <img src="logo.png"alt="logo">
        <img src="flashsale.png"alt="flashsale">
    </div>
</section>
<footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 SweetHue. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
     