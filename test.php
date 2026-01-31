<?php
session_start();

// Kontrollo nëse përdoruesi është kyçur
if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in. <a href='Login.php'>Login here</a>";
    exit;
}

// Merr të dhënat nga session
$email = $_SESSION['Email'] ?? 'Unknown';
$role = $_SESSION['role'] ?? 'user';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test User/Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .info { background-color: #f0f0f0; padding: 20px; border-radius: 8px; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <div class="info">
        <h2>Logged in successfully!</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>