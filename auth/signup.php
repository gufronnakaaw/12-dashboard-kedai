<?php require_once '../Config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- our css -->
    <link rel="stylesheet" href="<?= base_url() ?>public/auth/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>
<body>

    <form action="<?= base_url("auth/process.php") ?>" method="post" class="form-signup">
        <div class="wrapper-signup">
            <h1><a href="signup.php" style="text-decoration: none; color: black;">Sign Up</a></h1>

            <?php if( isset($_GET['error']) ): ?>
                <small style="color: red; display: block; margin-top: 30px;">
                    <?= ($_GET['error'] === "email-already-exist") ? "Email already exist!" : '' ?>
                    <?= ($_GET['error'] === "username-already-exist") ? "Username already exist!" : '' ?>
                    <?= ($_GET['error'] === "invalid-email") ? "Invalid email!" : '' ?>
                    <?= ($_GET['error'] === "failed-signup") ? "Can't signup!" : '' ?>
                    <?= ($_GET['error'] === "password-not-same") ? "Password not same!" : '' ?>
                </small>
            <?php endif; ?>

            <input type="text" class="email-signup" name="email-signup" placeholder="Email" autocomplete="off">

            <input type="text" class="username-signup" name="username-signup" placeholder="Username" autocomplete="off">
        
            <div class="password-wrap">
                <input type="password" id="password-signup" name="password-signup" placeholder="Password">
                <button type="button" class="fa fa-eye" id="btn-eye"></button>
            </div>
            
            <div class="password-wrap">
                <input type="password" id="password-repeat" name="password-repeat-signup" placeholder="Repeat Password">
                <button type="button" class="fa fa-eye" id="btn-eye-repeat"></button>
            </div>

            <button type="submit" name="btn-signup" class="btn-signup">Submit</button>
        </div>
    </form>
<script>
    const btnEye = document.getElementById('btn-eye');
    const btnEyeRepeat = document.getElementById('btn-eye-repeat');
    const inputPw = document.getElementById('password-signup');
    const inputPwRepeat = document.getElementById('password-repeat');

    btnEye.addEventListener('click', function(e){
        if( inputPw.type == "password" ){

            e.target.setAttribute("class", "fas fa-eye-slash");
            inputPw.type = "text";

        } else {

            e.target.setAttribute("class", "fas fa-eye");
            inputPw.type = "password";

        }
    });
    
    btnEyeRepeat.addEventListener('click', function(e){
        if( inputPwRepeat.type == "password" ){

            e.target.setAttribute("class", "fas fa-eye-slash");
            inputPwRepeat.type = "text";

        } else {

            e.target.setAttribute("class", "fas fa-eye");
            inputPwRepeat.type = "password";

        }
    });


</script>
</body>
</html>