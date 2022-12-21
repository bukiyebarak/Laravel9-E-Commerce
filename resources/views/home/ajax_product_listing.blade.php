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
                                            <span class="tooltip-label">Add to Wishlist</span>
                                            <button type="submit" class='heartbtn bx bx-heart'></button>
                                        </a>
                                    </form>
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
                                ({{$countreview}} İnceleme)
                            @endif
                        </div>
                    </div>
                    <form action="{{route('user_shopcart_add',['id'=>$rs->id])}}" method="post">
                        @csrf
                        <input name="quantity" type="hidden" value="1">
                        <input type="submit" class="add-to-cart default-btn"
                               style="background-color: whitesmoke" value="Add to Cart">
                    </form>
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
