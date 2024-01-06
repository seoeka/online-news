<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require('./include/header.php');

  $user_role = $_SESSION['USER_ROLE'];
  $author_id = $_SESSION['USER_ID'];
  $art_type = query("SELECT * FROM article_type art ORDER by artype_id");
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
        if ($_SESSION['USER_ROLE'] === 'admin') {
                  $sql = query("SELECT
                  a.article_id,
                  c.category_name,
                  a.article_title,
                  a.article_desc,
                  a.article_image,
                  a.created_at,
                  au.username,
                  a.article_active,
                  art.artype_name,
                  art.artype_id
                  FROM articles a
                  JOIN categories c ON a.category_id = c.category_id
                  JOIN author au ON a.author_id = au.author_id
                  JOIN article_type art ON a.article_type = art.artype_id
                  ORDER BY a.created_at DESC
                  LIMIT {$offset},{$limit}");
        }
        elseif ($_SESSION['USER_ROLE'] === 'author') {
                 $sql = query("SELECT 
                  a.article_id,
                  c.category_name,
                  a.article_title,
                  a.article_desc,
                  a.article_image,
                  a.created_at
                  FROM articles a
                  JOIN categories c ON a.category_id = c.category_id
                  JOIN author au ON a.author_id = au.author_id
                  WHERE a.author_id = {$author_id} 
                  ORDER BY a.created_at DESC,
                  a.article_id DESC
                  LIMIT {$offset},{$limit}");
        }
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
                if (count($sql) > 0) {
                  foreach ($sql as $row) {          
                      $category_name = $row['category_name'];
                      $article_id = $row['article_id'];
                      $article_title = $row['article_title'];
                      $article_desc = $row['article_desc'];
                      $article_image = $row['article_image'];
                      $article_date = $row['created_at'];
                          if ($_SESSION['USER_ROLE'] === 'admin') {
                              $article_author = $row['username'];
                              $artype_id = $row['artype_id'];
                              $artype_name = $row['artype_name'];
                              $article_active = $row['article_active'];

                          }       
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
                            if ($artype_id > 0)
                              {
                                ?> <!-- The modal -->
            <div class="modal fade" id="myEditModal<?= $article_id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                        <h4 class="modal-title" id="modalLabel">Modal Title</h4>
                                      </div>
                                      <form method="POST" action="config/crud.php">
                                      <input type="hidden" name="id" value="<?=$row['article_id']?>">
                                      <input type="hidden" name="id" value="<?=$article_id?>">

                                      <div class="modal-body">
                                        <div class="col">
                                            <label class="form-label">Jenis Artikel</label>
                                            <select class="form-select" name="art_type" required>
                                            <option value="<?=$artype_id?>" selected="selected" hidden=""> <?=$row['artype_name']?> </option>
                                            <?php foreach($art_type as $at) : ?>
                                            <option value="<?=$at['artype_id']; ?>"><?= $at['artype_name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                          </div>                    
                                        </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="bt_editP">Update</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Keluar</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <button class="btn custom-btn <?=getButtonTypeColor($artype_id)?>" data-toggle="modal" data-target="#myEditModal<?= $article_id ?>" title="<?= $artype_name?>">
                                  <span class="glyphicon glyphicon-heart"></span>
                                </button>
            <?php }
        
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
                      ?>
                  <?php      }
                        elseif($_SESSION['USER_ROLE'] === 'author'){
                            echo '
                            <a class="btn btn-primary" href="./edit-article.php?id='.$article_id.'">
                              <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a class="btn btn-danger" href="javascript:deleteConfirm('.$article_id.')" title="Hapus Artikel">
                              <span class="glyphicon glyphicon-trash"></span>
                            </a>';
                          }?>
                        </td>
                      </tr>
<?php                  }
                } else {
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
              if ($_SESSION['USER_ROLE'] === 'admin') {
                $paginationQuery = "SELECT * FROM articles";
              }
              elseif($_SESSION['USER_ROLE'] === 'author') {
                $paginationQuery = "SELECT * FROM articles WHERE author_id = $author_id ";
              }
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