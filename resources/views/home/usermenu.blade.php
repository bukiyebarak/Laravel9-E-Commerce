<style>
    .profile{
        text-align:center;
        font-size:30px;
        background-color: grey;
        border-radius: 50%;
        margin: 0 15px 10px 40px;
        height:100px;
        width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight:bold ;
    }
    .profile-name{
        text-align:center;
        margin: 0 15px 15px 40px;
        height:10px;
        width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight:bold ;
    }
</style>

@auth
<div class="col-lg-2 col-md-12">
    <div class="profile"><i class=" bx bx-user"></i>
    </div>
    <div class="profile-name">
        <p style="text-transform: capitalize;">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->surname}}</p>
    </div>
    <div class="profile-name">
        <p>{{\Illuminate\Support\Facades\Auth::user()->email}} </p>
    </div>
    <div class="list-group list-group-flush ">
        <a href="{{route('myprofile')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent text-danger"><b>My
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
