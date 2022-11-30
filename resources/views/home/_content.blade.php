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
                                    <span class="sub-title">🤎Coffee Time...🤎</span>
                                    <br>
                                    <h1>{{$rs->title}}</h1>
                                    <p> {{$rs->category}}</p>
                                    </p>
                                    <div style="text-align: center" class="btn-box">
                                        <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}"
                                           class="default-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="banner-image">
                                    <div class="circle"></div>
                                    <img src="{{asset('images/'.$rs->image)}}"
                                         style="height: 575px; width:375px; border-radius: 900px "
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
                    <img src="{{asset('assets')}}/home/assets/img/categories/img1.jpg" alt="image">

                    <div class="content text-white">
                        <span>Don’t Miss Today</span>
                        <h3>50% OFF</h3>
                        <a href="products-left-sidebar-3.html" class="default-btn">Discover Now</a>
                    </div>
                    <a href="products-left-sidebar-3.html" class="link-btn"></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-categories-box">
                    <img src="{{asset('assets')}}/home/assets/img/categories/img2.jpg" alt="image">

                    <div class="content">
                        <span>New Collection</span>
                        <h3>Need Now</h3>
                        <a href="products-left-sidebar-3.html" class="default-btn">Discover Now</a>
                    </div>
                    <a href="products-left-sidebar-3.html" class="link-btn"></a>
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
            <span class="sub-title">See Our Collection</span>
            <h2>En Yeniler</h2>
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
                                            <a href="#">
                                                <i class='bx bx-heart'></i>
                                                <span class="tooltip-label">Add to Wishlist</span>
                                            </a>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="quick-view-btn">
                                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                <i class='bx bx-search-alt'></i>
                                                <span class="tooltip-label">Quick View</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="new-tag">New!</div>
                        </div>

                        <div class="products-content">
                            <span href="" class="category"></span>
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
                                    <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i> @if($countreview>0)
                                        ({{$countreview}} İnceleme)
                                    @endif
                                </div>
                            </div>

                            <div class="price">
                                <span class="old-price">{{$rs->price* 1.2}}₺</span>
                                <span class="new-price">{{$rs->price}}₺</span>
                            </div>
                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                @csrf
                                <input name="quantity" type="hidden" value="1">
                                <button type="submit" class="add-to-cart btn default-btn">Add to Cart</button>
                            </form>
                        </div>

                        <!--düzenle -->
                        {{--                        <span class="products-discount"><span>20% OFF</span></span>--}}
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
                    <h3><a href="products-without-sidebar-3.html">New Collections!</a></h3>
                    <p>Stylist Allison Taylor take on the summer season's trends.</p>
                    <a href="products-without-sidebar-3.html" class="default-btn">Discover Now!</a>
                </div>

                <div class="image">
                    <a href="products-without-sidebar-3.html"><img
                            src="{{asset('assets')}}/home/assets/img/offer/img1.jpg" alt="image"></a>
                </div>
            </div>

            <div class="single-offer-products">
                <div class="content">
                    <h3><a href="products-without-sidebar-3.html">Our Popular Products</a></h3>
                    <p>Stylist Allison Taylor take on the summer season's trends.</p>
                    <a href="products-without-sidebar-3.html" class="default-btn">Discover Now!</a>
                </div>

                <div class="image">
                    <a href="products-without-sidebar-3.html"><img
                            src="{{asset('assets')}}/home/assets/img/offer/img2.jpg" alt="image"></a>
                </div>
            </div>

            <div class="single-offer-products">
                <div class="content">
                    <h3><a href="products-without-sidebar-3.html">Hot Trending Products</a></h3>
                    <p>Stylist Allison Taylor take on the summer season's trends.</p>
                    <a href="products-without-sidebar-3.html" class="default-btn">Discover Now!</a>
                </div>

                <div class="image">
                    <a href="products-without-sidebar-3.html"><img
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
                    <span class="sub-title">See Our Collection</span>
                    <h2>Recent Products</h2>
                    <a href="{{route('allproducts')}}" class="default-btn">Shop More</a>
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
                                                <a href="#">
                                                    <i class='bx bx-heart'></i>
                                                    <span class="tooltip-label">Add to Wishlist</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="quick-view-btn">
                                                <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                    <i class='bx bx-search-alt'></i>
                                                    <span class="tooltip-label">Quick View</span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="products-content">
                                <h3><a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a>
                                </h3>
                                <div class="price">
                                    <span class="old-price">{{$rs->price* 1.2}}₺</span>
                                    <span class="new-price">{{$rs->price}}₺</span>
                                </div>
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
                                            ({{$countreview}} İnceleme)
                                        @endif
                                    </div>
                                </div>
                                <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                    @csrf
                                    <input name="quantity" type="hidden" value="1">
                                    <input type="submit" class="add-to-cart default-btn"
                                           style="background-color: whitesmoke" value="Add to Cart">
                                </form>
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
            <span class="sub-title">See Our Collection</span>
            <h2>Popular Products</h2>
        </div>

        <div class="row">
            @foreach($picked as $rs)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-productsBox">
                        <div class="products-image">
                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                <img style="height: 250px" src="{{asset('images/'.$rs->image)}}" class="main-image"
                                     alt="image">
                                <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                            </a>

                            <div class="products-button">
                                <ul>
                                    <li>
                                        <div class="wishlist-btn">
                                            <a href="#">
                                                <i class='bx bx-heart'></i>
                                                <span class="tooltip-label">Add to Wishlist</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quick-view-btn">
                                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                <i class='bx bx-search-alt'></i>
                                                <span class="tooltip-label">Quick View</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            {{--                            <div class="new-tag">New!</div>--}}

                            <div class="sale-tag">Sale!</div>
                        </div>

                        <div class="products-content">
                            <span class="category"></span>
                            <h3><a href="products-type-3.html">{{$rs->title}}</a></h3>
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
                                        ({{$countreview}} İnceleme)
                                    @endif
                                </div>
                            </div>
                            <div class="price">
                                <span class="old-price">{{$rs->price* 1.2}}₺</span>
                                <span class="new-price">{{$rs->price}}₺</span>
                            </div>
                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                @csrf
                                <input name="quantity" type="hidden" value="1">
                                <button type="submit" class="add-to-cart default-btn">Add to Cart</button>
                            </form>
                        </div>

                        <span class="products-discount">
                            <span> 20% OFF </span>
                        </span>
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

