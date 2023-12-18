<?php
  require('./include/header.php');
  
  if(isset($_GET['id'])) {
    $article_id = $_GET['id'];
  }else {
    redirect('./articles.php');
  }
  if($article_id == '' || $article_id == null) {
    redirect('./articles.php');
  } 

  $user_id = $_SESSION['USER_ID'];
  $author_name = $_SESSION['USER_NAME'];
  
  if (isset($_POST['submit'])) { 

    $article_id = $_GET['id'];
    $article_title = $_POST['article_title'];
    $article_desc = $_POST['article_desc'];
    $article_cat_id = $_POST['category_id'];
    $article_old_img = $_POST['article_old_img'];

    $article_title = str_replace('"','\"',$article_title);
    $article_desc = str_replace('"','\"',$article_desc);
    
    if(empty($_FILES['article_img']['name'])) {
      $basename = $article_old_img;
      $sql = "UPDATE article
            SET  category_id = \"$article_cat_id\",
            article_title = \"$article_title\",
            article_desc = \"$article_desc\"
            WHERE article_id = $article_id";

      $result = mysqli_query($con, $sql); 

      if($result) {
        alert("Artikel berhasil diedit ".$author_name." !");
        redirect('./articles.php');
      }

    }
    else {
      $name   = 'article-'.$article_cat_id.'-'.time(); 
      $extension  = pathinfo( $_FILES["article_img"]["name"], PATHINFO_EXTENSION ); 
      $basename   = $name . "." . $extension; 
      $name   = 'article-'.$article_cat_id.'-'.time(); 
      $extension  = pathinfo( $_FILES["article_img"]["name"], PATHINFO_EXTENSION ); 
      $basename   = $name . "." . $extension; 

      $tempname = $_FILES["article_img"]["tmp_name"];     

      $folder = "./assets/images/articles/{$basename}";   

      $sql = "UPDATE articles
            SET  category_id = \"$article_cat_id\",
            article_title = \"$article_title\",
            article_image = \"$basename\",
            article_desc = \"$article_desc\"
            WHERE article_id = $article_id";

      $result = mysqli_query($con, $sql); 
      
      if($result) { 
        unlink("./assets/images/articles/{$article_old_img}");
        move_uploaded_file($tempname, $folder);
        // echo "Data uploaded successfully"; 
        alert("Artikel berhasil diubah ".$author_name." !");
        redirect('./articles.php');
      }else{ 
        echo "Gagal mengunggah Data"; 
      } 
    }    
  }
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Beranda</a></li>
      <li><a href="./articles.php">Artikel</a></li>
      <li class="active">Edit</li>
    </ol>
  </div>
</section>

<section id="main">
  <div class="container">
    <div class="row">
      <?php
        $sql = "SELECT a.article_title, 
                a.created_at, 
                a.article_image, 
                a.article_active, 
                a.article_desc, 
                c.category_name,
                a.category_id 
                FROM articles a, categories c
                WHERE a.author_id = {$user_id} 
                AND a.article_id = {$article_id}
                AND a.category_id = c.category_id";
        
        $result = mysqli_query($con,$sql);
        $row = mysqli_num_rows($result);
        
        if($row == 0) {
          redirect('./articles.php');
        }
        
        $data = mysqli_fetch_assoc($result);
        $article_title = $data['article_title'];
        $article_desc = $data['article_desc'];
        $article_cat_id = $data['category_id'];
        $article_image = $data['article_image'];

        require('./include/nav-link.php');
      
      ?>
      <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Edit Artikel</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="edit_form" enctype="multipart/form-data">
              <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Judul Artikel"
                  value="<?php echo $article_title; ?>" name="article_title" id="article_title" required />
                <p id="error-title" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select name="category_id" class="form-control" name="category" id="category">
                  <?php
                    $cat_sql = "SELECT category_id, category_name FROM categories ORDER BY category_name ASC";
                    $cat_res = mysqli_query($con,$cat_sql);
                    $cat_row = mysqli_num_rows($cat_res);
                    
                    while($cat_data = mysqli_fetch_assoc($cat_res)) {
                      // echo "<pre>";
                      // print_r($cat_data); 
                      // echo "</pre>"; 
                      $selected = "";
                      $cat_id = $cat_data['category_id'];   
                      $cat_name = $cat_data['category_name'];
                      if($cat_id == $article_cat_id) {
                        $selected = "selected";
                      }
                      echo '
                        <option value="'.$cat_id.'"'.$selected.'>'.$cat_name.'</option>
                      ';   
                    }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label>Isi Artikel</label>
                <textarea name="article_desc" autocomplete="off" id="article_desc" class="form-control"
                  placeholder="Isi Artikel" rows="20" min="150" required><?php echo $article_desc; ?></textarea>
                <p id="error-desc" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Gambar Artikel</label>
                <input type="file" class="form-control" placeholder="Gambar Artikel" name="article_img" id="article_img"
                  accept="image/*" />
                <input type="hidden" class="form-control" name="article_old_img"
                  value="<?php echo $article_image; ?>" />
                <br>
              </div>
              <div class="form-group text-center">
                <img src="./assets/images/articles/<?php echo $article_image; ?>" class="image_preview"
                  id="image_preview" />
              </div>
              <br>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/js/admin/edit-form-validate.js"></script>
</section>

<?php
  require('./include/footer.php')
?>