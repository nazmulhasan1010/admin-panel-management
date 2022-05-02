<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('font/fontawesome-free-6.1.1-web/css/all.css')}} ">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<body>
<div class="main">
    @include('layers.header')
    <div class="main-content bg-dark">
        @yield('content')
    </div>
    @include('layers.footer')
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
<script>

    // notification
    function notify(message, status) {
        var toastBar = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastBar);
        if (status == 'success') {
            $('.toast').removeClass('bg-danger');
            $('.toast').addClass('bg-primary');
            $('.toast-body').html(message);
            toast.show();
        } else if (status == 'fail') {
            $('.toast').removeClass('bg-primary');
            $('.toast').addClass('bg-danger');
            $('.toast-body').html(message);
            toast.show();
        }

    }
</script>
</body>

</html>
