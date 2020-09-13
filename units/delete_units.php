<?php 
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit();
}


$arr = [];
$id = $_GET['id'];

foreach( $product->getAllUnits() as $prd ){
    array_push($arr, $prd->id_units);
}


if( !isset($id) ){
    Flasher::setFlash("Illegal", "danger");
    header("Location: index.php");
    unset($arr);
    exit();
}

if( !in_array($id, $arr) ){
    Flasher::setFlash("Cannot find data", "danger");
    unset($arr);
    header("Location: index.php");
    exit();
}

unset($arr);

if( $product->deleteUnits($id) > 0){

    Flasher::setFlash("Units has been deleted", "success");
    header("Location: index.php");
    exit();
    
} else {
    
    Flasher::setFlash("Cannot delete units", "danger");
    header("Location: index.php");
    exit();
    
}

?>