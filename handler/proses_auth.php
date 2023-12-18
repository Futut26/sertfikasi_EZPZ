<?php 
include '../class/Auth.php';
$auth = new Auth();

$aksi = $_GET['aksi'];

if($aksi == "login"){
    $username= $_POST['username'];
    $password = $_POST['password'];
    $auth->login($username, $password);
}else if($aksi == "logout"){
    $auth->logout();
}

?>