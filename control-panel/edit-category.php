<?php
  require('./include/header.php');
  
  if(isset($_GET['id'])) {
    $category_id = $_GET['id'];
  }else {
    redirect('./categories.php');
  }
  if($category_id == '' || $category_id == null) {
    redirect('./categories.php');
  } 
  if (isset($_POST['submit'])) { 
    $category_id = $_GET['id'];
    $category_name = mysqli_real_escape_string($con, $_POST['category_title']);
    
    $sql = "UPDATE categories
            SET category_name = '$category_name'
            WHERE category_id = $category_id";

    $result = mysqli_query($con, $sql);

    if($result) {
        alert("Kategori Telah Diperbaharui ");
        redirect('./categories.php');
    } else { 
        echo "Gagal Memperbaharui Data"; 
    } 
}
 
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./categories.php">Kategori</a></li>
      <li class="active">Edit</li>
    </ol>
  </div>
</section>

<section id="main">
  <div class="container">
    <div class="row">
      <?php
        $sql = "SELECT * 
                FROM categories
                WHERE category_id = {$category_id}";
        
        $result = mysqli_query($con,$sql);
        $row = mysqli_num_rows($result);
        
        if($row == 0) {
          redirect('./categories.php');
        }
        
        $data = mysqli_fetch_assoc($result);
        $category_name = $data['category_name'];

        require('./include/nav-link.php');
      
      ?>
      <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Tambah Kategori</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="edit_form" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Category Name"
                  name="category_title" id="category_title" required value="<?php echo $category_name ?>" />
                <p id="error-title" class="error-msg text-danger"></p>
              </div>
              <br>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Edit Kategori</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/admin/edit-form-validate-category.js"></script>
</section>

<?php
  require('./include/footer.php')
?>