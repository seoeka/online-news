<?php
  require('./include/header.php');
?>

<div class="container">
    <?php
      $page_title = "";
      $categoryQuery = "";

      if(isset($_GET['id']) && $_GET['id']!='') {
          
      $category_id = $_GET['id'];
      
      // Query untuk Headline
      $catHeadQuery = " SELECT c.category_name, a.*
                        FROM categories c, articles a
                        WHERE a.category_id = c.category_id
                        AND c.category_id = {$category_id}
                        AND a.article_active = 1
                        ORDER BY a.created_at DESC";
      
      // Query untuk Kategori
      $categoryQuery = " SELECT c.category_name, a.*
                        FROM categories c, articles a
                        WHERE a.category_id = c.category_id
                        AND c.category_id = {$category_id}
                        AND a.article_active = 1
                        ORDER BY a.created_at DESC
                        LIMIT 8";
      }
      
      $result = mysqli_query($con,$catHeadQuery);

      $row = mysqli_num_rows($result);
      
      if($row > 0) {
        while($data = mysqli_fetch_assoc($result)) {
          $category_name = $data['category_name'];
          $article_id = $data['article_id'];
          $article_title = $data['article_title'];
          $article_img = $data['article_image'];
          $article_date = $data['created_at'];
        }
      }
    ?>
  <div class="container-content c-head">
    <div class="row ">
        <?php
            generateHeadline($article_title, $article_img, $article_date, $category_name, $article_id);
        ?>
    </div>
  </div>
  <div class="container-content c-cont">
      <h2>Berita Terbaru</h2>
      <div class="slider">
        <?php
            createSlider($con, $categoryQuery);
        ?>
      </div>
  </div>
</div>
    <?
?>

<?php
  require('./include/footer.php');
?>