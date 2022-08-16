<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT * FROM jenis_barang";
$query_jenis_barang = mysqli_query($conn, $sql);


if (!empty($_POST)) {
    $nama = $_POST['nama'] ?? null;
    $id = $_POST['id'] ?? null;

    if (isset($_POST['save'])) {
        mysqli_query($conn, "INSERT INTO jenis_barang VALUES('','$nama')");
    }
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE jenis_barang SET nama='$nama' WHERE id = $id");
    }
    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM jenis_barang WHERE id = $id");
    }
    header("location:../jenis_barang");
}

include 'view.php';
include '../templates/partials/footer.php';
