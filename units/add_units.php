<?php 
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Product",
    "sub-page" => "Units",
    "title" => "Add Units",
    "heading" => "Add Units"
];

require "../templates/header.php"; 

?>

<a href="<?= base_url("units/index.php"); ?>" class="btn btn-primary mb-3">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Back
</a>

<form action="<?= base_url("units/process.php"); ?>" method="post" id="form_add_units">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <label for="name_units">Name Units *</label>
                <input type="text" class="form-control" id="name_units" name="name_units">
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="btn_add_units" id="btn_add_units">Add</button>
            </div>
        </div>
    </div>
</form>

<?php require "../templates/footer.php"; ?>