<?php 
require '../Config/init.php'; 
if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

// check if we have btn-add-categories
if( isset($_POST['btn_add_categories']) ){
    
    if( $product->addCat($_POST) > 0 ){

        Flasher::setFlash("Categories has been added", "success");
        header("Location: index.php");
        exit();

    } else {

        Flasher::setFlash("Cannot add categories", "danger");
        header("Location: index.php");
        exit();

    }
    
}

// cek apakah btn edit categories sudah diklik atau belum
if( isset($_POST['btn_edit_categories']) ){
    
    // cek apakah proses edit nya sudah berhasil atau belum
    if( $product->editCat($_POST) ){

        Flasher::setFlash("Categories has been edited", "success");
        header("Location: index.php");
        exit();

    } else {
        
        Flasher::setFlash("Cannot edit categories", "danger");
        header("Location: index.php");
        exit();

    }
}

?>