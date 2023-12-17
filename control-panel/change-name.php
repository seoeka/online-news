<?php
  require('./include/header.php');
  
  if (isset($_POST['submit'])) { 
    
    if(isset($_SESSION['USER_ID'])){ 
      $user_id = $_SESSION['USER_ID'];
    }
    
    $old_name = $_POST['old_name'];
    $new_name = $_POST['new_name'];
    $confirm_name = $_POST['confirm_name'];

    $sql = "SELECT username FROM author 
            WHERE author_id = {$user_id}
            AND username = '{$old_name}'";
    $result = mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0) {
      $update_sql = " UPDATE author 
                      SET username = '{$new_name}'
                      WHERE author_id = {$user_id}";
      $update_result = mysqli_query($con,$update_sql);
      if(!$update_result) {
        alert("Maaf. Coba kembali beberapa saat lagi!");
        redirect('./change-name.php');
      }
      else {
        $_SESSION['USER_NAME'] = $new_name;
        alert("Nama berhasil diubah !");
        redirect('./change-name.php');
      }
    }
    else {
      alert("Salah Nama. Coba Sekali lagi !");
      redirect('./change-name.php');
    }
  }
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Beranda</a></li>
      <li class="active">Pengaturan</li>
      <li class="active">Ubah Nama</li>
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
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Ubah Nama</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="change_name_form">
              <div class="form-group">
                <label>Nama Lama</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Nama Baru" name="old_name"
                  id="old_name" required />
                <p id="error-old" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Nama Baru</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Nama Lama" name="new_name"
                  id="new_name" required />
                <p id="error-new" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Konfirmasi New Nama</label>
                <input type="text" autocomplete="off" class="form-control" placeholder="Konfirmasi Nama Baru"
                  name="confirm_name" id="confirm_name" required />
                <p id="error-confirm" class="error-msg text-danger"></p>
                <p id="error-common" class="error-msg text-danger"></p>
              </div>
              <br>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/admin/change-name-validate.js"></script>
</section>

<?php
  require('./include/footer.php')
?>