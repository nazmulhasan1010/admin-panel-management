<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('font/fontawesome-free-6.1.1-web/css/all.css')}} ">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body class="bg-dark">
{{-- login modal--}}
<div class="container-login">
    <div class="card log-card">
        <form id="uploadPostModal">
            <div class="form-group mt-3">
                <label for="logInEmail">Email Address</label>
                <input type="email" class="form-control" id="logInEmail" placeholder="Enter email address">
            </div>
            <div class="form-group mt-3">
                <label for="logInPassword">Password</label>
                <input type="text" class="form-control" id="logInPassword" placeholder="Password">
            </div>
            <div class="form-group mt-3">
                <input type="checkbox"  id="rememberCheck">
                <label for="rememberCheck">Remember me</label>
            </div>
            <button class="btn btn-block btn-primary mt-3 logIn-btn">Log in
            </button>
            <div class="form-group mt-3">
               You have no account? <a href="{{url('signIn')}}">Sign up</a>
            </div>
        </form>
    </div>
</div>

{{--    notification--}}
<div class="toast align-items-center text-white  border-0 " role="alert" aria-live="assertive"
     aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">

        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" ta-bs-dismiss="toast"
                aria-label="Close"></button>
    </div>
</div>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
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
