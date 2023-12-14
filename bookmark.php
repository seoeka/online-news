<?php
  require('./include/header.php');
  
  if(!isset($_SESSION['USER_LOGGED_IN'])) {
    
    // Redirected to login page along with a message
    alert("Please Login to See Your Bookmarks");
    redirect('./user-login.php');
  }
?>