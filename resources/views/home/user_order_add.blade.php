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
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">Billing Details </h3>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>First Name <span class="required">*</span></label>
                                        @php
                                            $name=\Illuminate\Support\Facades\Auth::user()->name;

                                          $surname=\Illuminate\Support\Facades\Auth::user()->surname
                                        @endphp
                                        <input type="text" name="name" value="{{strtoupper($name)}}"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" name="surname" class="form-control"
                                               value="{{strtoupper($surname)}}">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                               name="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}"
                                               name="phone" class="form-control">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>İL</label>
                                        <div class="select-box">
                                            <select id="city" name="city" class="form-control">
                                                <option value="">İl Seçiniz</option>
                                                @foreach($getcity as $rs)
                                                    <option value="{{$rs->sehir_key}}">{{$rs->sehir_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">

                                    <div class="form-group">
                                        <div class="select-box">
                                            <label>İLÇE <span class="required">*</span></label>
                                            <select id="district" name="district" class="form-control">
                                                <option value="">İlçe Seçiniz</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">

                                    <div class="form-group">
                                        <div class="select-box">
                                            <label>MAHALLE <span class="required">*</span></label>
                                            <select id="neighbourhood" name="neighbourhood" class="form-control">
                                                <option value="">Mahalle Seçiniz</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">

                                    <div class="form-group">
                                        <label>POSTA KODU <span class="required">*</span></label>
                                        <input type="text" name="zipcode" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Address <span class="required">*</span></label>
                                        <textarea cols="30" rows="4" value=""
                                                  name="address" class="form-control"
                                                  placeholder="Tam Adres Yazınız."></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="note" id="notes" cols="30" rows="3" placeholder="Şipariş Notu"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="order-details">
                            <h3 class="title">Your Order {{$total}}€</h3>
                            <div class="input">
                                <input type="hidden" name="total" value="{{$total}}">

                            </div>

                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php
                                        $total=0;
                                    @endphp
                                    @foreach($shopcart as $rs)
                                        <tr>
                                            <td class="product-name">
                                                <a style="color: #ff5797"
                                                   href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"> {{$rs->product->title}}</a>
                                            </td>

                                            <td class="product-total">
                                                <span>{{$rs->quantity}}</span>
                                                <span>x</span>
                                                <span class="price"> {{$rs->product->price}}€</span>
                                                <span>=</span>
                                                <span class="price"> {{$rs->product->price * $rs->quantity}}€</span>
                                            </td>
                                        </tr>
                                        @php
                                            $total += $rs->product->price * $rs->quantity;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td class="order-subtotal">
                                            <span>Cart Subtotal</span>
                                        </td>

                                        <td class="order-subtotal-price">
                                            <span class="order-subtotal-amount">{{$total}}€</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="order-shipping">
                                            <span>Shipping</span>
                                        </td>

                                        <td class="shipping-price">
                                            <span>30€</span>
                                        </td>
                                    </tr>
                                    @php
                                        $total += 30;
                                    @endphp
                                    <tr>
                                        <td class="total-price">
                                            <span>Order Total</span>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">{{$total}}€</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="payment-box">
{{--                                <div class="payment-method">--}}

{{--                                    <h2>Kart Bilgileri</h2>--}}
{{--                                    <label>Ad Soyad</label>--}}
{{--                                    <input type="text" name="cartname" class="form-control">--}}
{{--                                    <label>Kart No</label>--}}
{{--                                    <input type="text" name="cartno" class="form-control">--}}
{{--                                    <label>Son Kullanım Ay</label>--}}
{{--                                    <input type="number" name="expire_month" class="form-control" min="1" max="12">--}}
{{--                                    <label>Son Kullanım Yılı</label>--}}
{{--                                    <input type="number" name="expire_year" class="form-control" min="1990" max="2050">--}}
{{--                                    <label>CVC</label>--}}
{{--                                    <input type="text" name="cartcvc" class="form-control">--}}
{{--                                </div>--}}
                                <button type="submit" class="default-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Checkout Area -->

    <!-- Start Facility Area -->
    <section class="facility-area pb-70">
        <div class="container">
            <div class="facility-slides owl-carousel owl-theme">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-tracking'></i>
                    </div>
                    <h3>Free Shipping Worldwide</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-return'></i>
                    </div>
                    <h3>Easy Return Policy</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-shuffle'></i>
                    </div>
                    <h3>7 Day Exchange Policy</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-sale'></i>
                    </div>
                    <h3>Weekend Discount Coupon</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-credit-card'></i>
                    </div>
                    <h3>Secure Payment Methods</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-location'></i>
                    </div>
                    <h3>Track Your Package</h3>
                </div>

                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-customer-service'></i>
                    </div>
                    <h3>24/7 Customer Support</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- End Facility Area -->

@endsection
@section('footerjs')

    <script>
        $(document).ready(function () {
            $('#city').change(function () {
                let cid = $(this).val();
                $('#neighbourhood').html('<option value="">Mahalle Seçiniz</option>')
                $.ajax({
                    url: '/getDistrict',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{csrf_token()}}',
                    success: function (result) {
                        console.log(result);
                        $('#district').html(result);

                        $('#district').niceSelect('update');
                    }
                });
            });

            $('#district').change(function () {
                let did = $(this).val();
                $.ajax({
                    url: '/getNeighbourhood',
                    type: 'post',
                    data: 'did=' + did + '&_token={{csrf_token()}}',
                    success: function (result) {
                        $('#neighbourhood').html(result);

                        $('#neighbourhood').niceSelect('update');
                    }
                });
            });
        });

    </script>
@endsection
