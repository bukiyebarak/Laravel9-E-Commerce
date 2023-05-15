@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')
@section('title', __('About Us').'-'.$setting->title)
@section('description')
    {{$setting->description}}
@endsection
@section('keywords',$setting->keywords)
@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>@lang('Hakkımızda')</h2>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("Hakkımızda")</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="customer-service-area ptb-100">
        <div class="container">
            <div class="customer-service-content">
                {!!$setting->aboutus!!}
            </div>
        </div>

    </section>
    <!-- End Customer Service Area -->

@endsection
