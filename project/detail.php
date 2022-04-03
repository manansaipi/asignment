<?php
session_start();
if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
require 'functions.php';

$id = ($_GET["id"]);

$data = query("SELECT * FROM articel WHERE id = $id")[0];


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Page</title>
    <link rel="stylesheet" href="styleDetail.css">

  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Detail Post</header>
          <form action="" method="post">
              <input type="hidden" name="id" value="<?= $data["id"] ?>">
            <div class="content">
            </div>
            <div class="input-container">
		<input type="text" name="name" id="name" value="<?= $data["name"] ?>" readonly="readonly"/>
		<p>Name</p>
            <div class="input-container">
		<input type="text" name="title" id="tittle" value="<?= $data["title"] ?>" readonly="readonly"/>
		<p>tittle</p>
	</div>
            <textarea spellcheck="false" name="content" id="content" value="<?= $data["content"] ?>" readonly="readonly"><?= $data["content"] ?></textarea>
            
            <button type="submit" name="submit"><a href="centerPage.php" style="text-decoration: none;">Back</a></button>
          </form>
  
    </div>

    
  </body>
</html>