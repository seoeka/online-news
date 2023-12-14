<?php
    $uri = $_SERVER['REQUEST_URI'];

    $page_title = "";
    $home_active = "";
    $bookmark_active = "";

    if(strpos($uri,"/index.php") != false){
        $page_title = "TMNews";
        $home_active = "active";
    }
    if(strpos($uri,"/article.php") != false){
      $page_title = "TMnews - Artikel";
    }
    if(strpos($uri,"/login.php") != false){
       $page_title = "TMNews - Login";
    }
    if(strpos($uri,"/bookmark.oho") != false){
        $bookmark_active = "active";
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="icon" href="../images/TMNews.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 15px 80px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="images/TMNews.png" style="height:24px; align-items:flex-start;" alt="TMNews"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link <?php echo $home_active ?>" href="index.php">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $teknologi_active ?>" href="#">Teknologi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Ekonomi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hiburan</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
            </form>
          </div>
        </div>
      </nav>
    </header>