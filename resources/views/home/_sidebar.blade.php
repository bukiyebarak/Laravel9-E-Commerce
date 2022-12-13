@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
    $datalist=\App\Http\Controllers\HomeController::sidebar()
@endphp
<!-- Start Sidebar Modal -->
<div class="modal right fade sidebarModal" id="sidebarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            <div class="modal-body">
                <div class="sidebar-about-content">
                    <h3>About The Store</h3>

                    <div class="about-the-store">
                        <p>One of the most popular on the web is shopping. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        <ul class="sidebar-contact-info">
                            <li><i class='bx bx-map'></i> <a href="#" target="_blank">{{$setting->address}}</a></li>
                            <li><i class='bx bx-phone-call'></i> <a href="tel:+01321654214">{{$setting->phone}}</a></li>
                            <li><i class='bx bx-envelope'></i> <a href="mailto:hello@xton.com">{{$setting->email}}</a></li>
                        </ul>
                    </div>

                    <ul class="social-link">
                        @if($setting->facebook !=null)
                            <li><a href="{{$setting->facebook}}" class="d-block" target="_blank"><i
                                        class='bx bxl-facebook'></i></a></li>
                        @endif
                        @if($setting->twitter !=null)
                            <li><a href="{{$setting->twitter}}" class="d-block" target="_blank"><i
                                        class='bx bxl-twitter'></i></a></li>
                        @endif
                        @if($setting->instagram !=null)
                            <li><a href="{{$setting->instagram}}" class="d-block" target="_blank"><i
                                        class='bx bxl-instagram'></i></a></li>
                        @endif
                        @if($setting->linkedin !=null)
                            <li><a href="{{$setting->linkedin}}" class="d-block" target="_blank"><i
                                        class='bx bxl-linkedin'></i></a></li>
                        @endif
                    </ul>
                </div>

                <div class="sidebar-new-in-store">
                    <h3>New In Store</h3>

                    <ul class="products-list">
                        @foreach($datalist as $rs)
                        <li>
                            <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}">
                                <img src="{{asset('images/'.$rs->image)}}" class="hover-image" alt="image">
                            </a>
                        </li>
                        @endforeach

                    </ul>

                    <p>Bu fırsat kaçmaz yeni ürünler yeni indirimler...</p>
                    <a href="{{route('discount_products')}}" class="shop-now-btn">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Modal -->
