<?php
  require('./include/header.php');
?>

<div class="container">
`   <?php
      $limit = 6;
      if(isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      else {
        $page = 1;
      }
    $offset = ($page - 1) * $limit;

      $page_title = "";
      $categoryQuery = "";

      if(isset($_GET['id']) && $_GET['id']!='') {
          
        $category_id = $_GET['id'];

        $categoryQuery = " SELECT c.category_name, a.*
                          FROM categories c, articles a
                          WHERE a.category_id = c.category_id
                          AND c.category_id = {$category_id}
                          AND a.article_active = 1
                          ORDER BY a.article_title LIMIT {$offset},{$limit}";
      }
      else {
        $categoryQuery = " SELECT c.category_name, a.*
                          FROM categories c, articles a
                          WHERE a.category_id = c.category_id
                          AND a.article_active = 1
                          ORDER BY a.article_title LIMIT {$offset},{$limit}";      
      }
      $result = mysqli_query($con,$categoryQuery);

        $row = mysqli_num_rows($result);
        
        if($row > 0) {
          
          while($data = mysqli_fetch_assoc($result)) {
            $category_name = $data['category_name'];
            $category_id = $data['category_id'];
            $article_id = $data['article_id'];
            $article_title = $data['article_title'];
            $article_img = $data['article_image'];
            $article_desc = $data['article_desc'];
            $article_date = $data['created_at'];
            $article_type = $data['article_type'];
          }
    ?>
  <div class="container-content c-head">
    <?php
    }
    ?>
    <div class="row ">
        <?php
            generateHeadline($article_title, $article_img, $article_date, $category_name);
        ?>
    <?php  
       ?>
    </div>
  </div>
    <div class="container-content c-cont">
      
    </div>
</div>
<?php
  require('./include/footer.php');
?>