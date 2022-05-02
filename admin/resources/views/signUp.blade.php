<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in</title>
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
        <img id="profileUpPreView" class="profile-preview" src="{{asset('img/user.png')}}" alt="profile">

        <form id="uploadPostModal">
            <div class="row">
                <div class="form-group mt-3 col-md-6">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="First name">
                </div>
                <div class="form-group mt-3 col-md-6">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Last name">
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="signInEmail">Email Address</label>
                <input type="email" class="form-control" id="signInEmail" placeholder="Enter email address">
            </div>
            <div class="form-group mt-3">
                <label for="signInPassword">Password</label>
                <input type="text" class="form-control" id="signInPassword" placeholder="Password">
            </div>
            <div class="form-group mt-3">
                <label for="signUpProfile">Profile picture</label>
                <input type="file" class="form-control" id="signUpProfile">
            </div>
            <button class="btn btn-block btn-primary mt-3 signIn-btn">Log in
            </button>
            <div class="form-group mt-3">
                Already have an account? <a href="{{url('/')}}">Log in</a>
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
