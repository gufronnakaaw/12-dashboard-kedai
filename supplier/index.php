<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Supplier",
    "title" => "Supplier",
    "heading" => "Supplier"
];


require "../templates/header.php";
?>
<div class="row">
    <div class="col-6">
        <a href="<?= base_url("supplier/add.php"); ?>" id="btn-add-supplier" class="btn btn-success">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add Data
        </a>
    </div>
    <div class="col-6">
        <div class="form-group float-right">
            <input type="text" name="search_supplier" id="search_supplier" class="form-control" placeholder="Search..." autocomplete="off">
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
                <th>Name Supplier</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if( $supplier->getAllSpl() ): ?>
            <?php $no = 1; foreach( $supplier->getAllSpl() as $spl ): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $spl->name_supplier; ?></td>
                <td><?= $spl->address; ?></td>
                <td><?= $spl->phone_number; ?></td>
                <td><?= $spl->description; ?></td>
                <td>
                    
                    <a href="<?= base_url("supplier/edit.php?id={$spl->id_supplier}"); ?>" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>

                    <a href="<?= base_url("supplier/delete.php?id={$spl->id_supplier}"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('sure?')">
                        <i class="fa fa-trash"></i>
                        Delete
                    </a>
                    
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="alert alert-danger">Data Empty</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require "../templates/footer.php"; ?>