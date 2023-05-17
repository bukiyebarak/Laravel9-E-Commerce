@extends('layouts.admin')

@section('title', __('Category List'))

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">@lang("Roles")</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang("Role List")</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                    @if ($errors->has('role'))
                        <div style="background-color: #da7d7d;padding: 10px;margin:5px">
                        <span class="text-black" style="font-size: 14px; padding: 20px;">{{ $errors->first('role') }}*</span>
                        </div>  @endif

                <div class="card-body">

                    <div class="row gy-3">

                        <div class="col-md-12">
                            <a href="#"
                               data-bs-toggle="modal"
                               data-bs-target="#exampleLargeModal"
                                class="btn btn-primary"> <i class="bx bxs-plus-circle"></i>@lang("Add Role")
                            </a><hr/>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">@lang('Id')</th>
                                        <th style="width: 10%;text-align: center">@lang('Rol Id')</th>
                                        <th>@lang('İsim')</th>
                                        <th style="width:10%;text-align: center">@lang('Düzenle')</th>
                                        <th style="width: 10%;">@lang('Sil')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count=0; @endphp
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td style="text-align: center">{{$rs->id}}</td>
                                            <td>{{$rs->name}}</td>
                                            <td  >
                                                <div class="d-flex order-actions" >
                                                    <a  href="#" data-bs-toggle="modal"  data-bs-target="#exampleSmallModal{{$rs->id}}"
                                                       class=" text-primary bg-light-primary border-0">
                                                        <i  class="bx bxs-edit"></i></a></div>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin_role_delete', ['id' => $rs->id]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-flex order-actions">
                                                        <button type="submit"  class="text-danger bg-light-danger border-0" style="border-radius: 20%; font-size:20px"
                                                        onclick="return confirm('<?php echo e(__('Delete! You are about to delete the')); ?>' + ' {{ $rs->name }}' + '<?php echo e(__(' role?')); ?>')">
                                                            <i class="bx bxs-trash "></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                            @php
                                                $dataRole = \App\Models\Role::find($rs->id);
                                            @endphp

                                            @include('admin.modal.role_add')
                                            @include('admin.modal.role_edit')
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
