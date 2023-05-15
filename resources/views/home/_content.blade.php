@php
    $parentCategories=\App\Http\Controllers\HomeController::categorylistall()
@endphp
<style>
    img.slider_image {
        height: 520px;
        width: 370px;
        border-radius: 50%;
        border-style: inset;
    }

    @media only screen and (max-device-width: 500px) {
        img.slider_image {
            height: 300px;
            width: 300px;
        }
        div.image{
            height: 200px;
            width: 200px;
        }
    }

    .heartbtn {
        border-style: none;
        background-color: inherit;
    }

</style>

<!-- Start Main Banner Area  Slider Categories-->
<div class="home-slides-three owl-carousel owl-theme">
    @foreach($slider as $rs)
        <div class="hero-banner">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="main-banner-content">
                                    <span class="sub-title animate__animated animate__fadeInUp" style="opacity: 1;">🤎@lang('Coffee Time')...🤎</span>
                                    <br>
                                    <span class="sub-title animate__animated animate__fadeInUp" style="opacity: 1;">@lang('Limited Time Offer')!</span>
                                    <h1 class="animate__animated animate__fadeInUp"
                                        style="opacity: 1;">{{$rs->title}}</h1>
                                    <p style="color: rgba(243,63,133,0.94);font-weight: bold"> {{$rs->category->title}}</p>
                                    <p class="animate__animated animate__fadeInUp" style="opacity: 1;">
                                        @if($rs->is_sale=="Yes")
                                            @lang('Take off') {{$rs->sale}}% @lang("Off 'Sale Must-Haves'")
                                            @endif
                                    </p>
                                    </p>
                                    <div style="text-align: center" class="btn-box">
                                        <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}"
                                           class="default-btn">@lang("Shop Now") </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="banner-image ">
                                    <div class="circle"></div>
                                    <img src="{{asset('images/'.$rs->image)}}" class="slider_image"
                                         alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- End Main Banner Area -->

<!-- Start Categories Banner Area -->
<section class="categories-banner-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-categories-box">
                    <img src="{{asset('assets')}}/home/assets/img/coffee2.jpg" alt="image" style="width: 750vm;height: 500vm;">

                    <div class="content text-white">
                        <span>@lang("Build your own package")</span>
                        <h3>@lang("Now is the time")</h3>
                        <a href="{{route('main_category_products_paket')}}" class="default-btn">@lang("Discover Now")</a>
                    </div>
                    <a href="{{route('main_category_products_paket')}}" class="link-btn"></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-categories-box">
                    <img src="{{asset('assets')}}/home/assets/img/coffee.jpg" alt="image" style="height: 500vm;">
                    <div class="content">
                        <span>@lang("New Collection")</span>
                        <h3>@lang("Need Now")</h3>
                        <a href="{{route('new_products')}}" class="default-btn">@lang("Discover Now")</a>
                    </div>
                    <a href="{{route('new_products')}}" class="link-btn"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Categories Banner Area -->

