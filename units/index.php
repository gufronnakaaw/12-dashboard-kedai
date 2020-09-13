<?php 
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}

$data = [
    "page" => "Product",
    "sub-page" => "Units",
    "title" => "Units",
    "heading" => "Units"
];

require "../templates/header.php"; 

?>
<div class="row">
    <div class="col-6">
        <a href="<?= base_url("units/add_units.php"); ?>" id="btn-add-units" class="btn btn-success">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add Data
        </a>
    </div>
    <div class="col-6">
        <div class="form-group float-right">
            <input type="text" name="search_units" id="search_units" class="form-control" placeholder="Search..." autocomplete="off">
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
                <td>#</td>
                <td>Name Units</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php if( $product->getAllUnits() ): ?>
            <?php $no = 1; foreach( $product->getAllUnits() as $units ) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $units->name_units; ?></td>
                <td>
                    <a href="<?= base_url("units/edit_units.php?id={$units->id_units}") ?>" class="btn btn-info btn-sm">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        Edit
                    </a>
                    <a href="<?= base_url("units/delete_units.php?id={$units->id_units}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('sure?')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
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