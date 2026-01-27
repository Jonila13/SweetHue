<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetHue</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!--Register form-->
    <div class="box">
        <h2>Register</h2>

        <form id="registerForm">

            <input type="text" id="username" placeholder="Username">
            <small id="userError"></small>

            <input type="email" id="email" placeholder="Email">
            <small id="emailError"></small>

            <input type="password" id="password"placeholder="Password">
            <small id="passError"></small>

            <input type="password" id="confirm" placeholder="Confirm Password">
            <small id="confirError"></small>

            <button type="submit">Register</button>
        </form>
    </div>

    <script src="Register.js"></script>
</body>
</html>

