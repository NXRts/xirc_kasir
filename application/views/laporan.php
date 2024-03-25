<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a{
            padding: 4px;
        }
        td{
            vertical-align: top;
            font-size: 12px ;
        }
        th{
            vertical-align: top;
            font-size: 12px ;
            padding: 4px;
        }
        span{
            color: blue;
        }
    </style>
</head>
<body>
    <center>
    <h3>Laporan Penjualan <?= date_format(date_create($tanggal1),"d M Y"); ?> <span>Sampai</span> <?= date_format(date_create($tanggal2),"d M Y"); ?></h3>
    <div class="card-body table-responsive p-0">
        <table border='1' class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Nota</th>
                    <th>Nominal</th>
                    <th>Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;
                $no = 1;
                foreach ($penjualan as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= date_format(date_create($row['tanggal']),"d M Y"); ?></td>
                        <td><?= $row['kode_penjualan']; ?></td>
                        <td>Rp.<?= number_format($row['total_harga']); ?></td>
                        <td><?= $row['nama']; ?></td>
                    </tr>
                <?php $total = $total + $row['total_harga'];
                    $no++;
                } ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td>Rp. <?= number_format($total); ?>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    </center>

    <script>
        window.print();
    </script>
</body>
</html>