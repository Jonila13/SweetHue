<?php
session_start();
include_once 'Database.php';
include_once 'users.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $users = new Users($connection);

    $Email = $_POST['Email'] ?? '';
    $Password = $_POST['Password'] ?? '';

    if ($users->login($Email, $Password)) {
        if ($_SESSION['role'] === 'admin') {
            header("Location: dashboard.php");
        } else {
            header("Location: Home.php");
        }
        exit;
    } else {
        $error = "Invalid login credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="auth-wrapper">
    <div class="auth-card">
        <h1>SweetHue</h1>
        <p>Welcome back! Please login to your account</p>

        <?php if($error): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label>Email</label>
            <input type="email" name="Email" required placeholder="you@example.com">

            <label>Password</label>
            <input type="password" name="Password" required placeholder="********">

            <button type="submit">Sign In</button>
        </form>

        <p>
            Don't have an account? <a href="Register.php">Register</a>
        </p>
    </div>
</div>
</body>
</html>