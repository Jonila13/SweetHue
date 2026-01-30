<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
    $_SESSION['name'] = "Admin";
    $_SESSION['role'] = "admin";
}

if ($_SESSION['role'] !== 'admin') {
    echo "Access denied.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="dashboard">
    <h1>Admin Dashboard</h1>
    <p>Welcome, <strong><?php echo $_SESSION['name']; ?></strong></p>

    <ul>
        <li><a href="#">Manage Products</a></li>
        <li><a href="#">Manage News</a></li>
        <li><a href="#">View Messages</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>

</body>
</html>