<!-- Start Products Area -->
<section class="products-area pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">See Our Collection</span>
            <h2>Daily Products</h2>
        </div>

        <div class="row">
            @foreach($daily as $rs)
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
                                            <a href="#">
                                                <i class='bx bx-heart'></i>
                                                <span class="tooltip-label">Add to Wishlist</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quick-view-btn">
                                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                <i class='bx bx-search-alt'></i>
                                                <span class="tooltip-label">Quick View</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="products-content">
                            <span class="category"></span>
                            <h3><a href="products-type-3.html">{{$rs->title}}</a></h3>
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
                                        ({{$countreview}} İnceleme)
                                    @endif
                                </div>
                            </div>
                            <div class="price">
                                <span class="old-price">{{$rs->price* 1.2}}₺</span>
                                <span class="new-price">{{$rs->price}}₺</span>
                            </div>
                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                @csrf
                                <input name="quantity" type="hidden" value="1">
                                <button type="submit" class="add-to-cart default-btn">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Products Area -->

<!-- Start Brand Area -->
<div class="brand-area ptb-70">
    <div class="container">
        <div class="section-title">
            <h2>Shop By Brand</h2>
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

<!-- Start Shipping Modal Area -->
<div class="modal fade productsShippingModal" id="productsShippingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            <div class="shipping-content">
                <h3>Shipping</h3>
                <ul>
                    <li>Complimentary ground shipping within 1 to 7 business days</li>
                    <li>In-store collection available within 1 to 7 business days</li>
                    <li>Next-day and Express delivery options also available</li>
                    <li>Purchases are delivered in an orange box tied with a Bolduc ribbon, with the exception of
                        certain items
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


