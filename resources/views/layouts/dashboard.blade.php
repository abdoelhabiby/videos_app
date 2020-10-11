<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content=" ">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> videos app @yield('title') </title>
    <link rel="apple-touch-icon" href="{{ asset('admin') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin') }}/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/plugins/animate/animate.css">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/vendors.css">


    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin') }}/vendors/css/forms/toggle/bootstrap-switch.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/forms/toggle/switchery.min.css">

    {{-- --------------------rtl ---------------------------
    --}}

    {{-- @if ('rtl' == 'test rtl')
        --}}

        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/pages/chat-application.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/app.css">
        {{--
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css-rtl/custom-rtl.css">
        --}}
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/pages/timeline.css">

        {{-- @endif --}}



    {{-- ----------------------------end rtl
    ------------------------------------------------- --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/fonts/simple-line-icons/style.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/extensions/datedropper.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/vendors/css/extensions/timedropper.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/style.css">
    <!-- END Custom CSS-->

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .unread {
            background: #EEE
        }

    </style>


    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.8.1/echo.iife.min.js"
        integrity="sha512-ksYghyTUS4zG9uK9YDF5XLXLCi4/+s02PsujMroDkRHjIoPKCwxr12cLYRkZSuw5U70VYC0w3QJ23uPWFXHLcA=="
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.8.1/echo.js"
        integrity="sha512-XPbYz2WHuAXIJIrn05xwPN/FBauU8d3B4Ql7JaakpM3wGsoA5g4BK3aaAuv6XnaPhdRpNKw9ZUCrBH2vLWiPKQ=="
        crossorigin="anonymous"></script>




    @stack('css')
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->

    <!-- Begin Header -->
    @include('dashboard.includes.nav')
    <!--End  Header -->

    <!-- Begin SideBar-->

    @include('dashboard.includes.sidebar')

    <!--End Sidebare-->


    {{-- -------- start content --}}

    @yield('content')

    {{-- -------- end content --}}

    {{-- -------- start footer --}}

    @include('dashboard.includes.footer')

    {{-- -------- end footer --}}




    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('admin') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('admin') }}/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript">
    </script>

    <script src="{{ asset('admin') }}/vendors/js/forms/toggle/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('admin') }}/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/js/scripts/forms/switch.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('admin') }}/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/vendors/js/charts/echarts/echarts.js" type="text/javascript"></script>

    <script src="{{ asset('admin') }}/vendors/js/extensions/datedropper.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/vendors/js/extensions/timedropper.min.js" type="text/javascript"></script>

    <script src="{{ asset('admin') }}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/js/scripts/pages/chat-application.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('admin') }}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/js/core/app.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    {{-- <script src="{{ asset('admin') }}/js/scripts/pages/dashboard-crypto.js"
        type="text/javascript"></script> --}}


    <script src="{{ asset('admin') }}/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/js/scripts/extensions/date-time-dropper.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script src="{{ asset('admin') }}/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>

    <script src="{{ asset('admin') }}/js/scripts/modal/components-modal.js" type="text/javascript"></script>

    <script>
        $('#meridians1').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians2').timeDropper({
            meridians: true,
            setCurrentTime: false

        });
        $('#meridians3').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians4').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians5').timeDropper({
            meridians: true,
            setCurrentTime: false

        });
        $('#meridians6').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians7').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians8').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians9').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians10').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians11').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians12').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians13').timeDropper({
            meridians: true,
            setCurrentTime: false
        });
        $('#meridians14').timeDropper({
            meridians: true,
            setCurrentTime: false
        });

    </script>

    <script src="{{ asset('admin/js/custom.js') }}"></script>



    {{-- <script src="{{ asset('js/pusher.js') }}"></script>
    --}}


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



    @yield('admin_notification_in_include_nav')


    @stack('js')

    @yield('js')

</body>

</html>
