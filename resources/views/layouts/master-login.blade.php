<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program Kasir Sederhana</title>
    <link href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome-5/css/all.css')}}" rel="stylesheet">
    @yield('css')

    <script src="{{asset('jquery-3.7.1/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('bootstrap-5.3.3/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js')}}" ></script>
    <script src="{{asset('fontawesome-5/js/all.js')}}"></script>
</head>
<body>
    <!-- bagian konten -->
    <div class="container-xxl">
        @yield('content')
    </div>

    <!-- bagian footer -->
    @include('includes.footer')
</body>
</html>
