<?php
  require('./include/header.php');
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    if(isset($_SESSION['USER_ID'])){ 
      $user_id = $_SESSION['USER_ID'];
    }
    else {
      alert("Login Terlebih Dahulu!");
      redirect('./login.php');
    }  

    if ($_SESSION['USER_ROLE'] == 'admin') {
        $user_table = 'admin';
        $user_id_column = 'admin_id';
    } elseif ($_SESSION['USER_ROLE'] == 'author') {
        $user_table = 'author';
        $user_id_column = 'author_id';
    } else {
        exit("Anda bukan bagian dari Admin atau Author!");
    }
    
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];
    
    $str_new_pass = md5($new_password);

    $sql = "SELECT * FROM $user_table 
            WHERE $user_id_column = {$user_id}";
    $result = mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);

    if($rows > 0) {
      $data = mysqli_fetch_assoc($result);
      $password_check = md5($old_password) === $data['password'];
      if($password_check) {
        $update_sql = " UPDATE $user_table
                        SET $user_table.password = '{$str_new_pass}'
                        WHERE $user_id_column = {$user_id}";
 
        $update_result = mysqli_query($con,$update_sql);
        if(!$update_result) {
          alert("Maaf. Silahkan Coba Sesaat Lagi!");
          redirect('./change-password.php');
        }
        else {
          alert("Password Telah Diganti!");
          redirect('./change-password.php');
        }
      }else {
        alert("Password Salah. Coba Sekali Lagi!");
        redirect('./change-password.php');
      }
    }
    else {
      alert("Wrong Password. Try again !");
    }
  }
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="./index.php">Beranda</a></li>
      <li class="active">Pengaturan</li>
      <li class="active">Ubah Password</li>
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
            <h3 class="panel-title">Ubah Password</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="change_pass_form">
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" autocomplete="off" class="form-control" placeholder="Password Lama"
                  name="old_password" id="old_password" required />
                <p id="error-old" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" autocomplete="off" class="form-control" placeholder="Password Baru"
                  name="new_password" id="new_password" required />
                <p id="error-new" class="error-msg text-danger"></p>
              </div>
              <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" autocomplete="off" class="form-control" placeholder="Konfirmasi Password Baru"
                  name="confirm_new_password" id="confirm_new_password" required />
                <p id="error-confirm" class="error-msg text-danger"></p>
                <p id="error-common" class="error-msg text-danger"></p>
              </div>
              <br>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/js/change-pass.js"></script>
</section>

<?php
  require('./include/footer.php')
?>