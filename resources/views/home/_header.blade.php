@php
    $parentCategories=\App\Http\Controllers\HomeController::categorylist();
 $shopcart=\App\Http\Controllers\HomeController::headerShopCart();
   $parentPaketCategories=\App\Http\Controllers\HomeController::paket_category_list();
@endphp

    <!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="xton-responsive-nav">
        <div class="container">
            <div class="xton-responsive-menu">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('assets')}}/home/assets/img/logognc.jpg" height="50" width="50"
                             class="main-logo" alt="logo">
                        <img src="{{asset('assets')}}/home/assets/img/logognc.jpg" height="50" width="50"
                             class="white-logo" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @php
        $routeName = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp
    <div class="xton-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="" href="{{route('home')}}">
                    <img src="{{asset('assets')}}/home/assets/img/logognc.jpg" style="height: 70px; width: 90px"
                         class="white-logo" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item megamenu"><a href="{{route('home')}}" class="nav-link"  @if($routeName == 'home') style="color: deeppink" @endif >@lang("Anasayfa")
                            </a>
                        </li>
                        <li class="nav-item megamenu"><a href="{{route('discount_products')}}" class="nav-link" @if($routeName == 'discount_products') style="color: deeppink" @endif >@lang("Kampanyalar")</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">@lang("Kategoriler") <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a
                                        href="{{route('allproducts')}}" @if($routeName == 'allproducts') style="color: deeppink" @endif
                                    class="nav-link">@lang("Tüm Ürünler")</a>
                                </li>
                                <li class="nav-item"><a @if($routeName == 'main_category_products_paket') style="color: deeppink" @endif
                                    href="{{route('main_category_products_paket')}}"
                                        class="nav-link">@lang("Paket")<i
                                            class='bx bx-chevron-left'></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach($parentPaketCategories as $rs)
                                            @include('home.categorytreepaket',['rs'=>$rs])
                                        @endforeach
                                    </ul>
                                </li>

                                @foreach($parentCategories as $rs)
                                    <li class="nav-item"><a
                                            href="{{route('main_category_products',['id'=>$rs->id, 'slug'=>$rs->slug])}}"
                                            class="nav-link">{{$rs->title}}<i
                                                class='bx bx-chevron-left'></i></a>
                                        <ul class="dropdown-menu">
                                            @foreach($rs->children as $childCategory )
                                                @include('home.categorytree',['childCategory'=>$childCategory])
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item megamenu"><a href="{{route('new_products')}}" @if($routeName == 'new_products') style="color: deeppink" @endif  class="nav-link">@lang("Yeni Ürünler") </a></li>
                        <li class="nav-item megamenu"><a href="{{route('aboutus')}}" @if($routeName == 'aboutus') style="color: deeppink" @endif class="nav-link">@lang("Hakkımızda")</a>
                        </li>
                        <li class="nav-item megamenu"><a href="{{route('references')}}" @if($routeName == 'references') style="color: deeppink" @endif  class="nav-link">@lang("Referanslar")</a>
                        </li>
                        <li class="nav-item megamenu"><a href="{{route('faq')}}" @if($routeName == 'faq') style="color: deeppink" @endif  class="nav-link">@lang("Sıkça Sorulan Sorular")  </a></li>
                        <li class="nav-item megamenu"><a href="{{route('contact')}}" @if($routeName == 'contact') style="color: deeppink" @endif class="nav-link">@lang("İletişim")</a></li>
                    </ul>
                    <div class="others-option">
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
                        <div class="option-item">
                            <div class="burger-menu" data-bs-toggle="modal" data-bs-target="#sidebarModal">
                                <span class="top-bar"></span>
                                <span class="middle-bar"></span>
                                <span class="bottom-bar"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
