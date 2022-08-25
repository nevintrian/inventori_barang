<?php
include '../templates/partials/sidebar.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql_barang_keluar =
        "SELECT barang_keluar.*, pelanggan.nama as pelanggan_nama, pelanggan.alamat as pelanggan_alamat from barang_keluar join pelanggan on pelanggan.id = barang_keluar.pelanggan_id where barang_keluar.id = $id";
    $data_barang_keluar = mysqli_query($conn, $sql_barang_keluar)->fetch_object();

    $sql_barang_keluar_detail = "SELECT barang_keluar_detail.jumlah, barang_keluar_detail.subtotal, barang.nama as barang_nama, barang.harga_jual as barang_harga from barang_keluar join barang_keluar_detail on barang_keluar.id = barang_keluar_detail.barang_keluar_id join barang on barang.id = barang_keluar_detail.barang_id where barang_keluar.id = $id";
    $data_barang_keluar_detail = mysqli_query($conn, $sql_barang_keluar_detail);
}

include 'view.php';
include '../templates/partials/footer.php';
