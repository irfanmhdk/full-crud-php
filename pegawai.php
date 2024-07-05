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

$title = 'Daftar Pegawai';

include 'layout/header.php';

$data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="tambah-pegawai.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

                        <a href="download-excel-pegawai.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>

                        <a href="download-pdf-pegawai.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="live_data">
                            <?php $no = 1; ?>
                                <?php foreach ($data_pegawai as $pegawai) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pegawai['nama']; ?></td>
                                    <td><?= $pegawai['prodi']; ?></td>
                                    <td><?= $pegawai['jk']; ?></td>
                                    <td><?= $pegawai['telepon']; ?></td>
                                    <td>
                                        <a href="detail-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-view"></i> Detail</a>
                                        <a href="ubah-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="hapus-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Pegawai Akan Dihapus?');"><i class="fas fa-trash"></i> Hapus</a>
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

    <script>
        $('document').ready(function() {
            setInterval(function() {
                getPegawai()
            }, 200)
        });

        function getPegawai()
        {
            $.ajax({
                url: "realtime-pegawai.php",
                type: "GET",
                success: function(response) {
                    $('#live_data').html(response)
                }
            })
        }
    </script>
  
<?php include 'layout/footer.php'; ?>