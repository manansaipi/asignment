<?php
session_start();
if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
require 'functions.php';

    if(isset($_POST["submit"])){

        if(insert($_POST) > 0 ){
            echo "  <script>
                        alert('Your articel has been saved!')
                        document.location.href = 'centerPage.php'
                    </script>";

        } else {
            echo "<script>alert('erorr!') document.location.href = 'centerPage.php'</script>";
        }
    }

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Page</title>
    <link rel="stylesheet" href="styleCreate.css">

  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Create Post</header>
          <form action="" method="post">
            <div class="content">
            </div>
            <div class="input-container">
		<input type="text" name="name" id="name" required=""/>
		<label>Enter Your name</label>
            <div class="input-container">
		<input type="text" name="title" id="tittle" required=""/>
		<label>Title</label>
	</div>
            <textarea placeholder="What's on your mind" spellcheck="false" name="content" id="content" required></textarea>
            
            <button type="submit" name="submit">Post</button>
          </form>
  
    </div>

    
  </body>
</html>