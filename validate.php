<?php
if(isset($_POST['g-recaptcha-response'])){
    $secreatkey = "6LdZl80mAAAAAP3WVnY7CPdFN8kQiLWNdBiRX7k0";
    $ip = $_SERVER['REMOTE_ADRR'];
    $response = $_POST['g-recaptcha-respose'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secreatkey&response=$response&remoteip=$ip";
    $fire = file_get_contents($url);
    $data = json_decode($fire);
    if($data->success==true){
        echo "success";
    }else{
        echo "please fill recaptcha";
    }
}else{
    echo "Recaptcha Error";
}
?>