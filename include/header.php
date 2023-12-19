<?php
    require('database.php');
    require('functions.php');

    session_start();
    
    $uri = $_SERVER['REQUEST_URI'];

    $page_title = "";
    $home_active = "";
    $kategori_active = "";

    $kategori_active = array(
      '1' => '', 
      '2' => '',
      '3' => '',
      '4' => '',
  );
    $catQuery= " SELECT category_id, category_name
    FROM categories 
    ORDER BY category_id ASC LIMIT 4";
    
    $resultNav = mysqli_query($con,$catQuery);
    $result = mysqli_query($con,$catQuery);
    $rowNavbar = mysqli_num_rows($result);
    $row = mysqli_num_rows($result);

    if(strpos($uri,"/index.php") != false){
        $page_title = "TMNews";
        $home_active = "active";
        $kategori_active = array(
          '1' => '',
          '2' => '',
          '3' => '',
          '4' => '',
        );
      }

    if($rowNavbar > 0) {     
      while($page_tt = mysqli_fetch_assoc($resultNav)) {
        $category_id = $page_tt['category_id'];
        $category_name = $page_tt['category_name'];
        if(strpos($uri,"/kategori.php?id=$category_id") != false){
          $page_title = "TMnews - $category_name";
          $kategori_active[$category_id] = 'active';
        }
      }
    }

    if(strpos($uri,"/artikel.php") != false){
      $page_title = "TMnews - Artikel";
    }
    /*
    if(strpos($uri,"/login.php") != false){
       $page_title = "TMNews - Login";
    } 
    if(strpos($uri,"/bookmark.php") != false){
        $bookmark_active = "active";
    }
    */

 
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
    <link rel="icon" href="./images/TMNews.ico" type="image/x-icon">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

              <?php
            
                if($row > 0) {
              
                while($data = mysqli_fetch_assoc($result)) {
                  
                  $category_id = $data['category_id'];
                  $category_name = $data['category_name'];
                  ?>
                  <li class="nav-item">
                    <a class="nav-link <?php echo $kategori_active[$category_id] ?>" href="kategori.php?id=<?php echo $category_id ?>">
                    <?php echo $category_name ?></a>
                  </li>
                  <?php  
                      }
                    }
                  ?>
            </ul>
            <form class="d-flex" role="search" method="get" action="cari.php">
              <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search" name="q" >
            </form>
          </div>
        </div>
      </nav>
    </header>