@extends('layouts.admin')

@section('title', 'Frequently Asked Question List')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Frequently Asked Questions</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            @include('sweetalert::alert')
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('admin_faq_add')}}">Add Question </a>
                    <hr/>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example2"  class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
{{--                                    <th>Id</th>--}}
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rs)
                                    <tr>
{{--                                        <td >{{$rs->id}}</td>--}}
                                        <td>{{$rs->question}}</td>
                                        <td > {!!$rs->answer  !!}</td>
                                        <td>
                                            @if($rs->status=="True")
                                                <span style="color:darkgreen"><b>{{$rs->status}}</b></span>
                                            @else
                                                <span style="color:darkred"><b>{{$rs->status}}</b></span>
                                            @endif
                                        </td>
                                        <td ><a href="{{route('admin_faq_edit',['id'=>$rs->id])}}">Edit
                                            </a>
                                        </td>
                                        <td><a href="{{route('admin_faq_delete',['id'=>$rs->id])}} "
                                               onclick="return confirm('Delete! Are you sure?')">
                                               Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );

            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>

@endsection
