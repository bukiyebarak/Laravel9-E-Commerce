@extends('layouts.admin')

@section('title', 'User List')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Users</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    {{--                                    <th>Image</th>--}}
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Roles</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rs)
                                    <p></p>
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        {{--                                        <td>--}}
                                        {{--                                            @if($rs->profile_photo_path)--}}
                                        {{--                                                <img src="{{Storage::url($rs->profile_photo_path)}}" height="50" style="border-radius: 100px" alt="">--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </td>--}}
                                        <td>{{$rs->name}}</td>
                                        <td>{{$rs->surname}}</td>
                                        <td><a href="mailto:hello@xton.com">{{$rs->email}}</a></td>
                                        <td><a href="tel:+01321654214">{{$rs->phone}}</a></td>
                                        <td>{{$rs->address}}</td>
                                        <td>
                                            @foreach($rs->roles as $row)
                                                {{$row->name}},
                                            @endforeach
                                            <a href="{{route('admin_user_roles',['id'=>$rs->id])}}"
                                               data-bs-toggle="modal"
                                               data-bs-target="#exampleLargeModal{{$rs->id}}">
                                                <div class="font-18 text-primary"><i
                                                        class="fadeIn animated bx bx-plus-circle"></i>
                                                </div>
                                            </a>
                                            {{--                                            <a href="{{route('admin_user_roles',['id'=>$rs->id])}}"--}}
                                            {{--                                               onclick="return !window.open(this.href, '', 'top=50 left=300 width=800 height=700')">--}}
                                            {{--                                                <div class="font-18 text-primary"><i--}}
                                            {{--                                                        class="fadeIn animated bx bx-plus-circle"></i>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </a>--}}
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{route('admin_user_edit',['id'=>$rs->id])}} "
                                                   class=" text-primary bg-light-primary border-0">
                                                    <i class="bx bxs-edit"></i></a></div>

                                        </td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{route('admin_user_delete',['id'=>$rs->id])}}  "
                                                   class="text-danger bg-light-danger border-0"
                                                   onclick="return confirm('Delete! Are you Sure')"><i
                                                        class="bx bxs-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @php
                                    $dataUser = \App\Models\User::find($rs->id);
                                    $datalistUser= \App\Models\Role::all()->sortBy('name');
                                @endphp

                                @include('admin.modal.user_role')

                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-10">

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
