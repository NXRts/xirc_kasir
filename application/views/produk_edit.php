<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pengguna</h3>
    </div>
    <form action="<?= base_url('produk/update') ?>" method="post">
        <input type="hidden" name="id_produk" value="<?= $user->id_produk ?>">
        <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="<?= $user->nama_produk ?>">
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $user->harga ?>">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $user->stok ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-0">
                    <label class="form-label">kode_produk</label>
                    <input type="text" name="kode_produk" class="form-control" value="<?= $user->kode_produk ?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>