@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
    $parentCategories=\App\Http\Controllers\HomeController::categorylist();
@endphp

@extends('layouts.home')

@section('title','All Products' )

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Product Page</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Product Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Blog Area -->
    <section class="blog-area ptb-100">
        <div class="container">
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
                        <!--Filter price -->
                        <section class="widget widget_categories">

                            <div class="woocommerce-widget brands-list-widget">
                                <h3 class="widget-title">Price</h3>

                                <form id="filter_price" name="filter_price">
                                    <div class="collection-filter-by-price" id="price">
                                        <input class="range_slider" type="text"
                                               name="min_price" id="min_price"> <i>-</i>
                                        <input class="range_slider" type="text"
                                               name="max_price" id="max_price">
                                        <button class="btn-default" type="submit" id="btn">Filter</button>
                                    </div>

                                </form>
                                {{--                                <form method="post" action="#">--}}
                                {{--                                    <?php $prices = array('0-100', '100-200', '200-300', '300-400', '400-900') ?>--}}

                                {{--                                    @foreach($prices as $key=>$price)--}}
                                {{--                                        <ul class="brands-list-row">--}}
                                {{--                                           <input type="checkbox" class="form-check-input" id="price{{ $key }}"--}}
                                {{--                                                       name="price[]" value="{{$price}}">--}}
                                {{--                                            <label class="form-label" for="price{{ $key }}"><b>{{$price}}</b></label>--}}
                                {{--                                        </ul>--}}
                                {{--                                    @endforeach--}}
                                {{--                                </form>--}}
                            </div>
                        </section>
                        <br>
                        <section class="widget widget_categories">
                            <a href="{{route('allproducts')}}"><h3 class="widget-title">Categories</h3></a>

                            <ul>
                                @foreach($parentCategories as $rs)
                                    <ul>
                                        <li><a
                                                href="{{route('categoryproducts',['id'=>$rs->id, 'slug'=>$rs->slug])}}"
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
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                @foreach($datalist as $rs)
                                    <a href="javascript:void(0);">{{$rs->keywords}} <span class="tag-link-count"></span></a>
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
                                            <a href="#" class="icon-view-one">
                                                <span></span>
                                            </a>

                                            <a href="#" class="icon-view-two active">
                                                <span></span>
                                                <span></span>
                                            </a>

                                            <a href="#" class="icon-view-three">
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
                                <div>
                                    Showing {{($datalist->currentpage()-1)* $datalist->perpage()+1}}
                                    to {{(($datalist->currentpage()-1)*$datalist->perpage())+$datalist->count()}}
                                    of {{$datalist->total()}} entries
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <form name="sortproducts" id="sortProducts">
                                    <input type="hidden" name="url" id="url" value="{{$url}}">
                                    <input hidden name="min_price" id="min_price" value="{{$min_price}}">
                                    <input hidden name="max_price" id="max_price" value="{{$max_price}}">
                                    <div class="products-ordering-list">
                                        <select name="sort" id="sort">
                                            <option selected value="">Default Sorting</option>
                                            <option value="product_lastest"
                                                    @if(isset($_GET['sort']) && $_GET['sort']=="product_lastest") selected @endif>
                                                Sort by: Latest
                                            </option>
                                            <option value="price_lowest"
                                                    @if(isset($_GET['sort']) && $_GET['sort']=="price_lowest") selected @endif>
                                                Sort by Price: Low to High
                                            </option>
                                            <option value="price_highest"
                                                    @if(isset($_GET['sort']) && $_GET['sort']=="price_highest") selected @endif>
                                                Sort by Price: High to Low
                                            </option>
                                            <option value="name_z_a"
                                                    @if(isset($_GET['sort']) && $_GET['sort']=="name_z_a") selected @endif>
                                                Sort by Name: Name Z-A
                                            </option>
                                            <option value="name_a_z"
                                                    @if(isset($_GET['sort']) && $_GET['sort']=="name_a_z") selected @endif>
                                                Sort by Name: Name A-Z
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="filter_products">
                        @include('home.ajax_product_listing')
                    </div>

                    <br>

                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->
@endsection
