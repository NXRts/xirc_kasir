<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pengguna</h3>
    </div>
    <form action="<?= base_url('pengguna/update') ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" value="<?= $user->username ?>" readonly>
                <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="text" class="form-control" value="<?= $user->nama ?>" name="nama">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Level</label>
                <select name="level" class="form-control" required>
                    <option value="Admin" <?php if ($user->level == 'Admin') {
                                                echo "selected";
                                            } ?>>Admin</option>
                    <option value="Kasir" <?php if ($user->level == 'Kasir') {
                                                echo "selected";
                                            } ?>>Kasir</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>