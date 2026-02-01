<?php 
include_once 'Database.php';
 include_once 'users.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $db = new Database();
     $connection = $db->getConnection(); 
     $users = new users($connection);
      $Username = $_POST['Username'];
       $Email = $_POST['Email'];
        $Password = $_POST['Password']; 
        if($users->register(Username: $Username, Email: $Email, Password: $Password)){
             header(header: "Location: Login.php"); exit; }else{ echo "Error registering user!";
              }
               } 
               ?>
                <!DOCTYPE html>
                 <html lang="en">
                     <head>
                         <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
                          <title>SweetHue</title>
                           <link rel="stylesheet" href="Register.css">
                         </head>
                            <body>
                                 <?php include 'header.php'; ?> 
                                 <div class="box">
                                     <h2>Register</h2>
                                      <form method="POST">
                                         <input type="text" name="Username" placeholder="Username">
                                          <small id="userError"></small> 
                                          <input type="email" name="Email" placeholder="Email">
                                           <small id="emailError"></small>
                                            <input type="password" name="Password"placeholder="Password">
                                             <small name="passError"></small>
                                              <input type="password" name="confirm" placeholder="Confirm Password"> 
                                              <small name="confirError"></small>
                                               <button type="submit">Register</button> 
                                            </form>
                                         </div>
                                          <script src="Register.js"></script> 
                                        </body>
                                         </html>