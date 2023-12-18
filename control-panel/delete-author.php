<?php
  require('./include/header.php');
  
  if(isset($_GET['id'])) {
    $author_id = $_GET['id'];
  }else {
    redirect('./author.php');
  }
  if($author_id == '' || $author_id == null) {
    redirect('./author.php');
  } 

  $delete_sql = " DELETE FROM author 
                  WHERE author_id = {$author_id}";
  $cat_result = mysqli_query($con, $delete_sql); 
 
  if($cat_result) {
    redirect('./author.php');
  }
?>


<?php
  require('./include/footer.php')
?>