<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Product",
    "sub-page" => "Items",
    "title" => "Add Items",
    "heading" => "Items"
];

require "../templates/header.php";

?>

<a href="<?= base_url("items/index.php"); ?>" class="btn btn-primary mb-3">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Back
</a>

<form action="<?= base_url("items/process.php"); ?>" method="post" id="form_add_items">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <label for="barcode_items">Barcode *</label>
                <input type="text" class="form-control" id="barcode_items" name="barcode_items" autocomplete="off">
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <label for="name_items">Name Items *</label>
                <input type="text" class="form-control" id="name_items" name="name_items" autocomplete="off">
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <label for="category_items">Category *</label>
                <select class="form-control" id="category_items" name="category_items">
                    <option value="">- Pilih -</option>
                    <?php foreach($product->getAllCat() as $cat): ?>
                    <option value="<?= strtolower($cat->name_categories); ?>"><?= $cat->name_categories; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <label for="unit_items">Unit *</label>
                <select class="form-control" id="unit_items" name="unit_items">
                    <option value="">- Pilih -</option>
                    <?php foreach($product->getAllUnits() as $unit): ?>
                    <option value="<?= strtolower($unit->name_units); ?>"><?= $unit->name_units; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback max-number">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <label for="price_items">Price *</label>
                <input type="number" class="form-control" id="price_items" name="price_items" autocomplete="off" placeholder="Please fill this input without dot(.) ex: 1000">
                <div class="invalid-feedback max-number">
                    This field is required
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="btn_add_items" id="btn_add_items">Add</button>
            </div>
        </div>
    </div>
    
</form>

<?php require "../templates/footer.php"; ?>