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
                            <h3 class="card-title">Data Barang</h3>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body p-0">
                                    <table class="table table-bordered" id="datatables">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama</th>
                                                <th>Jenis Barang</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th>Terjual</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($barang = $query_barang->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td style="width: 10px"><?= $i ?></td>
                                                    <td><?= $barang->nama ?></td>
                                                    <td><?= $barang->jenis_barang_nama ?></td>
                                                    <td><?= $barang->harga_beli ?></td>
                                                    <td><?= $barang->harga_jual ?></td>
                                                    <td><?= $barang->stok ?></td>
                                                    <td><?= $barang->terjual ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-view" data-id="<?= $barang->id; ?>" data-nama="<?= $barang->nama; ?>" data-jenis_barang_nama="<?= $barang->jenis_barang_nama; ?>" data-harga_beli="<?= $barang->harga_beli; ?>" data-harga_jual="<?= $barang->harga_jual; ?>" data-stok="<?= $barang->stok; ?>" data-terjual="<?= $barang->terjual; ?>"><i class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-info btn-edit" data-id="<?= $barang->id; ?>" data-nama="<?= $barang->nama; ?>" data-jenis_barang_id="<?= $barang->jenis_barang_id; ?>" data-harga_beli="<?= $barang->harga_beli; ?>" data-harga_jual="<?= $barang->harga_jual; ?>" data-stok="<?= $barang->stok; ?>" data-terjual="<?= $barang->terjual; ?>"><i class="fa fa-marker"></i></a>
                                                        <a href="#" class="btn btn-danger btn-delete" data-id="<?= $barang->id; ?>"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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



<!-- Modal Add Product-->
<form action="" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select name="jenis_barang_id" class="form-control jenis_barang_id" required>
                            <option value="">-- Pilih Jenis Barang --</option>
                            <?php
                            $query_jenis_barang = mysqli_query($conn, $sql);
                            while ($jenis_barang = $query_jenis_barang->fetch_object()) { ?>
                                <option value="<?= $jenis_barang->id; ?>"><?= $jenis_barang->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" placeholder="harga_beli" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" placeholder="harga_jual" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="stok" required>
                    </div>
                    <div class="form-group">
                        <label>Terjual</label>
                        <input type="number" class="form-control" name="terjual" placeholder="terjual" required>
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

<!-- Modal Edit Product-->
<form action="" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select name="jenis_barang_id" class="form-control jenis_barang_id" required>
                            <?php
                            $query_jenis_barang = mysqli_query($conn, $sql);
                            while ($jenis_barang = $query_jenis_barang->fetch_object()) { ?>
                                <option value="<?= $jenis_barang->id; ?>"><?= $jenis_barang->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control harga_beli" name="harga_beli" placeholder="harga_beli" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control harga_jual" name="harga_jual" placeholder="harga_jual" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control stok" name="stok" placeholder="stok" required>
                    </div>
                    <div class="form-group">
                        <label>Terjual</label>
                        <input type="number" class="form-control terjual" name="terjual" placeholder="terjual" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal View Product-->
<form>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <input type="text" class="form-control jenis_barang_nama" name="jenis_barang_nama" placeholder="Jenis Barang" disabled>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control harga_beli" name="harga_beli" placeholder="harga_beli" disabled>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control harga_jual" name="harga_jual" placeholder="harga_jual" disabled>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control stok" name="stok" placeholder="stok" disabled>
                    </div>
                    <div class="form-group">
                        <label>Terjual</label>
                        <input type="number" class="form-control terjual" name="terjual" placeholder="terjual" disabled>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal View Product-->

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
                    <input type="hidden" name="id" class="id">
                    <button type="button" name="delete" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
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
        $('#datatables').DataTable();
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const jenis_barang_id = $(this).data('jenis_barang_id');
            const harga_beli = $(this).data('harga_beli');
            const harga_jual = $(this).data('harga_jual');
            const stok = $(this).data('stok');
            const terjual = $(this).data('terjual');
            $('.id').val(id);
            $('.nama').val(nama);
            $('.jenis_barang_id').val(jenis_barang_id);
            $('.harga_beli').val(harga_beli);
            $('.harga_jual').val(harga_jual);
            $('.stok').val(stok);
            $('.terjual').val(terjual);
            $('#editModal').modal('show');
        });

        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const jenis_barang_nama = $(this).data('jenis_barang_nama');
            const harga_beli = $(this).data('harga_beli');
            const harga_jual = $(this).data('harga_jual');
            const stok = $(this).data('stok');
            const terjual = $(this).data('terjual');
            $('.id').val(id);
            $('.nama').val(nama);
            $('.jenis_barang_nama').val(jenis_barang_nama);
            $('.harga_beli').val(harga_beli);
            $('.harga_jual').val(harga_jual);
            $('.stok').val(stok);
            $('.terjual').val(terjual);
            $('#viewModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id').val(id);
            $('#deleteModal').modal('show');
        });

    });
</script>