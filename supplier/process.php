<?php
require '../Config/init.php'; 
if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit();
}


// add supplier
if( isset($_POST["btn_add_supplier"]) ){

    if( $supplier->addSupplier($_POST) ){

        Flasher::setFlash("Supplier has been added", "success");
        header("Location: index.php");
        exit();
        
    } else {

        Flasher::setFlash("Cannot add supplier", "danger");
        header("Location: index.php");
        exit();

    }
    
}

if( isset($_POST["btn_edit_supplier"]) ){

    if( $supplier->editSupplier($_POST) ){

        Flasher::setFlash("Supplier has been edited", "success");
        header("Location: index.php");
        exit();
        
    } else {

        Flasher::setFlash("Cannot edit supplier", "danger");
        header("Location: index.php");
        exit();

    }
    
}

echo json_encode(['message' => 'forbidden']);
?>