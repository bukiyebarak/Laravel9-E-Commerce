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
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>İsim</th>
                                <th>Soyisim</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Adres</th>
                                <th>İl</th>
                                <th>İlçe</th>
                                <th>Mahalle</th>
                                <th>Toplam</th>
                                <th>Şipariş Tarihi</th>
                                <th>Durum</th>
                                <th>Şipariş Detayı</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($datalist as $rs)
                                @if($rs->is_pay=="True")
                                <tr>
                                    <td>{{$rs->name}}</td>
                                    <td>{{$rs->surname}}</td>
                                    <td><a href="mailto:hello@xton.com">{{$rs->email}}</a></td>
                                    <td><a href="tel:+01321654214">{{$rs->phone}}</a></td>
                                    <td>{{$rs->address}}</td>
                                    <td>{{$rs->city}}</td>
                                    <td>{{$rs->district}}</td>
                                    <td>{{$rs->neighbourhood}} Mah.</td>
                                    <td>{{$rs->total}}</td>
                                    <td>{{$rs->created_at}}</td>
                                    <td>
                                        <div style="text-align: center;">
                                            @if($rs->status=="Shipping")
                                                <button class="badge rounded-pill text-white bg-warning p-2 text-uppercase px-3">
                                                    Shipping
                                                </button>
                                            @elseif($rs->status=="Accepted")
                                                <button class="badge rounded-pill text-white bg-success p-2 text-uppercase px-3">
                                                    Accepted
                                                </button>
                                            @elseif($rs->status=="Completed")
                                                <button class="badge rounded-pill text-white bg-info p-2 text-uppercase px-3">
                                                    Completed
                                                </button>
                                            @elseif($rs->status=="Canceled")
                                                <button class="badge rounded-pill text-white bg-danger p-2 text-uppercase px-3">
                                                    Canceled
                                                </button>
                                            @else
                                                <button  class="badge rounded-pill text-white bg-success p-2 text-uppercase px-3">
                                                    New</button>
                                            @endif
                                        </div>
                                    </td>
                                    <td><a href="{{route('user_order_show',['id'=>$rs->id])}}">
                                            <div class="font-22 text-primary"><i class="bx bxs-cart-add fs-2"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                @endif
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
