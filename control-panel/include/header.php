<?php
  require('../include/functions.php');
  require('../include/database.php');
  session_start();

  if(!isset($_SESSION['USER_LOGGED_IN'])) {
    alert("Login terlebih dahulu untuk masuk ke Control Panel");
    redirect('./login.php');
  }
  
  $uri = $_SERVER['REQUEST_URI'];

  if (isset($_SESSION['USER_ROLE'])) {
    $user_role = $_SESSION['USER_ROLE'];
    $user_name = $_SESSION['USER_NAME'];
    $page_title = "";

      $home = true; 
      $pass = false; 
      $category = false; 
      $article = false;
      $author = false;
      $name = false;
      
      if(strpos($uri,"/index.php") != false){
        $page_title = " Dashboard";
      }

      if(strpos($uri,"/articles.php") != false){
        $page_title = " Artikel";
        $home = false;
        $article = true;
        $author = false;
        $pass = false; 
        $name = false;
      }

      if(strpos($uri,"/edit-articles.php") != false){
        $page_title = " Edit Artikel";
        $home = false;
        $article = true;
        $author = false;
        $pass = false; 
        $name = false;
      }

      if(strpos($uri,"/add-articles.php") != false){
        $page_title = " Tambah Artikel";
        $home = false;
        $article = true;
        $author = false;
        $pass = false; 
        $name = false;
      }

      if(strpos($uri,"/categories.php") != false){
        $page_title = " Kategori";
        $home = false;
        $category = true;
        $author = false;
        $pass = false; 
        $name = false;
      }

      if(strpos($uri,"/author.php") != false){
        $page_title = " Author";
        $home = false;
        $category = false;
        $author = true;
        $pass = false; 
        $name = false;
      }

      if(strpos($uri,"/add-author.php") != false){
        $page_title = " Tambah Author";
        $home = false;
        $category = false;
        $author = true;
        $pass = false; 
        $name = false;
      }

      if(strpos($uri,"/change-password.php") != false){
        $page_title = " Ubah Password";
        $home = false;
        $category = false;
        $author = false;
        $pass = true;
      }

      
      if(strpos($uri,"/change-name.php") != false){
        $page_title = " Ubah Nama";
        $home = false;
        $category = false;
        $author = false;
        $pass = false;
        $name = true;
      }

      if(strpos($uri,"/add-category.php") != false){
        $page_title = "Tambah Kategori";
        $category = true;
        $home = false;
        $author = false;
        $pass = false; 
        $name = false;
      }

      if(strpos($uri,"/edit-category.php") != false){
        $page_title = "Edit Kategori";
        $category = true;
        $home = false;
        $author = false;
        $pass = false; 
        $name = false;
      }
    
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>TMNews - Control Panel | <?php echo $page_title ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link href="../control-panel/assets/styles.css" rel="stylesheet" />
  <link rel="icon" href="../images/TMNews.ico" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="slide navbar style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">TMNews </a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?php if($home) echo 'class="active"' ?>><a href="./index.php">Beranda</a></li>
          <li <?php if($article) echo 'class="active"' ?>><a href="./articles.php">Artikel</a></li>
          <?php
          if ($user_role === 'admin') {
              echo '<li ';
              if ($category) echo 'class="active"';
              echo '><a href="./categories.php">Kategori</a></li>';
          }
          ?>          
          <li <?php if($pass) echo 'class="active"' ?>><a href="./change-password.php">Ubah Password</a></li>
          <?php
          if ($user_role === 'author') {
              echo '<li ';
              if ($name) echo 'class="active"';
              echo '><a href="./change-name.php">Ubah Nama</a></li>';
          }
          ?>   
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a><?php echo $user_name ?></a></li>
          <li><a href="./logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
<?php
}?>
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><?php echo $page_title ?></h1>
        </div>
        <?php
            if ((isset($_SESSION['USER_ROLE'])) && $_SESSION['USER_ROLE'] === 'admin') {
              // Jika user role adalah admin, tetapkan link dan teks untuk menambah kategori
              $addButtonLink = "./add-category.php";
              $addButtonText = "Tambah Kategori";

              // Periksa apakah halaman saat ini adalah artikel.php
              if (strpos($_SERVER['PHP_SELF'], 'author.php') !== false) {
                $addButtonLink = "./add-author.php";
                $addButtonText = "Tambah Author";
              }
              ?>
              <div class="col-md-2 btn-box">
                  <a href="<?php echo $addButtonLink; ?>" class="btn btn-warning" type="button">
                      <?php echo $addButtonText; ?>
                  </a>
              </div>
            <?php 
          }
        ?>

        <?php
          if (isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE'] === 'author') {
            ?>
            <div class="col-md-2 btn-box">
                <a href="./add-article.php" class="btn btn-warning" type="button">
                    Tambah Artikel
                </a>
            </div>
            <?php
          }
        ?>
      </div>
    </div>
  </header>