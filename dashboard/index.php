<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT * from pelanggan";
$query_pelanggan = mysqli_query($conn, $sql);
$count_pelanggan = mysqli_num_rows($query_pelanggan);

$sql = "SELECT * from supplier";
$query_supplier = mysqli_query($conn, $sql);
$count_supplier = mysqli_num_rows($query_supplier);

$sql = "SELECT * from barang";
$query_barang = mysqli_query($conn, $sql);
$count_barang = mysqli_num_rows($query_barang);

$sql = "SELECT * from barang_keluar";
$query_barang_keluar = mysqli_query($conn, $sql);
$count_barang_keluar = mysqli_num_rows($query_barang_keluar);

$sql = "SELECT * from barang_masuk";
$query_barang_masuk = mysqli_query($conn, $sql);
$count_barang_masuk = mysqli_num_rows($query_barang_masuk);

include 'view.php';
include '../templates/partials/footer.php';
