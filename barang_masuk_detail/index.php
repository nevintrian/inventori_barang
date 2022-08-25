<?php
include '../templates/partials/sidebar.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql_barang_masuk =
        "SELECT barang_masuk.*, supplier.nama as supplier_nama, supplier.alamat as supplier_alamat from barang_masuk join supplier on supplier.id = barang_masuk.supplier_id where barang_masuk.id = $id";
    $data_barang_masuk = mysqli_query($conn, $sql_barang_masuk)->fetch_object();

    $sql_barang_masuk_detail = "SELECT barang_masuk_detail.jumlah, barang_masuk_detail.subtotal, barang.nama as barang_nama, barang.harga_beli as barang_harga from barang_masuk join barang_masuk_detail on barang_masuk.id = barang_masuk_detail.barang_masuk_id join barang on barang.id = barang_masuk_detail.barang_id where barang_masuk.id = $id";
    $data_barang_masuk_detail = mysqli_query($conn, $sql_barang_masuk_detail);
}

include 'view.php';
include '../templates/partials/footer.php';