<!-- Start Sticky Navbar Area -->
<div class="navbar-area header-sticky">
    <div class="xton-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('assets')}}/home/assets/img/logognc.jpg" style="height: 70px; width: 90px"
                         class="white-logo" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <ul class="navbar-nav">
                            <li class="nav-item megamenu" ><a href="{{route('home')}}"  class="nav-link ">@lang("Anasayfa")
                                </a>
                            </li>
                            <li class="nav-item megamenu"><a href="{{route('discount_products')}}" class="nav-link">@lang("Kampanyalar")</a>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">@lang("Kategoriler") <i
                                        class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a
                                            href="{{route('allproducts')}}"
                                            class="nav-link">@lang("Tüm Ürünler") </a>
                                    </li>
                                    <li class="nav-item"><a
                                            href="{{route('main_category_products_paket')}}"
                                            class="nav-link">@lang("Paket")<i
                                                class='bx bx-chevron-left'></i></a>
                                        <ul class="dropdown-menu">
                                            @foreach($parentPaketCategories as $rs)
                                                @include('home.categorytreepaket',['rs'=>$rs])
                                            @endforeach
                                        </ul>
                                    </li>

                                    @foreach($parentCategories as $rs)
                                        <li class="nav-item">
                                            <a href="{{route('main_category_products',['id'=>$rs->id, 'slug'=>$rs->slug])}}"
                                               class="nav-link">{{$rs->title}}<i
                                                    class='bx bx-chevron-left'></i></a>
                                            <ul class="dropdown-menu">
                                                @foreach($rs->children as $childCategory )
                                                    @include('home.categorytree',['childCategory'=>$childCategory])
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item megamenu"><a href="{{route('new_products')}}" class="nav-link">@lang("Yeni Ürünler") </a>
                            </li>
                            <li class="nav-item megamenu"><a href="{{route('aboutus')}}" class="nav-link">@lang("Hakkımızda")</a>
                            </li>
                            <li class="nav-item megamenu"><a href="{{route('references')}}" class="nav-link">@lang("Referanslar")</a>
                            </li>
                            <li class="nav-item megamenu"><a href="{{route('faq')}}" class="nav-link">@lang("Sıkça Sorulan Sorular")  </a></li>
                            <li class="nav-item megamenu"><a href="{{route('contact')}}" class="nav-link">@lang("İletişim")</a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Header Area -->
<!-- Start Search Overlay -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>

            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>
            <div class="search-overlay-form">
                <form action="{{route('getproduct')}}" method="post">
                    @csrf
                    @livewire('search')

                    <button type="submit"><i class='bx bx-search-alt'></i></button>
                </form>

                @section('footerjs')

                    @livewireScripts

                @endsection
            </div>
        </div>
    </div>
</div>
<!-- End Search Overlay -->
<!-- Start Shopping Cart Modal -->
<div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>
            <div class="modal-body">
                <h3>@lang("My Cart") ({{\App\Http\Controllers\ShopCartController::countshopcart()}})</h3>
                @php
                    $total=0;
                @endphp
                @foreach($shopcart as $rs)
                    <div class="products-cart-content">
                        <div class="products-cart">
                            <div class="products-image">
                                @if($rs->product->image!=null)
                                    <img src="{{asset('images/'.$rs->product->image)}}"
                                         style="height: 50px; max-width: 100%" alt="">
                                @endif
                            </div>
                            <div class="products-content">
                                <h3>
                                    <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"> {{$rs->product->title}}</a>
                                </h3>
                                <div class="products-price">
                                    <span>{{$rs->quantity}}</span>
                                    <span>x</span>
                                    @if($rs->product->sale_price==null)
                                        <span class="price"> {{$rs->product->price}}€</span>
                                    @else
                                        <span class="price"> {{$rs->product->sale_price}}€</span>
                                    @endif
                                </div>
                                <a href="{{route('user_shopcart_delete',['id'=>$rs->id])}}"
                                   onclick="return confirm('{{ __('Delete! Are you sure?') }}')" class="remove-btn"><i
                                        class='bx bx-trash'></i></a>
                            </div>
                        </div>
                    </div>
                    @php
                        if($rs->product->sale_price==null)
                          $total += $rs->product->price * $rs->quantity;
                        else
                            $total += $rs->product->sale_price * $rs->quantity;
                    @endphp

                @endforeach
                @if($total!=0)
                    <div class="products-cart-subtotal">
                        <span>@lang("Ara Toplam")</span>
                        <span class="subtotal">{{$total}}€</span>
                    </div>
                    <div class="products-cart-btn">
                        <form action="{{route('user_order_add')}}" method="post">
                            @csrf
                            <input type="hidden" name="total" value="{{$total}}">
                            <button type="submit" class="default-btn">@lang("Proceed to Checkout")</button>
                        </form>
                        <a href="{{route('user_shopcart')}}" class="optional-btn">@lang("View Shopping Cart")</a>
                    </div>
                @else
                    <div style="text-align: center"><br><br>
                        <i class="bx bx-cart fs-1"></i><br><br>
                        <h6>@lang("Sepetinizde ürün bulunmamaktadır. Lütfen sepetinize ürün ekleyin.")</h6><br>
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
<!-- End Shopping Cart Modal -->
{{--<script src="{{asset('assets')}}/home/assets/js/jquery.min.js"></script>--}}
