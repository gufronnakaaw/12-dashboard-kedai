<?php
require "../Config/init.php";

$data = [
    "page" => "Supplier",
    "title" => "Edit Supplier",
    "heading" => "Edit Supplier"
];


if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$arr = [];

foreach( $supplier->getAllSpl() as $spl ){
    array_push($arr, $spl->id_supplier);
}

$id = $_GET['id'];

if( !isset($id) ){
    Flasher::setFlash("illegal", "danger");
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

$result = $supplier->getOneSpl($_GET['id']);

require "../templates/header.php";
?>
<a href="<?= base_url("supplier/index.php"); ?>" class="btn btn-primary mb-3">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Back
</a>

<form action="<?= base_url("supplier/process.php"); ?>" method="post" id="form_edit_supplier">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="" method="post">
                <input type="hidden" name="id_supplier_edit" value="<?= $result->id_supplier; ?>">
                
                <div class="form-group">
                    <label for="edit_name_supplier">Name Supplier</label>
                    <input type="text" class="form-control" id="edit_name_supplier" name="edit_name_supplier" value="<?= $result->name_supplier; ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="edit_address_supplier">Address</label>
                    <input type="text" class="form-control" id="edit_address_supplier" name="edit_address_supplier" value="<?= $result->address; ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="edit_phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="edit_phone_number" name="edit_phone_number" value="<?= $result->phone_number; ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="edit_desc_supplier">Description (optional)</label>
                    <textarea name="edit_desc_supplier" id="edit_desc_supplier" class="form-control"><?= $result->description; ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info" name="btn_edit_supplier" id="btn_edit_supplier">Edit</button>
                </div>
            </form>
        </div>
    </div>
    
</form>
<?php require "../templates/footer.php"; ?>