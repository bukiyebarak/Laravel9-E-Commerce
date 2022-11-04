@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', $setting->title)
@section('description')
    {{$setting->description}}
@endsection
@section('keywords',$setting->keywords)

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Referanslar</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Referanslar</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="customer-service-area ptb-100">
        <div class="container">
            <div class="customer-service-content">
              {!! $setting->references !!}
            </div>
        </div>
    </section>
    <!-- End Customer Service Area -->

@endsection
