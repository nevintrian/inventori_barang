<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT barang_masuk.*, supplier.nama as supplier_nama FROM barang_masuk join supplier on barang_masuk.supplier_id = supplier.id";
$query_barang_masuk = mysqli_query($conn, $sql);

if (!empty($_POST)) {
    $id = $_POST['id'] ?? null;
    $supplier_id = $_POST['supplier_id'] ?? null;
    $total_harga = $_POST['total_harga'] ?? null;

    if (isset($_POST['save'])) {
        $total_barang = count($_SESSION["cart"]) ?? null;
        mysqli_query($conn, "INSERT INTO barang_masuk VALUES('', now(), '$supplier_id', '$total_barang', '$total_harga')");
        $barang_masuk_id = mysqli_insert_id($conn);
        foreach ($_SESSION["cart"] as $item) {
            $barang_id = $item['barang_id'];
            $jumlah = $item['jumlah'];
            $subtotal = $item['subtotal'];
            $sql = "INSERT INTO barang_masuk_detail VALUES ('', '$barang_masuk_id', '$barang_id', '$jumlah', '$subtotal')";
            mysqli_query($conn, $sql);
        }
        unset($_SESSION['cart']);
    }

    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM barang_masuk WHERE id = $id");
    }
    header("location:../barang_masuk");
}

include 'view.php';
include '../templates/partials/footer.php';
