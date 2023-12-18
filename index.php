<?php
  require('./include/header.php');
?>

<div class="container">
  <div class="container-content c-head">
    <div class="row">
      <h1>Topik Utama</h1>
      <?php
        $sql = "SELECT a.article_title, 
                        a.article_id, 
                        a.created_at, 
                        au.username as author_name, 
                        a.article_image, 
                        a.article_type, 
                        a.article_active, 
                        a.article_desc, 
                        c.category_name,
                        a.category_id
        FROM articles a
        JOIN categories c ON a.category_id = c.category_id
        JOIN author au ON a.author_id = au.author_id
        WHERE a.article_active = 1 
          AND a.article_type = 3
        ORDER BY created_at DESC
        LIMIT 1";
          
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            generateHeadline($row['article_title'], $row['article_image'], $row['created_at'], $row['category_name']);
        } else {
            echo "Gagal mengeksekusi query.";
        }
      ?>
    </div>
  </div>
    <div class="container-content c-cont">
      <h2>Berita Terbaru</h2>
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php
            $latestByTypeQuery = "SELECT a.article_id, a.article_title, a.article_image, a.article_desc, a.created_at, c.category_name, c.category_id 
            FROM articles a
            JOIN categories c ON a.category_id = c.category_id
            AND a.article_active = 1
            ORDER BY a.created_at ASC
            LIMIT 7";

            displaySwiperSlides($con, $latestByTypeQuery);?>
        </div>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
<?php
  require('./include/footer.php');
?>