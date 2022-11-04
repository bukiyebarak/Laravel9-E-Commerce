@extends('layouts.admin')

@section('title', 'Admin Panel Home Page')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Category</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <a class="btn btn-primary" href="{{route('admin_category_add')}}">Add Category</a>
                            <hr/>
                            <div class="table-responsive">
                                        <table id="example2" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Parent</th>
                                                <th>Title</th>
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
                                                        {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}
                                                    </td>
                                                    <td>{{$rs->title}}</td>
                                                    <td>{{$rs->status}}</td>
                                                    <td><a href="{{route('admin_category_edit',['id'=>$rs->id])}}">Edit</a></td>
                                                    <td><a href="{{route('admin_category_delete',['id'=>$rs->id])}} " onclick="return confirm('Delete! Are you sure?')">Delete</a></td>
                                                </tr>
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
