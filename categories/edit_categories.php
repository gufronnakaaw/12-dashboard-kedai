<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}


$data = [
    "page" => "Product",
    "sub-page" => "Categories",
    "title" => "Edit Categories",
    "heading" => "Edit Categories"
];

$arr = [];
$id = $_POST['id_cat_edit'];

foreach( $product->getAllCat() as $prd ){
    array_push($arr, $prd->id_categories);
}


// cek apakah ada id yang diset
if( !isset($id) ){
    Flasher::setFlash("illegal", "danger");
    unset($arr);
    header("Location: index.php");
    exit();
}

// cek kalau id yg dikirim tidak ada di database
if( !in_array($id, $arr) ){
    Flasher::setFlash("Cannot find data", "danger");
    unset($arr);
    header("Location: index.php");
    exit();
}

unset($arr);

$result = $product->getOneCat($id);

require "../templates/header.php"; 
?>

<a href="<?= base_url("categories/index.php"); ?>" class="btn btn-primary mb-3">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Back
</a>

<form action="<?= base_url("categories/process.php"); ?>" method="post" id="form_edit_categories">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <input type="hidden" name="id_cat_edit" value="<?= $result->id_categories; ?>">

                <label for="edit_name_categories">Name Categories *</label>
                <input type="text" class="form-control" id="edit_name_categories" name="edit_name_categories" value="<?= $result->name_categories; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info" name="btn_edit_categories" id="btn_edit_categories">Edit</button>
            </div>
        </div>
    </div>
</form>

<?php require "../templates/footer.php"; ?>