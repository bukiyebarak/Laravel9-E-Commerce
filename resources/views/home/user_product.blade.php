@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', __('My Product'))

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>@lang("User Product")</h2>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("User Product")</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="products-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @include('home.usermenu')
                <div class="col-lg-9 col-md-12">
                   &nbsp; <a class="btn default-btn" href="{{route('user_product_add')}}">Add Product</a>
                    <hr/>
                    <div class="table-responsive" >
                        <table id="example2" class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>@lang("Category")</th>
                                <th>@lang("Title")</th>
                                <th>@lang("Quantity")</th>
                                <th>@lang("Price")</th>
                                <th>@lang("Image")</th>
                                <th>@lang("Image Gallery")</th>
                                <th>@lang("Status")</th>
                                <th>@lang("Edit")</th>
                                <th>@lang("Delete")</th>
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
                                    <td>{{$rs->quantity}}</td>
                                    <td>{{$rs->price}}</td>
                                    <td>
                                        @if($rs->image)
                                            <img src="{{asset('images/'.$rs->image)}}" style="width: 50px;height: 50px" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('user_image_add',['product_id'=>$rs->id])}}"
                                           onclick="return !window.open(this.href, '', 'top=20 left=50 width=800 height=700')">
                                            <div class="font-22 text-primary"><i class="bx bx-images fs-4"></i>
                                            </div>
                                        </a>
                                    </td>
                                    <td>{{$rs->status}}</td>

                                    <td><a href="{{route('user_product_edit',['id'=>$rs->id])}}">
                                            <div class="font-22 text-primary"><i class="bx bx-edit fs-4"></i>
                                            </div>
                                        </a></td>
                                    <td><a href="{{route('user_product_delete',['id'=>$rs->id])}} "
                                           onclick="return confirm('Delete! Are you sure?')">
                                            <div class="font-22 text-primary"><i class="bx bx-trash fs-4"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- End Customer Service Area -->

@endsection
@section('footerjs')

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
