@php
    $datalist=\App\Http\Controllers\HomeController::topHeaderWishlist();
    $parentCategories=\App\Http\Controllers\HomeController::categorylistall();

@endphp

    <!-- Start Top Header Area -->
<div class="top-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <ul class="header-contact-info">
                    <li>{{$setting->title}}</li>
                    <li>@lang("Call"): <a href="tel:+01321654214">{{$setting->phone}}</a></li>
                    <li>
                        <div class="dropdown language-switcher d-inline-block">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <img src="
                                 @if(Session::get('applocale')=="tr" or config('app.locale')=="tr")
                                 {{asset('assets')}}/home/assets/img/tr-flag1.jpg
                                  @elseif(Session::get('applocale')=="en" or config('app.locale')=="en")
                                  {{asset('assets')}}/home/assets/img/us-flag.jpg
                                  @endif
                                " alt="image">
                                <span>  {{ Config::get('languages')[App::getLocale()] }} <i class='bx bx-chevron-down'></i></span>
                            </button>

                            <div class="dropdown-menu">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', $lang) }}">
                                            <img src="@if($lang=="tr")
                                 {{asset('assets')}}/home/assets/img/tr-flag1.jpg
                                  @elseif($lang=="en")
                                  {{asset('assets')}}/home/assets/img/us-flag.jpg
                                  @endif   " alt="image">
                                            <span>{{$language}}</span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="top-header-discount-info">
                    {{--                    @php--}}
                    {{--                    $today=\Carbon\Carbon::now()->format('M j, Y \a\t g:i a');--}}
                    {{--                    @endphp--}}
                    <p> @auth
                            <b style="color: wheat;
                          text-shadow: 2px 2px 5px lightpink;
                          letter-spacing: 1px;
                          text-transform: capitalize;"
                            >✨ @lang("Welcome") &nbsp; {{\Illuminate\Support\Facades\Auth::user()->name}} ✨</b>
                        @endauth
                        @guest()
                            <b style="color: wheat;
                          text-shadow: 2px 2px 5px lightpink;
                          letter-spacing: 1px;
                          text-transform: capitalize;"
                            >@lang("Welcome") &nbsp; 🤎@lang("Coffee Time")🤎</b>
                        @endguest
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <ul class="header-top-menu">
                    @auth
                        <li><a href="{{route('user_orders')}}"><i
                                    class='bx bx-user'></i>@lang("My Account")</a></li>
                        <li><a href="{{route('logoutt')}}"><i class='bx bx-log-out'></i>@lang("Logout") </a></li>
                    @endauth
                    @guest()
                        <li><a href="{{route('adminlogin')}}"><i class='bx bx-log-in'></i> @lang("Login")</a></li>
                        <li><a href="/register"><i class='bx bxs-user-plus'></i> @lang("Register")</a></li>
                    @endguest
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal"><i
                                class='bx bx-heart'></i> @lang("Wishlist")
                            ({{\App\Http\Controllers\WishlistController::count_wishlist()}})</a></li>
                </ul>
                <ul class="header-top-others-option">
                    <div class="option-item">
                        <div class="search-btn-box">
                            <i class="search-btn bx bx-search-alt"></i>
                        </div>
                    </div>
                    <div class="option-item">
                        <div class="cart-btn">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i
                                    class='bx bx-shopping-bag'></i><span>{{\App\Http\Controllers\ShopCartController::countshopcart()}}</span></a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Top Header Area -->

<!-- Start Wishlist Modal -->
<div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            @php
                $count_wishlist=\App\Http\Controllers\WishlistController::count_wishlist();
            @endphp
            <div class="modal-body">
                <h3>@lang("Favoriler") ({{$count_wishlist}})</h3>
                <div class="products-cart-content">
                    @if($count_wishlist!=0)
                        @foreach($datalist as $rs)
                            <div class="products-cart">
                                <div class="products-image">
                                    @if($rs->product->image!=null)
                                        <img src="{{asset('images/'.$rs->product->image)}}"
                                             style="height: 50px; max-width: 100%" alt="">
                                    @endif
                                </div>
                                <div class="products-content">
                                    <h3>
                                        <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">
                                            {{$rs->product->title}}</a>
                                    </h3>
                                    @foreach($parentCategories as $category)
                                        @if($category->id==$rs->product->category_id)
                                            <span class="category">{{$category->title}}</span>
                                        @endif
                                    @endforeach
                                    <div class="products-price">
                                        @if($rs->product->sale_price==null)
                                            <span class="price"> {{$rs->product->price}}₺</span>
                                        @else
                                            <span class="price"> {{$rs->product->sale_price}}₺</span>
                                        @endif
                                    </div>
                                    <a href="{{route('user_wishlist_delete',['id'=>$rs->id])}}" onclick="return confirm('{{ __('Delete! Are you sure?') }}')"  class="remove-btn"><i
                                            class='bx bx-trash'></i></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="products-cart-btn">
                            <a href="{{route('user_wishlist')}}" class="optional-btn">@lang("All My Wishlist")</a>
                        </div>
                    @else
                        <div style="text-align: center"><br><br>
                            <i class="bx bx-heart fs-1"></i><br><br>
                            <h6>@lang("Listede ürün bulunmamaktadır. Lütfen favori ürünlerinizi listeye ekleyin.")</h6><br>
                            <a href="{{route('discount_products')}}" class="btn btn-danger">@lang("İndirim Fırsatı")</a>
                        </div><br>
                        <div class="products-cart-btn">
                            <a href="{{route('allproducts')}}" class="btn default-btn">@lang("Start Shopping")</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Wishlist Modal -->

