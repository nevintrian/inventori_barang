<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT * FROM pelanggan";
$query_pelanggan = mysqli_query($conn, $sql);

if (!empty($_POST)) {
    $nama = $_POST['nama'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $id = $_POST['id'] ?? null;

    if (isset($_POST['save'])) {
        mysqli_query($conn, "INSERT INTO pelanggan VALUES('','$nama', '$alamat')");
    }
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE pelanggan SET nama='$nama', alamat='$alamat' WHERE id = $id");
    }
    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM pelanggan WHERE id = $id");
    }
    header("location:../pelanggan");
}

include 'view.php';
include '../templates/partials/footer.php';
