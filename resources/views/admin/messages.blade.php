@extends('layouts.admin')

@section('title', 'Contact Messages List')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Contact Messages</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Message List</li>
                        </ol>
                    </nav>
                </div>

            </div>
            @include('sweetalert::alert')
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name-Surname</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Admin Note</th>
                                        <th>Status</th>
                                        <th>IP Addresses</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#exampleLargeModal{{$rs->user->id}}">{{$rs->user->name}} {{$rs->user->surname}}</a>
                                            {{--                                                <a href="{{route('admin_user_show',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"--}}
                                            {{--                                                   onclick="return !window.open(this.href, '', 'top=20 left=50 width=800 height=700')">--}}
                                            {{--                                                    {{$rs->user->name}}  {{$rs->user->surname}}</a></td></td>--}}
                                            <td>{{$rs->name}}</td>
                                            <td><a href="mailto:hello@xton.com">{{$rs->email}}</a></td>
                                            <td><a href="tel:+01321654214">{{$rs->phone}}</a></td>
                                            <td>{{$rs->subject}}</td>
                                            <td>{{$rs->message}}</td>
                                            <td>{{$rs->note}}</td>
                                            <td>
                                                <div style="text-align: center;">
                                                    @if($rs->status=="Read")
                                                        <div class="badge rounded-pill text-black bg-gradient-blues p-2 text-uppercase px-3">
                                                            Read
                                                        </div>
                                                    @else
                                                        <div  class="badge rounded-pill text-black bg-gradient-lush p-2 text-uppercase px-3">
                                                            New</div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{$_SERVER['REMOTE_ADDR']}}</td>
                                            <td>
                                                <div class="d-flex order-actions" >
                                                    <a href="{{route('admin_message_edit',['id'=>$rs->id])}}" data-bs-toggle="modal"  class=" text-primary bg-light-primary border-0"
                                                       data-bs-target="#exampleModal{{$rs->id}}">
                                                        <i class="bx bxs-edit"></i></a></div>

                                            </td>
                                            <td><div class="d-flex order-actions">
                                                    <a href="{{route('admin_message_delete',['id'=>$rs->id])}} "
                                                       class="text-danger bg-light-danger border-0"
                                                       onclick="return confirm('Delete! Are you Sure')"><i class="bx bxs-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                        @php
                                            $dataUser = \App\Models\User::find($rs->user->id);
                                            $datalistUser= \App\Models\Role::all()->sortBy('name');
                                            $dataMessage=\App\Models\Message::find($rs->id);
                                        @endphp

                                        @include('admin.modal.user_show')

                                        @include('admin.modal.message_edit')

                                    @endforeach
                                    </tbody>
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




