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
                    <aside class="widget-area">
                        <section class="widget widget_search">
                            <form class="search-form" action="{{route('getproduct')}}" method="post">
                                @csrf

                                <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    @livewire('searchproduct')

                                </label>
                                <button type="submit"><i class="bx bx-search-alt"></i></button>
                            </form>
                            @section('footerjs')
                                @livewireScripts
                            @endsection
                        </section>
                        <section class="widget widget_categories">
                            <div class="woocommerce-widget price-list-widget">
                                <h3 class="widget-title">Price</h3>

                                <div class="collection-filter-by-price">
                                    <input class="js-range-of-price" type="text" data-min="0" data-max="1055"
                                           name="filter_by_price" data-step="10">
                                </div>
                            </div>
                        </section>
                        <br>
                        <section class="widget widget_categories">
                            <a href="{{route('allproducts')}}"><h3 class="widget-title">Categories</h3></a>

                            <ul>
                                @foreach($parentCategories as $rs)
                                    <ul>
                                        <li>{{$rs->title}}
                                            <ul>
                                                @foreach($rs->children as $childCategory )
                                                    @include('home.categorytreeproduct',['childCategory'=>$childCategory])
                                                @endforeach
                                            </ul>
                                        </li>

                                    </ul>
                                @endforeach
                            </ul>
                        </section>

                        <section class="widget widget_tag_cloud">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                @foreach($datalist as $rs)
                                    <a href="#">{{$rs->keywords}} <span class="tag-link-count"></span></a>
                                @endforeach
                            </div>
                        </section>

                        <section class="widget widget_contact">
                            <div class="text">
                                <div class="icon">
                                    <i class='bx bx-mail-send'></i>
                                </div>
                                <span>Emergency</span>
                                <a href="mailto:hello@xton.com">{{$setting->email}}</a>
                            </div>
                        </section>
                    </aside>
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
                                Showing {{($datalist->currentpage()-1)* $datalist->perpage()+1}}
                                to {{(($datalist->currentpage()-1)*$datalist->perpage())+$datalist->count()}}
                                of {{$datalist->total()}} entries
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
                                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                                <img style="height: 200px; width: 200px"
                                                     src="{{asset('images/'.$rs->image)}}" class="main-image"
                                                     alt="image">
                                                <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                                            </a>
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
                                        @if($rs->is_sale=="Yes")
                                            <div class="sale-tag">Sale!</div>
                                        @else
                                            @foreach($last as $data)
                                                @if($rs->id==$data->id)
                                                    <div class="new-tag">New!</div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="products-content">
                                        <h3><a href="#">{{$rs->title}}</a></h3>
                                        @if($rs->sale_price==null)
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
                                                <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i>({{$countreview}}
                                                )
                                            </div>
                                        </div>
                                        <br>
                                        <div class="btn-box">
                                            <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                                @csrf
                                                <input name="quantity" type="hidden" value="1">
                                                <input type="submit" class="add-to-cart default-btn" style="background-color: #ff87af" value="Add to Cart">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <!-- Single Product End-->
                    <div class="d-flex justify-content-center">
                        {!! $datalist->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Products Area -->
@endsection
