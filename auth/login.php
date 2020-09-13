<?php 
require "../Config/init.php"; 

if( isset($_SESSION["login"]) ){
    header("Location:" . base_url("dashboard/"));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- our css -->
    <link rel="stylesheet" href="<?= base_url() ?>public/auth/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>
<body>
    <form action="<?= base_url("auth/process.php") ?>" method="post" class="form-login" id="form-login">
        <div class="wrapper-login">
            <h1><a href="<?= base_url("auth/login.php"); ?>">Login</a></h1>
<?php if( isset($_GET['error']) ): ?>
    <?php if($_GET['error'] == "invalid-email") : ?>
            <div class="input-wrap">
                <input type="text" class="email-login border-red" name="email_login" placeholder="Email" autofocus value="<?= $_GET['old']; ?>">
            </div>
            <div class="email-error" style="color: red; display: block;">
                <small>Invalid Email</small>
            </div>
            
            <div class="password-wrap">
                <input type="password" class="password-login" name="password_login" placeholder="Password">
                <button type="button" class="fa fa-eye" id="btn-eye-login"></button>
            </div>
            <div class="password-error" style="color: red; display: none;">
                <small>This field is required!</small>
            </div>

            <button type="submit" class="btn-login" name="btn-login">Submit</button>
        </div>
    </form>
    <?php endif; ?>
    <?php if($_GET['error'] == "unknown-email") : ?>
            <div class="input-wrap">
                <input type="text" class="email-login border-red" name="email_login" placeholder="Email" autofocus value="<?= $_GET['old']; ?>">
            </div>
            <div class="email-error" style="color: red; display: block;">
                <small>Unknown Email</small>
            </div>
            
            <div class="password-wrap">
                <input type="password" class="password-login" name="password_login" placeholder="Password">
                <button type="button" class="fa fa-eye" id="btn-eye-login"></button>
            </div>
            <div class="password-error" style="color: red; display: none;">
                <small>This field is required!</small>
            </div>

            <button type="submit" class="btn-login" name="btn-login">Submit</button>
        </div>
    </form>
    <?php endif; ?>
    <?php if($_GET['error'] == "wrong-password") : ?>
            <div class="input-wrap">
                <input type="text" class="email-login" name="email_login" placeholder="Email" autofocus value="<?= $_GET['old']; ?>">
            </div>
            <div class="email-error" style="color: red; display: none;">
                <small>This field is required!</small>
            </div>
            
            <div class="password-wrap">
                <input type="password" class="password-login border-red" name="password_login" placeholder="Password">
                <button type="button" class="fa fa-eye" id="btn-eye-login"></button>
            </div>
            <div class="password-error" style="color: red; display: block;">
                <small>Wrong Password</small>
            </div>

            <button type="submit" class="btn-login" name="btn-login">Submit</button>
        </div>
    </form>
    <?php endif; ?>

<?php else: ?>
            <div class="input-wrap">
                <input type="text" class="email-login" name="email_login" placeholder="Email" autofocus autocomplete="off">
            </div>
            <div class="email-error" style="color: red; display: none;">
                <small>This field is required!</small>
            </div>
            
            <div class="password-wrap">
                <input type="password" class="password-login" name="password_login" placeholder="Password">
                <button type="button" class="fa fa-eye" id="btn-eye-login"></button>
            </div>
            <div class="password-error" style="color: red; display: none;">
                <small>This field is required!</small>
            </div>
            
            <button type="submit" class="btn-login" name="btn-login">Submit</button>
        </div>
    </form>

<?php endif ?>
<script src="<?= base_url("public/auth/js/"); ?>jquery-3.4.1.min.js"></script>   
<script src="<?= base_url("public/auth/js/"); ?>app.js"></script>
</body>
</html>