<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    @media only screen and  (max-device-width: 1230px) {
        .note {
            width: 150px;
        }

        .nameProduct {
            font-size: 12px;
        }

        .imageProduct {
            width: 85px;
            height: 85px;
            margin-bottom: 10px;
        }

        .productStatus {
            padding-top: 40px;
        }
    }
</style>
<div class="modal fade text-left" id="exampleExtraLargeModal{{$rs->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang("Order Item")</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                {{--                    <span aria-hidden="true">&times;</span>--}}
            </div>
            <div class="modal-body">
                <form action="{{route('admin_order_update',['id'=>$data->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" name="title" value="{{$data->id}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("User Name- Surname")</label>
                                <input type="text" name="title" value="{{$data->user->name}} {{$data->user->surname}}"
                                       class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("Name Surname")</label>
                                <input type="text" name="title" value="{{$data->name}} {{$data->surname}}"
                                       class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("Address")</label>
                                <input type="text" name="title" value="{{$data->address}}" class="form-control"
                                       disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("City- District-Neighbourhood")</label>
                                <input type="text" name="title"
                                       value="{{$data->city}}-{{$data->district}}-{{$data->neighbourhood}}" disabled
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("Phone")</label>
                                <input type="text" name="phone" disabled value="{{$data->phone}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("Email")</label>
                                <input type="text" name="email" value="{{$data->email}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("Total & Payment")</label>
                                <input type="text" name="total" value="{{$data->total}}₺  '{{$data->payment}} payment' " class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>IP</label>
                                <input type="text" name="IP" value="{{$data->IP}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>@lang("Created Date")</label>
                                <input type="text" name="created_at" value="{{$data->created_at}}" class="form-control"
                                       disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="title">@lang("Update Date")</label>
                                <input type="text" name="updated_at" value="{{$data->updated_at}}" class="form-control"
                                       disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 ">
                            <label>@lang("Status")</label>
                            <br>
                            <select class="form-select form-select mb-3" aria-label=".form-select-lg example"
                                    name="status">
                                <option selected>{{$data->status}}</option>
                                <option value="Accepted">@lang("Accepted")</option>
                                <option value="Canceled">@lang("Canceled")</option>
                                <option value="Shipping">@lang("Shipping")</option>
                                <option value="Completed">@lang("Completed")</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-6">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <button type="submit" class="btn btn-primary float-end">@lang("Save changes")</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-dark rounded"> <h4>@lang("Your Product(s)")</h4></div>
                    </div>
                </div>
{{--                <h4 style="color: rgba(69,70,65,0.82);">Your Product(s)</h4>--}}
{{--                <div class="my-4 border-top"></div>--}}
                @foreach($datalistOrderItem as $rs)
                    <form action="{{route('admin_order_item_update',['id'=>$rs->id])}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-2 imageProduct" style="text-align: center">
                                @if($rs->product->image!=null)
                                    <img src="{{asset('images/'.$rs->product->image)}}" class="imageProduct"
                                         height="120" width="120" alt=""
                                         style="border: 2px Solid #bababa; ">
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-4 nameProduct">
                                <h6 class="mb-2 nameProduct"><a
                                        href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"
                                        target="_blank"> {{$rs->product->title}}</a>
                                    <p class="mb-2 nameProduct">@lang("Unit Price"): <span>{{$rs->product->price}}₺</span>
                                    </p>
                                    <p class="mb-2 nameProduct">@lang("Sale Price"): <span>{{$rs->product->sale_price}}₺</span>
                                    </p>
                                    <p class="mb-2 nameProduct">@lang("Quantity"): <span> {{$rs->quantity}}</span>
                                    </p>
                                    <h6 class="mb-0 nameProduct">
                                        Total:{{$rs->product->price*$rs->quantity}}₺
                                    </h6> <br>
                                </h6>
                            </div>
                            <div class="col-sm-12 col-md-3 productStatus" style="text-align:center;">
                                <label>@lang("Status")</label>
                                <select class="form-select form-select mb-3" aria-label=".form-select-lg example"
                                        name="status">
                                    <option selected>{{$rs->status}}</option>
                                    <option value="Accepted">@lang("Accepted")</option>
                                    <option value="Canceled">@lang("Canceled")</option>
                                    <option value="Shipping">@lang("Shipping")</option>
                                    <option value="Completed">@lang("Completed")</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3" style="text-align: center">
                                <label>@lang("Note")</label><br>
                                <textarea class="note" name="note" rows="5" cols="28"
                                          placeholder="Note">{{$rs->note}}</textarea>
                            </div>
                            <div class="col-sm-12 col-md-8">
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <br>
                                <button type="submit" class="btn btn-primary float-end">@lang("Update")</button>
                            </div>
                            <div class="col-sm-12 col-md-1">
                            </div>
                        </div>
                    </form><br>
                @endforeach
                <div class="col">
                    <div class="card bg-secondary bg-gradient text-center ">
                        <div class="card-body">
                            <div class="p-3 text-white rounded">
                                <h5 >@lang("Subtotal") : {{$rs->total-30}}₺
                                </h5>
                                <h5 >@lang("Shipping") : 30₺
                                </h5>
                                <h5 >@lang("Total") : {{$rs->total}}₺
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="checkout-form p-3 bg-dark-1" style="text-align:center; ">--}}
{{--                    <div class="card rounded-0 border bg-transparent mb-0 shadow p-4 rounded">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="mb-0">Subtotal : <span>{{$rs->total-30}}₺</span>--}}
{{--                            </h5>--}}
{{--                            <h5 class="mb-0">Shipping : <span>30₺</span>--}}
{{--                            </h5>--}}
{{--                            <h5 class="mb-0">Total : <span class="">{{$rs->total}}₺</span>--}}
{{--                            </h5>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang("Close")</button>
                </div>
            </div>
        </div>
    </div>
</div>


