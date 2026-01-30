<?php 
include_once 'Database.php';
 include_once 'contact_messages.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $db = new Database(); 
    $connection = $db->getConnection();
    $contact = new contact_messages($connection);

    $Name = $_POST['Name'] ?? ''; 
    $Email = $_POST['Email'] ?? ''; 
    $Message = $_POST['Message'] ?? '';

    if($Name && $Email && $Message){ 
        if($contact->register($Name, $Email, $Message)){
            $successMsg = "Your message has been sent successfully!";
        } else {
            echo "Error registering message!";
        }
    } else {
        echo "Please fill in all fields!"; 
    }
}
       //validimi
    
  $Name = $Email = $Message = "";
   $nameErr = $emailErr = $messageErr = "";
    $successMsg = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $valid = true; 
         if (empty($_POST["Name"]))  {
             $nameErr = "Please enter your name."; 
             $valid = false;
              }
               else { 
                $name = htmlspecialchars($_POST["Name"]);
                 } 
                 if (empty($_POST["Email"]))   { 
                        $emailErr = "Please enter your Email.";
                  $valid = false;
                   } else 
                   if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
                     $emailErr = "Invalid Email format";
                     $valid = false;
                       } else 
                       {
     $Email = htmlspecialchars($_POST["Email"]);
      }
       if (empty($_POST["Message"])) {
     $messageErr = "Please enter your message.";
      $valid = false; 
      }
       else {
         $Message = htmlspecialchars($_POST["Message"]);
          } 
          if ($valid) {
             $successMsg = "Your message has been sent successfully!";
           $Name = $Email = $Message = "";
            }
             } 
  ?>
     <!DOCTYPE html> 
     <html lang="en"> <head> <meta charset="UTF-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contact SweetHue</title> <!-- Navbar CSS -->
     <link rel="stylesheet" href="desserts.css"> <!-- për navbar --> <!-- Contact CSS -->
     <link rel="stylesheet" href="contact.css">
     </head>
    <body> 
     <?php include 'navbar.php'?>
     <section class="contact-section"> 
     <div class="contact-wrapper"> <!-- Contact Form --> 
     <div class="contact-container">
     <h1>Contact Us</h1> 
     <?php if($successMsg): ?>

     <p class="success">                                               
     <?php 
     echo $successMsg; 
     ?>
     </p>
     <?php endif;?> 
                                        
    <form action="contact.php" method="POST" class="contact-form"> 
    <label for="name">Name</label> 
     <input type="text" name="Name" id="Name" value="
    <?php
    echo $Name; 
     ?>">
    <span class="error">
    <?php echo $nameErr; ?>
   </span>
    <label for="Email">Email</label>
    <input type="text" name="Email" id="Email" value="
    <?php 
      echo $Email; 
      ?> "> 
     <span class="error">
    <?php echo $emailErr; ?>
     </span> 
    
     <label for="Message">Message</label>
     <textarea name="Message" id="Message">
      <?php echo $Message; ?>
     </textarea> 
     <span class="error">
      <?php
       echo $messageErr; 
     ?>
  </span>
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