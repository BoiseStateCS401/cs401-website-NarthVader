<?php 
if(session_status() === PHP_SESSION_NONE) {
  session_start();  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CS401 - </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Seahawks FanSite">
  <meta name="author" content="Nate Berkenmeier">
    <title>Seahawks Fan Page</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/javascript.js"></script>
</head>
<body>
    <header id="main">
        <figure>
            <a href="index.php">
                <img id="redirect" src="http://images.1iphone5wallpaper.com/Gallery/12_Sports/1-iPhone-5-Wallpaper-Seahawks-28.jpg" alt="Back to the 'Clink" title="Back to the 'Clink" />
            </a>
        </figure>
        <aside class="floating-btn" > 
        <?php 
          if(isset($_SESSION['access']) && ($_SESSION['access']===true)) { ?>
            <a href="logout.php" color="Chartreuse">LogOut</a>
        <?php   }
        else { ?>
            <a href="seapg4.php">LogIn</a>
        <?php  } ?>
          </aside>
        <h1 id="banner"><?= $thisPage; ?></h1>
    </header>
