<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <<!-- Google Font: Source Sans Pro -->
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
        <style>
            .btn-welcome {
                background-color: #087171;
                color: white;
                border-radius: 25px;
                font-weight: bold;
                font-size: 18px;
            }

            .btn-welcome:hover {
                background-color: #087171;
                color: white;
            }

            .form-input {
                background: #FFFFFF;
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 20px;
            }

            .btn-input {
                background: rgba(14, 205, 205, 1);
                border-color: rgba(14, 205, 205, 1);
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 20px;
                font-size: 20px;
                font-weight: bold;
            }

            .btn-input:hover {
                background: rgba(14, 205, 205, 0.6);
                border-color: rgba(14, 205, 205, 0.6);
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 20px;
                font-size: 20px;
                font-weight: bold;
            }

            .btn-view {
                background: rgba(62, 113, 142, 1);
                border-color: rgba(62, 113, 142, 1);
                border-radius: 10px;
                font-weight: bold;
                font-size: 18px;
                padding: 5px;
            }

            .btn-view:hover {
                background: rgba(62, 113, 142, 0.7);
                border-color: rgba(62, 113, 142, 1);

            }

            .btn-view:click {
                background: rgba(62, 113, 142, 0.7);
                border-color: rgba(62, 113, 142, 1);
            }

            .btn-quiz {
                background: rgba(253, 182, 0, 1);
                border-color: #FDB600;
                border-radius: 10px;
                font-weight: bold;
                font-size: 18px;
                padding: 5px;
            }

            .btn-quiz:hover {
                background: rgba(253, 182, 0, 0.7);
                border-color: #FDB600;
            }

            .btn-quiz:click {
                background: rgba(253, 182, 0, 0.7);
                border-color: #FDB600;
            }
        </style>
</head>

<body>
    @yield('content')
    <script>
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

        function notif(icon, title) {
            Swal.fire({
                icon: icon,
                title: title,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
    @include('sweetalert::alert')
</body>

</html>