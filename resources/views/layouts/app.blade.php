<!DOCTYPE html>
<html lang="en">

    <head>
        @include('layouts.includes.header')
        @yield('style')
    </head>
    <body id="page-top">
            {{-- Div class warapper for the side_bar--}}
        <div id="wrapper">
            @include('layouts.includes.side_bar')
            {{-- Div id= content-wrapper and content for the Top Bar--}}

                    <!-- Main Content -->
                    <div id="content">
                        @include('layouts.includes.nav_bar')
                        @yield('content')
                    </div>

                </div>
            {{---------------------------End Top Bar--------------------------}}
        </div>
    {{---------------------------End side bar--------------------------}}
                @include('layouts.includes.footer')
                @yield('script')
{{--Toaster--}}
    <script>
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
            icon: 'success',
            title: '{{Session::get('error')}}',
            showConfirmButton: false,
            timer: 3000,
        });
        @endif
    </script>
</body>
</html>
