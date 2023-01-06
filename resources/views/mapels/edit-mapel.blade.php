<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PROJEK WEBPRO 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../adminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KELOMPOK 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../gambar/laravel.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Projek LARAVEL 7</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>HOME</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/user" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>USER</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/guru" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>GURU</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/siswa" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>SISWA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/kelas" class="nav-link">
                <i class="nav-icon fas fa-school"></i>
                <p>KELAS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/jadwal" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>JADWAL</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/mapel" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>MAPEL</p>
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
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">MAPEL</h5>
          </div>
          <div class="card-body">
            <form action="/edit-mapel/{{ $mapel->id }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="kode_mapel">Kode Mapel</label>
                <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" required value="{{ $mapel->kode_mapel }}">
              </div>
              <div class="form-group">
                <label for="nama_mapel">Nama Mapel</label>
                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required value="{{ $mapel->nama_mapel }}">
              </div>
              <button type="submit" class="btn btn-success">Ubah Data</button>
            </form>
          </div>
        </div>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../adminLTE/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../adminLTE/dist/js/adminlte.min.js"></script>
</body>

</html>