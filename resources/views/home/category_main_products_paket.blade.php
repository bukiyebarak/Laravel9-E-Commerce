@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
    $parentCategoriesdata=\App\Http\Controllers\HomeController::categorylist();
    $parentCategories=\App\Http\Controllers\HomeController::categorylistall()
@endphp
@extends('layouts.home')
@section('title',__("Package Products"))
@section('content')
    <style>
        .heartbtn {
            border-style: none;
            background-color: inherit;
        }

    </style>
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h5>Package Products</h5>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("Ürün Listesi")</li>
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
                                    <span class="screen-reader-text">@lang("Search for"):</span>
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
                                <h3 class="widget-title">@lang("Price")</h3>
                                <div class="collection-filter-by-price">
                                    <input class="js-range-of-price" type="text" data-min="0" data-max="1055"
                                           name="filter_by_price" data-step="10">
                                </div>
                            </div>
                        </section>
                        <br>
                        <section class="widget widget_categories">
                            <a href="{{route('allproducts')}}"><h3 class="widget-title">@lang("Kategoriler")</h3></a>
                            <ul>
                                @foreach($parentCategoriesdata as $rs)
                                    <ul>
                                        <li><a
                                                href="{{route('main_category_products',['id'=>$rs->id, 'slug'=>$rs->slug])}}"
                                            >{{$rs->title}}<i
                                                ></i></a>
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
                            <h3 class="widget-title">@lang("Etiketler")</h3>
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
                                <span>@lang("Acil")</span>
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
                                                class='bx bx-filter-alt'></i> @lang("Filter")</a></span>
                                    <span class="sub-title d-none d-lg-block d-md-block">@lang("View"):</span>
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
                            </div>
                            <div class="col-lg-4 col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- Single Product Start-->
                    <div id="products-collections-filter" class="row">
                        @foreach($datalist as $rs)
                            <div class="col-lg-4 col-md-6 col-sm-6 products-col-item"
                                 style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2);
                                  margin: 10px 30px 10px 5px; padding-top: 15px;
                                  width: 260px;">
                                <div class="single-products-box">
                                    <div class="products-image">
                                        <a href="#">
                                            <a href="javascript:void(0);">
                                                <img style="height: 200px; width: 200px"
                                                     src="{{asset('images/'.$rs->image)}}" class="main-image"
                                                     alt="image">
                                                <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                                            </a>
                                        </a>
                                        <div class="products-button">
                                            <ul>
                                                <li>
                                                    <div class="quick-view-btn">
                                                        <a href="{{route('paket_product',['id'=>$rs->paket_category->id,'slug'=>$rs->paket_category->slug])}}">
                                                            <i class='bx bx-search-alt'></i>
                                                            <span class="tooltip-label">@lang("Quick View")</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="products-content">
                                        <h3>
                                            <a href="{{route('paket_product',['id'=>$rs->paket_category->id,'slug'=>$rs->paket_category->slug])}}">
                                                {{$rs->title}}</a></h3>
                                        <a href="{{route('paket_product',['id'=>$rs->paket_category->id,'slug'=>$rs->paket_category->slug])}}"
                                        class="btn default-btn" style="margin: 15px 10px 0 40px; ">
                                            @lang("Seçenekleri Seçin ")</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <!-- Single Product End-->
                    <div class="d-flex justify-content-center">
                        @if(isset($_GET['sort1']))
                            {!! $datalist->appends(['sort1'=>$_GET['sort1']])->links() !!}
                        @else
                            {!! $datalist->links() !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Products Area -->
@endsection