<!-- Start Products Area -->
<section class="products-area pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">@lang("See Our Collection")</span>
            <h2>@lang("En Yeniler")</h2>
        </div>

        <div class="row">
            @foreach($last as $rs)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-productsBox">
                        <div class="products-image">
                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                <img style="height: 200px" src="{{asset('images/'.$rs->image)}}" class="main-image"
                                     alt="image">
                                <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                            </a>
                            <div class="products-button">
                                <ul>
                                    <li>
                                        <div class="wishlist-btn">
                                            <form action="{{route('user_wishlist_add',['id'=>$rs->id])}}" method="post">
                                                @csrf
                                                <a href="javascript:void(0);">
                                                    <span class="tooltip-label">@lang("Add to Wishlist")</span>
                                                    <button type="submit" class='heartbtn bx bx-heart'></button>
                                                </a>
                                            </form>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quick-view-btn">
                                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                <i class='bx bx-search-alt'></i>
                                                <span class="tooltip-label">@lang("Quick View")</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="compare-btn">
                                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                                @csrf
                                                <input name="quantity" type="hidden" value="1">
                                                <a href="javascript:void(0);">
                                                    <span class="tooltip-label">@lang("Add to Cart")</span>
                                                    <button type="submit" class="heartbtn bx bx-cart"></button>
                                                </a>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @if($rs->is_sale=="Yes")
                                <div class="sale-tag" style="font-size: 11px">@lang("Sale")!</div>
                            @else
                                <div class="new-tag">@lang("New")!</div>
                            @endif

                        </div>

                        <div class="products-content">
                            @foreach($parentCategories as $category)
                                @if($category->id==$rs->category_id)
                                    <span class="category">{{$category->title}}</span>
                                @endif
                            @endforeach
                            <h3><a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a>
                            </h3>
                            @php
                                $avgrev=\App\Http\Controllers\HomeController::avrgreview($rs->id);
                                $countreview=\App\Http\Controllers\HomeController::countreview($rs->id);
                            @endphp
                            <div class="star-rating">
                                <div class="rating">
                                    <i class="bx bx-star @if($avgrev>=1) bx bxs-star  @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=2) bx bxs-star  @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=3) bx bxs-star  @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=4) bx bxs-star @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i> @if($countreview>0)
                                        ({{$countreview}} @lang("İnceleme"))
                                    @endif
                                </div>
                            </div>
                            @if($rs->is_sale=="No")
                                <div class="price">
                                    <span class="new-price">{{$rs->price}}₺</span>
                                </div>
                            @else
                                <div class="price">
                                    <span class="old-price">{{$rs->price}}₺</span>
                                    <span class="new-price">{{$rs->sale_price}}₺</span>
                                </div>
                            @endif
{{--                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input name="quantity" type="hidden" value="1">--}}
{{--                                <button type="submit" class="add-to-cart btn default-btn">Add to Cart</button>--}}
{{--                            </form>--}}
                        </div>
                        @if($rs->is_sale=="Yes")
                            <span class="products-discount">
                            <span> {{$rs->sale}}% @lang("OFF") </span>
                        </span>
                        @endif
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>
<!-- End Products Area -->

<!-- Start Offer Products Area -->
<section class="offer-products-area">
    <div class="container">
        <div class="offer-products-slides owl-carousel owl-theme">
            <div class="single-offer-products">
                <div class="content">
                    <h3><a href="{{route('new_products')}}">@lang("New Collections")!</a></h3>
                    <p>@lang("Stylist Allison Taylor take on the summer season's trends.")</p>
                    <a href="{{route('new_products')}}" class="default-btn">@lang("Discover Now")!</a>
                </div>
                <div class="image">
                    <a href="{{route('new_products')}}"><img
                            src="{{asset('assets')}}/home/assets/img/offer/img1.jpg" alt="image"></a>
                </div>
            </div>
            <div class="single-offer-products">
                <div class="content">
                    <h3><a href="{{route('allproducts')}}">@lang("All Products")</a></h3>
                    <p>@lang("Stylist Allison Taylor take on the summer season's trends.")</p>
                    <a href="{{route('allproducts')}}" class="default-btn">@lang("Discover Now")!</a>
                </div>

                <div class="image">
                    <a href="{{route('allproducts')}}"><img
                            src="{{asset('assets')}}/home/assets/img/offer/img2.jpg" alt="image"></a>
                </div>
            </div>

            <div class="single-offer-products">
                <div class="content">
                    <h3><a href="{{route('discount_products')}}">@lang("Discount Products")</a></h3>
                    <p>@lang("Stylist Allison Taylor take on the summer season's trends").</p>
                    <a href="{{route('discount_products')}}" class="default-btn">@lang("Discover Now")!</a>
                </div>

                <div class="image">
                    <a href="{{route('discount_products')}}"><img
                            src="{{asset('assets')}}/home/assets/img/offer/img3.jpg" alt="image"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>
