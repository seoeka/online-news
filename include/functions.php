<?php
    function redirect($link){ ?>
    <script>
        window.location.href = '<?php echo $link ?>';
    </script>
<?php
    die();
    }

    function alert($message){
    ?>
    <script>
        alert('<?php echo $message ?>');
    </script>
<?php
    }

    function displaySwiperSlides($con, $query) {
    $result = mysqli_query($con, $query);

    while ($article = mysqli_fetch_assoc($result)) {
        $articleDate = date("d M Y", strtotime($article['created_at']));
        $id = $article['category_id'];
        ?>
        <div class="swiper-slide">
            <div class="card-news w-270">
                <a href="artikel.php?id=<?= $id?>">
                    <img src="./control-panel/assets/images/articles/<?php echo $article['article_image']; ?>"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="#"><h4 class="card-title"><?= $article['article_title'] ?></h4></a>
                        <div class="card-t-c d-flex">
                            <a href="#" class="date"><?= $articleDate ?></a>
                            <span>•</span>
                            <a href="kategori.php?id=<?= $id?>" class="category"><?= $article['category_name'] ?></a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php }
    }
    
    function generateHeadline($title, $imageSrc, $date, $category) {
        setlocale(LC_TIME, 'id_ID');
        $articleDate  = strftime("%d %B %Y", strtotime($date));
        echo '
        <h1>'.$category.'</h1>
        <div class="col">
            <div class="card bg-dark text-white c-main-head">
                <a href="">
                    <img src="./control-panel/assets/images/articles/' . $imageSrc . '" class="card-img" alt="...">
                    <div class="card-text-d position-absolute text-light w-100 bottom-0">
                        <h3 class="card-title p-2 m-0 title-news">' . $title . '</h3>
                        <span class="card-text p-2 m-0 date">' . $articleDate . '</span>
                        <span class="card-text p-2 m-0 category">' . $category . '</span>
                    </div>
                </a>
            </div>
        </div>';
    }
    
?>
