<div class="row">
    <div class="col-md-4"> <!-- Pemiian Produk -->
        <div class="col-md-12">
            <div class="card card-primary">
                <?= $this->session->flashdata('notivikasi'); ?>
                <div class="card-header">
                    <h3 class="card-title">Pilih produk yang akan di jual</h3>
                    <small class="float-right d-none d-sm-block">Pastikan produk yang dipilih benar</small>
                </div>
                <form action="<?= base_url('penjualan/addtemp') ?>" method="post">
                    <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                    <div class="card-body">
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">No Nota</label>
                            <input type="text" class="form-control" name="kode_penjualan" value="<?= $nota; ?>" readonly>
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="kode_penjualan" value="<?= $nama_pelanggan; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Produk</label>
                            <input type="hidden" name="kode_penjualan" value="<?= $nota ?>">
                            <select name="id_produk" class="form-control">
                                <?php foreach ($produk as $aa) { ?>
                                    <option value="<?= $aa['id_produk'] ?>"><?= $aa['nama_produk'] ?> - <?= $aa['kode_produk'] ?> - (<?= $aa['stok'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah yang dibeli</label>
                            <input type="number" class="form-control" name="jumlah" placeholder="Jumlah yang dijual" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Keranjang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8"> <!-- Bagian apa saya yang dibeli -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar produk yang dipilih</h3>
                <!-- <small class="float-right d-none d-sm-block">Pastikan produk yang dipilih benar</small> -->
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cek = 0;
                        $total = 0;
                        $no = 1;
                        foreach ($temp as $row) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['kode_produk']; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td>
                                    <?= $row['jumlah']; ?>
                                    <?php
                                    if ($row['jumlah'] > $row['stok']) {
                                        echo "<strong style='color: red;'>Stok tidak mencukupi</strong>";
                                        $cek = 1;
                                    }
                                    ?>
                                </td>
                                <td>Rp. <?= number_format($row['harga']); ?></td>
                                <td>Rp. <?= number_format($row['jumlah'] * $row['harga']); ?></td>
                                <td><a onclick="return confirm('Apakah anda yakin ingin menghapus produk ini dari keranjang !?!')" href="<?= base_url('penjualan/hapus_temp/' . $row['id_temp'] . '/' . $row['id_produk']) ?>" class="btn-sm btn-danger">Hapus</a></td>
                            </tr>
                        <?php $total = $total + $row['jumlah'] * $row['harga'];
                            $no++;
                        } ?>
                        <tr>
                            <td colspan="5">Total Harga</td>
                            <td>Rp. <?= number_format($total); ?></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <form action="<?= base_url('penjualan/bayar_v2') ?>" method="post">
            <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
            <input type="hidden" name="total_harga" value="<?= $total; ?>">
            <?php if (($temp <> NULL) and ($cek == 0)) { ?>
                <button type="submit" class="btn btn-info col-md-12">Bayar</button>
            <?php } ?>
        </form>
    </div>
</div>