<?php

session_start();

if(!isset($_SESSION["login"])){
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
        exit;
}

if($_SESSION["level"] != 1 && $_SESSION['level'] != 3){
    echo "<script>
            alert('Anda tidak punya hak akses');
            document.location.href = 'crud-modal.php';
        </script>";
        exit;
}

$title = 'Daftar Mahasiswa';

include 'layout/header.php';

$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

                        <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>

                        <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $mahasiswa['nama']; ?></td>
                                    <td><?= $mahasiswa['prodi']; ?></td>
                                    <td><?= $mahasiswa['jk']; ?></td>
                                    <td><?= $mahasiswa['telepon']; ?></td>
                                    <td>
                                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-view"></i> Detail</a>
                                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Mahasiswa Akan Dihapus?');"><i class="fas fa-trash"></i> Hapus</a>
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
        </section>
    </div>
  
<?php include 'layout/footer.php'; ?>