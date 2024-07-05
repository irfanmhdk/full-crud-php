<?php 

session_start();

if(!isset($_SESSION["login"])){
    echo "<script>
            alert('Login dulu');
            document.location.href = 'login.php';
        </script>";
        exit;
}

$title = 'Kirim Email';

include 'layout/header.php'; 

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1><i class="fas fa-envelope"></i> Kirim Email</h1>
            <hr>
            <form action="email-proses.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Penerima</label>
                    <input type="email" class="form-control" name="email_penerima" id="email" placeholder="Email Penerima..." required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="number" class="form-control" name="subject" id="subject" placeholder="Subject..." required>
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="10" required></textarea>
                </div>
                <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">Kirim</button>
            </form>
            </div>
    </section>
</div>

<?php include 'layout/footer.php'; ?>