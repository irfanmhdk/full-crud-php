<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
    exit;
}

$title = 'Detail Mahasiswa';

include 'layout/header.php';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa");
$data = mysqli_fetch_array($mahasiswa);

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1>Data <?= $data['nama']; ?></h1>
            <hr>
            <table id="example" class="table table-bordered table-striped">
                <tr>
                    <td>Nama</td>
                    <td>: <?= $data['nama']; ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>: <?= $data['prodi']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?= $data['jk']; ?></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>: <?= $data['telepon'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= $data['alamat'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <?= $data['email']; ?></td>
                </tr>
                <tr>
                    <td width="50%">Foto</td>
                    <td><a href="assets/img/<?= $data['foto']; ?>">
                            <img src="assets/img/<?= $data['foto']; ?>" alt="foto" width="50%">
                        </a></td>
                </tr>
            </table>

            <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
        </div>
    </section>
</div>
</section>
</div>


<?php include 'layout/footer.php'; ?>