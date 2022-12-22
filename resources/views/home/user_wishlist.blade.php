@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
    $parentCategories=\App\Http\Controllers\HomeController::categorylistall()
@endphp
@extends('layouts.home')

@section('title', 'User Wishlist')
@section('content')
    <style>
        div.wishlist {
            position: relative;
            text-align: center;
            max-width: 60%;
            height: auto;
            padding: 10%;
            background-color: rgba(124,135,151,0.35);
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .wishlist image {
            position: absolute;
            max-width: 100%;
            height: auto;
        }

        .wishlist button {
            position: absolute;
            float: right;
            top: 1%;
            right: 0;
        }
        @media only screen and (max-device-width: 500px) {
            .wishlist image {
                max-width: 100%;
            }
        }
    </style>
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>User Wishlist</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <section class="products-area pt-100 pb-70">
        <div class="container">
            <div class="products-filter-options">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4">
                        <div class="d-lg-flex d-md-flex align-items-center">
                            <span class="sub-title"><a href="#" data-bs-toggle="modal"
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
                            <select class="nice-select">
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

            <div id="products-collections-filter" class="row">
                @foreach($datalist as $rs)
                    <div class="col-lg-4 col-md-6 col-sm-6 products-col-item">
                        <div class="products-box wishlist">
                            <div>
                                <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">
                                    @if($rs->product->image!=null)
                                        <img src="{{asset('images/'.$rs->product->image)}}" alt="image">
                                    @endif
                                </a>

                                <button class="btn clearfix remove"><a
                                        href="{{route('user_wishlist_delete',['id'=>$rs->id])}}"
                                        onclick="return confirm('Delete! Are you sure?')" class="remove"><i
                                            class='bx bx-trash fs-3'></i></a></button>
                                <div class="sale-tag">Sale!</div>
                            </div>
                            <div class="products-content">
                                @foreach($parentCategories as $category)
                                    @if($category->id==$rs->product->category_id)
                                        <span class="category">{{$category->title}}</span>
                                    @endif
                                @endforeach
                                <h3>
                                    <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"> {{$rs->product->title}}</a>
                                </h3>

                                @php
                                    $avgrev=\App\Http\Controllers\HomeController::avrgreview($rs->product->id);
                                    $countreview=\App\Http\Controllers\HomeController::countreview($rs->product->id);
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

                                @if($rs->product->is_sale=="No")
                                    <div class="price">
                                        <span class="new-price">{{$rs->product->price}}₺</span>
                                    </div>
                                @else
                                    <div class="price">
                                        <span class="old-price">{{$rs->product->price}}₺</span>
                                        <span class="new-price">{{$rs->product->sale_price}}₺</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

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
    </section>

@endsection
