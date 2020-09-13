<?php 
require '../Config/init.php'; 
if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

// check if we have btn-add-units
if( isset($_POST['btn_add_units']) ){
    
    if( $product->addUnits($_POST) > 0 ){

        Flasher::setFlash("Units has been added", "success");
        header("Location: index.php");
        exit();

    } else {

        Flasher::setFlash("Cannot add units", "danger");
        header("Location: index.php");
        exit();

    }
    
}

// cek apakah btn edit units sudah diklik atau belum
if( isset($_POST['btn_edit_units']) ){
    
    // cek apakah proses edit nya sudah berhasil atau belum
    if( $product->editUnits($_POST) ){

        Flasher::setFlash("Units has been edited", "success");
        header("Location: index.php");
        exit();

    } else {
        
        Flasher::setFlash("Cannot edit units", "danger");
        header("Location: index.php");
        exit();

    }
}

?>