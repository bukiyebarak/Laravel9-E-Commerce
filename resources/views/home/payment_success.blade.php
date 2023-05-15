@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)

@section('content')
    <!-- Start Customer Service Area -->
    <section class="customer-service-area ptb-100">
        <div class="container">
            <div class="customer-service-content">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                    </div>
                    <div class="col-lg-4 col-md-12 " align="center">
                        <img src="{{asset('assets')}}/home/assets/img/iyzico-success.png"><br><br>
                        <h5>@lang("Satın alma işlemi başarıyla tamamlanmıştır.")</h5><br>
                        <a href="{{route('user_orders')}}" class="default-btn">@lang("SİPARİŞLERİM")</a>
                    </div>
                    <div class="col-lg-4 col-md-12">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Customer Service Area -->

@endsection
