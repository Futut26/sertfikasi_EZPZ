<?php 

include '../class/Pasien.php';

$pasien = new Pasien();

$aksi = $_GET['aksi'];

if($aksi == "tambah"){
    $Nik = $_POST['Nik'];
    $NamaPasien = $_POST['NamaPasien'];
    $dtRegister = $_POST['dtRegister'];
    $noHp = $_POST['noHp'];
    $userName = $_POST['userName'];
    $tgl_penambahan = date("Y-m-d");
    $pasien->input($Nik, $NamaPasien, $dtRegister, $noHp, $userName, $tgl_penambahan);
}else if($aksi == "delete"){
    $idPasien = $_GET['idPasien'];
    $pasien->delete($idPasien);
}if($aksi == "update"){
    $idPasien = $_POST['idPasien'];
    $Nik = $_POST['Nik'];
    $NamaPasien = $_POST['NamaPasien'];
    $dtRegister = $_POST['dtRegister'];
    $noHp = $_POST['noHP'];
    $userName = $_POST['userName'];
    $tgl_penambahan = date("Y-m-d");
    $pasien->update($idPasien, $Nik, $NamaPasien, $dtRegister, $noHp, $userName );
}