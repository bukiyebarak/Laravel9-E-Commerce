<link href="{{asset('assets')}}/admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
<link href="{{asset('assets')}}/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
<link href="{{asset('assets')}}/admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
<!-- loader-->
<link href="{{asset('assets')}}/admin/assets/css/pace.min.css" rel="stylesheet"/>
<script src="{{asset('assets')}}/admin/assets/js/pace.min.js"></script>
<!-- Bootstrap CSS -->
<link href="{{asset('assets')}}/admin/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset('assets')}}/admin/assets/css/bootstrap-extended.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link href="{{asset('assets')}}/admin/assets/css/app.css" rel="stylesheet">
<link href="{{asset('assets')}}/admin/assets/css/icons.css" rel="stylesheet">

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-0" style="text-align: center">Order Detail</h4>
            @include('home.message')
            <hr/>
            <div class="row gy-3">
                <div class="col-md-12">

                    <div class="col-md-10">
                        <form class="row g-3 needs-validation" novalidate=""
                              action="{{route('admin_order_update',['id'=>$data->id])}}" method="post">
                            @csrf
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <td>{{$data->id}}</td>
                                </tr>
                                <tr>
                                    <th>User</th>
                                    <td>{{$data->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$data->address}}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{$data->city}}</td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>{{$data->district}}</td>
                                </tr>
                                <tr>
                                    <th>Neighbourhood</th>
                                    <td>{{$data->neighbourhood}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$data->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>{{$data->total}}₺</td>
                                </tr>
                                <tr>
                                    <th>IP</th>
                                    <td>{{$data->IP}}</td>
                                </tr>
                                <tr>
                                    <th>Created Data</th>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                                <tr>
                                    <th>Update Data</th>
                                    <td>{{$data->updated_at}}</td>
                                </tr>

                                <tr>
                                    <th> Status</th>
                                    <td>
                                        <select name="status">
                                            <option selected>{{$data->status}}</option>
                                            <option>Accepted</option>
                                            <option>Canceled</option>
                                            <option>Shipping</option>
                                            <option>Completed</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Admin Note</th>
                                    <td>
                                        <textarea name="note" rows="4" cols="35">{{$data->note}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="col-12">
                                            <button class="btn btn-info" type="submit">Update Order</button>
                                        </div>
                                    </td>
                                </tr>

                                </thead>
                                <tbody>

                            </table>
                            <br><br>
                        </form>
                        <!--one product-->
                        <h4 style="color:#1E72C7; text-align: center;">Your Product(s)</h4>
                        @foreach($datalist as $rs)
                            <form class="row g-3 needs-validation"
                                  action="{{route('admin_order_item_update',['id'=>$rs->id])}}" method="post">
                                @csrf
                                <div class="my-4 border-top"></div>
                                <div class="row align-items-center g-3">


                                    <div class="col-12 col-lg-8">
                                        <div class="d-lg-flex align-items-center gap-2">
                                            <div class="cart-img text-center text-lg-start">
                                                @if($rs->product->image!=null)
                                                    <img src="{{Storage::url($rs->product->image)}}"
                                                         height="60" alt="">
                                                @endif
                                            </div>
                                            <div class="cart-detail text-center text-lg-start">
                                                <h6 class="mb-2"><a
                                                        href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"
                                                        target="_blank"> {{$rs->product->title}}</a>
                                                </h6>
                                                <p class="mb-2">Unit Price: <span>{{$rs->product->price}}₺</span>
                                                </p>
                                                <p class="mb-2">Quantity: <span> {{$rs->quantity}}</span>
                                                </p>
                                                <h6 class="mb-0">
                                                    Total:{{$rs->product->price*$rs->quantity}}₺
                                                </h6> <br>
                                                <p>Status:
                                                    <select name="status">
                                                        <option selected>{{$rs->status}}</option>
                                                        <option>Accepted</option>
                                                        <option>Canceled</option>
                                                        <option>Shipping</option>
                                                        <option>Completed</option>
                                                    </select></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="cart-action text-center">
                                            <h6 class="mb-2">Note</h6>
                                            <textarea name="note" rows="4" cols="28">{{$rs->note}}</textarea>
                                            <br><br>
                                            <div class="col-12">
                                                <button class="btn btn-info" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach

                        <!-- end one product-->
                        <br>
                        <div class="checkout-form p-3 bg-dark-1">
                            <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                <div class="card-body">
                                    <h5 class="mb-0">Subtotal: <span class="float-end">{{$rs->order->total}}₺</span>
                                    </h5>

                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-12">
                                        <div id="todo-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
