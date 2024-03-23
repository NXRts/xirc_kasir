<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Nota</title>
</head>
<body>
    ==============================  <br>
    XIRC KASIR MANTAP               <br>
    Ngasem. 03 Kerjo Kra            <br>
    phone : (+62) 0813-2911-3137    <br>
    Email : -                       <br>
    ==============================  <br>
    <table>
        <tr>
            <td>No. Nota</td>
            <td> : #<?= $nota ?></td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td> : <?= $penjualan->nama ?></td>
        </tr>
        <tr>
            <td>Contak Person</td>
            <td> : <?= $penjualan->telp ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td> : <?= $penjualan->alamat ?></td>
        </tr>
    </table>
    ==============================  <br>
    <table>
        <?php $item=0; $total = 0; $no = 1; foreach ($detail as $row) { ?>
            <tr>
                <td colspan=3><?= $row['nama_produk']; ?></td>
            </tr>
            <tr>
                <td><?= $row['jumlah']; ?> PCS</td>
                <td style="text-align: right;">   Rp. <?= number_format($row['harga']); ?>   </td>
                <td style="text-align: right;">   Rp. <?= number_format($row['jumlah'] * $row['harga']); ?>   </td>
            </tr>
        <?php $total = $total + $row['jumlah'] * $row['harga']; $no++; $item = $item + $row['jumlah'];} ?>
    </table>
    ==============================  <br>
    <table>
        <tr>
            <td>Total Tagihan </td>
            <td style="text-align: right;"> : Rp. <?= number_format($total); ?></td>
        </tr>
    </table>
    ==============================  <br>
    jumlah item : <?= $item?> PCS<br>
</body>
</html>