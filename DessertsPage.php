<?php 

include_once 'products.php';


$productObj = new products();
$products = $productObj->getAllProducts();


$baseDir = __DIR__ . '/'; 
$baseUrl = '/SweetHue/';


$customNames = [
    'Birthday Cakes',
    'Personalized donuts',
    'Tradicional Dessert'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DessertsPage</title>
    <link rel="stylesheet" href="dessert.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>

<?php include "header.php"; ?>
<section class="header">
    
    <h1>
        Crafted with Passion &<br>
        Precision
    </h1>
    <p>
        Sophisticated cakes created with passion, using the finest ingredients.
        Each dessert is carefully designed to balance flavor, texture, and modern
        aesthetics - perfect for every special moment.
    </p>
</section>


<section class="products">
<?php
foreach ($products as $product) {

    if (in_array($product['Name'], $customNames)) {
        continue;
    }

    $product_name  = $product['Name'];
    $product_price = $product['Price'];
    $product_image = $product['Image'] ?: 'default.jpg';

    if (!file_exists($baseDir . $product_image)) {
        $product_image = 'default.jpg';
    }

    $imagePath = $baseUrl . $product_image;
?>
    <div class="products-card">
        <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($product_name); ?>">
        <h3><?php echo htmlspecialchars($product_name); ?></h3>
        <span class="price">€<?php echo number_format($product_price, 2); ?></span>
    </div>
<?php } ?>
</section>


<section class="custom-cakes">
    <h2>Custom Signature Cakes</h2>
    <p class="custom-subtitle">
        Designed exclusively for your special moments
    </p>

    <div class="custom-grid">
<?php
foreach ($products as $product) {

    if (!in_array($product['Name'], $customNames)) {
        continue;
    }

    $product_name  = $product['Name'];
    $product_price = $product['Price'];
    $product_image = $product['Image'] ?: 'default.jpg';

    if (!file_exists($baseDir . $product_image)) {
        $product_image = 'default.jpg';
    }

    $imagePath = $baseUrl . $product_image;

    if ($product_name === 'Birthday Cakes') {
        $desc = 'Minimal white design with handcrafted sugar flowers.';
    } elseif ($product_name === 'Personalized donuts') {
        $desc = 'Gold details, premium chocolate layers & custom message.';
    } else {
        $desc = 'Delight in the sweet perfection of our baklava.';
    }
?>
        <div class="custom-card <?php echo $product_name === 'Personalized donuts' ? 'featured' : ''; ?>">
            <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($product_name); ?>">
            <div class="custom-info">
                <h3><?php echo htmlspecialchars($product_name); ?></h3>
                <p><?php echo $desc; ?></p>
                <span class="custom-price">From €<?php echo number_format($product_price, 2); ?></span>
            </div>
        </div>
<?php } ?>
    </div>
</section>


<footer class="footer">
    <div class="footer-content">
        <p>&copy; 2025 SweetHue. All rights reserved.</p>
    </div>
</footer>

</body>
</html>