<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'user@example.com';
$mail->Password = 'secret';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

if (isset($_POST['kirim'])){
    $mail->setFrom('irfanmhdk141@gmail.com', 'Irfan Mahardika');
    $mail->addAddress($_POST['email_penerima']);
    $mail-> addReplyTo('irfanmhdk141@gmail.com', 'Tutorial Irfan Mahardika');

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
}
?>