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
                            <h3 class="card-title">Tambah Barang Masuk</h3>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body p-0">
                                        <table class="table table-bordered" id="datatables">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Subtotal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                $total = 0;
                                                if (!empty($_SESSION["cart"])) :
                                                    foreach ($_SESSION["cart"] as $item) :
                                                        $no++;
                                                        $total += $item["subtotal"];
                                                ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $item["barang_nama"]; ?></td>
                                                            <td>Rp. <?php echo number_format($item["harga"], 0, ',', '.'); ?> </td>
                                                            <td><?php echo $item["jumlah"]; ?></td>
                                                            <td>Rp. <?php echo number_format($item["subtotal"], 0, ',', '.'); ?> </td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger btn-delete" data-barang_id="<?= $item['barang_id']; ?>"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </tbody>
                                            <tr>
                                                <th colspan="4">Total Harga</th>
                                                <th colspan="2">Rp. <?php echo $total; ?></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form method="post" action="../barang_masuk/index.php">
                                <input type="hidden" name="total_harga" class="total_harga" id="total_harga" value="<?= $total ?>">
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <select name="supplier_id" class="form-control pelanggan_id" id="pelanggan_id" required>
                                        <option value="">-- Pilih Nama Supplier --</option>
                                        <?php
                                        $sql = "SELECT * from supplier";
                                        $query_supplier = mysqli_query($conn, $sql);
                                        while ($supplier = $query_supplier->fetch_object()) { ?>
                                            <option value="<?= $supplier->id; ?>"><?= $supplier->nama; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if (!empty($_SESSION["cart"])) { ?>
                                    <button type="submit" name="save" id="save" class="btn btn-primary save">Simpan</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Add Product-->
<form action="" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="barang_id" class="form-control" required>
                            <option value="">-- Pilih Nama Barang --</option>
                            <?php
                            $sql = "SELECT * from barang";
                            $query_barang = mysqli_query($conn, $sql);
                            while ($barang = $query_barang->fetch_object()) { ?>
                                <option value="<?= $barang->id; ?>"><?= $barang->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Product-->

<!-- Modal Delete Product-->
<form action="" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apa anda yakin ingin menghapus data barang?</h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="barang_id" class="barang_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" name="delete" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Product-->

<script src="../templates/plugins/jquery/jquery.min.js"></script>
<script src="../templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-delete').on('click', function() {
            const barang_id = $(this).data('barang_id');
            $('.barang_id').val(barang_id);
            $('#deleteModal').modal('show');
        });

    });
</script>