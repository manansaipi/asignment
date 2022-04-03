<?php
session_start();
if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
require 'functions.php';

$id = ($_GET["id"]);

$data = query("SELECT * FROM articel WHERE id = $id")[0];
    if(isset($_POST["submit"])){

        if(edit($_POST) > 0 ){
            echo "  <script>
                        alert('Your articel has been saved !')
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
    <title>Edit Page</title>
    <link rel="stylesheet" href="styleCreate.css">

  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Edit Post</header>
          <form action="" method="post">
              <input type="hidden" name="id" value="<?= $data["id"] ?>">
            <div class="content">
            </div>
            <div class="input-container">
		<input type="text" name="name" id="name" value="<?= $data["name"] ?>" required=""/>
		<label>Enter Your name</label>
            <div class="input-container">
		<input type="text" name="title" id="tittle" value="<?= $data["title"] ?>" required=""/>
		<label>Title</label>
	</div>
            <textarea spellcheck="false" name="content" id="content" value="<?= $data["content"] ?>" required=""><?= $data["content"] ?></textarea>
            
            <button type="submit" name="submit">Edit</button>
          </form>
  
    </div>

    
  </body>
</html>