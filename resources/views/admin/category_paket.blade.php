@extends('layouts.admin')

@section('title', __('Category List'))

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">@lang("Category")</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang("Category List")</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <a class="btn btn-primary" href="{{route('admin_category_add')}}"> <i class="bx bxs-plus-circle"></i>@lang("Add Category")</a>
                            <a class="btn btn-primary" href="{{route('admin_category_paket_add')}}"> <i class="bx bxs-plus-circle"></i>@lang("Add Paket Category")</a>
                            <hr/>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>@lang("Parent")</th>
                                        <th>@lang("Title")</th>
                                        <th style="text-align: center;">@lang("Status")</th>
                                        <th>@lang("Edit")</th>
                                        <th>@lang("Delete")</th>
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
                                            <td>
                                                <div style="text-align: center;">
                                                    @if($rs->status=="True")
                                                        <div class="badge rounded-pill text-black bg-success p-2 text-uppercase px-3">
                                                            True
                                                        </div>
                                                    @else
                                                        <div  class="badge rounded-pill text-white bg-danger p-2 text-uppercase px-3">
                                                            False</div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{route('admin_category_paket_edit',['id'=>$rs->id])}} "
                                                       class=" text-primary bg-light-primary border-0">
                                                        <i class="bx bxs-edit"></i></a></div>
                                            </td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{route('admin_category_paket_delete',['id'=>$rs->id])}} "
                                                       class="text-danger bg-light-danger border-0"
                                                       onclick="return confirm('{{ __('Delete! Are you sure?') }}')"><i
                                                            class="bx bxs-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
