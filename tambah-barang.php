<?php 

session_start();

if(!isset($_SESSION["login"])){
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
        exit;
}

$title = 'Tambah Barang';

include 'layout/header.php'; 

if(isset($_POST['tambah'])){
    if (create_barang($_POST) > 0){
        echo "<script>
                alert('Data Barang Berhasil Ditambahkan');
                document.location.href = 'barang.php';
                </script>";
    }else{
        echo "<script>
                alert('Data Barang Gagal Ditambahkan');
                document.location.href = 'barang.php';
                </script>";
    }
}
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1>Tambah Data Barang</h1>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang..." required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Barang..." required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Barang</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Barang..." required>
                </div>
                <input type="submit" name="tambah" class="btn btn-primary" style="float: right;">
            </form>
            </div>
    </section>
</div>

<?php include 'layout/footer.php'; ?>