<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
    exit;
}

if ($_SESSION["level"] != 1 && $_SESSION['level'] != 4 && $_SESSION["level"] != 5 && $_SESSION['level'] != 6) {
    echo "<script>
            alert('Anda tidak punya hak akses');
            document.location.href = 'crud-modal.php';
        </script>";
    exit;
}

$title = 'Daftar Pegawai';

include 'layout/header.php';

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Data Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody id="live_data">

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
            getPegawai();
        }, 200)
    });

    function getPegawai() {
        $.ajax({
            url: "realtime-pegawai.php",
            type: "GET",
            success: function(response) {
                $('#live_data').html(response);
            }
        });
    }
</script>

<?php include 'layout/footer.php'; ?>