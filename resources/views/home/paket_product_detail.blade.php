@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', $data->title)
@section('description')
    {{$data->description}}
@endsection
@section('keywords',$data->keywords)

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h4>{{$data->paket_category->title}}</h4>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("Ürün Detayı")</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Product Details Area -->
    <section class="product-details-area pt-100 pb-70">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="products-details-image">
                        <ul class="products-details-image-slides">
                            <li><img src="{{asset('images/'.$data->image)}}" alt="image"></li>
                        </ul>
                        <div class="slick-thumbs">
                            <ul>
                                <li><img src="{{asset('images/'.$data->image)}}" alt="image"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="products-details-desc">
                        <h3>{{$data->title}}</h3>
                        {{--                        @if($data->is_sale=="Yes")--}}
                        {{--                            <h5><b style="color:darkred"><i class="bx bxs-discount fs-5"> SALE! %{{$data->sale}}</i></b>--}}
                        {{--                            </h5>--}}
                        {{--                        @endif--}}
                        {{--                        @if($data->is_sale=="No")--}}
                        {{--                            <div class="price">--}}
                        {{--                                <span class="new-price">{{$data->price}} &#8378; </span>--}}
                        {{--                            </div>--}}
                        {{--                        @else--}}
                        {{--                            <div class="price">--}}
                        {{--                                <span class="old-price">{{$data->price}} &#8378; </span>--}}
                        {{--                                <span class="new-price">{{$data->sale_price}} &#8378; </span>--}}
                        {{--                            </div>--}}
                        <ul class="products-info">
                            <li><span>Availability:</span> <a href="javascript:void(0);">
                                    @if($data->quantity<=5 && $data->quantity>0)
                                        <span
                                            style="color:darkgreen">@lang("In stock") (@lang("End") {{$data->quantity}} @lang("items"))!!! </span>
                                    @endif
                                    @if($data->quantity)
                                        <span style="background-color: rgba(143,255,61,0.44)">@lang("In stock")
                                        </span>
                                    @else
                                        <span
                                            style="background-color: rgba(226,41,23,0.96);  text-decoration: line-through; color: black "> @lang("In stock")</span>
                                        ({{$data->quantity}} @lang("items"))
                                    @endif
                                </a></li>
                            <li><span>@lang("Products Type"):</span> <a
                                    href="javascript:void(0);"> {{$data->category->title}}</a></li>
                            <li><span>@lang("Products Description"):</span> <a
                                    href="javascript:void(0);">{{$data->description}}</a></li>
                        </ul>
                        <br>
                        <div class="products-info-btn">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#productsShippingModal"><i
                                    class='bx bxs-truck'></i> @lang("Shippingg")</a>
                            <a href="{{route('contact')}}"><i class='bx bx-envelope'></i> @lang("Ask about this products")</a>
                        </div>
                        <br>
                        <div class="row">{{$data->paket_category_id}}
                            @php
                                $total=0;
                            @endphp
                            {{--                           - {{$total}}--}}
                            <hr>
                            @foreach($products as $rs)

                                <div class="col-md-2 col-sm-2">
                                    <img style="height: 60px" src="{{asset('images/'.$rs->image)}}" class="main-image"
                                         alt="image">
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="products-add-to-cart">
{{--                                        <form action="{{route('paket_product_update_cart',['id'=>$data->paket_category_id,'slug'=>$data->slug])}}"--}}
{{--                                            method="post">--}}
{{--                                            @csrf--}}
                                            <div class="input-counter">
                                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                                <label>
                                                    <input type="text" name="quantity" min="0" value="0"
                                                           max="{{$rs->quantity}}" onchange="this.form.submit()"
                                                           readonly>
                                                </label>
                                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                            </div>
                                            <input type="hidden" name="price" value="{{$rs->price}}">
{{--                                        </form>--}}
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    {{$rs->price}}₺
                                </div>
                                <hr>
                            @endforeach

                        </div>
                        <br>
                        <div class="products-add-to-cart">
                            <form action="#" >
                                @csrf
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" name="quantity" value="1" max="{{(int)$data->quantity}}" min="1"
                                           readonly>
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                                <input type="submit" class="default-btn" value="Add to Cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--            <div class="tab products-details-tab">--}}
            {{--                <ul class="tabs">--}}
            {{--                    <li><a href="#">--}}
            {{--                            <div class="dot"></div>--}}
            {{--                            Ürün Detayı--}}
            {{--                        </a></li>--}}
            {{--                    <li><a href="#">--}}
            {{--                            <div class="dot"></div>--}}
            {{--                            Kargo--}}
            {{--                        </a></li>--}}

            {{--                    <li><a href="#">--}}
            {{--                            <div class="dot"></div>--}}
            {{--                            Neden Bizden Satın Alın--}}
            {{--                        </a></li>--}}

            {{--                    <li><a href="#">--}}
            {{--                            <div class="dot" id="review"></div>--}}
            {{--                            Yorumlar ({{$countreview}})--}}
            {{--                        </a></li>--}}
            {{--                </ul>--}}

            {{--                <div class="tab-content">--}}
            {{--                    <div class="tabs-item">--}}
            {{--                        <div class="products-details-tab-content">--}}
            {{--                            <p>{!! $data->detail !!}</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                    <div class="tabs-item">--}}
            {{--                        <div class="products-details-tab-content">--}}
            {{--                            <div class="table-responsive">--}}
            {{--                                <table class="table table-bordered">--}}
            {{--                                    <tbody>--}}
            {{--                                    <tr>--}}
            {{--                                        <td>Shipping</td>--}}
            {{--                                        <td>This item Ship to USA</td>--}}
            {{--                                    </tr>--}}

            {{--                                    <tr>--}}
            {{--                                        <td>Delivery</td>--}}
            {{--                                        <td>--}}
            {{--                                            Estimated between Wednesday 07/31/2021 and Monday 08/05/2021 <br>--}}
            {{--                                            Will usually ship within 1 bussiness day.--}}
            {{--                                        </td>--}}
            {{--                                    </tr>--}}
            {{--                                    </tbody>--}}
            {{--                                </table>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                    <div class="tabs-item">--}}
            {{--                        <div class="products-details-tab-content">--}}
            {{--                            <p>Here are 5 more great reasons to buy from us:</p>--}}

            {{--                            <ol>--}}
            {{--                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem--}}
            {{--                                    Ipsum has been the industry's standard dummy text ever since the 1500s.--}}
            {{--                                </li>--}}
            {{--                                <li> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>--}}
            {{--                                <li>When an unknown printer took a galley of type and scrambled it to make a type--}}
            {{--                                    specimen book.--}}
            {{--                                </li>--}}
            {{--                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>--}}
            {{--                                <li>When an unknown printer took a galley of type and scrambled it to make a type--}}
            {{--                                    specimen book.--}}
            {{--                                </li>--}}
            {{--                            </ol>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                    <div class="tabs-item">--}}
            {{--                        <div class="products-details-tab-content">--}}
            {{--                            <div class="products-review-form">--}}

            {{--                                <div class="row">--}}
            {{--                                    <div class="col-lg-7 col-md-12">--}}
            {{--                                        <div class="review-comments">--}}
            {{--                                            @foreach($reviews as $rs)--}}
            {{--                                                <div class="review-item">--}}
            {{--                                                    <strong>{{$rs->subject}} </strong>--}}
            {{--                                                    <br>--}}
            {{--                                                    <div class="rating">--}}
            {{--                                                        <i class="bx bx-star @if($rs->rate>=1) bx bxs-star  @endif "></i>--}}
            {{--                                                        <i class="bx bx-star @if($rs->rate>=2) bx bxs-star  @endif "></i>--}}
            {{--                                                        <i class="bx bx-star @if($rs->rate>=3) bx bxs-star  @endif "></i>--}}
            {{--                                                        <i class="bx bx-star @if($rs->rate>=4) bx bxs-star @endif "></i>--}}
            {{--                                                        <i class="bx bx-star @if($rs->rate>=5) bx bxs-star @endif "></i>--}}
            {{--                                                    </div>--}}
            {{--                                                    <br>--}}
            {{--                                                    <div class="d-flex align-items-center mb-2">--}}
            {{--                                                        <h5 class="mb-0"><i class="bx bx-user">--}}
            {{--                                                                &nbsp;{{$rs->user->name}}</i></h5>--}}

            {{--                                                        <p class="mb-0 ms-auto"><i--}}
            {{--                                                                class="bx bx-time"></i>&nbsp;{{$rs->created_at}}</p>--}}
            {{--                                                    </div>--}}

            {{--                                                    <p>{{$rs->review}}</p>--}}

            {{--                                                </div>--}}
            {{--                                            @endforeach--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="col-lg-5 col-md-12">--}}
            {{--                                        <div class="review-form">--}}
            {{--                                            <h3>Write a Review</h3>--}}

            {{--                                            @livewire('review', ['id'=> $data->id])--}}

            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </section>
    <!-- End Product Details Area -->
    <!-- Start Facility Area -->
    <section class="facility-area pb-70">
        <div class="container">
            <div class="facility-slides owl-carousel owl-theme">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class='flaticon-tracking'></i>
                    </div>
                    <h3>@lang("Free Shipping Worldwide")</h3>
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
    <!-- Start Shipping Modal Area -->
    <div class="modal fade productsShippingModal" id="productsShippingModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class='bx bx-x'></i></span>
                </button>
                <div class="shipping-content">
                    <h3>@lang("Shipping")</h3>
                    <ul>
                        <li>Complimentary ground shipping within 1 to 7 business days</li>
                        <li>In-store collection available within 1 to 7 business days</li>
                        <li>Next-day and Express delivery options also available</li>
                        <li>Purchases are delivered in an orange box tied with a Bolduc ribbon, with the exception of
                        </li>
                        <li>See the delivery FAQs for details on shipping methods, costs and delivery times</li>
                    </ul>
                    <h3>Returns and Exchanges</h3>
                    <ul>
                        <li>Easy and complimentary, within 14 days</li>
                        <li>See conditions and procedure in our return FAQs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shipping Modal Area -->
@endsection

{{--@section('footerjs')--}}
{{--    <script>--}}
{{--        function checkForm() {--}}
{{--            var quantity = document.getElementsByClassName('quantity');--}}
{{--            var price = document.getElementsByClassName('product_price').value;--}}
{{--            var a=$("input:text").val;--}}
{{--            var sub_total=price*quantity;--}}
{{--             alert(a);--}}
{{--            document.getElementsByClassName('sub_total').innerHTML= quantity;--}}
{{--        }--}}
{{--    </script>--}}
{{--@endsection--}}
