<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit();
}

$arr = [];
$id = $_POST['id_cat_delete'];

foreach( $product->getAllCat() as $prd ) {
    array_push($arr, $prd->id_categories);
}


// cek apakah dia punya id atau tidak
// kalau tidak punya redirect dia ke index dan tampilkan error
if( !isset($id) ){
    Flasher::setFlash("Illegal", "danger");
    unset($arr);
    header("Location: index.php");
    exit();
}


// cek apakah id yang di kirim ada di database
// kalau ada lakukan delete
// kalau tidak redirect ke index dan tampilkan error
if( !in_array($id, $arr) ){
    Flasher::setFlash("Cannot find data", "danger");
    unset($arr);
    header("Location: index.php");
    exit();
}

unset($arr);

if( $product->deleteCat($id) > 0 ){
    
    Flasher::setFlash("Supplier has been deleted", "success");
    header("Location: index.php");
    exit();

} else {

    Flasher::setFlash("Cannot delete data", "danger");
    header("Location: index.php");
    exit();

}


?>