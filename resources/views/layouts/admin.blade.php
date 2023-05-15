<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="color-sidebar sidebarcolor3 color-header headercolor1">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!--favicon-->
    <link rel="icon" href="{{asset('assets')}}/admin/assets/images/favicon-32x32-gnc.png" type="image/png"/>
    <!--plugins-->
    <link href="{{asset('assets')}}/admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{asset('assets')}}/admin/assets/css/pace.min.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/fullcalendar/main.css" rel="stylesheet"/>
    <script src="{{asset('assets')}}/admin/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets')}}/admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/app.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/assets/css/dark-theme.css"/>
    <link rel="stylesheet" href="{{asset('assets')}}/admin/assets/css/semi-dark.css"/>
    <link rel="stylesheet" href="{{asset('assets')}}/admin/assets/css/header-colors.css"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <title>@yield('title')</title>

    @yield('css')
    @yield('javascript')

</head>

<body>

<div class="wrapper">

@include('admin._sidebar')
@include('admin._header')
@include('sweetalert::alert')
@yield('content')
<br><br><br>
@include('admin._footer')
@yield('footer')

</body>
</html>
