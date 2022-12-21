@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'User Order Items')
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
                <h2>Order Items</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Order Items</li>
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
                                <th>Product</th>
                                <th >Name</th>
                                <th>Unit Price</th>
                                <th style="text-align: center">Note</th>
                                <th style="text-align: center">Status</th>

                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $total=0;
                            @endphp

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
                                            <li>Received Quantity: <span> {{$rs->quantity}}</span></li>

                                        </ul>
                                    </td>
                                    <td class="product-name">
                                        <span class="unit-amount">{{$rs->price}}₺</span>
                                        <ul>
                                            <li>Total: <span> {{$rs->price*$rs->quantity}}₺</span></li>
                                        </ul>
                                    </td>
                                    <td><div class="scroll">
                                        {{$rs->note}}</div>
                                    </td>
                                    <td class="product-price">
                                         <div style="text-align: center;">
                                            @if($rs->status=="Shipping")
                                                    <button class="badge rounded-pill text-white bg-warning p-2 text-uppercase px-3">
                                                    Shipping
                                                </button>
                                                @elseif($rs->status=="Accepted")
                                                    <button class="badge rounded-pill text-white bg-success p-2 text-uppercase px-3">
                                                    Accepted
                                                </button>
                                                @elseif($rs->status=="Completed")
                                                    <button class="badge rounded-pill text-white bg-info p-2 text-uppercase px-3">
                                                    Completed
                                                </button>
                                                @elseif($rs->status=="Canceled")
                                                    <button class="badge rounded-pill text-white bg-danger p-2 text-uppercase px-3">
                                                    Canceled
                                                </button>
                                                @else
                                                    <button  class="badge rounded-pill text-white bg-success p-2 text-uppercase px-3">
                                                    New</button>
                                                @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="cart-totals">
                        <h3>Cart Totals</h3>

                        <ul>
                            <li>Subtotal <span>{{$rs->total-30}}₺</span></li>
                            <li>Shipping <span>30 ₺</span></li>
                            <li>Total <span>{{$rs->total}}₺</span></li>
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
