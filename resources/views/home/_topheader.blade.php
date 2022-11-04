<!-- Start Top Header Area -->
<div class="top-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <ul class="header-contact-info">
                    <li>{{$setting->title}}</li>
                    <li>Call: <a href="tel:+01321654214">{{$setting->phone}}</a></li>
                    <li>
                        <div class="dropdown language-switcher d-inline-block">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <img src="{{asset('assets')}}/home/assets/img/us-flag.jpg" alt="image">
                                <span>Eng <i class='bx bx-chevron-down'></i></span>
                            </button>

                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets')}}/home/assets/img/germany-flag.jpg" class="shadow-sm"
                                         alt="flag">
                                    <span>Ger</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets')}}/home/assets/img/france-flag.jpg" class="shadow-sm"
                                         alt="flag">
                                    <span>Fre</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets')}}/home/assets/img/spain-flag.jpg" class="shadow-sm"
                                         alt="flag">
                                    <span>Spa</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets')}}/home/assets/img/russia-flag.jpg" class="shadow-sm"
                                         alt="flag">
                                    <span>Rus</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets')}}/home/assets/img/italy-flag.jpg" class="shadow-sm"
                                         alt="flag">
                                    <span>Ita</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="top-header-discount-info">
                    @include('home.message')
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <ul class="header-top-menu">
                    @auth
                        <li><a href="{{route('myprofile')}}"><i class='bx bxs-user'></i> {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </a></li>
                        <li><a href="{{route('logout')}}"><i class='bx bx-log-out'></i> Logout</a></li>
                    @endauth
                    @guest()
                        <li><a href="{{route('adminlogin')}}"><i class='bx bx-log-in'></i> Login</a></li>
                        <li><a href="/register"><i class='bx bxs-user-plus'></i> Register</a></li>
                    @endguest

                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal"><i
                                class='bx bx-heart'></i> Wishlist</a></li>


                </ul>

                <ul class="header-top-others-option">
                    <div class="option-item">
                        <div class="search-btn-box">
                            <i class="search-btn bx bx-search-alt"></i>
                        </div>
                    </div>

                    <div class="option-item">
                        <div class="cart-btn">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i
                                    class='bx bx-shopping-bag'></i><span>0</span></a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Top Header Area -->

<!-- Start Wishlist Modal -->
<div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            <div class="modal-body">
                <h3>My Wish List (3)</h3>

                <div class="products-cart-content">
                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="{{asset('assets')}}/home/assets/img/products/img1.jpg"
                                             alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Long Sleeve Leopard T-Shirt</a></h3>
                            <span>Blue / XS</span>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$250.00</span>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="{{asset('assets')}}/home/assets/img/products/img2.jpg"
                                             alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Causal V-Neck Soft Raglan</a></h3>
                            <span>Blue / XS</span>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$200.00</span>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="{{asset('assets')}}/home/assets/img/products/img3.jpg"
                                             alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Hanes Men's Pullover</a></h3>
                            <span>Blue / XS</span>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                <span class="price">$200.00</span>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>
                </div>

                <div class="products-cart-btn">
                    <a href="#" class="optional-btn">View Shopping Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wishlist Modal -->

<!-- Start Size Guide Modal Area -->
<div class="modal fade sizeGuideModal" id="sizeGuideModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="bx bx-x"></i></span>
            </button>

            <div class="modal-sizeguide">
                <h3>Size Guide</h3>
                <p>This is an approximate conversion table to help you find your size.</p>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Italian</th>
                            <th>Spanish</th>
                            <th>German</th>
                            <th>UK</th>
                            <th>US</th>
                            <th>Japanese</th>
                            <th>Chinese</th>
                            <th>Russian</th>
                            <th>Korean</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>34</td>
                            <td>30</td>
                            <td>28</td>
                            <td>4</td>
                            <td>00</td>
                            <td>3</td>
                            <td>155/75A</td>
                            <td>36</td>
                            <td>44</td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td>32</td>
                            <td>30</td>
                            <td>6</td>
                            <td>0</td>
                            <td>5</td>
                            <td>155/80A</td>
                            <td>38</td>
                            <td>44</td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td>34</td>
                            <td>32</td>
                            <td>8</td>
                            <td>2</td>
                            <td>7</td>
                            <td>160/84A</td>
                            <td>40</td>
                            <td>55</td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>36</td>
                            <td>34</td>
                            <td>10</td>
                            <td>4</td>
                            <td>9</td>
                            <td>165/88A</td>
                            <td>42</td>
                            <td>55</td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td>38</td>
                            <td>36</td>
                            <td>12</td>
                            <td>6</td>
                            <td>11</td>
                            <td>170/92A</td>
                            <td>44</td>
                            <td>66</td>
                        </tr>
                        <tr>
                            <td>44</td>
                            <td>40</td>
                            <td>38</td>
                            <td>14</td>
                            <td>8</td>
                            <td>13</td>
                            <td>175/96A</td>
                            <td>46</td>
                            <td>66</td>
                        </tr>
                        <tr>
                            <td>46</td>
                            <td>42</td>
                            <td>40</td>
                            <td>16</td>
                            <td>10</td>
                            <td>15</td>
                            <td>170/98A</td>
                            <td>48</td>
                            <td>77</td>
                        </tr>
                        <tr>
                            <td>48</td>
                            <td>44</td>
                            <td>42</td>
                            <td>18</td>
                            <td>12</td>
                            <td>17</td>
                            <td>170/100B</td>
                            <td>50</td>
                            <td>77</td>
                        </tr>
                        <tr>
                            <td>50</td>
                            <td>46</td>
                            <td>44</td>
                            <td>20</td>
                            <td>14</td>
                            <td>19</td>
                            <td>175/100B</td>
                            <td>52</td>
                            <td>88</td>
                        </tr>
                        <tr>
                            <td>52</td>
                            <td>48</td>
                            <td>46</td>
                            <td>22</td>
                            <td>16</td>
                            <td>21</td>
                            <td>180/104B</td>
                            <td>54</td>
                            <td>88</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Size Guide Modal Area -->
