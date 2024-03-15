<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <h1 style="font-family: 'Times New Roman', Times, serif;">XIRC Kasir</h1><br>
            <div class="row d-flex align-items-baseline">
                <div class="col-xl-9">
                    <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #123-123</strong></p>
                </div>
                <div class="col-xl-3 float-end">
                    <a onclick="window.print()" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                        <i class="fas fa-print text-primary"> Print</i>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i> Export</a>
                    </a>
                </div>
                <hr>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        From
                        <address>
                            <b><strong> M -Market </strong></b><br>
                            Ngasem. 03 Kerjo Kra <br>
                            phone : (+62) 0813-2911-3137 <br>
                            Email : - <br>
                            Tanggal : <?php echo date("Y-m-d"); ?> - <o style="font-size: 15px;" id="clock"></o>
                        </address>
                    </div>
                    <div class="col-xl-4">
                        <p class="text-muted">To</p>
                        <ul class="list-unstyled">
                            <li class="text-muted"><i class="fas fa-solid fa-user"></i><span class="fw-bold"> Pelanggan: </span>
                                <d class="d"><?= $penjualan->nama ?></d>
                            </li>
                            <li class="text-muted"><i class="fas fa-solid fa-phone"></i><span class="fw-bold"> Contak Person: </span>
                                <d class="d"><?= $penjualan->telp ?></d>
                            </li>
                            <li class="text-muted"><i class="fas fa-solid fa-address-book"></i><span class="fw-bold"> Address: </span>
                                <d class="d"><?= $penjualan->alamat ?></d>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-4">
                        <p class="text-muted">To</p>
                        <ul class="list-unstyled">
                            <li class="text-muted"><i class="fas fa-solid fa-notes-medical"></i> <span class="fw-bold">Nota: </span>#<?= $nota ?></li>
                            <li class="text-muted"><i class="fas fa-solid fa-calendar"></i> <span class="fw-bold"> Creation Date: </span><?= $tanggal ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $no = 1;
                            foreach ($detail as $row) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['kode_produk']; ?></td>
                                    <td><?= $row['nama_produk']; ?></td>
                                    <td><?= $row['jumlah']; ?></td>
                                    <td>Rp. <?= number_format($row['harga']); ?></td>
                                    <td>Rp. <?= number_format($row['jumlah'] * $row['harga']); ?></td>
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
                <hr>
                <br>
                <div class="row">
                    <div class="col-xl-10">
                        <p>Thank you for your purchase</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var timeString = hours + ':' + minutes + ':' + seconds;
        document.getElementById('clock').textContent = timeString;
    }
    setInterval(updateTime, 1000);

    updateTime();
</script>