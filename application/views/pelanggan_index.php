<!-- Button trigger modal -->
<div class="mt-2 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Pelanggan
    </button>
</div>
<?= $this->session->flashdata('notivikasi'); ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pelanggan/simpan') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label class="form-label">No. Telp</label>
                            <input type="text" name="telp" class="form-control" placeholder="No. Telp" required>
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
        <h3 class="card-title">Data Pelanggan</h3>

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
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['telp']; ?></td>
                        <td>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus  data ini !?!')" href="<?= base_url('pelanggan/hapus/' . $row['id_pelanggan']) ?>" class="btn-sm btn-danger">Hapus</a>
                            <a href="<?= base_url('pelanggan/edit/' . $row['id_pelanggan']) ?>" class="btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>