@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
    $parentCategories=\App\Http\Controllers\HomeController::categorylist()
@endphp

@extends('layouts.home')

@section('title', $data->title. '  Products List')
@section('description')
    {{$data->description}}
@endsection
@section('keywords',$data->keywords)
@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h5>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($data,$data->title) }}</h5>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Ürün Listesi</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Products Area -->
    <section class="products-area products-collections-area pt-100 pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="woocommerce-widget-area">
                        <div class="woocommerce-widget collections-list-widget">
                            <h3 class="woocommerce-widget-title">Ürün Çeşitleri</h3>
                            <ul class="collections-list-row">
                                @foreach($parentCategories as $rs)
                                    <ul class="collections-list-row">
                                        @foreach($rs->children as $childCategory )
                                            @include('home.categorytreeproduct',['childCategory'=>$childCategory])
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>
                        </div>
                        <div class="woocommerce-widget price-list-widget">
                            <h3 class="woocommerce-widget-title">Price</h3>

                            <div class="collection-filter-by-price">
                                <input class="js-range-of-price" type="text" data-min="0" data-max="1055"
                                       name="filter_by_price" data-step="10">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="products-filter-options">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-4">
                                <div class="d-lg-flex d-md-flex align-items-center">
                                    <span class="sub-title d-lg-none"><a href="#" data-bs-toggle="modal"
                                                                         data-bs-target="#productsFilterModal"><i
                                                class='bx bx-filter-alt'></i> Filter</a></span>

                                    <span class="sub-title d-none d-lg-block d-md-block">View:</span>

                                    <div class="view-list-row d-none d-lg-block d-md-block">
                                        <div class="view-column">
                                            <a href="#" class="icon-view-two">
                                                <span></span>
                                                <span></span>
                                            </a>

                                            <a href="#" class="icon-view-three active">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>

                                            <a href="#" class="icon-view-four">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>

                                            <a href="#" class="view-grid-switch">
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <p>Showing 1 – 18 of 100</p>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="products-ordering-list">
                                    <select>
                                        <option>Sort by Price: Low to High</option>
                                        <option>Default Sorting</option>
                                        <option>Sort by Popularity</option>
                                        <option>Sort by Average Rating</option>
                                        <option>Sort by Latest</option>
                                        <option>Sort by Price: High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product Start-->

                    <div id="products-collections-filter" class="row">
                        @foreach($datalist as $rs)
                            <div class="col-lg-4 col-md-6 col-sm-6 products-col-item">
                                <div class="single-products-box">
                                    <div class="products-image">
                                        <a href="#">
                                            <img style="height: 150px" src="{{Storage::url($rs->image)}}"
                                                 class="main-image" alt="image">
                                            <img src="{{Storage::url($rs->image)}}"
                                                 class="hover-image" alt="image">
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
                                                    <div class="compare-btn">
                                                        <a href="#">
                                                            <i class='bx bx-refresh'></i>
                                                            <span class="tooltip-label">Compare</span>
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
                                        <h3><a href="#">{{$rs->title}}</a></h3>
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
                                                <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i>({{$countreview}})
                                            </div>
                                        </div>
                                        <br>
                                        <div class="btn-box">
                                            <a class="add-to-cart" href="{{route('addtocart',['id'=>$rs->id])}}">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Single Product End-->
                    <div class="pagination-area text-center">
                        <a href="#" class="prev page-numbers"><i class='bx bx-chevron-left'></i></a>
                        <span class="page-numbers current" aria-current="page">1</span>
                        <a href="#" class="page-numbers">2</a>
                        <a href="#" class="page-numbers">3</a>
                        <a href="#" class="page-numbers">4</a>
                        <a href="#" class="page-numbers">5</a>
                        <a href="#" class="next page-numbers"><i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Products Area -->
@endsection
