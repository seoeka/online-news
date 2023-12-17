<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require('./include/header.php');

  $user_role = $_SESSION['USER_ROLE'];

?>


<script>
function deleteConfirm(id) {
  if (confirm("Apa anda yakin ingin menghapus artikel ini ?")) {
    var url = "./delete-article.php?id=" + id;
    document.location = url;
  }
}
</script>

<!-- BREADCRUMB -->
<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Beranda</a></li>
      <li class="active">Artikel</li>
    </ol>
  </div>
</section>


<section id="main">
  <div class="container">
    <div class="col-md-12">
      <?php
        $limit = 6;
        if(isset($_GET['page'])) {
          $page = $_GET['page'];
        }else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT a.article_title, 
                a.article_id, 
                a.created_at, 
                au.username as author_name, 
                a.article_image, 
                a.article_type, 
                a.article_active, 
                a.article_desc, 
                c.category_name 
                FROM articles a
                JOIN categories c ON a.category_id = c.category_id
                JOIN author au ON a.author_id = au.author_id
                ORDER BY a.created_at DESC
                LIMIT {$offset},{$limit}";

                $result = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($result);


      ?>
      <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h3 class="panel-title">Artikel</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover article-table">
            <tr>
              <th style="min-width: 200px">Judul</th>
              <th style="min-width: 120px">Kategori</th>
              <th style="min-width: 250px">Konten</th>
              <th style="min-width: 90px">Gambar</th>
              <?php
                if ($_SESSION['USER_ROLE'] === 'admin') {
                  echo '<th style="min-width: 130px">Author</th>';
                }
              ?>              <th style="min-width: 100px">Tanggal Rilis</th>
              <th style="min-width: 150px">Aksi</th>
            </tr>
            <?php
                if($num_rows > 0) {
                  while($data = mysqli_fetch_assoc($result)) {
                    $category_name = $data['category_name'];
                    $article_id = $data['article_id'];
                    $article_title = $data['article_title'];
                    $article_type = $data['article_type'];
                    $article_desc = $data['article_desc'];
                    $article_image = $data['article_image'];
                    $article_date = $data['created_at'];
                    $article_author = $data['author_name'];
                    $article_active = $data['article_active'];

                    $article_desc = substr($article_desc,0,100);
                    $article_date = date("d M y",strtotime($article_date));

                    echo '
                      <tr>
                        <td>
                          '.$article_title.'
                        </td>
                        <td>
                          '.$category_name.'
                        </td>
                        <td>
                          '.$article_desc.'
                        </td>
                        <td>
                          <img src="./assets/images/articles/'.$article_image.'" />
                        </td>';
                            if ($_SESSION['USER_ROLE'] === 'admin') {
                            echo '<td>'.$article_author.'</td>';
                            }
                        echo '
                        <td>
                          '.$article_date.'
                        </td>
                        <td>';
                        if($_SESSION['USER_ROLE'] === 'admin'){
                            if($article_type > 0) {
                                echo '
                                <a class="btn btn-danger" href="./show-trend.php?id='.$article_id.'" title="Remove Article Trend">
                                  <span class="glyphicon glyphicon-heart"></span>
                                </a>
                                ';
                              }
                              else {
                                echo '
                                <a class="btn btn-warning" href="./activate-trend.php?id='.$article_id.'" title="Make Article Trending">
                                  <span class="glyphicon glyphicon-heart-empty"></span>
                                </a>
                                ';
                              }
                              if($article_active > 0) {
                                echo '
                                <a class="btn btn-success" href="./hide-article.php?id='.$article_id.'" title="Sembunyikan Artikel">
                                  <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                ';
                              }
                              else {
                                echo '
                                <a class="btn btn-info" href="./show-article.php?id='.$article_id.'" title="Tampilkan Artikel">
                                  <span class="glyphicon glyphicon-eye-close"></span>
                                </a>
                                ';
                              }
                        }
                        elseif($_SESSION['USER_ROLE'] === 'author'){
                            echo '
                            <a class="btn btn-primary" href="./edit-article.php?id='.$article_id.'" title="Edit Artikel">
                              <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a class="btn btn-danger" href="javascript:deleteConfirm('.$article_id.')" title="Hapus Artikel">
                              <span class="glyphicon glyphicon-trash"></span>
                            </a>';
                        }
                        echo '
                        </td>
                      </tr>
                    ';
                  }
                }
                else {
                  echo '
                    <td colspan="7" align="center" style="padding-top: 28px; color: var(--active-color);">
                      <h4>
                        Penulis harus segera menulis!
                      </h4>
                    </td>
                  ';
                }
              ?>
          </table>
        </div>
        <div class="text-center">
          <ul class="pagination pg-red">
            <?php
              $paginationQuery = "SELECT * FROM articles";
              $paginationResult = mysqli_query($con, $paginationQuery);
              if(mysqli_num_rows($paginationResult) > 0) {
                $total_articles = mysqli_num_rows($paginationResult);
                $total_page = ceil($total_articles / $limit);

                if($page > $total_page) {
                  redirect('./articles.php');
                }
                if($page > 1) {
                  echo '
                    <li class="page-item">
                      <a href="articles.php?page='.($page - 1).'" class="page-link">
                        <span>&laquo;</span>
                      </a>
                    </li>';
                }
                for($i = 1; $i <= $total_page; $i++) {
                  $active = "";
                  if($i == $page) {
                    $active = "active";
                  }
                  echo '<li class="page-item '.$active.'"><a href="./articles.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
                }
                if($total_page > $page){
                  echo '
                    <li class="page-item">
                      <a href="articles.php?page='.($page + 1).'" class="page-link">
                        <span>&raquo;</span>
                      </a>
                    </li>';
                }
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  require('./include/footer.php')
?>