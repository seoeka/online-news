<?php
  require('../include/functions.php');
  require('../include/database.php');
  
  session_start();
  
  unset($_SESSION['USER_LOGGED_IN']);
  unset($_SESSION['session_roles']);
  
  redirect('./login.php');
?>