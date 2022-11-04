<div class="col-lg-3 col-md-12">
    <h1 style="text-align:center; font-size:30px; background-color:darkgray"><b>USER PANEL</b></h1> <br>
    <div class="list-group list-group-flush ">
        <a href="{{route('myprofile')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My
                Profile</b> <i
                class='bx bx-user-circle fs-5'></i></a>
        <a href="#"
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
{{--        <a href="{{route('user_products')}}"--}}
{{--           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>My--}}
{{--                Product</b>--}}
{{--            <i class='bx bxs-shopping-bag-alt fs-5'></i></a>--}}
        <a href="{{route('logout')}}"
           class="list-group-item d-flex justify-content-between align-items-center bg-transparent"><b>Logout</b>
            <i
                class='bx bx-log-out fs-5'></i></a>
    </div>
</div>
