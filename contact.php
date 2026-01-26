<?php
// PHP simple contact form validation
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Please enter your name.";
        $valid = false;
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Please enter your email.";
        $valid = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        $valid = false;
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Please enter your message.";
        $valid = false;
    } else {
        $message = htmlspecialchars($_POST["message"]);
    }

    if ($valid) {
        $successMsg = "Your message has been sent successfully!";
        $name = $email = $message = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact SweetHue</title>
    
    <!-- Navbar CSS -->
    <link rel="stylesheet" href="desserts.css"> <!-- për navbar -->
    
    <!-- Contact CSS -->
    <link rel="stylesheet" href="contact.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="contact-section">
    <div class="contact-wrapper">
        <!-- Contact Form -->
        <div class="contact-container">
            <h1>Contact Us</h1>

            <?php if($successMsg): ?>
                <p class="success"><?php echo $successMsg; ?></p>
            <?php endif; ?>

            <form action="contact.php" method="POST" class="contact-form">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                <span class="error"><?php echo $nameErr; ?></span>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $emailErr; ?></span>

                <label for="message">Message</label>
                <textarea name="message" id="message"><?php echo $message; ?></textarea>
                <span class="error"><?php echo $messageErr; ?></span>

                <button type="submit">Send</button>
            </form>
            </div>
             </section>
<footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 SweetHue. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
  