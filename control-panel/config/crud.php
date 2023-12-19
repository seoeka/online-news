<?php
require('../../include/functions.php');
require('../../include/database.php');

if(isset($_POST['bt_editP'])) {
    $update = mysqli_query($con, "UPDATE articles SET article_type = '$_POST[art_type]' 
    WHERE article_id = '$_POST[id]'");

    if($update){
        alert('Simpan data Produk berhasil!');
        redirect('../articles.php');
    } else {
        alert('Salah');
        redirect('../articles.php');
    } 
    }
?>