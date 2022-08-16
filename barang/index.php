<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT barang.*, jenis_barang.nama as jenis_barang_nama FROM barang join jenis_barang on barang.jenis_barang_id = jenis_barang.id";
$query_barang = mysqli_query($conn, $sql);
$sql = "SELECT * from jenis_barang";

if (!empty($_POST)) {
    $nama = $_POST['nama'] ?? null;
    $jenis_barang_id = $_POST['jenis_barang_id'] ?? null;
    $harga_beli = $_POST['harga_beli'] ?? null;
    $harga_jual = $_POST['harga_jual'] ?? null;
    $stok = $_POST['stok'] ?? null;
    $terjual = $_POST['terjual'] ?? null;
    $id = $_POST['id'] ?? null;

    if (isset($_POST['save'])) {
        mysqli_query($conn, "INSERT INTO barang VALUES('','$nama', '$jenis_barang_id', '$harga_beli', '$harga_jual', '$stok', '$terjual')");
    }
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE barang SET nama='$nama', jenis_barang_id='$jenis_barang_id', harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok', terjual='$terjual' WHERE id = $id");
    }
    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
    }
    header("location:../barang");
}

include 'view.php';
include '../templates/partials/footer.php';
