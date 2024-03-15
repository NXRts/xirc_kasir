<!-- Button trigger modal -->
<div class="mt-2 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Pengguna
    </button>
</div>
<?= $this->session->flashdata('notivikasi'); ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengguna/simpan') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="col mb-0">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-control" required>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
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
        <h3 class="card-title">Data Pengguna</h3>

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
                    <th>Username</th>
                    <th>level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['level']; ?></td>
                        <td>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus  data ini !?!')" href="<?= base_url('pengguna/hapus/'.$row['id_user']) ?>" class="btn-sm btn-danger">Hapus</a>
                            <a href="<?= base_url('pengguna/edit/'.$row['id_user']) ?>" class="btn-sm btn-warning">Edit</a>
                            <a onclick="return confirm('Apakah anda yakin ingin mereset Password ini !?!')" href="<?= base_url('pengguna/reset/'.$row['id_user']) ?>" class="btn-sm btn-primary">Reset</a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>