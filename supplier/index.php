<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT * FROM supplier";
$query_supplier = mysqli_query($conn, $sql);


if (!empty($_POST)) {
    $nama = $_POST['nama'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $id = $_POST['id'] ?? null;

    if (isset($_POST['save'])) {
        mysqli_query($conn, "INSERT INTO supplier VALUES('','$nama', '$alamat')");
    }
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE supplier SET nama='$nama', alamat='$alamat' WHERE id = $id");
    }
    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM supplier WHERE id = $id");
    }
    header("location:../supplier");
}

include 'view.php';
include '../templates/partials/footer.php';
