<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT barang_keluar.*, pelanggan.nama as pelanggan_nama FROM barang_keluar join pelanggan on barang_keluar.pelanggan_id = pelanggan.id";
$query_barang_keluar = mysqli_query($conn, $sql);

if (!empty($_POST)) {
    $id = $_POST['id'] ?? null;
    $pelanggan_id = $_POST['pelanggan_id'] ?? null;
    $total_harga = $_POST['total_harga'] ?? null;

    if (isset($_POST['save'])) {
     
        $total_barang = count($_SESSION["cart"]) ?? null;
        mysqli_query($conn, "INSERT INTO barang_keluar VALUES('', now(), '$pelanggan_id', '$total_barang', '$total_harga')");
        $barang_keluar_id = mysqli_insert_id($conn);
        foreach ($_SESSION["cart"] as $item) {
            $barang_id = $item['barang_id'];
            $jumlah = $item['jumlah'];
            $subtotal = $item['subtotal'];
            $sql = "INSERT INTO barang_keluar_detail VALUES ('', '$barang_keluar_id', '$barang_id', '$jumlah', '$subtotal')";
            mysqli_query($conn, $sql);
        }
        unset($_SESSION['cart']);
    }

    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM barang_keluar WHERE id = $id");
    }
    header("location:../barang_keluar");
}

include 'view.php';
include '../templates/partials/footer.php';
