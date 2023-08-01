<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="GNC Holding">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/slick.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/rangeSlider.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/dark.css">
    <link rel="stylesheet" href="{{asset('assets')}}/home/assets/css/responsive.css">
    <link rel="icon" href="{{asset('assets')}}/admin/assets/images/favicon-32x32.png" type="image/png"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="{{asset('assets')}}/home/assets/js/custom.js"></script>
    <script src="{{asset('assets')}}/home/assets/js/customnotajax.js"></script>
    @yield('css')
    @yield('javascript')

</head>
<body>


@include('home._topheader')
@include('home._header')
@include('home._sidebar')
@include('sweetalert::alert')
@yield('content')
@include('home._footer')
@yield('footerjs')

</body>
</html>
