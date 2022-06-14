<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Forget Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset("assets/css/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
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

        <div class="col-xl-5 col-lg-5 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>
                                <form role="form" class="user needs-validation" method="POST" action="{{route('submit_forget')}}" autocomplete="off" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="validationCustom03" name="email"  placeholder="Enter Email Address...">
                                        @error('email')
                                        <div class="alert alert-danger text-center form-control form-control-user">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" id="btn-submit" class="btn btn-primary btn-user btn-block">
                                        Send OTP
                                    </button>
                                </form>
                            </div>
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
<!-- Sweet Alert2-->
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
