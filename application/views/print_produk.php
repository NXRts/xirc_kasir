<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/winter_2024.png" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/admin/adminlte/") ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- pace-progress -->
    <!-- adminlte-->
    <link rel="stylesheet" href="<?= base_url("assets/admin/adminlte/") ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Chart -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
<div class="card">
    <h3>Data Produk <span style="color : blue"><?= $status;?></span></h3>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk </th>
                    <th>Kode Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($produk as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama_produk']; ?></td>
                        <td><?= $row['kode_produk']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>Rp. <?= number_format($row['harga']); ?></td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>

    <script>
        window.print();
    </script>
    <script src="<?= base_url("assets/admin/adminlte/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/admin/adminlte/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- pace-progress -->
    <script src="<?= base_url("assets/admin/adminlte/") ?>plugins/pace-progress/pace.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/admin/adminlte/") ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("assets/admin/adminlte/") ?>dist/js/demo.js"></script>
</body>
</html>