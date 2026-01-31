<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar">
    <div class="logo">SweetHue</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="DessertsPage.php">Desserts</a></li>
        <li><a href="aboutUS.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="rateUs.php">Rate Us</a></li>
    
         <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li><a href="dashboard.php">Dashboard</a></li>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
