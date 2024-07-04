<?php

include 'config/app.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CRUD PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Barang</a>
                        </li>
                    <?php endif; ?>

                    <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 3) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="crud-modal.php">Akun</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirm('Yakin ingin keluar?')">Keluar</a>
                    </li>
                </ul>
                </div>

                <div>
                    <a class="navbar-brand" href="#"><?= $_SESSION['nama']; ?></a>
                </div>
            </div>
        </nav>
    </div>