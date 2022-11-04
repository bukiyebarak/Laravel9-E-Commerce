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
        <li class="menu-label">CATEGORY & PRODUCTS</li>
        <li>
            <a href="{{route('admin_category')}}">
                <div class="parent-icon"><i class='bx bx-layer'></i>
                </div>
                &nbsp;Category
            </a>
        </li>
        <br>
        <li>
            <a href="{{route('admin_products')}}">
                <div class="parent-icon"><i class="bx bx-cart-alt"></i>
                </div>
                &nbsp;Products
            </a>
        </li>
        <li class="menu-label">MESSAGES</li>
        <li>
            <a href="{{route('admin_messages')}}">
                <div class="parent-icon"><i class="bx bx-message-detail"></i>
                </div>
                &nbsp; Contact Messages
            </a>
        </li>
        <li class="menu-label">REVİEWS</li>
        <li>
            <a href="{{route('admin_review')}}">
                <div class="parent-icon"><i class="bx bx-comment-check"></i>
                </div>
                Reviews
            </a>
        </li>
        <li class="menu-label">FAQS</li>
        <li>
            <a href="{{route('admin_faq')}}">
                <div class="parent-icon"><i class="bx bx-question-mark"></i>
                </div>
                Faqs
            </a>
        </li>
        <li class="menu-label">SETTINGS</li>
        <li>
            <a href="{{route('admin_setting')}}">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                &nbsp; Settings
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
