<?php 

session_start();

if(!isset($_SESSION["login"])){
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
        exit;
}

if($_SESSION["level"] != 1 && $_SESSION['level'] != 2){
    echo "<script>
            alert('Anda tidak punya hak akses');
            document.location.href = 'crud-modal.php';
        </script>";
        exit;
}

$title = 'Daftar Barang';

include 'layout/header.php'; 

$data_barang = select("SELECT * FROM barang ORDER BY id_barang ASC");
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid"><br>
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Barcode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_barang as $barang) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $barang['nama']; ?></td>
                                    <td><?= $barang['jumlah']; ?></td>
                                    <td>Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                                    <td class="rext-center"><img src="barcode.php?codetype=Code128&size=15&text=<?= $barang['barcode']; ?>&print=true" alt="barcode" /></td>
                                    <td><?= date("d/m/Y | H:i:s", strtotime($barang['tanggal'])); ?></td>
                                    <td width="15%" class="text-content">
                                    <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin Data Barang Akan Dihapus?');"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </section>
</div>
    
<?php include 'layout/footer.php'; ?>