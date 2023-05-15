<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets')}}/admin/assets/images/logognc.jpg"  style="height: 50px; width: 50px"  class="logo-icon" alt="logo icon">
        </div>
        <div>
            <a href="{{route('adminhome')}}" class="logo-text">Reaktif Tek.</a>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">@lang("CATEGORY & PRODUCTS")</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-layer' ></i>
                </div>
                <div class="menu-title">@lang("Category")</div>
            </a>
            <ul>
                <li> <a href="{{route('admin_category')}}"><i class="bx bx-right-arrow-alt"></i>@lang("Category")</a>
                </li>
                <li> <a href="{{route('admin_category_paket')}}"><i class="bx bx-right-arrow-alt"></i>@lang("Category Paket")</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cart-alt"></i>
                </div>
                <div class="menu-title">@lang("Products")</div>
            </a>
            <ul>
                <li> <a href="{{route('admin_products')}}"><i class="bx bx-right-arrow-alt"></i>@lang("Products")</a>
                </li>
                <li> <a href="{{route('admin_paket_products')}}"><i class="bx bx-right-arrow-alt"></i>@lang("Products Paket")</a>
                </li>

            </ul>
        </li>

        <li class="menu-label">@lang("ORDERS INFORMATION")</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bxs-shopping-bags' ></i>
                </div>
                <div class="menu-title">@lang("ORDERS")</div>
            </a>
            <ul>
                <li> <a href="{{route('admin_orders')}}"><i class="bx bx-right-arrow-alt"></i>@lang("All Orders")</a>
                </li>
                <li> <a href="{{route('admin_order_list',['status'=>'new'])}}"><i class="bx bx-right-arrow-alt"></i>@lang("New Orders")</a>
                </li>
                <li> <a href="{{route('admin_order_list',['status'=>'accepted'])}}"><i class="bx bx-right-arrow-alt"></i>@lang("Accepted Orders")</a>
                </li>
                <li> <a href="{{route('admin_order_list',['status'=>'canceled'])}}"><i class="bx bx-right-arrow-alt"></i>@lang("Canceled Orders")</a>
                </li>
                <li> <a href="{{route('admin_order_list',['status'=>'shipping'])}}"><i class="bx bx-right-arrow-alt"></i>@lang("Shipping Orders")</a>
                </li>
                <li> <a href="{{route('admin_order_list',['status'=>'completed'])}}"><i class="bx bx-right-arrow-alt"></i>@lang("Completed Orders")</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">@lang("MESSAGES")</li>
        <li>
            <a href="{{route('admin_messages')}}">
                <div class="parent-icon"><i class="bx bx-message-detail"></i>
                </div>
                &nbsp; @lang("Contact Messages")
            </a>
        </li>

        <li class="menu-label">@lang("REVİEWS")</li>
        <li>
            <a href="{{route('admin_review')}}">
                <div class="parent-icon"><i class="bx bx-comment-check"></i>
                </div>
                &nbsp;@lang("Reviews")
            </a>
        </li>

        <li class="menu-label">@lang("FAQS")</li>
        <li>
            <a href="{{route('admin_faq')}}">
                <div class="parent-icon"><i class="bx bx-question-mark"></i>
                </div>
                &nbsp;@lang("Faqs")
            </a>
        </li>

        <li class="menu-label">@lang("USERS")</li>
        <li>
            <a href="{{route('admin_users')}}">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                &nbsp;@lang("Users")
            </a>
        </li>

        <li class="menu-label">@lang("DİL AYARLARI")</li>
        <li>
            <a href="/languages" target="_blank">
                <div class="parent-icon"><i class="bx bx-world"></i>
                </div>
                &nbsp; @lang("Dil Ayarları")
            </a>
        </li>
        <li class="menu-label">@lang("SETTINGS")</li>
        <li>
            <a href="{{route('admin_setting')}}">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                &nbsp; @lang("Settings")
            </a>
        </li>
        <br><br><br><br><br><br>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
