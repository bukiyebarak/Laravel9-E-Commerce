@php
    $parentCategories=\App\Http\Controllers\HomeController::categorylist()
@endphp

    <!-- Start Navbar Area -->
<div class="navbar-area">

    <div class="xton-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="" href="{{route('home')}}">
                    <img src="{{asset('assets')}}/home/assets/img/logognc.jpg"  style="height: 70px; width: 90px" class="white-logo" alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">


                        <li class="nav-item megamenu"><a href="{{route('home')}}" class="nav-link">Anasayfa
                            </a>
                        </li>

                        <li class="nav-item megamenu"><a href="#" class="nav-link">Kampanyalar</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Kategoriler <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                @foreach($parentCategories as $rs)
                                    <li class="nav-item"><a href="#" class="nav-link">{{$rs->title}}<i
                                                class='bx bx-chevron-right'></i></a>
                                        <ul class="dropdown-menu">
                                            @foreach($rs->children as $childCategory )
                                                @include('home.categorytree',['childCategory'=>$childCategory])
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item megamenu"><a href="{{route('home')}}" class="nav-link">Yeni Ürünler</a></li>
                        <li class="nav-item megamenu"><a href="{{route('aboutus')}}" class="nav-link">Hakkımızda</a>
                        </li>
                        <li class="nav-item megamenu"><a href="{{route('references')}}" class="nav-link">Referanslar</a>
                        </li>
                        <li class="nav-item megamenu"><a href="{{route('faq')}}" class="nav-link">Sıkça Sorulan
                                Sorular</a></li>
                        <li class="nav-item megamenu"><a href="{{route('contact')}}" class="nav-link">İletişim</a></li>
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
                                        class='bx bx-shopping-bag'></i><span>0</span></a>
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
                <h3>My Cart (3)</h3>

                <div class="products-cart-content">
                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="{{asset('assets')}}/home/assets/img/products/img1.jpg"
                                             alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Long Sleeve Leopard T-Shirt</a></h3>
                            <span>Blue / XS</span>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$250.00</span>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="{{asset('assets')}}/home/assets/img/products/img2.jpg"
                                             alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Causal V-Neck Soft Raglan</a></h3>
                            <span>Blue / XS</span>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$200.00</span>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="{{asset('assets')}}/home/assets/img/products/img3.jpg"
                                             alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Hanes Men's Pullover</a></h3>
                            <span>Blue / XS</span>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$200.00</span>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>
                </div>

                <div class="products-cart-subtotal">
                    <span>Subtotal</span>

                    <span class="subtotal">$524.00</span>
                </div>

                <div class="products-cart-btn">
                    <a href="#" class="default-btn">Proceed to Checkout</a>
                    <a href="#" class="optional-btn">View Shopping Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shopping Cart Modal -->
