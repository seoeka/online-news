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

  $sql = "UPDATE articles
          SET article_active = 0 
          WHERE article_id = {$article_id}";
          
  $result = mysqli_query($con, $sql);
 
  if($result) {
    alert("Artikal disembunyikan");
    redirect('./articles.php');
  }
  else {
    alert("Error, coba sesaat lagi");
    redirect('./articles.php');
  }
?>

<?php
  require('./include/footer.php')
  ?>