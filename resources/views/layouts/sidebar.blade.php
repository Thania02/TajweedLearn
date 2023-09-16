<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icon Website -->
    <!-- <link rel="shortcut icon" href="{{ url('assets/logo/logo.png') }}"> -->

    <!-- Title -->
    <title>{{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('assets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('assets/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('assets/plugins/summernote/summernote-bs4.min.css')}}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins&display=swap" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" href="{{url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .bg-menu {
            background-color: #0ECDCD;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- modal -->
        <div class="modal fade" id="detail_modal" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="page">

                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar -->

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
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" style="text-align: right">

                        <img src=" {{ url('assets/profile/'.Auth::user()->photo) }}" class="img-circle" width="10%" alt="User Image">
                        <span class="ml-w">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ url('assets/profile/'.Auth::user()->photo) }}" alt=" User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{ Auth::user()->name }}
                                    </h3>
                                    <p class="text-sm"> <b>{{ Auth::user()->level }} </b></p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <a href="{{route('profile.show',Auth::user()->id)}}" class="dropdown-item text-center">Edit Profile</a>
                        <a href="#" class="dropdown-item dropdown-footer text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(1, 69, 106, 0.9);">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link" style="text-align: center;">
                <span class="brand-text font-weight-light font-weight-bold text-light" style="font-size: 28px;">Tajweed Learn</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{url('home_admin')}}" class="nav-link {{($title == 'Dashboard') ? 'active' : '' }}">
                                <i class="fas fa-home"></i>
                                <p>
                                    &nbsp;&nbsp;Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('learn_tajwid')}}" class="nav-link {{($title == 'Tajweed Learn' || $title == 'Edit Tajweed Learn') ? 'active' : '' }}">
                                <i class="fas fa-quran"></i>
                                <p>
                                    &nbsp;&nbsp;Tajweed Learn
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('quiz_phase1')}}" class="nav-link {{($title == 'Quiz Phase 1' || $title == 'Edit Quiz Phase 1') ? 'active' : '' }}">
                                <i class="fas fa-book-reader"></i>
                                <p>
                                    &nbsp;&nbsp;Quiz Phase 1
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('quiz_phase2')}}" class="nav-link {{($title == 'Quiz Phase 2' || $title == 'Edit Quiz Phase 2') ? 'active' : '' }}">
                                <i class="fas fa-book-reader"></i>
                                <p>
                                    &nbsp;&nbsp;Quiz Phase 2
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('users')}}" class="nav-link {{($title == 'Data User' || $title == 'Edit Data User') ? 'active' : '' }}">
                                <i class="fas fa-user"></i>
                                <p>
                                    &nbsp;&nbsp;User
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-header">EXAMPLES</li> -->
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
                        <div class="col-sm-12">
                            <h3 class="m-0">{{ $title }}</h3>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>

        <form action="" id="delete-form" method="POST">
            @method('delete')
            @csrf
        </form>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
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
    <script src="{{url('assets/plugins/jquery/jquery.min.js')}}">
    </script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{url('assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{url('assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{url('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{url('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('assets/dist/js/pages/dashboard.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{url('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{url('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{url('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        function notif(icon, title) {
            Swal.fire({
                icon: icon,
                title: title,
                showConfirmButton: false,
                timer: 1500
            })
        }

        function notificationforDelete(event, el) {
            event.preventDefault();
            swal.fire({
                title: " Delete This Data?",
                icon: "warning",
                closeOnClickOutside: false,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: '#6777ef',
                cancelButtonText: 'cancel',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    $("#delete-form").attr('action', $(el).attr('href'));
                    $("#delete-form").submit();
                }
            });
        }

        function prosesData(event, el, pesan, status) {
            event.preventDefault();
            swal.fire({
                title: pesan,
                icon: "warning",
                closeOnClickOutside: false,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: '#6777ef',
                cancelButtonText: 'cancel',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    $("#proses-form").attr('action', $(el).attr('href'));
                    $('#status').val(status);
                    $("#proses-form").submit();
                }
            });
        }

        $(document).ready(function() {
            $('#myTable').DataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }]
            });
        });


        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        function show(url) {
            $.get(url, function(data) {
                $("#page").html(data);
                $('#detail_modal').modal('show');
            });
        }

        var state = false;

        function toggle(id) {
            if (state) {
                document.getElementById(id).setAttribute("type", "password");
                document.getElementById("lock").setAttribute("class", "fas fa-lock");
                state = false;
            } else {
                document.getElementById(id).setAttribute("type", "text");
                document.getElementById("lock").setAttribute("class", "fas fa-unlock");
                state = true;
            }
        }

        function toggle1(id) {
            if (state) {
                document.getElementById(id).setAttribute("type", "password");
                document.getElementById("lock1").setAttribute("class", "fas fa-lock");
                state = false;
            } else {
                document.getElementById(id).setAttribute("type", "text");
                document.getElementById("lock1").setAttribute("class", "fas fa-unlock");
                state = true;
            }
        }
    </script>

    @include('sweetalert::alert')

</body>

</html>