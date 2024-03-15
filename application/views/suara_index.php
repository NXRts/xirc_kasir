<!-- Button trigger modal -->
<div class="mt-2 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Suara
    </button>
</div>
<?= $this->session->flashdata('notivikasi'); ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Suara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('suara/simpan') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nama TPS</label>
                            <input type="text" name="nama_tps" class="form-control" placeholder="Nama Tps" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">No 1</label>
                            <input type="number" name="no_1" class="form-control" placeholder="No 1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">No 2</label>
                            <input type="number" name="no_2" class="form-control" placeholder="no 2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">No 3</label>
                            <input type="number" name="no_3" class="form-control" placeholder="No 3" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">total_suara_sah</label>
                            <input type="number" name="total_suara_sah" class="form-control" placeholder="total_suara_sah" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">total_suara_tidak_sah</label>
                            <input type="number" name="total_suara_tidak_sah" class="form-control" placeholder="total_suara_tidak_sah" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">total_suara_25</label>
                            <input type="number" name="total_suara_25" class="form-control" placeholder="total_suara_25" required>
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
        <h3 class="card-title">Data Suara Masuk</h3>

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
                    <th>Nama TPS</th>
                    <th>No 1</th>
                    <th>No 2</th>
                    <th>No 3</th>
                    <th>Total Suara sah</th>
                    <th>Total Suara Tidak sah</th>
                    <th>Total Suara</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td>Tps <?= $row['nama_tps']; ?></td>
                        <td><?= $row['no_1']; ?></td>
                        <td><?= $row['no_2']; ?></td>
                        <td><?= $row['no_3']; ?></td>
                        <td><?= $row['total_suara_sah']; ?></td>
                        <td><?= $row['total_suara_tidak_sah']; ?></td>
                        <td><?= $row['total_suara_25']; ?></td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>