<!-- End Offer Products Area -->

<section class="all-products-area ptb-100 bg-f5f5f5">
    <div class="container">
        <!-- Start Products Area -->
        <section class="products-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-start">
                    <span class="sub-title">@lang("See Our Collection")</span>
                    <h2>@lang("Recent Products")</h2>
                    <a href="{{route('allproducts')}}" class="default-btn">@lang("Shop More")</a>
                </div>

                <div class="products-slides owl-carousel owl-theme">
                    @foreach($picked as $rs)
                        <div class="single-products-box">
                            <div class="products-image">
                                <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                    <img style="height: 380px;width: 320px" src="{{asset('images/'.$rs->image)}}"
                                         class="main-image"
                                         alt="image">
                                    <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                                </a>

                                <div class="products-button">
                                    <ul>
                                        <li>
                                            <div class="wishlist-btn">
                                                <form action="{{route('user_wishlist_add',['id'=>$rs->id])}}"
                                                      method="post">
                                                    @csrf
                                                    <a href="javascript:void(0);">
                                                        <span class="tooltip-label">@lang("Add to Wishlist")</span>
                                                        <button type="submit" class='heartbtn bx bx-heart'></button>
                                                    </a>
                                                </form>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="quick-view-btn">
                                                <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                    <i class='bx bx-search-alt'></i>
                                                    <span class="tooltip-label">@lang("Quick View")</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="compare-btn">
                                                <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                                    @csrf
                                                    <input name="quantity" type="hidden" value="1">
                                                    <a href="javascript:void(0);">
                                                        <span class="tooltip-label">@lang("Add to Cart")</span>
                                                        <button type="submit" class="heartbtn bx bx-cart"></button>
                                                    </a>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="products-content">
                                @foreach($parentCategories as $category)
                                    @if($category->id==$rs->category_id)
                                        <span class="category">{{$category->description}}</span>
                                    @endif
                                @endforeach
                                <h3>
                                    <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a>
                                </h3>
                                @if($rs->is_sale=="No")
                                    <div class="price">
                                        <span class="new-price">{{$rs->price}}₺</span>
                                    </div>
                                @else
                                    <div class="price">
                                        <span class="old-price">{{$rs->price}}₺</span>
                                        <span class="new-price">{{$rs->sale_price}}₺</span>
                                    </div>
                                @endif
                                @php
                                    $avgrev=\App\Http\Controllers\HomeController::avrgreview($rs->id);
                                    $countreview=\App\Http\Controllers\HomeController::countreview($rs->id);
                                @endphp
                                <div class="star-rating">
                                    <div class="rating">
                                        <i class="bx bx-star @if($avgrev>=1) bx bxs-star  @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=2) bx bxs-star  @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=3) bx bxs-star  @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=4) bx bxs-star @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i>@if($countreview>0)
                                            ({{$countreview}} @lang("İnceleme"))
                                        @endif
                                    </div>
                                </div>
{{--                                <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <input name="quantity" type="hidden" value="1">--}}
{{--                                    <input type="submit" class="add-to-cart default-btn"--}}
{{--                                           style="background-color: whitesmoke" value="Add to Cart">--}}
{{--                                </form>--}}
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Products Area -->
    </div>
