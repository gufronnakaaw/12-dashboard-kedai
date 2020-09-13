<?php 
require '../Config/init.php'; 
if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}


// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST['btn_add_items']) ){
    
    print_r($_POST);
}

?>