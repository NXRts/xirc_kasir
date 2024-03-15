<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $judul_halaman ?></title>
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

  <!-- Boostrap 5 -->
  <style>
    .mpro {
      color: red;
    }

    a {
      text-decoration: none;
    }

    .m {
      padding: 10px;
    }

    #clock {
      font-size: 48px;
      font-family: Arial, sans-serif;
      text-align: center;
      margin-top: 50px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini pace-primary">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('home') ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('about') ?>" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url("assets/admin/adminlte/") ?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-solid fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
            <a href="<?= base_url('home/about') ?>" class="dropdown-item">
              <i class="fas fa-solid fa-user mr-3"></i></i> Akun
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-solid fa-bars"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-1"></i> Logout
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link">
        <center><span class="brand-text font-weight-light">XIRC || KASIR</span></center>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url("assets/admin/adminlte/") ?>dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?> <sup style="color: yellow;"><?= $this->session->userdata('level'); ?></sup></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php $halaman = $this->uri->segment(1); ?>
            <li class="nav-item">
              <a href="<?= base_url('home') ?>" class="nav-link <?php if ($halaman == 'home') {
                                                                  echo "active";
                                                                } ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php if ($this->session->userdata('level') == 'Admin') { ?>
              <li class="nav-item">
                <a href="<?= base_url('produk') ?>" class="nav-link <?php if ($halaman == 'produk') {
                                                                      echo "active";
                                                                    } ?>">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Produk
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pengguna') ?>" class="nav-link <?php if ($halaman == 'pengguna') {
                                                                        echo "active";
                                                                      } ?>">
                  <i class="fas fa-users mr-2"></i>
                  <p>
                    Pengguna
                  </p>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?= base_url('pelanggan') ?>" class="nav-link <?php if ($halaman == 'pelanggan') {
                                                                        echo "active";
                                                                      } ?>">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Pelanggan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('penjualan') ?>" class="nav-link <?php if ($halaman == 'penjualan') {
                                                                        echo "active";
                                                                      } ?>">
                <i class="nav-icon fas fa-handshake"></i>
                <p>
                  Penjualan
                </p>
              </a>
            </li>
            <li class="nav-header">LAINNYA</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>
                  Profil
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Akun</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logout</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('suara') ?>" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Pilpres 2024</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>----</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>----</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-4">
            <div class="col-sm-12">
              <b><?= $contents; ?></b>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.2 by. MY.ProjeXT
      </div>
      <strong>Copyright &copy; 2024 <a href="http://adminlte.io">AdminLTE.io </a></strong>&<Span class="mpro"> <a href="<?= base_url('ttt.txt') ?>"><b style="color: red;"> MY.ProjeXT</b></a> </Span> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
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