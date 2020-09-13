<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Supplier",
    "title" => "Add Supplier",
    "heading" => "Add Supplier"
];

require "../templates/header.php";

?>

<a href="<?= base_url("supplier/index.php"); ?>" class="btn btn-primary mb-3">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Back
</a>

<form action="<?= base_url("supplier/process.php"); ?>" method="post" id="form_add_supplier">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <label for="name_supplier">Name Supplier *</label>
                <input type="text" class="form-control" id="name_supplier" name="name_supplier" autocomplete="off">
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <label for="address_supplier">Address *</label>
                <input type="text" class="form-control" id="address_supplier" name="address_supplier" autocomplete="off">
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number *</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" autocomplete="off">
                <div class="invalid-feedback max-number">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <label for="desc_supplier">Description (optional)</label>
                <textarea name="desc_supplier" id="desc_supplier" class="form-control" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="btn_add_supplier" id="btn_add_supplier">Add</button>
            </div>
        </div>
    </div>
    
</form>

<?php require "../templates/footer.php"; ?>