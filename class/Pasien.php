<?php
include 'Database.php';

class Pasien extends Database
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $sql = "SELECT * FROM pasien";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC); // Mengambil semua baris hasil query menjadi array
        return $data;
    }

    // Metode pencarian
    function search($keyword)
    {
        $sql = "SELECT * FROM pasien WHERE Nik LIKE '%$keyword%' OR NamaPasien LIKE '%$keyword%'";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC); // Mengambil semua baris hasil query menjadi array
        return $data;
    }

    function input($Nik, $NamaPasien, $dtRegister, $noHp, $userName, $tgl_penambahan)
    {


        $sql_insert = "INSERT INTO pasien (Nik, NamaPasien, dtRegister, noHP, userName, dtCreate) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = $this->koneksi->prepare($sql_insert);
        $stmt_insert->bind_param('ssssss', $Nik, $NamaPasien, $dtRegister, $noHp, $userName, $tgl_penambahan);

        if ($stmt_insert->execute()) {
            echo "<script>alert('Data pasien berhasil ditambahkan!')</script>";
            echo "<script>window.location.href = '../view/dashboard.php'</script>";
        } else {
            echo "<script>alert('Data pasien gagal ditambahkan!')</script>";
            echo "<script>window.location.href = '../view/dashboard.php'</script>";
        }
    }

    function edit($idPasien)
    {
        $sql = "SELECT * FROM pasien WHERE idPasien = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param('s', $idPasien);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }

    function update($idPasien, $Nik, $NamaPasien, $dtRegister, $noHp, $userName)
    {
        $sql_update = "UPDATE pasien SET Nik = ?, NamaPasien = ?, dtRegister = ?, noHP = ?, userName = ? WHERE idPasien = ?";
        $stmt_update = $this->koneksi->prepare($sql_update);
        $stmt_update->bind_param('sssssi', $Nik, $NamaPasien, $dtRegister, $noHp, $userName, $idPasien);


        if ($stmt_update->execute()) {
            echo "<script>alert('Data Pasien berhasil diupdate!')</script>";
            echo "<script>window.location.href = '../view/dashboard.php'</script>";
        } else {
            echo "<script>alert('Data Pasien gagal diupdate!')</script>";
            echo "<script>window.location.href = '../view/dashboard.php'</script>";
        }
    }

    function delete($idPasien)
    {
        $sql = "DELETE FROM pasien WHERE idPasien = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param('i', $idPasien);
        $stmt->execute();
        echo "<script>alert('Data Pasien berhasil dihapus!')</script>";
        echo "<script>window.location.href = '../view/dashboard.php'</script>";
    }
}
