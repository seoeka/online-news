<?php
    function query($query)
    {
        // Koneksi database
        global $con;

        $result = mysqli_query($con, $query);

        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function getButtonTypeColor($artype_id) {
        switch ($artype_id) {
            case 1:
                return 'btn-hitam';
            case 2:
                return 'btn-oranye';
            case 3:
                return 'btn-biru';
            case 4:
                return 'btn-merah';
            default:
                return 'btn-lain';
        }
    }

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

    function createSlider($con, $query){
        $result = mysqli_query($con, $query);

        while ($article = mysqli_fetch_assoc($result)) {
            $article_date = date("d M Y", strtotime($article['created_at']));
            $id = $article['category_id'];
            ?>
            <div class="slider-slide">
                <div class="slider-item">
                    <a href="artikel.php?id=<?= $article['article_id']?>">
                        <div class="card-news">
                            <div class="card-img-body">
                                <img src="./control-panel/assets/images/articles/<?php echo $article['article_image']; ?>" class="card-img rounded zoom-img" alt="...">
                            </div>
                            <div class="card-body">
                                <a href="artikel.php?id=<?= $article['article_id']?>"><h4 class="card-title"><?= $article['article_title'] ?></h4></a>
                                <div class="card-t-c d-flex">
                                    <p><?= $article_date ?></p>
                                    <span>•</span>
                                    <a href="kategori.php?id=<?= $id?>"><?= $article['category_name'] ?></a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php }       
    }

    function displaySwiperSlides($con, $query) {
    $result = mysqli_query($con, $query);

    while ($article = mysqli_fetch_assoc($result)) {
        $article_date = date("d M Y", strtotime($article['created_at']));
        $id = $article['category_id'];
        ?>
        <div class="swiper-slide">
            <div class="w-270">
                <a href="artikel.php?id=<?= $article['article_id']?>">
                <div class="card-img-body">
                    <img src="./control-panel/assets/images/articles/<?php echo $article['article_image']; ?>"  class="card-img-top rounded zoom-img" alt="...">
    </div>
                    <div class="card-body">
                        <a href="artikel.php?id=<?= $article['article_id']?>"><h4 class="card-title"><?= $article['article_title'] ?></h4></a>
                        <div class="card-t-c d-flex">
                            <p><?= $article_date ?></p>
                            <span>•</span>
                            <a href="kategori.php?id=<?= $id?>"><?= $article['category_name'] ?></a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php }
    }
    
    function generateHeadline($title, $imageSrc, $date, $category, $id) {
        setlocale(LC_TIME, 'id_ID');
        $articleDate  = strftime("%d %B %Y", strtotime($date));
        echo '
        <h1>'.$category.'</h1>
        <div class="col">
            <div class="card c-main-head">
                    <a href="artikel.php?id='.$id.'">
                        <img src="./control-panel/assets/images/articles/' . $imageSrc . '" class="card-img blur-img" alt="...">
                    </a>
                    <div class="card-text-d position-absolute text-light w-100 bottom-0">
                        <a href="artikel.php?id='.$id.'"><h3 class="card-title title-news">' . $title . '</h3></a>
                        <div class="row row-span"> <!-- Pindahkan tag row ke sini -->
                            <span class="card-text col-6 col-sm-3">' . $articleDate . '</span>
                            <span class="card-text col-6 col-sm-3">' . $category . '</span>
                        </div>
                    </div>
            </div>
        </div>';
    }

?>
