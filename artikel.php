<?php
  require('./include/header.php');
?>

<div class="container">
    <?php
      $page_title = "";
      if(isset($_GET['id']) && $_GET['id']!=''){
      $article_id = $_GET['id'];

      $articleQuery = "SELECT c.category_name, au.username, a.* 
      FROM categories c, articles a, author au
      WHERE a.category_id = c.category_id
      AND a.author_id = au.author_id
      AND a.article_id = {$article_id}
      AND a.article_active = 1";
      }
        // Eksekusi query
      $result = mysqli_query($con, $articleQuery);

      $popularQuery = "SELECT c.category_name, au.username, a.* 
      FROM categories c, articles a, author au
      WHERE a.category_id = c.category_id
      AND a.author_id = au.author_id
      AND a.article_type = 4
      AND a.article_active = 1
      LIMIT 5";

      $redaksiQuery = "SELECT c.category_name, au.username, a.* 
      FROM categories c, articles a, author au
      WHERE a.category_id = c.category_id
      AND a.author_id = au.author_id
      AND a.article_type = 2
      AND a.article_active = 1
      LIMIT 5";
      $rowArt = mysqli_num_rows($result);
      
      if($rowArt > 0) {
        while($data = mysqli_fetch_assoc($result)) {
          $category_id = $data['category_id']; // Fix this line
          $category_name = $data['category_name'];
          $article_id = $data['article_id'];
          $article_title = $data['article_title'];
          $article_img = $data['article_image'];
          $article_date = $data['created_at'];
          $article_desc = $data['article_desc'];
          $article_auth = $data['username'];
        
      
      $format_date = date("d F Y", strtotime($article_date));
    ?>
  <div class="container-content c-article">
    <div class="card-article">
        <div class="card-article-head">
            <div class="card-t-d d-flex">
                <p><?= $format_date ?></p>
                <span>•</span>
                <a href="kategori.php?id=<?= $category_id?>"><?= $category_name?></a>
            </div>
            <h1><?= $article_title?></h1>
            <img src="./control-panel/assets/images/articles/<?=$article_img ?>" class="img-article rounded" alt="...">
            <p style="margin-top: 15px;"><strong>Penulis:</strong> <span><?= $article_auth?></span></p>
        </div>
        <div class="card-article-body">
            <p class="justify-text"><?php 
            echo nl2br($article_desc);
            ?></p>
        </div>
    </div>
    <?php }} ?>
    <div class="card-side-article">
        <div class="aside-card">
            <h4>Terpopuler</h4>
            <?php 
            createSlider($con, $popularQuery);         
            ?>
        </div>
        <div class="aside-card">
            <h4>Redaksi Pilihan</h4>
            <?php 
            createSlider($con, $redaksiQuery);         
            ?>
        </div>
    </div>      
  </div>
</div>
    <?
?>

<?php
  require('./include/footer.php');
?>