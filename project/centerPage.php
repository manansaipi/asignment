<?php 
session_start();
if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
require 'functions.php';
$articel = query("SELECT * FROM articel");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCPage.css">
</head>
<body>
Hallo, users 
<a href="logout.php" class="logout" style="font-size: 180%;">Logout</a> 
  <div class="wrapper">
    <div class="center-line">
      <a href="create.php" class="scroll-icon">+<i class="fas fa-caret-up"></i></a>
    </div>
    <?php foreach( $articel as $artcl ) : ?>
    <div class="row row-1">
      <section>
          
        <i class="icon fas fa-home"></i>
        <div class="details">
          <span class="title"><?= $artcl["title"]; ?></span>
        </div>
        <p><?= $artcl["content"]; ?></p>
        <div class="bottom">
          <a href="detail.php?id=<?= $artcl["id"]; ?>"">Detail</a>
          <a href="edit.php?id=<?= $artcl["id"]; ?>">Edit</a>
          <a href="delete.php?id=<?= $artcl["id"]; ?>" onClick="return confirm('Delete articel ?');">Delete</a>
          <i>- <?= $artcl["name"]; ?></i>
        </div>
      </section>  
      
    </div>
    <?php endforeach; ?>
      
</body>
</html>
