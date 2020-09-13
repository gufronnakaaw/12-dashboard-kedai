<?php
require "../Config/init.php";

if( !isset($_SESSION['login']) ){
    header("Location: " . base_url("auth/login.php"));
}

$data = [
    "page" => "Profile",
    "title" => "Profile",
    "heading" => "Profile"
];

$user = $auth->getDataByUsername($_SESSION['username']);
require "../templates/header.php";
?>

<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="text-center">
            <img src="<?= base_url("public/img/img_user/"); ?><?= $user->img_user; ?>" alt="..." class="img-thumbnail" style="width: 200px; height: 200px;">
        </div>

        <div class="form-group mt-4">
            <label>Email</label>
            <input type="text" class="form-control" disabled value="<?= $user->email; ?>">
        </div>
        
        <div class="form-group mt-4">
            <label>Username</label>
            <input type="text" class="form-control" disabled value="<?= $user->username; ?>">
        </div>
    </div>
</div>

<?php require "../templates/footer.php"; ?>