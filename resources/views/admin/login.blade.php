<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('assets')}}/admin/assets/images/favicon-32x32-gnc.png" type="image/png"/>
    <!--plugins-->
    <link href="{{asset('assets')}}/admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{asset('assets')}}/admin/assets/css/pace.min.css" rel="stylesheet"/>
    <script src="{{asset('assets')}}/admin/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets')}}/admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/app.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/icons.css" rel="stylesheet">
    <title>@lang("Login")</title>
</head>

<body>
<style>
    .authentication-header {
        position: absolute;
        background: rgb(175, 175, 185);
        top: 0;
        left: 0;
        right: 0;
        height: 50%;
    }
</style>
<!--wrapper-->
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="{{asset('assets')}}/admin/assets/images/logo-img.png" width="180" alt=""/>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">@lang("Sign in")</h3>
                                    <p >@lang("Don't have an account yet? ")<a style="color: rgb(243, 63, 133)" href="/register">@lang("Sign up here")</a>
                                    </p>
                                   @include('home.message')
                                </div>

                                <div class="form-body">
                                    <form class="row g-3" action="{{route('admin_logincheck')}}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">@lang("Email Address")</label>
                                            <input type="email" name="email" class="form-control" id="inputEmailAddress"
                                                   placeholder="example@example.com">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">@lang("Enter Password")</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0"
                                                       id="inputChoosePassword"
                                                       placeholder="********">
                                                <a href="javascript:;"   class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
{{--                                            <div class="form-check form-switch" >--}}
{{--                                                <input class="form-check-input" type="checkbox"--}}
{{--                                                       id="flexSwitchCheckChecked" style="color: rgb(243, 63, 133)" checked>--}}
{{--                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember--}}
{{--                                                    Me</label>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div   class="col-md-6 text-end"><a style="color:rgb(243, 63, 133) " href="{{ route('password.request') }}">@lang("Forgot
                                                Password ?")</a>
                                        </div>
                                        <div class="col-12" style="background-color:rgb(243, 63, 133) ">
                                            <div class="d-grid" style="background-color:rgb(243, 63, 133) ">
                                                <button style="background-color:rgb(243, 63, 133);border-color: rgb(243, 63, 133); " type="submit" class="btn btn-primary"><i
                                                        class="bx bxs-lock-open"></i>@lang("Sign in")
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="{{asset('assets')}}/admin/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('assets')}}/admin/assets/js/jquery.min.js"></script>
<script src="{{asset('assets')}}/admin/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('assets')}}/admin/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('assets')}}/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<!--app JS-->
<script src="{{asset('assets')}}/admin/assets/js/app.js"></script>
</body>

</html>
