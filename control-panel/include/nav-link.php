<?php
  $art_sql = "SELECT COUNT(article_id) 
              AS no_of_articles 
              FROM articles";
  $art_result = mysqli_query($con,$art_sql);
  $art_data = mysqli_fetch_assoc($art_result);
  $no_of_articles = $art_data['no_of_articles'];

          
  $cat_sql = "SELECT COUNT(category_id) 
              AS no_of_categories 
              FROM categories";
  $cat_result = mysqli_query($con,$cat_sql);
  $cat_data = mysqli_fetch_assoc($cat_result);
  $no_of_categories = $cat_data['no_of_categories'];

  
  $au_sql =  "SELECT COUNT(author_id) 
              AS no_of_authors
              FROM author";
  $au_result = mysqli_query($con,$au_sql);
  $au_data = mysqli_fetch_assoc($au_result);
  $no_of_au = $au_data['no_of_authors'];   

  $type_sql = "SELECT COUNT(artype_id) 
              AS no_of_type
              FROM article_type";
  $type_result = mysqli_query($con,$type_sql);
  $type_data = mysqli_fetch_assoc($type_result);
  $no_of_type = $type_data['no_of_type'];   

?>
<div class="col-md-3">
  <div class="list-group">
    <a href="./index.php" class="list-group-item active main-color-bg">
      <span class="glyphicon glyphicon-link"></span>
      Navigasi
    </a>
    <a href="./index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Beranda
    </a>
    <a href="./articles.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Artikel
      <span class="badge"><?php echo $no_of_articles ?></span></a>
      <?php
    if ($_SESSION['USER_ROLE'] === 'admin') {
      echo '<a href="./categories.php" class="list-group-item"><span class="glyphicon glyphicon-list"></span> Kategori
              <span class="badge">' . $no_of_categories . '</span>
            </a>';
    }
    if ($_SESSION['USER_ROLE'] === 'author') {
      echo '<a href="./change-name.php" class="list-group-item"><span class="glyphicon glyphicon-edit"></span> Ganti Nama</a>';
    }
    ?>
    <a href="./change-password.php" class="list-group-item"><span class="glyphicon glyphicon-cog"></span> Ganti
      Password
    </a>
    <a href="./logout.php" class="list-group-item"><span class="glyphicon glyphicon-log-out"></span> Logout
    </a>
  </div>
</div>