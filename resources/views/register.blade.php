<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> SignUp</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset("assets/css/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("assets/css/sb-admin-2.min.css")}}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container" style="max-width: 630px;">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!--                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form role="form" class="user" method="Post" action="{{route('sign_up')}}" autocomplete="off" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder=" First Name">
                                    @error('first_name')
                                    <div class="alert alert-danger text-center form-control form-control-user">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder=" Last Name">
                                    @error('last_name')
                                    <div class="alert alert-danger text-center form-control form-control-user">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="UserName">
                                @error('username')
                                <div class="alert alert-danger text-center form-control form-control-user">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder=" Email Address">
                                @error('email')
                                <div class="alert alert-danger text-center form-control form-control-user">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="alert alert-danger text-center form-control form-control-user">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="conform_password" name="password_confirmation" placeholder="Conform Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" id="btn_register">
                                Register Account
                            </button>
                            <hr>
                            <a href="#" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{route('forget')}}">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Bootstrap core JavaScript-->
<script src="{{asset("assets/js/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>

{{--sweetAlert--}}
<script src="{{asset("assets/js/sweetalert2/sweetalert2@11.js")}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset("assets/js/js_easing/jquery.easing.min.js")}}"></script>

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
    </script>
</body>

</html>
