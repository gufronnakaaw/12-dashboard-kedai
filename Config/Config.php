<?php 

function base_url($url = null){
    $base_url = "http://localhost/latihan/kedai/";
    if( $url !== null ){
        return $base_url . $url;
    }

    return $base_url;
}


function displayError($error){
    return '<small style="color: red;">'. $error .'</small>';
}

function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getDateNow()
{
    $timezone = new DateTimeZone('Asia/Jakarta');
    $date = new DateTime();
    $date->setTimeZone($timezone);

    return $date->format("Y-m-d H:i:s");
}

define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "kedai");