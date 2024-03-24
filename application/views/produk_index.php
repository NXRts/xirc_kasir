<!-- Button trigger modal -->
<div class="mt-2 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Produk
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printmodal">
        Print
    </button>
</div>
<?= $this->session->flashdata('notivikasi'); ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/simpan') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" placeholder="Stok" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label class="form-label">kode_produk</label>
                            <input type="text" name="kode_produk" class="form-control" placeholder="kode_produk" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Produk</h3>

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
                    <th>Nama Produk </th>
                    <th>Kode Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama_produk']; ?></td>
                        <td><?= $row['kode_produk']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>Rp. <?= number_format($row['harga']); ?></td>
                        <td>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus  data ini !?!')" href="<?= base_url('produk/hapus/' . $row['id_produk']) ?>" class="btn-sm btn-danger">Hapus</a>
                            <a href="<?= base_url('produk/edit/' . $row['id_produk']) ?>" class="btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- Modal -->
<div class="modal fade" id="printmodal" tabindex="-1" role="dialog" aria-labelledby="printmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printmodalLabel">Laporan Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/print') ?>" method="get" target="_blank"> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Stok Produk</label>
                            <select name="status" class="form-control">
                                <option value="Ada">Ada</option>
                                <option value="Habis">Habis</option>
                                <option value="Semua">Semua</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Print</button>
                </div>
            </form>
        </div>

    </div>
</div>