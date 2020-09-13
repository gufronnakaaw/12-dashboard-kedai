<?php
require "../Config/init.php";

if( isset($_POST['btn-login']) ){
    $email = $_POST['email_login'];
    $password = $_POST['password_login'];
    
    if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        
        header("Location: " . base_url("auth/login.php?error=invalid-email&old=$email") );
        
    } else {

        // cek apakah email ada dalam database
        if( $auth->checkEmail($email) > 0 ){

            // kalo ada email dalam database
            // cek password inputan user apakah sama dengan password di database
            if( password_verify($password, $auth->getDataByEmail($email)->password) ){
                // kalo sama dengan password di database, redirect ke halaman dashboard
                // buat session login dengan isi true dan session username dengan isi username dari database

                $_SESSION["login"] = true;
                $_SESSION["username"] = $auth->getDataByEmail($email)->username;
                header("Location: " . base_url("dashboard/index.php"));
                
            } else {
                
                // kalo password tidak sama, beri pesan error bahwa password salah
                header("Location: " . base_url("auth/login.php?error=wrong-password&old=$email") );
                exit();
                
            }

        } else {

            // kalo tidak ada email dalam database, beri pesan error bahwa email tidak ada dalam database
            header("Location: " . base_url("auth/login.php?error=unknown-email&old=$email") );
            exit();
            
        }
        
    }

} else if( isset($_POST['btn-signup']) ){

    $email = $_POST['email-signup'];
    $password = $_POST['password-signup'];
    $passwordRepeat = $_POST['password-repeat-signup'];
    $username = $_POST['username-signup'];

    // cek apakah format email benar 
    if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        
        header("Location: " . base_url("auth/signup.php?error=invalid-email") );
        
    } else if( $auth->checkEmail($email) ){  
        
        // cek apakah email ada dalam database
        header("Location: " . base_url("auth/signup.php?error=email-already-exist") );
        
    } else if( $password !== $passwordRepeat ){
        
        // cek apakah password 1 dan password 2 sama
        header("Location: " . base_url("auth/signup.php?error=password-not-same") );

    } else {

        // cek apakah username ada dalam database
        if( $auth->checkUsername($username) ) {
            
            header("Location: " . base_url("auth/signup.php?error=username-already-exist") );
            
        } else {

            // apabila telah lolos
            // data akan kita insert ke database

            // cek apakah process insert berhasil
            if( $auth->signUp($_POST) > 0 ){
                
                // apabila berhasil redirect ke halaman login
                header("Location: " . base_url("auth/login.php") );
                
            } else {

                // apabila gagal redirect ke halaman signup 
                header("Location: " . base_url("auth/signup.php?error=failed-signup") );
                
            }
            

        }

    }

}