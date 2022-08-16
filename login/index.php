<?php

include '../config.php';

if (isset($_SESSION['email'])) {
    header("Location: ../dashboard");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'] ?? null;
    $password = md5($_POST['password']) ?? null;

    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['email'] = $row['email'];
        header("Location: ../dashboard");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

include 'view.php';
