<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
}

$data = [
    "page" => "Settings",
    "title" => "Settings",
    "heading" => "Settings"
];
$user = $auth->getDataByUsername($_SESSION['username']);
require "../templates/header.php"; 
?>

<div class="row">
    <div class="col-md-4 offset-md-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="text-center">
                <img src="<?= base_url("public/img/img_user/"); ?><?= $user->img_user; ?>" alt="..." class="img-thumbnail" style="width: 200px; height: 200px;">
            </div>

            <div class="form-group mt-4">
                <label>Change Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="edit_img_user" name="edit_img_user">
                    <label class="custom-file-label" for="edit_img_user">Choose file</label>
                </div>
            </div>
            
            <div class="form-group mt-4">
                <label>Email</label>
                <input type="text" class="form-control" disabled value="<?= $user->email; ?>">
            </div>
            
            <div class="form-group mt-4">
                <label>Username</label>
                <input type="text" class="form-control" value="<?= $user->username; ?>" name="edit_username_user">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-info" name="btn_edit_user" id="btn_edit_user">Edit</button>
            </div>
        </form>
    </div>
</div>

<?php require "../templates/footer.php"; ?>