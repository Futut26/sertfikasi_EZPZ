<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("location: index.php");
}
?>

<?php
include '../class/Pasien.php';
$pasien = new Pasien();



if (isset($_POST['keyword'])) {
    $result = $pasien->search($_POST['keyword']);
} else {
    $result = $pasien->index();
}
?>

<?php
include '../layout/header.php';
?>


<main class="h-auto border berder-2xl mt-20 flex">

    <?php
    include '../layout/navbar.php';
    ?>

    <div class="p-20 ">
        <div class="flex mb-5 gap-5">
            <h1 class="text-3xl font-bold">Data Pasien</h1>


            <form method="post">
                <input type="text" name="keyword" placeholder="Cari Data" class="input input-bordered w-96">
                <input type="submit" value="Cari" class="btn border-black btn-info">
            </form>

            <btn class="btn btn-success" onclick="modal_tambah.showModal()">Tambah Data</btn>
        </div>
        <div class="overflow-x-auto border">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Registrasi</th>
                        <th>No.Hp</th>
                        <th>User Name</th>
                        <th>Tanggal Penambahan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result as $data) :
                    ?>
                        <tr class="text-center">
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $data['Nik']; ?>
                            </td>
                            <td>
                                <?= $data['NamaPasien']; ?>
                            </td>
                            <td>
                                <?= $data['dtRegister']; ?>
                            </td>
                            <td>
                                <?= $data['noHP']; ?>
                            </td>

                            <td>
                                <?= $data['userName']; ?>
                            </td>
                            <td>
                                <?= $data['dtCreate']; ?>
                            </td>

                            <td>
                                <a href="edit.php?idPasien=<?= $data['idPasien']; ?>" class="btn btn-primary">Edit</a>
                                <btn class="btn btn-error" onclick="confirmDelete(<?= $data['idPasien']; ?>)">Hapus</btn>
                            </td>

                            <script>
                                function confirmDelete(idPasien) {
                                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                                        window.location.href = `../handler/proses_pasien.php?idPasien=${idPasien}&aksi=delete`;
                                    }
                                }
                            </script>
                        <?php endforeach; ?>
                        <tr class="text-center">
                            <td class="text-center">

                            </td>

                            <td class="text-center">

                            </td>

                            <td class="text-center">

                            </td>

                            <td class="text-center">

                            </td>

                            <td class="text-center">

                            </td>

                            <td class="text-center">

                            </td>

                            <td class="text-center">
                                <h1>Jumlah Data Pasien</h1>
                            </td>

                            <td>
                                <?php echo is_array($result) ? count($result) : 0; ?>
                            </td>
                        </tr>
                </tbody>

            </table>
        </div>

    </div>
</main>



<dialog id="modal_tambah" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-xl text-center">Tambah data pasien</h3>
        <form action="../handler/proses_pasien.php?aksi=tambah" method="post">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nik</span>
                </label>
                <input type="text" name="Nik" id="Nik" placeholder="Nik" class="input input-bordered" required />
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama Pasien</span>
                </label>
                <input type="text" name="NamaPasien" id="NamaPasien" placeholder="Nama Pasien" class="input input-bordered" required />
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Tanggal Registrasi</span>
                </label>
                <input type="date" name="dtRegister" id="dtRegister" placeholder="Tanggal Registrasi" class="input input-bordered" required />
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">No Hp</span>
                </label>
                <input type="text" name="noHp" id="noHp" placeholder="No Hp" class="input input-bordered" required />
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">User Name</span>
                </label>
                <input type="text" name="userName" id="userName" placeholder="User Name" class="input input-bordered" required />
            </div>

            <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">Submit</button>

        </form>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>


<script>
    function confirmSubmit() {
        return confirm('Apakah Anda yakin ingin menambah data ini?');
    }
</script>
<?php
include '../layout/footer.php';
?>