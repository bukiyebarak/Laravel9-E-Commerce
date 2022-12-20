@auth
<div class="col-lg-2 col-md-12">
    <h1 style="text-align:center; font-size:30px; background-color: #ff87af"><b>USER PANEL</b></h1> <br>
    <div class="list-group list-group-flush ">
        <a href="{{route('myprofile')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My
                Profile</b> <i
                class='bx bx-user-circle fs-5'></i></a>
        <a href="{{route('user_orders')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My
                Orders</b>
            <i class='bx bx-cart-alt fs-5'></i></a>
        <a href="{{route('myreviews')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My
                Reviews</b>
            <i class='bx bx-comment-check fs-5'></i></a>
        <a href="{{route('user_shopcart')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My
                ShopCart</b>
            <i class='bx bx-credit-card fs-5'></i></a>
        <a href="{{route('user_wishlist')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My
                Wishlist</b>
            <i class='bx bx-heart fs-5'></i></a>
{{--        <a href="{{route('user_products')}}"--}}
{{--           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My--}}
{{--                Product</b>--}}
{{--            <i class='bx bxs-shopping-bag-alt fs-5'></i></a>--}}

        @php
            $userRoles = \Illuminate\Support\Facades\Auth::user()->roles->pluck('name');
        @endphp

        @if($userRoles->contains('admin'))
            <a href="{{route('adminhome')}}"
               class="list-group-item d-flex justify-content-between align-items-center bg-transparent" target="_blank"><b>Admin Panel</b> <i
                    class='bx bx-home fs-5'></i></a>
        @endif
        <a href="{{route('logout')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>Logout</b>
            <i
                class='bx bx-log-out fs-5'></i></a>

    </div>
</div>
@endauth
