<?php 
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit();
}


$arr = [];

foreach( $supplier->getAllSpl() as $spl ){
    array_push($arr, $spl->id_supplier);
}

$id = $_GET['id'];

if( !isset($id) ){
    Flasher::setFlash("Illegal", "danger");
    header("Location: index.php");
    unset($arr);
    exit();
}

if( !in_array($id, $arr) ){
    Flasher::setFlash("Cannot find data", "danger");
    header("Location: index.php");
    unset($arr);
    exit();
}

unset($arr);

if( $supplier->deleteSupplier($id) > 0){

    Flasher::setFlash("Supplier has been deleted", "success");
    header("Location: index.php");
    exit();
    
} else {
    
    Flasher::setFlash("Cannot delete supplier", "danger");
    header("Location: index.php");
    exit();
}

?>