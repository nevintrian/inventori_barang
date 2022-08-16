<?php
include '../templates/partials/sidebar.php';

if (!empty($_POST)) {

    $barang_id = $_POST['barang_id'] ?? null;
    $jumlah = $_POST['jumlah'] ?? null;

    $sql = "SELECT nama, harga_jual, stok from barang where id = $barang_id";
    $query_barang = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_barang);
    $barang_nama = $row['nama'];
    $harga = $row['harga_jual'];
    $stok = $row['stok'];
    $subtotal = $row['harga_jual'] * $jumlah;

    if (isset($_POST['save'])) {
        if ($jumlah > $stok) {
            echo "<script>alert('Stok barang tidak cukup! Silahkan kurangi jumlah pembelian.');</script>";
        } else {
            $itemArray = array($barang_id => array('barang_id' => $barang_id, 'barang_nama' => $barang_nama, 'jumlah' => $jumlah, 'harga' => $harga, 'subtotal' => $subtotal));
            if (!empty($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $key => $value) {
                    if ($barang_id == $value['barang_id']) {
                        unset($_SESSION["cart"][$key]);
                    }
                }
                $_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
            } else {
                $_SESSION["cart"] = $itemArray;
            }
        }
    }
    if (isset($_POST['delete'])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($barang_id == $value['barang_id'])
                unset($_SESSION["cart"][$key]);
            if (empty($_SESSION["cart"]))
                unset($_SESSION["cart"]);
        }
    }
    header("location:../barang_keluar_cart");
}

include 'view.php';
include '../templates/partials/footer.php';
