<!-- Button trigger modal -->
<div class="mt-2 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Penjaulan
    </button>
</div>
<?= $this->session->flashdata('notivikasi'); ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pelanggan as $row) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['alamat']; ?></td>
                                        <td><?= $row['telp']; ?></td>
                                        <td>
                                            <a href="<?= base_url('penjualan/transaksi/' . $row['id_pelanggan']) ?>" class="btn-sm btn-success">Pilih</a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>

    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Penjualan Hari Ini</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Nota</th>
                    <th>Nominal</th>
                    <th>Pelanggan</th>
                    <!-- <th>Daftar Produk</th> -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;
                $no = 1;
                foreach ($user as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['kode_penjualan']; ?></td>
                        <td>Rp.<?= number_format($row['total_harga']); ?></td>
                        <td><?= $row['nama']; ?></td>
                        <!-- <td></td> -->
                        <td>
                            <a href="<?= base_url('penjualan/invoice/' . $row['kode_penjualan']) ?>" class="btn-sm btn-warning">Cek</a>

                        </td>
                    </tr>
                <?php $total = $total + $row['total_harga'];
                    $no++;
                } ?>
                <tr>
                    <td colspan="2">Total</td>
                    <td>Rp. <?= number_format($total); ?>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>