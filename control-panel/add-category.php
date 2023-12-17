<?php
  require('./include/header.php');
  
  if (isset($_POST['submit'])) { 
    
    $category_name = $_POST['category_title'];

    $category_name = str_replace('"','\"',$category_name);

    $name   = $category_name.time(); 

    $sql = "INSERT INTO categories (category_name) 
            VALUES (\"$category_name\")"; 

    $result = mysqli_query($con, $sql); 
    
    if ($result)  { 
      alert("Kategori ditambahkan!");
      redirect('./categories.php');
    }else{ 
      echo "Gagal mengunggah Kategori!"; 
    } 
  }
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./categories.php">Kategori</a></li>
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
            <h3 class="panel-title">Tambah Kategori</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="add_form" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Category Name"
                  name="category_title" id="category_title" required />
                <p id="error-title" class="error-msg text-danger"></p>
              </div>
              <br>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Buat Kategori</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/admin/add-form-validate-category.js"></script>
</section>

<?php
  require('./include/footer.php')
?>