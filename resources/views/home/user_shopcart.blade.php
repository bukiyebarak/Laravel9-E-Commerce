@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'User Shopcart')
@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Shopcart</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Shopcart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="products-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @include('home.usermenu')
                <div class="col-lg-9 col-md-12">

                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($datalist as $rs)
                                <tr>
                                    <td class="product-thumbnail">
                                        @if($rs->product->image!=null)
                                            <img src="{{Storage::url($rs->product->image)}}"
                                                 height="60" alt="">
                                        @endif
                                    </td>

                                    <td class="product-name">
                                        {{$rs->product->title}}
                                    </td>

                                    <td class="product-price">
                                        {{$rs->price}}
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                            <input type="text" min="1" value="{{$rs->quantity}}">
                                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">{{$rs->price * $rs->quantity}}</span>

                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-sm-7 col-md-7">
                                    <a href="#" class="optional-btn">Continue Shopping</a>
                                </div>

                                <div class="col-lg-5 col-sm-5 col-md-5 text-end">
                                    <a href="#" class="default-btn">Update Cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="cart-totals">
                            <h3>Cart Totals</h3>

                            <ul>
                                <li>Subtotal <span>$800.00</span></li>
                                <li>Shipping <span>$30.00</span></li>
                                <li>Total <span>$830.00</span></li>
                            </ul>

                            <a href="#" class="default-btn">Proceed to Checkout</a>
                        </div>

                </div>
            </div>
        </div>
    </section>

    <!-- End Customer Service Area -->

@endsection
