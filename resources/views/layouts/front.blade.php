<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('front') }}/img//apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('front') }}/img//favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        videos app @yield('title')
    </title>
    <meta name="description" content="@yield('meta_des')">
    <meta name="keywords" content="@yield('meta_key')">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('front') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('front') }}/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
    <link href="{{ asset('front') }}/demo/demo.css" rel="stylesheet" />

    <style>
        .unread{
            background: #EEE;
        }
    </style>


</head>

<body class="index-page sidebar-collapse">

    <!-- Navbar -->

    @include('front.includes.nav')
    <!-- End Navbar -->


    <div class="main">


        @yield('content')


    </div>



    {{-- start contact --}}

    @include('front.includes.contact-us')

    {{-- end contact --}}

    {{-- start footer --}}

    @include('front.includes.footer')

    {{-- end footer --}}

    </ <!-- Core JS Files -->
    <script src="{{ asset('front') }}/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('front') }}/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('front') }}/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('front') }}/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('front') }}/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="{{ asset('front') }}/js/plugins/moment.min.js"></script>
    <script src="{{ asset('front') }}/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('front') }}/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    {{-- <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <script>
        $(document).ready(function() {

            if ($("#datetimepicker").length != 0) {
                $('#datetimepicker').datetimepicker({
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-chevron-up",
                        down: "fa fa-chevron-down",
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-screenshot',
                        clear: 'fa fa-trash',
                        close: 'fa fa-remove'
                    }
                });
            }

            function scrollToDownload() {

                if ($('.section-download').length != 0) {
                    $("html, body").animate({
                        scrollTop: $('.section-download').offset().top
                    }, 1000);
                }
            }
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous"></script>
    @include('sweet::alert')




    @if (user())



        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.8.1/echo.iife.min.js"
            integrity="sha512-ksYghyTUS4zG9uK9YDF5XLXLCi4/+s02PsujMroDkRHjIoPKCwxr12cLYRkZSuw5U70VYC0w3QJ23uPWFXHLcA=="
            crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.8.1/echo.js"
            integrity="sha512-XPbYz2WHuAXIJIrn05xwPN/FBauU8d3B4Ql7JaakpM3wGsoA5g4BK3aaAuv6XnaPhdRpNKw9ZUCrBH2vLWiPKQ=="
            crossorigin="anonymous"></script>



        <script>
            Pusher.logToConsole = true;

            window.Echo = new Echo({

                broadcaster: 'pusher',
                key: '2c9bbe2e60d7a5bca5b6',
                cluster: 'mt1',
                forceTLS: true,
                authEndpoint: '/broadcasting/auth',


            });

        </script>


        @yield('user_notify')


    @endif




    @stack('scripts')

    @yield('js')



</body>

</html>
