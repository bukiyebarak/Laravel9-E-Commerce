@php
$parentCategoriess=\App\Http\Controllers\HomeController::categorylistall();
@endphp
<style>
    .heartbtn {
        border-style: none;
        background-color: inherit;
    }

</style>
<div id="products-collections-filter" class="row">
    @foreach($datalist as $rs)
        <div class="col-lg-4 col-md-4 col-sm-4 products-col-item">
            <div class="single-products-box">
                <div class="products-image">
                    <a href="#">
                        <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                            <img style="height: 200px; width: 200px"
                                 src="{{asset('images/'.$rs->image)}}" class="main-image"
                                 alt="image">
                            <img src="{{asset('images/'.$rs->image)}}" class="hover-image"
                                 alt="image">
                        </a>
                    </a>

                    <div class="products-button">
                        <ul>
                            <li>
                                <div class="wishlist-btn">
                                    <form action="{{route('user_wishlist_add',['id'=>$rs->id])}}" method="post">
                                        @csrf
                                        <a href="javascript:void(0);">
                                            <span class="tooltip-label">@lang("Add to Wishlist")</span>
                                            <button type="submit" class='heartbtn bx bx-heart'></button>
                                        </a>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="quick-view-btn">
                                    <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                        <i class='bx bx-search-alt'></i>
                                        <span class="tooltip-label">@lang("Quick View")</span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="compare-btn">
                                    <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                                        @csrf
                                        <input name="quantity" type="hidden" value="1">
                                        <a href="javascript:void(0);">
                                            <span class="tooltip-label">@lang("Add to Cart")</span>
                                            <button type="submit" class="heartbtn bx bx-cart"></button>
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @if($rs->is_sale=="Yes")
                        <div class="sale-tag" style="font-size: 11px">@lang("Sale")!</div>
                    @else
                        @foreach($last as $data)
                            @if($rs->id==$data->id)
                                <div class="new-tag">@lang("New")!</div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="products-content">
                    @foreach($parentCategoriess as $category)
                        @if($category->id==$rs->category_id)
                            <span class="category" style="font-weight: bold;color: deeppink">{{$category->title}}</span>
                        @endif
                    @endforeach
                    <h3>
                        <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a>
                    </h3>
                    @if($rs->is_sale=="No")
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
                            <i class="bx bx-star @if($avgrev>=5) bx bxs-star @endif "></i>@if($countreview>0)
                                ({{$countreview}} @lang("İnceleme") )
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<br>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
    @if(isset($data['sort']))
        {!! $datalist->appends(['sort'=>$data['sort']])->links() !!}
    @elseif(isset($_GET['sort']))
        {!! $datalist->appends(['sort'=>$_GET['sort']])->links() !!}
    @else
        {!! $datalist->links() !!}
    @endif
</div>
