<?php 
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Stock",
    "title" => "Stock In",
    "heading" => "Stock In",
    "sub-page" => "Stock-in"
];

require "../templates/header.php";
?>

<?php 

$data = [];
foreach($stock->getStock() as $mhs){
    array_push($data,$mhs->nama_buku);
    var_dump($mhs->penulis);
}
print_r($data);

// var_dump($stock->getStock())

?>

<?php require "../templates/footer.php"; ?>
