@extends('layouts.admin')

@section('title', 'Admin Orders')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Order List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Kullanıcı İsmi-Soyisim</th>
                                        <th>Şipariş Ver. İsim-Soyisim</th>
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
                                        <p></p>
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>
                                                <a href="{{route('admin_user_show',['id'=>$rs->user->id])}}"
                                                   onclick="return !window.open(this.href, '', 'top=20 left=50 width=800 height=700')">

                                                    {{$rs->user->name}} {{$rs->user->surname}}</a>
                                            </td>
                                            <td>{{$rs->name}} {{$rs->surname}}</td>
                                            <td><a href="mailto:hello@xton.com">{{$rs->email}}</a></td>
                                            <td><a href="tel:+01321654214">{{$rs->phone}}</a></td>
                                            <td>{{$rs->address}}</td>
                                            <td>{{$rs->city}}</td>
                                            <td>{{$rs->district}}</td>
                                            <td>{{$rs->neighbourhood}}</td>
                                            <td>{{$rs->total}}</td>
                                            <td>{{$rs->created_at}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td>
                                                <a href="{{route('admin_order_show',['id'=>$rs->id])}}"
                                                   onclick="return !window.open(this.href, '','top=20 left=50 width=1000 height=800')">
                                                    <div class="font-22 text-primary"><i
                                                            class="fadeIn animated bx bxs-eyedropper"></i></div>

                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
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
