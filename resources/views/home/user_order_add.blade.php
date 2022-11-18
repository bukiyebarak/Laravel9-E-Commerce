@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
    $shopcart=\App\Http\Controllers\HomeController::headerShopCart();

@endphp

@extends('layouts.home')

@section('title', 'User Order')


@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Billing Detail</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Billing Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Checkout Area -->
    <section class="checkout-area ptb-100">
        <div class="container">
            <div class="user-actions">
                <i class='bx bx-log-in'></i>
                <span>Returning customer? <a href="{{route('adminlogin')}}">Click here to login</a></span>
            </div>

            <form action="{{route('user_order_store')}}" method="post">
                @csrf
                <h3 class="title">Billing Details </h3>

                <div class="row">
                    <label>İL<span class="required">*</span></label>
                    <select id="city">
                        <option value="">İl Seçiniz</option>
                        @foreach($getcity as $rs)
                            <option value="{{$rs->sehir_key}}">{{$rs->sehir_title}}</option>
                        @endforeach
                    </select>
                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;

                    <label>İLÇE <span class="required">*</span></label>
                    <select id="district">
                        <option value="">İlçe Seçiniz</option>
                    </select>

                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    <label>MAHALLE <span class="required">*</span></label>
                    <select id="neighbourhood">
                        <option value="">Mahalle Seçiniz</option>
                    </select>

                </div>

        </form>
        </div>
    </section>
    <!-- End Checkout Area -->

@endsection
@section('footerjs')

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('#city').change(function () {
                let cid = jQuery(this).val();
                jQuery('#neighbourhood').html('<option value="">Mahalle Seçiniz</option>')
                jQuery.ajax({
                    url: '/getDistrict',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{csrf_token()}}',
                    success: function (result) {
                        jQuery('#district').html(result)
                    }
                });
            });

            jQuery('#district').change(function () {
                let did = jQuery(this).val();
                jQuery.ajax({
                    url: '/getNeighbourhood',
                    type: 'post',
                    data: 'did=' + did + '&_token={{csrf_token()}}',
                    success: function (result) {
                        jQuery('#neighbourhood').html(result)
                    }
                });
            });
        });
    </script>
@endsection
