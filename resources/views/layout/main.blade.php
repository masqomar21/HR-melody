<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'HR manajement')</title>
    {{-- bootstrap --}}
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- font google --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    {{-- Font Awasome --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/AdminLTE/fontawesome-free/css/all.min.css">


    {{-- <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/fontawasome/css/fontawesome.min.css"> --}}


    @yield('style')

</head>
<body>

    @yield('content')

     <!-- AdminLTE App -->
    {{-- <script src="{{ asset('/') }}assets/plugins/AdminLTEstyle/dist/js/adminlte.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
