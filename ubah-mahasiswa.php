<?php 

session_start();

if(!isset($_SESSION["login"])){
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
        exit;
}

$title = 'Ubah Mahasiswa';

include 'layout/header.php'; 

// mengambil id_mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa");
while($data = mysqli_fetch_array($mahasiswa)){
    $id = $data['id_mahasiswa'];
    $nama = $data['nama'];
    $prodi = $data['prodi'];
    $jk = $data['jk'];
    $telepon = $data['telepon'];
    $alamat = $data['alamat'];
    $email = $data['email'];
    $foto = $data['foto'];
}
// check apakah tombol tambah ditekan
if(isset($_POST['ubah'])){
    if (update_mahasiswa($_POST) > 0){
        echo "<script>
                alert('Data Mahasiswa Berhasil Diubah');
                document.location.href = 'mahasiswa.php';
                </script>";
    }else{
        echo "<script>
                alert('Data Mahasiswa Gagal Diubah');
                document.location.href = 'mahasiswa.php';
                </script>";
    }
}
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1>Ubah Mahasiswa</h1>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_mahasiswa" value="<?= $id; ?>">
                <input type="hidden" name="fotolama" value="<?= $foto ?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama ?>" placeholder="Nama Mahasiswa..." required>
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="prodi" class="form-label">Program Studi</label>
                        <select name="prodi" id="prodi" class="form-control" required>
                            <option value="Teknik Informatika" <?= $prodi == "Teknik Informatika" ? 'selected' : null ?>>Teknik Informatika</option>
                            <option value="Teknik Mesin" <?= $prodi == "Teknik Mesin" ? 'selected' : null ?>>Teknik Mesin</option>
                            <option value="Teknik Listrik" <?= $prodi == "Teknik Listrik" ? 'selected' : null ?>>Teknik Listrik</option>
                        </select>
                    </div>
                
                    <div class="mb-3 col-6">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="laki-laki" <?= $jk == "laki-laki" ? 'selected' : null ?>>laki-laki</option>
                            <option value="perempuan" <?= $jk == "perempuan" ? 'selected' : null ?>>perempuan</option>
                        </select>
                    </div>
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="number" class="form-control" name="telepon" id="telepon" value="<?= $telepon ?>" placeholder="Telepon..." required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $alamat ?>" placeholder="Alamat..." required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>" placeholder="Email..." required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto Mahasiswa...">
                        <p><small>Gambar Sebelumnya</small></p>
                        <img src="assets/img/<?= $foto ?>" alt="" class="img-thumbnail img-preview mt-2" width="100%">
                    </div>
                    <button type="submit" name="ubah" class="btn btn-primary" style="float: right"> <i class="fa fa-edit"></i> Ubah</button>
            </form>
            </div>
    </section>
</div><br><br>

<!-- preview image -->
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(0) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php'; ?>