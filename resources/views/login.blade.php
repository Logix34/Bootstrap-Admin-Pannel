<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset("assets/css/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">

{{--    <!-- Sweetalert 2-->--}}
{{--    <script src="{{asset("assets/css/sweet_alert2/sweetalert2.css")}}"></script>--}}
{{--    <!-- Sweetalert 2-->--}}
{{--    <script src="{{asset("assets/css/toastr.css")}}"></script>--}}

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("assets/css/sb-admin-2.min.css")}}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-5 col-md-9" >
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-12 ">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back to LogIn!</h1>
                                </div>
                                <form class="user" action="{{route('verify_login')}}" method="POST" id="login-form" autocomplete="off" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control form-control-user"  aria-describedby="emailHelp" placeholder="Username or Email">
                                        @error('email')
                                        <div class="alert alert-danger text-center form-control form-control-user">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        @error('password')
                                        <div class="alert alert-danger text-center form-control form-control-user">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" id="remember" name="remember" value="true">
                                            <label class="custom-control-label" for="customCheck" >
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" id="btn-login">
                                        Login
                                    </button>
                                    <hr>
                                    <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('forget')}}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="{{asset("assets/js/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
<!-- Sweet Alert2-->
<script src="{{asset("assets/js/sweetalert2/sweetalert2@11.js")}}"></script>
<!-- Toaster-->
<script src="{{asset("assets/js/toastr.min.js")}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset("assets/js/js_easing/jquery.easing.min.js")}}"></script>
{{--sweetalert2--}}
<!-- Custom scripts for all pages-->
<script src="{{asset("assets/js/sb-admin-2.min.js")}}"></script>


<script>
    setTimeout(() => {
        $('.alert').alert('close');
    }, 2000);

        @if(Session::has('success'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{Session::get('success')}}',
            showConfirmButton: false,
            timer: 3000,
        });
        @endif

        @if(Session::has('error'))
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    Toast.fire({
        position: 'top-end',
        icon: 'error',
        title: '{{Session::get('error')}}',
        showConfirmButton: false,
        timer: 3000,
    });
    @endif
    </script>
</body>
</html>

