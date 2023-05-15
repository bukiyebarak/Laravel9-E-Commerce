@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', __('User Order Items'))
@section('content')
    <style>
        div.scroll {
            margin: 5px;
            padding: 20px;
            width: 150px;
            height: auto;
            overflow: auto;
            text-align: justify;
        }
    </style>
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>@lang("Order Items")</h2>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("Order Items")</li>
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

                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>@lang("Product")</th>
                                <th>@lang("Name")</th>
                                <th>@lang("Unit Price")</th>
                                <th style="text-align: center">@lang("Note")</th>
                                <th style="text-align: center">@lang("Status")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $total=0;   @endphp
                            @foreach($datalist as $rs)
                                <tr>
                                    <td class="product-thumbnail">
                                        @if($rs->product->image!=null)
                                            <img src="{{asset('images/'.$rs->product->image)}}"
                                                 style="height: 90px;" alt="">
                                        @endif
                                    </td>
                                    <td class="product-name">
                                        <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"> {{$rs->product->title}}</a>
                                        <ul>
                                            <li>@lang("Received Quantity"): <span> {{$rs->quantity}}</span></li>
                                        </ul>
                                    </td>
                                    <td class="product-name">
                                        <span class="unit-amount">{{$rs->price}}₺</span>
                                        <ul>
                                            <li>@lang("Total"): <span> {{$rs->price*$rs->quantity}}₺</span></li>
                                        </ul>
                                    </td>
                                    <td><div class="scroll">
                                        {{$rs->note}}</div>
                                    </td>
                                    <td class="product-price">
                                         <div style="text-align: center;">
                                            @if($rs->status=="Shipping")
                                                    <button class="badge rounded-pill text-white bg-warning p-2 text-uppercase px-3">
                                                        @lang("Shipping")
                                                </button>
                                                @elseif($rs->status=="Accepted")
                                                    <button class="badge rounded-pill text-white bg-success p-2 text-uppercase px-3">
                                                        @lang("Accepted")
                                                </button>
                                                @elseif($rs->status=="Completed")
                                                    <button class="badge rounded-pill text-white bg-info p-2 text-uppercase px-3">
                                                        @lang("Completed")
                                                </button>
                                                @elseif($rs->status=="Canceled")
                                                    <button class="badge rounded-pill text-white bg-danger p-2 text-uppercase px-3">
                                                        @lang("Canceled")
                                                </button>
                                                @else
                                                    <button  class="badge rounded-pill text-white bg-success p-2 text-uppercase px-3">
                                                        @lang("New") </button>
                                                @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="cart-totals">
                        <h3>@lang("Cart Totals")</h3>
                        <ul>
                            <li>@lang("Subtotal") <span>{{$rs->total-30}}₺</span></li>
                            <li>@lang("Shipping") <span>30 ₺</span></li>
                            <li>@lang("Total") <span>{{$rs->total}}₺</span></li>
                        </ul>
{{--                        <form action="{{route('user_order_add')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="total" value="{{$total}}">--}}
{{--                            <button type="submit" class="default-btn">Proceed to Checkout</button>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
