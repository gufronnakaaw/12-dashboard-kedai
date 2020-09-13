<?php 
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Stock",
    "title" => "Stock Out",
    "heading" => "Stock Out",
    "sub-page" => "Stock-out"
];

require "../templates/header.php";
?>



<?php require "../templates/footer.php"; ?>