<?php
  require('./include/header.php');

  $search_sql = "";

  if (isset($_GET['q'])) {
    $search_query = mysqli_real_escape_string($con, $_GET['q']);

    $search_sql =  "SELECT a.*, c.category_name 
                    FROM articles a
                    JOIN categories c ON a.category_id = c.category_id
                    WHERE a.article_title LIKE '%$search_query%' 
                    OR a.article_desc LIKE '%$search_query%'
                    OR c.category_name LIKE '%$search_query%'
                    AND a.article_active = 1";
    

    $recom_sql= "SELECT a.*, c.category_name
                FROM articles a
                JOIN categories c ON a.category_id = c.category_id
                WHERE a.article_active = 1
                ORDER BY RAND() LIMIT 8";

    $result = mysqli_query($con, $search_sql);
    $total_results = mysqli_num_rows($result);

    if (!$result) {
        die("Query error: " . mysqli_error($con));
    }

?>

<div class="c-cari">
    <?php if ($total_results == 0) { ?>
        <div class="cari-head">
            <img style="max-height: 100px; margin: 20px;" src="./images/error-search.png"></img>
            <h1>Hasil Pencarian "<?=$search_query?>"</h1>
            <p>Kami tidak dapat menemukan artikel berdasarkan kata kunci pencarian Anda.</p>
        </div>
        <h2 style="padding: 20px 0 0 60px;">Rekomendasi Pencarian</h2>
        <div class="cari-body">
            <?php
            createSlider($con, $recom_sql); 
            ?>
        </div>
    <?php } elseif ($total_results > 0) { ?>
        <div class="cari-head">
            <h1>Hasil Pencarian "<?=$search_query?>"</h1>
            <p>Terdapat <?=$total_results?> artikel berkaitan</p>
        </div>
        <div class="cari-body" style="margin-top: 20px;">
            <?php
            createSlider($con, $search_sql);
            ?>
        </div>
    <?php } ?>
</div>

<?php
}
  require('./include/footer.php');
?>