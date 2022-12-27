@extends('layouts.admin')

@section('title', 'Product List')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Product</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>

                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('admin_product_add')}}"> <i
                            class="bx bxs-plus-circle"></i>Add Product</a>
                    <a class="btn btn-primary" href="{{route('admin_paket_product_add')}}"> <i
                            class="bx bxs-plus-circle"></i>Add Paket Product</a>

                    <hr>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Discount Price</th>
                                <th>Image</th>
                                <th>Gallery</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datalist as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>
                                        {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category, $rs->category->title)}}
                                    </td>
                                    <td>{{$rs->title}}</td>
                                    <td style="text-align: center">{{$rs->quantity}}</td>
                                    <td style="text-align: center">{{$rs->price}}€</td>
                                    <td style="text-align: center">
                                        @if($rs->is_sale=="Yes")
                                            <b style="color: green">{{$rs->is_sale}}</b><br>
                                            <p><b><u>Sale</u></b> :<b> %{{$rs->sale}}</b></p>
                                        @else
                                            <b style="color:red">{{$rs->is_sale}}</b>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if($rs->sale_price)
                                            {{$rs->sale_price}}€
                                        @else
                                            <b>Not Discount</b>
                                        @endif

                                    </td>
                                    <td>
                                        @if($rs->image)
                                            <img src="{{asset('images/'.$rs->image)}}" height="50" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{route('admin_image_add',['product_id'=>$rs->id])}}"
                                               data-bs-toggle="modal"
                                               class=" text-primary bg-light-primary border-0"
                                               data-bs-target="#exampleScrollableModal{{$rs->id}}">
                                                <i class="fadeIn animated bx bx-images fs-3"> </i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="text-align: center;">
                                            @if($rs->status=="True")
                                                <div
                                                    class="badge rounded-pill text-black bg-success p-2 text-uppercase px-3">
                                                    True
                                                </div>
                                            @else
                                                <div
                                                    class="badge rounded-pill text-white bg-danger p-2 text-uppercase px-3">
                                                    False
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{route('admin_product_edit',['id'=>$rs->id])}}"
                                               class=" text-primary bg-light-primary border-0">
                                                <i class="bx bxs-edit"></i></a></div>

                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{route('admin_product_delete',['id'=>$rs->id])}} "
                                               class="text-danger bg-light-danger border-0"
                                               onclick="return confirm('Delete! Are you Sure')"><i
                                                    class="bx bxs-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                @php
                                    $data = \App\Models\Product::find($rs->id);
                                    $images=\Illuminate\Support\Facades\DB::table('images')->where('product_id','=',$rs->id)->get();
                                @endphp

                                @include('admin.modal.image_add')

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('footer')

    <script src="{{asset('assets')}}/admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection




