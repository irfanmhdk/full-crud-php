<?php

header('Content-Type: application/json');

include '../config/app.php';

$query = select("SELECT * FROM barang");

echo json_encode(['data_barang' => $query]);
?>