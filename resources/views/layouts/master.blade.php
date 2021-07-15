<!DOCTYPE html>
<html>

<head>

      {{-- mengatasi error mengenai TAG --}}
      <?php
      $PARENTTAG = isset($PARENTTAG) ? $PARENTTAG : '';
      $CHILDTAG = isset($CHILDTAG) ? $CHILDTAG : '';
      ?>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Arsip Data Pegawai | Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome-free/css/all.min.css') }}">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/ionicons.min.css') }}">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/jqvmap/jqvmap.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/adminlte.min.css') }}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}">
      <!-- summernote -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/summernote/summernote-bs4.css') }}">
      <!-- Google Font: Source Sans Pro -->
      <link href="{{ asset('admin/assets/font/font.css') }}" rel="stylesheet">
      <!-- Select2 -->
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

      @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                  <!-- Left navbar links -->
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                              <a href="{{ asset('admin/assets/index3.html') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                              <a href="#" class="nav-link">Contact</a>
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
                                                <img src="{{ asset('admin/assets/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                                <div class="media-body">
                                                      <h3 class="dropdown-item-title">
                                                            Brad Diesel
                                                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                                      </h3>
                                                      <p class="text-sm">Call me whenever you can...</p>
                                                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4
                                                            Hours Ago</p>
                                                </div>
                                          </div>
                                          <!-- Message End -->
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                          <!-- Message Start -->
                                          <div class="media">
                                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                                <div class="media-body">
                                                      <h3 class="dropdown-item-title">
                                                            John Pierce
                                                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                                      </h3>
                                                      <p class="text-sm">I got your message bro</p>
                                                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4
                                                            Hours Ago</p>
                                                </div>
                                          </div>
                                          <!-- Message End -->
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                          <!-- Message Start -->
                                          <div class="media">
                                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                                <div class="media-body">
                                                      <h3 class="dropdown-item-title">
                                                            Nora Silvester
                                                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                                      </h3>
                                                      <p class="text-sm">The subject goes here</p>
                                                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4
                                                            Hours Ago</p>
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
                              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                    <i class="fas fa-th-large"></i>
                              </a>
                        </li>
                  </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                  <!-- Brand Logo -->
                  <a href="/" class="brand-link">
                        <img src="{{ asset('admin/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        {{-- <img src="{{ asset('admin/assets/dist/img/dishub.png') }}" alt="DISHUB" class="brand-image
                        img-circle elevation-3 center-block" style="opacity: .8;width:60px"> --}}
                        <span class="brand-text font-weight-light">Arsip Pegawai</span>
                  </a>

                  <!-- Sidebar -->
                  <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                              <div class="image">
                                    <img src="{{ asset('admin/assets/dist/img/dishub.png') }}" class="img-circle elevation-2" alt="User Image">
                              </div>
                              <div class="info">
                                    <a href="/" class="d-block">ADMIN</a>
                              </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                    {{-- menu-open agar menu langsung terbuka --}}
                                    {{-- <li class="nav-item has-treeview menu-open"> --}}
                                    {{-- menu tertutup --}}
                                    <li class="nav-item has-treeview <?= $PARENTTAG == 'PIMPINAN' ? 'menu-open' : '' ?>">
                                          <a href="#" class="nav-link <?= $PARENTTAG == 'PIMPINAN' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>
                                                      PIMPINAN
                                                      <i class="right fas fa-angle-left"></i>
                                                </p>
                                          </a>
                                          <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                      <a href="/tampilsekda" class="nav-link <?= $CHILDTAG == 'SEKDA' ? 'active' : '' ?>">
                                                            <i class="nav-icon fas fa-user "></i>
                                                            <p>SEKDA</p>
                                                      </a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="/tampilkadis" class="nav-link <?= $CHILDTAG == 'KADIS' ? 'active' : '' ?>">
                                                            <i class="nav-icon fas fa-user "></i>
                                                            <p>KADIS</p>
                                                      </a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="/tampilsekre" class="nav-link <?= $CHILDTAG == 'SEKRETARIS' ? 'active' : '' ?>">
                                                            <i class="nav-icon fas fa-user "></i>
                                                            <p>SEKRETARIS</p>
                                                      </a>
                                                </li>

                                          </ul>
                                    </li>

                                    <li class="nav-item has-treeview <?= $PARENTTAG == 'PEGAWAI' ? 'menu-open' : '' ?>">
                                          <a href="#" class="nav-link <?= $PARENTTAG == 'PEGAWAI' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>
                                                      PEGAWAI
                                                      <i class="right fas fa-angle-left"></i>
                                                </p>
                                          </a>
                                          <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                      <a href="/pns/pegawai/AKTIF" class="nav-link <?= $CHILDTAG == 'AKTIF' ? 'active' : '' ?>">
                                                            <i class="nav-icon fas fa-user "></i>
                                                            <p>PNS AKTIF</p>
                                                      </a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="/pns/pegawai/NON-AKTIF" class="nav-link <?= $CHILDTAG == 'NON-AKTIF' ? 'active' : '' ?>">
                                                            <i class="nav-icon fas fa-user "></i>
                                                            <p>PNS NON-AKTIF</p>
                                                      </a>
                                                </li>

                                          </ul>
                                    </li>


                                    <li class="nav-item has-treeview <?= $PARENTTAG == 'BERKALA' ? 'menu-open' : '' ?>">
                                          <a href="#" class="nav-link <?= $PARENTTAG == 'BERKALA' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-chart-bar"></i>
                                                <p>
                                                      BERKALA
                                                      <i class="right fas fa-angle-left"></i>
                                                </p>
                                          </a>
                                          <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                      <a href="/tampilberkala" class="nav-link <?= $CHILDTAG == 'GAJI' ? 'active' : '' ?>">
                                                            <i class="nav-icon fas fa-money-bill-alt "></i>
                                                            <p>GAJI</p>
                                                      </a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="/tampilpangkatberkala" class="nav-link <?= $CHILDTAG == 'PANGKAT' ? 'active' : '' ?>">
                                                            <i class="fas fa-medal"></i>
                                                            <p>PANGKAT</p>
                                                      </a>
                                                </li>

                                          </ul>
                                    </li>

                                    <li class="nav-item has-treeview">
                                          <a href="#" class="nav-link <?= $PARENTTAG == 'CETAK' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-print"></i>
                                                <p>
                                                      CETAK
                                                      <i class="right fas fa-angle-left"></i>
                                                </p>
                                          </a>
                                          <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                      <a href="/cetak/tampilduk" class="nav-link <?= $PARENTTAG == 'DUK' ? 'active' : '' ?>">
                                                            <i class="nav-icon fas fa-book "></i>
                                                            <p>DUK</p>
                                                      </a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="/tampilskumptk" class="nav-link <?= $PARENTTAG == 'SKUMPTK' ? 'active' : '' ?> ">
                                                            <i class="nav-icon fas fa-book "></i>
                                                            <p>SKUMPTK</p>
                                                      </a>
                                                </li>
                                          </ul>
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
                                    <div class="col-sm-6">
                                          <h1 class="m-0 text-dark">Dashboard</h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                          <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active">Dashboard v1</li>
                                          </ol>
                                    </div><!-- /.col -->
                              </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                  </div>
                  <!-- /.content-header -->

                  <!-- Main content -->
                  <section class="content">
                        <div class="container-fluid">



                              @yield('content')



                              <!-- /.row (main row) -->
                        </div><!-- /.container-fluid -->
                        <br>
                  </section>
                  <!-- /.content -->
            </div>
            <br>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                  <strong>Copyright &copy; Asep Syaifudin, S.Kom., M.Kom</a>.</strong>
                  All rights reserved.
                  <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0.5
                  </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                  <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
      {{-- <script src="{{ asset('admin/assets/plugins/jquery/2.2.4/jquery.min.js') }}">
      </script> --}}
      <!-- jQuery UI 1.11.4 -->
      <script src="{{ asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
            $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <!-- ChartJS -->
      <script src="{{ asset('admin/assets/plugins/chart.js/Chart.min.js') }}"></script>
      <!-- Sparkline -->
      <script src="{{ asset('admin/assets/plugins/sparklines/sparkline.js') }}"></script>
      <!-- JQVMap -->
      <script src={{ asset('admin/assets/plugins/jqvmap/jquery.vmap.min.js') }}""></script>
      <script src="{{ asset('admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{ asset('admin/assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
      <!-- daterangepicker -->
      <script src="{{ asset('admin/assets/plugins/moment/moment.min.js') }}"></script>
      {{-- tambahkan ini untuk merubah tanggal datepicker ke bahasa indonesia --}}
      <script src="{{ asset('admin/assets/plugins/moment/locales.min.js') }}"></script>

      <script src="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
      {{-- input mask --}}
      <script src="{{ asset('admin/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>

      <!-- Tempusdominus Bootstrap 4 -->
      <script src="{{ asset('admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
      </script>
      <!-- Summernote -->
      <script src="{{ asset('admin/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
      <!-- overlayScrollbars -->
      <script src="{{ asset('admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('admin/assets/dist/js/adminlte.js') }}"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="{{ asset('admin/assets/dist/js/pages/dashboard.js') }}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{ asset('admin/assets/dist/js/demo.js') }}"></script>
      {{-- DataTables --}}
      <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
      <!-- Select2 -->
      <script src="{{ asset('admin/assets/plugins/select2/js/select2.full.min.js') }}"></script>
      <!-- SweetAlert2 -->
      <script src="{{ asset('admin/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
      <script src="{{ asset('admin/assets/plugins/sweetalert2/sweetalert.min.js') }}"></script>


      <script>
            $(function() {
                  $("#example1").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                        "ordering": false,
                  });
                  $("#example2").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                  });
                  $("#example3").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                  });
                  $("#example4").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                  });
                  $("#example5").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                  });
                  $("#example6").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                  });
                  $("#example7").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                  });
                  $("#example8").DataTable({
                        "responsive": false,
                        "autoWidth": true,
                  });
                  $('#example').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": false,
                  });

                  // untuk input mask nomor hp
                  $('[data-mask]').inputmask()


                  //Date time picker
                  // membuat format tanggal 20-11-2020
                  $('#reservationdate').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });

                  $('#reservationdate1').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });

                  $('#reservationdate2').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });

                  $('#reservationdate3').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate4').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate5').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate6').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate7').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate8').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate9').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate10').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate11').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  $('#reservationdate12').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'id'
                  });
                  // option
                  //Initialize Select2 Elements
                  $('.select2').select2()

                  // membuat tooltip
                  $('[data-toggle="tooltip"]').tooltip()

                  //Initialize Select2 Elements
                  $('.select2bs4').select2({
                        theme: 'bootstrap4'
                  });

            });
      </script>

      {{-- membuat format rupiah --}}
      <script type="text/javascript">
            var rupiah1 = document.getElementById('rupiah1');
            rupiah1.addEventListener('keyup', function(e) {
                  // tambahkan 'Rp.' pada saat form di ketik
                  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                  rupiah1.value = formatRupiah(this.value, 'Rp. ');
                  // hanya angka saja tanpa 'Rp'
                  rupiah1.value = formatRupiah(this.value);
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                  var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah1 = split[0].substr(0, sisa),
                        ribuan1 = split[0].substr(sisa).match(/\d{3}/gi);

                  // tambahkan titik jika yang di input sudah menjadi angka ribuan
                  if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah1 += separator + ribuan.join('.');
                  }

                  rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
                  return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
            }
      </script>

      <script type="text/javascript">
            var rupiah = document.getElementById('rupiah2');
            rupiah.addEventListener('keyup', function(e) {
                  // tambahkan 'Rp.' pada saat form di ketik
                  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                  rupiah.value = formatRupiah(this.value, 'Rp. ');
                  // hanya angka saja tanpa 'Rp'
                  rupiah.value = formatRupiah(this.value);
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                  var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                  // tambahkan titik jika yang di input sudah menjadi angka ribuan
                  if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                  }

                  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
      </script>


      <script>
            $(document).ready(function() {
                  $('#tahun').on('select2:select', function(e) {

                              $.get('{{ url('
                                    tampilberkalaajax ') }}'
                              });
                  });
            });
      </script>

      {{-- kembali ke halaman sebelumnya --}}
      <script>
            function goBack() {
                  window.history.back();
            }
      </script>

      {{-- konfirmasi hapus data --}}
      <script>
            $('.delete-confirm').on('click', function(event) {
                  event.preventDefault();
                  const url = $(this).attr('href');
                  swal({
                        title: 'Anda Yakin Menghapus Data Ini?',
                        text: 'Data Akan Terhapus Permanen',
                        icon: 'warning',
                        buttons: ["Cancel", "Yes!"],
                  }).then(function(value) {
                        if (value) {
                              window.location.href = url;
                        }
                  });
            });
      </script>

      {{-- @php
        $pria = App\models\pegawai::where('JK', '=', 'L')->count();
        $wanita = App\models\pegawai::where('JK', '=', 'P')->count();
    @endphp --}}

      <script>
            $(function() {

                  var pieChartCanvas = $('#pieChartJK').get(0).getContext('2d')
                  var pieData = {
                        labels: [
                              'Laki-laki', 'Perempuan',
                        ],
                        datasets: [{
                              data: [
                                    6, 1
                              ],
                              backgroundColor: ['#00a65a', '#f56954'],
                        }]
                  }
                  var pieOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                  }
                  //Create pie or douhnut chart
                  // You can switch between pie and douhnut using the method below.
                  var pieChart = new Chart(pieChartCanvas, {
                        type: 'pie',
                        data: pieData,
                        options: pieOptions
                  })
            })
      </script>

      @yield('js')



</body>

</html>