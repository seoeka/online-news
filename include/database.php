<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_news";

$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (!$con) {
  die("Tidak terkoneksi dengan database!");
}