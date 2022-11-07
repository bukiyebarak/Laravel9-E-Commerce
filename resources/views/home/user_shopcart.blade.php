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
                <h2>ShopCart</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>ShopCart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

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
                            @php
                                $total=0;
                            @endphp

                            @foreach($datalist as $rs)
                                <tr>
                                    <td class="product-thumbnail">
                                        @if($rs->product->image!=null)
                                            <img src="{{Storage::url($rs->product->image)}}"
                                                 style="height: 100px" alt="">
                                        @endif
                                    </td>

                                    <td class="product-name">
                                        <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"> {{$rs->product->title}}</a>
                                        <ul>
                                            <li>Max Quantity: <span>{{$rs->product->quantity}}</span></li>

                                        </ul>
                                    </td>

                                    <td class="product-price">
                                        <span class="unit-amount">{{$rs->product->price}}€</span>
                                    </td>

                                    <td class="product-quantity">
                                        <form
                                            action="{{route('user_shopcart_update',['id'=>$rs->id])}}" method="post">
                                            @csrf
                                            <div class="input-counter">
                                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                                <input type="text" name="quantity" min="1" value="{{$rs->quantity}}"
                                                       max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                            </div>
                                        </form>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">  {{$rs->product->price * $rs->quantity}}€</span>

                                        <a href="{{route('user_shopcart_delete',['id'=>$rs->id])}}"
                                           onclick="return confirm('Delete! Are you sure?')" class="remove"><i
                                                class='bx bx-trash'></i></a>
                                    </td>
                                </tr>
                                @php
                                    $total += $rs->product->price * $rs->quantity;
                                @endphp
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="cart-buttons">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <a href="{{route('home')}}" class="optional-btn">Continue Shopping</a>
                            </div>

                        </div>
                    </div>

                    <div class="cart-totals">
                        <h3>Cart Totals</h3>

                        <ul>
                            <li>Subtotal <span>{{$total}}€</span></li>
                            <li>Shipping <span>30 €</span></li>
                            <li>Total <span>{{$total + 30}}€</span></li>
                        </ul>

                        <a href="#" class="default-btn">Proceed to Checkout</a>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection
