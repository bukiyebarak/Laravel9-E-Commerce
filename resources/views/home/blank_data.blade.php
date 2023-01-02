@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'User Shopcart')
@section('content')
    <style>
        .heartbtn {
            border-style: none;
            background-color: inherit;
        }

    </style>
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{$name}}</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>{{$name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <section class="products-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @include('home.usermenu')

                <div class="col-lg-10 col-md-12">
                    <div class="cart-totals">
                            <div style="text-align: center"><br><br>
                                <i class="bx bx-no-entry fs-1"></i><br><br>
                                <h6>{{$data}}</h6><br>
                                <a href="{{route('discount_products')}}" class="btn btn-danger">İndirimleri Kaçırma</a><br><br>
                                <a href="{{route('home')}}" class="btn default-btn">Anasayfa</a>
                            </div><br>

                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
