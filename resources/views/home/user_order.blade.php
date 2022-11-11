@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'My Orders')

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>User Order</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>User Order</li>
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
                <div class="col-lg-10 col-md-12">
                    <div class="table-responsive" >
                        <table id="example2" class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datalist as $rs)
                                <tr>
                                    <td>{{$rs->name}}</td>
                                    <td><a href="mailto:hello@xton.com">{{$rs->email}}</a></td>
                                    <td><a href="tel:+01321654214">{{$rs->phone}}</a></td>
                                    <td>{{$rs->address}}</td>
                                    <td>{{$rs->total}}</td>
                                    <td>{{$rs->created_at}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="{{route('user_order_show',['id'=>$rs->id])}}">
                                            <div class="font-22 text-primary"><i class="bx bxs-cart-add fs-2"></i>
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
