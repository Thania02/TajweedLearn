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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins&display=swap" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .btn-learn {
            background: rgba(14, 205, 205, 1);
            border-color: #0ECDCD;
            border-radius: 10px;
            font-weight: bold;
            padding: 10px;
        }

        .btn-learn:hover {
            background: rgba(14, 205, 205, 0.7);
            border-color: #0ECDCD;
        }

        .btn-learn:click {
            background: rgba(14, 205, 205, 0.7);
            border-color: #0ECDCD;
        }

        .btn-quiz {
            background: rgba(253, 182, 0, 1);
            border-color: #FDB600;
            color: #fff;
            border-radius: 10px;
            font-weight: bold;
            font-size: 25px;
            padding: 15px;
        }

        .btn-quiz:hover {
            background: rgba(253, 182, 0, 0.7);
            border-color: #FDB600;
        }

        .btn-quiz:click {
            background: rgba(253, 182, 0, 0.7);
            border-color: #FDB600;
        }

        input[type="radio"] {
            display: none;
            width: 20px;
            height: 20px;
        }

        input[type="radio"]+label::before {
            content: "";
            display: inline-block;
            vertical-align: middle;
            width: 25px;
            height: 25px;
            margin-right: 10px;
            border: 2px solid #ccc;
            border-radius: 50%;
            background-color: white;
        }

        input[type="radio"]:checked+label::before {
            background-color: #0ECDCD;
        }

        input[type="radio"]:checked+label {
            color: #0ECDCD;
        }

        .falseAnswer[type="radio"]:checked+label::before {
            background-color: red;
        }

        .falseAnswer[type="radio"]:checked+label {
            color: red;
        }

        label {
            padding: 5px;
            font-size: 18px;
            font-weight: 100;
            cursor: pointer;
        }
    </style>

    </stlabel>
</head>

<body class="layout-top-nav">
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

        @yield('container')

        <form action="" id="delete-form" method="POST">
            @method('delete')
            @csrf
        </form>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Tajweed Learn Web Application 2023 <a href="https://adminlte.io"></a>.</strong>
            
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
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
    <!-- <script src="{{url('assets/plugins/chart.js/Chart.min.js')}}"></script> -->
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


    @if (count($errors) > 0)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oppss, ada yang salah dengan request Anda',
            showConfirmButton: true,
            timer: 1500
        })
    </script>
    @endif
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
                title: "Are you sure you deleted this data?",
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
    </script>

    @include('sweetalert::alert')

</body>

</html>