<?php
  require('./include/header.php');
  
  if (isset($_POST['submit'])) { 
    
    if(isset($_SESSION['USER_ID'])){ 
      $author_id = $_SESSION['USER_ID'];
    }
    
    $article_title = $_POST['article_title'];
    $article_desc = $_POST['article_desc'];
    $article_cat_id = $_POST['category_id'];

    $article_title = str_replace('"','\"',$article_title);
    $article_desc = str_replace('"','\"',$article_desc);

    $name   = 'article-'.$article_cat_id.'-'.time(); 
    $extension  = pathinfo( $_FILES["article_img"]["name"], PATHINFO_EXTENSION ); 
    $basename   = $name . "." . $extension; 

    $tempname = $_FILES["article_img"]["tmp_name"];     
    $folder = "./assets/images/articles/{$basename}"; 
    
    $article_date = date("Y-m-d");

    $sql = "INSERT INTO articles 
            (category_id,author_id,article_title,article_image,article_desc,created_at,article_type,article_active) 
            VALUES 
            (\"$article_cat_id\",\"$author_id\",\"$article_title\",\"$basename\",\"$article_desc\",\"$article_date\",1,0)"; 

    $result = mysqli_query($con, $sql);

    if (!$result) {
    die('Error executing query: ' . mysqli_error($con));
} 
    
    if ($result)  { 
      move_uploaded_file($tempname, $folder);
      alert("Article posted. Please wait for Admin to activate it.");
      redirect('./articles.php');
    }else{ 
      echo "Failed to upload Data"; 
    } 
  }
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Beranda</a></li>
      <li><a href="./articles.php">Artikel</a></li>
      <li class="active">Tambah</li>
    </ol>
  </div>
</section>

<section id="main">
  <div class="container">
    <div class="row">
      <?php
        require('./include/nav-link.php');
      ?>
      <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Tambah Artikel</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="add_form" enctype="multipart/form-data">
              <div class="form-group">
                <label>Article Title</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Judul Artikel"
                  name="article_title" id="article_title" required />
                <p id="error-title" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select name="category_id" class="form-control" id="category">
                  <option value="0" selected>Pilih Kategori...</option>
                  <?php
                    $cat_sql = "SELECT category_id, category_name FROM categories ORDER BY category_name ASC";
                    $cat_res = mysqli_query($con,$cat_sql);
                    $cat_row = mysqli_num_rows($cat_res);
                    
                    while($cat_data = mysqli_fetch_assoc($cat_res)) {
                      $cat_id = $cat_data['category_id'];   
                      $cat_name = $cat_data['category_name'];
                      echo '
                        <option value="'.$cat_id.'">'.$cat_name.'</option>
                      ';   
                    }
                    ?>
                </select>
                <p id="error-cat" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Isi Artikel</label>
                <textarea name="article_desc" autocomplete="off" id="article_desc" class="form-control"
                  placeholder="Isi Artikel" rows="20" min="150" required></textarea>
                <p id="error-desc" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Gambar Artikel</label>
                <input type="file" class="form-control" placeholder="Gambar Artikel" name="article_img" id="article_img"
                  accept="image/*" required />
                <p id="error-img" class="error-msg text-danger"></p>
              </div>
              <div class="form-group text-center">
                <img src="./assets/images/articles/choose.png" class="image_preview" id="image_preview" />
              </div>
              <br>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Unggah Artikel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/js/add-form-validate.js"></script>
</section>

<?php
  require('./include/footer.php')
?>