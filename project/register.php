<?php 
require 'functions.php';
if( isset($_POST["register"]) ){
    if( register($_POST) > 0){
        echo "<script>alert('You are member now!');</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
      <meta charset="utf-8">
      <title>Animated Login Form</title>
      <link rel="stylesheet" href="style2.css">
   <body>
      
      <div class="container">
         <header>Sign up</header>
         <form action="" method = "post">
            <div class="input-field">
               <input type="text" name="name" id="name" required>
               <label>Name</label>
            </div>
            <div class="input-field">
               <input type="text" name="username" id="username" required>
               <label>Username</label>
            </div>
            <div class="input-field">
               <input class="pswrd" type="password" name="password" id="password" required>
               <span class="show"></span>
               <label>Password</label>
               <span id="pass"></span>
               <div class="input-field">
               <input class="pswrd" type="password" name="password2" id="password2" required>
               <span class="show"></span>
               <label>Confirm Password</label>
            </div>

            <div class="button">
               <div class="inner"></div>
               <button type="submit" name="register" id="register">CREATE ACCOUNT</button>
               
            </div>
            <div class="login">
            Have already an account ? <a href="login.php">Login here</a>
           
         </div>
         
         </form>    
      </div>
   </body>
</html>