@extends('layouts.admin')

@section('title', __('Frequently Asked Question List'))
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection
@section('content')
    <style>
        div.scroll {
            margin: 5px;
            padding: 5px;
            width: 400px;
            height: auto;
            overflow: auto;
            text-align: justify;
        }
    </style>
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">@lang("Frequently Asked Questions")</div>
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
                    <a class="btn btn-primary" href="{{route('admin_faq_add')}}">@lang("Add Question") </a>
                    <hr/>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>@lang("Question")</th>
                                    <th style="width: 50px">@lang("Answer")</th>
                                    <th>@lang("Status")</th>
                                    <th>@lang("Edit")</th>
                                    <th>@lang("Delete")</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td> <div class="scroll">
                                                {{$rs->question}}
                                            </div></td>
                                        <td>
                                            <div class="scroll">
                                                {!! $rs->answer !!}
                                            </div>
                                        </td>
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
                                                <a href="{{route('admin_faq_edit',['id'=>$rs->id])}} "
                                                   class=" text-primary bg-light-primary border-0">
                                                    <i class="bx bxs-edit"></i></a></div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{route('admin_faq_delete',['id'=>$rs->id])}} "
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

    <script>
        $(function () {
            $('[data-bs-toggle="popover"]').popover();
            $('[data-bs-toggle="tooltip"]').tooltip();
        })
    </script>
@endsection
