<?php
  require('./include/header.php');

  $user_id = ($_SESSION['USER_ID']);
?>

<section id="main">
  <div class="container">
    <div class="row">
      <?php
       require('./include/nav-link.php');

       $user_role = $_SESSION['USER_ROLE'];
      ?>
      <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Overview</h3>
          </div>
          <div class="panel-body" style="padding: 2.5rem;">
            <div class="col-md-4">
              <div class="well dash-box">
                <h2>
                  <span class="glyphicon glyphicon-pencil"></span>
                  <?php 
                  if ($user_role === 'admin'){
                    echo $no_of_articles;
                    }
                  elseif ($user_role === 'author') {
                    echo $no_of_articles_au;
                  };?>
                </h2>
                <h4>Artikel</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="well dash-box">
                <h2>
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                  <?php echo $no_of_categories;?>
                </h2>
                <h4>Kategori</h4>
              </div>
            </div>
            <div class="col-md-4">
              <?php
              if ($user_role === 'admin') {
                  echo '<a href="author.php" style="color: #333333;"><div class="well dash-box">';
                  echo '<h2><span class="glyphicon glyphicon-user"></span>';
                  echo $no_of_au;
                  echo '</h2>';
                  echo '<h4>Author</h4>';
                  echo '</div></a>';
              }
              ?>
            </div>
            <div class="col-md-4">
              <?php
              if ($user_role === 'author') {
                  echo '<div class="well dash-box">';
                  echo '<h2><span class="glyphicon glyphicon-user"></span>';
                  echo $no_of_type;
                  echo '</h2>';
                  echo '<h4>Jenis Artikel</h4>';
                  echo '</div>';
              }
              ?>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <?php
        
        if($user_role === 'admin'){
          $sql = "SELECT a.article_title, 
          a.created_at, 
          a.article_image, 
          c.category_name,
          au.username author_name 
          FROM articles a
          JOIN categories c ON a.category_id = c.category_id
          JOIN author au ON a.author_id = au.author_id
          ORDER BY a.created_at DESC
          LIMIT 4";
        }
        elseif ($user_role === 'author'){
          $sql = "SELECT a.article_title, 
          a.created_at, 
          a.article_image, 
          c.category_name 
          FROM articles a, categories c
          WHERE a.author_id = {$user_id} 
          AND a.category_id = c.category_id 
          ORDER BY created_at DESC
          LIMIT 4";
        }
        
        $result = mysqli_query($con,$sql);
        $num_rows = mysqli_num_rows($result);
        
      ?>
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">Artikel Terbaru</h4>
          </div>
          <div class="panel-body">
            <table class="table table-striped article-list table-hover">
              <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <?php
                if ($_SESSION['USER_ROLE'] !== 'author') {
                  echo '<th>Author Name</th>';
                }
                ?>                
                <th>Waktu Publikasi</th>
              </tr>
              <?php
                if($num_rows > 0) {
                  while($data = mysqli_fetch_assoc($result)) {
                    $category_name = $data['category_name'];
                    if($user_role === 'admin'){
                      $author_name = $data['author_name'];
                    }
                    $article_title = $data['article_title'];
                    $article_image = $data['article_image'];
                    $article_date = $data['created_at'];
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
                          <img src="./assets/images/articles/'.$article_image.'" />
                        </td>';
                        if ($_SESSION['USER_ROLE'] !== 'author') {
                          echo '<td>
                                  ' . $author_name . '
                                </td>';
                        }
                    echo '
                        <td>
                          '.$article_date.'
                        </td>
                      </tr>
                    ';
                  }
                  echo '
                    <tr>
                      <td colspan="4" align="center" style="padding-top: 2rem;">
                        <a href="./articles.php" class="btn btn-danger ">Lihat Semua</a>
                      </td>
                    </tr>
                  ';
                }
                else {
                  echo '<td align="center" style="padding-top: 28px; color: var(--active-color);"';
                
                  if ($_SESSION['USER_ROLE'] === 'author') {
                    echo ' colspan="4"';
                  } elseif ($_SESSION['USER_ROLE'] === 'admin') {
                    echo ' colspan="5"';
                  }
                
                  echo '>';
                  
                  if ($_SESSION['USER_ROLE'] === 'author') {
                    echo '<h4>Kamu harus segera menuliskan artikel ' . $_SESSION['USER_NAME'] . '!</h4>';
                  } elseif ($_SESSION['USER_ROLE'] === 'admin') {
                    echo '<h4>Kamu harus mengingatkan author untuk membuat artikel!</h4>';
                  }
                  
                  echo '</td>';
                }
                
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  require('./include/footer.php');
?>