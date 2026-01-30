<?php
 session_start(); 
 include_once 'Database.php'; 
 include_once 'users.php'; 

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $db = new Database();
      $connection = $db->getConnection(); 
      $users = new users($connection);
       $Email = $_POST['Email'] ?? ''; 
       $Password = $_POST['Password'] ?? '';

        if ($users->login($Email, $Password)) {
             $_SESSION['user_email'] = $Email;
              header("Location: Home.php"); 

              exit;
               } 
               else { 
                $error = "Invalid login credentials!";
                } };
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
      <?php include 'navbar.php'; ?>
   <div class="auth-wrapper">
    
    
     <div class="auth-card">
       <img src="candy1.jpg"alt="Candy" class="auth-img">
         <h1 class="brand">SweetHue</h1>
         <p class="subtitle">Welcome back! Please login to your account</p>
         
         <form id="loginForm" method="POST" action="login.php">
    <label>Email</label>
    <input type="email" id="email" name="Email" placeholder="you@example.com">
    <small class="error" id="emailError"></small>

    <label>Password</label>
    <input type="password" id="password" name="Password" placeholder="********">
    <small class="error" id="passwordError"></small>

    <div class="show-password">
        <input type="checkbox" id="togglePassword">
        <label for="togglePassword">Show password</label>
    </div>

    <button type="submit">Sign In</button>
</form>
             
         
            <p class="switch">
                Don't have an account?
                <a href="Register.php">Register</a>
            </p>
         </div>
     </div>
   </div>
  <script>
const form = document.getElementById("loginForm");
const email = document.getElementById("email");
const password = document.getElementById("password");

const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

const togglePassword = document.getElementById("togglePassword");

// show / hide password
togglePassword.addEventListener("change", () => {
    password.type = togglePassword.checked ? "text" : "password";
}
);

form.addEventListener("submit", function (e) {
    // reset errors
    emailError.textContent = "";
    passwordError.textContent = "";
    email.classList.remove("error-input");
    password.classList.remove("error-input");

    let isValid = true;

    if (email.value.trim() === "") {
        emailError.textContent = "Email must not be empty";
        email.classList.add("error-input");
        isValid = false;
    } else if (!email.value.includes("@")) {
        emailError.textContent = "Please enter a valid email";
        email.classList.add("error-input");
        isValid = false;
    }

    if (password.value.trim() === "") {
        passwordError.textContent = "Password must not be empty";
        password.classList.add("error-input");
        isValid = false;
    } else if (password.value.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters";
        password.classList.add("error-input");
        isValid = false;
    }

    if (isValid) {
         alert("Login successful!");
}

});
</script>
    
</body>
</html>
