<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Detail Barang Keluar</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table" table-layout: fixed box-sizing: border-box>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>:</th>
                                                    <td><?php echo date("d-m-Y", strtotime($data_barang_keluar->tanggal)); ?></td>
                                                    <th>Total Harga</th>
                                                    <th>:</th>
                                                    <td>Rp. <?php echo number_format($data_barang_keluar->total_harga); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>:</th>
                                                    <td><?php echo $data_barang_keluar->pelanggan_nama; ?></td>
                                                    <th>Alamat</th>
                                                    <th>:</th>
                                                    <td><?php echo $data_barang_keluar->pelanggan_alamat; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-bordered" style="margin-bottom: 10px">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    while ($barang_keluar_detail = $data_barang_keluar_detail->fetch_object()) {
                                                    ?>
                                                        <tr>
                                                            <td style="width: 10px"><?= $i ?></td>
                                                            <td><?= $barang_keluar_detail->barang_nama ?></td>
                                                            <td><?= $barang_keluar_detail->jumlah ?></td>
                                                            <td>Rp. <?php echo number_format($barang_keluar_detail->barang_harga) ?></td>
                                                            <td>Rp. <?php echo number_format($barang_keluar_detail->subtotal) ?></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td colspan="4">Total</td>
                                                        <td>Rp. <?php echo number_format($data_barang_keluar->total_harga) ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>