<?php 
session_start();
if(isset($_SESSION["login"])){
   header("Location: centerPage.php");
   exit;
}
require 'functions.php';
if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)){
    if (mysqli_num_rows($result) === 1 ){    
        if( password_verify($password, $row["password"]) ){
         $_SESSION["username"] = $row["username"];
         $_SESSION["login"] = true;
            header("Location: centerPage.php");
            exit;
        }
    }
    $error = true;
   }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Animated Login Form</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body> 
      <div class="container">
         <header>Login</header>
         <form action="" method="post">
            <div class="input-field">
               <input type="text" name="username" id="username" required>
               <label>Username</label>
            </div>
            <div class="input-field">
               <input class="pswrd" type="password" name="password" id="password" required>
               <span class="show"></span>
               <label>Password</label>
            </div>
<?php if(isset($error) ) : ?>
    <p style="color: red; font-style: italic;">wrong Username / Password</p>  
<?php endif; ?>
            <div class="button">
               <div class="inner"></div>
               <button type="submit "name="login" id="login">LOGIN</button>
            </div>
         </form>    
         <div class="signup">
            Not a member ? <a href="register.php">Signup now</a>
         </div>
      </div>
   </body>
</html>
