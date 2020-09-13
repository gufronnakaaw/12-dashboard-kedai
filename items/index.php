<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Product",
    "sub-page" => "Items",
    "title" => "Items",
    "heading" => "Items"
];

require "../templates/header.php"; 
?>
<div class="row">
    <div class="col-6">
        <a href="<?= base_url("items/add.php"); ?>" id="btn-add-items" class="btn btn-success">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add Data
        </a>
    </div>
    <div class="col-6">
        <div class="form-group float-right">
            <input type="text" name="search_items" id="search_items" class="form-control" placeholder="Search..." autocomplete="off">
        </div>
    </div>
</div>

<div class="row mt-2 mb-2">
    <div class="col-12">
        <?= Flasher::flash(); ?>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Barcode</th>
                <th>Name Items</th>
                <th>Category</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if( $product->getAllItems() ): ?>
            <?php $no = 1; foreach( $product->getAllItems() as $prd ): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $prd->barcode; ?></td>
                <td><?= $prd->name_items; ?></td>
                <td><?= $prd->category; ?></td>
                <td><?= $prd->unit; ?></td>
                <td><?= $prd->price; ?></td>
                <td><?= $prd->stock; ?></td>
                <td>
                    
                    <a href="<?= base_url("items/edit.php?id={$prd->id_supplier}"); ?>" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>

                    <a href="<?= base_url("items/delete.php?id={$prd->id_supplier}"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('sure?')">
                        <i class="fa fa-trash"></i>
                        Delete
                    </a>
                    
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="alert alert-danger">Data Empty</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require "../templates/footer.php"; ?>