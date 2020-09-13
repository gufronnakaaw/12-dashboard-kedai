<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
    exit;
}


$data = [
    "page" => "Product",
    "sub-page" => "Categories",
    "title" => "Categories",
    "heading" => "Categories"
];


require "../templates/header.php"; 

?>
<div class="row">
    <div class="col-6">
        <a href="<?= base_url("categories/add_categories.php"); ?>" id="btn-add-categories" class="btn btn-success">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add Data
        </a>
    </div>
    <div class="col-6">
        <div class="form-group float-right">
            <input type="text" name="search_categories" id="search_categories" class="form-control" placeholder="Search..." autocomplete="off">
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
                <th>Name Categories</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if( $product->getAllCat() ) :?>
            <?php $no = 1; foreach( $product->getAllCat() as $cat ): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $cat->name_categories; ?></td>
                <td>
                    <form action="<?= base_url('categories/edit_categories.php') ?>" method="post" class="d-inline">
                        <input type="hidden" name="id_cat_edit" value="<?= $cat->id_categories; ?>">
                        
                        <button type="submit" class="btn btn-info btn-sm">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            Edit
                        </button>
                    </form>

                    <form action="<?= base_url('categories/delete_categories.php') ?>" method="post" class="d-inline">
                        <input type="hidden" name="id_cat_delete" value="<?= $cat->id_categories; ?>">
                        
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('sure?');">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            Delete
                        </button>
                    </form>
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