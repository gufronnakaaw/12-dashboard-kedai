<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}


$data = [
    "page" => "Product",
    "sub-page" => "Units",
    "title" => "Edit Units",
    "heading" => "Edit Units"
];

$arr = [];
$id = $_GET['id'];

foreach( $product->getAllUnits() as $prd ){
    array_push($arr, $prd->id_units);
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

$result = $product->getOneUnits($id);

require "../templates/header.php"; 
?>

<a href="<?= base_url("units/index.php"); ?>" class="btn btn-primary mb-3">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Back
</a>

<form action="<?= base_url("units/process.php"); ?>" method="post" id="form_edit_units">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <input type="hidden" name="id_units_edit" value="<?= $prd->id_units; ?>">

                <label for="edit_name_units">Name Units *</label>
                <input type="text" class="form-control" id="edit_name_units" name="edit_name_units" value="<?= $prd->name_units; ?>">
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info" name="btn_edit_units" id="btn_edit_units">Edit</button>
            </div>
        </div>
    </div>
</form>

<?php require "../templates/footer.php"; ?>