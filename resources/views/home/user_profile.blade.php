@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'User Profile')

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>User Profile</h2>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>User Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Products Area -->
    <section class="products-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @include('home.usermenu')
                <div class="col-lg-10 col-md-12">
                    <div id="products-collections-filter" class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 products-col-item">
                            <div class="single-products-box">
                                @include('profile.show')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Products Area -->

@endsection
