<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}


$data = [
    "page" => "Product",
    "sub-page" => "Categories",
    "title" => "Add Categories",
    "heading" => "Add Categories"
];


require "../templates/header.php"; 

?>

<a href="<?= base_url("categories/index.php"); ?>" class="btn btn-primary mb-3">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Back
</a>

<form action="<?= base_url("categories/process.php"); ?>" method="post" id="form_add_categories">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <label for="name_categories">Name Categories *</label>
                <input type="text" class="form-control" id="name_categories" name="name_categories">
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="btn_add_categories" id="btn_add_categories">Add</button>
            </div>
        </div>
    </div>
</form>

<?php require "../templates/footer.php"; ?>