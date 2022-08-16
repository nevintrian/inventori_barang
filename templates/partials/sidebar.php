<?php
include '../config.php';
include '../session.php';
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventori</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../templates/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../templates/dist/css/adminlte.min.css">
    <style>
        @media screen and (max-width: 900px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../logout" type="submit" class="btn btn-danger" onclick="javasciprt: return confirm('Apa Anda Yakin?')">Logout </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="../dashboard" class="brand-link">
                <img src="../templates/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Inventori</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../templates/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['email'] ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    User
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../pelanggan" class="nav-link">
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Data Pelanggan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../supplier" class="nav-link">
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Data Supplier
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Barang
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../jenis_barang" class="nav-link">
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Jenis Barang
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../barang" class="nav-link">
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Data Barang
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../barang_masuk" class="nav-link">
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Barang Masuk
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../barang_keluar" class="nav-link">
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Barang Keluar
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>