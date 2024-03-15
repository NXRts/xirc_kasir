<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pengguna</h3>
    </div>
    <form action="<?= base_url('pelanggan/update') ?>" method="post">
        <input type="hidden" name="id_pelanggan" value="<?= $user->id_pelanggan ?>">
        <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>">
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $user->alamat ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-0">
                    <label class="form-label">telp </label>
                    <input type="text" name="telp" class="form-control" value="<?= $user->telp ?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>