</section>
<br><br><br><br>
<!-- Start Products Area -->
<section class="products-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">@lang("See Our Collection")</span>
            <h2>@lang("Popular Products")</h2>
        </div>

        <div class="row">
            @foreach($picked as $rs)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-productsBox">
                        <div class="products-image">
                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                <img style="height: 250px;" src="{{asset('images/'.$rs->image)}}" class="main-image"
                                     alt="image" >
                                <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                            </a>
                            <div class="products-button">
                                <ul>
                                    <li>
                                        <div class="wishlist-btn">
                                            <form action="{{route('user_wishlist_add',['id'=>$rs->id])}}" method="post">
                                                @csrf
                                                <a href="javascript:void(0);">
                                                    <span class="tooltip-label">@lang("Add to Wishlist")</span>
                                                    <button type="submit" class='heartbtn bx bx-heart'></button>
                                                </a>
                                            </form>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quick-view-btn">
                                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                <i class='bx bx-search-alt'></i>
                                                <span class="tooltip-label">@lang("Quick View")</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="compare-btn">
                                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                            @csrf
                                            <input name="quantity" type="hidden" value="1">
                                            <a href="javascript:void(0);">
                                                <span class="tooltip-label">@lang("Add to Cart")</span>
                                                <button type="submit" class="heartbtn bx bx-cart"></button>
                                            </a>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            @if($rs->is_sale=="Yes")
                                <div class="sale-tag" style="font-size: 11px">@lang("Sale")!</div>
                            @else
                                @foreach($last as $data)
                                    @if($rs->id==$data->id)
                                        <div class="new-tag">@lang("New")!</div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <div class="products-content">
                            @foreach($parentCategories as $category)
                                @if($category->id==$rs->category_id)
                                    <span class="category">{{$category->title}}</span>
                                @endif
                            @endforeach
                            <h3><a href="javascript:void(0);">{{$rs->title}}</a></h3>
                            @php
                                $avgrev=\App\Http\Controllers\HomeController::avrgreview($rs->id);
                                $countreview=\App\Http\Controllers\HomeController::countreview($rs->id);
                            @endphp
                            <div class="star-rating">
                                <div class="rating">
                                    <i class="bx bx-star @if($avgrev>=1) bx bxs-star  @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=2) bx bxs-star  @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=3) bx bxs-star  @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=4) bx bxs-star @endif "></i>
                                    <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i>@if($countreview>0)
                                        ({{$countreview}} @lang("İnceleme"))
                                    @endif
                                </div>
                            </div>
                            @if($rs->is_sale=="No")
                                <div class="price">
                                    <span class="new-price">{{$rs->price}} &#8378; </span>
                                </div>
                            @else
                                <div class="price">
                                    <span class="old-price">{{$rs->price}} &#8378;</span>
                                    <span class="new-price">{{$rs->sale_price}} &#8378;</span>
                                </div>
                            @endif
{{--                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input name="quantity" type="hidden" value="1">--}}
{{--                                <button type="submit" class="add-to-cart default-btn">Add to Cart</button>--}}
{{--                            </form>--}}
                        </div>
                        @if($rs->is_sale=="Yes")
                            <span class="products-discount">
                            <span> {{$rs->sale}}% @lang("OFF") </span>
                        </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Products Area -->

<!-- Start Facility Area -->
<section class="facility-area pb-70">
    <div class="container">
        <div class="facility-slides owl-carousel owl-theme">
            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-tracking'></i>
                </div>
                <h3>@lang("Kargo")</h3>
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
                <h3>@lang("7 Day Exchange Policy") </h3>
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
                <h3>@lang("24/7 Customer Support") </h3>
            </div>
        </div>
    </div>
</section>
<!-- End Facility Area -->

