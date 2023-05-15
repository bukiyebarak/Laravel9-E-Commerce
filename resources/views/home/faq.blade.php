@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', __('SSS').'-'.$setting->title)
@section('description')
    {{$setting->description}}
@endsection
@section('keywords',$setting->keywords)

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>@lang("Sıkça Sorulan Sorular")</h2>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("SSS")</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="faq-area ptb-100">
        <div class="container">
            <div class="tab faq-accordion-tab">
                <div class="tab-content">
                    <div class="tabs-item">
                        <div class="faq-accordion">
                            <ul class="accordion">
                                @foreach($datalist as $rs)
                                    @if($rs->status=="True")
                                        <li class="accordion-item">
                                            <a class="accordion-title" href="javascript:void(0)">
                                                <i class='bx bx-chevron-down'></i>
                                                {{$rs->question}}
                                            </a>
                                            <div class="accordion-content">
                                                <p><b>{!! $rs->answer !!}</b></p>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Customer Service Area -->
    <br>
    <!-- Start Facility Area -->
    <section class="facility-area pb-70">
        <div class="container">
            <div class="facility-slides owl-carousel owl-theme">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-tracking'></i>
                    </div>
                    <h3>@lang("Shipping") </h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-return'></i>
                    </div>
                    <h3>@lang("Easy Return Policy")</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-shuffle'></i>
                    </div>
                    <h3>@lang("7 Day Exchange Policy")</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-sale'></i>
                    </div>
                    <h3>@lang("Weekend Discount Coupon")</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-credit-card'></i>
                    </div>
                    <h3>@lang("Secure Payment Methods")</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-location'></i>
                    </div>
                    <h3>@lang("Track Your Package")</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-customer-service'></i>
                    </div>
                    <h3>@lang("24/7 Customer Support")</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- End Facility Area -->

@endsection
