@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
    $parentCategories=\App\Http\Controllers\HomeController::categorylistall()
@endphp
@extends('layouts.home')

@section('title', 'User Wishlist')
@section('content')
    <style>
        .flex-container {
            position: relative;
            /*display: flex;*/
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 10px;
            width: 250px;
            text-align: center;
            justify-content: center;

        }

        div .wishlist-btn-cart {
            border-style: none;
            border-radius: 100%;
            position: absolute;
            margin-top: 50px;
            bottom: 10px;
            right: 5px;
            width: 100px;
            height: 50px;
            transition-duration: 0.4s;
            cursor: pointer;
            background: pink;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight:bold ;

        }

        div .wishlist-btn-cart:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            color: palevioletred;
        }

        div .wishlist-btn-delete:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            color: #C0C0C8;
        }

        div .wishlist-btn-delete {
            border-radius: 100%;
            position: absolute;
            bottom: 10px;
            left: 5px;
            width: 100px;
            height: 50px;
            background-color: rgba(159, 40, 24, 0.72);
            transition-duration: 0.4s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight:bold ;

        }

        .products-discount{
            background-color: rgba(226,47,30,0.88);
            padding: 6px 12px 6px 12px;
            font-weight:bold ;
            box-shadow: 6px 6px 10px 6px rgba(0, 0, 0, 0.2);
            text-shadow: 2px 2px 5px black;
            letter-spacing: 1px;
            color: wheat;
        }

        @media only screen and (max-device-width: 525px) {
            .flex-container {
                margin-left: 50px;
                width: 250px;
                text-align: center;
                justify-content: center;
            }
        }

        @media only screen and (min-device-width: 750px)and (max-device-width: 1500px) {
            .flex-container {
                margin-left: 25px;
                width: 310px;
                text-align: center;
                justify-content: center;
            }
        }
    </style>
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>My Wish list</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Wish list</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <section class="products-area products-collections-area pt-100 pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div id="products-collections-filter" class="row">
                        @foreach($datalist as $rs)
                            <div class="col-lg-3 col-md-6 col-sm-6 flex-container">
                                <div class="single-products-box">
                                    <div class="products-image">
                                        <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">
                                            @if($rs->product->image!=null)
                                                <img src="{{asset('images/'.$rs->product->image)}}" alt="image">
                                            @endif
                                        </a>

                                    </div><br>
                                    @if($rs->product->is_sale=="Yes")
                                        <span class="products-discount"> <span> {{$rs->product->sale}}% OFF </span></span>
                                    @endif
                                    <div class="products-content">
                                        @foreach($parentCategories as $category)
                                            @if($category->id==$rs->product->category_id)
                                                <span
                                                    style="color: deeppink;  text-transform: capitalize;"><b>{{$category->title}}</b></span>
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

                                                <span class="new-price">{{$rs->product->price}}₺
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            </div>
                                        @else
                                            <div class="price">
                                                <span class="old-price">{{$rs->product->price}}₺</span>
                                                <span class="new-price">{{$rs->product->sale_price}}₺
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="row" style=" margin-top: 70px;">
                                    <form action="{{route('user_shopcart_add',['id'=>$rs->product->id])}}" method="post">
                                        @csrf
                                        <input name="quantity" type="hidden" value="1">
                                        <a href="javascript:void(0);">
                                            <button type="submit" class="wishlist-btn-cart">Add to Cart</button>
                                        </a>
                                    </form>
{{--                                    <a href="#" class=" wishlist-btn-cart">Add to Cart</a>--}}
                                    <a href="{{route('user_wishlist_delete',['id'=>$rs->id])}}"
                                       onclick="return confirm('Delete! Are you sure?')" class="wishlist-btn-delete">
                                        Delete
                                    </a>


                                </div>

                            </div>

                        @endforeach
                    </div>

                    <div class="pagination-area text-center">
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

@endsection