<!-- Start Products Area -->
<section class="products-area pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">@lang("See Our Collection")</span>
            <h2>@lang("Daily Products")</h2>
        </div>

        <div class="row">
            @foreach($daily as $rs)
                @if($rs->status=="True")
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-productsBox">
                            <div class="products-image">
                                <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                    <img style="height: 200px" src="{{asset('images/'.$rs->image)}}" class="main-image"
                                         alt="image">
                                    <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                                </a>
                                <div class="products-button">
                                    <ul>
                                        <li>
                                            <div class="wishlist-btn">
                                                <form action="{{route('user_wishlist_add',['id'=>$rs->id])}}"
                                                      method="post">
                                                    @csrf
                                                    <a href="javascript:void(0);">
                                                        <span class="tooltip-label">@lang("Add to Wishlist")</span>
                                                        <button type="submit" class='heartbtn bx bx-heart'></button>
                                                    </a>
                                                </form>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="quick-view-btn">
                                                <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                    <i class='bx bx-search-alt'></i>
                                                    <span class="tooltip-label">@lang("Quick View")</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="compare-btn">
                                                <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                                    @csrf
                                                    <input name="quantity" type="hidden" value="1">
                                                    <a href="javascript:void(0);">
                                                        <span class="tooltip-label">@lang("Add to Cart")</span>
                                                        <button type="submit" class="heartbtn bx bx-cart"></button>
                                                    </a>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @if($rs->is_sale=="Yes")
                                    <div class="sale-tag" style="font-size: 11px">@lang("Sale")!</div>
                                @else
                                    @foreach($last as $data)
                                        @if($rs->id==$data->id)
                                            <div class="new-tag">@lang("New")!</div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>

                            <div class="products-content">
                                @foreach($parentCategories as $category)
                                    @if($category->id==$rs->category_id)
                                        <span class="category">{{$category->title}}</span>
                                    @endif
                                @endforeach
                                <h3><a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a></h3>
                                @php
                                    $avgrev=\App\Http\Controllers\HomeController::avrgreview($rs->id);
                                    $countreview=\App\Http\Controllers\HomeController::countreview($rs->id);
                                @endphp
                                <div class="star-rating">
                                    <div class="rating">
                                        <i class="bx bx-star @if($avgrev>=1) bx bxs-star  @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=2) bx bxs-star  @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=3) bx bxs-star  @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=4) bx bxs-star @endif "></i>
                                        <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i>@if($countreview>0)
                                            ({{$countreview}} @lang("İnceleme"))
                                        @endif
                                    </div>
                                </div>
                                @if($rs->is_sale=="No")
                                    <div class="price">
                                        <span class="new-price">{{$rs->price}}₺</span>
                                    </div>
                                @else
                                    <div class="price">
                                        <span class="old-price">{{$rs->price}}₺</span>
                                        <span class="new-price">{{$rs->sale_price}}₺</span>
                                    </div>
                                @endif
{{--                                <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <input name="quantity" type="hidden" value="1">--}}
{{--                                    <button type="submit" class="add-to-cart default-btn">Add to Cart</button>--}}
{{--                                </form>--}}
                            </div>
                            @if($rs->is_sale=="Yes")
                                <span class="products-discount">
                            <span> {{$rs->sale}}% @lang("OFF")  </span>
                        </span>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>
<!-- End Products Area -->

<!-- Start Brand Area -->
<div class="brand-area ptb-70">
    <div class="container">
        <div class="section-title">
            <h2>@lang("Shop By Brand")</h2>
        </div>

        <div class="brand-slides owl-carousel owl-theme">
            <div class="brand-item">
                <a href="#"><img src="{{asset('assets')}}/home/assets/img/brand/img1.png" alt="image"></a>
            </div>

            <div class="brand-item">
                <a href="#"><img src="{{asset('assets')}}/home/assets/img/brand/img2.png" alt="image"></a>
            </div>

            <div class="brand-item">
                <a href="#"><img src="{{asset('assets')}}/home/assets/img/brand/img3.png" alt="image"></a>
            </div>

            <div class="brand-item">
                <a href="#"><img src="{{asset('assets')}}/home/assets/img/brand/img4.png" alt="image"></a>
            </div>

            <div class="brand-item">
                <a href="#"><img src="{{asset('assets')}}/home/assets/img/brand/img5.png" alt="image"></a>
            </div>

            <div class="brand-item">
                <a href="#"><img src="{{asset('assets')}}/home/assets/img/brand/img6.png" alt="image"></a>
            </div>
        </div>
    </div>
</div>
<br>
<!-- End Brand Area -->



