<?php
  require('./include/header.php');  
?>

<script>
function deleteConfirm(id) {
  if (confirm("Apa anda yakin ingin menghapus author ini ?")) {
    var url = "./delete-author.php?id=" + id;
    document.location = url;
  }
}
</script>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Beranda</a></li>
      <li class="active">Author</li>
    </ol>
  </div>
</section>


<section id="main">
  <div class="container">
    <div class="col-md-12">
      <?php
        $limit = 5;
        if(isset($_GET['page'])) {
          $page = $_GET['page'];
        }else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * 
                FROM author
                ORDER BY username ASC
                LIMIT {$offset},{$limit}";
        $result = mysqli_query($con,$sql);
        $row = mysqli_num_rows($result);

      ?>
      <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h3 class="panel-title">Author</h3>     
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover article-list">
            <tr>
              <th style="min-width: 80px; text-align:center">Nama Author</th>
              <th style="min-width: 120px; text-align:center">Email</th>
              <th style="min-width: 80px; text-align:center">Password</th>
              <th style="min-width: 20px">Aksi</th>
            </tr>
            <?php
                if($row > 0) {
                  while($data = mysqli_fetch_assoc($result)) {
                    $author_name = $data['username'];
                    $author_id = $data['author_id'];
                    $author_pass = $data['password'];
                    $author_mail = $data['email'];

                    echo '
                      <tr>
                        <td style="text-align:center;">
                          '.$author_name.'
                        </td>
                        <td style="text-align:center;">
                          '.$author_mail.'
                        </td>
                        <td style="text-align:center;">
                          '.$author_pass.'
                        </td>
                        <td>
                          <a class="btn btn-danger" href="javascript:deleteConfirm('.$author_id.')" title="Hapus Artikel">
                              <span class="glyphicon glyphicon-trash"></span>
                          </a>
                        </td>
                      </tr>
                    ';
                  }
                }
                else {
                  echo '
                    <td colspan="5" align="center" style="padding-top: 28px; color: var(--active-color);">
                      <h4>
                        Kamu harus menambahkan author !
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
              $paginationQuery = "SELECT * FROM author";
              $paginationResult = mysqli_query($con, $paginationQuery);
              if(mysqli_num_rows($paginationResult) > 0) {
                $total_author = mysqli_num_rows($paginationResult);
                $total_page = ceil($total_author / $limit);

                if($page > $total_page) {
                  redirect('./author.php');
                }
                if($page > 1) {
                  echo '
                    <li class="page-item">
                      <a href="author.php?page='.($page - 1).'" class="page-link">
                        <span>&laquo;</span>
                      </a>
                    </li>';
                }
                for($i = 1; $i <= $total_page; $i++) {
                  $active = "";
                  if($i == $page) {
                    $active = "active";
                  }
                  echo '<li class="page-item '.$active.'"><a href="./author.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
                }
                if($total_page > $page){
                  echo '
                    <li class="page-item">
                      <a href="author.php?page='.($page + 1).'" class="page-link">
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