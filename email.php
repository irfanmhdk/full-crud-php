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

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'irfanmhdk141@gmail.com';
$mail->Password = 'kzfelcpchoylwivf';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

if (isset($_POST['kirim'])){
    $mail->setFrom('irfanmhdk141@gmail.com', 'Irfan Mahardika');
    $mail->addAddress($_POST['email_penerima']);
    $mail->addReplyTo('irfanmhdk141@gmail.com', 'Tutorial Irfan Mahardika');

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['pesan'];

    if($mail->send()){
            echo "<script>
                    alert('Data Email Berhasil Dikirim');
                    document.location.href = 'email.php';
                    </script>";
        }else{
            echo "<script>
                    alert('Data Email Gagal Dikirim');
                    document.location.href = 'email.php';
                    </script>";
        }
        exit();
}
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1><i class="fas fa-envelope"></i> Kirim Email</h1>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Penerima</label>
                    <input type="email" class="form-control" name="email_penerima" id="email" placeholder="Email Penerima..." required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject..." required>
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="10" required></textarea>
                </div>
                <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">Kirim</button>
            </form>
            </div>
    </section>
</div><br><br>

<?php include 'layout/footer.php'; ?>