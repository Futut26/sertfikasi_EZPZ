<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("location: index.php");
}
?>

<?php
include '../class/Pasien.php';
$pasien = new Pasien();
$idPasien = $_GET['idPasien'];
$data = $pasien->edit($idPasien);
?>

<?php
include '../layout/header.php';
?>


<main class="h-auto border berder-2xl mt-20 flex">

    <?php
    include '../layout/navbar.php';
    ?>

    <div class="p-20 ">

        <div class="overflow-x-auto border">
            <div class="modal-box w-[600px]">
                <h3 class="font-bold text-xl text-center">Edit data pasien <?= $data['NamaPasien'] ?></h3>
                <form action="../handler/proses_pasien.php?aksi=update" method="post">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Id Pasien</span>
                        </label>
                        <input type="text" name="idPasien" id="idPasien" placeholder="idPasien" class="input input-bordered" required value="<?= $data['idPasien'] ?>" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nik</span>
                        </label>
                        <input type="text" name="Nik" id="Nik" placeholder="Nik" class="input input-bordered" required value="<?= $data['Nik'] ?>" />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Pasien</span>
                        </label>
                        <input type="text" name="NamaPasien" id="NamaPasien" placeholder="Nama Pasien" class="input input-bordered" required value="<?= $data['NamaPasien'] ?>" />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Tanggal Registrasi</span>
                        </label>
                        <input type="date" name="dtRegister" id="dtRegister" placeholder="Tanggal Registrasi" class="input input-bordered" required value="<?= $data['dtRegister'] ?>" />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">No Hp</span>
                        </label>
                        <input type="text" name="noHP" id="noHP" placeholder="No Hp" class="input input-bordered" required value="<?= $data['noHP'] ?>" />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">User Name</span>
                        </label>
                        <input type="text" name="userName" id="userName" placeholder="User Name" class="input input-bordered" required value="<?= $data['userName'] ?>" />
                    </div>

                    <div class="form-control p-10">
                        <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">Submit</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</main>





<script>
    function confirmSubmit() {
        return confirm('Apakah Anda yakin ingin menambah data ini?');
    }
</script>
<?php
include '../layout/footer.php';
?>