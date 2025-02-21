<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pendukung Keputusan Beasiswa KIP-K Politeknik Negeri Bengkalis</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .striped tbody tr:nth-child(odd) {
            border-left: 2px solid #ff69b4 !important;
            /* Primary color border */
        }

        .striped tbody tr:nth-child(even) {
            border-left: 2px solid transparent !important;
            /* Primary color border */
        }
    </style>
    @stack('style')

</head>

<body class="bg-gradient-primary overflow-hidden">
    @yield('content')


    <script src="{{ asset('sb/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
