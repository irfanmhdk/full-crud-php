<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
    exit;
}

$title = 'Ubah Barang';

include 'layout/header.php';

// mengambil id_barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = mysqli_query($db, "SELECT * FROM barang WHERE id_barang = $id_barang");
while ($data = mysqli_fetch_array($barang)) {
    $id = $data['id_barang'];
    $nama = $data['nama'];
    $jumlah = $data['jumlah'];
    $harga = $data['harga'];
}
// check apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
                alert('Data Barang Berhasil Diubah');
                document.location.href = 'barang.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Diubah');
                document.location.href = 'barang.php';
                </script>";
    }
}
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1>Ubah Barang</h1>
            <hr>
            <form action="" method="post">

                <input type="hidden" name="id_barang" value="<?= $id; ?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama ?>" placeholder="Nama Barang..." required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $jumlah ?>" placeholder="Jumlah Barang..." required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Barang</label>
                    <input type="number" class="form-control" name="harga" id="harga" value="<?= $harga ?>" placeholder="Harga Barang..." required>
                </div>

                <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
            </form>
        </div>
    </section>
</div>

<?php include 'layout/footer.php'; ?>