@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', __('User Shopcart'))
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
                <h2>@lang("ShopCart")</h2>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("ShopCart")</li>
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
                        <table class="table table-bordered table-responsive-md">
                            <thead>
                            <tr>
                                <th scope="col">@lang("Product")</th>
                                <th scope="col">@lang("Name")</th>
                                <th scope="col">@lang("Quantity")</th>
                            </tr>

                            </thead>

                            <tbody>
                            @php $total=0; @endphp
                            @foreach($datalist as $rs)
                                <tr>
                                    <td class="product-thumbnail">
                                        @if($rs->product->image!=null)
                                            <img src="{{asset('images/'.$rs->product->image)}}"
                                                 style="height: 100px" alt="">
                                        @endif
                                    </td>
                                    <td class="product-name">
                                        <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"> {{$rs->product->title}}</a>
                                        <ul>
                                            <li>@lang("Max Quantity"): <span>{{$rs->product->quantity}}</span></li>

                                            @if($rs->product->sale_price==null)
                                                <li>@lang("Unit Price"):<span
                                                        class="subtotal-amount">{{$rs->product->price}}₺</span>
                                                </li>
                                                <li>@lang("Total"):<span class="unit-amount"> <b> {{$rs->product->price * $rs->quantity}}₺</b></span>
                                                </li>
                                            @else
                                                <li>@lang("Unit Price"):<span
                                                        class="subtotal-amount ">{{$rs->product->price}}₺</span>
                                                </li>
                                                <li>@lang("Sale Price"):<span class="subtotal-amount">{{$rs->product->sale_price}}₺</span>
                                                </li>
                                                <li>@lang("Total"):<span class="unit-amount"> <b> {{$rs->product->sale_price * $rs->quantity}}₺</b></span>
                                                </li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="product-quantity">
                                        <form
                                            action="{{route('user_shopcart_update',['id'=>$rs->id])}}" method="post">
                                            @csrf
                                            <div class="input-counter">
                                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                                <label>
                                                    <input type="text" name="quantity" min="0" value="{{$rs->quantity}}"
                                                           max="{{$rs->product->quantity}}"
                                                           onchange="this.form.submit()" readonly>
                                                </label>
                                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="product-subtotal">
                                        <a
                                            href="{{route('user_shopcart_delete',['id'=>$rs->id])}}"
                                            onclick="return confirm('{{ __('Delete! Are you sure?') }}')" class="remove"><i
                                                class='bx bx-trash fs-3'></i></a>
                                        <form action="{{route('user_wishlist_add',['id'=>$rs->product->id])}}"
                                              method="post">
                                            @csrf
                                            <a href="javascript:void(0);">
                                                <button type="submit" class="heartbtn bx bx-heart fs-3"></button>
                                            </a>
                                        </form>
                                        {{--                                        <a href="#"><i class='bx bx-heart fs-3'></i></a>--}}
                                    </td>
                                </tr>
                                @php
                                    if($rs->product->sale_price==null)
                                      $total += $rs->product->price * $rs->quantity;
                                    else
                                        $total += $rs->product->sale_price * $rs->quantity;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-buttons">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <a href="{{route('allproducts')}}" class="optional-btn">@lang("Continue Shopping")</a>
                            </div>
                        </div>
                    </div>
                    <div class="cart-totals">
                        <h3>@lang("Cart Totals") </h3>
                        <ul>
                            <li>@lang("Subtotal") <span>{{$total}}₺</span></li>
                            <li>@lang("Shipping") <span>30 ₺</span></li>
                            @php $total += 30; @endphp
                            <li>@lang("Total") <span>@if($total>30) {{$total}}₺ @else   0₺ @endif</span></li>
                        </ul>
                        <form action="{{route('user_order_add')}}" method="post">
                            @csrf
                            @php  $total=$total- 30; @endphp
                            <input type="hidden" name="total" value="{{$total}}">
                            <button type="submit" class="default-btn">@lang("Proceed to Checkout")</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
