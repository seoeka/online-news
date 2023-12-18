<?php
  require('./include/header.php');
  
  if (isset($_POST['submit'])) { 
    
    $author_name = $_POST['author_name'];
    $author_mail = $_POST['author_mail'];
    $author_pass = $_POST['author_pass'];
    $author_name = str_replace('"','\"',$author_name);
    $author_pass = md5($author_pass);

    $sql = "INSERT INTO author (username, email, password) 
            VALUES (\"$author_name\", \"$author_mail\", \"$author_pass\")"; 

    $result = mysqli_query($con, $sql); 
    
    if ($result)  { 
      alert("Author ditambahkan!");
      redirect('./author.php');
    }else{ 
      alert("Gagal menambahkan Author!") ; 
      redirect('./add-author.php');
    } 
  }
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./author.php">Author</a></li>
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
            <h3 class="panel-title">Tambah Author</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="add_form" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Author</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Nama Author"
                  name="author_name" id="author_name" required />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" autocomplete="off" class="form-control" placeholder="Email"
                  name="author_mail" id="author_mail" required />
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Password"
                  name="author_pass" id="author_pass" required />
              </div>
              <br>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Tambah Author</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/admin/add-form-validate-author.js"></script>
</section>

<?php
  require('./include/footer.php')
?>